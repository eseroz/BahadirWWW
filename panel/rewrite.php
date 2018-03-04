<?php
if(isset($_GET["view"])){
    $view = $_GET["view"];
}else{
    $view = "dashboard";
}
switch ($view)
{
    case 'dashboard':
        include_once("pages/00-DASHBOARD/index.php");
        break;
    case 'home':
        include_once("pages/01-HOME/index.php");
        break;
    case 'corprate':
        include_once("pages/02-CORPRATE/index.php");
        break;
    //case 'rd-management':
    //    include_once("pages/02-CORPRATE/index.php?p=rd-management");
    //    break;
    //case 'quality-management':
    //    include_once("pages/02-CORPRATE/index.php?p=quality-management");
    //    break;
    case 'products':
        include_once("pages/03-PRODUCT/index.php");
        break;
    //case 'principals':
    //    include_once("pages/02-CORPRATE/index.php?p=principals");
    //    break;
    case 'translate':
        include_once("pages/07-TRANSLATE/index.php");
        break;
    case 'settings':
        include_once("pages/08-SETTINGS/index.php");
        break;
    case 'career':
        include_once("pages/04-CAREER/index.php");
        break;
    case 'contact':
        include_once("pages/06-CONTACT/index.php");
        break;
    default:
        include_once("pages/dashboard.php");
        break;
}

?>

