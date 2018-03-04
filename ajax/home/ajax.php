<?php
$panel = false;
include_once("../../panel/system/bahadir.php");
$option = $bahadir->fnc->post("OPTION");
switch ($option)
{
    case 'GET_NEWS':
        $ID = $bahadir->fnc->post("ID");
        $HABER = $bahadir->mssqlDb->Select("SELECT ID,IMAGE_BINARY,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,DATE,SEQUENCE FROM site.NEWS WHERE ID = $ID")[0];
        $HABER = array(
            'ID'=>$HABER["ID"],
            'IMAGE_BINARY'=>$HABER["IMAGE_BINARY"],
            'TITLE1'=>$HABER["TITLE1"],
            'TITLE2'=>$HABER["TITLE2"],
            'DESCRIPTION'=>$HABER["DESCRIPTION"],
            'CONTENT_HTML'=>$HABER["CONTENT_HTML"],
            'DATE'=>$HABER["DATE"],
            'SEQUENCE'=>$HABER["SEQUENCE"]);
            echo json_encode($HABER);
        break;

    case 'GET_NEWS_NEXT_BACK':
        $ID = $bahadir->fnc->post("ID");
        $YON = $bahadir->fnc->post("YON");

        if($YON == "NEXT"){
            $HABER = $bahadir->mssqlDb->Select("SELECT ID,IMAGE_BINARY,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,DATE,SEQUENCE FROM site.NEWS WHERE ID = (select min(ID) FROM site.NEWS where ID > $ID)");
        }

        if($YON == "PREVIOUS"){
            $HABER = $bahadir->mssqlDb->Select("SELECT ID,IMAGE_BINARY,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,DATE,SEQUENCE FROM site.NEWS WHERE ID = (select max(ID) FROM site.NEWS where ID < $ID)");
        }

        if(count($HABER) == 0){
            $HABER = $bahadir->mssqlDb->Select("SELECT TOP 1 ID,IMAGE_BINARY,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,DATE,SEQUENCE FROM site.NEWS");
        }

        $HABER = array(
            'ID'=>$HABER[0]["ID"],
            'IMAGE_BINARY'=>$HABER[0]["IMAGE_BINARY"],
            'TITLE1'=>$HABER[0]["TITLE1"],
            'TITLE2'=>$HABER[0]["TITLE2"],
            'DESCRIPTION'=>$HABER[0]["DESCRIPTION"],
            'CONTENT_HTML'=>$HABER[0]["CONTENT_HTML"],
            'DATE'=>$HABER[0]["DATE"],
            'SEQUENCE'=>$HABER[0]["SEQUENCE"]);
        echo json_encode($HABER);
        break;
}
?>