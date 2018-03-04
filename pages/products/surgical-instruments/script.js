    var _pageX = 0;
    var _pageY = 0;
    var _windowWidth = $(window).width();
    var _windowHeight = $(window).height();
    var _branchItemDetailsOpened = false;
    var _currentItem;

    $(document).on("mousemove", function (event) {
        _pageX = event.pageX;
        _pageY = event.pageY;
    });   

    $(window).resize(function () {
        Responsive();
    });

    $(document).ready(function () {

        Responsive();

        $(".branch-item").find("img").attr("src", $(".branch-item").find("img").attr("data-src"));
        $(".modal-backdrop.fade").css({ "background-color": "#fff" });
        $(".modal-backdrop.fade").css('display', 'block');
        $(".mydrop").click(function (e) {
            if (e.target.className == 'mydrop modal-backdrop fade show' && _branchItemDetailsOpened == true) {
                var $h3 = $("#btnBranchModalClose").parent().find(".branch-header-right h3");
                BRANCH_ITEM_CLICK($h3);
            }
        });
                
        $("#btnBranchModalClose").click(function () {            
            var $h3 = $(this).parent().find(".branch-header-right h3");
            BRANCH_ITEM_CLICK($h3);            
        });

        $(".branch-item").find("h3").click(function () {
            if (!_branchItemDetailsOpened) {
                BRANCH_ITEM_CLICK(this);
            }
        });

        $(".branch-header-right").click(function () {
            if (!_branchItemDetailsOpened) {
                BRANCH_ITEM_CLICK($(this).find("h3"));
            }
        });

        $(".branch-header-left").click(function () {
            if (!_branchItemDetailsOpened) {
                BRANCH_ITEM_CLICK($(this).parent().find("h3"));
            }
        });

        $(".branch-close-button").hover(function () {
            $(this).css({ "opacity": "1" });
        }, function () {
            $(this).css({ "opacity": "0.5" });
            });

        $("#btnBranchModalClose").hide();
    });

    function BRANCH_ITEM_CLICK($h3) {
   
        _branchItemDetailsOpened = !_branchItemDetailsOpened;

        var $BranchItem = $($h3).closest(".branch-item");
        _currentItem = $($h3).closest(".branch-item");

        var $BranchItemHeader = $BranchItem.find(".branch-item-header");
        var $BranchDetailPageLeft = $BranchItem.find(".branch-detail-page-left");
        var $BranchItemHeaderLeft = $BranchItemHeader.find(".branch-header-left");
        var $BranchItemHeaderRight = $BranchItemHeader.find(".branch-header-right");
        var $BranchItemHeaderRight_H3 = $BranchItemHeaderRight.find("h3");
        var $BranchItemHeaderRight_H3_SLASH = $BranchItemHeaderRight_H3.find(".header-text-h3-slash");
        var $BranchDetails = $BranchItem.find(".branch-details");
        var $BranchDetailsTopRight = $BranchDetails.find(".detail-top-right");
        var $BranchDetailsText = $BranchItemHeader.find(".details-text");
        var $BrancItemContainer = $BranchItem.closest(".branch-item-container");
        var $btnBranchModalClose = $("#btnBranchModalClose");

        var $mydrop = $(".mydrop");
        var $myContainer = $("#myContainer");

        if (_branchItemDetailsOpened) {

            $("body").attr("style", "overflow:hidden;");
            $(".mydrop").attr("style", "overflow-y:scroll;");

            $($BranchItem).after("<div id='emptyItem'></div>");
            $($BranchItem).appendTo($myContainer);

            $($h3).css('left', "42px", "important");
            $($h3).css('text-align', "left", "important");
            $(".branch-close-button").css({ "opacity": "0.5" });

            $(".branch-item").css({ "overflow": "none", "display": "none" });
            $BranchItemHeader.append($btnBranchModalClose);
                    
            $BranchDetails.removeAttr("style");
            //$BranchDetails.attr("style", "width: 1362px;");

            $BranchItem.removeAttr("class");
            $BranchItem.attr("class", "branch-item col-xs-12 col-sm-12 col-md-12 col-lg-12");
            $BranchItem.removeAttr("style");
            $BranchItem.attr("style", "display:block;top:120px;position:absolute;heigth:auto !Important; max-width:1362px;left:0;right:0;");

            $BranchItemHeader.attr("style", "height:130px !Important; background-color:#fff;");

            $BranchItemHeaderLeft.removeAttr("class");
            $BranchItemHeaderLeft.attr("class", "branch-header-left col-xs-12 col-sm-12 col-md-3 col-lg-3");
            $BranchItemHeaderLeft.removeAttr("style");
            $BranchItemHeaderLeft.attr("style", "background:url('/panel/system/ViewBinaryImage.php?OPTION=BRANCH&&ID=" + _currentItem.attr("data-branch-id")  + "') right center / cover no-repeat rgb(255, 255, 255);height:130px;width:325px;");

            $BranchItemHeaderRight.removeAttr("class");
            $BranchItemHeaderRight.attr("class", "branch-header-right col-xs-12 col-sm-12 col-md-4 col-lg-3");
            $BranchItemHeaderRight.attr("style", "float:left;text-align:right;height:130px;");

            $BranchDetailPageLeft.css({ "display": "block", "background-color": "#fff", "width": "325px", "height": "130px" });

            $BranchDetailsText.removeAttr("class");
            $BranchDetailsText.attr("class", "details-text col-xs-12 col-sm-12 col-md-5 col-lg-6");
            $BranchDetailsText.attr("style", "height:130px;max-width: 600px;padding-left: 40px;");

            $BranchItemHeaderRight_H3.attr("style", "margin:0px !Important;top:43px !Important;left:65px !Important; text-align: left !Important;");

            
            $BranchItemHeaderRight_H3_SLASH.show();

            $BranchDetailsText.show();           
            $BranchDetails.show();

            var top = $(window).scrollTop();
            $('.mydrop').css("display", "block important");
            $(".modal-backdrop").css("opacity", 1);
            $("#btnBranchModalClose").show();

        } else {

            $("body").removeAttr("style");
            $(".mydrop").removeAttr("style");

            $(".branch-item").removeAttr("style");
            $BrancItemContainer.removeAttr("style");
            $BranchItem.removeAttr("class");
            $BranchItem.attr("class", "branch-item col-xs-12 col-sm-6 col-md-6 col-lg-4");

            $BranchItemHeader.removeAttr("style");

            $BranchItemHeaderRight.removeAttr("style");
            $BranchItemHeaderRight.removeAttr("class");
            $BranchItemHeaderRight.attr("class", "branch-header-right col-xs-12 col-sm-12 col-md-6 col-lg-6");            
            $BranchDetailsText.hide();
            $BranchDetails.hide();


            $BranchItemHeaderRight_H3_SLASH.hide();

            $BranchItem.find(".branch-details").removeAttr("style");

            $BranchItemHeaderLeft.removeAttr("class");
            $BranchItemHeaderLeft.attr("class", "branch-header-left col-xs-12 col-sm-12 col-md-6 col-lg-6");
            $BranchItemHeaderLeft.removeAttr("style");
            $BranchItemHeaderLeft.attr("style", "background:url('/panel/system/ViewBinaryImage.php?OPTION=BRANCH&&ID=" + _currentItem.attr("data-branch-id") + "') right center / cover no-repeat rgb(255, 255, 255);");

            $($h3).removeAttr("style");
            $(".branch-close-button").css({ "opacity": "1" });

            $("#emptyItem").after($BranchItem);
            $("#emptyItem").remove();

            $('.mydrop').css("display", "none important");
            $(".modal-backdrop.fade").css({ opacity: 0 });
            $("#btnBranchModalClose").hide();
            $("#myfilter").remove();


        }
 
        var detail_bottom_left_content_height = $(this).closest(".branch-item").find(".detail-bottom-left-content").height();
        $(".detail-vline").css({ "height": detail_bottom_left_content_height + "px" });

        Responsive();
    }


