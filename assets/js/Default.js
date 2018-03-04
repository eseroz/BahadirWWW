$(document).ready(function () {

    //var $window = $(window);
    //var scrollTime = 2;
    //var scrollDistance = 170;

    //$window.on("mousewheel DOMMouseScroll", function (event) {
    //    event.preventDefault();
    //    var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
    //    var scrollTop = $window.scrollTop();
    //    var finalScroll = scrollTop - parseInt(delta * scrollDistance);

    //    TweenMax.to($window, scrollTime, {
    //        scrollTo: { y: finalScroll, autoKill: true },
    //        ease: Power1.easeOut,
    //        overwrite: 5
    //    });
    //});
    
    $(".swiper-slide").each(function () {
        $(this).find(".slideAutoLine").height($(this).find(".sliderDescription").height());
    });

    $("#slider").hover(function () {
        $(".sliderTurnLeftPasif, .sliderTurnRightPasif").animate({
            opacity: 0
        }, 200);

        $(".sliderTurnLeftAktif, .sliderTurnRightAktif").animate({
            opacity: 1
        }, 200);
    }, function () {
        $(".sliderTurnLeftPasif, .sliderTurnRightPasif").animate({
            opacity: 1
        }, 200);
        $(".sliderTurnLeftAktif, .sliderTurnRightAktif").animate({
            opacity: 0
        }, 200);
    });

    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;
    $(".swiper-slide, .sliderListeIEfiltre").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".swiper-slide").height() <= 306) {
        $(".swiper-slide, .sliderListeIEfiltre").css("height", "306px");
    }

    $(".sliderTurnLeftPasif, .sliderTurnRightPasif, .sliderTurnLeftAktif, .sliderTurnRightAktif").css("margin-top", ($("#slider").height() / 2) - 25);

    $("#homeNewsAndAnnouncementContainerRightBanner").css("width", ($(window).width() - $(".siteContainer").width()) / 2);

    $(".homeNewsAndAnnouncementContainerNewsItem").hover(function () {
        $(this).children(".homeNewsAndAnnouncementContainerNewsItemOk").css("background-image", "url('/assets/img/homeNewsAndAnnouncementContainerNewsOk.png')");
        $(this).children(".homeNewsAndAnnouncementContainerNewsItemTitle").css("color", "#fff");
    }, function () {
        $(this).children(".homeNewsAndAnnouncementContainerNewsItemOk").css("background", "");
        $(this).children(".homeNewsAndAnnouncementContainerNewsItemTitle").css("color", "#9dbda8");
    });

    $("#newsShareSocialMediaContainer_Linkedin").hover(
        function () {
            $("#newsShareSocialMediaContainer_LinkedinPasif").css("display", "none");
            $("#newsShareSocialMediaContainer_LinkedinAktif").css("display", "block");
        },
        function () {
            $("#newsShareSocialMediaContainer_LinkedinPasif").css("display", "block");
            $("#newsShareSocialMediaContainer_LinkedinAktif").css("display", "none");
        }
    );
    $("#newsShareSocialMediaContainer_Twitter").hover(
        function () {
            $("#newsShareSocialMediaContainer_TwitterPasif").css("display", "none");
            $("#newsShareSocialMediaContainer_TwitterAktif").css("display", "block");
        },
        function () {
            $("#newsShareSocialMediaContainer_TwitterPasif").css("display", "block");
            $("#newsShareSocialMediaContainer_TwitterAktif").css("display", "none");
        }
    );
    $("#newsShareSocialMediaContainer_Facebook").hover(
        function () {
            $("#newsShareSocialMediaContainer_FacebookPasif").css("display", "none");
            $("#newsShareSocialMediaContainer_FacebookAktif").css("display", "block");
        },
        function () {
            $("#newsShareSocialMediaContainer_FacebookPasif").css("display", "block");
            $("#newsShareSocialMediaContainer_FacebookAktif").css("display", "none");
        }
    );

    $("#homeNewsAndAnnouncementSocialMediaContainer_Linkedin").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinPasif").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinAktif").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinPasif").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinAktif").css("display", "none");
        }
    );
    $("#homeNewsAndAnnouncementSocialMediaContainer_Twitter").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterPasif").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterAktif").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterPasif").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterAktif").css("display", "none");
        }
    );
    $("#homeNewsAndAnnouncementSocialMediaContainer_Facebook").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookPasif").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookAktif").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookPasif").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookAktif").css("display", "none");
        }
    );

    $("#homeNewsAndAnnouncementSocialMediaContainer_Linkedin2").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinPasif2").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinAktif2").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinPasif2").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinAktif2").css("display", "none");
        }
    );
    $("#homeNewsAndAnnouncementSocialMediaContainer_Twitter2").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterPasif2").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterAktif2").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterPasif2").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterAktif2").css("display", "none");
        }
    );
    $("#homeNewsAndAnnouncementSocialMediaContainer_Facebook2").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookPasif2").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookAktif2").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookPasif2").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookAktif2").css("display", "none");
        }
    );

    $("#homeNewsAndAnnouncementSocialMediaContainer_Linkedin3").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinPasif3").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinAktif3").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinPasif3").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_LinkedinAktif3").css("display", "none");
        }
    );
    $("#homeNewsAndAnnouncementSocialMediaContainer_Twitter3").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterPasif3").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterAktif3").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterPasif3").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_TwitterAktif3").css("display", "none");
        }
    );
    $("#homeNewsAndAnnouncementSocialMediaContainer_Facebook3").hover(
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookPasif3").css("display", "none");
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookAktif3").css("display", "block");
        },
        function () {
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookPasif3").css("display", "block");
            $("#homeNewsAndAnnouncementSocialMediaContainer_FacebookAktif3").css("display", "none");
        }
    );

    $(".homeKurumsalProjelerContainer").css("margin-top", ($(".homeKurumsalKimlikContainerFiltre").height() - $(".homeKurumsalProjelerContainer").height()) / 2);

    if ($(window).width() >= 768 && $(window).width() <= 1024) {
        $('.homeNewsAndAnnouncementBannerContainer2, .homeNewsAndAnnouncementImgTitleContainer2, .homeNewsAndAnnouncementImgTitleContainerFiltre2, .homeNewsAndAnnouncementImgTitleContainerFiltre2General, .homeNewsAndAnnouncementContainerBackGround2').height($('.homeNewsAndAnnouncementBannerContainer2').width() * 9 / 16);
    }

    //$(".homeProjelerContainerExplanationContainer").css("margin-top", ($("#homeProjelerContainerSiteContainer").height() / 2) - $(".homeProjelerContainerExplanationContainer").height() / 2);

    if (($("#homeProjelerContainerSiteContainer").height() / 2) - $(".homeProjelerContainerExplanationContainer").height() / 2 > 20) {
        $(".homeProjelerContainerExplanationContainer").css("margin-top", ($("#homeProjelerContainerSiteContainer").height() / 2) - $(".homeProjelerContainerExplanationContainer").height() / 2);
        $(".homeProjelerContainer, .homeProjelerContainerFilter, #homeProjelerContainerSiteContainer").css("height", "390px");
    } else {
        $(".homeProjelerContainer, .homeProjelerContainerFilter, #homeProjelerContainerSiteContainer").css("height", $(".homeProjelerContainerExplanationContainer").height() + 20);
        $(".homeProjelerContainerExplanationContainer").css("margin-top", "10px");
    }

    $(".homeNewsAndAnnouncementBannerContainer2General").css("margin-top", ($(".homeNewsAndAnnouncementBannerContainer2").height() / 2) - $(".homeNewsAndAnnouncementBannerContainer2General").height() / 2);
    $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1").css("padding-top", ($(".homeNewsAndAnnouncementBannerContainer2").height() / 2) - $(".homeNewsAndAnnouncementBannerContainer2General").height() / 2);

    $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2Container").css("padding-top", ($(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre").height() / 2) - $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2Container").height() / 2);

    $(".homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3RightButton2").css("margin-top", ($(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre").height() / 2) - $(".homeNewsAndAnnouncementBannerContainer3LeftButton2").height() / 2);

    $(".homeNewsAndAnnouncementPagesContainerIndis li").click(function () {
        if ($(this).index() == 0) {
            $(".homeNewsAndAnnouncementPagesContainerPrevIcons").css("display", "none");
            $(".homeNewsAndAnnouncementPagesContainerIndis").css("margin-left", "67px");
        } else {
            $(".homeNewsAndAnnouncementPagesContainerIndis").css("margin-left", "8px");
            $(".homeNewsAndAnnouncementPagesContainerPrevIcons").css("display", "block");
        }

        $(".homeNewsAndAnnouncementPagesContainerIndis li a").removeClass("homeNewsAndAnnouncementPagesContainerIndisActive");
        $(this).children("a").addClass("homeNewsAndAnnouncementPagesContainerIndisActive");
    });

    //
    pGizle();

    $(".homeNewsAndAnnouncementItemContainerItem").hover(function () {
        $(this).children(".homeNewsAndAnnouncementItemContainerItemTitle").css("color", "#444444");
    }, function () {
        if ($(this).attr("class").indexOf("homeNewsAndAnnouncementItemContainerItemActive") == -1) {
            $(this).children(".homeNewsAndAnnouncementItemContainerItemTitle").css("color", "#b0b0b0");
        }
    });

    $(".homeNewsAndAnnouncementItemContainerItem, .homeNewsAndAnnouncementItemContainerItem2").click(function () {

        $(".homeNewsAndAnnouncementItemContainerItem, .homeNewsAndAnnouncementItemContainerItem2").removeClass("homeNewsAndAnnouncementItemContainerItemActive").removeClass("homeNewsAndAnnouncementItemContainerItemActive2");

        $(this).addClass("homeNewsAndAnnouncementItemContainerItemActive");
        $(".homeNewsAndAnnouncementItemContainerItemTitle").css("color", "#b0b0b0");
        $(".homeNewsAndAnnouncementItemContainerItemImg").css("opacity", "0");

        $(this).children(".homeNewsAndAnnouncementItemContainerItemTitle").css("color", "#444444");
        $(this).children(".homeNewsAndAnnouncementItemContainerItemImg").css("opacity", "1");

  
        var formData = new FormData();
        formData.append("OPTION", "GET_NEWS");
        formData.append("ID", $(this).attr("data-id"));

        $.ajax({
            type: "POST",
            dataType: 'json',
            data:formData,
            processData: false,
            contentType:false,
            url: "../ajax/home/ajax.php",
            success: function (DATA) {

                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1Main").html(DATA.TITLE1);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2").html(DATA.TITLE2);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltre").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerTextInner").html(DATA.CONTENT_HTML);
                $(".homeNewsAndAnnouncementContainerInfoDate").html(DATA.DATE);

                $(".homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3LeftButton, .homeNewsAndAnnouncementBannerContainer3RightButton2, .homeNewsAndAnnouncementBannerContainer3RightButton").attr("data-id", DATA.ID);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1_2").html(DATA.TITLE1);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2_2").html(DATA.TITLE2);
                $(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerText3").html(DATA.CONTENT_HTML);
                $(".homeNewsAndAnnouncementContainerInfoDate").html(DATA.DATE);

                $(".homeNewsAndAnnouncementImgTitleContainerFiltreBand").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");

                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1").html(DATA.TITLE1);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2").html(DATA.TITLE2);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltre2").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerText2").html(DATA.CONTENT_HTML);
                $(".homeNewsAndAnnouncementContainerInfoDate").html(DATA.DATE);

                //
                pGizle();
                if ($(".homeNewsAndAnnouncementImgTitleContainerText2 p").height() > 148) {
                    $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").css("margin-top", "10px");
                } else {
                    $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").css("margin-top", "0px");
                }
            },
            error: function (a,b,c) {
                console.log(a);
                console.log(b);
                console.log(c);
            }
        });
    });

    $(".homeNewsAndAnnouncementBannerContainer3RightButton2, .homeNewsAndAnnouncementBannerContainer3RightButton, .homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3LeftButton").click(function () {
        
        var formData = new FormData();
        formData.append("OPTION", "GET_NEWS_NEXT_BACK");
        formData.append("ID", $(this).attr("data-id"));
        formData.append("YON", $(this).attr("data-yon"));

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            url: "../ajax/home/ajax.php",
            success: function (DATA) {

                $(".homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3LeftButton, .homeNewsAndAnnouncementBannerContainer3RightButton2, .homeNewsAndAnnouncementBannerContainer3RightButton").attr("data-id", DATA.ID);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1_2").html(DATA.TITLE1);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2_2").html(DATA.TITLE2);
                $(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerText3").html(DATA.DESCRIPTION);
                $(".homeNewsAndAnnouncementContainerInfoDate").html(DATA.DATE);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1Main").html(DATA.TITLE1);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2").html(DATA.TITLE2);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltre").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerTextInner").html(DATA.DESCRIPTION);
                $(".homeNewsAndAnnouncementContainerInfoDate").html(DATA.DATE);                
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreBand").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1").html(DATA.TITLE1);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2").html(DATA.TITLE2);
                $(".homeNewsAndAnnouncementImgTitleContainerFiltre2").css("background-image", "url(../panel/system/ViewBinaryImage.php?OPTION=NEWS&&ID=" + DATA.ID + ")");
                $(".homeNewsAndAnnouncementImgTitleContainerText2").html(DATA.DESCRIPTION);
                $(".homeNewsAndAnnouncementContainerInfoDate").html(DATA.DATE);

            },
            error: function (a, b, c) {
                console.log(a);
                console.log(b);
                console.log(c);
            }
        });

    });

    //$(".homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3LeftButton").click(function () {
    //    $.ajax({
    //        type: "GET",
    //        url: "/Doit/PrevHaberDetail/" + $(this).attr("data-sort"),
    //        success: function (data) {
    //            $(".homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3LeftButton, .homeNewsAndAnnouncementBannerContainer3RightButton2, .homeNewsAndAnnouncementBannerContainer3RightButton").attr("data-sort", data.Sort);
    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1_2").html(data.HaberTitle1);
    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2_2").html(data.HaberTitle2);
    //            $(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre").css("background-image", "url(Areas/Admin/Media/" + data.HaberImage2 + ")");
    //            $(".homeNewsAndAnnouncementImgTitleContainerText3").html(data.HaberAciklama);
    //            $(".homeNewsAndAnnouncementContainerInfoDate").html(data.HaberDate);

    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1Main").html(data.HaberTitle1);
    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2").html(data.HaberTitle2);
    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltre").css("background-image", "url(Areas/Admin/Media/" + data.HaberImage1 + ")");
    //            $(".homeNewsAndAnnouncementImgTitleContainerTextInner").html(data.HaberAciklama);
    //            $(".homeNewsAndAnnouncementContainerInfoDate").html(data.HaberDate);

    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1").html(data.HaberTitle1);
    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2").html(data.HaberTitle2);
    //            $(".homeNewsAndAnnouncementImgTitleContainerFiltre2").css("background-image", "url(Areas/Admin/Media/" + data.HaberImage2 + ")");
    //            $(".homeNewsAndAnnouncementImgTitleContainerText2").html(data.HaberAciklama);
    //            $(".homeNewsAndAnnouncementContainerInfoDate").html(data.HaberDate);
    //        },
    //        complate: function () {

    //        }
    //    });
    //});

    $(".homeNewsAndAnnouncementItemContainerItem2").hover(function () {
        $(this).children(".homeNewsAndAnnouncementItemContainerItemTitle2").css("color", "#444444");
    }, function () {
        //Burası
        if ($(this).attr("class").indexOf("homeNewsAndAnnouncementItemContainerItemActive2") == -1) {
            $(this).children(".homeNewsAndAnnouncementItemContainerItemTitle2").css("color", "#b0b0b0");
        }
    });
    $(".homeNewsAndAnnouncementItemContainerItem2").click(function () {
        $(this).addClass("homeNewsAndAnnouncementItemContainerItemActive2");
        $(".homeNewsAndAnnouncementItemContainerItemTitle2").css("color", "#b0b0b0");
        $(".homeNewsAndAnnouncementItemContainerItemImg2").css("opacity", "0");

        $(this).children(".homeNewsAndAnnouncementItemContainerItemTitle2").css("color", "#444444");
        $(this).children(".homeNewsAndAnnouncementItemContainerItemImg2").css("opacity", "1");
    });

    if (location.href.toString().indexOf("?target=Hakkimizda") > -1) {
        $('html,body').animate({ scrollTop: $("#homeHakkimizdaContainerGeneralContainer").offset().top - 85 }, 1000);
    }
    
    var homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight1 = 0;
    $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore1").on("click", function () {

        //
        pGizle();
        $(".homeNewsAndAnnouncementImgTitleContainerTextInner p").show();
        $(".homeNewsAndAnnouncementImgTitleContainerText").css("margin-bottom","30px");

        homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight1 = $(".homeNewsAndAnnouncementImgTitleContainerTextInner").height();

        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore1").css("display", "none");
        $(".homeNewsAndAnnouncementItemContainer").css("display", "none");

        var totalHomeNewsAndAnnouncementImgTitleContainerTextInnerHeight = 0;
        $(".homeNewsAndAnnouncementImgTitleContainerText").animate({
            width: 1024
        }, 500, function () {
            $(".homeNewsAndAnnouncementImgTitleContainerTextInner1CloseIcon").css("display", "block");

            $(".homeNewsAndAnnouncementImgTitleContainerTextInner p").each(function () {
                totalHomeNewsAndAnnouncementImgTitleContainerTextInnerHeight += $(this).height() + 18;
            });

            if (totalHomeNewsAndAnnouncementImgTitleContainerTextInnerHeight < 51) {
                totalHomeNewsAndAnnouncementImgTitleContainerTextInnerHeight = 61;
            }

            $(".homeNewsAndAnnouncementImgTitleContainerTextInner").css("max-height", totalHomeNewsAndAnnouncementImgTitleContainerTextInnerHeight + "px");
            $(".homeNewsAndAnnouncementImgTitleContainerText, .homeNewsAndAnnouncementImgTitleContainerTextInner").animate({
                height: totalHomeNewsAndAnnouncementImgTitleContainerTextInnerHeight
            }, 500);
        });
    });

    $(".homeNewsAndAnnouncementPagesContainerIndis li a").click(function () {
        $(".homeNewsAndAnnouncementItemContainerItem, .homeNewsAndAnnouncementItemContainerItem2").css("display", "none");
        if (parseInt($(this).attr("data-page")) == 1) {
            for (var i = 0; i < 5; i++) {
                $(".homeNewsAndAnnouncementItemContainerItem:eq(" + (i) + "), .homeNewsAndAnnouncementItemContainerItem2:eq(" + (i) + ")").css("display", "block");
            }
        } else if (parseInt($(this).attr("data-page")) > 1) {
            for (var i = (parseInt($(this).attr("data-page")) * 5) - 5; i < parseInt($(this).attr("data-page")) * 5; i++) {
                $(".homeNewsAndAnnouncementItemContainerItem:eq(" + i + "), .homeNewsAndAnnouncementItemContainerItem2:eq(" + i + ")").css("display", "block");
            }
        }
    });

    $(".homeNewsAndAnnouncementImgTitleContainerTextInner1CloseIcon").click(function () {
        $(".homeNewsAndAnnouncementImgTitleContainerTextInner1CloseIcon").css("display", "none");

        $(".homeNewsAndAnnouncementImgTitleContainerText").animate({
            width: 536
        }, 500, function () {
            if (homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight1 <= 118) {
                $(".homeNewsAndAnnouncementImgTitleContainerTextInner").css({ "max-height": "172px" });
            }

            $(".homeNewsAndAnnouncementImgTitleContainerTextInner").animate({
                height: homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight1
            }, 500, function () {
                $(".homeNewsAndAnnouncementImgTitleContainerTextInner").css({"height": "auto"});    
                $(".homeNewsAndAnnouncementImgTitleContainerTextInner").css({ "max-height": "172px" });
            });

            $(".homeNewsAndAnnouncementImgTitleContainerText").animate({
                height: 205
            }, 500, function () {
                $(".homeNewsAndAnnouncementItemContainer").css("display", "block");
                $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore1").css("display", "block");
                $(".homeNewsAndAnnouncementImgTitleContainerTextInner").css("margin-bottom", "0px");

                //
                $(".homeNewsAndAnnouncementImgTitleContainerText").css("margin-bottom", "0");
                pGizle();

            });
        });
    });

    var homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight2 = 0;
    $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").click(function () {

        // 
        $(".homeNewsAndAnnouncementImgTitleContainerText2 p").show();

        homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight2 = $(".homeNewsAndAnnouncementImgTitleContainerText2").height();
        var totalhomeNewsAndAnnouncementImgTitleContainerText2Height = 0;
        $(".homeNewsAndAnnouncementImgTitleContainerText2").css("width", "calc(100% - 70px)");
        $(".homeNewsAndAnnouncementItemContainer2").css("display", "none");
        $(".homeNewsAndAnnouncementImgTitleGeneralContainerText2").animate({
            width: "100%"
        }, 500, function () {
            $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").css("display", "none");
            $(".homeNewsAndAnnouncementImgTitleContainerText2CloseIcon").css("display", "block");

            $(".homeNewsAndAnnouncementImgTitleContainerText2 p").each(function () {
                totalhomeNewsAndAnnouncementImgTitleContainerText2Height += $(this).height() + 18;
            });

            $(".homeNewsAndAnnouncementImgTitleGeneralContainerText2").css("height", "auto");
            $(".homeNewsAndAnnouncementImgTitleContainerText2").animate({
                height: totalhomeNewsAndAnnouncementImgTitleContainerText2Height,
                maxHeight: totalhomeNewsAndAnnouncementImgTitleContainerText2Height
            }, 500);
        });
    });

    $(".homeNewsAndAnnouncementImgTitleContainerText2CloseIcon").click(function () {
        $(".homeNewsAndAnnouncementImgTitleContainerText2CloseIcon").css("display", "none");

        $(".homeNewsAndAnnouncementImgTitleContainerText2").animate({
            width: parseInt($(".homeNewsAndAnnouncementImgTitleGeneralContainerText2").width()) / 2
        }, 500, function () {
            $(".homeNewsAndAnnouncementImgTitleGeneralContainerText2").css("width", "50%");
            $(".homeNewsAndAnnouncementImgTitleGeneralContainerText2").animate({
                height:246
            });
            $(".homeNewsAndAnnouncementImgTitleContainerText2").animate({
                height: homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight2,
                maxHeight: homeNewsAndAnnouncementImgTitleContainerTextInnerFirstHeight2
            }, 500, function () {
                $(".homeNewsAndAnnouncementImgTitleContainerText2").css({ "height": "auto", "max-height": "164px" });
                $(".homeNewsAndAnnouncementItemContainer2").css("display", "block");
                $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").css("display", "block");
            });
        });
    });

    $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3").click(function () {
        $(".homeNewsAndAnnouncementImgTitleContainerText3 p").show();

        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3").css("display", "none");
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3CloseIcon").css("display", "block");
        var totalhomeNewsAndAnnouncementImgTitleContainerText3Height = 0;

        $(".homeNewsAndAnnouncementImgTitleContainerText3 p").each(function () {
            totalhomeNewsAndAnnouncementImgTitleContainerText3Height += $(this).height() + 18;
        });

        $(".homeNewsAndAnnouncementImgTitleContainerText3").animate({
            height: totalhomeNewsAndAnnouncementImgTitleContainerText3Height,
            maxHeight: totalhomeNewsAndAnnouncementImgTitleContainerText3Height
        }, 500, function () {

        });
    });

    $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3CloseIcon").click(function () {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3").css("display", "block");
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3CloseIcon").css("display", "none");
        $(".homeNewsAndAnnouncementImgTitleContainerText3").animate({
            maxHeight: 214
        }, 500, function () {
            $(".homeNewsAndAnnouncementImgTitleContainerText3").css("height", "auto");
        });
    });
});


