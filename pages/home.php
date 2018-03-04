
<script src="/assets/js/bootstrap.min.js"></script>
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/css/jquerysctipttop.css" rel="stylesheet" />
<link href="/assets/css/Resolution/Default.css" rel="stylesheet" />
<link href="/assets/css/swiper.min.css" rel="stylesheet" />
<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="/assets/css/Resolution/ie.css" />
<![endif]-->
<div id="slider">
    <div class="swiper-container swiper-container-horizontal">
        <div class="sliderButton">
            <a class="sliderTurnLeftPasif left" href="javascript:void(0)" data-slide="prev" style="margin-top: 187px; opacity: 1;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="30px" height="30px" viewbox="0 0 370.814 370.814" style="enable-background: new 0 0 370.814 370.814;" xml:space="preserve">
                    <g>
                        <g>
                            <polygon points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401" fill="#027436"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
            <a class="sliderTurnRightPasif right" href="javascript:void(0)" data-slide="next" style="margin-top: 187px; opacity: 1;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 478.448 478.448" style="enable-background: new 0 0 478.448 478.448;" xml:space="preserve" width="30px" height="30px">
                    <g>
                        <g>
                            <polygon points="131.659,0 100.494,32.035 313.804,239.232 100.494,446.373 131.65,478.448     377.954,239.232   " fill="#027436"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
            <a class="sliderTurnLeftAktif left swiper-button-prev swiper-button-disabled" href="javascript:void(0)" data-slide="prev" style="margin-top: 187px; opacity: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="30px" height="30px" viewbox="0 0 370.814 370.814" style="enable-background: new 0 0 370.814 370.814;" xml:space="preserve">
                    <g>
                        <g>
                            <polygon points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401" fill="#fff"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
            <a class="sliderTurnRightAktif right swiper-button-next" href="javascript:void(0)" data-slide="next" style="margin-top: 187px; opacity: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 478.448 478.448" style="enable-background: new 0 0 478.448 478.448;" xml:space="preserve" width="30px" height="30px">
                    <g>
                        <g>
                            <polygon points="131.659,0 100.494,32.035 313.804,239.232 100.494,446.373 131.65,478.448     377.954,239.232   " fill="#fff"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <div class="swiper-wrapper">
            <?php
            $SLIDERS = $bahadir->mssqlDb->Select("SELECT ID,SEQUENCE,TITLE1,TITLE2,DESCRIPTION,SEO FROM site.SLIDER WHERE VISIBILITY = 1 ORDER BY SEQUENCE ASC");
            foreach ($SLIDERS as $SLIDER)
            {
            ?>

            <div class="swiper-slide swiper-slide-active" style="background: url(/<?php echo $SLIDER["ID"]; ?>.img) center center / cover no-repeat rgb(63, 66, 75); width: 1591px; height: 424.2px;">
                <div class="sliderListeIEfiltre" style="height: 424.2px;">
                    <div class="sliderItemContainerFilter">
                        <div class="sliderCaption">
                            <div class="slideAuto">
                                <div class="slideAutoRightContainer">
                                    <div class="sliderBorder">
                                        <div class="sliderTitle">
                                            <?php echo $bahadir->TRANSLATE_WORD($SLIDER["TITLE1"]); ?>
                                        </div>
                                        <div class="sliderTitle2">
                                            <?php echo $bahadir->TRANSLATE_WORD($SLIDER["TITLE2"]); ?>
                                        </div>

                                        <div class="sliderDescription">
                                            <?php echo $bahadir->TRANSLATE_WORD($SLIDER["DESCRIPTION"]); ?>
                                        </div>
                                    </div>
                                    <a href="/<?php echo $SLIDER["SEO"]; ?>.html">
                                        <div class="sliderLearnMore">
                                            <?php echo $bahadir->TRANSLATE_WORD("DAHA FAZLASI"); ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
            <?php
            $first = true;
            foreach ($SLIDERS as $SLIDER)
            {
                if($first == true){
                    $first = false;
            ?>
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
            <?php } else { ?>
            <span class="swiper-pagination-bullet"></span>
            <?php }
            }
            ?>
        </div>
    </div>

</div>
<div class="clear"></div>
<div class="sliderSlideToLine"></div>
<div class="clear"></div>


<div class="siteContainer" id="homeDownloadPageContainer_homeNewsAndAnnouncementContainer">

    <div class="homeDownloadPageContainer">
        <a href="/Indirme">
            <div class="homeDownloadPageContainerTitle1">
                <?php echo $bahadir->TRANSLATE_WORD("hızlı geçiş"); ?>
            </div>
            <div class="homeDownloadPageContainerTitle2">
                <?php echo $bahadir->TRANSLATE_WORD("İndirme sayfası"); ?>
            </div>
            <img class="downloadPageLine" src="/assets/img/downloadLine.PNG" />
            <div class="downloadPageDescription">
                <?php echo $bahadir->TRANSLATE_WORD("ürün portfolyamızı ilgili branşlar içeriside görebilirsiniz."); ?>
            </div>
            <img class="downloadPageCatalog" src="/assets/img/downloadPageCatalog.png" />
        </a>
    </div>

    <?php
    $HABERLER = $bahadir->mssqlDb->Select("SELECT TOP 5 ID,TITLE1,TITLE2,DESCRIPTION,CONTENT_HTML,DATE,SEQUENCE FROM site.NEWS ORDER BY ID ASC");
    ?>
    <div class="homeNewsAndAnnouncementContainer">
        <div class="homeNewsAndAnnouncementContainerFull">
            <div class="homeNewsAndAnnouncementContainerBackGround">
                <div class="homeNewsAndAnnouncementImgTitleContainer">
                    <div class="homeNewsAndAnnouncementImgTitleContainerFiltre" style="background-image: url(/panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=<?php echo $HABERLER[0]["ID"]; ?>)">
                        <div class="homeNewsAndAnnouncementImgTitleContainerFiltreBand"  style="background-image: url(/panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=<?php echo $HABERLER[0]["ID"]; ?>)">
                            <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle1Main">
                                <?php echo $bahadir->TRANSLATE_WORD($HABERLER[0]["TITLE1"]); ?>
                            </div>
                            <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle2">
                                <?php echo $bahadir->TRANSLATE_WORD($HABERLER[0]["TITLE2"]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="homeNewsAndAnnouncementBannerContainer">
                    <div class="homeNewsAndAnnouncementBannerContainerTitle">
                        <?php echo $bahadir->TRANSLATE_WORD("haber & duyurular"); ?>
                    </div>
                    <div class="homeNewsAndAnnouncementBannerContainerTitleLine"></div>
                    <div class="homeNewsAndAnnouncementBannerContainerText">
                        <?php echo $bahadir->TRANSLATE_WORD("en son gelişmeler hakkında bilgi almak için posta listemize üye olabilirsiniz."); ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="paddingText">
            <div class="homeNewsAndAnnouncementImgTitleContainerText">
                <div class="homeNewsAndAnnouncementImgTitleContainerTextInner">
                    <?php echo $bahadir->TRANSLATE_WORD($HABERLER[0]["CONTENT_HTML"], true); ?>
                </div>
                <div class="homeNewsAndAnnouncementImgTitleContainerTextInner1CloseIcon">
                    <a href="javascript:void(0)">
                        <img src="/assets/img/haberCloseIcon.png" />
                    </a>
                </div>
                <a style="float: left;" data-id="<?php echo $HABERLER[0]["ID"]; ?>" id="homeNewsAndAnnouncementImgTitleContainerTextSeeMore1" class="homeNewsAndAnnouncementImgTitleContainerTextSeeMore seeMore" href="javascript:void(0)">
                    <?php echo $bahadir->TRANSLATE_WORD("daha fazlası..."); ?>
                </a>
            </div>
            <div class="homeNewsAndAnnouncementItemContainer">
                <?php
                $ILK_KAYIT_LISTELENDIMI = false;
                foreach ($HABERLER as $HABER)
                {
                    if($ILK_KAYIT_LISTELENDIMI == false){ $class = "homeNewsAndAnnouncementItemContainerItemActive"; $ILK_KAYIT_LISTELENDIMI = TRUE; }
                ?>
                <a data-id="<?php echo $HABER["ID"]; ?>" href="javascript:void(0)" class="homeNewsAndAnnouncementItemContainerItem <?php echo $class; ?>">
                    <img class="homeNewsAndAnnouncementItemContainerItemImg" src="/assets/img/homeNewsAndAnnouncementContainerNewsOk.png" />
                    <div class="homeNewsAndAnnouncementItemContainerItemTitle">
                        <?php echo $bahadir->TRANSLATE_WORD($HABER["TITLE1"]); ?><?php echo $bahadir->TRANSLATE_WORD($HABER["TITLE2"]); ?>
                    </div>
                    <div class="clear"></div>
                </a>
                <?php
                }
                ?>
            </div>
            <div class="clear"></div>
            <div class="homeNewsAndAnnouncementSocialMediaContainer">
                <div class="homeNewsAndAnnouncementContainerInfoIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 199.943 199.943" style="enable-background: new 0 0 199.943 199.943;" xml:space="preserve" width="25px" height="25px">
                        <g>
                            <g>
                                <path d="M99.972,0.004C44.85,0.004,0,44.847,0,99.968c0,55.125,44.847,99.972,99.972,99.972    s99.972-44.847,99.972-99.972C199.943,44.847,155.093,0.004,99.972,0.004z M99.972,190.957c-50.168,0-90.996-40.813-90.996-90.989    c0-50.172,40.828-90.992,90.996-90.992c50.175,0,91.003,40.817,91.003,90.992S150.147,190.957,99.972,190.957z" fill="#6e7077"></path>
                                <path d="M99.324,67.354c-3.708,0-6.725,3.01-6.725,6.728v75.979c0,3.722,3.017,6.739,6.725,6.739    c3.722,0,6.739-3.017,6.739-6.739V74.082C106.063,70.364,103.042,67.354,99.324,67.354z" fill="#6d6f76"></path>
                                <circle cx="99.746" cy="48.697" r="8.178" fill="#6d6f76"></circle>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="homeNewsAndAnnouncementContainerInfoDate">
                    <?php echo $HABERLER[0]["DATE"]; ?>
                </div>
            </div>
            <div class="homeNewsAndAnnouncementPagesContainer">
                <div id="homeNewsAndAnnouncementPagesContainer">
                    <ul class="homeNewsAndAnnouncementPagesContainerPrevIcons">
                        <li>
                            <a href="#">
                                <img src="/assets/img/newsPrevStep.png" />
                            </a>
                        </li>
                    </ul>
                    <ul class="homeNewsAndAnnouncementPagesContainerIndis">
                        <li>
                            <a data-page="1" class="homeNewsAndAnnouncementPagesContainerIndisActive" href="javascript:void(0)">1</a>
                        </li>
                    </ul>
                    <ul class="homeNewsAndAnnouncementPagesContainerNextIcons">
                        <li>
                            <a href="#">
                                <img src="/assets/img/newsNextStep.png" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/assets/img/newsNextLast.png" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div id="homeDownloadPageContainer_homeNewsAndAnnouncementContainer2">
    <div class="homeNewsAndAnnouncementContainerBackGround2">
        <div class="homeNewsAndAnnouncementImgTitleContainer_homeNewsAndAnnouncementBannerContainer_Container">
            <div class="homeNewsAndAnnouncementImgTitleContainer2">
                <div class="homeNewsAndAnnouncementImgTitleContainerFiltre2 multiple" style="background: url(/panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=<?php echo $HABERLER[0]["ID"]; ?>) center center / cover no-repeat #3f424b;">
                    <div class="homeNewsAndAnnouncementImgTitleContainerFiltre2General">
                        <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle1" style="padding-top: 130px;">
                            <?php echo $bahadir->TRANSLATE_WORD($HABERLER[0]["TITLE1"]); ?>
                        </div>
                        <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle2">
                            <?php echo $bahadir->TRANSLATE_WORD($HABERLER[0]["TITLE2"]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homeNewsAndAnnouncementBannerContainer2">
                <div class="homeNewsAndAnnouncementBannerContainer2General" style="margin-top: 130px;">
                    <div class="homeNewsAndAnnouncementBannerContainerTitle2">
                        <?php echo $bahadir->TRANSLATE_WORD("HABER"); ?> &amp; <?php echo $bahadir->TRANSLATE_WORD("DUYURULAR"); ?>
                    </div>
                    <div class="homeNewsAndAnnouncementBannerContainerTitleLine2"></div>
                    <div class="homeNewsAndAnnouncementBannerContainerText2">
                        <?php echo $bahadir->TRANSLATE_WORD("You can subscribe to our mailing list to be informed about the latest happenings"); ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="homeNewsAndAnnouncementImgTitleGeneralContainerText2">
            <div class="homeNewsAndAnnouncementImgTitleContainerText2">
                <p>
                    <?php echo $bahadir->TRANSLATE_WORD("Yeni histerektomi klempleri, tüm batın cerrahilerine ve kadın doğum cerrahi operasyonlarına yönelik olarak,&nbsp;düz, kavisli ve&nbsp;açılı şekilde tiplerde üretilmiştir. Doku tutuşu ve minimum zarar ile güçlü tutma özelliği sunmaktadır.&nbsp;Yeni histerektomi klemplerinde&nbsp;öne çıkan özellikler;&nbsp;atromatik çene yapısıyla güçlü tutunma sağlarken&nbsp;dokuya verilen travmayı azaltmaktır.Çene boyunca uzanan derin oluklar sayesinde&nbsp;kavramayı güçlendirmekte ve kaymayı önlemektedir."); ?>
                </p>
            </div>
            <div class="homeNewsAndAnnouncementImgTitleContainerText2CloseIcon">
                <a href="javascript:void(0)">
                    <img src="/assets/img/haberCloseIcon.png" />
                </a>
            </div>
            <div class="clear"></div>
            <a style="float: left; margin-left: 25px; margin-bottom: 20px; display: none;" data-id="<?php $HABERLER[0]["ID"]; ?>" id="homeNewsAndAnnouncementImgTitleContainerTextSeeMore2" class="homeNewsAndAnnouncementImgTitleContainerTextSeeMore seeMore" href="javascript:void(0)">
                <?php echo $bahadir->TRANSLATE_WORD("daha fazlası..."); ?>
            </a>
        </div>
        <div class="homeNewsAndAnnouncementItemContainer2">

            <?php
            foreach ($HABERLER as $HABER)
            {
            ?>
            <a data-id="<?php echo $HABER["ID"]; ?>" href="javascript:void(0)" class="homeNewsAndAnnouncementItemContainerItem2 homeNewsAndAnnouncementItemContainerItemActive2">
                <img class="homeNewsAndAnnouncementItemContainerItemImg2" src="/assets/img/homeNewsAndAnnouncementContainerNewsOk.png" />
                <div class="homeNewsAndAnnouncementItemContainerItemTitle2">
                    <?php echo $bahadir->TRANSLATE_WORD($HABER["TITLE1"]); ?><?php echo $bahadir->TRANSLATE_WORD($HABER["TITLE2"]); ?>
                </div>
                <div class="clear"></div>
            </a>
            <?php } ?>

        </div>
        <div class="clear"></div>
        <div class="homeNewsAndAnnouncementSocialMediaContainer2">
            <div class="homeNewsAndAnnouncementContainerInfoIcon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 199.943 199.943" style="enable-background: new 0 0 199.943 199.943;" xml:space="preserve" width="25px" height="25px">
                    <g>
                        <g>
                            <path d="M99.972,0.004C44.85,0.004,0,44.847,0,99.968c0,55.125,44.847,99.972,99.972,99.972    s99.972-44.847,99.972-99.972C199.943,44.847,155.093,0.004,99.972,0.004z M99.972,190.957c-50.168,0-90.996-40.813-90.996-90.989    c0-50.172,40.828-90.992,90.996-90.992c50.175,0,91.003,40.817,91.003,90.992S150.147,190.957,99.972,190.957z" fill="#6e7077"></path>
                            <path d="M99.324,67.354c-3.708,0-6.725,3.01-6.725,6.728v75.979c0,3.722,3.017,6.739,6.725,6.739    c3.722,0,6.739-3.017,6.739-6.739V74.082C106.063,70.364,103.042,67.354,99.324,67.354z" fill="#6d6f76"></path>
                            <circle cx="99.746" cy="48.697" r="8.178" fill="#6d6f76"></circle>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="homeNewsAndAnnouncementContainerInfoDate">
                <?php echo $HABER["DATE"]; ?>
            </div>
        </div>
        <div class="homeNewsAndAnnouncementPagesContainer2">
            <ul class="homeNewsAndAnnouncementPagesContainerPrevIcons">
                <li>
                    <a href="#">
                        <img src="/assets/img/newsPrevLast.png" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/assets/img/newsPrevStep.png" />
                    </a>
                </li>
            </ul>
            <ul class="homeNewsAndAnnouncementPagesContainerIndis">
                <li>
                    <a data-page="1" class="homeNewsAndAnnouncementPagesContainerIndisActive" href="javascript:void(0)">1</a>
                </li>
            </ul>
            <ul class="homeNewsAndAnnouncementPagesContainerNextIcons">
                <li>
                    <a href="#">
                        <img src="/assets/img/newsNextStep.png" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/assets/img/newsNextLast.png" />
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="homeDownloadPageContainer_homeNewsAndAnnouncementContainer3">
    <div class="homeNewsAndAnnouncementBannerContainer3">
        <?php echo $bahadir->TRANSLATE_WORD("HABERLER"); ?> &amp; <?php echo $bahadir->TRANSLATE_WORD("DUYURULAR"); ?>
    </div>
    <div class="homeNewsAndAnnouncementImgTitleContainer3" style="height: 260px;">
        <div data-yon="PREVIOUS" data-id="<?php echo $HABERLER[0]["ID"]; ?>" class="homeNewsAndAnnouncementBannerContainer3LeftButton">
            <a href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="30px" height="30px" viewbox="0 0 370.814 370.814" style="enable-background: new 0 0 370.814 370.814;" xml:space="preserve">
                    <g>
                        <g>
                            <polygon points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401" fill="#027436"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <div class="homeNewsAndAnnouncementImgTitleContainer3Img" style="height: 260px;">
            <div class="homeNewsAndAnnouncementImgTitleContainer3ImgFiltre" style="background: url(/panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=<?php echo $HABERLER[0]["ID"]; ?>) center center cover no-repeat rgb(63, 66, 75); height: 260px;">
                <div class="homeNewsAndAnnouncementImgTitleContainer3ImgGeneral" style="height: 260px;">
                    <div data-yon="PREVIOUS" data-id="<?php echo $HABERLER[0]["ID"]; ?>" class="homeNewsAndAnnouncementBannerContainer3LeftButton2" style="margin-top: 130px;">
                        <a data-yon="PREVIOUS" data-id="<?php echo $HABERLER[0]["ID"]; ?>" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="30px" height="30px" viewbox="0 0 370.814 370.814" style="enable-background: new 0 0 370.814 370.814;" xml:space="preserve">
                                <g>
                                    <g>
                                        <polygon points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401" fill="#027436"></polygon>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div data-yon="NEXT" data-id="<?php echo $HABERLER[0]["ID"]; ?>" class="homeNewsAndAnnouncementBannerContainer3RightButton2" style="margin-top: 130px;">
                        <a data-yon="NEXT" data-id="<?php echo $HABERLER[0]["ID"]; ?>" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 478.448 478.448" style="enable-background: new 0 0 478.448 478.448;" xml:space="preserve" width="30px" height="30px">
                                <g>
                                    <g>
                                        <polygon points="131.659,0 100.494,32.035 313.804,239.232 100.494,446.373 131.65,478.448     377.954,239.232   " fill="#027436"></polygon>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle2Container" style="padding-top: 259.937px;">
                        <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle1_2">Yeni Histerektomi</div>
                        <div class="homeNewsAndAnnouncementImgTitleContainerFiltreTitle2_2">Pensetleri</div>
                    </div>
                </div>
            </div>
        </div>
        <div data-yon="NEXT" data-id="<?php echo $HABERLER[0]["ID"]; ?>" class="homeNewsAndAnnouncementBannerContainer3RightButton">
            <a data-yon="NEXT" data-id="<?php echo $HABERLER[0]["ID"]; ?>" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 478.448 478.448" style="enable-background: new 0 0 478.448 478.448;" xml:space="preserve" width="30px" height="30px">
                    <g>
                        <g>
                            <polygon points="131.659,0 100.494,32.035 313.804,239.232 100.494,446.373 131.65,478.448     377.954,239.232   " fill="#027436"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="homeNewsAndAnnouncementImgTitleContainerText3">
        <p>
            <?php echo $bahadir->TRANSLATE_WORD($HABERLER[0]["CONTENT_HTML"], true); ?>
        </p>
    </div>
    <div class="homeNewsAndAnnouncementImgTitleContainerText3SeeMore" style="height:auto; margin-top:0;">
        <a style="float: left; display: none;" data-id="1" class="homeNewsAndAnnouncementImgTitleContainerTextSeeMore seeMore" id="homeNewsAndAnnouncementImgTitleContainerTextSeeMore3" href="javascript:void(0)">
            <?php echo $bahadir->TRANSLATE_WORD("daha fazlası..."); ?>
        </a>
        <a style="margin:0 auto; width:30px; height:30px;" data-id="1" class="homeNewsAndAnnouncementImgTitleContainerTextSeeMore seeMore" id="homeNewsAndAnnouncementImgTitleContainerTextSeeMore3CloseIcon" href="javascript:void(0)">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 54 54" style="enable-background:new 0 0 54px 54px;" xml:space="preserve">
                <g>
                    <g>
                        <rect x="1" y="1" style="fill: #027436;" width="52px" height="52px"></rect>
                        <path style="fill: #027436; " d="M54,54H0V0h54V54z M2,52h50V2H2V52z"></path>
                    </g>
                    <path style="fill:#FFFFFF;" d="M44,36c-0.256,0-0.512-0.098-0.707-0.293L27,19.414L10.707,35.707c-0.391,0.391-1.023,0.391-1.414,0
		            s-0.391-1.023,0-1.414L27,16.586l17.707,17.707c0.391,0.391,0.391,1.023,0,1.414C44.512,35.902,44.256,36,44,36z"></path>
                </g>
            </svg>
        </a>
    </div>
    <div class="homeNewsAndAnnouncementSocialMediaContainer3">
        <div class="homeNewsAndAnnouncementContainerInfoIcon" style="width: 125px; margin: 0 auto; float:none;">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 199.943 199.943" style="enable-background: new 0 0 199.943 199.943; float:left;" xml:space="preserve" width="25px" height="25px">
                <g>
                    <g>
                        <path d="M99.972,0.004C44.85,0.004,0,44.847,0,99.968c0,55.125,44.847,99.972,99.972,99.972    s99.972-44.847,99.972-99.972C199.943,44.847,155.093,0.004,99.972,0.004z M99.972,190.957c-50.168,0-90.996-40.813-90.996-90.989    c0-50.172,40.828-90.992,90.996-90.992c50.175,0,91.003,40.817,91.003,90.992S150.147,190.957,99.972,190.957z" fill="#6e7077"></path>
                        <path d="M99.324,67.354c-3.708,0-6.725,3.01-6.725,6.728v75.979c0,3.722,3.017,6.739,6.725,6.739    c3.722,0,6.739-3.017,6.739-6.739V74.082C106.063,70.364,103.042,67.354,99.324,67.354z" fill="#6d6f76"></path>
                        <circle cx="99.746" cy="48.697" r="8.178" fill="#6d6f76"></circle>
                    </g>
                </g>
            </svg>
            <div class="homeNewsAndAnnouncementContainerInfoDate" style="line-height: 27px;">
                <?php echo $HABERLER[0]["DATE"]; ?>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div style="width:100%; height: 1px; background: #cccccc; margin-top: 75px;"></div>
<div id="homeDownloadPageContainer2">
    <div class="siteContainer">
        <div class="homeDownloadPageContainer2">
            <a href="/Indirme">
                <div class="homeDownloadPageContainerLeft">
                    <div class="homeDownloadPageContainerTitle1_2">
                        <?php echo $bahadir->TRANSLATE_WORD("HIZLI GEÇİŞ"); ?>
                    </div>
                    <div class="homeDownloadPageContainerTitle2_2">
                        <?php echo $bahadir->TRANSLATE_WORD("İndirme Sayfası"); ?>
                    </div>
                    <img class="downloadPageLine" src="/assets/img/downloadLine.PNG" />
                    <div class="downloadPageDescription2">
                        <?php echo $bahadir->TRANSLATE_WORD("Ürün portfolyamızı ilgili branşlar içeriside görebilirsiniz"); ?>.
                    </div>
                </div>
                <div class="clear homeDownloadPageContainerLeftSubLine"></div>
                <img class="downloadPageCatalog2" src="/assets/img/downloadPageCatalog.png" />
            </a>
        </div>
    </div>
    <div class="clear"></div>
    <div style="width: 100%; height: 1px; background: #cccccc; margin-top: 29px;"></div>
</div>
<div class="clear"></div>
<div id="homeHakkimizdaContainerGeneralContainer">
    <?php $HAKKIMIZDA = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE ID = 1")[0]; ?>
    <div id="homeHakkimizdaContainer2" class="siteContainer">
        <div class="homeHakkimizdaTitle">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["TITLE1"]); ?>
        </div>
        <div class="clear"></div>
        <div class="homeHakkimizdaTitle2">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["TITLE2"]); ?>
        </div>
        <div class="clear"></div>
        <img class="homeHakkimizdaLine" src="/assets/img/homeHakkimizdaLine.png" />
        <div class="homeHakkimizdaTextContainer1">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["CONTENT_LEFT"], true); ?>
        </div>
        <div class="homeHakkimizdaTextContainer2">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["CONTENT_RIGHT"], true); ?>
        </div>
        <div class="clear"></div>
    </div>
    <div id="homeHakkimizdaContainer1" class="siteContainer">
        <div class="homeHakkimizdaTitle_2">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["TITLE1"]); ?>
        </div>
        <div class="homeHakkimizdaTitle2_2">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["TITLE2"]); ?>
        </div>
        <div class="clear"></div>
        <img class="homeHakkimizdaLine_2" src="/assets/img/homeHakkimizdaLine.png" />
        <div class="clear"></div>
        <br />
        <div class="homeHakkimizdaTextContainer1_2">
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["CONTENT_LEFT"], true); ?>
            <br />
            <?php echo $bahadir->TRANSLATE_WORD($HAKKIMIZDA["CONTENT_RIGHT"], true); ?>
        </div>
    </div>
    <div class="homeHakkimizdaBosluk"></div>
    <div class="homeHakkimizdaLine2"></div>
