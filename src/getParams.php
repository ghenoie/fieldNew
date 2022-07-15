 <?php
 $servername = "192.168.108.29"; //"213.175.191.126";
$username = "umshinidba";
$password = "112358:112358";
$dbname = "umshini_bo";
$reporting_date = $_GET['reporting_date'];
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
function getCodes($rowID,$conn)
{
    $sqlval = "SELECT  distinct char_dbname, value_code, value_label FROM param_details where char_dbname = '".$rowID."'  order by value_code asc	;";
    $resultval = mysqli_query($conn, $sqlval);
    if (mysqli_num_rows($resultval) > 0) {
        while($rowval = mysqli_fetch_assoc($resultval)) {
            $tvm[]=  array('code' => $rowval['value_code'],
                'label' => $rowval['value_label']
            ) ;
            
        }
    }
    return $tvm;
}


 $sql = " select distinct char_id, char_label, char_dbname, type from param_details  where '". $reporting_date."' between  date_format(start_date, '%Y%m%d') and  date_format(end_date, '%Y%m%d') ";
 $resultd = mysqli_query($conn, $sql);
if (mysqli_num_rows($resultd) > 0)   
 {
    $tvmx[] = null;
    while($rowd = mysqli_fetch_assoc($resultd)) {
		
		
	   	$sql = "SELECT  distinct char_dbname, char_id, char_label, type, end_date FROM param_details where char_dbname = '".$rowd['char_dbname']."'  ;";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			    
			    if ( $row['type'] != "list")
			    {
			         $row_array[]   = array(  'char_id' => $row['char_id'],
			            'char_code' => $row['char_dbname'],
			            'char_label' => $row['char_label'],
			            'type' => $row['type'],
			            'reporting_date' => $_GET['reporting_date'],
			            'values' => null
			        )    ;
			        
			    }
			    else 
			    {
			   $row_array[]   = array(  'char_id' => $row['char_id'],
			                                               'char_code' => $row['char_dbname'],
														 'char_label' => $row['char_label'],
														 'type' => $row['type'],
														 'reporting_date' => $_GET['reporting_date'],
			                                             'values' => getCodes($row['char_dbname'],$conn)
												 )    ;
			   
			    }
												
 
			}
		}
	} 
} 
echo json_encode($row_array);
mysqli_close($conn);
?>

