<?php
$KALITE_YONETIMI = $bahadir->mssqlDb->Select("SELECT ID,TITLE1,TITLE2,DESCRIPTION,CONTENT_LEFT,CONTENT_RIGHT FROM site.PAGES WHERE ID = 3")[0];
?>
<div>
    <style>
        .argePageTitleLine {
            margin-top: 5px;
        }
        .argeBG_img {
            background: url('/panel/system/ViewBinaryImage.php?OPTION=PAGE_HEADER&ID=<?php echo $KALITE_YONETIMI["ID"]; ?>') center center / cover no-repeat #fff;
        }
        #footerIletisimContainer * {
            line-height: 1.42857143;
        }
        .argeBgTextContainerTitle1 {
            line-height: 32px;
        }
        .argeBgTextContainerTitle2 {
            margin-top: -7px;
        }
    </style>
    <link href="/assets/css/Resolution/Arge.css" rel="stylesheet">
    <script src="/assets/js/Arge.js"></script>
    
    <div class="argeBG_img" style="height: 424.2px;">
        <div class="argeBG_imgOpacity" style="height: 424.2px;">
            <div class="siteContainer" id="kaliteSiteContainer">
                <div class="kaliteBgTextContainer" style="padding-top: 149.5px;">
                    <div id="kaliteBgTextContainer">
                        <div class="argeBgTextContainerTitle1">
                            <?php echo $KALITE_YONETIMI["TITLE1"]; ?>
                        </div>
                        <div class="argeBgTextContainerTitle2">
                            <?php echo $KALITE_YONETIMI["TITLE2"]; ?>
                        </div>
                        <div class="argeBgTextContainerText">
                            <?php echo $KALITE_YONETIMI["DESCRIPTION"]; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="siteContainer">
        <div class="argePageTitle"><?php echo $KALITE_YONETIMI["TITLE1"]; ?> <?php echo $KALITE_YONETIMI["TITLE2"]; ?></div>
        <div class="argePageTitleLine"></div>
        <div class="argePageText">
            <?php echo html_entity_decode($KALITE_YONETIMI["CONTENT_LEFT"]); ?>
        </div>
    </div>
</div>