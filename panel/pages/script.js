var AJAX_PATH = '/panel/pages/01-SLIDERS/ajax.php';

$(document).ready(function () {
   
    $(".switch").find("[db-state='1']").click();
    $(".switch").click(function () {

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
            formData.append("OPTION", "SLIDER_SEQUENCE");
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

        $("input[type='file']").attr("required");
        $('[name="baslik1"]').val("").focus();
        $('[name="baslik2"]').val("");
        $('[name="aciklama"]').val("");
        $('[name="content"]').val("");
        $("[name='islem']").val("insert");
        $("#btnSlaytKaydet").show();
        $("#btnSlaytGuncelle").hide();

        if ( $("[name='gorunurluk']").attr("db-state") == 0) {
            $("#modal1").find("[name='gorunurluk']").attr("db-state", "1").click();
        }

    });

    $("[name='btnSlaytEdit']").click(function () {

        $("input[type='file']").removeAttr("required");
       
        $(".progress").show();
        $("#modal1").find(".modal-body").css({ "opacity": "0.4" });       

        var SLAYT_ID = $(this).attr("data-id");

        $('[name="aciklama"]').val("");
        $('[name="baslik2"]').val("");
        $('[name="baslik1"]').val("").focus();
        CKEDITOR.instances['content'].setData("");
        $("[name='gorunurluk']").attr("db-state", 0);

        $("#btnSlaytKaydet").hide();
        $("#btnSlaytGuncelle").show();
        $("[name='islem']").val("update");
        $("[name='SLIDER_ID']").val(SLAYT_ID);
        
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

                $('[name="aciklama"]').val(DATA.DESCRIPTION).focus();
                $('[name="baslik2"]').val(DATA.TITLE2).focus();
                $('[name="baslik1"]').val(DATA.TITLE1).focus();
                if (DATA.VISIBILITY == 1) {
                    $("#modal1").find("[name='gorunurluk']").attr("db-state", "1").click();
                }

                $(".progress").hide();
                $("#modal1").find(".modal-body").css({ "opacity": "1" });
            },
            error: function (a, b, c) {
                alert("Bir hata oluştu ama problem değil kapat tekrar aç düzelir.");
            }
        });
    });

    $("#modal1").find(".progress").hide();

    $("#modal1").find(".switch").click(function () {
        var STATE = $(this).find("input[type='checkbox']").prop("checked");
        $('[name="gorunurluk"]').prop("checked", !STATE);
    });

    $("#btnSlaytKaydet").click(function () {

    });

    $("#btnSlaytGuncelle").click(function () {

    });

});