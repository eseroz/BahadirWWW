<?php
if(isset($_GET["p"])){
    switch ($_GET["p"])
    {
        case "ANASAYFA":
            include_once("pages/home.php");
            break;
        case "ARGE_YONETIMI":
            include_once("pages/rd-management.php");
            break;
        case "KALITE_YONETIMI":
            include_once("pages/quality-management.php");
            break;
        case "YONETIM_ILKELERI":
            include_once("pages/principals.php");
            break;
        case "IK_YONETIMI":
            include_once("pages/hr-management.php");
            break;
         case "OZGECMIS_FORMU":
            include_once("pages/cv-form.php");
            break;
        case "ACIK_POZISYONLAR":
            include_once("pages/open-positions.php");
            break;
        case "CERRAHI_ALETLER":
            include_once("pages/products/surgical-instruments/index.php");
            break;
        case "STERILIZASYON_KONTEYNERLERI":
            include_once("pages/products/sterilization-containers/index.php");
            break;
        case "ILETISIM":
            include_once("pages/contact.php");
            break;
        default:
            include_once("pages/home.php");
            break;
    }
}else{
    include_once("pages/home.php");
}
?>
