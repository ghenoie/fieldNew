<?php
$servername = "192.168.108.29"; // "213.175.191.126";
$username = "umshinidba";
$password = "112358:112358";
$dbname = "umshini_bo";
$reporting_date = $_GET['reporting_date'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$return_arr = array();

function getTVM($rowID,$conn)
{
                $sqlval = "SELECT  tvsets.*,  (select value_code from param_details where char_id = 10 and original_code = tvsets.room_id) room
                                                                                from tvsets  where household_id  = ".$rowID." and tvset_status_id = 2 ;";
                                                        $resultval = mysqli_query($conn, $sqlval);
                                                        if (mysqli_num_rows($resultval) > 0) {
                                                                while($rowval = mysqli_fetch_assoc($resultval)) {
                                                                        $tvm[]=  array('id' => $rowval['id'],
                                                                         'room' => is_null($rowval['room'])? "0" : $rowval['room'],
                                                                         'tvm_serial' => is_null($rowval['tvm_serial'])? "0" : $rowval['tvm_serial']
                                                                  ) ;

                                                                        }
                                                                }
                                                                return $tvm;
}

$sql = "select  hh.id hhId
,(select value_code from param_details where char_id = 1 and original_code = hh.governorate_id) governorate
,(select value_code from param_details where char_id = 2 and original_code = hh.district_id) district
,(select value_code from param_details where char_id = 4 and original_code = hh.religion_id) religion
,(select value_code from param_details where char_id = 5 and original_code = hh.income_level_id) incomeLevel
,(select value_code from param_details where char_id = 6 and original_code = hh.reception_level_id) receptionLevel
,(select value_code from param_details where char_id = 7 and original_code = hh.social_class_id) socialClass
,(select count(id) from members where household_id = hh.id and member_status_id =2 and relation_id not in (27)) familySize
,(count(ss.id) ) TvSetNb

from households hh ,tvsets ss
where hh.id =  ss.household_id
and ss.tvset_status_id = 2
and exists (   select 1
          from household_status hss
      where hss.household_id=  hh.id
        AND  hss.updated_at = (select max(updated_at) from household_status xx where xx.household_id= hss.household_id  )
      and hss.status_id = 6
      )
 and '". $reporting_date."' >= (select max(date_format(updated_at, '%Y%m%d')) from household_status hss where hss.household_id= hh.id)  group by hh.id,hh.status_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
                                                        $row_array[] = array( 'HHId' => $row['hhId'],
                                                        'governorate' => is_null($row['governorate'])? "0" : $row['governorate'],
                                                        'district' => is_null($row['district'])? "0" : $row['district'],
                                                        'religion' => is_null($row['religion'])? "0" : $row['religion'],
                                                        'income_level' => is_null($row['incomeLevel'])? "0" : $row['incomeLevel'],
                                                        'reception_level' => is_null($row['receptionLevel'])? "0" : $row['receptionLevel'],
                                                        'social_class' => is_null($row['socialClass'])? "0" : $row['socialClass'],
                                                        'family_size' => is_null($row['familySize'])? "0" : $row['familySize'],
                                                        'tvset_nb' => is_null($row['TvSetNb'])? "0" : $row['TvSetNb'],
                                                         'TVMeter' => getTVM( $row['hhId'],$conn)
                                                                                                                       ) ;

    }
}



echo json_encode($row_array);
mysqli_close($conn);
?>