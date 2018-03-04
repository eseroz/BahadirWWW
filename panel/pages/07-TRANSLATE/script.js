var AJAX_PATH = '/panel/pages/07-TRANSLATE/ajax.php';

$(document).ready(function () {    
    $(".tab").find("a").click(function () {
        $("[name='CURRENT_PAGE']").val($(this).attr("href"));
    });    
    $(".progress").hide();
    $("button[name='btn-dil-duzenle']").click(function () {

        $("#mdlDil").find("[name='adi']").val("");
        $("#mdlDil").find("[name='iso']").val("");

        $("#mdlDil").find(".progress").show();
        $("#mdlDil").find(".modal-body").css({ "opacity": "0.4" });
        var ID = $(this).attr("data-id");

        var formData = new FormData();
        formData.append("OPTION", "SELECT_LANGUAGE");
        formData.append("LANGUAGE_ID", ID);

        $.ajax({
            type: 'post',
            dataType: 'json',
            data: formData,
            url:AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (DATA) {
 
                $("#mdlDil").find("[name='adi']").val(DATA.LANGUAGE_LONG);
                $("#mdlDil").find("[name='iso']").val(DATA.LANGUAGE_SHORT);
                $("#mdlDil").find("[name='DIL_ID']").val(DATA.ID);
                var GORUNURLUK = DATA.VISIBILITY == 1 ? true : false;
                $("#mdlDil").find("input[type='checkbox']").prop('checked', GORUNURLUK); 

                $("#mdlDil").find(".progress").hide();
                $("#mdlDil").find(".modal-body").css({ "opacity": "1" });
            },
            error: function (a, b, c) { console.log(a); console.log(b); console.log(c); alert("dil getirilirken bir hata oluştu ama sorun değil devam edebilirsin."); }
        });
    });
    
    $("#kelime_tablosu").DataTable();
    $("#cboLanguage").select2();
    $("#cboCeviriBekleyenKelimeler").select2();

    $("#cboLanguage").change(function () {

        $("#cboCeviriBekleyenKelimeler").find("option:selected").remove();

        var LANGUAGE_ID = $(this).find("option:selected").val();

        var formData = new FormData();
        formData.append("OPTION", "CEVRILECEK_KELIMELERI_GETIR");
        formData.append("LANGUAGE_ID", LANGUAGE_ID);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (KELIMELER) {
                console.log(KELIMELER);
                KELIMELER.forEach(function (KELIME) {
                    $("#cboCeviriBekleyenKelimeler").append("<option value='" + KELIME.WORD_ID + "'>" + KELIME.WORD + "</option>");
                });
            },
            error: function (a, b, c) { alert("hata"); }
        });
    });

    $("#btnCeviriyiKaydet").click(function () {

        var txtCeviri = $("#txtCeviri").val();
        var cboLanguage = $("#cboLanguage").find("option:selected").val();
        var cboCeviriBekleyenKelimeler = $("#cboCeviriBekleyenKelimeler").find("option:selected").val();

        var formData = new FormData();
        formData.append("OPTION", "INSERT_CEVIRI");
        formData.append("txtCeviri", txtCeviri);
        formData.append("cboLanguage", cboLanguage);
        formData.append("cboCeviriBekleyenKelimeler", cboCeviriBekleyenKelimeler);

        if (txtCeviri == '') { alert("Lütfen çeviriyi yazın."); $("#txtCeviri").focus(); }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (KELIME) {
                console.log(KELIME);
                alert("Çeviri Kaydedildi");
                $("#txtCeviri").val('');
                $("#btnCeviriyiKaydet").after('');
            },
            error: function (a, b, c) {
                alert("Hata");
                console.log(a);
                console.log(b);
                console.log(c);
            }
        });
    });
});