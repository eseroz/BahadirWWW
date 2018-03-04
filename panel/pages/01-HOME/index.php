<?php
if($_POST){
    $modul = $bahadir->fnc->post("MODUL");
    $islem = $bahadir->fnc->post("islem");
    $CURRENT_PAGE = $bahadir->fnc->post("CURRENT_PAGE");

    switch ($modul)
    {
        case 'SLIDER':
            switch ($islem)
            {
                case 'insert':
                    $bahadir->SLAYT_EKLE();
                    break;
                case 'update':
                    $bahadir->SLAYT_GUNCELLE();
                    break;
                case 'delete':
                    $SLAYT_ID = $bahadir->fnc->post("SLIDER_ID");
                    $bahadir->mssqlDb->ExexQuery("DELETE site.SLIDER WHERE ID = $SLAYT_ID");
                    break;
            }
            break;

        case 'NEWS':
            switch ($islem)
            {
                case 'insert':
                    $bahadir->HABER_EKLE();
                    break;
                case 'update':
                    $bahadir->HABER_GUNCELLE();
                    break;
                case 'delete':
                    $HABER_ID = $bahadir->fnc->post("HABER_ID");
                    $bahadir->mssqlDb->ExexQuery("DELETE NEWS WHERE ID = $HABER_ID");
                    break;
            }
            break;
    }
}
?>

<link href="/panel/pages/01-HOME/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/01-HOME/script.js"></script>

<?php
if(isset($CURRENT_PAGE)){
?>
<script>
    $(document).ready(function () {
        setTimeout(function () {
             $("[href='<?php echo $CURRENT_PAGE; ?>']").click();
        }, 2000);
    });
</script>
<?php } ?>

