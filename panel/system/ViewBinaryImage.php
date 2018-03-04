<?php
$panel = false;
include_once('Bahadir.php');

$OPTION = $bahadir->fnc->get("OPTION");
$ID = $bahadir->fnc->get("ID");

switch ($OPTION)
{
    case 'BRANCH_CATALOG':
        $sql = "SELECT *FROM product.BRANCH_CATALOG WHERE ID = $ID";
        $query = odbc_exec($bahadir->mssqlDb->mssqlCon, $sql);
        while($row = odbc_fetch_array( $query )){
            header('Content-type: application/pdf');
            $byte_array = $row["PDF_BINARY"];
            echo $byte_array;
        }
        break;
    case 'BRANCH':
        $sql = "SELECT *FROM product.BRANCH WHERE ID = $ID";
        $query = odbc_exec($bahadir->mssqlDb->mssqlCon, $sql);
        while($row = odbc_fetch_array( $query )){
            header("Content-type:image/png");
            $byte_array = $row["COVER_PHOTO"];
            echo $byte_array;
        }
        break;
    case 'SLIDER':
        $sql = "SELECT *FROM site.SLIDER WHERE ID = $ID";
        $query = odbc_exec($bahadir->mssqlDb->mssqlCon, $sql);
        while($row = odbc_fetch_array( $query )){
            header("Content-type:image/png");
            $byte_array = $row["IMAGE_BINARY"];
            echo $byte_array;
        }
        break;
    case 'NEWS':
        $sql = "SELECT *FROM site.NEWS WHERE ID = $ID";
        $query = odbc_exec($bahadir->mssqlDb->mssqlCon, $sql);

        while($row = odbc_fetch_array( $query )){
            header("Content-type:image/png");
            $byte_array = $row["IMAGE_BINARY"];
            echo $byte_array;
        }
        break;
    case 'PAGE_HEADER':
        $sql = "SELECT HEADER_IMAGE FROM site.PAGES WHERE ID = $ID";
        $query = odbc_exec($bahadir->mssqlDb->mssqlCon, $sql);

        while($row = odbc_fetch_array( $query )){
            header("Content-type:image/png");
            $byte_array = $row["HEADER_IMAGE"];
            echo $byte_array;
        }
        break;
    case 'FLAG':
        $sql = "SELECT FLAG FROM translate.LANGUAGE WHERE ID = $ID";
        $query = odbc_exec($bahadir->mssqlDb->mssqlCon, $sql);

        while($row = odbc_fetch_array( $query )){
            header("Content-type:image/png");
            $byte_array = $row["FLAG"];
            echo $byte_array;
        }
        break;
}
?>