 
<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>

<h1>Render Data From Database hiii</h1>
<?php 
error_reporting(E_ERROR | E_PARSE);
const  HOST = '192.168.108.29';

const USERNAME = 'umshinidba';

const PASSWORD = '112358:112358';

const DATABASENAME = 'umshini_bo';//cati_lebanon
$conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASENAME);
if (!$conn) {
    
    die('<div class="alert alert-danger" style="margin:1%;">Could not connect to the database. Set Database Username and Password in the file "/how-to/data-from-database.php"</div>');
}
$selected_database = mysqli_select_db($conn,DATABASENAME);
if (!$selected_database) {
    die('<div class="alert alert-danger" style="margin:1%;">Required database does not exist. Please import the canvasjs_db.sql file in the downloaded zip package '
            . '(<a href="https://www.digitalocean.com/community/tutorials/how-to-import-and-export-databases-and-reset-a-root-password-in-mysql" target="_blank">Instructions to Import.</a>).</div>');
}
$query = "select * from users";
$data = mysqli_query($conn, $query);
$dataPoints = array();
while ($row = mysqli_fetch_array($data, MYSQL_ASSOC)) {
    array_push($dataPoints, $row);
}
?>
<div id="chartContainer"></div>

<script type="text/javascript">
$(function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        zoomEnabled: true,
        animationEnabled: true,
        title: {
            text: "Line Chart with Data-Points from DataBase"
        },
        data: [
        {
            type: "line",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }
        ]
    });
    chart.render();
});
</script>

<?php include '../footer.php'; ?>