$(window).resize(function () {

    pGizle();
    $(".homeKurumsalProjelerContainer").css("margin-top", ($(".homeKurumsalKimlikContainerFiltre").height() - $(".homeKurumsalProjelerContainer").height()) / 2);

    var sliderGenislikFark = 1920 - $(window).width();
    var sliderBesKatFark = sliderGenislikFark / 5;

    $(".swiper-slide, .sliderListeIEfiltre").css("height", +parseFloat(490 - sliderBesKatFark) + "px");
    if ($(".swiper-slide").height() <= 306) {
        $(".swiper-slide, .sliderListeIEfiltre").css("height", "306px");
    }

    $(".sliderTurnLeftPasif, .sliderTurnRightPasif, .sliderTurnLeftAktif, .sliderTurnRightAktif").css("margin-top", ($("#slider").height() / 2) - 25);
    $("#homeNewsAndAnnouncementContainerRightBanner").css("width", ($(window).width() - $(".siteContainer").width()) / 2);

    if ($(window).width() >= 768 && $(window).width() <= 1024) {
        $('.homeNewsAndAnnouncementBannerContainer2, .homeNewsAndAnnouncementImgTitleContainer2, .homeNewsAndAnnouncementImgTitleContainerFiltre2, .homeNewsAndAnnouncementImgTitleContainerFiltre2General, .homeNewsAndAnnouncementContainerBackGround2, .homeNewsAndAnnouncementContainerInfo2').height($('.homeNewsAndAnnouncementBannerContainer2').width() * 9 / 16);

        $(".homeNewsAndAnnouncementBannerContainer2General").css("margin-top", ($(".homeNewsAndAnnouncementBannerContainer2").height() / 2) - $(".homeNewsAndAnnouncementBannerContainer2General").height() / 2);
    }

    if ($(window).width() <= 495) {
        $('.homeNewsAndAnnouncementImgTitleContainer3, .homeNewsAndAnnouncementImgTitleContainer3Img, .homeNewsAndAnnouncementImgTitleContainer3ImgFiltre, .homeNewsAndAnnouncementImgTitleContainer3ImgGeneral').height($('.homeNewsAndAnnouncementImgTitleContainer3Img').width() * 9 / 16);
    } else {
        $('.homeNewsAndAnnouncementImgTitleContainer3, .homeNewsAndAnnouncementImgTitleContainer3Img, .homeNewsAndAnnouncementImgTitleContainer3ImgFiltre, .homeNewsAndAnnouncementImgTitleContainer3ImgGeneral').height(260);
    }

    if (($("#homeProjelerContainerSiteContainer").height() / 2) - $(".homeProjelerContainerExplanationContainer").height() / 2 > 20) {
        $(".homeProjelerContainerExplanationContainer").css("margin-top", ($("#homeProjelerContainerSiteContainer").height() / 2) - $(".homeProjelerContainerExplanationContainer").height() / 2);
        $(".homeProjelerContainer, .homeProjelerContainerFilter, #homeProjelerContainerSiteContainer").css("height", "390px");
    } else {
        $(".homeProjelerContainer, .homeProjelerContainerFilter, #homeProjelerContainerSiteContainer").css("height", $(".homeProjelerContainerExplanationContainer").height() + 20);
        $(".homeProjelerContainerExplanationContainer").css("margin-top", "10px");
    }

    $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle1").css("padding-top", ($(".homeNewsAndAnnouncementBannerContainer2").height() / 2) - $(".homeNewsAndAnnouncementBannerContainer2General").height() / 2);
    $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2Container").css("padding-top", ($(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre, .homeNewsAndAnnouncementImgTitleContainer3ImgGeneral").height() / 2) - $(".homeNewsAndAnnouncementImgTitleContainerFiltreTitle2Container").height() / 2);
    $(".homeNewsAndAnnouncementBannerContainer3LeftButton2, .homeNewsAndAnnouncementBannerContainer3RightButton2").css("margin-top", ($(".homeNewsAndAnnouncementImgTitleContainer3ImgFiltre, .homeNewsAndAnnouncementImgTitleContainer3ImgGeneral").height() / 2) - $(".homeNewsAndAnnouncementBannerContainer3LeftButton2").height() / 2);
});