function TextOverflow(Text, MaxSize) {
    if (Text.length > MaxSize) {
        return Text.substr(0, MaxSize) + '...' + Text.substr(Text.length - 3, Text.length);
    } else {
        return str;
    }
}


function Responsive() {

    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

    console.clear();

    var catalog_container_height = $("#branch-details-catalog-container").outerHeight();

    $(".detail-bottom-first-content").removeAttr("style");
    $(".detail-bottom-first-content").attr("style", catalog_container_height + "px;");

    if (width < 1350) {
        console.log("width < 1350");
        if (_branchItemDetailsOpened) {
            _currentItem.find(".details-text").removeAttr("style");
            _currentItem.find(".details-text").attr("style", "height: 130px; width: 100%; padding-left: 126px; padding-right: 125px; padding-top:29px;height:100px; display: block;background-color:#6d6d6d;color:#c5c5c5;border-left:solid 5px #41733d;");
            _currentItem.find(".branch-header-right").removeAttr("style");
            _currentItem.find(".branch-header-right").attr("style", "float:right !Important;margin-right:100px;width: 260px;margin-top: 10px;");
            _currentItem.find(".branch-header-right h3").removeAttr("style");
            _currentItem.find(".branch-header-right h3").removeAttr("style", "margin:0px !Important;top:43px !Important;left:65px !Important;text-align: left !Important;width: 197px;");
            _currentItem.find(".branch-close-button").removeAttr("style");
            _currentItem.find(".branch-close-button").attr("style", "right:40px;");
            _currentItem.find(".header-text-h3-slash").attr("style", "left:-36px !Important; display:block; top:3px !Important;");
            _currentItem.find(".branch-item h3 span").removeAttr("style");
            _currentItem.find(".branch-item h3 span").attr("style", "");
            _currentItem.find(".branch-header-right h3").find("#branch-sub-title").removeAttr("style");
            _currentItem.find(".branch-header-right h3").find("#branch-sub-title").attr("style", "left:-46px!Important;display: block;text-align: right;");
            _currentItem.find(".branch-details").attr("style", "display: block;margin-top:0px !Important;");            
        }
    }

    if (width > 1200) {
        console.log("width > 1200");
        if (_branchItemDetailsOpened) {
            _currentItem.find(".detail-bottom-middle-content").removeAttr("style");
            _currentItem.find("#branch-sub-title").attr("style", "left:-46px!Important; display: block;text-align: right;");
        }
    }

    if (width < 1200) {
        console.log("width < 1200");
        if (_branchItemDetailsOpened) {
            _currentItem.find(".details-text").removeAttr("style");
            _currentItem.find(".details-text").attr("style", "height: auto; overflow:hidden; width: 100%; padding-left: 126px;  padding-right: 126px;padding-top:29px;height:100px; display: block;background-color:#6d6d6d;color:#c5c5c5;border-left:solid 1px #41733d;");
            _currentItem.find(".branch-header-right").removeAttr("style");
            _currentItem.find(".branch-header-right").attr("style", "float:right !Important;margin-right:100px;width: 260px;margin-top: 10px;");
            _currentItem.find(".branch-header-right h3").removeAttr("style");
            _currentItem.find(".branch-header-right h3").removeAttr("style", "margin:0px !Important;top:43px !Important;left:65px !Important;text-align: left !Important;width: 197px;");
            _currentItem.find(".branch-close-button").removeAttr("style");
            _currentItem.find(".branch-close-button").attr("style", "right:40px;");
            _currentItem.find(".header-text-h3-slash").attr("style", "left:-36px !Important; display:block; top:3px !Important;");
            _currentItem.find(".branch-item h3 span").removeAttr("style");
            _currentItem.find(".branch-item h3 span").attr("style","");
            _currentItem.find(".branch-header-right h3").find("#branch-sub-title").removeAttr("style");
            _currentItem.find(".branch-header-right h3").find("#branch-sub-title").attr("style", "left:-46px!Important;display: block;text-align: right;");
            var catalog_right_item_container_height = _currentItem.find(".detail-bottom-right-content").height();
            var catalog_left_item_container_height = _currentItem.find(".detail-bottom-left-content").height();
            var first_content_new_height = catalog_right_item_container_height + catalog_left_item_container_height;
            _currentItem.find(".detail-bottom-first-content").attr("style", "height:" + first_content_new_height + "px;");
            _currentItem.find(".detail-bottom-middle-content").attr("style", "border-right:0px;");
            var pdf_container_height = _currentItem.find(".pdf-container").height();
            _currentItem.find(".pdf-container").attr("style", "margin-top:80px;");
        } 
    }

    if (width > 1282) {
        console.log("width > 1282");
        if (_branchItemDetailsOpened) {
            _currentItem.find(".details-text").removeAttr("style");
            _currentItem.find(".details-text").attr("style", "height: 130px;max-width: 600px;padding-left: 40px;display: block;");
            _currentItem.find(".branch-header-right").removeAttr("style");
            _currentItem.find(".branch-header-right").attr("style", "float: left !Important; text-align: right !Important; height: 130px !Important;");
            _currentItem.find(".branch-header-h3").removeAttr("style");
            _currentItem.find(".branch-header-h3").attr("style", "margin: 0px !Important;top: 46px !Important;left: 65px !Important;text-align: left!Important;");
            _currentItem.find(".branch-close-button").removeAttr("style");
            _currentItem.find(".header-text-h3-slash").attr("style", "display:block;");
            _currentItem.find(".branch-item h3 span").removeAttr("style");
            _currentItem.find(".branch-header-right h3").find("#branch-sub-title").removeAttr("style");
            _currentItem.find(".branch-header-right h3").find("#branch-sub-title").attr("style", "margin: 0px !Important;top: 43px !Important;left: 65px !Important;text-align: left!Important;");
            _currentItem.find(".pdf-container").removeAttr("style");
            _currentItem.find(".detail-bottom-first-content").removeAttr("style");
            _currentItem.find(".detail-bottom-middle-content").removeAttr("style");
            _currentItem.find(".detail-bottom-left-content").removeAttr("style");
        }
    }


    if (width > 991) {
        console.log("width > 991");
        if (_branchItemDetailsOpened) {

            _currentItem.find(".branch-header-h3 span:last").removeAttr("style");
            _currentItem.find(".detail-bottom-left-content").removeAttr("style");
            _currentItem.find(".header-text-h3-slash").show();
            _currentItem.find(".bracnch-catalog-hyperlink-item").removeAttr("style");
            $(".horizontal-line1").remove();

           

            _currentItem.find(".detail-bottom-left-content").removeAttr("style");
            _currentItem.find(".detail-bottom-middle-content").removeAttr("style");
            _currentItem.find(".detail-bottom-right-content").removeAttr("style");
            _currentItem.find(".branch-details ul").removeAttr("style");
            $("#btnBranchModalClose").find("img").attr("src", "../../../assets/img/BranchDetailPlus.png");
            $("#myfilter").remove();
        }
    }
    
    if (width < 992) {
        console.log("width < 992");
        if (_branchItemDetailsOpened) {
            _currentItem.find(".branch-header-right").removeAttr("style");
            _currentItem.find(".branch-header-right").attr("style", "width:260px; background-color:transparent; position:absolute; left:35%; -webkit-transform:translateX(-50 %); transform:translateX(-50 %);");
            $("#myfilter").remove();
            var bg = _currentItem.find(".branch-header-left").css('background-image');
            bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");
            _currentItem.find(".branch-item-header").append('<div id="myfilter" style="position:absolute;width:100%;height:100%;background-image:url(' + bg + '); background-repeat: no-repeat; background-color: #3f4148;background-blend-mode: multiply;"></div>');
            _currentItem.find(".branch-header-right").attr("style", "width: 260px; background-color: transparent; position: absolute;left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%); z-index:999;");
            _currentItem.find(".branch-header-h3 span:last").attr("style", "color:#fff;");    
            var catalog_right_item_container_height = _currentItem.find(".detail-bottom-right-content").height();
            var catalog_left_item_container_height = _currentItem.find(".detail-bottom-left-content").height();
            var catalog_middle_item_container_height = _currentItem.find(".detail-bottom-middle-content").height();
            var first_content_new_height = catalog_right_item_container_height + catalog_left_item_container_height + catalog_middle_item_container_height;
            _currentItem.find(".detail-bottom-first-content").attr("style", "height:" + first_content_new_height + "px;");
            _currentItem.find(".detail-bottom-middle-content").attr("style", "border-right:1px;");
            _currentItem.find(".detail-bottom-left-content").attr("style", "border-right:0px;");
            var pdf_container_height = _currentItem.find(".pdf-container").height();
            _currentItem.find(".pdf-container").attr("style", "margin-top:0px;");
            _currentItem.find("#branch-sub-title").removeAttr("style");
            _currentItem.find("#branch-sub-title").attr("style", "left:-46px!Important;display: block;text-align: center;");
            _currentItem.find(".detail-bottom-left-content").attr("style", "padding-left:0px !Important; padding-right:0px !Important; border-right:0px;");
            _currentItem.find(".detail-bottom-middle-content").attr("style", "padding-left:0px !Important; padding-right:0px !Important;  border-right:0px;");
            _currentItem.find(".detail-bottom-right-content").attr("style", "padding-left:0px !Important; padding-right:0px !Important;  border-right:0px;");  
            _currentItem.find(".bracnch-catalog-hyperlink-item").attr("style", "margin:0 auto !Important; width: 200px; !Important;");
            _currentItem.find(".branch-details ul").attr("style", "margin:0 auto !Important; width: 200px; !Important;");   
            _currentItem.find(".header-text-h3-slash").hide();
            _currentItem.find(".details-text").attr("style", "width: 100%; padding-left: 50px; padding-right: 50px; padding-top: 29px; padding-bottom: 29px; height: auto; display: block; background-color: #6d6d6d; color: #c5c5c5; border-left: solid 1px #41733d;")
            $("#btnBranchModalClose").find("img").attr("src", "../../../assets/img/BranchDetailPlus_white.png");
        }
    }

    
    
    if (width < 767) {
        console.log("width < 767");
        if (_branchItemDetailsOpened) {
            $(".detail-bottom-first-content").attr("style", "height: 132px; min-height: 132px; border-right: 0px !Important; margin-bottom: 32px;");
        }
    }

    if (width <= 767) {
        console.log("width <= 767");
        if (_branchItemDetailsOpened) {
            $(".detail-bottom-first-content").attr("style", "height: 132px; min-height: 132px; border-right: 0px !Important; margin-bottom: 32px;");
            $(".horizontal-line1").remove();
            _currentItem.find(".pdf-container").after("<hr class='horizontal-line1' style='width:200px;margin:0 auto;margin-top: 20px;  border-bottom: solid 1px #cccccc;'/>");
        }
    }    
}