<div class="row">
    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3">
                <a href="#sliders" class="active">
                    <?php echo $bahadir->TRANSLATE_WORD("slaytlar", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#news">
                    <?php echo $bahadir->TRANSLATE_WORD("haberler", 1); ?>
                </a>
            </li>
            <div class="indicator" style="right: 460.5px; left: 0px;"></div>
        </ul>
    </div>

    <div id="sliders" class="col s12" style="display: block;margin-top:20px;">

        <div class="row" style="margin:0px !important;">
            <div class="col s12">
                <button class="btn btn-xs waves-effect white" title="ayarlar" style="float:right;">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </button>
                <a id="btnAdd" class="waves-effect white waves-light btn modal-trigger" style="float:right;" href="#mdlSlayt" title="YENİ SLAYT">
                    <i class="fa fa-plus"></i>
                </a>

                <div style="width: 120px;float: left;margin-left: 5px;">
                    <input type="checkbox" class="filled-in" id="filled-in-box-all" />
                    <label for="filled-in-box-all">Tümünü Seç</label>
                </div>
            </div>
        </div>
        <div id="sortable" class="card-content" style="padding:0px;">
            <?php
            $SLAYTLAR = $bahadir->mssqlDb->Select("SELECT *FROM site.SLIDER ORDER BY SEQUENCE ASC");
            if(count($SLAYTLAR) == 0){
                echo "<div style='text-alagin:center;'>". $bahadir->TRANSLATE_WORD("hiç slayt eklenmedi.", 1) ."</div>";
            }
            foreach ($SLAYTLAR as $SLAYT)
            {
            ?>

            <div sira="<?php echo $SLAYT["SEQUENCE"]; ?>" data-id="<?php echo $SLAYT["ID"]; ?>" class="col s6 ui-state-default draggable">
                <div class="card white">
                    <div class="card-content" style="padding:0px;">
                        <div class="drag-handle" style="cursor:move;margin-top: 23px;position:relative;">
                            <div class="item-checkbox">
                                <input type="checkbox" class="filled-in" id="filled-in-box-<?php echo $SLAYT["ID"]; ?>" />
                                <label for="filled-in-box-<?php echo $SLAYT["ID"]; ?>"></label>
                            </div>
                            <img src="/panel/system/ViewBinaryImage.php?OPTION=SLIDER&ID=<?php echo $SLAYT["ID"]; ?>" alt="<?php echo $SLAYT["TITLE1"]; ?>" class="col s12" />
                        </div>
                        <br />
                        <div style="float:left; margin-left: 11px; margin-top: 5px;margin-bottom:15px;">
                            <a style="float:left;" name="btnSlaytEdit" data-id="<?php echo $SLAYT["ID"]; ?>" class="waves-effect waves-grey btn-flat m-b-xs modal-trigger" href="#mdlSlayt" title="<?php echo $bahadir->TRANSLATE_WORD("düzenle", 1); ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <form method="post" style="float:left;">
                                <input type="hidden" name="islem" value="delete" />
                                <input type="hidden" name="MODUL" value="SLIDER" />
                                <input type="hidden" name="SLIDER_ID" value="<?php echo $SLAYT["ID"]; ?>" />
                                <input type="hidden" name="CURRENT_PAGE" />
                                <button name="btnSlaytRemove" type="submit" class="waves-effect waves-grey btn-flat m-b-xs" title="<?php echo $bahadir->TRANSLATE_WORD("sil", 1); ?>">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                        <div style="float:right;margin-right:15px;margin-top:15px;">
                            <div class="switch m-b-md">
                                <label>
                                    <?php echo $bahadir->TRANSLATE_WORD("aktif", 1); ?>
                                    <input type="checkbox" data-uniq-id="<?php echo $SLAYT["ID"]; ?>" <?php if($SLAYT["VISIBILITY"] == 1){ echo "checked"; }; ?> />
                                    <span class="lever"></span><?php echo $bahadir->TRANSLATE_WORD("pasif", 1); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
        </div>
    </div>

    <div id="news" class="col s12" style="display: block;margin-top:20px;">

        <div class="row">
            <div class="col s12">
                <a id="btnHaberEkle" class="waves-effect white waves-light btn modal-trigger" href="#mdlHaber" title="<?php echo $bahadir->TRANSLATE_WORD("yeni haber ekle", 1); ?>">
                    <i class="fa fa-plus"></i>
                </a>
                <button class="btn btn-xs waves-effect white" title="<?php echo $bahadir->TRANSLATE_WORD("haber ayarları", 1); ?>">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div id="sortable1" class="card-content" style="padding:0px;">
            <?php
            $HABERLER = $bahadir->mssqlDb->Select("SELECT *FROM site.NEWS ORDER BY SEQUENCE ASC");
            if(count($HABERLER) == 0){
                echo "<div style='text-alagin:center;'>". $bahadir->TRANSLATE_WORD("hiç haber eklenmedi.", 1) ."</div>";
            }

            foreach ($HABERLER as $HABER)
            {
            ?>
            <div sira="<?php echo $HABER["SEQUENCE"]; ?>" data-id="<?php echo $HABER["ID"]; ?>" class="col s6 ui-state-default draggable1">
                <div class="card white">
                    <div class="card-content" style="padding:0px;">
                        <div class="drag-handle" style="margin-top: 23px;">
                            <img src="/panel/system/ViewBinaryImage.php?OPTION=NEWS&ID=<?php echo $HABER["ID"]; ?>" alt="<?php echo $HABER["TITLE1"]; ?>" class="col s12" />
                        </div>
                        <br />
                        <div style="float:left; margin-left: 11px; margin-top: 5px;margin-bottom:15px;">
                            <a style="float:left;" name="btnHaberEdit" data-id="<?php echo $HABER["ID"]; ?>" class="waves-effect waves-grey btn-flat m-b-xs modal-trigger" href="#mdlHaber" title="<?php echo $bahadir->TRANSLATE_WORD("düzenle", 1); ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <form method="post" style="float:left;">
                                <input type="hidden" name="islem" value="delete" />
                                <input type="hidden" name="MODUL" value="NEWS" />
                                <input type="hidden" name="HABER_ID" value="<?php echo $HABER["ID"]; ?>" />
                                <input type="hidden" name="CURRENT_PAGE" />
                                <button name="btnHaberRemove" type="submit" class="waves-effect waves-grey btn-flat m-b-xs" title="<?php echo $bahadir->TRANSLATE_WORD("sil", 1); ?>">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                        <div style="float:right;margin-right:15px;margin-top:15px;">
                            <div class="switch m-b-md">
                                <label>
                                    <?php echo $bahadir->TRANSLATE_WORD("aktif", 1); ?>
                                    <input type="checkbox" data-uniq-id="<?php echo $HABER["ID"]; ?>" <?php if($HABER["VISIBILITY"] == 1){ echo "checked"; }; ?> />
                                    <span class="lever"></span><?php echo $bahadir->TRANSLATE_WORD("pasif", 1); ?>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<div id="mdlSlayt" class="modal modal-fixed-footer">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="CURRENT_PAGE" />
        <div class="modal-content">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
            <h4>
                <?php echo $bahadir->TRANSLATE_WORD("slayt", 1); ?>
            </h4>
            <div class="modal-body">
                <div class="col-md-12">

                    <div class="row">
                        <div class="switch m-b-md" style="float:right;">
                            <label>
                                <?php echo $bahadir->TRANSLATE_WORD("aktif", 1); ?>
                                <input type="checkbox" name="gorunurluk" db-state="" />
                                <span class="lever"></span>
                                <?php echo $bahadir->TRANSLATE_WORD("pasif", 1); ?>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="baslik1" type="text" class="validate" required />
                            <label for="baslik1" class="">
                                <?php echo $bahadir->TRANSLATE_WORD("başlık", 1); ?> 1
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="baslik2" type="text" class="validate" required />
                            <label for="baslik2" class="">
                                <?php echo $bahadir->TRANSLATE_WORD("başlık", 1); ?> 2
                            </label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="aciklama" class="materialize-textarea" length="120" required></textarea>
                            <label for="aciklama" class="">
                                <?php echo $bahadir->TRANSLATE_WORD("kısa açıklama", 1); ?>
                            </label>
                            <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="file-field input-field">
                                <div class="btn teal lighten-1">
                                    <span>
                                        <?php echo $bahadir->TRANSLATE_WORD("slayt resmi", 1); ?>
                                    </span>
                                    <input type="file" name="resim" accept="image/*" required />
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="content" name="content"></textarea>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <input type="hidden" name="islem" value="insert" />
            <input type="hidden" name="MODUL" value="SLIDER" />
            <input type="hidden" name="SLIDER_ID" />
            <button id="btnSlaytKaydet" type="submit" class="waves-effect waves-blue btn-flat">
                <?php echo $bahadir->TRANSLATE_WORD("kaydet", 1); ?>
            </button>
            <button id="btnSlaytGuncelle" type="submit" class="modal-action waves-effect waves-green btn-flat">
                <?php echo $bahadir->TRANSLATE_WORD("güncelle", 1); ?>
            </button>
            <button type="button" class="modal-action modal-close waves-effect waves-red btn-flat" data-dismiss="modal">
                <?php echo $bahadir->TRANSLATE_WORD("kapat", 1); ?>
            </button>
        </div>
    </form>
</div>

<div id="mdlHaber" class="modal modal-fixed-footer">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="CURRENT_PAGE" />
        <div class="modal-content">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
            <h4>
                <?php echo $bahadir->TRANSLATE_WORD("haber", 1); ?>
            </h4>
            <div class="modal-body">
                <div class="col-md-12">

                    <div class="row">
                        <div class="switch m-b-md" style="float:right;">
                            <label>
                                <?php echo $bahadir->TRANSLATE_WORD("aktif", 1); ?>
                                <input type="checkbox" name="gorunurluk" db-state="0" />
                                <span class="lever"></span>
                                <?php echo $bahadir->TRANSLATE_WORD("pasif", 1); ?>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="" name="tarih" class="masked" type="text" data-inputmask="'mask': 'd/m/y'" required />
                            <label for="tarih" class="">
                                <?php echo $bahadir->TRANSLATE_WORD("tarih", 1); ?>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="baslik1" type="text" class="validate" required />
                            <label for="baslik1" class="">
                                <?php echo $bahadir->TRANSLATE_WORD("başlık", 1); ?> 1
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="baslik2" type="text" class="validate" required />
                            <label for="baslik2" class="">
                                <?php echo $bahadir->TRANSLATE_WORD("başlık", 1); ?> 2
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="content" class="materialize-textarea" length="120" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="file-field input-field">
                                <div class="btn teal lighten-1">
                                    <span>
                                        <?php echo $bahadir->TRANSLATE_WORD("haber resmi", 1); ?>
                                    </span>
                                    <input type="file" name="resim" accept="image/*" required />
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <input type="hidden" name="islem" value="insert" />
            <input type="hidden" name="MODUL" value="NEWS" />
            <input type="hidden" name="HABER_ID" />
            <button id="btnHaberKaydet" type="submit" class="waves-effect waves-blue btn-flat">
                <?php echo $bahadir->TRANSLATE_WORD("kaydet", 1); ?>
            </button>
            <button id="btnHaberGuncelle" type="submit" class="modal-action waves-effect waves-green btn-flat">
                <?php echo $bahadir->TRANSLATE_WORD("güncelle", 1); ?>
            </button>
            <button type="button" class="modal-action modal-close waves-effect waves-red btn-flat" data-dismiss="modal">
                <?php echo $bahadir->TRANSLATE_WORD("kapat", 1); ?>
            </button>
        </div>
    </form>
</div>