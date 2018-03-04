
var AJAX_PATH = '/panel/pages/03-PRODUCT/ajax.php';
CKEDITOR.config.height = 600;
var CURRENT_TAB_PAGE = "SURGICAL-INSTRUMENTS";

$(document).ready(function () {

    $(".tab").find("a").click(function () {
        $("[name='CURRENT_PAGE']").val($(this).attr("href"));
        var page = $("[name='CURRENT_PAGE']").val();
        CURRENT_TAB_PAGE = page.substr(1).toUpperCase();
        console.log(CURRENT_TAB_PAGE);
    });
    
    $(".progress").hide();

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
                    console.error("Sıralama bilgisi veritabanına kaydedilirken bir hata oluştu ve işlem iptal edildi.");
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

        $("#mdlBranchEdit").find("input[type='file']").attr("required");
        $("#mdlBranchEdit").find('[name="baslik1"]').val("").focus();
        $("#mdlBranchEdit").find('[name="baslik2"]').val("");
        $("#mdlBranchEdit").find('[name="aciklama"]').val("");
        $("#mdlBranchEdit").find('[name="content"]').val("");
        $("#mdlBranchEdit").find("[name='islem']").val("insert");
        $("#mdlBranchEdit").find("button[name='btnKaydet']").show();
        $("#mdlBranchEdit").find("button[name='btnGuncelle']").hide();

        if ($("#mdlBranchEdit").find("[name='VISIBILITY']").attr("db-state") == 0) {
            $("#mdlBranchEdit").find("[name='VISIBILITY']").attr("db-state", "1").trigger("click");
        }


        $("#mdlBranchEdit").find(".progress").hide();
        $("#mdlBranchEdit").find(".modal-body").css({ "opacity": "1" });
    });

    $("#btnRemove").click(function () {

        var count = $(".item-checkbox").find("input[type='checkbox']:checked").size();
        if (count == 0) { alert('Hiç Seçim yapmadınız!'); return; }

        var conf = confirm('Seçilen ' + count + ' adet branş silinecektir.\nİşlemi onaylıyor musunuz?');
        if (conf) {
            var ID_LISTESI = [];
            $(".item-checkbox").find("input[type='checkbox']:checked").each(function () {

                var DATA_ID = $(this).attr("data-id");
                ID_LISTESI.push({ 'ID': DATA_ID });

                ID_LISTESI.forEach(function (element, index) {
                    $("input[data-id='" + element.ID + "']").closest(".draggable").remove();
                });

                $("#btnRemove").prop("disabled", true);

                var formData = new FormData();
                formData.append("OPTION", "REMOVE_BRANCH");
                formData.append("ID_LIST", JSON.stringify(ID_LISTESI));

                $.ajax({
                    type: 'POST',
                    dataType: 'text',
                    data: formData,
                    url: AJAX_PATH,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                    },
                    error: function (xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });

            });
        }
    });
    
    $("button[name='btnAdd_PDFFileInput']").click(function () {

        var count = $("#pdf-fileinput-container").size() + 1;
        var InputHTML = '<div id="FileInputContainer_' + count + '" class="col s12 m12 l12 fileInputContainer" style="background-color:#f1f1f1;margin-bottom: 3px;" data-statement="insert"><div class="col s6 m6 l6"><input type="text" class="" placeholder="PDF Dosyasına bir isim verin" /></div><div class="col s5 m5 l5"><div class="file-field input-field"><div class="btn teal lighten-1"><span>PDF Dosyası</span><input type="file" name="" accept="application/pdf" required=""></div><div class="file-path-wrapper"><input class="file-path validate" type="text"></div></div></div><div name="btnFileInputRemove" class="col s1 m1 l1" style="width:48px;height:48px;margin-top: 25px;float:right;"><svg data-name="Layer 1" id="Layer_1" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><defs><style>.close1{fill:none;stroke:#231f20;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title></title><line class="close1" x1="1" x2="47" y1="47" y2="1"></line><line class="close1" x1="1" x2="47" y1="1" y2="47"></line></svg></div></div>';

        $("#pdf-fileinput-container").prepend(InputHTML);
        $('#FileInputContainer_' + count).find("[name='btnFileInputRemove']").click(function () {
            var conf = confirm('PDF dosyasını kaldırmak istediğinizden emin misiniz?');
            if (conf) {
                $(this).closest(".fileInputContainer").remove();
            }
        });
    });

    $(".item-checkbox").find("input[type='checkbox']").change(function () {
        var count = $(".item-checkbox").find("input[type='checkbox']:checked").size();
        var state = count == 0 ? true : false;
        $("#btnRemove").prop("disabled", state);
    });

    $("[name='btnBranchEdit']").click(function () {

        var DATA_ID = $(this).closest(".draggable").attr("data-id");

        $("#mdlBranchEdit").find("input[type='file']").removeAttr("required");
        $("#mdlBranchEdit").find(".progress").show();
        $("#mdlBranchEdit").find(".modal-body").css({ "opacity": "0.4" });

        $("#mdlBranchEdit").find('[name="aciklama"]').val("");
        $("#mdlBranchEdit").find('[name="baslik2"]').val("");
        $("#mdlBranchEdit").find('[name="baslik1"]').val("").focus();
        $("#mdlBranchEdit").find("[name='gorunurluk']").attr("db-state", 0);
        $("#mdlBranchEdit").find("button[name='btnKaydet']").hide();
        $("#mdlBranchEdit").find("button[name='btnGuncelle']").show();
        $("#mdlBranchEdit").find("[name='islem']").val("update");
        $("#mdlBranchEdit").find("[name='DATA_ID']").val(DATA_ID);

        var formData = new FormData();
        formData.append("OPTION", "SELECT");
        formData.append("DATA_ID", DATA_ID);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (DATA) {
                console.log(DATA);
                
                var BRANCH = DATA.BRANCH;
                var BRANCH_CATALOG = DATA.BRANCH_CATALOG;
             
                $("#mdlBranchEdit").find('[name="TITLE"]').val(BRANCH.TITLE).focus();
                $("#mdlBranchEdit").find('[name="SHORT-TITLE"]').val(BRANCH.SHORT_TITLE).focus();
                $("#mdlBranchEdit").find('[name="SUB-TITLE"]').val(BRANCH.SUB_TITLE).focus();
                $("#mdlBranchEdit").find('[name="DETAILS"]').val(BRANCH.DETAILS).focus();

                $("#mdlBranchEdit").find('[name="TITLE"]').focus();
                var GORUNURLUK = BRANCH.VISIBILITY == 1 ? true:false;
                $("#mdlBranchEdit").find("input[type='checkbox']").prop('checked', GORUNURLUK);


                for (var i = 0; i < BRANCH_CATALOG.length; i++) {
                    var count = $("#pdf-fileinput-container").size() + 1;
                    var InputHTML = '<div id="FileInputContainer_' + count + '" data-id="' + BRANCH_CATALOG[i].ID + '" class="col s12 m12 l12 fileInputContainer" style="background-color:#f1f1f1;margin-bottom: 3px;" data-statement="no"><div class="col s11 m11 l11" style="margin-top: 10px;">' + BRANCH_CATALOG[i].TITLE + '</div><div name="btnFileInputRemove" class="col s1 m1 l1" style="width: 40px;margin-top: 10px;float: right;margin-bottom: 5px;"><svg data-name="Layer 1" id="Layer_1" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><defs><style>.close1{fill:none;stroke:#231f20;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title></title><line class="close1" x1="1" x2="47" y1="47" y2="1"></line><line class="close1" x1="1" x2="47" y1="1" y2="47"></line></svg></div></div>';
                    $("#pdf-fileinput-container").append(InputHTML);  
                }

                $("[name='btnFileInputRemove']").click(function () {
                    var conf = confirm('PDF dosyasını kaldırmak istediğinizden emin misiniz?');
                    if (conf) {

                        var button = $(this);
                        $(button).closest(".fileInputContainer").css({ opacity: 0.5 });
                        $(button).html('<svg xmlns= "http://www.w3.org/2000/svg" viewBox= "0 0 100 100" preserveAspectRatio= "xMidYMid" class="lds-eclipse" style= "background: none;" > <path ng-attr-d="{{config.pathCmd}}" ng-attr-fill="{{config.color}}" stroke="none" d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#ffffff" transform="rotate(56.6512 50 51)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 51;360 50 51" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform></path></svg >');

                        var formData = new FormData();
                        formData.append("OPTION", "REMOVE_BRANCH_CATALOG");
                        formData.append("BRANCH_CATALOG_ID", $(this).closest(".fileInputContainer").attr("data-id"));

                        $.ajax({
                            type: 'POST',
                            dataType: 'text',
                            data: formData,
                            url: AJAX_PATH,
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                $(button).closest(".fileInputContainer").hide();
                            },
                            error: function (xhr, statusText, err) {
                                console.log(xhr);
                                console.log(statusText);
                                console.log(err);
                                alert("Bir hata oluştu ama problem değil kapat tekrar aç düzelir.");
                            }
                        });
                    }
                });


                $("#mdlBranchEdit").find(".progress").hide();
                $("#mdlBranchEdit").find(".modal-body").css({ "opacity": "1" });
            
            },
            error: function (xhr, statusText, err) {
                console.log(xhr);
                console.log(statusText);
                console.log(err);
                alert("Bir hata oluştu ama problem değil kapat tekrar aç düzelir.");
            }
        });

        $("#mdlBranchEdit").modal("show");
    });

    $("#filled-in-box-all").click(function () {
  
        if ($(this).prop("checked")) {
            $(".filled-in").prop("checked", true);
        } else {
            $(".filled-in").prop("checked", false);
        }

        var count = $(".item-checkbox").find("input[type='checkbox']:checked").size();
        var state = count == 0 ? true : false;
        $("#btnRemove").prop("disabled", state);
    });

    $("#mdlBranchEdit").find(".switch").click(function () {
        var STATE = $(this).find("input[type='checkbox']").prop("checked");
        $("#mdlBranchEdit").find('[name="gorunurluk"]').prop("checked", !STATE);
    });

    $("#mdlBranchEdit").find("button[name='btnKaydet']").click(function () {

        $("#mdlBranchEdit").find(".progress").show();
        $("#mdlBranchEdit").find(".modal-body").css({ "opacity": "0.4" });
        $("button").prop("disabled", true);

        var SHORT_TITLE = $("[name='SHORT-TITLE']").val();
        var TITLE = $("[name='TITLE']").val();
        var SUB_TITLE = $("[name='SUB-TITLE']").val();
        var DETAILS = $("[name='DETAILS']").val();
        var COVER_PHOTO = $("[name='COVER-PHOTO']")[0].files[0];
        
        var formData = new FormData();
        formData.append("OPTION", "INSERT_BRANCH");
        formData.append("SHORT_TITLE", SHORT_TITLE);
        formData.append("TITLE", TITLE);
        formData.append("SUB_TITLE", SUB_TITLE);
        formData.append("DETAILS", DETAILS);
        formData.append("COVER_PHOTO", COVER_PHOTO);
        formData.append("CATEGORY", CURRENT_TAB_PAGE); 
      
        $(".fileInputContainer").each(function (index, element) {
            var PDFText = $(element).find("input[type='text']").val();
            var PDFFile = $(element).find("input[type='file']")[0].files[0];
            if ($(element).attr("data-statement") == "insert") {
                formData.append("PDF_TEXT_" + index, PDFText);
                formData.append("PDF_FILE_" + index, PDFFile);
            }
       });

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (ITEM) {

                $("#mdlBranchEdit").find("button[name='btnKapat']").trigger("click");

                console.log(ITEM);

                var ITEM_HTML = '<div data-sequence="' + ITEM.SEQUENCE + '" data-id="' + ITEM.BRANCH_ID + '" class="col s4 ui-state-default draggable"><div class="card white"><div class="card-content" style="padding:0px;position:relative;">'
                    + '<div class="item-checkbox">'
                    + '<input type= "checkbox" class="filled-in" id="filled-in-box-' + ITEM.BRANCH_ID + '" data- id="' + ITEM.BRANCH_ID + '" />'
                    + '<label for="filled-in-box-' + ITEM.BRANCH_ID + '"></label>'
                    + '</div>'
                    + '<div class="drag-handle ui-sortable-handle" style="cursor:move;">'
                    + '<a name="btnBranchEdit" class="btn-floating" style="position:absolute;right:5px;bottom:55px;z-index:unset;">'
                    + '<i class="material-icons">edit</i></a>'
                    + '<img src= "/panel/system/ViewBinaryImage.php?OPTION=BRANCH&&ID=' + ITEM.BRANCH_ID + '" alt= "' + ITEM.SHORT_TITLE + ' / ' + ITEM.TITLE + '" style= "height:113px;" /></div>'
                    + '<div class="card-action">'
                    + '<div style="float:left;margin-top:10px;height:41px;line-height:30px;padding-left:15px;width:80%;font-family: "Montserrat", sans-serif !important;">'
                    + '<span><a class="edit-link" style="color:#127c43;font-weight:bold;" href="#">' + ITEM.SHORT_TITLE + ' /</a></span><span><a class="edit-link" style="color:#000;" href="#">' + ITEM.TITLE + '</a></span></div>'
                    + '<div style="float:left;margin-top:10px;width:20%">'
                    + '<div class="switch m-b-md"><label><input type="checkbox" data-uniq-id="' + ITEM.BRANCH_ID + '" ' + ITEM.CHECKED + ' /><span class="lever"></span></label></div></div></div></div></div></div>';

                $("#sortable").append(ITEM_HTML);
                $("button").prop("disabled", false);
                $("#mdlBranchEdit").find(".progress").hide();
                $("#mdlBranchEdit").find(".modal-body").css({ "opacity": "1" });
            },
            error: function (xhr, statusText, error) {
                console.error(xhr);
                console.error(statusText);
                console.error(error);
                alert("Kayıt Hatası!\nLütfen tekrar deneyin.");

                $("button").prop("disabled", false);
                $("#mdlBranchEdit").find(".progress").hide();
                $("#mdlBranchEdit").find(".modal-body").css({ "opacity": "1" });
            }
        });

    });

    $("#mdlBranchEdit").find("[name='btnGuncelle']").click(function () {

        var SHORT_TITLE = $("[name='SHORT-TITLE']").val();
        var TITLE = $("[name='TITLE']").val();
        var SUB_TITLE = $("[name='SUB-TITLE']").val();
        var DETAILS = $("[name='DETAILS']").val();

        var formData = new FormData();
        formData.append("BRANCH_ID", $("#mdlBranchEdit").find("[name='DATA_ID']").val())
        formData.append("OPTION", "UPDATE_BRANCH");
        formData.append("SHORT_TITLE", SHORT_TITLE);
        formData.append("TITLE", TITLE);
        formData.append("SUB_TITLE", SUB_TITLE);
        formData.append("DETAILS", DETAILS);
     
        if ($("[name='COVER-PHOTO']").get(0)) {
            var COVER_PHOTO = $("[name='COVER-PHOTO']")[0].files[0];
            formData.append("COVER_PHOTO", COVER_PHOTO);
        }

        $(".fileInputContainer").each(function (index, element) {
            var PDFText = $(element).find("input[type='text']").val();

            if ($(element).find("input[type='file']").get(0)) {
                var PDFFile = $(element).find("input[type='file']")[0].files[0];
                if ($(element).attr("data-statement") == "insert") {
                    formData.append("PDF_TEXT_" + index, PDFText);
                    formData.append("PDF_FILE_" + index, PDFFile);
                }
            }
        });

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: formData,
            url: AJAX_PATH,
            processData: false,
            contentType: false,
            success: function (result) {
                $("#mdlBranchEdit").find("button[name='btnKapat']").trigger("click");
            },
            error: function (xhr, statusText, error) {
                console.error(xhr);
                console.error(statusText);
                console.error(error);
                alert("Kayıt Hatası!\nLütfen tekrar deneyin.");
            }
        });





    });

    $("#sortable").find(".switch").click(function () {

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
                        resim_buyuk = true;
                    }
                    var fsize = ($("input[type='file']")[0].files[0].size / 1024);
                    var kbSize = (Math.round(fsize * 100) / 100);
                    if (kbSize > 1024) {

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
        $("[name='CURRENT_PAGE']").each(function () {
            $(this).val(href);
        });
    });
    
});