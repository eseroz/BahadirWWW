$(document).ready(function () {
    //if ($("body").scrollTop() > 10) {
    //    $(".header").css({ "-webkit-box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)", "-moz-box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)", "box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)" });
    //    $(".header").css({ "border-bottom": "0px solid #ccc" });
    //} else {
    //    $(".header").css({ "-webkit-box-shadow": "", "-moz-box-shadow": "", "box-shadow": "" });
    //}

    $(".bannerMenu").css("margin-left", (($(".banner").width() / 2) - ($("#bannerMainMenu").width() / 2)) - ($(".logoContainer2").width() + 58));

    //$(".bannerSubMenuItemHakkimizda").click(function () {
    //    if (window.location.pathname != "/") {
    //        window.location = "../../../?target=Hakkimizda";
    //    } else {
    //        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 85 }, 1000);
    //        return false;
    //    }
    //});

    //$(".cPushMenuContainerProductContainer_Kurumsal_HakkimizdaA").click(function () {
    //    if (window.location.pathname != "/") {
    //        window.location = "../../../?target=Hakkimizda";
    //    } else {
    //        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 85 }, 1000);
    //        $(".c-menu__close").click();
    //        return false;
    //    }
    //});

    $(".cPushMenuContainerItemHeaderHref_Eksi").hide();
    
    $(".cPushMenuSubItemContainer li a, headerItem li a").click(function () {        
        window.location = $(this).attr("href");
    });


    var pushRight = new Menu({
        wrapper: '#o-wrapper',
        type: 'push-right',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
    });

    var pushRightBtn = document.querySelector('#c-button--push-right');

    pushRightBtn.addEventListener('click', function (e) {
        e.preventDefault;
        pushRight.open();
    });

    $(".cPushMenuContainerProductContainer_Kurumsal, .cPushMenuContainerProductContainer_Urunler, .cPushMenuContainerProductContainer_Kariyer, .cPushMenuSubItemContainer").slideUp();
    //$("#cPushMenuContainerItem_Kurumsal").click(function () {
    //    if ($(".cPushMenuContainerProductContainer_Kurumsal").attr("data-slide") == "false") {
    //        $(".cPushMenuContainerProductContainer_Kurumsal").slideDown(200);
    //        $(".cPushMenuContainerProductContainer_Kurumsal").attr("data-slide", "true");
    //        $("#cPushMenuContainerItem_KurumsalLi").css("background", "#f2f2f2");
    //        $("#cPushMenuContainerItem_KurumsalIcon_Arti").css("display", "none");
    //        $("#cPushMenuContainerItem_KurumsalIcon_Eksi").css("display", "block");
    //    } else {
    //        $(".cPushMenuContainerProductContainer_Kurumsal").slideUp(200);
    //        $(".cPushMenuContainerProductContainer_Kurumsal").attr("data-slide", "false");
    //        $("#cPushMenuContainerItem_KurumsalLi").css("background", "#fff");
    //        $("#cPushMenuContainerItem_KurumsalIcon_Arti").css("display", "block");
    //        $("#cPushMenuContainerItem_KurumsalIcon_Eksi").css("display", "none");
    //    }
    //});
    //$("#cPushMenuContainerItem_Urunler").click(function () {
    //    if ($(".cPushMenuContainerProductContainer_Urunler").attr("data-slide") == "false") {
    //        $(".cPushMenuContainerProductContainer_Urunler").slideDown(200);
    //        $(".cPushMenuContainerProductContainer_Urunler").attr("data-slide", "true");
    //        $("#cPushMenuContainerItem_UrunlerLi").css("background", "#f2f2f2");
    //        $("#cPushMenuContainerItem_UrunlerIcon_Arti").css("display", "none");
    //        $("#cPushMenuContainerItem_UrunlerIcon_Eksi").css("display", "block");
    //    } else {
    //        $(".cPushMenuContainerProductContainer_Urunler").slideUp(200);
    //        $(".cPushMenuContainerProductContainer_Urunler").attr("data-slide", "false");
    //        $("#cPushMenuContainerItem_UrunlerLi").css("background", "#fff");
    //        $("#cPushMenuContainerItem_UrunlerIcon_Arti").css("display", "block");
    //        $("#cPushMenuContainerItem_UrunlerIcon_Eksi").css("display", "none");
    //    }
    //});
    //$("#cPushMenuContainerItem_Kariyer").click(function () {
    //    if ($(".cPushMenuContainerProductContainer_Kariyer").attr("data-slide") == "false") {
    //        $(".cPushMenuContainerProductContainer_Kariyer").slideDown(200);
    //        $(".cPushMenuContainerProductContainer_Kariyer").attr("data-slide", "true");
    //        $("#cPushMenuContainerItem_KariyerLi").css("background", "#f2f2f2");
    //        $("#cPushMenuContainerItem_KariyerIcon_Arti").css("display", "none");
    //        $("#cPushMenuContainerItem_KariyerIcon_Eksi").css("display", "block");
    //    } else {
    //        $(".cPushMenuContainerProductContainer_Kariyer").slideUp(200);
    //        $(".cPushMenuContainerProductContainer_Kariyer").attr("data-slide", "false");
    //        $("#cPushMenuContainerItem_KariyerLi").css("background", "#fff");
    //        $("#cPushMenuContainerItem_KariyerIcon_Arti").css("display", "block");
    //        $("#cPushMenuContainerItem_KariyerIcon_Eksi").css("display", "none");
    //    }
    //});
    
    //cPushMenuSubItemContainer = cPushMenuSubItemContainer
    //cPushMenuContainerItemHeaderHref = cPushMenuContainerItemHeaderHref
    //cPushMenuContainerItemHeaderLi = cPushMenuContainerItemHeaderLi

    $(".cPushMenuContainerItemHeaderHref").click(function () {

        $(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").slideToggle(200);

        var category_id = $(this).attr("data-category-id");

        console.log(category_id);

        console.log($(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").attr("data-slide"));

        if ($(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").attr("data-slide") == "false") {
            $(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").slideDown(200);
            $(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").attr("data-slide", "true");
            $(".cPushMenuContainerItemHeaderLi[data-category-id='" + category_id + "']").css("background", "#f2f2f2");
            $(".cPushMenuContainerItemHeaderHref_Arti[data-category-id='" + category_id + "']").css("display", "none");
            $(".cPushMenuContainerItemHeaderHref_Eksi[data-category-id='" + category_id + "']").css("display", "block");
        } else {
            $(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").slideUp(200);
            $(".cPushMenuSubItemContainer[data-category-id='" + category_id + "']").attr("data-slide", "false");
            $(".cPushMenuContainerItemHeaderLi[data-category-id='" + category_id + "']").css("background", "#fff");
            $(".cPushMenuContainerItemHeaderHref_Arti[data-category-id='" + category_id + "']").css("display", "block");
            $(".cPushMenuContainerItemHeaderHref_Eksi[data-category-id='" + category_id + "']").css("display", "none");
        }
    });

    if ($(window).width() >= 600) {
        $(".small_txt_search").css("width", $(window).width() - 150);
    } else if ($(window).width() < 600) {
        $(".small_txt_search").css("width", $(window).width() - 170);
    }

    $(".smallSearchBannerContainer").slideUp(0);
    $("#search_icon2").click(function () {
        $(".banner").slideUp(500)
        $(".smallSearchBannerContainer").slideDown(500);
    });

    $("#smallSearchCloseIcon").click(function () {
        $(".banner").slideDown(500)
        $(".smallSearchBannerContainer").slideUp(500);
    });

    $(".bannerMainMenuItem").hover(function () {
        $(this).children("ul").fadeIn(50);
        $(this).children("a").css({ "border-bottom": "5px solid #027436", "padding-bottom": "5px" });
    },
    function () {
        $(this).children("ul").fadeOut(50);
        $(this).children("a").css({ "border-bottom": "none", "padding-bottom": "0px" });
    });

    $("#footerSocialMediaContainer_Linkedin").hover(
            function () {
                $("#footerSocialMediaContainer_LinkedinPasif").css("display", "none");
                $("#footerSocialMediaContainer_LinkedinAktif").css("display", "block");
            },
            function () {
                $("#footerSocialMediaContainer_LinkedinPasif").css("display", "block");
                $("#footerSocialMediaContainer_LinkedinAktif").css("display", "none");
            }
        );
    $("#footerSocialMediaContainer_Twitter").hover(
        function () {
            $("#footerSocialMediaContainer_TwitterPasif").css("display", "none");
            $("#footerSocialMediaContainer_TwitterAktif").css("display", "block");
        },
        function () {
            $("#footerSocialMediaContainer_TwitterPasif").css("display", "block");
            $("#footerSocialMediaContainer_TwitterAktif").css("display", "none");
        }
    );
    $("#footerSocialMediaContainer_Facebook").hover(
        function () {
            $("#footerSocialMediaContainer_FacebookPasif").css("display", "none");
            $("#footerSocialMediaContainer_FacebookAktif").css("display", "block");
        },
        function () {
            $("#footerSocialMediaContainer_FacebookPasif").css("display", "block");
            $("#footerSocialMediaContainer_FacebookAktif").css("display", "none");
        }
    );

    $("#footerSocialMediaContainer_Linkedin2").hover(
            function () {
                $("#footerSocialMediaContainer_LinkedinPasif2").css("display", "none");
                $("#footerSocialMediaContainer_LinkedinAktif2").css("display", "block");
            },
            function () {
                $("#footerSocialMediaContainer_LinkedinPasif2").css("display", "block");
                $("#footerSocialMediaContainer_LinkedinAktif2").css("display", "none");
            }
        );
    $("#footerSocialMediaContainer_Twitter2").hover(
        function () {
            $("#footerSocialMediaContainer_TwitterPasif2").css("display", "none");
            $("#footerSocialMediaContainer_TwitterAktif2").css("display", "block");
        },
        function () {
            $("#footerSocialMediaContainer_TwitterPasif2").css("display", "block");
            $("#footerSocialMediaContainer_TwitterAktif2").css("display", "none");
        }
    );
    $("#footerSocialMediaContainer_Facebook2").hover(
        function () {
            $("#footerSocialMediaContainer_FacebookPasif2").css("display", "none");
            $("#footerSocialMediaContainer_FacebookAktif2").css("display", "block");
        },
        function () {
            $("#footerSocialMediaContainer_FacebookPasif2").css("display", "block");
            $("#footerSocialMediaContainer_FacebookAktif2").css("display", "none");
        }
    );

    $(".cPushMenuContainerProductContainer_ALink").click(function () {
        window.location = "../../../" + $(this).attr("href");
    });

    $(".btn_mailAboneligi").click(function () {
        if (ValidateEmail($(".txt_mailAboneligi").val()) != true) {
            alert("Lütfen Geçerli Bir E-Mail Adresi Giriniz.");
            return false;
        }
        $.ajax({
            type: "GET",
            url: "/Doit/MailBultenAdd/" + $(".txt_mailAboneligi").val(),
            success: function (data) {
                if (data == "1") {
                    alert("E-Mail Adresi Başarıyla Eklendi.");
                } else {
                    alert("Bir Hata Meydana Geldi, Lütfen Sistem Yöneticisi İle İrtibata Geçiniz.");
                }
            },
            complate: function () {

            }
        });
    });
});

$(window).resize(function () {
    if ($(window).width() >= 600) {
        $(".small_txt_search").css("width", $(window).width() - 150);
    } else if ($(window).width() < 600) {
        $(".small_txt_search").css("width", $(window).width() - 170);
    }

    $(".bannerMenu").css("margin-left", (($(".banner").width() / 2) - ($("#bannerMainMenu").width() / 2)) - ($(".logoContainer2").width() + 58));
});

$(window).scroll(function () {
    if ($("body").scrollTop() > 10) {
        $(".header").css({ "-webkit-box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)", "-moz-box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)", "box-shadow": "0 0 0 0px white, 0 0px 15px rgba(0,0,0,0.20)" });
        $(".header").css({ "border-bottom": "0px solid #ccc" });
    } else {
        $(".header").css({ "-webkit-box-shadow": "", "-moz-box-shadow": "", "box-shadow": "" });
    }
});