function pGizle() {

    var pHeight = 0;
    $(".homeNewsAndAnnouncementImgTitleContainerTextInner p").each(function () {
        pHeight += $(this).height() + 18;
        if (pHeight > 172) {
            $(this).hide();
        }
        if ($(this).html().toString() == "&nbsp;" || $(this).html().toString() == "&nbsp; " || $(this).html().toString() == "") {
            $(this).remove();
        }
    });

    if (pHeight <= 172) {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore1").css("display", "none");
    } else {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore1").css("display", "block");
    }
    
    var pHeight2 = 0;
    $(".homeNewsAndAnnouncementImgTitleContainerText2 p").each(function () {
        pHeight2 += $(this).height() + 18;
        if (pHeight2 > 148) {
            if ($(this).index() > 0) {
                $(this).hide();
            }
        }
        if ($(this).html().toString() == "&nbsp;" || $(this).html().toString() == "&nbsp; " || $(this).html().toString() == "") {
            $(this).remove();
        }
    });
    if (pHeight2 <= 148) {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").css("display", "none");
    } else {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore2").css("display", "block");
    }

    var pHeight3 = 0;
    $(".homeNewsAndAnnouncementImgTitleContainerText3 p").each(function () {
        pHeight3 += $(this).height() + 18;
        if (pHeight3 > 214) {
            if ($(this).index() > 0) {
                $(this).hide();
            }
        }
        if ($(this).html().toString() == "&nbsp;" || $(this).html().toString() == "&nbsp; " || $(this).html().toString() == "") {
            $(this).remove();
        }
    });
    if (pHeight3 <= 214) {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3").css("display", "none");
    } else {
        $("#homeNewsAndAnnouncementImgTitleContainerTextSeeMore3").css("display", "block");
    }
}