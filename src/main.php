<?php
namespace Phppot;
require_once __DIR__ . '/DataSource.php';
$ds = new DataSource();
require "loginheader.php";
include('menu.php');


//   $query0 = "  select   
//                 (select  count(1) from households where status_id in (4,5,6)) productionHH,
//             	(select  count(1) from households where status_id in (4,5,6) and religion_id in  (1,2,6,7,9,999)) /(select  count(1) from households where status_id in (4,5,6))*100 muslim,
//                 (select  count(1) from households where status_id in (4,5,6) and religion_id in  (3,4,5,8))/(select  count(1) from households where status_id in (4,5,6))*100 christian 
//               from dual  " ;
//     $zResult0 = $ds->select($query0);
  
//         foreach ($zResult0 as $HHData) {
//          $HHData["productionHH"] ;
//          $HHData["muslim"] ;
//          $HHData["christian"] ;
//   }

  
//   $query = "   select
//               (select   count(1)  from tasks where task_type_id = 5 and closed_by = 0) openIncentiveCall
//               , (select   count(1)  from tasks where task_type_id = 5 and closed_by <>  0) closedIncentiveCall
//               ,(select   count(1)  from tasks where task_type_id = 5 and closed_by <> 0)
//               /(select   count(1)  from tasks where task_type_id = 5)*100 PercentIncentiveCall
              
//               , (select   count(1)  from tasks where task_type_id = 4 and closed_by = 0) openIncentiveDelivery
//               , (select   count(1)  from tasks where task_type_id = 4 and closed_by <>  0) closedIncentiveDelivery
//               ,(select   count(1)  from tasks where task_type_id = 4 and closed_by <> 0)
//               /(select   count(1)  from tasks where task_type_id = 4)*100 PercentIncentiveDelivery
               

//               , (select   count(1)  from tasks where task_type_id = 14 and closed_by = 0) openIncentiveCallR2
//               , (select   count(1)  from tasks where task_type_id = 14 and closed_by <>  0) closedIncentiveCallR2
//               ,(select   count(1)  from tasks where task_type_id = 14 and closed_by <> 0)
//               /(select   count(1)  from tasks where task_type_id = 14)*100 PercentIncentiveCallR2
              
//               , (select   count(1)  from tasks where task_type_id = 15 and closed_by = 0) openIncentiveDeliveryR2
//               , (select   count(1)  from tasks where task_type_id = 15 and closed_by <>  0) closedIncentiveDeliveryR2
//               ,(select   count(1)  from tasks where task_type_id = 15 and closed_by <> 0)
//               /(select   count(1)  from tasks where task_type_id = 15)*100 PercentIncentiveDeliveryR2

//                 , (select   count(1)  from tasks where task_type_id = 8 and closed_by = 0) openCoincidential
//               from dual " ;
//   $zResult = $ds->select($query);
  
//   foreach ($zResult as $quotaData) {
//          $quotaData["openIncentiveCall"];
//          $quotaData["closedIncentiveCall"];
//          $quotaData["PercentIncentiveCall"];
      
//          $quotaData["openIncentiveDelivery"];
//          $quotaData["closedIncentiveDelivery"];
//          $quotaData["PercentIncentiveDelivery"];
         
//          $quotaData["openIncentiveCallR2"];
//          $quotaData["closedIncentiveCallR2"];
//          $quotaData["PercentIncentiveCallR2"];
         
//          $quotaData["openIncentiveDeliveryR2"];
//          $quotaData["closedIncentiveDeliveryR2"];
//          $quotaData["PercentIncentiveDeliveryR2"];
         
      
//          $quotaData["openCoincidential"];
 
      
      
//   }
  

$dataPoints2 = array();

$dataPoints6 = array();
$DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
$DBconnect->set_charset("utf8");
$sql = " select count(1)  as y,  tt.name as zname    , t.closed_by as closed, group_concat(h.id) ids
              from tasks t, households h, task_types tt
              where h.status_id in (4,5,6)
              and  h.id = t.household_id
              and tt.id = t.task_type_id
             /* and t.closed_by = 0*/
              and t.task_type_id in (5,4,14,15,16,17,19,20)
              group by task_type_id, closed_by
             order by tt.sortId;";

// echo $sql;

$query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getHHGifts...  ". $sql);


 
 

while ($row = mysqli_fetch_array($query)) {  // preparing an array
    if ( $row["closed"] == 0)
    {
        array_push($dataPoints2, array("label"=> $row["zname"], "y"=> $row["y"],"z"=> $row["ids"]));
    }
    else
    {
        array_push($dataPoints6, array("label"=> $row["zname"], "y"=> $row["y"],"z"=> $row["ids"]));
    }
}
 
 
 

 
 

?>
  

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Field Managment</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  
      <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="ds/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="ds/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="ds/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="ds/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="ds/assets/css/jquery.mCustomScrollbar.css">
    

</head>
 
   <!-- Required Jquery -->
   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="ds/assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="ds/assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="ds/assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="ds/assets/js/bootstrap/js/bootstrap.min.js"></script>
 



</body>


</html>


<?php
 

?>
 
<html>
<head>  

<script>

window.onload = function () {
 
	var chart = new CanvasJS.Chart("chartContainer", { 
		theme: "light2",
		title: {
			text: "Chart of Incentives from Round 1 to Round 4"
		},
		subtitles: [{
			text: "HH"
		}],
		legend:{
			cursor: "pointer",
			itemclick: toggleDataSeries
		},
		toolTip: {
			shared: true
		},
		data: [{
			type: "stackedArea",
			name: "Coal",
			showInLegend: true,
			visible: false,
			yValueFormatString: "#,##0 HH",
			dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedArea",
			name: "Remaining",
			showInLegend: true,
			yValueFormatString: "#,##0 HH",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedArea",
			name: "Natual Gas",
			showInLegend: true,
			visible: false,
			yValueFormatString: "#,##0 GWh",
			dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedArea",
			name: "Nuclear",
			showInLegend: true,
			visible: false,
			yValueFormatString: "#,##0 GWh",
			dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedArea",
			name: "Hydroelectric",
			showInLegend: true,
			visible: false,
			yValueFormatString: "#,##0 GWh",
			dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedArea",
			name: "Closed",
			showInLegend: true,
			yValueFormatString: "#,##0 HH",
			dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
		}]
	});
	 
	chart.render();
	 
	function toggleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		}
		else{
			e.dataSeries.visible = true;
		}
		chart.render();
	}



	var chart2 = new CanvasJS.Chart("chartContainer2", {
		animationEnabled: true,
		theme: "light2",
		title: {
			text: "Cyle of Closed HH Incentives"
		},
		subtitles: [{
			text: " HH"
		}],
		data: [{
			type: "doughnut",
			yValueFormatString: "#,##0",
			indexLabel: "{label}: {y} HH",
			toolTipContent: "{y} ",
			dataPoints :<?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart2.render();


	var chart3 = new CanvasJS.Chart("chartContainer3", {
		animationEnabled: true,
		theme: "light2",
		title: {
			text: "Cyle of Open HH Incentives"
		},
		subtitles: [{
			text: " HH"
		}],
		data: [{
			type: "doughnut",
			yValueFormatString: "#,##0",
			indexLabel: "{label}: {y} HH",
			toolTipContent: "{y}",
			dataPoints :<?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart3.render();

}


 
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div class="split"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   