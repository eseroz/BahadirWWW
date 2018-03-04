<div>
            

<style>
    .argeBG_img {
        background: url('/assets/img/ik_bg.png') center center / cover no-repeat #fff;
    }
</style>

<script src="/assets/js/icheck.min.js"></script>
<link href="/assets/plugins/iCheck/custom.css" rel="stylesheet" />
<link href="/assets/css/Resolution/InsanKaynaklari.css" rel="stylesheet" />

<link href="/assets/css/DateTimePicker.min.css" rel="stylesheet" />
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/css/jquerysctipttop.css" rel="stylesheet" />

<!--<script type="text/javascript" src="Areas/Admin/js/jquery.form.js"></script>-->
<script type="text/javascript" src="/assets/js/Validation.js"></script>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="/Scripts/Css/DateTimePicker-ltie9.css" />
<script type="text/javascript" src="/Scripts/Js/DateTimePicker-ltie9.js"></script>
<![endif]-->

<script src="/assets/js/DateTimePicker.min.js"></script>
<script src="/assets/js/InsanKaynaklari.js"></script>

<div class="argeBG_img">
    <div class="argeBG_imgOpacity">
        <div class="siteContainer" id="bannerSiteContainer">
            <div class="indirmeBgTextContainer">
                <div id="argeBgTextContainer">
                    <div class="indirmeBgTextContainerTitle1"> KATALOG & BROŞÜR</div>
                    <div class="indirmeBgTextContainerTitle2">İNDİRME</div>
                    <div class="indirmeBgTextContainerText">Uzmanlık alanınız ile ilgili branş katalogları ve broşürleri bu sayfalar altında bulabilir ve bilgi alabilirsiniz.</div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="siteContainer">
    <div class="argePageTitle">ÖZGEÇMİŞ FORMU</div>
    <div class="argePageTitleFullLine"></div>
    <div class="argePageTitleLine"></div>
<form action="http://bahadir2.ajansg.com/IK/OzgecmisFormPost" id="form" method="post">        <div class="ik_kisiselBilgilerContainer" id="kisiselBilgileri_ikKisiselBilgilerContainer">
            <div class="ik_kisiselBilgilerContainerBanner">
                <div class="ik_kisiselBilgilerContainerBannerTitle">
                    <table style="margin: 0 auto;">
                        <tr>
                            <td>
                                <img src="/assets/img/kisiselBilgilerIcon.png" />
                            </td>
                            <td>
                                <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; ERKEK</div>
                            </td>
                        </tr>
                    </table>
                    <div class="ik_kisiselBilgilerContainerBannerTitleLine"></div>
                </div>
            </div>
            <ul class="ik_kisiselBilgilerContainerContent">
                <li>
                    <input autocomplete="off" class="bahadirDropdown1" id="txt_adSoyad" name="txt_adSoyad" placeholder="ADI SOYADI..." required="required" type="text" value="" />
                    <div class="clear"></div>
                </li>
                <li>
                    <input autocomplete="off" class="bahadirDropdown1" id="txt_dogumYeri" name="txt_dogumYeri" placeholder="DOĞUM YERİ..." required="required" type="text" value="" />
                    <div class="clear"></div>
                </li>
                <li>
                    <input type="text" id="txt_dogumTarihi" name="txt_dogumTarihi" class="bahadirDropdown1" placeholder="DOĞUM TARİHİ..." data-field="date" required="required" readonly>
                    <div class="clear"></div>
                </li>
                <li class="ik_kisiselBilgilerContainerContentCinsiyet">
                    <div class="ik_kisiselBilgilerContainerContentEhliyetTitle">EHLİYET</div>
                    <table class="ik_kisiselBilgilerContainerContentCinsiyetTableContainer">
                        <tr>
                            <td class="ik_kisiselBilgilerContainerContentCinsiyetTableContainerVarItem">
                                <input type="radio" name="rdo_cinsiyet" id="rdo_cinsiyetErkek" value="1" class="css-checkbox" /><label for="rdo_cinsiyetErkek" class="css-label radGroup1">KADIN</label>
                            </td>
                            <td>
                                <input type="radio" name="rdo_cinsiyet" id="rdo_cinsiyetKadin" value="2" class="css-checkbox" /><label for="rdo_cinsiyetKadin" class="css-label radGroup1">CİNSİYET</label>
                            </td>
                            <input id="hd_cinsiyet" name="hd_cinsiyet" type="hidden" value="" />
                        </tr>
                    </table>
                    <div class="clear"></div>
                </li>
                <li id="li_drp_askerlik" style="display:none;">
                    <select class="drp_ikAskerlikDurumu" id="drp_askerlik" name="drp_askerlik"><option selected="selected" value="-1">YAPILDI</option>
