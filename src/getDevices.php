 <?php
$servername = "192.168.108.29";
$username = "umshinidba";
$password = "112358:112358";
$dbname = "umshini_bo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$return_arr = array();
 
 
$sql = "select hh.id, hh.governorate_id,hh.district_id, hh.region_id, hh.income_level_id, hh.religion_id,hh.count_members,hh.count_members, 
    ts.room_id ,
    ts.brand_id ,
    ts.brand_txt ,
    ts.model_numb ,
    ts.screen_type_id ,
    ts.hd_enabled ,
    ts.tv_3d_enabled ,
    ts.tvm_serial ,
    ts.tvm_sim_serial ,
    ts.mic ,
    ts.power_socket ,
    ts.optical_audio_adapter ,
    ts.audio_relay ,
    ts.scart_adapter ,
    ts.extension_usb ,
    ts.jack_to_jack ,
    ts.multiple_outlet ,
    ts.created_at ,
    ts.updated_at ,
    ts.tvset_reception_level_id , tvs.date_of_visit
 from tvsets ts, tvset_by_visit tvv , tech_orders ot,tech_visits tvs , households hh
where ot.id = tvs.tech_order_id
and ot.household_id  = tvv.household_id
and ts.household_id = ot.household_id
and ts.id = tvv.tvset_id
and tvs.id = tvv.visit_id
and hh.id = ts.household_id
and hh.id = ot.household_id
and tvs.prob_detected_id = 1 and ot.tech_order_type_id = 1
and tvv.worked_on = 1;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
	  $row_array[] = array(  $row ) ;
       
    }
} 
 
echo json_encode($row_array);
mysqli_close($conn);
?>