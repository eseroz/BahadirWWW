$(document).ready(function () {
    $(".terlikCategoryItemContainer").first().css({ "background": "#027436" });
    $(".terlikCategoryItemContainer").first().children(".terlikCategoryItemContainerTitle").css("color", "#fff");

    $(".terlikCategoryItemContainer").hover(function () {
        $(".terlikCategoryItemContainer").css("background", "");
        $(".terlikCategoryItemContainer").children(".terlikCategoryItemContainerTitle").css("color", "#027436");

        $(this).css({ "background": "#027436" });
        $(this).children(".terlikCategoryItemContainerTitle").css("color", "#fff");
    }, function () {
        $(".terlikCategoryItemContainer").css("background", "");
        $(".terlikCategoryItemContainer").children(".terlikCategoryItemContainerTitle").css("color", "#027436");
    });

    $(".terlikCategoryItemGeneralContainer").hover(function () {

    }, function () {
        $(".terlikCategoryItemContainer").each(function () {
            if ($(this).attr("data-active") == "true") {
                $(this).css({ "background": "#027436" });
                $(this).children(".terlikCategoryItemContainerTitle").css("color", "#fff");
            }
        });
    });

    $(".terlikCategoryItemContainer").click(function () {
        var dataId = $(this).attr("data-id");
        var clickElement = $(this);
        $(".terlikCategoryItemContainer").each(function () {
            $(this).attr("data-active", "false");
        });

        $(clickElement).attr("data-active", "true");

        $.ajax({
            type: "GET",
            url: "/Doit/TerlikDetail/" + dataId,
            success: function (data) {
                $(".telSepetDetayContainerTitle").html(data.Baslik);
                $(".telSepetDetayContainerText").html(data.Explanation);
                $(".telSepetDetayContainerSlider").children("img").attr({ "src": "Areas/Admin/Media/" + data.Image });
            },
            complate: function () {

            }
        });
    });

    $(".terlikCategoryItemGeneralContainer a").click(function () {
        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 85 }, 500);
        return false;
    });
});