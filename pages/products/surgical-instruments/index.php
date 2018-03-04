<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css" rel="stylesheet" />
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat');
</style>
<link href="/pages/products/surgical-instruments/style.css" type="text/css" rel="stylesheet" />
<script src="/pages/products/surgical-instruments/script.js" type="text/javascript"></script>

<div class="content-container">
    <div class="page-header"></div>
    <div class="container">
        <div class="cerrahiAletlerUstBosluk"></div>
        <div class="swiper-container swiper-container-horizontal" style="height:auto; padding-bottom:20px;">
            <div class="swiper-wrapper sliderCont">
                <div class="swiper-slide swiper-slide-active">
                    <div class="siteContainer" style="padding-left:0; padding-right:0;">
                        <div id="cerrahiAletBannerContainer">
                            <div class="siteContainer">
                                <div class="cerrahiAletBannerLeft">
                                    <div class="cerrahiAletBannerLeftTitle"><?php echo $bahadir->TRANSLATE_WORD("CERRAHİ ALETLER"); ?></div>
                                    <div class="cerrahiAletBannerLeftTitleSubLine"></div>
                                    <div class="cerrahiAletBannerLeftText">
                                        <?php echo $bahadir->TRANSLATE_WORD("13 bin'e yakın ürün portföyümüzü ilgili branşlarda yer alan dokümanlar ile görüntüleyebilirsiniz."); ?>
                                    </div>
                                </div>
                                <div class="cerrahiAletBannerLeftLineClear clear"></div>
                                <div class="cerrahiAletBannerLeftLine"></div>
                                <div class="cerrahiAletBannerRight">
                                    <p><?php echo $bahadir->TRANSLATE_WORD("Bahadır Tıbbi aletler firmasının üretim programında; Genel Cerrahi, Beyin Cerrahi, Plastik ve Rekonstrüktif Cerrahi, KBB, Kadın Doğum, Üroloji, Ortopedi, Kalp-Damar, Elektrocerrahi, Göz ve Mikrocerrahi branşlarının yanısıra modern branşlar olan Endoskopik (Artroskopi, Laparaskopi) cerrahi branşlarda da cerrahi alet üretimi yapmaktadır.&nbsp;Bu aletler operasyonun içeriğine yönelik olarak; hassas mikro ameliyatlar için titanyum malzeme, elektrocerrahi için ısıya dayanıklı plastik tutma sapları, dayanıklı kesiler için elmas uçlar, pvd ve altın kaplama gibi birçok teknikte üretilebilmektedir."); ?></p>
                                    <p>&nbsp;</p>
                                    <p><?php echo $bahadir->TRANSLATE_WORD("Genel kataloğumuzu indirmek için tıklayınız."); ?></p>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="cerrahiAletBannerSubLine"></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="branch-item-container">

                    <?php
                    $BRANCHES = $bahadir->mssqlDb->Select("SELECT ID,SEQUENCE,TITLE,SHORT_TITLE,SUB_TITLE,DETAILS,VISIBILITY FROM product.BRANCH WHERE VISIBILITY = 1 ORDER BY SEQUENCE ASC");
                    foreach ($BRANCHES as $BRANCH)
                    {
                        $BRANCH_ID = $BRANCH["ID"];
                    ?>

                    <div class="branch-item col-xs-12 col-sm-12 col-md-6 col-lg-4" data-branch-id="<?php echo $BRANCH["ID"]; ?>">
                        <div class="branch-item-header">
                            <div class="branch-header-left col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background:url(/panel/system/ViewBinaryImage.php?OPTION=BRANCH&&ID=<?php echo $BRANCH["ID"]; ?>) right center / cover no-repeat #fff;"></div>
                            <div class="branch-header-right col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h3 class="branch-header-h3">
                                    <span>
                                        <?php echo $bahadir->TRANSLATE_WORD($BRANCH["SHORT_TITLE"]); ?> /
                                    </span>
                                    <span>
                                        <?php echo $bahadir->TRANSLATE_WORD($BRANCH["TITLE"]); ?>
                                    </span>
                                    <small id="branch-sub-title">
                                        <?php echo $bahadir->TRANSLATE_WORD($BRANCH["SUB_TITLE"]); ?>
                                    </small>
                                    <div class="header-text-h3-slash">
                                        <img src="../../../assets/img/BranchDetailSlash.png" />
                                    </div>
                                </h3>
                            </div>
                            <div class="details-text col-xs-12 col-sm-12 col-md-6 col-lg-7">
                                <?php echo $bahadir->fnc->textOverflow($bahadir->TRANSLATE_WORD($BRANCH["DETAILS"]), 318); ?>
                            </div>
                        </div>
                        <div class="branch-details col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                            <div class="detail-bottom-first-content col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="pdf-container">
                                    <div class="pdf-icon-conteiner">
                                        <img class="pdf-icon" src="../../../assets/img/pdf_down_icon.png" />
                                    </div>
                                    <div class="pdf-download-text">
                                        <?php
                                        echo $bahadir->TRANSLATE_WORD("KALP VE DAMAR CERRAHİ");
                                        ?>
                                    </div>
                                    <div class="pdf-download-text-small">
                                        <?php
                                        echo $bahadir->TRANSLATE_WORD("KATALOĞUMUZU İNDİRMEK İÇİN TIKLAYIN");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                                $BRANCH_CATALOGS = $bahadir->mssqlDb->Select("SELECT ID, TITLE FROM product.BRANCH_CATALOG WHERE BRANCH_ID = $BRANCH_ID");
                                $TOTAL = count($BRANCH_CATALOGS);
                                $PER_COUNT = ceil($TOTAL / 3);

                                $LISTE = [];
                                $x = 0;
                                $list_index = 0;

                                for ($i = 0; $i < $TOTAL; $i++)
                                {
                                    $x++;
                                    if($x <= $PER_COUNT){
                                        $LISTE[$list_index][$i] = $BRANCH_CATALOGS[$i];
                                        if($x == $PER_COUNT){
                                            $list_index ++;
                                            $x = 0;
                                        }
                                    }
                                }
                            ?>

                            <div id="branch-details-catalog-container col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                <div class="detail-bottom-left-content col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <ul>
                                        <?php
                                        if(count($LISTE) >= 1){
                                            foreach ($LISTE[0] as $CATALOG)
                                            {
                                                echo '<li class="bracnch-catalog-hyperlink-item"><a href="'. $CATALOG["ID"] .'/'. $bahadir->fnc->turkce_karakter_temizle($bahadir->TRANSLATE_WORD($CATALOG["TITLE"])) .'.pdf" title="'. $bahadir->TRANSLATE_WORD($CATALOG["TITLE"]) .'" target="_blank">'. $bahadir->fnc->textOverflow($bahadir->TRANSLATE_WORD($CATALOG["TITLE"]), 38, true) .'</a></li>';
                                            }
                                        }else{
                                            echo $bahadir->TRANSLATE_WORD("bu branşa ait kataloglar henüz eklenmedi");
                                        }
                                        ?>
                                    </ul>
                                </div>                          
                                <div class="detail-bottom-middle-content col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <ul>
                                        <?php
                                        if(count($LISTE) >= 2){
                                            foreach ($LISTE[1] as $CATALOG)
                                            {
                                                echo '<li class="bracnch-catalog-hyperlink-item"><a href="'. $CATALOG["ID"] .'/'. $bahadir->fnc->turkce_karakter_temizle($bahadir->TRANSLATE_WORD($CATALOG["TITLE"])) .'.pdf" title="'. $bahadir->TRANSLATE_WORD($CATALOG["TITLE"]) .'" target="_blank">'. $bahadir->fnc->textOverflow($bahadir->TRANSLATE_WORD($CATALOG["TITLE"]), 38, true) .'</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>                           
                                <div class="detail-bottom-right-content col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <ul>
                                        <?php
                                        if(count($LISTE) >= 3){
                                            foreach ($LISTE[2] as $CATALOG)
                                            {
                                                echo '<li class="bracnch-catalog-hyperlink-item"><a href="'. $CATALOG["ID"] .'/'. $bahadir->fnc->turkce_karakter_temizle($bahadir->TRANSLATE_WORD($CATALOG["TITLE"])) .'.pdf" title="'. $bahadir->TRANSLATE_WORD($CATALOG["TITLE"]) .'" target="_blank">'. $bahadir->fnc->textOverflow($bahadir->TRANSLATE_WORD($CATALOG["TITLE"]), 38, true) .'</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>

                    <?php
                    }
                    ?>
                    <div class="mydrop modal-backdrop fade show">
                        <div id='myContainer' class='row'></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <link href="/assets/Css/Resolution/CerrahiAlet.css" rel="stylesheet" />
    </div>
</div>

<div id="btnBranchModalClose" class="branch-close-button">
<img src="../../../assets/img/BranchDetailPlus.png" />
</div>