<option value="YAPILMADI">YAPILMADI</option>
<option value="MUAF">MUAF</option>
<option value="MEDENİ DURUMU">MEDENİ DURUMU</option>
</select>
                    <div class="clear"></div>
                </li>
                <li>
                    <select class="drp_ikAskerlikDurumu" id="drp_medeniDurum" name="drp_medeniDurum"><option selected="selected" value="-1">EVLİ</option>
<option value="BEKAR">BEKAR</option>
<option value="Sürücü Belgesi Sınıfı">S&#252;r&#252;c&#252; Belgesi Sınıfı</option>
</select>
                    <div class="clear"></div>
                </li>
                <li class="ik_kisiselBilgilerContainerContentCinsiyet">
                    <div class="ik_kisiselBilgilerContainerContentEhliyetTitle">VAR</div>
                    <table class="ik_kisiselBilgilerContainerContentEhliyetTableContainer">
                        <tr>
                            <td class="ik_kisiselBilgilerContainerContentEhliyetTableContainerVarItem">
                                <input type="radio" name="rdo_ehliyet" id="rdo_ehliyetVar" value="1" class="css-checkbox" /><label for="rdo_ehliyetVar" class="css-label radGroup1">YOK</label>
                            </td>
                            <td>
                                <input type="radio" name="rdo_ehliyet" id="rdo_ehliyetYok" value="2" class="css-checkbox" /><label for="rdo_ehliyetYok" class="css-label radGroup1">EĞİTİM BİLGİLERİ</label>
                            </td>
                            <input id="rdo_ehliyetVal" name="rdo_ehliyetVal" type="hidden" value="1" />
                        </tr>
                    </table>
                    <div class="clear"></div>
                </li>
                <li class="ik_kisiselBilgilerContainerContentCinsiyet" id="surucuBelgeSinifi" style="display:none;">
                    <select class="drp_ikAskerlikDurumu" id="drp_surucuBelgeSinifi" name="drp_surucuBelgeSinifi" style="margin-top:11px;"><option selected="selected" value="-1">OKUL ADI...</option>
<option value="A1">A1</option>
<option value="A2">A2</option>
<option value="B">B</option>
<option value="C">C</option>
</select>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>
        <div class="ik_kisiselBilgilerContainer" id="egitimBilgileri_ikKisiselBilgilerContainer">
            <div class="ik_kisiselBilgilerContainerBanner">
                <div class="ik_kisiselBilgilerContainerBannerTitle">
                    <table style="margin: 0 auto;">
                        <tr>
                            <td>
                                <img src="/assets/img/egitimBilgileriIcon.png" />
                            </td>
                            <td>
                                <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; OKUL EKLE</div>
                            </td>
                        </tr>
                    </table>
                    <div class="ik_kisiselBilgilerContainerBannerTitleLine"></div>
                </div>
            </div>
            <ul class="ik_kisiselBilgilerContainerContent">
                <li>
                    <input autocomplete="off" class="bahadirDropdown1" id="txt_okulAdi" name="txt_okulAdi" placeholder="OKUL ADI..." type="text" value="" />
                    <div class="clear"></div>
                </li>
                <li>
                    <input autocomplete="off" class="bahadirDatetimeBox" id="txt_bolum" name="txt_bolum" placeholder="BÖLÜM..." type="text" value="" />
                    <div class="clear"></div>
                </li>
                <li>
                    <select class="drp_ikAskerlikDurumu" id="drp_ogrenimDerecesi" name="drp_ogrenimDerecesi"><option selected="selected" value="-1">&#214;NLİSANS</option>
