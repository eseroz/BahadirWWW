<?php


if($_POST){

    $firma_adi = $bahadir->fnc->post("firma_adi");
    $firma_unvan = $bahadir->fnc->post("firma_unvan");
    $logo1 = $bahadir->fnc->post("logo1");
    $logo2 = $bahadir->fnc->post("logo2");
    $title = $bahadir->fnc->post("title");
    $telefon_no = $bahadir->fnc->post("telefon_no");
    $fax_no = $bahadir->fnc->post("fax_no");
    $eposta = $bahadir->fnc->post("eposta");
    $adres = $bahadir->fnc->post("adres");
    $smtp_username = $bahadir->fnc->post("smtp_username");
    $smtp_password = $bahadir->fnc->post("smtp_password");
    $smtp_host = $bahadir->fnc->post("smtp_host");
    $smtp_port = $bahadir->fnc->post("smtp_port");
    $smtp_secure = $bahadir->fnc->post("smtp_secure");
    $smtp_authentication = $bahadir->fnc->post("smtp_authentication");
    $url = $bahadir->fnc->post("url");
    $description = $bahadir->fnc->post("description");
    $keywords = $bahadir->fnc->post("keywords");
    $copyright = $bahadir->fnc->post("copyright");
    $google_map = $bahadir->fnc->post("google_map");
    $facebook = $bahadir->fnc->post("facebook");
    $twitter = $bahadir->fnc->post("twitter");
    $linkedin = $bahadir->fnc->post("linkedin");
    $varsayilan_dil = $bahadir->fnc->post("varsayilan_dil");
       
    $UPDATE = $bahadir->mssqlDb->ExexQuery("UPDATE SITE_SETTINGS SET COMPANY_NAME = '$firma_adi', COMPANY_NAME_LONG = '$firma_unvan', LOGO1 = '$logo1', LOGO2 = '$logo2', TITLE = '$title', PHONE = '$telefon_no', FAX = '$fax_no', EMAIL = '$eposta', ADDRESS = '$adres', FACEBOOK = '$facebook', TWITTER = '$twitter', LINKEDIN = '$linkedin', SMTP_USERNAME = '$smtp_username', SMTP_PASSWORD = '$smtp_password', SMTP_HOST = '$smtp_host', SMTP_PORT = '$smtp_port', SMTP_SECURE = '$smtp_secure', SMTP_AUTHENTICATION = '$smtp_authentication', META_DESCRIPTION = '$description', META_KEYWORDS = '$keywords', META_COPYRIGHT = '$copyright', SITE_URL = '$url', MAP_URL = '$google_map', DEFAULT_LANG_ID = $varsayilan_dil");
}

$SETTINGS = $bahadir->GET_SITE_SETTINGS();
?>

<link href="/panel/pages/08-SETTINGS/style.css" rel="stylesheet" type="text/css" />
<script src="/panel/pages/08-SETTINGS/script.js"></script>

<style>
    textarea.materialize-textarea {
        height: 6rem !important;
        overflow:visible;
    }
</style>

