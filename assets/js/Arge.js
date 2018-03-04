$(".argeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".argeBgTextContainer").height()) / 2);

$(document).ready(function () {
    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".argeBG_img, .argeBG_imgOpacity").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".argeBG_img").height() <= 306) {
        $(".argeBG_img, .argeBG_imgOpacity").css("height", "306px");
    }

    $(".argeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".argeBgTextContainer").height()) / 2);

    $(".header").css({ "-webkit-box-shadow": "", "-moz-box-shadow": "", "box-shadow": "" });
});

$(window).resize(function () {
    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".argeBG_img, .argeBG_imgOpacity").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".argeBG_img").height() <= 306) {
        $(".argeBG_img, .argeBG_imgOpacity").css("height", "306px");
    }

    $(".argeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".argeBgTextContainer").height()) / 2);
});