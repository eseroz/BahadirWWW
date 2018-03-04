<?php

    require 'gapi.class.php';
    $gaEmail    = "analitik@valid-kayak-142107.iam.gserviceaccount.com";
    $p12Pass    = "2120dfde507c.p12";
    $profileId  = '128229581';
    $baslangic  = '2015-06-03';
    $bitis 	    = '2015-07-03';
    $dimensions = array('date');
    $metrics    = array('visits','pageviews');
    $sortMetric	= null;
    $filter		= null;

    $ga = new gapi($gaEmail,$p12Pass);

    $ulkeler = $ga->requestReportData($profileId,array('CountryISOCode'),array('pageviews','visits'));
    $sehirler = $ga->requestReportData($profileId,array('City'),array('pageviews','visits'));
    $ga->requestReportData($profileId,$dimensions,$metrics,$sortMetric,$filter,$baslangic,$bitis);


?>


<div class="row">
    <div class="col s12">
        <div class="page-title">Dashboard</div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div id="mapBox">
                    <div id="up" class="highcharts-button"></div>
                    <div class="selector">
                        <select id="mapDropdown"></select>
                    </div>
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<link rel="stylesheet" href="/panel/assets/plugins/hightcharts/css/map.css" />
<script src="/panel/assets/plugins/hightcharts/js/highmaps.js"></script>
<script src="/panel/assets/plugins/hightcharts/js/index.js?1"></script>
<script src="/panel/assets/plugins/hightcharts/js/theme.js"></script>
<script>


    harita();


            
    function harita(){

       $(".selector").hide();

        var baseMapPath = "http://code.highcharts.com/mapdata/",
                showDataLabels = false,
                mapCount = 0,
                searchText,
                mapOptions = '';
        $.each(Highcharts.mapDataIndex, function (mapGroup, maps) {
            if (mapGroup !== "version") {
                mapOptions += '<option class="option-header">' + mapGroup + '</option>';
                $.each(maps, function (desc, path) {
                    mapOptions += '<option value="' + path + '">' + desc + '</option>';
                    mapCount += 1;
                });
            }
        });
        searchText = 'Search ' + mapCount + ' maps';
        mapOptions = '<option value="custom/world.js">' + searchText + '</option>' + mapOptions;
        $("#mapDropdown").append(mapOptions);
        $("#mapDropdown").change(function () {
            var $selectedItem = $("option:selected", this),
                mapDesc = $selectedItem.text(),
                mapKey = this.value.slice(0, -3),
                svgPath = baseMapPath + mapKey + '.svg',
                geojsonPath = baseMapPath + mapKey + '.geo.json',
                javascriptPath = baseMapPath + this.value,
                isHeader = $selectedItem.hasClass('option-header');

            if (mapDesc === searchText || isHeader) {
                $('.custom-combobox-input').removeClass('valid');
                location.hash = '';
            } else {
                $('.custom-combobox-input').addClass('valid');
                location.hash = mapKey;
            }
            if (isHeader) { return false; }
            if ($("#container").highcharts()) {
                $("#container").highcharts().showLoading('<i class="fa fa-spinner fa-spin fa-2x"></i>');
            }
            function mapReady() {
                var mapGeoJSON = Highcharts.maps[mapKey], data = [], parent, match;
                $.each(mapGeoJSON.features, function (index, feature) {
                    data.push({
                        key: feature.properties['hc-key'],
                        value: 0,
                        name:feature.properties['name'],
                        grup:feature.properties['hc-group']
                    });
                });

			<?php foreach($sehirler as $result): ?>
                bolgeVeriAta("<?php echo strtolower($result) ?>",<?php echo $result->getVisits() ?>);
			<?php endforeach ?>

			<?php foreach($ulkeler as $result): ?>
                bolgeVeriAta("<?php echo strtolower($result) ?>",<?php echo $result->getVisits() ?>);
			<?php endforeach ?>

                function bolgeVeriAta(bolge_kodu, deger){
                    var s_result = $.grep(data, function (e)  {
                        if(e.name!=null){ return e.name.toLowerCase() == bolge_kodu  }
                    });
                    if(s_result[0]!=null) s_result[0].value=deger;

                    var h_result = $.grep(data, function (e) { if(e.key!=null){ return e.key == bolge_kodu}});
                    if(h_result[0]!=null) h_result[0].value=deger;
                }

                match = mapKey.match(/^(countries\/[a-z]{2}\/[a-z]{2})-[a-z0-9]+-all$/);
                if (/^countries\/[a-z]{2}\/[a-z]{2}-all$/.test(mapKey)) {
                    parent = { desc: 'Yukarı', key: 'custom/world' };
                } else if (match) {
                    parent = {
                        desc: "Yukarı", key: match[1] + '-all'
                    };
                }

                $('#up').html('');
                if (parent) {
                    $('#up').append(
                        $('<a><i class="fa fa-angle-up btn btn-inverse bold"><span class="glyphicons glyphicons-message-forward"></span></i></a>').click(function () {
                            $('#mapDropdown').val(parent.key + '.js').change();
                        }));
                }

                $("#container").highcharts('Map', {
                    title: { text: null },
                    mapNavigation: { enabled: true },
                    colorAxis: { min: 0, stops: [[0, '#EFEFFF'],[0.5, Highcharts.getOptions().colors[0]],[1, Highcharts.Color(Highcharts.getOptions().colors[0]).brighten(-0.5).get()]]},
                    legend: {layout: 'vertical', align: 'left', verticalAlign: 'bottom'},
                    series: [{ data: data, mapData: mapGeoJSON, joinBy: ['hc-key', 'key'], name: 'Bolge',
                        states: { hover: { color: Highcharts.getOptions().colors[2] }},
                        dataLabels: { enabled: showDataLabels, formatter: function () {
                            return mapKey === 'custom/world' || mapKey === 'countries/us/us-all' ? (this.point.properties && this.point.properties['hc-a2']) : this.point.name; }
                        },
                        point: {
                            events: {
                                click: function () {
                                    var key = this.key;
                                    var name = this.name;
                                    var grup = this.grup;
                                    $('#mapDropdown option').each(function () {
                                        if (this.value === 'countries/' + key.substr(0, 2) + '/' + key + '-all.js') {
                                            $('#mapDropdown').val(this.value).change();
                                        }
                                    });	}}}
                    }, {
                        type: 'mapline',
                        name: "Separators",
                        data: Highcharts.geojson(mapGeoJSON, 'mapline'),
                        nullColor: 'gray',
                        showInLegend: false,
                        enableMouseTracking: false
                    }]
                });
                showDataLabels = $("#chkDataLabels").attr('checked');
            }
            if (Highcharts.maps[mapKey]) {
                mapReady();
            } else {
                $.getScript(javascriptPath, mapReady);
            }
        });
        $("#chkDataLabels").change(function () {
            showDataLabels = $("#chkDataLabels").attr('checked');
            $("#mapDropdown").change();
        });
        $("#btn-prev-map").click(function () {
            $("#mapDropdown option:selected").prev("option").prop("selected", true).change();
        });
        $("#btn-next-map").click(function () {
            $("#mapDropdown option:selected").next("option").prop("selected", true).change();
        });
        if (location.hash) {
            $('#mapDropdown').val(location.hash.substr(1) + '.js');
        } else {
            $($('#mapDropdown option')[0]).attr('selected', 'selected');
        }
        showDataLabels = $("#chkDataLabels").attr('checked');
        $('#mapDropdown').change();
    };
</script>