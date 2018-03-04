$(document).ready(function () {
    $("#a_productCode").click(function () {
        $.ajax({
            type: "GET",
            url: "/Doit/CatalogSelect/?q=" + $("#txt_productCode").val() + "&type=1",
            success: function (data) {
                $("#txt_productCode").val(data.UrunKod);
                $("#txt_productName").val(data.UrunAciklama);
                $("#img_productImg").attr("src", "../../../catalog-pic/" + data.UrunKod.trim() + ".jpg");
                $("#hd_productCode").val(data.UrunKod.trim());
            },
            complate: function () {

            }
        });
    });

    $("#a_productName").click(function () {
        $.ajax({
            type: "GET",
            url: "/Doit/CatalogSelect/?q=" + $("#txt_productName").val() + "&type=2",
            success: function (data) {
                $("#txt_productCode").val(data.UrunKod);
                $("#txt_productName").val(data.UrunAciklama);
                $("#img_productImg").attr("src", "../../../catalog-pic/" + data.UrunKod.trim() + ".jpg");
                $("#hd_productCode").val(data.UrunKod.trim());
            },
            complate: function () {

            }
        });
    });

    $("#a_productPrev").click(function () {
        $.ajax({
            type: "GET",
            url: "/Doit/IlkCatalog",
            success: function (data) {
                $("#txt_productCode").val(data.UrunKod);
                $("#txt_productName").val(data.UrunAciklama);
                $("#img_productImg").attr("src", "../../../catalog-pic/" + data.UrunKod.trim() + ".jpg");
                $("#hd_productCode").val(data.UrunKod.trim());
            },
            complate: function () {

            }
        });
    });

    $("#a_productNext2").click(function () {
        $.ajax({
            type: "GET",
            url: "/Doit/SonCatalog",
            success: function (data) {
                $("#txt_productCode").val(data.UrunKod);
                $("#txt_productName").val(data.UrunAciklama);
                $("#img_productImg").attr("src", "../../../catalog-pic/" + data.UrunKod.trim() + ".jpg");
                $("#hd_productCode").val(data.UrunKod.trim());
            },
            complate: function () {

            }
        });
    });

    $("#a_productPrev2").click(function () {
        if ($("#hd_productCode").val() != "") {
            $.ajax({
                type: "GET",
                url: "/Doit/OncekiCatalog/" + $("#hd_productCode").val(),
                success: function (data) {
                    $("#txt_productCode").val(data.UrunKod);
                    $("#txt_productName").val(data.UrunAciklama);
                    $("#img_productImg").attr("src", "../../../catalog-pic/" + data.UrunKod.trim() + ".jpg");
                    $("#hd_productCode").val(data.UrunKod.trim());
                },
                complate: function () {

                }
            });
        }        
    });

    $("#a_productNext").click(function () {
        if ($("#hd_productCode").val() != "") {
            $.ajax({
                type: "GET",
                url: "/Doit/SonrakiCatalog/" + $("#hd_productCode").val(),
                success: function (data) {
                    $("#txt_productCode").val(data.UrunKod);
                    $("#txt_productName").val(data.UrunAciklama);
                    $("#img_productImg").attr("src", "../../../catalog-pic/" + data.UrunKod.trim() + ".jpg");
                    $("#hd_productCode").val(data.UrunKod.trim());
                },
                complate: function () {

                }
            });
        }        
    });
});