<link href="/assets/css/Resolution/Iletisim.css" rel="stylesheet" />
<script src="/assets/js/Iletisim.js"></script>
<style>
    #footerIletisimContainer {
        display: none;
    }
</style>
<div class="contactInformationTitleGeneralContainer">
    <div class="siteContainer">
        <div class="contactInformationTitleGeneralContainerLeft">
            <div class="contactInformationTitle"><?php echo $bahadir->TRANSLATE_WORD("İLETİŞİM"); ?></div>
            <div class="contactInformationTitleSubLine"></div>
            <div class="clear"></div>
            <div class="contactInformationMenuContainerFirmaTitle"><?php echo $bahadir->TRANSLATE_WORD($SETTINGS["COMPANY_NAME_LONG"]); ?></div>
            <div class="clear"></div>
            <div class="contactInformationMenuContainerFirmaAdres"><?php echo $bahadir->TRANSLATE_WORD($SETTINGS["ADDRESS"]); ?></div>
            <div class="contactInformationMenuContainerFirmaAdres"><?php echo $bahadir->TRANSLATE_WORD($SETTINGS["ADDRESS2"]);  ?></div>
            <div class="contactInformationMenuContainerFirmaAdres contactInformationMenuContainerFirmaTel">Tel : <?php echo $SETTINGS["PHONE"]; ?></div>
            <div class="contactInformationMenuContainerFirmaAdres">Fax : <?php echo $SETTINGS["FAX"]; ?></div>
            <div class="contactInformationMenuContainerFirmaAdres contactInformationMenuContainerFirmaTel"><?php echo $SETTINGS["EMAIL"]; ?></div>
        </div>
        <div class="contactInformationTitleGeneralContainerRight">
            <div class="bayilikItemContainer">
                <div class="bayilikItemBanner">
                    <?php echo $bahadir->TRANSLATE_WORD("YURTDIŞI BÖLGE BAYİLİKLERİ"); ?>
                </div>              

                <select class="drp_bayilik" id="drp_yurtDisiList" name="drp_yurtDisiList">
                    <?php
                    $YURTDISI_BOLGELER = $bahadir->mssqlDb->Select("SELECT REGION,COMPANY_NAME,ADRESS,ADRESS2,PHONE,FAX,EMAIL,WWW FROM site.DEALERS WHERE ABROAD = 1");
                    foreach ($YURTDISI_BOLGELER as $BOLGE)
                    {                   
                    ?>
                    <option value="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["REGION"]); ?>" COMPANY_NAME="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["COMPANY_NAME"]); ?>" ADRESS="<?php echo $BOLGE["ADRESS"]; ?>" ADRESS2="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["ADRESS2"]); ?>" PHONE="<?php echo $BOLGE["PHONE"]; ?>" FAX="<?php echo $BOLGE["FAX"]; ?>" EMAIL="<?php echo $BOLGE["EMAIL"]; ?>" WWW="<?php echo $BOLGE["WWW"]; ?>"><?php echo $bahadir->TRANSLATE_WORD($BOLGE["REGION"]); ?></option>
                    <?php
                    }
                    ?>
                </select>
               
                <div class="bayilikItem">
                    <div class="bayilikItemTitle" id="lbl_yurtDisiFirmaAdi"></div>
                    <div class="bayilikItemAdres" id="lbl_yurtDisiAdres"></div>
                    <div class="clear"></div>
                    <div class="bayilikItemTel">Tel: <span id="lbl_yurtDisiTel"></span></div>
                    <div class="bayilikItemTel">Fax: <span id="lbl_yurtDisiFax"></span></div>
                    <div class="bayilikItemTel"><span id="lbl_yurtDisiEMail"></span></div>
                    <div class="bayilikItemTel"><span id="lbl_yurtDisiWeb"></span></div>
                </div>
            </div>
            <div class="bayilikItemContainerRight">
                <div class="bayilikItemBanner">                    
                    <?php echo $bahadir->TRANSLATE_WORD("YURTİÇİ BÖLGE BAYİLİKLERİ"); ?>
                </div>
                
                <select class="drp_bayilik" id="drp_yurtIciList" name="drp_yurtIciList">
                   <?php

                   $YURTICI_BOLGELER =  $bahadir->mssqlDb->Select("SELECT REGION,COMPANY_NAME,ADRESS,ADRESS2,PHONE,FAX,EMAIL,WWW FROM site.DEALERS WHERE ABROAD = 2");
                   foreach ($YURTICI_BOLGELER as $BOLGE)
                   {                   
                   ?>
                    <option value="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["REGION"]); ?>" COMPANY_NAME="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["COMPANY_NAME"]); ?>" ADRESS="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["ADRESS"]); ?>" ADRESS2="<?php echo $bahadir->TRANSLATE_WORD($BOLGE["ADRESS2"]); ?>" PHONE="<?php echo $BOLGE["PHONE"]; ?>" FAX="<?php echo $BOLGE["FAX"]; ?>" EMAIL="<?php echo $BOLGE["EMAIL"]; ?>" WWW="<?php echo $BOLGE["WWW"]; ?>"><?php echo $bahadir->TRANSLATE_WORD($BOLGE["REGION"]); ?></option>
                    <?php
                   }
                    ?>
                </select>

                <div class="bayilikItem">
                    <div class="bayilikItemTitle" id="lbl_yurtIciFirmaAdi"></div>
                    <div class="bayilikItemAdres" id="lbl_yurtIciAdres"></div>
                    <div class="clear"></div>
                    <div class="bayilikItemTel">Tel: <span id="lbl_yurtIciTel"></span></div>
                    <div class="bayilikItemTel">Fax: <span id="lbl_yurtIciFax"></span></div>
                    <div class="bayilikItemTel"><span id="lbl_yurtIciEMail"></span></div>
                    <div class="bayilikItemTel"><span id="lbl_yurtIciWeb"></span></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        var mapOptions = {
            scrollwheel: false,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: false,
            //draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 11,
            center: new google.maps.LatLng(41.238883, 36.434977),
            title: '<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["COMPANY_NAME_LONG"]); ?>',
            aciklama: '<?php echo $bahadir->TRANSLATE_WORD($SETTINGS["MARKER_DETAILS"]); ?>',
            styles: [
                { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#a6a6a0" }, { "lightness": 17 }] },
                { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] },
                { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#909090" }, { "lightness": 17 }] },
                { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] },
                { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#909090" }, { "lightness": 18 }] },
                { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] },
                { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] },
                { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] },
                { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] },
                { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] },
                { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] },
                { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] },
                { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] },
                { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }]
        };
        var infoWindow = new google.maps.InfoWindow();
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(41.238883, 36.434977),
            map: map,
            icon: 'assets/img/maps-icon.png',
            title: mapOptions.title,
            aciklama: mapOptions.aciklama,
        });
        (function (marker, mapOptions) {
            google.maps.event.addListener(marker, "mouseover", function (e) {
                infoWindow.setContent("<div><strong>" + mapOptions.title + "</strong><p style='display:block'>" + mapOptions.aciklama + "</p></div>");
                infoWindow.open(map, marker);
            });
        })(marker, mapOptions);
    }
