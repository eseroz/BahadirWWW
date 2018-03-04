$(document).ready(function () {
    $(".header").css({ "-webkit-box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)", "-moz-box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)", "box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)" });
    $(".header").css({ "border-bottom": "0px solid #ccc" });

    $(".cerrahiAletItemContainer").click(function () {
        var dataId = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: "/Doit/CerrahiAletDetail/" + dataId,
            success: function (data) {
                $(".cerrahiAletlerTitleIcon").html(data.Title1);
                $(".cerrahiAletlerTitleText").html(data.Title3);
                $(".cerrahiAletlerContentText").html(data.Aciklama);
                $(".cerrahiAletlerGeneralContainer").css({ "background": "url('Areas/Admin/Media/" + data.Image2 + "') no-repeat", "background-position": "100% 0" });

                $.ajax({
                    type: "GET",
                    url: "/Doit/CerrahiAletFiles/" + dataId,
                    success: function (data) {
                        $(".cerrahiAletlerCatalogItemContainer").html(data);
                        $("#cerrahiAletDetailContainer").css("display", "block");
                        $(".swiper-button-next").click();
                        $(".swiper-container").height($("#cerrahiAletDetailContainer").height()).css("overflow", "hidden");

                        $("html, body").animate({ scrollTop: 0 }, 500);
                    },
                    complate: function () { }
                });
            },
            complate: function () {

            }
        });
    });

    $(".cerrahiAletlerGeriIcon").click(function () {        
        $(".swiper-button-prev").click();
        $(".swiper-container, .swiper-wrapper, .swiper-slide").css("height", $(".cerrahiAletItemGeneralContainer").height() + $("#cerrahiAletBannerContainer").height() + 140);
        setTimeout(function () {
            $("#cerrahiAletItemGeneralContainer").css("opacity", "1");
        }, 250);
    });

    $(".swiper-container, .swiper-wrapper, .swiper-slide").css("height", $(".cerrahiAletItemGeneralContainer").height() + $("#cerrahiAletBannerContainer").height() + 140);
});

$(window).resize(function () {
    setTimeout(function () {
        $(".swiper-container, .swiper-wrapper, .swiper-slide").css("height", $(".cerrahiAletItemGeneralContainer").height() + $("#cerrahiAletBannerContainer").height() + 140);
    }, 500);
});