$(document).ready(function () {

    $("#btnFormSubmit").click(function () {

        var NAME_SURNAME = $("#txt_adSoyad").val();
        var PLACE_OF_BRIGHT = $("#txt_dogumYeri").val();
        var BRIGHT_DATE = $("#txt_dogumTarihi").val();
        //rdo_cinsiyet
        var MILITARY_SITUATION = $("#drp_askerlik").val();
        var MARRIED = $("#drp_medeniDurum").val();
        var DRIVING_LICENSE = $("#drp_ehliyet").val();
        var PROGRAM_DETAILS = $("#txt_software_info").val();
        var LANGUAGE_DETAILS = $("#txt_language_info").val();
        var MOBILE = $("#txt_celTelNo").val();
        var PHONE = $("#txt_evTelNo").val();
        var EMAIL = $("#txt_eMail").val();
        var ADRESS = $("#txt_adres").val();
        var DETAILS = $("#txt_onYazi").val();


        var formData = new FormData();
        formData.append("NAME_SURNAME", NAME_SURNAME);
        formData.append("PLACE_OF_BRIGHT", PLACE_OF_BRIGHT);
        formData.append("BRIGHT_DATE", BRIGHT_DATE);
        formData.append("MILITARY_SITUATION", MILITARY_SITUATION);
        formData.append("MARRIED", MARRIED);
        formData.append("DRIVING_LICENSE", DRIVING_LICENSE);
        formData.append("PROGRAM_DETAILS", PROGRAM_DETAILS);
        formData.append("LANGUAGE_DETAILS", LANGUAGE_DETAILS);
        formData.append("MOBILE", MOBILE);
        formData.append("PHONE", PHONE);
        formData.append("EMAIL", EMAIL);
        formData.append("ADRESS", ADRESS);
        formData.append("DETAILS", DETAILS);


     

        $.ajax({
            type: 'post',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            url: '',
            success: function () {

            },
            error: function (a, b, c) {
                console.log(a);
                console.log(b);
                console.log(c);
                alert("Bir hata oluştu!\nLütfen tekrar deneyin.");
            }
        });

    });

    $('#cb_anlasma').on('ifChecked', function (event) {
        $("#btnFormSubmit").prop("disabled", false);
    });

    $('#cb_anlasma').on('ifUnchecked', function (event) {
        $("#btnFormSubmit").prop("disabled", true);
    });
    
    $(".addPhotoButton").click(function () {
        $("#resim").click();
    });

    $("#resim").change(function () {
        readURL(this);
    });
    
    $('#resim').bind('change', function () {
        //$(".infoHeader").html(/*this.files[0].name*/);
        //$(".AttachedFileInfoContent").html(this.files[0].name + "<br/>" + Math.round(this.files[0].size / 1024) + ' KB');
    });


    $(".drop1").change(function () {

        $(".drop1").attr("data-value", $(this).find("option:selected").val());
        $(this).parent().parent().find(".drop1_result_container").html($(this).find("option:selected").val());
        $(this).val("-1");

    });


    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".argeBG_img").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".argeBG_img").height() <= 306) {
        $(".argeBG_img, .argeBG_imgOpacity").css("height", "306px");
    }

    $(".indirmeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".indirmeBgTextContainer").height()) / 2);

    $("#rdo_ehliyetYok").click(function () {
        $("#surucuBelgeSinifi").hide();
    });
    $("#rdo_ehliyetVar").click(function () {
        $("#surucuBelgeSinifi").show();
    });

    var eklenen_item_id = 0;
    $("#a_okulEkle").click(function () {

      var okulAdi =  $("#txt_okulAdi").val();
      var bolum =  $("#txt_bolum").val();
      var ogrenimDerecesi = $("#drp_ogrenimDerecesi").val();
      var baslangicTarihi = $("#txt_ogrenimDerecesiBasTarih").val();
      var bitisTarihi = $("#txt_ogrenimDerecesiBitTarih").val();

      if (okulAdi == "" || bolum == "" || ogrenimDerecesi == "" || baslangicTarihi == "" || bitisTarihi == "") {
          alert("Lütfen boş alanları doldurunuz.");
      } else {

          eklenen_item_id = eklenen_item_id + 1;

          $("#ul_OkulEkle").parent().append('<div class="eklenen_item"><div style="width:90%;float:left;margin-top: 7px;padding-left: 15px;">' + okulAdi + ', ' + bolum +'</div><div style="width:10%;float:left;margin-top: 7px;width: 17px;"><svg alt="Sil" data-name="Layer 1" class="eklenen_item_icon" id="close_icon' + eklenen_item_id + '" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><defs><style>.svgstyle1 {fill: none;stroke: #027436;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px;}</style></defs><title/><line class="svgstyle1" x1="1" x2="47" y1="47" y2="1"/><line class="svgstyle1" x1="1" x2="47" y1="1" y2="47"/></svg></div></div>');

          $("#txt_okulAdi").val("");
          $("#txt_bolum").val("");
          $("#drp_ogrenimDerecesi").val("-1");
          $("#txt_ogrenimDerecesiBasTarih").val("");
          $("#txt_ogrenimDerecesiBitTarih").val("");

          $("#close_icon" + eklenen_item_id).click(function () {
              $(this).parent().parent().remove();
          });
      }

    });
     
    $(document).on('click', ".egitimBilgileri_listContainerCellDelete", function (event) {
        var dataId = $(this).attr("data-id");
        $("#egitimBilgileri_listContainer" + dataId).remove();
        $.post("../../../Doit/EgitimBilgileriDelete", { "hd_ikSession": $("#hd_ikSession").val(), "Id": dataId }, function (response) { });
    });


    $(document).on('click', ".yabanciDil_listContainerCellDelete", function (event) {
        var dataId = $(this).attr("data-id");
        $("#yabanciDil_listContainer" + dataId).remove();
        $.post("../../../Doit/EgitimBilgileriDelete", { "hd_ikSession": $("#hd_ikSession").val(), "Id": dataId }, function (response) { });
    });

    //İş Deneyimi
    $("#isDeneyimiEkle").click(function () {



        var txt_firmaAdi = $("#txt_firmaAdi").val();
        var txt_pozisyon = $("#txt_pozisyon").val();
        var txt_iseBaslamaTarihi = $("#txt_iseBaslamaTarihi").val();
        var txt_istenAyrilmaTarihi = $("#txt_istenAyrilmaTarihi").val();

        if (txt_firmaAdi == "" || txt_pozisyon == "" || txt_iseBaslamaTarihi == "" || txt_istenAyrilmaTarihi == "") {
            alert("Lütfen boş alanları doldurunuz.");
        } else {

            eklenen_item_id = eklenen_item_id + 1;

            $("#ul_IsDeneyimi").parent().append('<div class="eklenen_item"><div style="width:90%;float:left;margin-top: 7px;padding-left: 15px;">' + txt_firmaAdi + ', ' + txt_pozisyon + '</div><div style="width:10%;float:left;margin-top: 7px;width: 17px;"><svg alt="Sil" data-name="Layer 1" class="eklenen_item_icon" id="close_icon' + eklenen_item_id + '" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><defs><style>.svgstyle1 {fill: none;stroke: #027436;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px;}</style></defs><title/><line class="svgstyle1" x1="1" x2="47" y1="47" y2="1"/><line class="svgstyle1" x1="1" x2="47" y1="1" y2="47"/></svg></div></div>');
            
            $("#txt_firmaAdi").val("");
            $("#txt_pozisyon").val("");
            $("#txt_iseBaslamaTarihi").val("");
            $("#txt_istenAyrilmaTarihi").val("");

            $("#close_icon" + eklenen_item_id).click(function () {
                $(this).parent().parent().remove();
            });
        }
    });


});

$(window).resize(function () {
    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".argeBG_img, .argeBG_imgOpacity").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".argeBG_img").height() <= 306) {
        $(".argeBG_img, .argeBG_imgOpacity").css("height", "306px");
    }

    $(".indirmeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".indirmeBgTextContainer").height()) / 2);
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#cvImage').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        $("#cvImage").show();
    }
}