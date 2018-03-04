$(".indirmeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".indirmeBgTextContainer").height()) / 2);

$(document).ready(function () {
    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".argeBG_img, .argeBG_imgOpacity").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".argeBG_img, .argeBG_imgOpacity").height() <= 306) {
        $(".argeBG_img, .argeBG_imgOpacity").css("height", "306px");
    }

    $(".indirmeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".indirmeBgTextContainer").height()) / 2);
});

$(window).resize(function () {
    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".argeBG_img, .argeBG_imgOpacity").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".argeBG_img, .argeBG_imgOpacity").height() <= 306) {
        $(".argeBG_img, .argeBG_imgOpacity").css("height", "306px");
    }

    $(".indirmeBgTextContainer").css("padding-top", ($(".argeBG_img").height() - $(".indirmeBgTextContainer").height()) / 2);
});