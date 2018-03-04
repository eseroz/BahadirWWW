<?php
$SELECTED_PAGE = "";
if(!empty($_POST["islem"])){

    $ID = $bahadir->fnc->post("id");
    $SELECTED_PAGE = $_POST["selected_page"];

    switch ($_POST["islem"])
    {
        case 'RESIM_SIL':
            $UPDATE_PAGE = $bahadir->mssqlDb->ExexQuery("UPDATE PAGES SET HEADER_IMAGE = NULL WHERE ID = $ID");
            break;
        case 'SAYFA_GUNCELLE':
            $TITLE1 = $bahadir->fnc->post("title1");
            $TITLE2 = $bahadir->fnc->post("title2");
            $DESCRIPTION = $bahadir->fnc->post("description");
            $LEFT_CONTENT = $bahadir->fnc->post("left_content");
            $RIGHT_CONTENT = $bahadir->fnc->post("right_content");
            if(file_exists($_FILES['resim']['tmp_name'])){
                $BINARY = $bahadir->fnc->CONVERT_POSTED_FILE_TO_BINARY($_FILES["resim"]);
                $UPDATE_PAGE = $bahadir->mssqlDb->ExexQuery("UPDATE PAGES SET TITLE1 = '$TITLE1', TITLE2 = '$TITLE2', DESCRIPTION = '$DESCRIPTION', CONTENT_LEFT = '$LEFT_CONTENT', CONTENT_RIGHT = '$RIGHT_CONTENT', HEADER_IMAGE = $BINARY WHERE ID = $ID");
            }else{
                $UPDATE_PAGE = $bahadir->mssqlDb->ExexQuery("UPDATE PAGES SET TITLE1 = '$TITLE1', TITLE2 = '$TITLE2', DESCRIPTION = '$DESCRIPTION', CONTENT_LEFT = '$LEFT_CONTENT', CONTENT_RIGHT = '$RIGHT_CONTENT' WHERE ID = $ID");
            }
            break;
    }
}
$HAKKIMIZDA = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE ID = 1")[0];
$ARGE_YONETIMI = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE ID = 2")[0];
$KALITE_YONETIMI = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE ID = 3")[0];
$YONETIM_ILKELERI = $bahadir->mssqlDb->Select("SELECT *FROM site.PAGES WHERE ID = 4")[0];

?>
<link href="/panel/pages/02-CORPRATE/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/02-CORPRATE/script.js"></script>
<script>
    CKEDITOR.config.height = 600;
    $(document).ready(function () {
        $("[name='btnResimYukle']").click(function () {
            $(this).parent().parent().find("input[type='file']").click();
        });
        $("input[type='file']").change(function () {
            $(this).parent().find("img").remove();
            $(this).parent().append("<img name='img_page_header' />");
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = new Image;
                    img.onload = function () {
                        var resim_buyuk = false;
                        if (img.width < 1920) {
                            alert("<?php echo $bahadir->TRANSLATE_WORD("Sayfa başlık resim genişliği en az 1920 pixel olmalıdır", 1); ?>.");
                            resim_buyuk = true;
                        }
                        var fsize = ($("input[type='file']")[0].files[0].size / 1024);
                        var kbSize = (Math.round(fsize * 100) / 100);
                        if (kbSize > 1024) {
                            alert("<?php echo $bahadir->TRANSLATE_WORD("Dosya boyutu en fazla 1 mb. olmalıdır", 1); ?>.");
                            resim_buyuk = true;
                        }
                        if (resim_buyuk == true) {
                            $("[name='img_page_header']").removeAttr("src");
                        } else {
                            REGISTER_IMG_EVENTS();
                        }
                    };
                    img.src = reader.result;
                    $("[name='img_page_header']").attr('src', e.target.result).css({ "width": "100%" });
                };
                reader.readAsDataURL(this.files[0]);
            }
            $('[x-name="btnResimSil"]').show();
        });

        $(".tabs li").click(function () {
              var href = $(this).find("a").attr("href");
            $("[name='selected_page']").each(function () {
                $(this).val(href);
            });
        });
    });
</script>

