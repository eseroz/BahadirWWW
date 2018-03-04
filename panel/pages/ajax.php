<?php
$panel = true;
include_once("../../system/bahadir.php");

$option = $bahadir->fnc->post("OPTION");

switch ($option)
{
    case 'SLIDER_SEQUENCE':
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

    case 'SLIDER_STATE_CHANGED':
        $STATE = $bahadir->fnc->post("STATE");
        if($STATE == "true"){ $STATE = 1; } else { $STATE = 0; }
        $ID = $bahadir->fnc->post("ID");
        $bahadir->mssqlDb->ExexQuery("UPDATE site.SLIDER SET VISIBILITY = $STATE WHERE ID = $ID");
        echo json_encode(array("STATE"=>$STATE,"ID"=>$ID));
        break;

    case 'SELECT_SLAYT':
        $SLAYT_ID = $bahadir->fnc->post("SLAYT_ID");
        $SLAYT = $bahadir->mssqlDb->Select("SELECT SEQUENCE,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,SEO,VISIBILITY FROM site.SLIDER WHERE ID = $SLAYT_ID");
        echo json_encode($SLAYT[0]);
        break;
}
?>