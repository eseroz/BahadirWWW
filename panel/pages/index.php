<?php
$ID = $bahadir->fnc->get("ID");
if($_POST){
    $bahadir->SAYFA_GUNCELLE();
}
$SAYFA = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE ID = $ID")[0];
?>

<link href="/panel/pages/02-CORPORATE/01-ABOUT-US/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/02-CORPORATE/01-ABOUT-US/script.js"></script>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col s12">
            <div class="card white">
                <div class="card-content">
                    <div class="input-field">
                        <input name="baslik1" type="text" class="validate" required value="<?php echo $SAYFA["TITLE1"]; ?>" />
                        <label for="baslik1">
                            <?php echo $bahadir->TRANSLATE_WORD("başlık", 1); ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card white">
                <div class="card-content">
                    <div class="input-field">
                        <input name="baslik2" type="text" class="validate" required value="<?php echo $SAYFA["TITLE2"]; ?>" />
                        <label for="baslik2">
                            <?php echo $bahadir->TRANSLATE_WORD("alt başlık", 1); ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s6">
            <div class="card white">
                <div class="card-content">
                    <label for="content1">
                        <?php echo $bahadir->TRANSLATE_WORD("sağ içerik", 1); ?>
                    </label>
                    <textarea id="content1" name="content1">
                        <?php echo $SAYFA["CONTENT_LEFT"]; ?>
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card white">
                <div class="card-content">
                    <label for="content2">
                        <?php echo $bahadir->TRANSLATE_WORD("sol içerik", 1); ?>
                    </label>
                    <textarea id="content2" name="content2">
                        <?php echo $SAYFA["CONTENT_RIGHT"]; ?>
                    </textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>" /><button class="waves-effect waves-grey btn green m-b-xs" style="float:right;">KAYDET</button>
        </div>
    </div>
</form>
<script>
    (function () {
        $("[name='content1']").ckeditor({ height: 600 });
        $("[name='content2']").ckeditor({ height: 600 });
    })();
</script>