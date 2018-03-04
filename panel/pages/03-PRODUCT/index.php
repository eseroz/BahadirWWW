<link href="/panel/pages/03-PRODUCT/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/03-PRODUCT/script.js"></script>

<div class="row">
    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3">
                <a href="#surgical-instruments" class="active">
                    <?php echo $bahadir->TRANSLATE_WORD("cerrahi aletler", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#sterilization-containers">
                    <?php echo $bahadir->TRANSLATE_WORD("sterilizasyon konteynerleri", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#">
                    <?php echo $bahadir->TRANSLATE_WORD("tel ve sac sepetler", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#">
                    <?php echo $bahadir->TRANSLATE_WORD("hastane terlikleri", 1); ?>
                </a>
            </li>
            <div class="indicator" style="right: 460.5px; left: 0px;"></div>
        </ul>
    </div>
        
    <div id="surgical-instrument" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="1" />
            <input type="hidden" name="CURRENT_PAGE" />
            <div class="row" style="margin:0px !important;">
                <div class="col s12">
                    <button class="btn btn-xs waves-effect white" title="ayarlar" style="float:right;">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </button>
                    <a id="btnAdd" class="waves-effect white waves-light btn modal-trigger" style="float:right;" href="#mdlBranchEdit" title="YENİ">
                        <i class="fa fa-plus"></i>
                    </a>                    
                    <button type="button" id="btnRemove" class="waves-effect white waves-light btn" style="float:right;" title="SİL" disabled>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <div style="width: 120px;float: left;margin-left: 5px;">
                        <input type="checkbox" class="filled-in" id="filled-in-box-all" />
                        <label for="filled-in-box-all">Tümünü Seç</label>
                    </div>
                </div>
            </div>
            <div id="sortable" class="card-content">
                <?php
                $BRANCHES = $bahadir->mssqlDb->Select("SELECT *FROM product.BRANCH WHERE CATEGORY = 'SURGICAL-INSTRUMENTS' ORDER BY SEQUENCE ASC");
                foreach ($BRANCHES as $BRANCH)
                {
                    $CHECKED = $BRANCH["VISIBILITY"] == 1 ? 'checked' : '';
                ?>

                <div data-sequence="<?php echo $BRANCH["SEQUENCE"]; ?>" data-id="<?php echo $BRANCH["ID"]; ?>" class="col s4 ui-state-default draggable">
                    <div class="card white">
                        <div class="card-content" style="padding:0px;position:relative;">
                            <div class="item-checkbox">
                                <input type="checkbox" class="filled-in" id="filled-in-box-<?php echo $BRANCH["ID"]; ?>" data-id="<?php echo $BRANCH["ID"]; ?>" />
                                <label for="filled-in-box-<?php echo $BRANCH["ID"]; ?>"></label>
                            </div>
                            <div class="drag-handle ui-sortable-handle" style="cursor:move;">
                                <a name="btnBranchEdit" class="btn-floating" style="position: absolute;right: 5px;bottom: 55px;z-index:unset;">
                                    <i class="material-icons">edit</i>
                                </a>
                                <img src="/panel/system/ViewBinaryImage.php?OPTION=BRANCH&&ID=<?php echo $BRANCH["ID"]; ?>" alt="<?php echo $BRANCH["SHORT_TITLE"]; ?> / <?php echo $BRANCH["TITLE"]; ?>" style="height:113px;" />
                            </div>
                            <div class="card-action">
                                <div style="float:left;margin-top:10px;height:41px;line-height:30px;padding-left:15px;width:80%;font-family: 'Montserrat', sans-serif !important;">
                                    <span>
                                        <a class="edit-link" style="color:#127c43;font-weight:bold;" href="#">
                                            <?php echo $BRANCH["SHORT_TITLE"]; ?> /
                                        </a>
                                    </span>
                                    <span>
                                        <a class="edit-link" style="color:#000;" href="#">
                                            <?php echo $BRANCH["TITLE"]; ?>
                                        </a>
                                    </span>
                                </div>
                                <div style="float:left;margin-top:10px;width:20%">
                                    <div class="switch m-b-md">
                                        <label>
                                            <input type="checkbox" data-uniq-id="<?php echo $BRANCH["ID"]; ?>" <?php echo $CHECKED; ?> />
                                            <span class="lever"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>

        </form>
    </div>

    <div id="sterilization-containers" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="1" />
            <input type="hidden" name="CURRENT_PAGE" />
            <div class="row" style="margin:0px !important;">
                <div class="col s12">
                    <button class="btn btn-xs waves-effect white" title="ayarlar" style="float:right;">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </button>
                    <a id="btnAdd" class="waves-effect white waves-light btn modal-trigger" style="float:right;" href="#mdlBranchEdit" title="YENİ">
                        <i class="fa fa-plus"></i>
                    </a>
                    <button type="button" id="btnRemove" class="waves-effect white waves-light btn" style="float:right;" title="SİL" disabled>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <div style="width: 120px;float: left;margin-left: 5px;">
                        <input type="checkbox" class="filled-in" id="filled-in-box-all" />
                        <label for="filled-in-box-all">Tümünü Seç</label>
                    </div>
                </div>
            </div>
            <div id="sortable" class="card-content">
                <?php
                $BRANCHES = $bahadir->mssqlDb->Select("SELECT *FROM product.BRANCH WHERE CATEGORY = 'STERILIZATION-CONTAINERS' ORDER BY SEQUENCE ASC");
                foreach ($BRANCHES as $BRANCH)
                {
                    $CHECKED = $BRANCH["VISIBILITY"] == 1 ? 'checked' : '';
                ?>

                <div data-sequence="<?php echo $BRANCH["SEQUENCE"]; ?>" data-id="<?php echo $BRANCH["ID"]; ?>" class="col s4 ui-state-default draggable">
                    <div class="card white">
                        <div class="card-content" style="padding:0px;position:relative;">
                            <div class="item-checkbox">
                                <input type="checkbox" class="filled-in" id="filled-in-box-<?php echo $BRANCH["ID"]; ?>" data-id="<?php echo $BRANCH["ID"]; ?>" />
                                <label for="filled-in-box-<?php echo $BRANCH["ID"]; ?>"></label>
                            </div>
                            <div class="drag-handle ui-sortable-handle" style="cursor:move;">
                                <a name="btnBranchEdit" class="btn-floating" style="position: absolute;right: 5px;bottom: 55px;z-index:unset;">
                                    <i class="material-icons">edit</i>
                                </a>
                                <img src="/panel/system/ViewBinaryImage.php?OPTION=BRANCH&&ID=<?php echo $BRANCH["ID"]; ?>" alt="<?php echo $BRANCH["SHORT_TITLE"]; ?> / <?php echo $BRANCH["TITLE"]; ?>" style="height:113px;" />
                            </div>
                            <div class="card-action">
                                <div style="float:left;margin-top:10px;height:41px;line-height:30px;padding-left:15px;width:80%;font-family: 'Montserrat', sans-serif !important;">
                                    <span>
                                        <a class="edit-link" style="color:#127c43;font-weight:bold;" href="#">
                                            <?php echo $BRANCH["SHORT_TITLE"]; ?> /
                                        </a>
                                    </span>
                                    <span>
                                        <a class="edit-link" style="color:#000;" href="#">
                                            <?php echo $BRANCH["TITLE"]; ?>
                                        </a>
                                    </span>
                                </div>
                                <div style="float:left;margin-top:10px;width:20%">
                                    <div class="switch m-b-md">
                                        <label>
                                            <input type="checkbox" data-uniq-id="<?php echo $BRANCH["ID"]; ?>" <?php echo $CHECKED; ?> />
                                            <span class="lever"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>

        </form>
    </div>


    <div id="mdlBranchEdit" class="modal modal-fixed-footer">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="CURRENT_PAGE" />
            <div class="modal-content">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <h4>
                    <?php echo $bahadir->TRANSLATE_WORD("branş", 1); ?>
                </h4>
                <div class="modal-body">
                    <ul id="errors"></ul>

                    <div class="col-md-12">

                        <div class="row">
                            <div class="switch m-b-md" style="float:right;">
                                <label>
                                    <?php echo $bahadir->TRANSLATE_WORD("aktif", 1); ?>
                                    <input type="checkbox" name="VISIBILITY" db-state="0" />
                                    <span class="lever"></span>
                                    <?php echo $bahadir->TRANSLATE_WORD("pasif", 1); ?>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="SHORT-TITLE" type="text" class="validate" required />
                                <label for="SHORT-TITLE" class="">
                                    <?php echo $bahadir->TRANSLATE_WORD("kısa başlık (örn: NG)", 1); ?>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="TITLE" type="text" class="validate" required />
                                <label for="TITLE" class="">
                                    <?php echo $bahadir->TRANSLATE_WORD("başlık", 1); ?>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="SUB-TITLE" type="text" class="validate" required />
                                <label for="SUB-TITLE" class="">
                                    <?php echo $bahadir->TRANSLATE_WORD("alt başlık", 1); ?>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <button name="btnAdd_PDFFileInput" type="button" class="waves-effect waves-blue btn-flat"><?php echo $bahadir->TRANSLATE_WORD("yeni katalog dosyası ekle", 1); ?></button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div id="pdf-fileinput-container"></div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="DETAILS" name="DETAILS" class="materialize-textarea" length="120" required></textarea>                               
                                 <label for="DETAILS" class="">
                                    <?php echo $bahadir->TRANSLATE_WORD("detay", 1); ?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="file-field input-field">
                                    <div class="btn teal lighten-1">
                                        <span>
                                            <?php echo $bahadir->TRANSLATE_WORD("kapak fotoğrafı", 1); ?>
                                        </span>
                                        <input type="file" name="COVER-PHOTO" accept="image/*" required />
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
                <input type="hidden" name="MODUL" value="BRANCH" />
                <input type="hidden" name="DATA_ID" />
                <button name="btnKaydet" type="button" class="waves-effect waves-blue btn-flat">
                    <?php echo $bahadir->TRANSLATE_WORD("kaydet", 1); ?>
                </button>
                <button name="btnGuncelle" type="button" class="modal-action waves-effect waves-green btn-flat">
                    <?php echo $bahadir->TRANSLATE_WORD("güncelle", 1); ?>
                </button>
                <button name="btnKapat" type="button" class="modal-action modal-close waves-effect waves-red btn-flat" data-dismiss="modal">
                    <?php echo $bahadir->TRANSLATE_WORD("kapat", 1); ?>
                </button>
            </div>
        </form>
    </div>
    
</div>