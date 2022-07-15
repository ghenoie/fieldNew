<?php
namespace Phppot;
error_reporting(E_ALL);
require_once __DIR__ . '/DataSource.php';
 
if(!ob_start('ob_gzhandler'))
	ob_start();
	
header('Content-Type: text/html; charset=utf-8');

if (isset($_SESSION['userRole']))
{
 $userRole = $_SESSION['userRole'];
}
?>

<html>
 <?php 
 require "loginheader.php"; 
 include('menu.php');
 ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css"/>
 
<!-- scripts -->
<script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src='./js/functions.js' type='text/javascript'></script>

<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="assets/js/datatables.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/jszip.min.js"></script>
<script src="assets/fonts/pdfmake.min.js"></script>
<script src="assets/fonts/vfs_fonts.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
</head>
  <!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/data/countries2.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

window.onload = function() {

/**
 * This demo uses our own method of determining user's location
 * It is not public web service that you can use
 * You'll need to find your own. We recommend http://www.maxmind.com
 */
 

  // Default map
  var defaultMap = "usaAlbersLow";
  
  // calculate which map to be used
  var currentMap = defaultMap;
  var title = "";
  if ( am4geodata_data_countries2[ 'LB' ] !== undefined ) {
    currentMap = am4geodata_data_countries2[ 'LB' ][ "maps" ][ 0 ];

    // add country title
    if ( am4geodata_data_countries2[ 'LB' ][ "country" ] ) {
      title = am4geodata_data_countries2[ 'LB' ][ "country" ];
    }

  }
  
  // Create map instance
  var chart = am4core.create("chartdiv", am4maps.MapChart);
  
  chart.titles.create().text = title;

  // Set map definition
  chart.geodataSource.url = "https://www.amcharts.com/lib/4/geodata/json/lebanonLow.json";
  chart.geodataSource.events.on("parseended", function(ev) {
    var data = [];
    for(var i = 0; i < ev.target.data.features.length; i++) {
        console.log(ev.target.data.features[i].properties.name);
      data.push({
        id: ev.target.data.features[i].id,
        value: 44
      })
    }
    polygonSeries.data = data;
  })

  // Set projection
  chart.projection = new am4maps.projections.Mercator();

  // Create map polygon series
  var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

  //Set min/max fill color for each area
  polygonSeries.heatRules.push({
    property: "fill",
    target: polygonSeries.mapPolygons.template,
    min: chart.colors.getIndex(1).brighten(1),
    max: chart.colors.getIndex(1).brighten(-0.3)
  });

  // Make map load polygon data (state shapes and names) from GeoJSON
  polygonSeries.useGeodata = true;

  // Set up heat legend
  let heatLegend = chart.createChild(am4maps.HeatLegend);
  heatLegend.series = polygonSeries;
  heatLegend.align = "right";
  heatLegend.width = am4core.percent(25);
  heatLegend.marginRight = am4core.percent(4);
  heatLegend.minValue = 0;
  heatLegend.maxValue = 40000000;
  heatLegend.valign = "bottom";

  // Set up custom heat map legend labels using axis ranges
  var minRange = heatLegend.valueAxis.axisRanges.create();
  minRange.value = heatLegend.minValue;
  minRange.label.text = "low coverate";
  var maxRange = heatLegend.valueAxis.axisRanges.create();
  maxRange.value = heatLegend.maxValue;
  maxRange.label.text = "High coverage";

  // Blank out internal heat legend value axis labels
  heatLegend.valueAxis.renderer.labels.template.adapter.add("text", function(labelText) {
    return "";
  });

  // Configure series tooltip
  var polygonTemplate = polygonSeries.mapPolygons.template;
  polygonTemplate.tooltipText = "{name}: {value}";
  polygonTemplate.nonScalingStroke = true;
  polygonTemplate.strokeWidth = 0.5;

  // Create hover state and set alternative fill color
  var hs = polygonTemplate.states.create("hover");
  hs.properties.fill = chart.colors.getIndex(1).brighten(-0.5);
  
 

};

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
 </html>