<option value="LİSANS">LİSANS</option>
<option value="DOKTORA">DOKTORA</option>
<option value="Tarih">Tarih</option>
</select>
                    <div class="clear"></div>
                </li>
                <li>
                    <input type="text" id="txt_ogrenimDerecesiBasTarih" name="txt_ogrenimDerecesiBasTar" class="bahadirDropdown1" placeholder="BAŞLANGIÇ TARİHİ" data-field="date" readonly>
                    <div class="clear"></div>
                </li>
                <li>
                    <input type="text" id="txt_ogrenimDerecesiBitTarih" name="txt_ogrenimDerecesiBitTar" class="bahadirDropdown1" placeholder="BİTİŞ TARİHİ" data-field="date" readonly>
                    <div class="clear"></div>
                </li>
                <li>
                    <input id="hd_ikSession" name="hd_ikSession" type="hidden" value="372a7da3-d839-4e91-885f-c3bad713d33a" />
                    <a href="javascript:void(0)" class="ik_okulEkleTitleContainer" id="a_okulEkle">
                        <img class="okulEkleIcon" style="float: left;" src="/assets/img/okulEkleIcon.png" />
                        <div class="ik_okulEkleTitle">YABANCI DİL BİLGİSİ</div>
                    </a>
                    <div class="clear"></div>
                </li>
                <li id="ogrenimDerecesiContainer">

                </li>
            </ul>
            <div class="clear"></div>

            <div id="yabanciDil_ikKisiselBilgilerContainerBanner">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="margin: 0 auto;">
                            <tr>
                                <td>
                                    <img src="/assets/img/yabanciDilBilgisiIcon.png" />
                                </td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; DİL EKLE</div>
                                </td>
                            </tr>
                        </table>
                        <div class="ik_kisiselBilgilerContainerBannerTitleLine"></div>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <input autocomplete="off" class="bahadirDropdown1 bahadirDropdown1Dil" id="txt_yabanciDil" name="txt_yabanciDil" placeholder="DİL..." type="text" value="" />
                        <select class="drp_ikDilSeviye" id="drp_yabanciDilSeviye" name="drp_yabanciDilSeviye"><option selected="selected" value="-1">AZ</option>
<option value="AZ">ORTA</option>
<option value="ORTA">İYİ</option>
<option value="İYİ">FİRMA ADI...</option>
<option value="ÇOK İYİ">Bekleyiniz...</option>
</select>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="clear"></div>
                        <a class="ik_okulEkleTitleContainer" href="javascript:void(0)" id="yabanciDilEkle">
                            <img style="float: left;" class="okulEkleIcon" src="/assets/img/okulEkleIcon.png" />
                            <div class="ik_okulEkleTitle">İŞ DENEYİMİ</div>
                        </a>
                        <div class="clear"></div>
                    </li>
                    <li id="yabanciDilBilgisiContainer">

                    </li>
                </ul>
            </div>
        </div>
        <div class="ik_kisiselBilgilerContainer" id="isDeneyimi_ikKisiselBilgilerContainer">
            <div class="isDeneyimi_ikKisiselBilgilerContainer_isDeneyimi">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="margin: 0 auto;">
                            <tr>
                                <td>
                                    <img src="/assets/img/isDeneyimiIcon.png" />
                                </td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; İŞ DENEYİMİ EKLE</div>
                                </td>
                            </tr>
                        </table>
                        <div class="ik_kisiselBilgilerContainerBannerTitleLine"></div>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <input autocomplete="off" class="bahadirDropdown1" id="txt_firmaAdi" name="txt_firmaAdi" placeholder="FİRMA ADI..." type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirDatetimeBox" id="txt_pozisyon" name="txt_pozisyon" placeholder="POZİSYON..." type="text" value="" />
                    </li>
                    <li>
                        <select class="drp_ikAskerlikDurumu2" id="drp_ayrilmaSebebi" name="drp_ayrilmaSebebi"><option selected="selected" value="-1">AYRILMA SEBEBİ</option>
