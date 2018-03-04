<?php

if($_POST){

    $modul = $bahadir->fnc->post("MODUL");
    $islem = $bahadir->fnc->post("islem");
    $CURRENT_PAGE = $bahadir->fnc->post("CURRENT_PAGE");

    switch ($modul)
    {
        case 'DIL':
            switch ($islem)
            {
                case 'insert':
                    $bahadir->DIL_EKLE();
                    break;
                case 'update':
                    $bahadir->DIL_GUNCELLE();
                    break;
                case 'delete':
                    $DIL_ID = $bahadir->fnc->post("DIL_ID");
                    $bahadir->mssqlDb->ExexQuery("DELETE LANGUAGE WHERE ID = $DIL_ID");
                    break;
            }
            break;
        case 'CEVIRI':
            switch ($islem)
            {
                case 'delete':
                    $CEVIRI_ID = $bahadir->fnc->post("CEVIRI_ID");
                    $bahadir->mssqlDb->ExexQuery("DELETE DICTIONARY WHERE ID = $CEVIRI_ID");
                    break;
            }
            break;
    }
}

?>

<link href="/panel/pages/07-TRANSLATE/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/07-TRANSLATE/script.js"></script>

<div class="row">

    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3">
                <a href="#ceviri" class="active">
                    <?php echo $bahadir->TRANSLATE_WORD("Çeviri"); ?>
                </a>
            </li>          
            <li class="tab col s3">
                <a class="" href="#dil">
                    <?php echo $bahadir->TRANSLATE_WORD("dil ayarları"); ?>
                </a>
            </li>
            <div class="indicator" style="right: 460.5px; left: 0px;"></div>
        </ul>
    </div>
    
    <div id="ceviri" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="2" />
            <input type="hidden" name="selected_page" />

            <div class="card">
                <div class="card-content">
                    <span class="card-title">Metinleri Çevir</span><br>
                    <p>Metinleri hangi dile çevirmek istiyorsunuz?</p>
                    <select id="cboLanguage" class="js-example-data-array js-states browser-default select2-hidden-accessible" tabindex="-1" style="width: 100%" aria-hidden="true">
                        <?php

                        $TOPLAM_KELIME_SAYISI = $bahadir->mssqlDb->Select("SELECT ID FROM translate.WORDS");

                        $DILLER = $bahadir->mssqlDb->Select("SELECT *FROM translate.LANGUAGE");
                        foreach ($DILLER as $DIL)
                        {
                            $DIL_ID = $DIL["ID"];
                            if($DIL_ID != 1){
                                $CEVRILMIS_KELIME_SAYISI = $bahadir->mssqlDb->Select("SELECT ID FROM translate.DICTIONARY WHERE LANGUAGE_ID = $DIL_ID");
                                $BEKLEYEN_KELIME_SAYISI = count($TOPLAM_KELIME_SAYISI) - count($CEVRILMIS_KELIME_SAYISI);
                        ?>
                        <option value="<?php echo $DIL["ID"]; ?>"><?php echo $DIL["LANGUAGE_LONG"]." Diline Çevrilmeyi Bekleyen Toplam ".$BEKLEYEN_KELIME_SAYISI." adet metin bulunmaktadır."; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <br /><br /><br />
                    <p>Çeviri Bekleyen Metinler</p>
                    <select id="cboCeviriBekleyenKelimeler" class="js-states browser-default select2-hidden-accessible" tabindex="-1" style="width: 100%" aria-hidden="true">
                        <?php
                        $CEVIRI_BEKLEYEN_KELIMELER = $bahadir->mssqlDb->Select("SELECT translate.WORDS.ID AS WORD_ID, translate.WORDS.WORD, translate.DICTIONARY.TRANSLATED_WORD, translate.LANGUAGE.LANGUAGE_LONG, translate.DICTIONARY.LANGUAGE_ID FROM translate.LANGUAGE INNER JOIN translate.DICTIONARY ON translate.LANGUAGE.ID = translate.DICTIONARY.LANGUAGE_ID FULL OUTER JOIN translate.WORDS ON translate.DICTIONARY.WORD_ID = translate.WORDS.ID WHERE (translate.DICTIONARY.TRANSLATED_WORD IS NULL) AND (translate.DICTIONARY.LANGUAGE_ID IS NULL OR translate.DICTIONARY.LANGUAGE_ID <> 2)");
                        foreach ($CEVIRI_BEKLEYEN_KELIMELER as $CEVIRI_BEKLEYEN_KELIME)
                        {
                        ?>
                        <option value="<?php echo $CEVIRI_BEKLEYEN_KELIME["WORD_ID"]; ?>"><?php echo $CEVIRI_BEKLEYEN_KELIME["WORD"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="input-field col s12">
                        <textarea id="txtCeviri" class="materialize-textarea" length="120"></textarea>
                        <label for="txtCeviri" class="">Kelimenin Çevirisi</label>
                        <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                    </div>
                    <button id="btnCeviriyiKaydet" type="button" class="waves-effect waves-teal btn-flat">Çeviriyi Kaydet</button>
                </div>
            </div>
            <div class="card white">
                <div class="card-content">
                    <table id="kelime_tablosu" class="display responsive-table datatable-example">
                        <thead>
                            <tr>
                                <th>Kelime</th>
                                <th>Çeviri</th>
                                <th>Dil</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $KELIMELER = $bahadir->mssqlDb->Select("SELECT translate.WORDS.WORD, translate.WORDS.ISCONTENT, translate.DICTIONARY.TRANSLATED_WORD, translate.LANGUAGE.LANGUAGE_LONG, translate.LANGUAGE.FLAG FROM translate.DICTIONARY INNER JOIN translate.WORDS ON translate.DICTIONARY.WORD_ID = translate.WORDS.ID INNER JOIN translate.LANGUAGE ON translate.DICTIONARY.LANGUAGE_ID = translate.LANGUAGE.ID WHERE translate.WORDS.ISCONTENT = 0 ORDER BY WORD ASC");
                            foreach ($KELIMELER as $KELIME)
                            {
                            ?>
                            <tr>
                                <td style="width:auto;overflow:hidden;">
                                    <?php echo $KELIME["WORD"]; ?>
                                </td>
                                <td style="width:auto;overflow:hidden;">
                                    <?php echo $KELIME["TRANSLATED_WORD"]; ?>
                                </td>
                                <td style="width:150px;">
                                    <?php echo $KELIME["LANGUAGE_LONG"]; ?>
                                </td>
                                <td>
                                    <!--<button type="button" name="btn-dil-duzenle" data-id="<?php echo $DIL["ID"]; ?>" class="btn m-b-xs modal-trigger" href="#mdlDil">Düzenle</button>-->
                                    <button type="button" name="btn-dil-duzenle" data-id="<?php echo $DIL["ID"]; ?>" class="btn m-b-xs modal-trigger" href="#mdlDil">Düzenle</button>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <button type="submit" name="islem" value="SAYFA_GUNCELLE" class="waves-effect waves-light btn blue m-b-xs" style="float:right;margin:15px;">
                <?php echo $bahadir->TRANSLATE_WORD("Kaydet"); ?>
            </button>
        </form>
    </div>


    <div id="dil" class="col s12 x-content" style="display: block;margin-top:20px;">

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="2" />
            <input type="hidden" name="selected_page" />
            <div class="card white">
                <div class="card-content">
                    <!--<div class="col s12">
                        <a id="btnEkle" class="waves-effect white waves-light btn modal-trigger" href="#mdlSlayt" title="yeni dil ekle">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>-->
                    <table id="dil_tablosu" class="display responsive-table">
                        <thead>
                            <tr>
                                <th><?php echo $bahadir->TRANSLATE_WORD("dil"); ?></th>
                                <th>ISO</th>
                                <th><?php echo $bahadir->TRANSLATE_WORD("bayrak"); ?></th>
                                <th style="width:220px !important;">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $DILLER = $bahadir->mssqlDb->Select("SELECT *FROM translate.LANGUAGE ORDER BY LANGUAGE_LONG ASC");
                            foreach ($DILLER as $DIL)
                            {
                            ?>
                            <tr>
                                <td style="width:auto;overflow:hidden;">
                                    <?php echo $DIL["LANGUAGE_LONG"]; ?>
                                </td>
                                <td style="width:auto;overflow:hidden;">
                                    <?php echo $DIL["LANGUAGE_SHORT"]; ?>
                                </td>
                                <td style="width:150px;">
                                    <img src="/panel/system/ViewBinaryImage.php?OPTION=FLAG?ID=<?php echo $DIL["ID"]; ?>" />
                                </td>
                                <td >
                                    <!--<button type="button" name="btn-dil-duzenle" data-id="<?php echo $DIL["ID"]; ?>" class="btn m-b-xs modal-trigger" href="#mdlDil">Düzenle</button>
                                    <button class="btn">Sil</button>-->
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>


                </div>
            </div>
            <button type="submit" name="islem" value="SAYFA_GUNCELLE" class="waves-effect waves-light btn blue m-b-xs" style="float:right;margin:15px;">
                <?php echo $bahadir->TRANSLATE_WORD("Kaydet"); ?>
            </button>
        </form>
    </div>

</div>

<div id="mdlDil" class="modal modal-fixed-footer">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="CURRENT_PAGE" />
        <div class="modal-content">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
            <h4><?php echo $bahadir->TRANSLATE_WORD("dil", 1); ?>
            </h4>
            <div class="modal-body">
                <div class="col-md-12">

                    <div class="row">
                        <div class="switch m-b-md" style="float:right;">
                            <label><?php echo $bahadir->TRANSLATE_WORD("aktif", 1); ?>
                                <input type="checkbox" name="gorunurluk" db-state="" />
                                <span class="lever"></span><?php echo $bahadir->TRANSLATE_WORD("pasif", 1); ?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="adi" type="text" class="validate" required />
                            <label for="adi" class=""><?php echo $bahadir->TRANSLATE_WORD("dil adı", 1); ?> 1
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="iso" type="text" class="validate" required />
                            <label for="iso" class=""><?php echo $bahadir->TRANSLATE_WORD("iso kodu", 1); ?> 2
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="file-field input-field">
                                <div class="btn teal lighten-1">
                                    <span><?php echo $bahadir->TRANSLATE_WORD("bayrak seç", 1); ?>
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
            <input type="hidden" name="MODUL" value="DIL" />
            <input type="hidden" name="DIL_ID" />
            <button id="btnDilKaydet" type="submit" class="waves-effect waves-blue btn-flat"><?php echo $bahadir->TRANSLATE_WORD("kaydet", 1); ?>
            </button>
            <button id="btnDilGuncelle" type="submit" class="modal-action waves-effect waves-green btn-flat"><?php echo $bahadir->TRANSLATE_WORD("güncelle", 1); ?>
            </button>
            <button type="button" class="modal-action modal-close waves-effect waves-red btn-flat" data-dismiss="modal"><?php echo $bahadir->TRANSLATE_WORD("kapat", 1); ?>
            </button>
        </div>
    </form>
</div>
<link href="/panel/assets/plugins/select2/css/select2.css" rel="stylesheet" />
<script src="/panel/assets/plugins/select2/js/select2.min.js"></script>