</script>
<div id="map">

</div>
<div class="clear"></div>

<script>
    $(document).ready(function () {
                    
    $("#drp_yurtDisiList").change(function () {
        $("#lbl_yurtDisiFirmaAdi").html($(this).find("option:selected").attr("COMPANY_NAME"));
        $("#lbl_yurtDisiAdres").html($(this).find("option:selected").attr("ADRESS") + " " + $(this).find("option:selected").attr("ADRESS2"));                     
        $("#lbl_yurtDisiTel").html($(this).find("option:selected").attr("PHONE"));
        $("#lbl_yurtDisiFax").html($(this).find("option:selected").attr("FAX"));
        $("#lbl_yurtDisiEMail").html($(this).find("option:selected").attr("EMAIL"));
        $("#lbl_yurtDisiWeb").html($(this).find("option:selected").attr("WWW"));
    });

    $("#drp_yurtIciList").change(function () {
        $("#lbl_yurtIciFirmaAdi").html($(this).find("option:selected").attr("COMPANY_NAME"));
        $("#lbl_yurtIciAdres").html($(this).find("option:selected").attr("ADRESS") + " " + $(this).find("option:selected").attr("ADRESS2"));                            
        $("#lbl_yurtIciTel").html($(this).find("option:selected").attr("PHONE"));
        $("#lbl_yurtIciFax").html($(this).find("option:selected").attr("FAX"));
        $("#lbl_yurtIciEMail").html($(this).find("option:selected").attr("EMAIL"));
        $("#lbl_yurtIciWeb").html($(this).find("option:selected").attr("WWW"));
    });

    $("#drp_yurtDisiList, #drp_yurtIciList").trigger("change");
});
</script>