<option value="Kovuldum :)">Kovuldum :)</option>
</select>
                    </li>
                    <li>
                        <input type="text" id="txt_iseBaslamaTarihi" name="txt_iseBaslamaTarihi" class="bahadirDropdown1" placeholder="Başlangıç Tarihi" data-field="date" readonly>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <input type="text" id="txt_istenAyrilmaTarihi" name="txt_istenAyrilmaTarihi" class="bahadirDropdown1" placeholder="Bitiş Tarihi" data-field="date" readonly>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="ik_okulEkleTitleContainer" id="isDeneyimiEkle">
                            <img style="float: left;" class="okulEkleIcon" src="/assets/img/okulEkleIcon.png" />
                            <div class="ik_okulEkleTitle">MESLEKİ PROGRAM BİLGİSİ</div>
                        </a>
                    </li>
                    <li id="isDeneyimiContainer">

                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="isDeneyimi_ikKisiselBilgilerContainer_meslekiProgramBilgisi">
                <div class="ik_kisiselBilgilerContainerBanner" style="margin-top: 40px;">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="margin: 0 auto;">
                            <tr>
                                <td>
                                    <img src="/assets/img/meslekiProgramBilgisiIcon.png" />
                                </td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; EKLE</div>
                                </td>
                            </tr>
                        </table>
                        <div class="ik_kisiselBilgilerContainerBannerTitleLine"></div>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <input autocomplete="off" class="bahadirDropdown1" id="txt_program" name="txt_program" placeholder="PROGRAM" style="width:140px;" type="text" value="" />
                        <select class="drp_ikDilSeviye" id="drp_programSeviye" name="drp_programSeviye"><option selected="selected" value="-1">AZ</option>