</div>

<div class="clear"></div>
<div class="homeProjelerContainer relative" style="height: 390px;">
    <div id="homeProjelerContainerPattern" class="pattern"></div>
    <div class="homeProjelerContainerFilter" style="height: 390px;">
        <div class="siteContainer" id="homeProjelerContainerSiteContainer" style="position: relative; height: 390px;">
            <div class="homeProjelerContainerIcon">
                <img src="/assets/img/projelerIcon.png" />
            </div>
            <div class="homeProjelerContainerExplanationContainer" style="z-index: 9999; margin-top: 103.5px;">
                <div class="homeProjelerContainerExplanationContainerTitle">
                    <?php echo $bahadir->TRANSLATE_WORD("KURUMSAL KİMLİK REHBERİ");  ?>
                </div>
                <div class="clear"></div>
                <div class="homeProjelerContainerExplanationContainerTitleSubLine"></div>
                <div class="clear"></div>
                <div class="homeProjelerContainerExplanationContainerText">
                    <p>
                        <span style="line-height: 20.8px;">
                            <?php echo $bahadir->TRANSLATE_WORD("Bahadır Tıbbi Aletler&nbsp;olarak kurumsallaşmanın temel ihtiyaçlarından biri olan marka standartlarını sağlamak ve etkin bir marka yönetimini, firmanın yeni hedef ve stratejilerine uygun bir şekilde gerçekleştirmek adına kurumsal kimliğimiz yenilenmiştir.", true); ?>
                        </span>
                        <span style="line-height: 20.8px;"><?php echo $bahadir->TRANSLATE_WORD("Kurumsal kimlik&nbsp; rehberimizi indirmek için");  ?></span>
                        <span style="line-height: 20.8px;">&nbsp;</span>
                        <a href="http://www.bahadir.com" style="line-height: 20.8px;"><?php echo $bahadir->TRANSLATE_WORD("tıklayınız");  ?></a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="homeKurumsalKimlikLine"></div>
<script src="/assets/js/Default.js"></script>
<script src="/assets/Js/swiper.min.js"></script>
<script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
</script>