<?php 
if($SELECTED_PAGE){
?>
<script>
    $(document).ready(function () {
        $(".tabs li a").removeClass("active");
        $(".x-content").css({ "display":"none" });
        $('<?php echo $SELECTED_PAGE; ?>').removeAttr("style").css({ "margin-top": " 20px" });
        $("[href='<?php echo $SELECTED_PAGE; ?>']").addClass("active");
    });
</script>
<?php
}
?>

<div class="row">

    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3">
                <a href="#hakkimizda" class="active">
                    <?php echo $bahadir->TRANSLATE_WORD("hakkımızda", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#arge">
                    <?php echo $bahadir->TRANSLATE_WORD("ar-ge yönetimi", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#kalite">
                    <?php echo $bahadir->TRANSLATE_WORD("kalite yönetimi", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a class="" href="#yonetim-ilkeleri">
                    <?php echo $bahadir->TRANSLATE_WORD("yönetim ilkeleri", 1); ?>
                </a>
            </li>
            <div class="indicator" style="right: 460.5px; left: 0px;"></div>
        </ul>
    </div>

    <div id="hakkimizda" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="1" />
            <input type="hidden" name="selected_page" />
            <div class="card-content">
                <div class="input-field col s12">
                    <input type="text" name="title1" placeholder="<?php echo $bahadir->TRANSLATE_WORD("üst başlık", 1); ?>" value="<?php echo $HAKKIMIZDA["TITLE1"]; ?>" />
                    <label>Üst Başlık</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="title2" placeholder="<?php echo $bahadir->TRANSLATE_WORD("alt başlık", 1); ?>" value="<?php echo $HAKKIMIZDA["TITLE2"]; ?>" />
                    <label for="baslik2">Alt Başlık</label>
                </div>

                <div class="col s6">
                    <label>Sağ İçerik</label>
                    <textarea x-type="content" name="left_content"><?php echo $HAKKIMIZDA["CONTENT_LEFT"]; ?></textarea>
                </div>
                <div class="col s6">
                    <label>Sol İçerik</label>
                    <textarea x-type="content" name="right_content"><?php echo $HAKKIMIZDA["CONTENT_RIGHT"]; ?></textarea>
                </div>
                <br />              
            </div>
            <button type="submit" name="islem" value="SAYFA_GUNCELLE" class="waves-effect waves-light btn blue m-b-xs" style="float:right;margin:15px;">
                <?php echo $bahadir->TRANSLATE_WORD("Kaydet", 1); ?>
            </button>
        </form>
    </div>

    <div id="arge" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="2" />
            <input type="hidden" name="selected_page" />
            <div class="card-content">

                <div class="input-field col s12">
                    <input type="text" name="title1" value="<?php echo $ARGE_YONETIMI["TITLE1"]; ?>" placeholder="<?php echo $bahadir->TRANSLATE_WORD("üst başlık", 1); ?>" />
                    <label>Üst Başlık</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="title2" value="<?php echo $ARGE_YONETIMI["TITLE2"]; ?>" placeholder="<?php echo $bahadir->TRANSLATE_WORD("alt başlık", 1); ?>" />
                    <label>Alt Başlık</label>
                </div>

                <div class="input-field col s12">
                    <textarea name="description" class="materialize-textarea" placeholder="<?php echo $bahadir->TRANSLATE_WORD("açıklama", 1); ?>"><?php echo $ARGE_YONETIMI["DESCRIPTION"]; ?></textarea>
                    <label>Açıklama</label>
                </div>

                <div class="col s12 m12 l12">
                    <label>Sayfa Resmi</label>
                    <div class="card">
                        <div class="card-content" style="height:auto;overflow:hidden;min-height:200px;">
                            <?php
                            $HEADER_IMAGE_EXIST = $ARGE_YONETIMI["HEADER_IMAGE"] == null?0:1;
                            if($HEADER_IMAGE_EXIST == 1){
                            ?>
                            <img name='img_page_header' src="/panel/system/ViewBinaryImage.php?OPTION=PAGE_HEADER&ID=<?php echo $ARGE_YONETIMI["ID"]; ?>" style="" width="100%" />
                            <?php
                            }
                            ?>
                            <input type="file" name="resim" style="display:none;" />
                            <div name="button_container" style="position: absolute;width: auto;height: 38px;left: 25px;top: 25px;background-color: #fff;">
                                <button type="button" name="btnResimYukle" title="Resim dosyası yükle" class="waves-effect waves-white btn-flat m-b-xs" style="float:left;">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </button>
                                <button onclick="return confirm('Silmek istediğinizden emin misiniz?');" type="submit" title="Resmi kaldır" name="islem" value="RESIM_SIL" x-name="btnResimSil" class="waves-effect waves-white btn-flat m-b-xs" style="float:left;<?php echo $HEADER_IMAGE_EXIST == 0?'display:none;':'display:block;'; ?>">
                                    <i class="fa fa-times"></i>
                                </button>
                                <span style="line-height: 40px;margin-right: 15px;">1920 x 490</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <label>Sayfa İçeriği</label>
                    <textarea x-type="content" name="left_content">
                        <?php echo $ARGE_YONETIMI["CONTENT_LEFT"]; ?>
                    </textarea>
                </div>
                <div class="col s6" style="display:none;">
                    <textarea x-type="content" name="right_content" style="height:200px;">
                        <?php echo $ARGE_YONETIMI["CONTENT_RIGHT"]; ?>
                    </textarea>
                </div>
            </div>
            <button type="submit" name="islem" value="SAYFA_GUNCELLE" class="waves-effect waves-light btn blue m-b-xs" style="float:right;margin:15px;">
                <?php echo $bahadir->TRANSLATE_WORD("Kaydet", 1); ?>
            </button>
        </form>
    </div>

    <div id="kalite" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="3" />
            <input type="hidden" name="selected_page" />
            <div class="card-content">

                <div class="input-field col s12">
                    <input type="text" name="title1" value="<?php echo $KALITE_YONETIMI["TITLE1"]; ?>" placeholder="<?php echo $bahadir->TRANSLATE_WORD("üst başlık", 1); ?>" />
                    <label>Üst Başlık</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="title2" value="<?php echo $KALITE_YONETIMI["TITLE2"]; ?>" placeholder="<?php echo $bahadir->TRANSLATE_WORD("alt başlık", 1); ?>" />
                    <label>Alt Başlık</label>
                </div>
                <div class="input-field col s12">
                    <textarea name="description" class="materialize-textarea" placeholder="<?php echo $bahadir->TRANSLATE_WORD("açıklama", 1); ?>"><?php echo $KALITE_YONETIMI["DESCRIPTION"]; ?></textarea>
                    <label>Açıklama</label>
                </div>

                <div class="col s12 m12 l12">
                    <label>Sayfa Resmi</label>
                    <div class="card">
                        <div class="card-content" style="height:auto;overflow:hidden;min-height:200px;">
                            <?php
                            $HEADER_IMAGE_EXIST = $KALITE_YONETIMI["HEADER_IMAGE"] == null?0:1;
                            if($HEADER_IMAGE_EXIST == 1){
                            ?>
                            <img name='img_page_header' src="/panel/system/ViewBinaryImage.php?OPTION=PAGE_HEADER&ID=<?php echo $KALITE_YONETIMI["ID"]; ?>" style="" width="100%" />
                            <?php
                            }
                            ?>
                            <input type="file" name="resim" style="display:none;" />
                            <div name="button_container" style="position: absolute;width: auto;height: 38px;left: 25px;top: 25px;background-color: #fff;">
                                <button type="button" name="btnResimYukle" title="Resim dosyası yükle" class="waves-effect waves-white btn-flat m-b-xs" style="float:left;">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </button>
                                <button onclick="return confirm('Silmek istediğinizden emin misiniz?');" type="submit" title="Resmi kaldır" name="islem" value="RESIM_SIL" x-name="btnResimSil" class="waves-effect waves-white btn-flat m-b-xs" style="float:left;<?php echo $HEADER_IMAGE_EXIST == 0?'display:none;':'display:block;'; ?>">
                                    <i class="fa fa-times"></i>
                                </button>
                                <span style="line-height: 40px;margin-right: 15px;">1920 x 490</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <label>Sayfa İçeriği</label>
                    <textarea x-type="content" name="left_content">
                        <?php echo $KALITE_YONETIMI["CONTENT_LEFT"]; ?>
                    </textarea>
                </div>
                <div class="col s6" style="display:none;">
                    <textarea x-type="content" name="right_content" style="height:200px;">
                        <?php echo $KALITE_YONETIMI["CONTENT_RIGHT"]; ?>
                    </textarea>
                </div>
            </div>
            <button type="submit" name="islem" value="SAYFA_GUNCELLE" class="waves-effect waves-light btn blue m-b-xs" style="float:right;margin:15px;">
                <?php echo $bahadir->TRANSLATE_WORD("Kaydet", 1); ?>
            </button>
        </form>
    </div>

    <div id="yonetim-ilkeleri" class="col s12 x-content" style="display: block;margin-top:20px;">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="5" />
            <input type="hidden" name="selected_page" />
            <div class="card-content">
                <div class="input-field col s12">
                    <input type="text" name="title1" value="<?php echo $YONETIM_ILKELERI["TITLE1"]; ?>" placeholder="<?php echo $bahadir->TRANSLATE_WORD("üst başlık", 1); ?>" />
                    <label>Üst Başlık</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="title2" value="<?php echo $YONETIM_ILKELERI["TITLE2"]; ?>" placeholder="<?php echo $bahadir->TRANSLATE_WORD("alt başlık", 1); ?>" />
                    <label>Alt Başlık</label>
                </div>
                <div class="input-field col s12">
                    <textarea name="description" class="materialize-textarea" placeholder="<?php echo $bahadir->TRANSLATE_WORD("açıklama", 1); ?>"><?php echo $YONETIM_ILKELERI["DESCRIPTION"]; ?></textarea>
                    <label>Açıklama</label>
                </div>
                <div class="col s12 m12 l12">
                    <label>Sayfa Resmi</label>
                    <div class="card">
                        <div class="card-content" style="height:auto;overflow:hidden;min-height:200px;">
                            <?php
                            $HEADER_IMAGE_EXIST = $YONETIM_ILKELERI["HEADER_IMAGE"] == null?0:1;
                            if($HEADER_IMAGE_EXIST == 1){
                            ?>
                            <img name='img_page_header' src="/panel/system/ViewBinaryImage.php?OPTION=PAGE_HEADER&ID=<?php echo $YONETIM_ILKELERI["ID"]; ?>" style="" width="100%" />
                            <?php
                            }
                            ?>
                            <input type="file" name="resim" style="display:none;" />
                            <div name="button_container" style="position: absolute;width: auto;height: 38px;left: 25px;top: 25px;background-color: #fff;">
                                <button type="button" name="btnResimYukle" title="Resim dosyası yükle" class="waves-effect waves-white btn-flat m-b-xs" style="float:left;">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </button>
                                <button onclick="return confirm('Silmek istediğinizden emin misiniz?');" type="submit" title="Resmi kaldır" name="islem" value="RESIM_SIL" x-name="btnResimSil" class="waves-effect waves-white btn-flat m-b-xs" style="float:left;<?php echo $HEADER_IMAGE_EXIST == 0?'display:none;':'display:block;'; ?>">
                                    <i class="fa fa-times"></i>
                                </button>
                                <span style="line-height: 40px;margin-right: 15px;">1920 x 490</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <label>Sayfa İçeriği</label>
                    <textarea x-type="content" name="left_content">
                        <?php echo $YONETIM_ILKELERI["CONTENT_LEFT"]; ?>
                    </textarea>
                </div>
                <div class="col s6" style="display:none;">
                    <textarea x-type="content" name="right_content"></textarea>
                </div>
            </div>
            <button type="submit" name="islem" value="SAYFA_GUNCELLE" class="waves-effect waves-light btn blue m-b-xs" style="float:right;margin:15px;">
                <?php echo $bahadir->TRANSLATE_WORD("Kaydet", 1); ?>
            </button>
        </form>
    </div>

</div>