<?php
$panel = true;
include_once("../../system/bahadir.php");
$option = $bahadir->fnc->post("OPTION");
switch ($option)
{
    case 'SEQUENCE':
        $LIST = json_decode($_POST["LISTE"]);
        for ($i = 0; $i < count($LIST); $i++)
        {
            $ID = $LIST[$i][0];
            $SEQUENCE = $LIST[$i][1];
            $bahadir->mssqlDb->ExexQuery("UPDATE site.SLIDER SET SEQUENCE = $SEQUENCE WHERE ID = $ID");
        }
        echo json_encode(array(count($LIST)));
        break;
    case 'CHANGE_STATE':
        $ID = $bahadir->fnc->post("ID");
        $STATE = $bahadir->fnc->post("STATE");
        $UPDATE_STATE = $bahadir->mssqlDb->ExexQuery("UPDATE site.SLIDER SET VISIBILITY = $STATE WHERE ID = $ID");
        break;
    case 'CHANGE_STATE_NEWS':
        $ID = $bahadir->fnc->post("ID");
        $STATE = $bahadir->fnc->post("STATE");
        $UPDATE_STATE = $bahadir->mssqlDb->ExexQuery("UPDATE NEWS SET VISIBILITY = $STATE WHERE ID = $ID");
        break;
    case 'SELECT_SLAYT':
        $SLAYT_ID = $bahadir->fnc->post("SLAYT_ID");
        $SLAYT = $bahadir->mssqlDb->Select("SELECT SEQUENCE,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,SEO,VISIBILITY FROM site.SLIDER WHERE ID = $SLAYT_ID");
        echo json_encode($SLAYT[0]);
        break;
    case 'SELECT_HABER':
        $HABER_ID = $bahadir->fnc->post("HABER_ID");
        $HABER = $bahadir->mssqlDb->Select("SELECT ID,SEQUENCE,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,DATE,SEO,VISIBILITY FROM site.NEWS WHERE ID = $HABER_ID")[0];
        $HABER = array(
            'ID'=>$HABER["ID"],
            'SEQUENCE'=>$HABER["SEQUENCE"],
            'TITLE1'=>$HABER["TITLE1"],
            'TITLE2'=>$HABER["TITLE2"],
            'DESCRIPTION'=>$HABER["DESCRIPTION"],
            'CONTENT_HTML'=>$HABER["CONTENT_HTML"],
            'DATE'=> date("d/m/Y", strtotime($HABER["DATE"])),
            'SEO'=>$HABER["SEO"],
            'VISIBILITY'=>$HABER["VISIBILITY"]);
        echo json_encode($HABER);
        break;
}
?>