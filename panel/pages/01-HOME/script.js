var AJAX_PATH = '/panel/pages/01-HOME/ajax.php';

$(document).ready(function () {



    $(".tab").find("a").click(function () {
        $("[name='CURRENT_PAGE']").val($(this).attr("href"));
    });


    $(".progress").hide();

    $("[name='tarih']").inputmask();

    $("#sliders").find(".switch").click(function () {
        var hidden_input_state = $(this).find("input[type='checkbox']").prop("checked");
        $(this).find("input[type='checkbox']").prop("checked", !hidden_input_state);

        var STATE = !hidden_input_state == true ? 1 : 0;
        var formData = new FormData();
        formData.append("OPTION", "CHANGE_STATE");
        formData.append("ID", $(this).find("input[type='checkbox']").attr("data-uniq-id"));
        formData.append("STATE", STATE);

        $.ajax({
            type: 'POST',
            dataType: 'text',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function () {

            },
            error: function (a, b, c) {
                console.log(a);
                console.log(b);
                console.log(c);
                alert("STATE değişirken bir hata oluştu ama sorun değil işlemlerine devam edebilirsin.");
            }
        });
        //handler($(this).find(".ts-helper"));
    });

    $("#sortable").sortable({
        handle: ".drag-handle",
        start: function (event, ui) {
            //var card_height = $(".card").height();
            //var new_height = card_height + 378;
            //$(".card").css({ "height": new_height + "px" });
        },
        stop: function (event, ui) {
            var SIRA_LISTESI = [];
            $(".draggable").each(function (index) {
                var id = $(this).attr("data-id");
                if (typeof id !== 'undefined') {
                    var elm = new Array(id, $(this).index());
                    SIRA_LISTESI.push(elm);
                }
            });

            var formData = new FormData();
            formData.append("OPTION", "SEQUENCE");
            formData.append("LISTE", JSON.stringify(SIRA_LISTESI));

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: formData,
                url: AJAX_PATH,
                processData: false,
                contentType: false,
                success: function (result) {
                    $(".draggable").each(function (index) {
                        var id = $(this).attr("data-id");
                        console.log("index:" + $(this).index() + " id:" + id);
                    });
                },
                error: function (a, b, c) {
                    console.error("Slayt sırası kaydedilirken bir hata oluştu. Ama bu çok önemli bir şey değil.");
                    console.error(a);
                    console.error(b);
                    console.error(c);
                }

            });
        },
        change: function (event, ui) {

        }
    });

    $("#btnAdd").click(function () {

        $("#mdlSlayt").find("input[type='file']").attr("required");
        $("#mdlSlayt").find('[name="baslik1"]').val("").focus();
        $("#mdlSlayt").find('[name="baslik2"]').val("");
        $("#mdlSlayt").find('[name="aciklama"]').val("");
        $("#mdlSlayt").find('[name="content"]').val("");
        $("#mdlSlayt").find("[name='islem']").val("insert");
        $("#mdlSlayt").find("#btnSlaytKaydet").show();
        $("#mdlSlayt").find("#btnSlaytGuncelle").hide();


        if ($("#mdlSlayt").find("[name='gorunurluk']").attr("db-state") == 0) {
            $("#mdlSlayt").find("[name='gorunurluk']").attr("db-state", "1").click();
        }

    });

    $("#filled-in-box-all").click(function () {

        if ($(this).prop("checked")) {
            $(".filled-in").prop("checked", true);
        } else {
            $(".filled-in").prop("checked", false);
        }

    });

    $("[name='btnSlaytEdit']").click(function () {

        $("#mdlSlayt").find("input[type='file']").removeAttr("required");       
        $("#mdlSlayt").find(".progress").show();
        $("#mdlSlayt").find(".modal-body").css({ "opacity": "0.4" });       

        var SLAYT_ID = $(this).attr("data-id");

        $("#mdlSlayt").find('[name="aciklama"]').val("");
        $("#mdlSlayt").find('[name="baslik2"]').val("");
        $("#mdlSlayt").find('[name="baslik1"]').val("").focus();
        CKEDITOR.instances['content'].setData("");
        $("#mdlSlayt").find("[name='gorunurluk']").attr("db-state", 0);
        $("#mdlSlayt").find("#btnSlaytKaydet").hide();
        $("#mdlSlayt").find("#btnSlaytGuncelle").show();
        $("#mdlSlayt").find("[name='islem']").val("update");
        $("#mdlSlayt").find("[name='SLIDER_ID']").val(SLAYT_ID);
        
        var formData = new FormData();
        formData.append("OPTION", "SELECT_SLAYT");
        formData.append("SLAYT_ID", SLAYT_ID);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (DATA) {

                CKEDITOR.instances['content'].setData(DATA.CONTENT_HTML);

                $("#mdlSlayt").find('[name="aciklama"]').val(DATA.DESCRIPTION).focus();
                $("#mdlSlayt").find('[name="baslik2"]').val(DATA.TITLE2).focus();
                $("#mdlSlayt").find('[name="baslik1"]').val(DATA.TITLE1).focus();

                var GORUNURLUK = DATA.VISIBILITY == 1 ? true:false;
                $("#mdlSlayt").find("input[type='checkbox']").prop('checked', GORUNURLUK);
                
                $("#mdlSlayt").find(".progress").hide();
                $("#mdlSlayt").find(".modal-body").css({ "opacity": "1" });
            },
            error: function (a, b, c) {
                alert("Bir hata oluştu ama problem değil kapat tekrar aç düzelir.");
            }
        });
    });

    $("#mdlSlayt").find(".switch").click(function () {
        var STATE = $(this).find("input[type='checkbox']").prop("checked");
        $("#mdlSlayt").find('[name="gorunurluk"]').prop("checked", !STATE);
    });

    $("#mdlSlayt").find("#btnSlaytKaydet").click(function () {

    });

    $("#mdlSlayt").find("#btnSlaytGuncelle").click(function () {

    });




    $("#btnHaberEkle").click(function () {

        $("#mdlHaber").find("input[type='file']").attr("required");
        $("#mdlHaber").find('[name="tarih"]').val(new Date().toLocaleDateString()).focus();
        $("#mdlHaber").find('[name="baslik1"]').val("");
        $("#mdlHaber").find('[name="baslik2"]').val("");
        $("#mdlHaber").find('[name="aciklama"]').val("");
        $("#mdlHaber").find('[name="content"]').val("");
        $("#mdlHaber").find("[name='islem']").val("insert");
        $("#mdlHaber").find("#btnHaberKaydet").show();
        $("#mdlHaber").find("#btnHaberGuncelle").hide();


        if ($("#mdlHaber").find("[name='gorunurluk']").attr("db-state") == 0) {
            $("#mdlHaber").find("[name='gorunurluk']").attr("db-state", "1").click();
        }

    });

    $("[name='btnHaberEdit']").click(function () {

        $("#mdlHaber").find("input[type='file']").removeAttr("required");
        $("#mdlHaber").find(".progress").show();
        $("#mdlHaber").find(".modal-body").css({ "opacity": "0.4" });

        var HABER_ID = $(this).attr("data-id");

        $("#mdlHaber").find('[name="tarih"]').val("");
        //$("#mdlHaber").find('[name="aciklama"]').val("");
        $("#mdlHaber").find('[name="baslik2"]').val("");
        $("#mdlHaber").find('[name="baslik1"]').val("").focus();
        CKEDITOR.instances['content'].setData("");
        $("#mdlHaber").find("[name='gorunurluk']").attr("db-state", 0);
        $("#mdlHaber").find("#btnHaberKaydet").hide();
        $("#mdlHaber").find("#btnHaberGuncelle").show();
        $("#mdlHaber").find("[name='islem']").val("update");
        $("#mdlHaber").find("[name='HABER_ID']").val(HABER_ID);

        var formData = new FormData();
        formData.append("OPTION", "SELECT_HABER");
        formData.append("HABER_ID", HABER_ID);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (DATA) {

                CKEDITOR.instances['content'].setData(DATA.CONTENT_HTML);

                $("#mdlHaber").find('[name="tarih"]').val(DATA.DATE);
                //$("#mdlHaber").find('[name="aciklama"]').val(DATA.DESCRIPTION).focus();
                $("#mdlHaber").find('[name="baslik2"]').val(DATA.TITLE2).focus();
                $("#mdlHaber").find('[name="baslik1"]').val(DATA.TITLE1).focus();

                var GORUNURLUK = DATA.VISIBILITY == 1 ? true : false;
                $("#mdlHaber").find("input[type='checkbox']").prop('checked', GORUNURLUK);

                $("#mdlHaber").find(".progress").hide();
                $("#mdlHaber").find(".modal-body").css({ "opacity": "1" });
            },
            error: function (a, b, c) {
                alert("Bir hata oluştu ama problem değil kapat tekrar aç düzelir.");
                console.log(a);
                console.log(b);
                console.log(c);
            }
        });
    });

    $("#news").find(".switch").click(function () {

        var hidden_input_state = $(this).find("input[type='checkbox']").prop("checked");
        $(this).find("input[type='checkbox']").prop("checked", !hidden_input_state);

        var STATE = !hidden_input_state == true ? 1 : 0;
        var formData = new FormData();
        formData.append("OPTION", "CHANGE_STATE_NEWS");
        formData.append("ID", $(this).find("input[type='checkbox']").attr("data-uniq-id"));
        formData.append("STATE", STATE);

        $.ajax({
            type: 'POST',
            dataType: 'text',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function () {

            },
            error: function (a, b, c) {
                console.log(a);
                console.log(b);
                console.log(c);
                alert("STATE değişirken bir hata oluştu ama sorun değil işlemlerine devam edebilirsin.");
            }
        });
        //handler($(this).find(".ts-helper"));
    });

});