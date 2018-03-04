$(document).ready(function () {
    $(".telSepetCategoryItemContainerTitle").hover(function () {
        $(this).css({ "background": "#027436", "color": "#fff" });
    }, function () {
        if ($(this).attr("data-slide") == "up") {
            $(this).css({ "background": "", "color": "#027436" });
        }
    });

    $(".telSepetCategoryItemContainerTitle").click(function () {
        if ($(this).attr("data-slide") == "up") {
            $(this).next(".telSepetCategoryItemContainerTitleIcon").css({ "opacity": "1" });
            $(this).next("div").next(".telSepetCategoryItemContainerSubMenu").slideDown(500);
            $(this).attr("data-slide", "down");
        } else if ($(this).attr("data-slide") == "down") {
            $(this).next(".telSepetCategoryItemContainerTitleIcon").css({ "opacity": "0" });
            $(this).next("div").next(".telSepetCategoryItemContainerSubMenu").slideUp(500);
            $(this).css({ "background": "", "color": "#027436" });
            $(this).attr("data-slide", "up");
        }
    });

    $(".telSepetCategoryItemContainerSubMenu ul li").hover(function () {
        $(".telSepetCategoryItemContainerSubMenu ul li").css({ "border-left": "0px solid #027436", "border-right": "0px solid #027436" });
        $(".telSepetCategoryItemContainerSubMenu ul li a").css({ "color": "#1c1c1c" });
        $(this).css({ "border-left": "1px solid #027436", "border-right": "1px solid #027436" });
        $(this).children("a").css({ "color": "#027436" });
    }, function () {
        $(this).css({ "border-left": "0px solid #027436", "border-right": "0px solid #027436" });
        $(this).children("a").css({ "color": "#1c1c1c" });
    });

    $(".telSepetCategoryItemContainerSubMenu ul li").click(function () {
        var clickElement = $(this);
        $(".telSepetCategoryItemContainerSubMenu ul li").each(function (index) {
            $(this).attr("data-active", "false");
        });

        $(clickElement).attr("data-active", "true");
    });

    $(".telSepetCategoryItemContainerSubMenu").hover(function () {

    }, function () {
        $(".telSepetCategoryItemContainerSubMenu ul li").each(function (index) {
            if ($(this).attr("data-active") == "true") {
                $(this).css({ "border-left": "1px solid #027436", "border-right": "1px solid #027436" });
                $(this).children("a").css("color", "#027436");
            }
        });
    });

    $('#banner-fade').bjqs({
        height: 200,
        width: 320,
        responsive: true
    });

    $(".telSepetCategoryItemContainerSubMenu ul li").click(function () {
        var dataId = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: "/Doit/TelSepetUrunDetail/" + dataId,
            success: function (data) {
                $(".telSepetDetayContainerTitle").html(data.Baslik2);
                $(".telSepetDetayContainerText").html(data.Explanation);
                $(".telSepetDetayContainerSlider img").attr("src", "../../../Areas/Admin/Media/" + data.Image);
            },
            complate: function () {

            }
        });
    });

    $(".telSepetCategoryItemContainer:eq(0)").children(".telSepetCategoryItemContainerTitle").click();
    $(".telSepetCategoryItemContainer:eq(0)").children(".telSepetCategoryItemContainerTitle").css({ "background": "#027436", "color": "#fff" });

    $(".telSepetCategoryItemContainerSubMenu ul li a").click(function () {
        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 85 }, 500);
    });
});