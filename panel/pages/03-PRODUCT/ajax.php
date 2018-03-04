<?php
$panel = true;
include_once("../../system/bahadir.php");
$option = $bahadir->fnc->post("OPTION");
switch ($option)
{
    case 'INSERT_BRANCH':

        $BRANCH_COUNT = 0;
        $TITLE = $bahadir->fnc->post("TITLE", TRUE);
        $SHORT_TITLE = $bahadir->fnc->post("SHORT_TITLE", TRUE);
        $SUB_TITLE = $bahadir->fnc->post("SUB_TITLE", TRUE);
        $DETAILS = $bahadir->fnc->post("DETAILS", TRUE);
        $COVER_PHOTO = $_FILES["COVER_PHOTO"];
        $CATEGORY = $bahadir->fnc->post("CATEGORY", TRUE);

        $BRANCHES = $bahadir->mssqlDb->Select("SELECT MAX(ID) AS ID FROM product.BRANCH");
        $BRANCH_COUNT = count($BRANCHES) + 1;

        $BINARY = $bahadir->fnc->CONVERT_POSTED_FILE_TO_BINARY($COVER_PHOTO);
        $INSERT_BRANCH = $bahadir->mssqlDb->ExexQuery("INSERT INTO product.BRANCH (SEQUENCE, CATEGORY, TITLE, SHORT_TITLE, SUB_TITLE, DETAILS, COVER_PHOTO) VALUES($BRANCH_COUNT,'$CATEGORY','$TITLE','$SHORT_TITLE','$SUB_TITLE','$DETAILS',$BINARY)");
        $BRANCH_ID = $bahadir->mssqlDb->IDENT_CURRENT("product.BRANCH");

        for ($i = 0; $i < (count($_FILES) - 1); $i++)
        {
        	$PDF_TEXT = $bahadir->fnc->post('PDF_TEXT_'. $i, TRUE);
            $PDF_FILE = $bahadir->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES['PDF_FILE_'. $i]);
        	$INSERT_CATALOG = $bahadir->mssqlDb->ExexQuery("INSERT INTO product.BRANCH_CATALOG (BRANCH_ID, TITLE, PDF_BINARY) VALUES($BRANCH_ID, '$PDF_TEXT', $PDF_FILE)");
        }

        $BRANCH =  $bahadir->mssqlDb->Select("SELECT *FROM product.BRANCH WHERE ID = $BRANCH_ID")[0];
        $BRANCH_ID = $BRANCH["ID"];
        $TITLE = $BRANCH["TITLE"];
        $SHORT_TITLE = $BRANCH["SHORT_TITLE"];
        $SUB_TITLE = $BRANCH["SUB_TITLE"];
        $DETAILS = $BRANCH["DETAILS"];

        echo json_encode(array('BRANCH_ID'=>$BRANCH_ID, 'TITLE'=>"$TITLE", 'SHORT_TITLE'=>"$SHORT_TITLE", 'SUB_TITLE'=>"$SUB_TITLE", 'DETAILS'=>"$DETAILS", 'SEQUENCE'=>$BRANCH_COUNT, 'CHECKED'=>''));

        break;

    case 'UPDATE_BRANCH':

        $BRANCH_ID = $bahadir->fnc->post("BRANCH_ID");
        $TITLE = $bahadir->fnc->post("TITLE", TRUE);
        $SHORT_TITLE = $bahadir->fnc->post("SHORT_TITLE", TRUE);
        $SUB_TITLE = $bahadir->fnc->post("SUB_TITLE", TRUE);
        $DETAILS = $bahadir->fnc->post("DETAILS", TRUE);

        if(isset($_FILES["COVER_PHOTO"])){
            $COVER_PHOTO = $_FILES["COVER_PHOTO"];
            $BINARY = $bahadir->fnc->CONVERT_POSTED_FILE_TO_BINARY($COVER_PHOTO);
            $SQL = "UPDATE product.BRANCH SET TITLE = '$TITLE', SHORT_TITLE = '$SHORT_TITLE', SUB_TITLE = '$SUB_TITLE', DETAILS = '$DETAILS', COVER_PHOTO = $BINARY WHERE ID = $BRANCH_ID";
        }else{
            $SQL = "UPDATE product.BRANCH SET TITLE = '$TITLE', SHORT_TITLE = '$SHORT_TITLE', SUB_TITLE = '$SUB_TITLE', DETAILS = '$DETAILS' WHERE ID = $BRANCH_ID";
        }

        $UPDATE_BRANCH = $bahadir->mssqlDb->ExexQuery($SQL);

        for ($i = 0; $i < (count($_FILES) - 1); $i++)
        {
        	$PDF_TEXT = $bahadir->fnc->post('PDF_TEXT_'. $i, TRUE);
            $PDF_FILE = $bahadir->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES['PDF_FILE_'. $i]);
        	$INSERT_CATALOG = $bahadir->mssqlDb->ExexQuery("INSERT INTO product.BRANCH_CATALOG (BRANCH_ID, TITLE, PDF_BINARY) VALUES($BRANCH_ID, '$PDF_TEXT', $PDF_FILE)");
        }
        echo json_encode(array());
        break;

    case 'REMOVE_BRANCH':

        $ID_LIST = json_decode($_POST["ID_LIST"], true);

        foreach ($ID_LIST as $ID)
        {
            $ID = $ID["ID"];
            $bahadir->mssqlDb->ExexQuery("DELETE product.BRANCH WHERE ID = $ID");
        }

        break;
    case 'SEQUENCE':
        $LIST = json_decode($_POST["LISTE"]);
        for ($i = 0; $i < count($LIST); $i++)
        {
            $ID = $LIST[$i][0];
            $SEQUENCE = $LIST[$i][1];
            $bahadir->mssqlDb->ExexQuery("UPDATE product.BRANCH SET SEQUENCE = $SEQUENCE WHERE ID = $ID");
        }
        echo json_encode(array(count($LIST)));
        break;

    case 'CHANGE_STATE':
        $ID = $bahadir->fnc->post("ID");
        $STATE = $bahadir->fnc->post("STATE");
        $UPDATE_STATE = $bahadir->mssqlDb->ExexQuery("UPDATE product.BRANCH SET VISIBILITY = $STATE WHERE ID = $ID");
        break;

    case 'SELECT':
        $DATA_ID = $bahadir->fnc->post("DATA_ID");
        $BRANCHES = $bahadir->mssqlDb->Select("SELECT ID,SEQUENCE,TITLE,SHORT_TITLE,SUB_TITLE,DETAILS,VISIBILITY FROM product.BRANCH WHERE ID = $DATA_ID");

        foreach ($BRANCHES as $BRANCH)
        {
            $BRANCH_ID = $BRANCH["ID"];
            $BRANCH_CATALOG = $bahadir->mssqlDb->Select("SELECT ID, TITLE FROM product.BRANCH_CATALOG WHERE BRANCH_ID = $BRANCH_ID ORDER BY ID ASC");

            echo json_encode(array('BRANCH'=>$BRANCH, 'BRANCH_CATALOG'=>$BRANCH_CATALOG));
        }

        break;

    case 'REMOVE_BRANCH_CATALOG':
        $BRANCH_CATALOG_ID = $bahadir->fnc->post("BRANCH_CATALOG_ID");
        $DELETE = $bahadir->mssqlDb->ExexQuery("DELETE product.BRANCH_CATALOG WHERE ID = $BRANCH_CATALOG_ID");
        break;
}
?>