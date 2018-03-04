<?php
$YONETIM_ILKELERI = $bahadir->mssqlDb->Select("SELECT ID,TITLE1,TITLE2,DESCRIPTION,CONTENT_LEFT,CONTENT_RIGHT FROM site.PAGES WHERE ID = 4")[0];
?>
<div>
    <style>
        .argePageTitleLine {
            margin-top: 5px;
        }

        .argeBG_img {
            background: url('/panel/system/ViewBinaryImage.php?OPTION=PAGE_HEADER&ID=<?php echo $YONETIM_ILKELERI["ID"]; ?>') center center / cover no-repeat #fff;
        }

        .argeBgTextContainerTitle1, .argeBgTextContainerTitle2, .argeBgTextContainerText {
            color: #027436;
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
    <link href="/assets/css/Resolution/Politika.css" rel="stylesheet" />
    <script src="/assets/js/Arge.js"></script>
    <div class="argeBG_img" style="height: 424.2px;">
        <div class="siteContainer">
            <div class="argeBgTextContainer" style="padding-top: 154px;">
                <div id="argeBgTextContainer">
                    <div class="argeBgTextContainerTitle1"><?php echo $YONETIM_ILKELERI["TITLE1"]; ?></div>
                    <div class="argeBgTextContainerTitle2"><?php echo $YONETIM_ILKELERI["TITLE2"]; ?></div>
                    <div class="argeBgTextContainerText"><?php echo $YONETIM_ILKELERI["DESCRIPTION"]; ?></div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="siteContainer">
        <div class="argePageTitle"><?php echo $YONETIM_ILKELERI["TITLE1"]; ?> <?php echo $YONETIM_ILKELERI["TITLE2"]; ?></div>
        <div class="argePageTitleLine"></div>
        <div class="argePageText">
            <?php echo html_entity_decode($YONETIM_ILKELERI["CONTENT_LEFT"]); ?>
        </div>
    </div>
    <script type="text/javascript"></script>
</div>