 
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './content.php'; ?>

<h1>Incentives</h1>
<?php 
 
//address of the server where db is installed
$servername = "192.168.108.29";

//username to connect to the db
//the default value is root
$username = "umshinidba";

//password to connect to the db
//this is the value you would have specified during installation of WAMP stack
$password = "112358:112358";

//name of the db under which the table is created
$dbName = "umshini_bo";

//establishing the connection to the db.
$conn = new mysqli($servername, $username, $password, $dbName);

//checking if there were any error during the last connection attempt
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//the SQL query to be executed
$query = "   select  (xx.amount) label , count(xx.household_id) y
from(
select sum(x.amount) amount, x.household_id
from (
select 
case when gift_id = 9 and ticket_count = 2 then 200000 else ss.amount end amount,  household_id
  from households_gifts hg, gifts ss
  where hg.gift_id = ss.id
  and gift_id in (9,10)
  )x
   group by household_id )xx  
group by xx.amount
";

//storing the result of the executed query
$result = $conn->query($query);
$dataPoints = array();
//initialize the array to store the processed data
$jsonArray = array();

//check if there is any data returned by the SQL Query
if ($result->num_rows > 0) {
    //Converting the results into an associative array
    while($row = $result->fetch_assoc()) {
         array_push($dataPoints, $row);
      
    }
}


//Closing the connection to DB
$conn->close();

//set the response content type as JSON
header('Content-type: application/json');
//output the return value of json encode using the echo function.
echo json_encode($jsonArray);
?>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<script type="text/javascript">
$(function () {
//     var chart = new CanvasJS.Chart("chartContainer", {
//         theme: "light2",
//         zoomEnabled: true,
//         animationEnabled: true,
//         title: {
//             text: "Line Chart with Data-Points from DataBaseeee"
//         },
//         data: [
//         {
//             type: "line",
           
//         }
//         ]
//     });
//     chart.render();
            var chart = new CanvasJS.Chart("chartContainer", {
            	animationEnabled: true,
            	
            	title:{
            		text:"Incentive Amount per Household"
            	},
            	axisX:{
            		interval: 1
            	},
            	axisY2:{
            		interlacedColor: "rgba(1,77,101,.2)",
            		gridColor: "rgba(1,77,101,.1)",
            		title: ""
            	},
            	data: [{
            		type: "bar",
            		name: "companies",
            		axisYType: "secondary",
            		color: "#014D65",
            		 dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            	}]
            });

            chart.render();
});
</script>

<?php include '../footer.php'; ?>