<option value="AZ">ORTA</option>
<option value="ORTA">İYİ</option>
<option value="İYİ">FİRMA ADI...</option>
<option value="ÇOK İYİ">Bekleyiniz...</option>
</select>
                    </li>
                    <li>
                        <div class="clear"></div>
                        <a class="ik_okulEkleTitleContainer" href="javascript:void(0)" id="meslekiProgramEkle">
                            <img style="float: left;" class="okulEkleIcon" src="/assets/img/okulEkleIcon.png" />
                            <div class="ik_okulEkleTitle">İLETİŞİM</div>
                        </a>
                    </li>
                    <li id="meslekiProgram_listContainer">

                    </li>
                </ul>
            </div>
        </div>
        <div class="ik_kisiselBilgilerContainer" id="iletisim_ikKisiselBilgilerContainer">
            <div class="iletisim_ikKisiselBilgilerContainerForm">
                <div class="ik_kisiselBilgilerContainerBanner">
                    <div class="ik_kisiselBilgilerContainerBannerTitle">
                        <table style="margin: 0 auto;">
                            <tr>
                                <td>
                                    <img src="/assets/img/iletisimIcon.png" />
                                </td>
                                <td>
                                    <div class="ik_kisiselBilgilerContainerBannerTitle">&nbsp; &nbsp; &nbsp; AÇIKLAMA METNİ EKLEMEK İSTİYORUM</div>
                                </td>
                            </tr>
                        </table>
                        <div class="ik_kisiselBilgilerContainerBannerTitleLine"></div>
                    </div>
                </div>
                <ul class="ik_kisiselBilgilerContainerContent">
                    <li>
                        <input autocomplete="off" class="bahadirDatetimeBox" id="txt_celTelNo" name="txt_celTelNo" placeholder="CEP TEL NUMARASI..." required="required" type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirDatetimeBox" id="txt_evTelNo" name="txt_evTelNo" placeholder="EV/İŞ TEL NUMARASI..." required="required" type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirDatetimeBox" id="txt_eMail" name="txt_eMail" placeholder="E-POSTA..." required="required" type="text" value="" />
                    </li>
                    <li>
                        <input autocomplete="off" class="bahadirDatetimeBox" id="txt_adres" name="txt_adres" placeholder="ADRES..." required="required" type="text" value="" />
                    </li>
                </ul>
            </div>
            <div class="image-editor">
                <span class="image-size-label">&#169; Copyright Bahadır Tıbbi Aletler AŞ</span>
                <div class="clear"></div>
                <span class="btn btn-primary btn-file btn_cv_imgChoose">
                    DOSYA SEÇ<input type="file" class="cropit-image-input">
                </span>
                <div class="cropit-preview"></div>
                <div class="image-size-label">
                    Yakınlaştır
                </div>
                <input type="range" style="width:109px; margin-bottom:10px;" class="cropit-image-zoom-input rangeInput">
                <input id="imgCropBase64" name="imgCropBase64" type="hidden" value="" />
                <a href="javascript:void(0)" style="display:block;" class="btn_kirp" id="btn_imgCrop">KIRP</a>
            </div>
        </div>
        <div class="clear"></div>
        <div class="ik_formFooterContainer">
            <div class="ik_onYaziIcon">
                <img src="img/onYaziIcon.html" />
            </div>
            <div class="ik_onYaziTitle">KİŞİSEL BİLGİLERİMİN, BAHADIR TIBBİ ALETLER İNSAN KAYNAKLARI VERİ TABANINDA SAKLANMASINI KABUL EDİYORUM.</div>
            <div class="clear"></div>
            <div class="ik_onYaziTextContainer">
                <textarea autocomplete="off" class="txt_ikOnYaziText" cols="20" id="txt_onYazi" name="txt_onYazi" rows="2">
</textarea>
            </div>
            <div class="ik_onYaziPostContainer">
                <table>
                    <tr>
                        <td valign="top"><input class="i-checks chk_sozlesmeKabulYazisi" id="cb_anlasma" name="cb_anlasma" type="checkbox" value="true" /><input name="cb_anlasma" type="hidden" value="false" /></td>
                        <td valign="top" style="display:block; margin-left:5px;">
                            <div class="ik_onYaziPostContainerTitle">BAŞVUR</div>
                        </td>
                    </tr>
                </table>
                <div class="clear"></div>
                <button class="acikPozisyonBasvurLink" style="margin-top:30px;">ADI SOYADI...</button>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
</form>    <br />
    <br />
    <br />
</div>

