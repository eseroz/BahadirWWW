<?php
$panel = false;
include_once('panel/fe_includes.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
    <meta charset="utf-8" />
    <title><?php echo $bahadir->TRANSLATE_WORD($SETTINGS["TITLE"]); ?></title>
    <meta name="rating" content="All" />
    <meta name="content-language" content="tr" />
    <meta name="description" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["META_DESCRIPTION"]); ?>" />
    <meta name="keywords" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["META_KEYWORDS"]); ?>" />
    <meta name="author" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["META_AUTHOR"]); ?>" />
    <meta name="copyright" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["META_COPYRIGHT"]); ?>" />
    <meta http-equiv="reply-to" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["EMAIL"]); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta property="og:image:type" content="image/png" />
    <!--<meta property="og:image" content="SVG GÖMEBİLİYORMUYUZ? TEST ET" />-->
    <meta property="og:url" content="<?php echo $SETTINGS["SITE_URL"]; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["META_COPYRIGHT"]); ?>" />
    <meta property="og:description" content="<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["META_DESCRIPTION"]); ?>" />

    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png" />
    <link href="/assets/css/reset.css" rel="stylesheet" />
    <link href="/assets/css/fonts.css" rel="stylesheet" />
    <link href="/assets/css/Style.css" rel="stylesheet" />
    <!--<link href="/assets/css/font-awesome.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="/assets/css/slide-push-menus.css" rel="stylesheet" />
    <link href="/assets/css/Resolution/Master.css" rel="stylesheet" />

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/jquery.ui.1.12.1.min.js"></script>
    <script src="/assets/plugins/jquery.easing.js"></script>
    <script src="/assets/js/Validation.js"></script>

    <link href="/assets/css/bootstrap.3.3.7.css" rel="stylesheet" />
    <script src="/assets/plugins/flowtype.js"></script>
    <script>
        //$(document).ready(function () {
        //    $('.product-container h3').flowtype({
        //        minFont: 10,
        //        maxFont: 50
        //    });
        //});
    </script>