<div class="row">

    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <li class="tab col s3">
                <a href="#genel" class="active">
                    <?php echo $bahadir->TRANSLATE_WORD("genel ayarlar", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a href="#sosyalmedya">
                    <?php echo $bahadir->TRANSLATE_WORD("sosyal medya", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a href="#smtp">
                    <?php echo $bahadir->TRANSLATE_WORD("smtp ayarları", 1); ?>
                </a>
            </li>
            <li class="tab col s3">
                <a href="#seo">
                    <?php echo $bahadir->TRANSLATE_WORD("seo ayarları", 1); ?>
                </a>
            </li>
            <div class="indicator" style="right: 460.5px; left: 0px;"></div>
        </ul>
    </div>
       
    <form method="post" enctype="multipart/form-data">
        <div id="genel" class="col s12 x-content" style="display: block;margin-top:20px;">
            <label>Varsayılan Site Dili</label>
            <select name="varsayilan_dil" class="browser-default">               
                <?php
                $LANGUAGES = $bahadir->mssqlDb->Select("SELECT *FROM translate.LANGUAGE");
                foreach ($LANGUAGES as $LANGUAGE)
                {
                    $SELECTED ="";
                    if($SETTINGS["DEFAULT_LANG_ID"] == $LANGUAGE["ID"]){ $SELECTED = "selected"; }
                ?>

                <option value="<?php echo $LANGUAGE["ID"]; ?>" <?php echo $SELECTED; ?>><?php echo $LANGUAGE["LANGUAGE_LONG"]; ?></option>

                <?php  } ?>

            </select>

            <div class="input-field col s12">
                <input type="text" name="firma_adi" value="<?php echo $SETTINGS["COMPANY_NAME"]; ?>" />
                <label>firma adı</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="firma_unvan" value="<?php echo $SETTINGS["COMPANY_NAME_LONG"]; ?>" />
                <label>firma ünvanı</label>
            </div>

            <div class="input-field col s6">
                <textarea name="logo1" class="materialize-textarea" rows="5"><?php echo $SETTINGS["LOGO1"]; ?></textarea>
                <label>logo (svg)</label>
            </div>

            <div class="input-field col s6">
                <textarea name="logo2" class="materialize-textarea"><?php echo $SETTINGS["LOGO2"]; ?></textarea>
                <label>mobil logo (svg)</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="title" value="<?php echo $SETTINGS["TITLE"]; ?>" />
                <label>tarayıcı başlığı (title)</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="telefon_no" value="<?php echo $SETTINGS["PHONE"]; ?>" />
                <label>telefon numarası</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="fax_no" value="<?php echo $SETTINGS["FAX"]; ?>" />
                <label>fax numarası</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="eposta" value="<?php echo $SETTINGS["EMAIL"]; ?>" />
                <label>e-posta adresi</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="adres" value="<?php echo $SETTINGS["ADDRESS"]; ?>" />
                <label>adres</label>
            </div>


            <div class="input-field col s12">
                <input type="text" name="google_map" value="<?php echo $SETTINGS["MAP_URL"]; ?>" />
                <label>harita adresi</label>
            </div>

        </div>

        <div id="smtp" class="col s12 x-content" style="display: block;margin-top:20px;">
            <div class="input-field col s12">
                <input type="text" name="smtp_username" value="<?php echo $SETTINGS["SMTP_USERNAME"]; ?>" />
                <label>smtp kullanıcı adı</label>
            </div>

            <div class="input-field col s12">
                <input type="password" name="smtp_password" value="<?php echo $SETTINGS["SMTP_PASSWORD"]; ?>" />
                <label>smtp parola</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="smtp_host" value="<?php echo $SETTINGS["SMTP_HOST"]; ?>" />
                <label>smtp host</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="smtp_port" value="<?php echo $SETTINGS["SMTP_PORT"]; ?>" />
                <label>smtp port</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="smtp_secure" value="<?php echo $SETTINGS["SMTP_SECURE"]; ?>" />
                <label>smtp secure</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="smtp_authentication" value="<?php echo $SETTINGS["SMTP_AUTHENTICATION"]; ?>" />
                <label>smtp authentication</label>
            </div>

        </div>

        <div id="seo" class="col s12 x-content" style="display: block;margin-top:20px;">

            <div class="input-field col s12">
                <input type="text" name="url" value="<?php echo $SETTINGS["SITE_URL"]; ?>" />
                <label>site url</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="description" value="<?php echo $SETTINGS["META_DESCRIPTION"]; ?>" />
                <label>açıklama (meta description)</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="keywords" value="<?php echo $SETTINGS["META_KEYWORDS"]; ?>" />
                <label>anahtar kelimeler (meta keywords)</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="copyright" value="<?php echo $SETTINGS["META_COPYRIGHT"]; ?>" />
                <label>telif yazısı (meta copyright)</label>
            </div>

        </div>
               
        <div id="sosyalmedya" class="col s12 x-content" style="display: block;margin-top:20px;">
            <div class="input-field col s12">
                <input type="text" name="facebook" value="<?php echo $SETTINGS["FACEBOOK"]; ?>" />
                <label>facebook</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="twitter" value="<?php echo $SETTINGS["TWITTER"]; ?>" />
                <label>twitter</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="linkedin" value="<?php echo $SETTINGS["LINKEDIN"]; ?>" />
                <label>linkedin</label>
            </div>
        </div>

        <div class="col s12">
            <button class="btn">Kaydet</button>
        </div>

    </form>
</div>