<div id="dtBox"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var $editor = $('.image-editor');
        $editor.cropit();

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $("#dtBox").DateTimePicker({
            dateTimeFormat: "dd-MM-yyyy hh:mm:ss AA",
            maxDateTime: "20-07-2016 12:00:00 AM",
            minDateTime: "20-07-2012 12:00:00 AM",
            minTime: "10:00",
            maxTime: "17:00",
            animationDuration: 100
        });

        $("#rdo_ehliyetVar").click(function () {
            $("#rdo_ehliyetVal").val("1");
        });
        $("#rdo_ehliyetYok").click(function () {
            $("#rdo_ehliyetVal").val("2");
        });

        $("#btn_imgCrop").click(function () {
            $("#btn_imgCrop").val("Fotoğrafınızı y&#252;kleyiniz...");
            var imgSrc = $editor.cropit('imageSrc');
            var offset = $editor.cropit('offset');
            var zoom = $editor.cropit('zoom');
            var previewSize = $editor.cropit('previewSize');
            var exportZoom = $editor.cropit('exportZoom');

            var img = new Image();
            img.src = imgSrc;

            var originalCanvas = document.createElement('canvas');
            originalCanvas.width = previewSize.width / zoom;
            originalCanvas.height = previewSize.height / zoom;
            var ctx = originalCanvas.getContext('2d');
            ctx.drawImage(img, offset.x / zoom, offset.y / zoom);

            var zoomedCanvas = document.createElement('canvas');
            zoomedCanvas.width = previewSize.width * exportZoom;
            zoomedCanvas.height = previewSize.height * exportZoom;
            pica.resizeCanvas(originalCanvas, zoomedCanvas, {

            }, function (err) {
                if (err) { return console.log(err); }
                var picaImageData = zoomedCanvas.toDataURL();
                var $picaImg = $('<img src="' + picaImageData + '" />');
                var canvasImageData = $editor.cropit('export');
                $("#imgCropBase64").val(picaImageData);
                $("#btn_imgCrop").val("ADI SOYADI...");
            });

            return false;
        });

        $(".acikPozisyonBasvurLink").click(function () {
            if ($("#cb_anlasma").is(':checked')) {

            } else {
                alert("Formu Göndermek İçin Öncelikle Anlaşmayı Kabul Etmelisiniz.");
                return false;
            }
        });
    });

    $("#form").ajaxForm({
        beforeSend: function () {
            if (ValidateEmail($("#txt_eMail").val()) == false) {
                alert("Geçerli Bir E-Mail Adresi Giriniz.");
                return false;
            }

            if ($("#rdo_ehliyetVal").val() == "1") {
                if ($("#drp_surucuBelgeSinifi").val() == "-1") {
                    alert("Lütfen Bir Sürücü Belgesi Seçin.");

                    return false;
                }
            }
        },
        complete: function (response) {
            if (response.responseText == "1") {
                alert("Form Başarılı Bir Şekilde İletilmiştir. Teşekkürler.");
            } else {
                alert("Bir Hata Meydana Geldi, Lütfen Daha Sonra Tekrar Deneyiniz.");
            }
        },
        error: function () {
            alert("Bir Hata Meydana Geldi, Lütfen Daha Sonra Tekrar Deneyiniz.");
        }
    });
</script>

<style>
    .cropit-preview {
        background-color: #f8f8f8;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 111px;
        height: 144px;
    }

    .cropit-preview-image-container {
        cursor: move;
    }

    .image-size-label {
        margin-top: 10px;
    }

    input {
        display: block;
    }

    .export {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>

<script src="/assets/js/jquery.cropit.js"></script>
<script src="/assets/js/pica.js"></script>

<script type="text/javascript">


    $("#txt_adSoyad").attr("placeholder", "DOĞUM YERİ...");
    $("#txt_dogumYeri").attr("placeholder", "DOĞUM TARİHİ...");
    $("#txt_dogumTarihi").attr("placeholder", "ASKERLİK DURUMU");
    $("#txt_okulAdi").attr("placeholder", "BÖLÜM...");
    $("#txt_bolum").attr("placeholder", "ÖĞRENİM DERECESİ");
    $("#txt_ogrenimDerecesiBasTarih").attr("placeholder", "BİTİŞ TARİHİ");
    $("#txt_ogrenimDerecesiBitTarih").attr("placeholder", "CEP TEL NUMARASI...");
    $("#txt_firmaAdi").attr("placeholder", "POZİSYON...");
    $("#txt_pozisyon").attr("placeholder", "Başlangıç Tarihi");
    $("#txt_iseBaslamaTarihi").attr("placeholder", "BİTİŞ TARİHİ");
    $("#txt_istenAyrilmaTarihi").attr("placeholder", "CEP TEL NUMARASI...");
    $("#txt_celTelNo").attr("placeholder", "EV/İŞ TEL NUMARASI...");
    $("#txt_evTelNo").attr("placeholder", "E-POSTA...");
    $("#txt_eMail").attr("placeholder", "ADRES...");
    $("#txt_adres").attr("placeholder", "İLETİŞİM & BİLGİ ALMA");
</script>
        </div>