</head>
<body>
    <div id="o-wrapper" class="o-wrapper">
        <div style="width: 100%; height: 84px;"></div>
        <div class="header">
            <div class="topBannerLine"></div>
            <div class="menuContainer">
                <div class="banner">
                    <div class="logoContainer2">
                        <div class="logoContainer">
                            <div class="logo">
                                <a href="<?php echo $bahadir->TRANSLATE_WORD("/anasayfa.html"); ?>">
                                    <?php
                                    print_r($bahadir->fnc->encoding->HTML_ENTITY_DECODE($SETTINGS["LOGO1"]));
                                    print_r($bahadir->fnc->encoding->HTML_ENTITY_DECODE($SETTINGS["LOGO2"]));
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bannerMenu">
                        <ul id="bannerMainMenu">
                        <?php
                        $PAGE_CATEGORIES = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGE_CATEGORY WHERE VISIBILITY = 1 ORDER BY SEQUENCE ASC");
                        foreach($PAGE_CATEGORIES as $PAGE_CATEGORY){
                        $CATEGORY_URL = empty($PAGE_CATEGORY["URL"]) == 0 ? "href='". $bahadir->TRANSLATE_WORD($PAGE_CATEGORY["URL"]) ."'" : "href='javascript:void(0);'";
                        $PAGE_CATEGORY_ID = $PAGE_CATEGORY["ID"];
                        ?>

                            <li class="bannerMainMenuItem">                                
                                <a class="bannerMainMenuItemA" <?php echo $CATEGORY_URL; ?>><?php echo $bahadir->TRANSLATE_WORD($PAGE_CATEGORY["CATEGORY_NAME"]); ?></a>
                                <?php 
                                $PAGES = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE PAGE_CATEGORY_ID = $PAGE_CATEGORY_ID AND VISIBILITY = 1 ORDER BY SEQUENCE ASC");
                                if(count($PAGES) > 0){
                                ?>                                
                                    <ul>
                                        <?php
                                        foreach($PAGES as $PAGE){
                                        ?>
                                            <li class="bannerSubMenuItem">
                                                <a class="bannerSubMenuItemA bannerSubMenuItemHakkimizda" href="<?php echo $bahadir->TRANSLATE_WORD($PAGE["URL"]); ?>"><?php echo $bahadir->TRANSLATE_WORD($PAGE["NAV_TITLE"]); ?></a>
                                            </li>
                                        <?php 
                                        }
                                        ?>
                                    </ul>
                                <?php
                                }
                                ?>

                            </li>
                        <?php
                        }
                        ?>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div id="araCont">
                        <a id="c-button--push-right" class="cPushMenuIcon" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="25px" height="25px" viewbox="0 0 459 459" style="enable-background: new 0 0 459 459;" xml:space="preserve">
                                <g>
                                    <g id="menu">
                                        <path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z" fill="#027436"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <div class="smallBannerSearch">
                            <a href="javascript:void(0)" id="search_icon2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="22px" height="22px" viewbox="0 0 80.502 80.502" style="enable-background: new 0 0 80.502 80.502;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <path d="M80.502,74.658L58.688,52.742c4.193-5.524,6.691-12.416,6.691-19.885c0-18.104-14.664-32.84-32.69-32.84     S0,14.753,0,32.857c0,18.111,14.664,32.848,32.689,32.848c7.643,0,14.674-2.655,20.247-7.088l21.768,21.867L80.502,74.658z      M32.689,58.312c-13.967,0-25.332-11.419-25.332-25.455c0-14.027,11.365-25.446,25.332-25.446     c13.968,0,25.333,11.419,25.333,25.446C58.021,46.894,46.657,58.312,32.689,58.312z" fill="#027436"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="bannerSearch">
                            <ul class="searchContainer">
                                <li>
                                    <input id="txt_search" type="text" class="txt_search" placeholder="<?php echo $bahadir->TRANSLATE_WORD("Site'de ara..."); ?>" autocomplete="off" />
                                </li>
                                <li>
                                    <button class="btn_search"></button>
                                </li>
                            </ul>
                        </div>
                        <div class="languageContainer">
                            <ul>
                                <?php
                                $LANGUAGES = $bahadir->mssqlDb->Select("SELECT *FROM translate.LANGUAGE WHERE VISIBILITY = 1 ORDER BY ID ASC");
                                foreach ($LANGUAGES as $LANGUAGE)
                                {
                                ?>
                                <li>
                                    <a href="?lang=<?php echo $LANGUAGE["LANGUAGE_SHORT"]; ?>">
                                        <?php echo $LANGUAGE["LANGUAGE_SHORT"]; ?>
                                    </a>
                                </li>
                              <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="smallSearchBannerContainer">
                    <a class="smallSearchBannerContainerCloseIconContainer" id="smallSearchCloseIcon" href="javascript:void(0)">
                        <img src="/assets/img/smallSearchCloseIcon.png" />
                    </a>
                    <div class="smallSearchBannerContainerCloseIconLine"></div>
                    <input id="txt_small_txt_search" type="text" class="small_txt_search" placeholder="<?php echo $bahadir->TRANSLATE_WORD("Sitede Ara...");?>" autocomplete="off" />
                    <button class="small_btn_search"></button>
                </div>
            </div>
        </div>
        <div id="content-container">
            <?php include_once('rewrite.php'); ?>
        </div>
        <div id="footerIletisimContainer">
            <div class="homeIletisimBosluk"></div>
            <div class="siteContainer col-md-12" id="iletisimContainer1">
                <div class="homeIletisimTitle"><?php echo $bahadir->TRANSLATE_WORD("İLETİŞİM");?></div>
                <div class="homeIletisimSubBox"></div>
                <div class="homeIletisimSubBox2"></div>
                <div class="clear"></div>
                <div class="homeIletisimBosluk2"></div>
                <div class="homeIletisimBizeUlasinContainer">
                    <div class="homeIletisimBizeUlasin">                        
                        <?php echo $bahadir->TRANSLATE_WORD("Bize Ulaşın");?>
                    </div>
                    <div class="homeIletisimFirmaIsmi">                        
                        <?php echo $bahadir->TRANSLATE_WORD("BAHADIR TIBBİ ALETLER AŞ");?>
                    </div>
                    <div class="homeIletisimAdres" style="margin-top: 20px;">
                        Organize Sanayi Bölgesi 55300
                    </div>
                    <div class="clear"></div>
                    <div class="homeIletisimAdres">
                        Samsun / Türkiye
                    </div>
                    <div class="clear"></div>
                    <div class="homeIletisimAdres" style="margin-top: 20px;">
                        info@bahadir.com.tr
                    </div>
                    <div class="clear"></div>
                    <table style="margin-top: 20px;">
                        <tr>
                            <td>Tel</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td>+90 (362) 266 7000 </td>
                        </tr>
                        <tr>
                            <td>
                                Faks
                            </td>
                            <td>&nbsp; : &nbsp;</td>
                            <td>
                                +90 (362) 266 7005
                            </td>
                        </tr>
                    </table>
                    <div class="clear"></div>
                </div>
                <div class="homeIletisimMailAboneligiContainer">
                    <div class="homeIletisimBizeUlasin">                        
                        <?php echo $bahadir->TRANSLATE_WORD("Mail Aboneliği");?>
                    </div>
                    <div class="mailAboneligiContainer">
                        <input id="txtEbultenEposta" type="text" class="txt_mailAboneligi" />
                        <button class="btn_mailAboneligi"><?php echo $bahadir->TRANSLATE_WORD("Gönder");?></button>
                        <div class="clear"></div>
                        <div class="mailAboneligiTextContainer">
                            <?php echo $bahadir->TRANSLATE_WORD("En son gelişmeler hakkında bilgi almak için eposta listemize üye olabilirsiniz.");?>                           
                        </div>
                    </div>
                </div>
                <div class="homeIletisimSosyalMedyaContainer">
                    <div class="homeIletisimSosyalMedyaContainerSosyalMedya">
                        <div class="homeIletisimSosyalMedyaContainerSosyalMedyaTitle">                           
                            <?php echo $bahadir->TRANSLATE_WORD("Sosyal Medya");?>
                        </div>
                        <ul class="footerSocialMediaContainer">
                            <li>
                                <a id="footerSocialMediaContainer_Linkedin" href="#">
                                    <svg id="footerSocialMediaContainer_LinkedinPasif" height="28px" style="enable-background: new 0 0 67 67;" version="1.1" viewbox="0 0 67 67" width="28px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M49.837,48.137V36.425c0-6.274-3.35-9.194-7.816-9.194  c-3.604,0-5.219,1.982-6.119,3.373V27.71h-6.79c0.09,1.917,0,20.428,0,20.428h6.79V36.729c0-0.61,0.044-1.22,0.224-1.657  c0.49-1.219,1.607-2.482,3.482-2.482c2.458,0,3.44,1.873,3.44,4.618v10.929H49.837z M21.959,24.922c2.367,0,3.842-1.569,3.842-3.531  c-0.044-2.003-1.475-3.528-3.797-3.528s-3.841,1.525-3.841,3.528c0,1.962,1.474,3.531,3.753,3.531H21.959z M25.354,48.137V27.71  h-6.789v20.427H25.354z M3,4h60v60H3V4z" style="fill-rule: evenodd; clip-rule: evenodd; fill: #b0b0b0;"></path>
                                    </svg>
                                    <svg id="footerSocialMediaContainer_LinkedinAktif" height="28px" style="enable-background: new 0 0 67 67;" version="1.1" viewbox="0 0 67 67" width="28px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M49.837,48.137V36.425c0-6.274-3.35-9.194-7.816-9.194  c-3.604,0-5.219,1.982-6.119,3.373V27.71h-6.79c0.09,1.917,0,20.428,0,20.428h6.79V36.729c0-0.61,0.044-1.22,0.224-1.657  c0.49-1.219,1.607-2.482,3.482-2.482c2.458,0,3.44,1.873,3.44,4.618v10.929H49.837z M21.959,24.922c2.367,0,3.842-1.569,3.842-3.531  c-0.044-2.003-1.475-3.528-3.797-3.528s-3.841,1.525-3.841,3.528c0,1.962,1.474,3.531,3.753,3.531H21.959z M25.354,48.137V27.71  h-6.789v20.427H25.354z M3,4h60v60H3V4z" style="fill-rule: evenodd; clip-rule: evenodd; fill: #444444;"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a id="footerSocialMediaContainer_Twitter" href="#">
                                    <svg id="footerSocialMediaContainer_TwitterPasif" height="28px" style="enable-background: new 0 0 67 67;" version="1.1" viewbox="0 0 67 67" width="28px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M37.167,22.283c-2.619,0.953-4.274,3.411-4.086,6.101  l0.063,1.038l-1.048-0.127c-3.813-0.487-7.145-2.139-9.974-4.915l-1.383-1.377l-0.356,1.017c-0.754,2.268-0.272,4.661,1.299,6.271  c0.838,0.89,0.649,1.017-0.796,0.487c-0.503-0.169-0.943-0.296-0.985-0.233c-0.146,0.149,0.356,2.076,0.754,2.839  c0.545,1.06,1.655,2.098,2.871,2.712l1.027,0.487l-1.215,0.021c-1.173,0-1.215,0.021-1.089,0.466  c0.419,1.377,2.074,2.839,3.918,3.475l1.299,0.444l-1.131,0.678c-1.676,0.975-3.646,1.525-5.616,1.568  C19.775,43.256,19,43.341,19,43.404c0,0.212,2.557,1.398,4.044,1.864c4.463,1.377,9.765,0.784,13.746-1.567  c2.829-1.674,5.657-5,6.978-8.22c0.713-1.716,1.425-4.852,1.425-6.355c0-0.975,0.063-1.102,1.236-2.267  c0.692-0.679,1.341-1.419,1.467-1.631c0.21-0.403,0.188-0.403-0.88-0.044c-1.781,0.637-2.033,0.552-1.152-0.401  c0.649-0.678,1.425-1.907,1.425-2.268c0-0.062-0.314,0.042-0.671,0.233c-0.377,0.212-1.215,0.53-1.844,0.72l-1.131,0.361l-1.027-0.7  c-0.566-0.381-1.361-0.805-1.781-0.932C39.766,21.902,38.131,21.944,37.167,22.283z M3,4h60v60H3V4z" style="fill-rule: evenodd; clip-rule: evenodd; fill: #b0b0b0;"></path>
                                    </svg>
                                    <svg id="footerSocialMediaContainer_TwitterAktif" height="28px" style="enable-background: new 0 0 67 67;" version="1.1" viewbox="0 0 67 67" width="28px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M37.167,22.283c-2.619,0.953-4.274,3.411-4.086,6.101  l0.063,1.038l-1.048-0.127c-3.813-0.487-7.145-2.139-9.974-4.915l-1.383-1.377l-0.356,1.017c-0.754,2.268-0.272,4.661,1.299,6.271  c0.838,0.89,0.649,1.017-0.796,0.487c-0.503-0.169-0.943-0.296-0.985-0.233c-0.146,0.149,0.356,2.076,0.754,2.839  c0.545,1.06,1.655,2.098,2.871,2.712l1.027,0.487l-1.215,0.021c-1.173,0-1.215,0.021-1.089,0.466  c0.419,1.377,2.074,2.839,3.918,3.475l1.299,0.444l-1.131,0.678c-1.676,0.975-3.646,1.525-5.616,1.568  C19.775,43.256,19,43.341,19,43.404c0,0.212,2.557,1.398,4.044,1.864c4.463,1.377,9.765,0.784,13.746-1.567  c2.829-1.674,5.657-5,6.978-8.22c0.713-1.716,1.425-4.852,1.425-6.355c0-0.975,0.063-1.102,1.236-2.267  c0.692-0.679,1.341-1.419,1.467-1.631c0.21-0.403,0.188-0.403-0.88-0.044c-1.781,0.637-2.033,0.552-1.152-0.401  c0.649-0.678,1.425-1.907,1.425-2.268c0-0.062-0.314,0.042-0.671,0.233c-0.377,0.212-1.215,0.53-1.844,0.72l-1.131,0.361l-1.027-0.7  c-0.566-0.381-1.361-0.805-1.781-0.932C39.766,21.902,38.131,21.944,37.167,22.283z M3,4h60v60H3V4z" style="fill-rule: evenodd; clip-rule: evenodd; fill: #444444;"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a id="footerSocialMediaContainer_Facebook" href="#">
                                    <svg id="footerSocialMediaContainer_FacebookPasif" height="28px" style="enable-background: new 0 0 67 67;" version="1.1" viewbox="0 0 67 67" width="28px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M28.765,50.319h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.319z   M3,4h60v60H3V4z" style="fill-rule: evenodd; clip-rule: evenodd; fill: #b0b0b0;"></path>
                                    </svg>
                                    <svg id="footerSocialMediaContainer_FacebookAktif" height="28px" style="enable-background: new 0 0 67 67;" version="1.1" viewbox="0 0 67 67" width="28px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M28.765,50.319h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.319z   M3,4h60v60H3V4z" style="fill-rule: evenodd; clip-rule: evenodd; fill: #444444;"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="homeIletisimSosyalMedyaContainerLine"></div>
                    <div class="homeIletisimSosyalMedyaContainerDestek">
                        <div class="homeIletisimSosyalMedyaContainerDestekTitle"><?php echo $bahadir->TRANSLATE_WORD("Destek");?></div>
                        <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                            <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Site Haritası");?></a>
                        </div>
                        <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                            <a href="#"><?php echo $bahadir->TRANSLATE_WORD("İstek Ve Şikayetler");?></a>
                        </div>
                        <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                            <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Yetkili Bölge Bayilikleri");?></a>
                        </div>
                        <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                            <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Gizlilik Politikası");?></a>
                        </div>
                        <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                            <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Kullanım Şartları");?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="iletisimContainer2">
                <div class="iletisimContainer2_homeIletisimTitle"><?php echo $bahadir->TRANSLATE_WORD("İLETİŞİM");?></div>
                <div class="iletisimContainer2_homeIletisimLine1">
                    <div class="iletisimContainer2_homeIletisimLine1Left"></div>
                    <div class="iletisimContainer2_homeIletisimLine1Right"></div>
                </div>
                <div class="iletisimContainer2_homeIletisimLine2"></div>
                <div class="siteContainer">
                    <div class="iletisimContainer2_homeIletisimBizeUlasinContainer">
                        <div class="iletisimContainer2_homeIletisimBizeUlasinContainerTitle">                            
                            <?php echo $bahadir->TRANSLATE_WORD("Bize Ulaşın");?>
                        </div>
                        <div class="iletisimContainer2_homeIletisimFirmaIsmi">
                            BAHADIR TIBBİ ALETLER AŞ
                        </div>
                        <div class="iletisimContainer2_homeIletisimAdres" style="margin-top: 20px;">
                            Organize Sanayi Bölgesi 55300
                        </div>
                        <div class="iletisimContainer2_homeIletisimAdres">
                            Samsun / Türkiye
                        </div>
                        <div class="iletisimContainer2_homeIletisimAdres" style="margin-top: 20px;">
                            info@bahadir.com.tr
                        </div>
                        <div class="clear"></div>
                        <table style="margin-top: 20px;">
                            <tr>
                                <td>Tel</td>
                                <td>&nbsp; : &nbsp;</td>
                                <td>+90 (362) 266 7000 </td>
                            </tr>
                            <tr>
                                <td>
                                    Faks
                                </td>
                                <td>&nbsp; : &nbsp;</td>
                                <td>
                                    +90 (362) 266 7005
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="clear iletisimContainer2_homeIletisimBizeUlasinContainerSubLine"></div>
                    <div class="iletisimContainer2_homeIletisimMailAboneligiContainer">
                        <div class="iletisimContainer2_homeIletisimMailAboligiTitle">                            
                            <?php echo $bahadir->TRANSLATE_WORD("Mail Aboneliği");?>
                        </div>
                        <div class="iletisimContainer2_mailAboneligiContainer">
                            <input id="txt_search" type="text" class="iletisimContainer2_txt_mailAboneligi" />
                            <button class="iletisimContainer2_btn_mailAboneligi"><?php echo $bahadir->TRANSLATE_WORD("Gönder");?></button>
                            <div class="clear"></div>
                            <div class="mailAboneligiTextContainer">
                                <?php echo $bahadir->TRANSLATE_WORD("You can subscribe to our mailing list to be informed about the latest happenings");?>.
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="iletisimContainer2_homeIletisimSosyalMedyaContainer">
                    <div class="homeIletisimSosyalMedyaGeneralContainerSosyalMedya">
                        <div class="homeIletisimSosyalMedyaContainerSosyalMedya">
                            <div class="homeIletisimSosyalMedyaContainerSosyalMedyaTitle">                               
                                <?php echo $bahadir->TRANSLATE_WORD("Sosyal Medya");?>
                            </div>
                            <ul class="footerSocialMediaContainer">
                                <li>
                                    <a href="#">
                                        <img data-active="/assets/img/ln_aktif_2.png" data-passive="/assets/img/ln_pasif_2.png" src="/assets/img/ln_pasif_2.png" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img data-active="/assets/img/tw_aktif_2.png" data-passive="/assets/img/tw_pasif_2.png" src="/assets/img/tw_pasif_2.png" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img data-active="/assets/img/fb_aktif_2.png" data-passive="/assets/img/fb_pasif_2.png" src="/assets/img/fb_pasif_2.png" />
                                    </a>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="homeIletisimSosyalMedyaContainerLine"></div>
                        <div class="clear homeIletisimSosyalMedyaContainerLineSubLibeClear"></div>
                        <div class="homeIletisimSosyalMedyaContainerLine2"></div>
                        <div class="clear homeIletisimSosyalMedyaContainerLineSubLibe"></div>
                        <div class="homeIletisimSosyalMedyaContainerDestek">
                            <div class="homeIletisimSosyalMedyaContainerDestekTitle">Destek</div>
                            <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                                <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Site Haritası");?></a>
                            </div>
                            <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                                <a href="#"><?php echo $bahadir->TRANSLATE_WORD("İstek Ve Şikayetler");?></a>
                            </div>
                            <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                                <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Yetkili Bölge Bayilikleri");?></a>
                            </div>
                            <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                                <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Gizlilik Politikası");?></a>
                            </div>
                            <div class="homeIletisimSosyalMedyaContainerDestekMenu">
                                <a href="#"><?php echo $bahadir->TRANSLATE_WORD("Kullanım Şartları");?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="footerLine"></div>
    </div>

    <nav id="c-menu--push-right" class="c-menu c-menu--push-right">
        <div class="c-menu__close" style="margin-top: -8.5px; height: 92px;">
            <a href="javascript:void(0)" class="menu__closeIcon">
                <svg style="float: right; margin-right: 20px; margin-top: 10px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="25px" height="25px" viewbox="0 0 459 459" style="enable-background: new 0 0 459 459;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z" fill="#FFFFFF"></path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <?php
        $PAGE_CATEGORIES = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGE_CATEGORY WHERE VISIBILITY = 1 ORDER BY SEQUENCE ASC");
        foreach($PAGE_CATEGORIES as $PAGE_CATEGORY)
        {
            $PAGE_CATEGORY_ID = $PAGE_CATEGORY["ID"];
            $PAGES = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE PAGE_CATEGORY_ID = $PAGE_CATEGORY_ID AND VISIBILITY = 1 ORDER BY SEQUENCE ASC");
            
            if(count($PAGES) == 0){            
            ?>
             <ul class="cPushMenuContainer headerItem">
                <li>
                    <a href="<?php echo $bahadir->TRANSLATE_WORD($PAGE_CATEGORY["URL"]); ?>">
                        <div><?php echo $bahadir->TRANSLATE_WORD($PAGE_CATEGORY["CATEGORY_NAME"]);?></div>
                    </a>
                </li>
            </ul>
            <?php
            }else{
            ?>
            <div class="clear"></div>
            <ul class="cPushMenuContainer">
                <li class="cPushMenuContainerItemHeaderLi" data-category-id="<?php echo $PAGE_CATEGORY["ID"];?>">
                    <a class="cPushMenuContainerItemHeaderHref" data-category-id="<?php echo $PAGE_CATEGORY["ID"];?>" href="javascript:void(0)" data-category-id="<?php echo $PAGE_CATEGORY["ID"];?>">
                        <div>
                            <?php echo $bahadir->TRANSLATE_WORD($PAGE_CATEGORY["CATEGORY_NAME"]);?>
                            <svg class="cPushMenuContainerItemHeaderHref_Arti" data-category-id="<?php echo $PAGE_CATEGORY["ID"];?>" style="float: right; margin-top: 12px; margin-right: 30px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve" width="21px" height="21px">
                                <polygon points="42,20 22,20 22,0 20,0 20,20 0,20 0,22 20,22 20,42 22,42 22,22 42,22 " fill="#027436"></polygon>
                            </svg>
                            <svg class="cPushMenuContainerItemHeaderHref_Eksi" data-category-id="<?php echo $PAGE_CATEGORY["ID"];?>" style="float: right; margin-top: 12px; margin-right: 30px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewbox="0 0 455 455" style="enable-background:new 0 0 455 455;" xml:space="preserve" width="21px" height="21px">
                                <rect y="212.5" width="455" height="30" fill="#027436"></rect>
                            </svg>
                        </div>
                        <div class="clear"></div>
                    </a>
                </li>
            </ul>
            <div class="cPushMenuSubItemContainer" data-slide="false" data-category-id="<?php echo $PAGE_CATEGORY["ID"];?>">
                <ul>
                    <?php
                    foreach($PAGES as $PAGE){
                    ?>
                    <li>
                        <a href="<?php echo $bahadir->TRANSLATE_WORD($PAGE["URL"]); ?>">
                            <img style="float: left; margin-top: 21px;" src="/assets/img/cPushMenuRight.png" />&nbsp; <?php echo $bahadir->TRANSLATE_WORD($PAGE["NAV_TITLE"]);?>
                        </a>
                    </li>                    
                    <?php 
                    }
                    ?>
                </ul>
            </div>
            <?php
            }
        }
        ?>
    </nav>
    
    <div id="c-mask" class="c-mask"></div>
    <script src="/assets/js/menu.js"></script>
    <script src="/assets/js/Master.js"></script>
    <script src="/assets/js/swiper.min.js"></script>
    <!--<script src="/assets/plugins/page-scroll/TweenMax.min.js"></script>
    <script src="/assets/plugins/page-scroll/ScrollToPlugin.js"></script>-->
</body>
</html>