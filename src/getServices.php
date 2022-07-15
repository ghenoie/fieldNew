<?php
namespace Phppot;
require_once __DIR__ . '/DataSource.php';
$ds = new DataSource();
session_start();

 
//include '../DB/configDB.php';
/* Database connection start */
//  echo "test";
if (isset($_POST['action']) && !empty($_POST['action'])) {
    
    $action = $_POST['action'];
	$mohafazaId =  $_POST['mohafazaId'];
	$qadaaId =  $_POST['qadaaId'];
	$regionId =  $_POST['regionId'];
	$statusId =  $_POST['statusId'];
	$ratioId =  $_POST['ratioId'];
	$taskId =  $_POST['taskId'];
	$taskStatusId =  $_POST['taskStatusId'];
	$contactStatusId =  $_POST['contactStatusId'];
	$total =  $_POST['total'];
	$telephone =  $_POST['telephone'];
	$zUserId = $_POST['userId'];
	$searchDate = $_POST['searchDate'];
	$hhID = $_POST['hhID'];
 
	
	
 
	$orderID = $_POST['orderID'];
	
	$userId =  $_SESSION['userId'];
	$ogeroId =  $_POST['ogeroId'];
	$otherComment =  $_POST['otherComment'];
	$hhId =  $_POST['hhId'];
	$taskTypeId =  $_POST['taskTypeId'];
	$paidId =  $_POST['paidId'];
	$techUserId =  $_POST['techUserId'];
	$amountId =  $_POST['amountId'];
	$visitDate = $_POST['visitDate'];
	$orderNbId = $_POST['orderNbId'];
	
	$giftId = $_POST['giftId'];
	$ticketCount = $_POST['ticketCount'];
	 
	
	
	
	$pkId= $_POST['pkId'];
	$distance= $_POST['distance'];
	$house_size= $_POST['house_size'];
	
 
	$comments = $_POST['comments'];
    switch ($action) {
       
        case 'getReceiver' :
            getReceiver($ds);
            break;
            
            
        case 'getSatellite' :
            getSatellite($ds);
            break;
            
            
            
        case 'getBrands' :
            getBrands($ds);
            break;
            
        case 'getRooms' :
            getRooms($ds);
            break;
            
            
            
        case 'getReligion' :
            getReligion($ds);
            break;
            
            
        case 'getScreen' :
            getScreen($ds);
            break;
            
        case 'getMohafaza' :
            getMohafaza($ds);
            break;
        case 'getQadaa' :
            getQadaa($ds, $mohafazaId);
            break;
        case 'getRegion' :
            getRegion($ds, $qadaaId);
            break;
        case 'getStatus' :
            getStatus($ds);
            break;
        case 'getTaskStatusType' :
            getTaskStatusType($ds);
            break;
           
        case 'getTaskStatus' :
            getTaskStatus($ds);
            break;
        case 'getContactStatuses' :
            getContactStatuses($ds);
            break;
        case 'getHHDetails' :
            getHHDetails($ds, $hhId);
            break;
        
        case 'generateExcel' :
            generateExcel($ds, $hhId);
            break;
            
            
        case 'getHHTasks' :
            getHHTasks($ds, $hhId);
            break;
            
        case 'getHHGifts' :
            getHHGifts($ds, $hhId);
            break;
            
        case 'viewTechOrders':
            viewTechOrders($ds, $hhId);
            break;
            
        case 'viewTechVisits':
            viewTechVisits($ds, $hhId);
            break;
        
        case 'getTechVisits':
            getTechVisits($ds,$hhID);
            break;
            
        case 'getAddress':
            getAddress($ds,$hhID);
            break;
            
            
        case 'getTVDetails' :
            getTVDetails($ds, $hhId);
            break;
            
        case 'getTVDetails2' :
            getTVDetails2($ds, $hhId);
            break;
            
        case 'getTVReceivers' :
            getTVReceivers($ds, $hhId);
            break;
            
        case 'getContactsHistory' :
            getContactsHistory($ds, $hhId);
            break;
       
        case 'retrieveInstallationGraph' :
            retrieveInstallationGraph($ds);
            break;
            
         case 'getTVMeters' :
             getTVMeters($ds, $hhId);
            break;
        case 'getUsers' :
            getUsers($ds);
            break;
        case 'loadQuota' :
            loadQuota($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$total,$userId);
            break;
        case 'getQuota' :
            getQuota($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$userId,$zUserId,$telephone);
            break;
            
        case 'getTasks' :
            getTasks($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$taskStatusId,$contactStatusId,$userId,$zUserId,$telephone,$searchDate,$hhID, $orderID);
            break;
        case 'getQuotaData' :
            getQuotaData($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$zUserId,$telephone, $searchDate);
            break;
          
        case 'checkTVMeter' :
                checkTVMeter($ds, $mohafazaId, $qadaaId, $regionId, $statusId, $ratioId);
                break;
        case 'closeTechOrderFn':
              closeTechOrderFn($ds, $hhId, $userId, $taskTypeId,$taskId);
            break;
        case 'getPanelData' : 
            getPanelData($ds, $mohafazaId, $qadaaId, $regionId, $statusId, $ratioId);
            break;
            
        case 'getTVMeterData' : 
            getTVMeterData($ds, $mohafazaId, $qadaaId, $regionId, $statusId, $ratioId);
        break;
        
        case 'getHouseholdData' :
            getHouseholdData($ds, $mohafazaId, $qadaaId, $regionId, $statusId, $ratioId);
            break;
            
            
        case 'getTechInvoices' :
            getTechInvoices($ds,$paidId, $techUserId,$searchDate,    $amountId);
            break;
            
        case 'updateStatus' :
            updateStatus($ds, $ogeroId, $userId, $statusId, $otherComment);
            break;
            
        case 'updateTechVisits':
            updateTechVisits($ds, $pkId, $distance);
            break;
            
        case 'updateAddress':
            updateAddress($ds, $pkId, $house_size) ;// ,$area,$area_details,$address,$building,$floor);
            break;
            
        case 'updateTV':
            updateTV($ds, $pkId, $house_size) ;// ,$area,$area_details,$address,$building,$floor);
            break;
            
            
            
        case 'updateTVReceiver':
            updateTVReceiver($ds, $pkId, $house_size) ;// ,$area,$area_details,$address,$building,$floor);
            break;
            
            
        case 'updateTVSatellite':
            updateTVSatellite($ds, $pkId, $house_size) ;// ,$area,$area_details,$address,$building,$floor);
            break;
            
            
            
            
        case 'updateMembers':
            updateMembers($ds, $pkId, $comments) ;// ,$area,$area_details,$address,$building,$floor);
            break;
            
        case 'updateContacts' :
            updateContacts($ds, $ogeroId, $userId, $statusId, $otherComment,$taskId, $visitDate);
            break;
            
            
        case 'updateHousehold' :
            updateHousehold($ds, $ogeroId, $userId, $statusId, $otherComment,$taskId, $visitDate,$techUserId, $orderNbId,$giftId,$ticketCount);
                break;
                
        case 'closeTask' :
            closeTask($ds, $hhId, $userId, $taskTypeId,$taskId);
            break;
            
            
            
        case 'moveHHtoProduction' :
            moveHHtoProduction($ds, $hhId, $userId, $taskTypeId);
                break;
                
        case 'moveHHtoInactive' :
            moveHHtoInactive($ds, $hhId, $userId, $taskTypeId);
            break;
            
        case 'createIncentiveDelivery':
            createIncentiveDelivery($ds, $hhId, $userId, $taskTypeId,$taskId);
            break;
        case 'updatequotalogs' :
            updatequotalogs($ds, $ogeroId, $userId, $statusId, $otherComment);
            break;
            
        case 'updateContactlogs' :
            updateContactlogs($ds, $ogeroId, $userId, $statusId, $otherComment,$taskId);
            break;
            
        case 'insertQuestionnaire' :
            insertQuestionnaire($ds, $ogeroId, $userId, $statusId, $otherComment);
             break;
             
        case 'updateQuestionnaire' :
            updateQuestionnaire($ds, $ogeroId, $userId, $statusId, $otherComment);
            break;
            
        case 'insertErrorLogs':
            insertErrorLogs($ds, $ogeroId, $userId, $statusId, $otherComment);
            break;
             
    }
}

function  checkTVMeter($ds, $mohafazaId, $qadaaId, $regionId, $statusId, $ratioId)
{
    
}


function  getContactsHistory($ds, $hhId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "select ct.name contactTaskName, m.username,cs.name contactStatus, c.inout, c.comments, o.name householdname, c.created_at zDate
            from contacts c, contact_types ct  , members_users m, contacts_statuses cs, households o
            where ct.id = c.contact_type_id
            and m.id = c.user_id
            and o.id = c.household_id
            and cs.id = c.status_id
            and c.household_id =  " . $hhId . " order by c.created_at desc  ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getContactsHistory...  ". $sql);
    
    
    $row_array =array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["contactTaskName"] ; // "<option value='". $row["id"]."' >".$row["name"]."</option>";
        $data[] =  $row["username"];
        $data[] =  $row["contactStatus"];
        $data[] =  $row["inout"];
        $data[] =  $row["comments"];
        $data[] =  $row["householdname"];
        $data[] =  $row["zDate"];
    
        $row_array[] = array(  
            'contactTaskName' => $row['contactTaskName'],
            'username' => $row['username'],
            'contactStatus' => $row['contactStatus'],
            'inout' => $row['inout'] ,
            'comments' => $row['comments'],
            'householdname' => $row['householdname'],
            'zDate' => $row['zDate'] 
            
        ) ;
    }
    
    echo json_encode($row_array);
    
}

function viewTechOrders($ds, $hhId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
 
        $sql = " select ss.name as techType, tt.orderNb, tt.comments, opened , closed, tt.household_id ,d.comments doc, d.doc_exists
    from   tech_order_types ss ,tech_orders tt
    left join documents d
    on tt.id= d.tech_order_id
    
    where   ss.id =tech_order_type_id
    and tt.household_id =   " . $hhId . " order by closed_by desc ";
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query viewTechOrders...  ". $sql);
    
    
    $row_array =array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["techType"] ;
        $data[] =  $row["orderNb"] ;
        $data[] =  $row["comments"];
        $data[] =  $row["opened"];
        $data[] =  $row["closed"];
        $data[] =  $row["household_id"];
        $data[] =  $row["doc"];
        $data[] =  $row["doc_exists"];
      
        $row_array[] = array(
            'techType' => $row['techType'],
            'orderNb' => $row['orderNb'],
            'comments' => $row['comments'],
            'opened' => $row['opened'],
            'closed' => $row['closed'] ,
            'household_id' => $row['household_id'] ,
            'doc' => $row['doc'] ,
            'doc_exists' => $row['doc_exists'] 
            
        ) ;
    }
    
    echo json_encode($row_array);
    
}


function viewTechVisits($ds, $hhId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "select p.name problem , u.name techName, date_of_visit, distance, impacted_tvsets, remarks
            from tech_visits tv , tech_problems p , users u
             where  tech_order_id in (SELECT id FROM umshini_bo.tech_orders where household_id 
             										in (" . $hhId . "  ))
             and tv.technician_id = u.id
             and p.id = tv.prob_detected_id;";
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query viewTechVisits...  ". $sql);
    
    
    $row_array =array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["problem"] ;
        $data[] =  $row["techName"] ;
        $data[] =  $row["date_of_visit"];
        $data[] =  $row["distance"];
        $data[] =  $row["impacted_tvsets"];
        $data[] =  $row["remarks"];
        
        $row_array[] = array(
            'problem' => $row['problem'],
            'techName' => $row['techName'],
            'date_of_visit' => $row['date_of_visit'],
            'distance' => $row['distance'],
            'impacted_tvsets' => $row['impacted_tvsets'],
            'remarks' => $row['remarks']
            
        ) ;
    }
    
    echo json_encode($row_array);
    
}



function  getHHDetails($ds, $hhId)
{
    
    
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    $requestData = $_REQUEST;
//     $columns = array(
        
//         0 => 'id',
//         1 => 'house_size',
//         2 => 'area',
//         3 => 'area_details' ,
//         4 => 'address' ,
//         5 => 'building',
//         6 => 'floor'
        
        
//     );
    $sql = "select m.id , firstname, lastname, s.name relation_id, g.name gender_id, cs.name, age, o.name occupation_id, e.name education_id , case when m.head_of_family = 1 then 'Yes' else 'No' end head_of_family
            , case when m.decision_maker = 1 then 'Yes' else 'No' end decision_maker, m.comments, gg.name religion, sc.name socialClass , case when ss.house_size is null then 'N/A' else ss.house_size end as houseSize
            ,ss.recruiting_id , m.date_of_birth,  m.member_status_id, case when m.birth_check = 1 then 'Yes' else 'No' end  birth_check
             from members m , relations s, genders g,civil_statuses cs, occupations o, education e, religions gg, households ss
        
            left join  social_classes sc
             on sc.id = ss.social_class_id
            where  s.id = m.relation_id
            and g.id = m.gender_id
            and ss.id = m.household_id
            and cs.id = m.civil_status_id
            and o.id = m.occupation_id
            and e.id = m.education_id
            and gg.id = ss.religion_id
            and m.member_status_id in (2,3)
            and m.household_id =  " . $hhId . "  order by decision_maker asc  ";
    
    
    if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
       
            $nestedData[] =  $row["id"] ;
            $nestedData[] =  $row["firstname"] ;
            $nestedData[] =  $row["lastname"];
            $nestedData[] =  $row["relation_id"];
            $nestedData[] =  $row["gender_id"];
            $nestedData[] =  $row["age"];
            $nestedData[] =  $row["date_of_birth"];
            $nestedData[] =  $row["occupation_id"];
            $nestedData[] =  $row["education_id"];
            $nestedData[] =  $row["head_of_family"];
            $nestedData[] =  $row["decision_maker"];
            $nestedData[] =  $row["comments"];
            $nestedData[] =  $row["member_status_id"];
            $nestedData[] =  $row["birth_check"];
            
             $nestedData[] =  $row["religion"];
            $nestedData[] =  $row["socialClass"];
            $nestedData[] =  $row["houseSize"];
            $nestedData[] =  $row["recruiting_id"];
           
           
        
        $data[] = $nestedData;
    }
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        // "recordsTotal" => intval($totalData),  // total number of records
        //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
    
    
    
}



function  getHHTasks($ds, $hhId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT s.name, comments, opened, case when closed is null then 'Pending..' else  closed end  as closed
            FROM tasks t, task_types s WHERE  t.task_type_id= s.id and t.household_id =  " . $hhId . "  order by  closed , opened asc ";
    
     // echo $sql;
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getHHTasks...  ". $sql);
    
    
    $row_array =array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["name"] ;
        $data[] =  $row["comments"] ;
        $data[] =  $row["opened"];
        $data[] =  $row["closed"];
      
       $row_array[] = array(
            'name' => $row['name'],
            'comments' => $row['comments'],
            'opened' => $row['opened'],
            'closed' => $row['closed'] 
        ) ;
    }
    
    echo json_encode($row_array);
    
}

function  getHHGifts($ds, $hhId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT task_types.name, delivery_date,gifts.name giftName, ticket_count, ticket_count*gifts.amount totalAmount ,gift_status.name giftStatus

            FROM households_gifts, task_types , gifts ,gift_status
            where task_types.id =households_gifts.task_type_id and gifts.id = gift_id 
            and gift_status.id = households_gifts.status_id
            and household_id =   " . $hhId . "  order by  delivery_date asc ";
    
    // echo $sql;
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getHHGifts...  ". $sql);
    
    
    $row_array =array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["name"] ;
        $data[] =  $row["delivery_date"] ;
        $data[] =  $row["giftName"];
        $data[] =  $row["ticket_count"];
        $data[] =  $row["totalAmount"];
        $data[] =  $row["giftStatus"];
        
        $row_array[] = array(
            'name' => $row['name'],
            'delivery_date' => $row['delivery_date'],
            'giftName' => $row['giftName'],
            'ticket_count' => $row['ticket_count'],
            'totalAmount' => $row['totalAmount'],
            'giftStatus' => $row['giftStatus']
        ) ;
    }
    
    echo json_encode($row_array);
    
}



function  getTVDetails($ds, $hhId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "select 
            (select name from rooms where id = tvsets.room_id) room,
            (select name from brands where id = tvsets.brand_id) brand,  
            brand_txt,
            (select name from screen_types where id = tvsets.screen_type_id) screen ,
        tvm_serial , tvm_sim_serial, model_numb , mic, power_socket,optical_audio_adapter,audio_relay,scart_adapter,extension_usb,jack_to_jack,multiple_outlet
                        ,other_kit
            ,
           /* concat(case when mic=1 then '- MIC ' else '' end,
            	   case when power_socket=1 then ' - Power socket' else '' end ,
            	    case when optical_audio_adapter=1 then '- Optical audio' else '' end,
                     case when audio_relay=1 then '- Audio relay' else '' end,
                     case when scart_adapter=1 then '- RCA' else ''  end,
                     case when extension_usb=1 then '- Extension USB' else '' end,
                     case when jack_to_jack=1 then '- Jack to Jack' else '' end,
                     case when multiple_outlet=1 then '- Multiple outlet' else '' end,
                    case when other_kit is not null  then  other_kit else '' end
                    ) equipment  ,*/
             (select name from tvset_statuses where  id = tvset_status_id ) statusId, comments ,  'x' checkStatus 
             from tvsets where/* household_id in (select id from households where status_id in (20,4,5,6)) and tvm_serial not like 'from Excel' and */ (tvset_status_id >0  or tvset_status_id is null)
            and household_id = " .$hhId.  "
             order by household_id ; ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Mohafaza...  ". $sql);
   // echo $sql;
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["tvm_serial"];  // "<option value='". $row["id"]."' >".$row["name"]."</option>";
    
         $row_array[] = array( 'tvm_serial' => $row['tvm_serial'],
        'tvm_sim_serial' => $row['tvm_sim_serial'],
        'model_numb' => $row['model_numb'],
        'equipment' => $row['equipment'],
        'statusId' => $row['statusId'] ,
         'comments' => $row['comments'] ,
        'checkStatus' => $row['checkStatus'] 
    ) ;
    }
    echo json_encode($row_array);
    
}

function getTVReceivers($ds, $hhId)
{
    
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    $requestData = $_REQUEST;
 
    
    $sql =  " select id,
            (select name from rooms where id = tvsets.room_id) room,
            (select name from brands where id = tvsets.brand_id) brand,
            tvm_serial, tvm_sim_serial,
            (select name from reception_levels, tvset_reception_levels  where reception_levels.id = tvset_reception_levels.reception_id and tvset_reception_levels.tvset_id= tvsets.id) receiver_id,
            (select name from satellites, tvset_satellite  where satellites.id = tvset_satellite.satellite_id and tvset_satellite.tvset_id= tvsets.id) satellite_id
        from tvsets where (tvset_status_id in (1,2,3) or tvset_status_id is null)
            and household_id =   " .$hhId ;
    
    if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get getTVReceivers ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
        $nestedData[] = $row["id"];
        $nestedData[] = $row["room"];
        $nestedData[] = $row["tvm_serial"];
        $nestedData[] = $row["tvm_sim_serial"];
        $nestedData[] = $row["receiver_id"];
        $nestedData[] = $row["satellite_id"];
        
     
        $data[] = $nestedData;
    }
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        // "recordsTotal" => intval($totalData),  // total number of records
        //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
    
}


function  getTVDetails2($ds, $hhId)
{
    
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    $requestData = $_REQUEST;
    $columns = array(
        0 => 'id',
        1 => 'room',
        2 => 'brand',
        3 => 'brand_txt',
        4 => 'model_numb' ,
        5 => 'screen_type_id' ,
        6 => 'hd_enabled',
        7 => 'tvm_serial' ,
        8  => 'tvm_sim_serial' ,
        9 => 'mic',
        10 => 'power_socket',
        11 => 'optical_audio_adapter',
        12 => 'audio_relay',
        13 => 'scart_adapter',
        14 => 'extension_usb',
        15 => 'jack_to_jack',
        16 => 'multiple_outlet',
        17 => 'other_kit',
        18 => 'comments',
        19 => 'statuss'
        );
    
    
    $sql =  "select id,
            (select name from rooms where id = tvsets.room_id) room,
            (select name from brands where id = tvsets.brand_id) brand,
            brand_txt,
            (select name from screen_types where id = tvsets.screen_type_id) screen_type_id ,hd_enabled,
        tvm_serial , tvm_sim_serial, model_numb , mic, power_socket ,optical_audio_adapter  ,audio_relay,scart_adapter,extension_usb,jack_to_jack,multiple_outlet,other_kit,comments
,(select name from tvset_statuses where id  = tvsets.tvset_status_id) statuss 
        from tvsets where (tvset_status_id > 0 or tvset_status_id is null)
            and household_id =   " .$hhId ;
     
    if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
        $nestedData[] = $row["id"];
        $nestedData[] = $row["room"];
        $nestedData[] = $row["brand"];
        $nestedData[] = $row["brand_txt"];
        $nestedData[] = $row["model_numb"];
        $nestedData[] = $row["screen_type_id"];
        $nestedData[] = $row["hd_enabled"];
        $nestedData[] = $row["tvm_serial"];
        $nestedData[] = $row["tvm_sim_serial"];
        $nestedData[] = $row["mic"];
        
        $nestedData[] = $row["power_socket"];
        $nestedData[] = $row["optical_audio_adapter"];
        $nestedData[] = $row["audio_relay"];
        $nestedData[] = $row["scart_adapter"];
        $nestedData[] = $row["extension_usb"];
        $nestedData[] = $row["jack_to_jack"];
        $nestedData[] = $row["multiple_outlet"];
        $nestedData[] = $row["other_kit"];
        $nestedData[] = $row["comments"];
        
        $nestedData[] = $row["statuss"];
        $data[] = $nestedData;
    }
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        // "recordsTotal" => intval($totalData),  // total number of records
        //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
 
}



function  getTVMeters($ds, $hhId)
{
   // and household_id = " .$hhId.  "
    //         // and tvm_serial in ('d7dxc2zt-1238','9j2ckaxs-194414','fubqx62e-194427','cdwj8vew-194477','lhh9j2ds-862','7o3u72ge-1201','7k439uk1-1719','6e6wije0-1847','qw32ehw6-194170','n3kk44kg-194230','6a8a2jv6-194392','c1kedbag-194438','wk250gf6-194667','xrefp85m-194805','tcjnlrqy-194449','qb0308c8-194343','yo3rdusu-194307','fga6huat-194269','4vtso88n-194157')
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
     $sql = "select tvm_serial from tvsets where household_id in (select id from households where status_id in (6))   and tvset_status_id in (1,2,3) 
               and household_id = " .$hhId.  "
               order by id  ; ";
    

//      $sql= "select tvm_serial from tvsets where   tvm_serial not like 'from Excel' and household_id in (select id from households where status_id in (4,5,6))
//              and tvset_status_id not in (5)";    
  
//   $sql= "select tvm_serial 
//      from tvsets where tvm_serial      
//    in ('rouvhr22-137','dcqqewnc-1517','d7dxc2zt-1238','9j2ckaxs-194414','fubqx62e-194427','cdwj8vew-194477','snwywtcz-799','b2n8ghfi-1615','8h0gw9ve-umshini','lhh9j2ds-862','7o3u72ge-1201','7k439uk1-1719','6e6wije0-1847','qw32ehw6-194170','n3kk44kg-194230','kay4w0aw-194317','6a8a2jv6-194392','c1kedbag-194438','if2s8klr-194563','z2683iav-194662','wk250gf6-194667')
//   ";
 
    
    
   $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getTVMeters...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] =  $row["tvm_serial"];  // "<option value='". $row["id"]."' >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
    
}

function getQuota($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$userId,$zUserId,$telephone)
{
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
  $DBconnect->set_charset("utf8");
 
  $regionId=implode(',',$regionId);
 
// storing  request (ie, get/post) global array to a variable
    $requestData = $_REQUEST;
    $columns = array(
// datatable column index  => database column name
        0 => 'id',
        1 => 'region',
        2 => 'full_address',
        3 => 'name',
        4 => 'serv_line_no',
	 	
        5=> 'statusId',
        6=> 'status_id',
        7=> 'username',
        8=> 'comments',
        
        9 => 'callCount',
        10 => 'totalNA',
        11 => 'link',
  );
    
  
    $sql = " select   id, name, serv_line_no,full_address,mohafaza,mohafazaId,regionId,districtId,region,isProcessed,statusId,status_id, username,link,date_of_call,callCount,totalNA,comments from (
             SELECT 
             o.id,
             o.name,
            concat(phone_numb , '<br/>', mobile_numb) AS serv_line_no,
             concat( '<b>',area,'</b><BR><small><u>Area Details: </u>',area_details, '</b><BR/><u>Street: </u>', address, '<BR/><u>Building:</u> ', building, ' <BR><u>Floor:</u> ', floor, '</small>') full_address,
            (select name from users where id = t.user_id limit 1 )username,
              m.name    mohafaza,
              m.id  mohafazaId,
              d.id  as districtId,
              r.id as regionId,
              r.name as region,
              0 isprocessed,
              t.status_id statusId,
             0 as date_of_call,
             0 as callCount,
              0 as totalNA,
            (SELECT 
                    name
                FROM
                    statuses p
                WHERE  p.id = t.status_id) status_id,
            o.id AS link,
           ' ....' as comments
   
               ";
    $sql .= " FROM  regions r, districts d, governorates m,households o
                 left join 
                  (select t.household_id , t.status_id, t.user_id
                          from household_status t
                          where   t.created_at = (select max(created_at) from household_status c where c.household_id = t.household_id group by c.household_id) 
                  )t
                 
               on   o.id = t.household_id 
               where o.region_id = r.id
               and m.id = d.governorate_id  
               and d.id = r.district_id ";
        
 if (!empty($telephone) && strlen(trim($telephone)) > 0) {
        $sql .= " and o.serve_line_numb like '%" .$telephone. "%'";
    }
    
 if (!empty($statusId) && strlen(trim($statusId)) > 0 && $statusId <> '999') {
  $sql .= " and t.status_id in (" .$statusId. ")";
}
/*

if (  $_SESSION['userRole'] != 1 && (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11'))
{
      $sql .= " and t.user_id ='" . $userId. "'";
}


if (  $_SESSION['userRole'] ==  1 &!empty($zUserId) && (trim($zUserId)) <> "999") {
    $sql .= " and t.user_id in (" .$zUserId. ")";
}
*/
if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
    
    $sql .= " and m.id in (" .$mohafazaId. ")";
}


if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
    
    $sql .= " and d.id in (" .$qadaaId. ")";
}

if (!empty($regionId) && strlen(trim($regionId)) > 0 && $regionId != '999' ) {
    
    $sql .= " and r.id in (" .$regionId. ")";
}

if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
 
 
$sql .= "  ) x ";



if  ( (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999)
    || (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) 
    || (!empty($regionId) && strlen(trim($regionId)) > 0 && $regionId != '999' )
    || (!empty($statusId) && strlen(trim($statusId)) > 0 && $statusId <> '999'))
{
    $sql .= "  ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT 0,1000 " ;
    
}
else
{
    $sql .= "  ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    
}


//     $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query 5=". $sql);
//     $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
 
 

//print_r ($sql);
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
        $nestedData[] = $row["id"];
  
		$nestedData[] = $row["full_address"];
		$nestedData[] = $row["region"];
		$nestedData[] = $row["name"];
		$nestedData[] = $row["serv_line_no"];
		$nestedData[] = $row["statusId"];
		$nestedData[] = $row["status_id"];
		$nestedData[] = $row["username"];
		$nestedData[] = $row["comments"];
		$nestedData[] = $row["callCount"];
		$nestedData[] = $row["region"];
        $nestedData[] = $row["link"];
      
        
        
        $data[] = $nestedData;
    }
 
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
       // "recordsTotal" => intval($totalData),  // total number of records
      //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
 
    echo json_encode($json_data);  // send data as json format
}


//get Tasks
function getTasks($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$taskStatusId,$contactStatusId,$userId,$zUserId,$telephone,$searchDate,$hhID,$orderID)
{
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $regionId=implode(',',$regionId);
    $requestData = $_REQUEST;
    $columns = array(
        
        0 => 'taskTypeId',
        1 => 'taskTypeName',
        2 => 'taskUpdatedAt',
        3 => 'taskComments',
        4 => 'hhId',
        5 => 'hhName',
        6 => 'serv_line_no',
        7 => 'region',
        8 => 'full_address',
        9 => 'statusId',
        10 => 'contactComments',
        11 => 'username',
        12 => 'visitDate',
        13 => 'taskIdlink',
        14 => 'notification',
        15 => 'created_at',
        16 => 'HHstatusId',
         
    );
    $sql = "  select distinct  HHstatusId, hhId, hhName, serv_line_no,full_address,mohafaza,mohafazaId,regionId,districtId,region,isProcessed,statusId,contactComments, 
                      username,taskIdlink,taskUpdatedAt,taskTypeName,taskTypeId,taskComments, visitDate , notification, created_at
            from (
           SELECT 
             o.status_id HHstatusId,
             o.id as hhId,
             o.name as hhName,
               concat('<i class=\'fa fa-phone\' aria-hidden=\'true\'> : </i>' , phone_numb , '<br/><i class=\'fa fa-mobile\' aria-hidden=\'true\'> : </i>', mobile_numb,'<br/><i class=\'fa fa-user-o\' aria-hidden=\'true\'> : </i>', second_mobile_numb, '<br/><i class=\'fa fa-user-o\' aria-hidden=\'true\'> : </i>',second_house_phone_numb)AS serv_line_no,
             concat( '<b>',area,'</b><BR><small><u>Area Details: </u>',area_details, '</b><BR/><u>Street: </u>', address, '<BR/><u>Building:</u> ', building, ' <BR><u>Floor:</u> ', floor, '</small>') full_address,
             (select username from members_users where id = xx.user_id limit 1 )username,
             m.name mohafaza,
             m.id  mohafazaId,
             d.id  as districtId,
             r.id as regionId,
             r.name as region,
             0 isprocessed,
             concat('<u>', xx.name, '</u>: ', (SELECT name FROM contacts_statuses p WHERE p.id = xx.status_id) ) statusId,
             ta.opened as taskUpdatedAt,";
    
    //Incentive Call - Round 1 or Round 2 or Round 3 or Round 4 or Round 5 or Round 6
    if ($statusId == '5' || $statusId == '14' || $statusId == '16' || $statusId == '19' || $statusId == '21' || $statusId == '23' || $statusId == '25')
    {
        $sql .= " (
                SELECT    concat( 'Unplugged TV:<B>' ,  (select count(ts.id)   from tvsets ts where  ts.household_id = hh.id and ts.tvset_status_id   in (1,3 )), ' </B><BR/> Visited at:<BR/>', tt.date_of_visit) 
                       from tech_orders oo , tech_visits tt, households hh 
                        where oo.id = tt.tech_order_id
                        and oo.household_id = hh.id
                        and ( hh.status_id in (4,5,6) or hh.status_id = 9  )
                        and oo.tech_order_type_id = 1
                        and hh.id = o.id 
                       
                        limit 1
            
                    ) taskTypeName , ";
    }
    
    else
    {
        $sql.="  concat(ty.name, ' <br/><B>Recruit Date:</b>',o.recruit_date)  as taskTypeName, ";
    }
    
    
    
    $sql.="   ty.id AS taskTypeId,
             xx.comments as contactComments,xx.created_at, 
             ta.id AS taskIdlink,";
    
    
    //Incentive Call - Round 1 or round 2 or round 3 or round 4 or Round 5 or Round 6
    if ($statusId == '5' ||  $statusId == '14' || $statusId == '16' || $statusId == '19' || $statusId == '21'  || $statusId == '23' || $statusId == '25')
    {
        $sql .= " (
               SELECT    concat(case when ceiling(datediff(now(), tt.date_of_visit)
                                 + ( (select count(id) from tvsets ts where ts.household_id = hh.id
                                	and ts.tvset_status_id = 2)*5)  /2 ) > 2
           
                        then
                         ceiling(datediff(now(), case when (select max(tt.created_at ) from tasks tt where task_type_id = ta.task_type_id
                     
                           and tt.household_id = hh.id)
                           is null then tt.date_of_visit
                           else 
                           (select max(tt.created_at) from tasks tt where task_type_id = ta.task_type_id    
                           and tt.household_id = hh.id) 
                           
                           end
                          
                           )
                           
                                 + ( (select count(id) from tvsets ts where ts.household_id = hh.id
                                	and ts.tvset_status_id = 2)*5)  /2 )
                                     
           
                        else 0 end , ' points   ' , '<b> <BR> '  , ta.comments  ) points
                        from tech_orders oo , tech_visits tt, households hh
                        where oo.id = tt.tech_order_id  
                        and oo.household_id = hh.id
                        and hh.status_id in (4,5,6)
                        and oo.tech_order_type_id = 1
                        and hh.id = o.id limit 1
 
                    ) taskComments , ";
    }
 
   
    else
    {
        $sql.=" concat(ta.comments, '<br/><br/>Installation Comments: ', o.installation_comments, ' <br/><br/> Recruit Comments: ', o.recruit_comments)  as taskComments,";
    }
    
    $sql.="   (select concat('Coincidential Task:<br/>', ss.comments) from tasks ss where task_type_id in (8) and ss.household_id = o.id and ss.closed_by = 0  limit 1) notification, ";
        
    $sql.="  ta.visit_date as visitDate
                ";
    
    $sql .= " from  regions r, districts d, governorates m, task_types ty, tasks ta,  households o   
     LEFT JOIN (SELECT cc.status_id,
					cc.household_id,
					cc.comments,
					cc.user_id,
					ct.name,
					ct.id, cc.created_at 
				FROM contacts cc, contact_types ct
				WHERE cc.contact_type_id = ct.id
				AND cc.created_at = (SELECT  MAX(created_at)  FROM contacts c  WHERE c.household_id = cc.household_id GROUP BY c.household_id)
            ) xx 
            ON xx.household_id = o.id  " ;
  
   
                
    $sql .= " where  o.region_id = r.id   /* and o.id  not in  (1671,1735,193712)*/  
            AND m.id = d.governorate_id
            AND d.id = r.district_id
            AND ty.id = ta.task_type_id   
            and  o.id = ta.household_id ";
     
    if (!empty($telephone) && strlen(trim($telephone)) > 0) {
        $sql .= " and o.serve_line_numb like '%" .$telephone. "%'";
    }
    
   // if (!empty($statusId) ) // && strlen(trim($statusId)) > 0 && $statusId <> '999') {
    //{
       $sql .= " and ty.id in (" .$statusId. ")";
   // }
    
       if (!empty($taskStatusId) && strlen(trim($taskStatusId)) > 0 && $taskStatusId ==  '1') {
           
       if (!empty($statusId) && strlen(trim($statusId)) > 0  && $contactStatusId ==  '-1')
       {
           //Coincidential
           if ($statusId == '8')
           {
               $sql .= " and (xx.id not in (7)";
           }
           
           // Welcome
           if ( $statusId == '7')
           {
               $sql .= " and (o.status_id not in (21) and xx.id not in (4)";
           }
           
           // Maintenance
           if ( $statusId == '10')
           {
               $sql .= " and (xx.id not in (1)";
           }
           
           //Dismantling
           if ( $statusId == '11')
           {
               $sql .= " and (xx.id not in (9)";
           }
           
           //New Installation
           if ($statusId == '12')
           {
               $sql .= " and (xx.id not in (10)";
           }
           
           //Incentive Call - Round 1
           if ($statusId == '5')
           {
               $sql .= " and (xx.id not in (3)";
           }
           
           //Incentive Call - Round 2
           if ($statusId == '14')
           {
               $sql .= " and (xx.id not in (13)";
           }
           
           //Incentive Call - Round 3
           if ($statusId == '16')
           {
               $sql .= " and (xx.id not in (16)";
           }
           
           //Incentive Call - Round 4
           if ($statusId == '19')
           {
               $sql .= " and (xx.id not in (19)";
           }
           //Incentive Call - Round 5
           if ($statusId == '21')
           {
               $sql .= " and (xx.id not in (21)";
           }
           
           //Incentive Call - Round 6
           if ($statusId == '23')
           {
               $sql .= " and (xx.id not in (23)";
           }
           
           
           
           //Incentive Delivery - round 1
           if ($statusId == '4')
           {
               $sql .= " and (xx.id not in (11)";
           }
           
           //Incentive Delivery- round 2
           if ($statusId == '15')
           {
               $sql .= " and (xx.id not in (14)";
           }
           
           //Incentive Delivery- round 3
           if ($statusId == '17')
           {
               $sql .= " and (xx.id not in (17)";
           }
           
           //Incentive Delivery- round 4
           if ($statusId == '20')
           {
               $sql .= " and (xx.id not in (20)";
           }
           
           //Incentive Delivery- round 5
           if ($statusId == '22')
           {
               $sql .= " and (xx.id not in (22)";
           }
           
           //Incentive Delivery- round 6
           if ($statusId == '24')
           {
               $sql .= " and (xx.id not in (24)";
           }
           
           
           //Regret Call
           if ($statusId == '13')
           {
               $sql .= " and (xx.id not in (12)";
           }
           
           //Incentive Delivery Feedback call
           if ($statusId == '18')
           {
               $sql .= " and (xx.id not in (15)";
           }
           
           $sql .= " or xx.id is null)";
           
       }
       else
       {
           //Coincidential
           if ($statusId == '8')
           {
               $sql .= " and xx.id  in (7)";
           }
           
           // Welcome
           if ( $statusId == '7')
           {
               $sql .= " and xx.id  in (4)";
           }
           
           // Maintenance
           if ( $statusId == '10')
           {
               $sql .= " and xx.id  in (1)";
           }
           
           //Dismantling
           if ( $statusId == '11')
           {
               $sql .= " and xx.id  in (9)";
           }
           
           //New Installation
           if ($statusId == '12')
           {
               $sql .= " and xx.id  in (10)";
           }
           
           //Incentive Call - round 1
           if ($statusId == '5')
           {
               $sql .= " and xx.id  in (3)";
           }
           
           //Incentive Call - round 2
           if ($statusId == '14')
           {
               $sql .= " and xx.id  in (13)";
           }
           
           //Incentive Call - Round 3
           if ($statusId == '16')
           {
               $sql .= " and xx.id  in (16)";
           }
           
           //Incentive Call - Round 4
           if ($statusId == '19')
           {
               $sql .= " and xx.id  in (19)";
           }
           
           //Incentive Call - Round 5
           if ($statusId == '21')
           {
               $sql .= " and xx.id  in (21)";
           }
           
           //Incentive Call - Round 6
           if ($statusId == '23')
           {
               $sql .= " and xx.id  in (23)";
           }
           
           

           
           //Incentive Delivery - round 1
           if ($statusId == '4')
           {
               $sql .= " and xx.id  in (11)";
           }
           //Incentive Delivery - round 2
           if ($statusId == '15')
           {
               $sql .= " and xx.id  in (14)";
           }
           
           
           //Incentive Delivery- round 3
           if ($statusId == '17')
           {
               $sql .= " and xx.id  in (17)";
           }
           
           //Incentive Delivery- round 4
           if ($statusId == '20')
           {
               $sql .= " and xx.id  in (20)";
           }
           
           //Incentive Delivery- round 5
           if ($statusId == '22')
           {
               $sql .= " and xx.id  in (22)";
           }
           
           //Incentive Delivery- round 6
           if ($statusId == '24')
           {
               $sql .= " and xx.id  in (24)";
           }
           
           
           
           //Regret Call
           if ($statusId == '13')
           {
               $sql .= " and xx.id  in (12)";
           }
           
           
           //Incentive Delivery Feedback call
           if ($statusId == '18')
           {
               $sql .= " and xx.id  in (15)";
           }
           
           
       }
       }
    
    if (!empty($taskStatusId) && strlen(trim($taskStatusId)) > 0 && $taskStatusId <> '999') {
        $sql .= " and case  when " .$taskStatusId. "= 2 then ta.closed_by <>  0 else ta.closed_by =   0  end  ";
    }
    
    
    if (!empty($contactStatusId) && strlen(trim($contactStatusId)) > 0 && $contactStatusId <> '999'  && $contactStatusId <> '-1') {
        $sql .=  " and xx.status_id in (" .$contactStatusId. ")";;
    }
    else 
    {
        $sql .=  " and (  xx.status_id not in (236) or xx.status_id is null )"; // exclude no answer 5+ time
    }
    
    
    if(!empty($searchDate) && (trim($searchDate)) <> "999")
    {
        $sql .="   and DATE_FORMAT(ta.visit_date, '%Y-%m-%d')   = '".$searchDate."'   ";
        
    } 
    
    
    if(!empty($hhID) && (trim($hhID)) <> "0")
    {
        $sql .="   and o.id   =  ".$hhID."    ";
    }
    
    
    
//     if(!empty($orderID) && (trim($orderID)) <> "0")
//     {
//         $sql .="   and DATE_FORMAT(ta.visit_date, '%Y-%m-%d')   = '".$searchDate."'   ";
//     }
    
    
   /*
    if (  $_SESSION['userRole'] != 1 && (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11'))
    {
    $sql .= " and t.user_id ='" . $userId. "'";
    }
    
    if (  $_SESSION['userRole'] ==  1 &!empty($zUserId) && (trim($zUserId)) <> "999") {
    $sql .= " and t.user_id in (" .$zUserId. ")";
    }
    */
    if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
        
        $sql .= " and m.id in (" .$mohafazaId. ")";
    }
    
    
    if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
        
        $sql .= " and d.id in (" .$qadaaId. ")";
    }
    
    if (!empty($regionId) && strlen(trim($regionId)) > 0 && $regionId != '999' ) {
        
        $sql .= " and r.id in (" .$regionId. ")";
    }
    
    if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
    
    $sql .= "  ) x ";
    
    if  ( (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999)
        || (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999)
        || (!empty($regionId) && strlen(trim($regionId)) > 0 && $regionId != '999' )
        || (!empty($statusId) && strlen(trim($statusId)) > 0 && $statusId <> '999'))
    {
        $sql .= "  ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT 0,1500 " ;
    }
    else
    {
        $sql .= "  ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] ." LIMIT 0,1500 "; // "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    }
    
    // $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query 5=". $sql);
    // $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    // echo  ($sql);
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
        $nestedData[] = $row["taskTypeId"];
        $nestedData[] = $row["taskTypeName"];
        $nestedData[] = $row["taskUpdatedAt"];
        $nestedData[] = $row["taskComments"];
        $nestedData[] = $row["hhId"];
        $nestedData[] = $row["hhName"];
        $nestedData[] = $row["serv_line_no"];
        $nestedData[] = $row["region"];
        $nestedData[] = $row["full_address"];
        
        $nestedData[] = $row["statusId"];
        $nestedData[] = $row["contactComments"];
        $nestedData[] = $row["username"];
        $nestedData[] = $row["visitDate"];
        $nestedData[] = $row["taskIdlink"];
        $nestedData[] = $row["notification"];
        $nestedData[] = $row["created_at"];
        $nestedData[] = $row["HHstatusId"];
        $data[] = $nestedData;
    }
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        // "recordsTotal" => intval($totalData),  // total number of records
        //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
}




 
function getAddress($ds,$hhID)
{
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    $requestData = $_REQUEST;
    $columns = array(
        
        0 => 'id',
        1 => 'house_size',
        2 => 'area',
        3 => 'area_details' ,
        4 => 'address' ,
        5 => 'building',
        6 => 'floor' ,
        7 => 'location' ,
        8 => 'installation_comments',
        9 => 'religion_id' 
        
        
    );
    $sql =  "select id,  house_size,area,  area_details,  address, building,floor, location ,installation_comments, 
               (select name from religions where id = religion_id) religion_id  from households  where id = "   . $hhID   ;
    
    if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
        $nestedData[] = $row["id"];
        $nestedData[] = $row["house_size"];
        $nestedData[] = $row["area"];
        $nestedData[] = $row["area_details"];
        $nestedData[] = $row["address"];
        $nestedData[] = $row["building"];
        $nestedData[] = $row["floor"];
        $nestedData[] = $row["location"];
        $nestedData[] = $row["installation_comments"];
        $nestedData[] = $row["religion_id"];
 
        
        $data[] = $nestedData;
    }
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        // "recordsTotal" => intval($totalData),  // total number of records
        //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
}





 
function getTechVisits($ds,$hhID)
{
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
 
    $requestData = $_REQUEST;
    $columns = array(
        
        0 => 'id',
        1 => 'problem',
        2 => 'orderNb', 
        3 => 'techName' ,
        4 => 'date_of_visit' ,
        5 => 'distance',
        6 => 'impacted_tvsets',
        7 => 'remarks' 
       
        
    );
    $sql = "select tv.id ,  p.name problem , tv.orderNb, u.name techName  , date_of_visit, distance, impacted_tvsets, remarks 
            from tech_visits tv , tech_problems p , users u
             where  tech_order_id in (SELECT id FROM umshini_bo.tech_orders where household_id
             										in (" . $hhID . "  ))
             and tv.technician_id = u.id
             and p.id = tv.prob_detected_id limit 20 ";
    
    if (!empty($requestData['search']['value'])) {  }  // if there is a search parameter, $requestData['search']['value'] contains search parameter
    
  
    
//     if  ( (!empty($hhID) && strlen(trim($hhID)) > 0 )       )
//     {
//         $sql .= "  ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT 0,15 " ;
//     }
//     else
//     {
//         $sql .= "  ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] ." LIMIT 0,15 "; // "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
//     }
    
    // $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query 5=". $sql);
    // $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    //    echo  ($sql);
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $nestedData = array();
        $nestedData[] = $row["id"];
        $nestedData[] = $row["problem"];
        $nestedData[] = $row["orderNb"];
        $nestedData[] = $row["techName"];
        $nestedData[] = $row["date_of_visit"];
        $nestedData[] = $row["distance"];
        $nestedData[] = $row["impacted_tvsets"];
        $nestedData[] = $row["remarks"];
        
        $data[] = $nestedData;
    }
    
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        // "recordsTotal" => intval($totalData),  // total number of records
        //  "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
}

function getQuotaData($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$userId,$telephone,$searchDate)
{
    $conn = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $conn->set_charset("utf8");
    // storing  request (ie, get/post) global array to a variable
    $requestData = $_REQUEST;
    $columns = array(
    // datatable column index  => database column name
       
        0 => 'callDate',
        1 => 'username',
        2 => 'NbOfcalls',
        3=> 'statusDesc' 
        
    );

    $sql = "  SELECT DATE_FORMAT(t.updated_date, '%d-%m-%Y')  callDate,count(t.ogero_id) NbOfcalls,   m.username";
    
    
    if (!empty($statusId) && (trim($statusId)) ==  "999") {
        $sql .= "  ,x.desc as statusDesc ";
    }
    else
    {
        $sql .= "  , max(x.desc) as statusDesc ";
    }
    
    $sql .= "  FROM  ogero o, quota t, params x , MEMBERS m 
               where o.id = t.ogero_id  and    o.processed = 1 and o.region_id = t.region_id  
                and t.status_id <> 1 and x.param_id = t.status_id
               
                and x.type_id = 26  and   t.user_id  = m.id ";
  
//     if (!empty($telephone) && strlen(trim($telephone)) > 0) {
//         $sql .= " and o.serv_line_no like '%" .$telephone. "%'";
//     }
    
    if (!empty($statusId) && (trim($statusId)) <> "999") {
         $sql .= " and t.status_id in (" .$statusId. ")";
    }
    
    if(!empty($searchDate) && (trim($searchDate)) <> "999")
    {
        $sql.="   and DATE_FORMAT(t.updated_date, '%Y-%m-%d')   = '".$searchDate."'   ";
        
    } 
    
    
//     if (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11')
//     {
//         if (  $_SESSION['userRole'] != 1)
//         {
//             $sql .= " and t.user_id ='" . $userId. "'";
//         }
        
//     }
    
    if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
        
        $sql .= " and o.mohafaza_id in (" .$mohafazaId. ")";
    }
    
    if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
        
        $sql .= " and o.qadaa_id in (" .$qadaaId. ")";
    }
    
    if (!empty($regionId) && strlen(trim($regionId)) > 0 && $regionId != '999' ) {
        
        $sql .= " and o.region_id in (" .$regionId. ")";
    }
    
    if ( !empty($userId) && (trim($userId)) <> "999") {
        $sql .= " and t.user_id in (" .$userId. ")";
    }
    
    if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
        $sql.=" AND (  m.username LIKE '".$requestData['search']['value']."%' ";
        $sql.=" OR x.desc LIKE '".$requestData['search']['value']."%' ";
        
        $sql.=" OR  DATE_FORMAT(t.updated_date, '%d-%m-%Y') LIKE '".$requestData['search']['value']."%' )";
    }
    $sql .= "  group by DATE_FORMAT(t.updated_date, '%d-%m-%Y')  , t.user_id";
    
    if (!empty($statusId) && (trim($statusId)) ==  "999") {
        $sql .= "  ,x.desc ";
    }
      

    $query=mysqli_query($conn, $sql) or die("getServices.php: get quota Data");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
   // print $sql;
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
    $query=mysqli_query($conn, $sql) or die("getServices.php: get quota Data");
    $totalData = mysqli_num_rows($query);
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $nestedData=array();
        
        $nestedData[] = $row["callDate"];
        $nestedData[] = $row["username"];
        $nestedData[] = $row["NbOfcalls"];
        $nestedData[] = $row["statusDesc"];
        $nestedData[] = $row["statusDesc"];
         
        $data[] = $nestedData;
    }
    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal"    => intval( $totalData ),  // total number of records
        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
   
 
}
function getTechInvoices($ds,  $paidId, $techUserId, $searchDate, $amountId)
{
    $conn = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $conn->set_charset("utf8");
 
    
    
    $requestData = $_REQUEST;
    $columns = array(
        0 => 'technician',
        1 => 'closingDate',
        2 => 'impacted_tvsets',
        3=> 'date_of_visit',
        4=> 'orderNb',
        5=> 'hhId',
        6=> 'techProblem',
        7=> 'techOrder',
        8=> 'visitRemarks',
        9=> 'installationCost',
        10=> 'additionalCost',
        11=> 'distance',
        12=> 'gift',
        13=> 'giftCount' 
        
 
    );
    
    $sql = "   select
                (select name from users where id = vi.technician_id)  technician ,
                ti.closed closingDate,
                vi.impacted_tvsets impacted_tvsets ,
                vi.date_of_visit  date_of_visit,
                vi.orderNb orderNb,
                hh.id hhId
                ,(select name from tech_problems where id =  vi.prob_detected_id ) techProblem
                ,(select name from tech_order_types where id = tech_order_type_id) techOrder
              , concat(hh.area, '-',vi.remarks) visitRemarks
               /*, dd.name visitRemarks*/
                , case when ti.tech_order_type_id= 1 AND vi.prob_detected_id = 1  and coalesce(vi.distance) <> 0  then 35  
                else case when ( (ti.tech_order_type_id= 1  AND vi.prob_detected_id = 2) or ti.tech_order_type_id= 2  or  ti.tech_order_type_id= 3 or  ti.tech_order_type_id= 5)  then 15 
                else case when (ti.tech_order_type_id= 4) then 5 
                end end end installationCost   ,
                case when ti.tech_order_type_id= 1 and vi.prob_detected_id =1  and coalesce(vi.distance) <> 0 then ( case when vi.impacted_tvsets-1 <0 then 0 else  vi.impacted_tvsets-1 end  )*15
                else  case when ti.tech_order_type_id= 2 and vi.prob_detected_id =1  and coalesce(vi.distance) <> 0 then vi.impacted_tvsets*15
                else 0 end
                end additionalCost
                ,vi.distance distance, concat('Code ',(select name from gifts where id = gg.gift_id))  as gift, gg.ticket_count as giftCount
            ";

    
    $sql .= " from  tech_visits vi,  districts dd , households hh, tech_orders ti 
                left join households_gifts gg
                on gg.household_id = ti.household_id
                and gg.tech_order_id = ti.id 
                where hh.id = ti.household_id
                and hh.district_id = dd.id
                and ti.id = vi.tech_order_id
                
               /* and vi.orderNb not in (344,341,345,346)*/ 
                ";
    
    //     if (!empty($telephone) && strlen(trim($telephone)) > 0) {
    //         $sql .= " and o.serv_line_no like '%" .$telephone. "%'";
    //     }
    
//     if (!empty($statusId) && (trim($statusId)) <> "999") {
//         $sql .= " and t.status_id in (" .$statusId. ")";
//     }
    
        if(!empty($searchDate) && (trim($searchDate)) <> "999")
        {
            $sql.="   and DATE_FORMAT(vi.date_of_visit, '%Y-%m-%d')   = '".$searchDate."'   ";
            
        }
    
        if (trim($paidId) <> "999") {
            $sql .= " and ti.paid  in  (" .$paidId.")";
        }
        
        if (trim($amountId) <> "999") {
            $sql .= " and ti.amount   in  (" .$amountId.")";
        }
        
        if (!empty($techUserId) && (trim($techUserId)) <> "999") {
            $sql .= " and vi.technician_id  in  (" .$techUserId.")";
      }
    
    
    
    
    
    
    if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
//         $sql.=" AND (  m.username LIKE '".$requestData['search']['value']."%' ";
//         $sql.=" OR x.desc LIKE '".$requestData['search']['value']."%' ";
        
//         $sql.=" OR  DATE_FORMAT(t.updated_date, '%d-%m-%Y') LIKE '".$requestData['search']['value']."%' )";
    }
    
 
    
    
    $query=mysqli_query($conn, $sql) or die("getServices.php: getTechInvoices");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT 0,1000   ";
     //  print $sql;
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
    $query=mysqli_query($conn, $sql) or die("getServices.php: getTechInvoices");
    $totalData = mysqli_num_rows($query);
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $nestedData=array();
        
        $nestedData[] = $row["technician"];
        $nestedData[] = $row["closingDate"];
        $nestedData[] = $row["impacted_tvsets"];
        $nestedData[] = $row["date_of_visit"];
        $nestedData[] = $row["orderNb"];
        $nestedData[] = $row["hhId"];
        $nestedData[] = $row["techOrder"];
        $nestedData[] = $row["techProblem"];
        $nestedData[] = $row["visitRemarks"];
        
        $nestedData[] = $row["installationCost"];
        $nestedData[] = $row["additionalCost"];
     
        $nestedData[] = $row["distance"];
        $nestedData[] = $row["gift"];
        $nestedData[] = $row["giftCount"];
       
        $data[] = $nestedData;
    }
    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal"    => intval( $totalData ),  // total number of records
        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
    
    
}

//update contacts 
function updateContacts($ds, $householdId, $userId, $statusId,$otherComment,$taskTypeId,$visitDate) 
{
 
    $query = " SELECT id FROM tasks where household_id =  " .$householdId . "  and task_type_id = " . $taskTypeId . " limit 1";
    
    $resultset= $ds->select($query);
  //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
    if (!empty($resultset))
    {
       
        
        
        if ($visitDate == null or $visitDate == "null" or $visitDate =="undefined")
        {
            
            $query = "update tasks set  updated_at=now()   where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
            
            
        }
        
        else
        {
            
            $query = "update tasks set  updated_at=now() , visit_date = '".date("Y-m-d H:i:s",strtotime($visitDate)) ."'   where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
         
            
        }
       // echo json_encode($query);
        $ds->insert($query);
    }
    else
    {
        
        $query = " insert into tasks (`id`,
                                        `task_type_id`,
                                        `comments`,
                                        `opened`,
                                        `closed`,
                                        `opend_by`,
                                        `closed_by`,
                                        `created_at`,
                                        `updated_at`,
                                        `household_id`,
                                        `comments_details`)
                        values (0, " .$taskTypeId . ", ' Task',  now(),null, " . $userId .", 0,now(),now(),". $householdId .", now())";
        
        $ds->insert($query);
    }
    
    
   
        /*
        $json_data = null;
        $json_data = array(
            "zError" => "ERROR: Could not prepare query: $query. " . mysqli_error($ds->conn) 
        );
        echo json_encode($json_data); */
  updateContactlogs($ds, $householdId, $userId, $statusId,$otherComment,$taskTypeId);
    
}



function updateHousehold($ds, $householdId, $userId, $statusId,$otherComment,$taskTypeId,$visitDate,$techUserId,$orderNbId,$giftId,$ticketCount)
{
    
    // check latest open task of the particual TASK Type 
    $query = " SELECT id FROM tasks where household_id =  " .$householdId . " and closed_by= 0  and task_type_id = " . $taskTypeId . " limit 1";
    $resultset= $ds->select($query);
    //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
    if (!empty($resultset))
    {
        
        foreach ($resultset as $taskData) {
           $taskId =  $taskData["id"];
            
        }
        
        
        
        $query = "update tasks set  updated_at=now() , visit_date = '".date("Y-m-d H:i:s",strtotime($visitDate)) ."' , comments = concat(comments,'-', '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."') 
                  where household_id = " .$householdId . " and task_type_id = " . $taskTypeId . " and id = " . $taskId;
 
        $ds->insert($query);
        
        
        if (($taskTypeId == 10|| $taskTypeId == 11 || $taskTypeId == 12 ) && $statusId <> 20)
        {
                $query = "update households set  updated_at=now() , status_id = ".$statusId ."   where id = " .$householdId ;
                $ds->insert($query);
                 
                
                $query = "INSERT INTO household_status
                            (id, household_id, created_at,status_id,user_id, updated_at)
                            VALUES (0 , " . $householdId . ",now(), ".$statusId." , 4, now() )";
                
                $ds->insert($query);
        }
        //If TAsk Type Installation and HH Status Failed , create automatically TASK Regret call
        if ($taskTypeId == 12 && $statusId == 3)
        {
            
            $query = " SELECT count(id) id FROM tasks where household_id =  " .$householdId . "  and task_type_id = 13 limit 1";
            $resultset= $ds->select($query);
            //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
            foreach ($resultset as $quotaData) {
                $quotaData["id"];
               
            }
            if (  $quotaData["id"]== 0 )
            {
            
                $query = "INSERT  INTO tasks values (0,13, '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."', now(), null ,4,0, now(), now() ,".$householdId .", null , null)";
                $ds->insert($query);
                
            }
        }
        
        //If TAsk Type Installation and HH Status installated , create automatically TASK welcome call and Start counting incentive points
        if ($taskTypeId == 12 && $statusId == 4)
        {
            
            $query = " SELECT count(id) id FROM tasks where household_id =  " .$householdId . "  and task_type_id = 7 limit 1";
            $resultset= $ds->select($query);
            //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
            foreach ($resultset as $quotaData) {
                $quotaData["id"];
                
            }
            if (  $quotaData["id"]== 0 )
            {
                
                $query = "INSERT  INTO tasks values (0,7, 'Welcome Call', now(), null ,4,0, now(), now() ,".$householdId .", null , null)";
                $ds->insert($query);
                
                $query = "INSERT  INTO tasks values (0,5, 'Incentive Call - Round 1 ', now(), null ,4,0, now(), now() ,".$householdId .", null , null)";
                $ds->insert($query);
            }
        }
        
        

        if (($taskTypeId == 12 && ( $statusId == 3 || $statusId == 4)) 
            || ($taskTypeId == 11 && ( $statusId == 9 || $statusId == 20 || $statusId == 21 || $statusId == 22 || $statusId == 23)) 
                    ||($taskTypeId == 10 &&  $statusId == 4)  
                    ||($taskTypeId == 4  && ( $statusId == 3   || $statusId == 4 )) // incentive delivery - round 1
                    ||($taskTypeId == 15  && ( $statusId == 3 || $statusId == 4)) // incentive delivery - round 2 ...
                    ||($taskTypeId == 17  && ( $statusId == 3 || $statusId == 4)) // incentive delivery - round 3 ...
                    ||($taskTypeId == 20  && ( $statusId == 3 || $statusId == 4)) // incentive delivery - round 4 ...
                    ||($taskTypeId == 22  && ( $statusId == 3 || $statusId == 4)) // incentive delivery - round 5 ...
                    ||($taskTypeId == 24  && ( $statusId == 3 || $statusId == 4)) // incentive delivery - round 6 ...
                    ||($taskTypeId == 26  && ( $statusId == 3 || $statusId == 4)) // incentive delivery - round 7 ...
            )
        {
            
            
            if ($taskTypeId == 10) // Maintenance
            {
                
                $techOrderTypeId= 2;
                $techProblem = 20 ;
            }
            else  if ($taskTypeId == 11 ) // Dismantling
            {
                $techOrderTypeId= 3;
                $techProblem = 3;
            }
            else  if ($taskTypeId == 12  ) // Installation
            {
                $techOrderTypeId= 1;
                if ($statusId == 3) // failed
                {
                    $techProblem = 2; //Installation refused
                }
                else 
                {
                    $techProblem = 1;//TC installed
                }
            }
            else  if ($taskTypeId == 4 || $taskTypeId == 15   || $taskTypeId == 17  || $taskTypeId == 20 || $taskTypeId == 22 || $taskTypeId == 24) // Incentive Delivery - Round 1 or Round 2 or round 3 or round 4 or round 5 or round 6...
            {
                $techOrderTypeId= 4;
                if ($statusId == 3) // failed
                {
                    $techProblem = 23; //Incentive Delivery Failed
                }
                elseif ($statusId == 4)
                {
                    $techProblem = 22;//Incentive Delivery Sucess
                    
                }
            
            
            }
            

            
            // Create Tech Order 
            $query = " SELECT count(id) id FROM tech_orders where household_id =  " .$householdId . " and closed_by = 0 and tech_order_type_id = ".$techOrderTypeId." limit 1";
            $resultset= $ds->select($query);
            //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
            foreach ($resultset as $quotaData) {
                $quotaData["id"];
                
            }
            //if (  $quotaData["id"]== 0 )
           // {
                $orderNbId =$orderNbId;
                $query = "INSERT INTO tech_orders values (0,".$techOrderTypeId.",".$orderNbId.", '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."', -1,202104, 1, 4,0, now(), null ,".$householdId .", now() , now())";
                $ds->insert($query);
                $json_data .= " Technician Order Created ";
            //}
            
            // Create Tech Visit 
            $query = " SELECT count(id) id FROM tech_visits where tech_order_id in (SELECT id FROM tech_orders where household_id  =  " .$householdId . "  and tech_order_type_id = ".$techOrderTypeId.") ";
            $resultset= $ds->select($query);
            //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
            foreach ($resultset as $quotaData) {
                $quotaData["id"];
                
            }
//             if (  $quotaData["id"]== 0 )
//             {
                
                
                $query = " SELECT id FROM tech_orders where household_id  =  " .$householdId . "  and tech_order_type_id = ".$techOrderTypeId." ";
                $resultset= $ds->select($query);
                //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
                foreach ($resultset as $techOrder) {
                    $techOrder["id"];
                    
                }
                
                
                $query = "INSERT INTO tech_visits values (0,". $techOrder["id"].",".$techProblem.",".$techUserId.", '".date("Y-m-d H:i:s",strtotime($visitDate)) ."',-1,-1, '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."',now() , now(),".$orderNbId.")";
                $ds->insert($query);
                
                $json_data .= " - Technician Visit  Created ";
         //   }
            // update Tech Visit details
//             else 
//             {
                
                
//             }
            

            // there is gift delivery
            if ($ticketCount > 0)
            {
                
                
                $query = "INSERT INTO households_gifts values (0,".$householdId.",'".date("Y-m-d H:i:s",strtotime($visitDate)) ."',".$taskTypeId.", ".$giftId .", ".$ticketCount. ",". $techOrder["id"]." ,2,now() ,4, now(),null)";
                $ds->insert($query);
                
                $json_data .= " - households gifts  Created ";
                
                // in case we gave incentive while installation, we should create a delivery incentive task - Round 1 (closed) and close task incentive call
                if ($taskTypeId == 12  && $statusId >= 4)
                {
                    
                    // create a closed incentive delivery - round 1 task
                    $query = "INSERT  INTO tasks values (0, 4 , 'Round 1 - Incentive Delivery within installation', now(), now() ,4,4, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                }
                
                if ( ($taskTypeId == 12 || $taskTypeId == 10 || $taskTypeId == 4 )  && $statusId >= 4 &&  $statusId <> 20)
                {
                    // Close incentive Call - round 1 task
                    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = 5 ";
                    $ds->insert($query);
                    
                    // create a new incentive Call - round 2 task
                    $query = "INSERT  INTO tasks values (0, 14 , 'Incentive Call - Round 2', DATE_ADD(now(), INTERVAL 100 DAY),null,4,0, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                    
                    if ($taskTypeId == 4)
                    {
                        // create a new Incentive Delivery Feedback Call TASK
//                         $query = "INSERT  INTO tasks values (0, 18 , 'Incentive Delivery Feedback Call After Incentive 1 Delivered',now(),null,1,0, now(), now() ,".$householdId .", null , null)";
//                         $ds->insert($query);
                        
                        
                    }
                    
                    
                }
                else if (( $taskTypeId == 15 )&& $statusId >= 4 &&  $statusId <> 20) // Incentive Round 2
                {
                    // Close incentive Call - round 2 task
                    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = 14 ";
                    $ds->insert($query);
                    
                    // create a new incentive Call - round 3 task
                    $query = "INSERT  INTO tasks values (0, 16 , 'Incentive Call - Round 3', DATE_ADD(now(), INTERVAL 100 DAY),null,4,0, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                    
//                     // create a new Incentive Delivery Feedback Call TASK
//                     $query = "INSERT  INTO tasks values (0, 18 , 'Incentive Delivery Feedback Call After Incentive 2 Delivered', now(),null,1,0, now(), now() ,".$householdId .", null , null)";
//                     $ds->insert($query);
                    
                }
                
                else if (( $taskTypeId == 17 )&& ( $statusId >= 4 &&  $statusId <> 20)) // Incentive Round 3
                {
                    // Close incentive Call - round 3 task
                    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = 16 ";
                    $ds->insert($query);
                    
                    // create a new incentive Call - round 4 task
                    $query = "INSERT  INTO tasks values (0, 19 , 'Incentive Call - Round 4', DATE_ADD(now(), INTERVAL 100 DAY),null,4,0, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                    
                    // create a new Incentive Delivery Feedback Call TASK
//                     $query = "INSERT  INTO tasks values (0, 18 , 'Incentive Delivery Feedback Call After Incentive 2 Delivered', now(),null,1,0, now(), now() ,".$householdId .", null , null)";
//                     $ds->insert($query);
                    
                }

                
                else if (( $taskTypeId == 20  )&& $statusId >= 4 &&  $statusId <> 20) // Incentive Round 4
                {
                    // Close incentive Call - round 4 task
                    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = 19 ";
                    $ds->insert($query);
                    
                    // create a new incentive Call - round 5 task
                    $query = "INSERT  INTO tasks values (0, 21 , 'Incentive Call - Round 4', DATE_ADD(now(), INTERVAL 100 DAY),null,4,0, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                    
                    // create a new Incentive Delivery Feedback Call TASK
                    //                     $query = "INSERT  INTO tasks values (0, 18 , 'Incentive Delivery Feedback Call After Incentive 2 Delivered', now(),null,1,0, now(), now() ,".$householdId .", null , null)";
                    //                     $ds->insert($query);
                    
                }
                
                else if (( $taskTypeId == 22  )&& $statusId >= 4 &&  $statusId <> 20) // Incentive Round 5
                {
                    // Close incentive Call - round 5 task
                    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = 21 ";
                    $ds->insert($query);
                    
                    // create a new incentive Call - round 6 task
                    $query = "INSERT  INTO tasks values (0, 23 , 'Incentive Call - Round 5', DATE_ADD(now(), INTERVAL 100 DAY),null,4,0, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                    
                    // create a new Incentive Delivery Feedback Call TASK
                    //                     $query = "INSERT  INTO tasks values (0, 18 , 'Incentive Delivery Feedback Call After Incentive 2 Delivered', now(),null,1,0, now(), now() ,".$householdId .", null , null)";
                    //                     $ds->insert($query);
                    
                }
                
                else if (( $taskTypeId == 24  )&& $statusId >= 4 &&  $statusId <> 20) // Incentive Round 6
                {
                    // Close incentive Call - round 6 task
                    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = 23 ";
                    $ds->insert($query);
                    
                    // create a new incentive Call - round 7 task
                    $query = "INSERT  INTO tasks values (0, 25 , 'Incentive Call - Round 6', DATE_ADD(now(), INTERVAL 100 DAY),null,4,0, now(), now() ,".$householdId .", null , null)";
                    $ds->insert($query);
                    
                    
                    // create a new Incentive Delivery Feedback Call TASK
                    //                     $query = "INSERT  INTO tasks values (0, 18 , 'Incentive Delivery Feedback Call After Incentive 2 Delivered', now(),null,1,0, now(), now() ,".$householdId .", null , null)";
                    //                     $ds->insert($query);
                    
                }
                
            }
            
            if (/*$taskTypeId == 11 && */( $statusId == 20 || $statusId == 3 ))
            {
                
            }
            else 
            {
            $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
            $ds->insert($query);
            
            }
            $json_data .= " - Close TASK ";
        }
        else if ($taskTypeId == 12 && ( $statusId == 2))
        {
            
            $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
            $ds->insert($query);
            
            $json_data .= " - Close TASK ";
        }
        
        
    }
 
 
    
    echo json_encode($json_data);  // send data as json format
    
}
 
/**
 * Demographic Panel Report
 * @param  $ds
 * @param  $mohafazaId
 * @param  $qadaaId
 * @param  $regionId
 * @param  $statusId
 * @param  $ratioId
 */
function getPanelData($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$ratioId )
{
    $conn = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $conn->set_charset("utf8");
    $requestData = $_REQUEST;
    $columns = array(
        
        0 => 'mohafaza',
        1 => 'qadaa',
        2 => 'region',
        3=> 'totalQuota',
        4=> 'openQuota',
        5=> 'quotaPercent',
        6=> 'totalPanel',
        7=> 'panelSuccess',
        8=> 'panelPercent',
        9=> 'lostCalls',
        10=> 'potentialCalls',
        11=> 'noAnswerCalls',
        12=> 'notCalledCalls',
        13=> 'topUser',
        14=> 'lessUser'
    );
    
    $sql = "  select mohafaza, qadaa, region
            ,totalQuota totalQuota, openQuota  openQuota, yesterdayReport as quotaPercent /*production percent*/
            ,totalPanel, panelSuccess, round((panelSuccess/totalPanel)*100,2) panelPercent
            ,lostCalls,potentialCalls,noAnswerCalls,notCalledCalls
            ,topUser, lessUser
             from ( SELECT  m.name  as mohafaza, q.name as qadaa, r.name as region
            		, (
                            select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.id in (
                                        select  household_id   from tvsets where household_id in (SELECT id FROM households where status_id in (4,5,6,20) )
                                                  and   (tvset_status_id)  not in  (0,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19)
        
                                                  group by household_id
                                                  having max(tvset_status_id) <>  2
                                                )
        
        
                                ) totalQuota
                    , (
                            select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.id in (
                                         select  household_id from tvsets where household_id in (SELECT id FROM households where status_id in (4,5,6,20) AND tvset_status_id = 2 )
                                        )
        
        
                                ) openQuota

                    , ( select   count(distinct h.id)  
            			   from  dates ,kpi  , households h
            				where zdate = kpi.report_date
                            and  h.region_id = r.id
                             and kpi.household_id = h.id
            				and kpi.report_date = DATE_ADD(CURDATE(), INTERVAL -3 DAY)) yesterdayReport

                    , g.panel_nb  totalPanel
                    ,(  select   count(distinct hh.id)   
                            from  
                            households hh , tech_orders tt 
                            where    hh.region_id = r.id    
                                and  tt.household_id = hh.id
                              and tt.tech_order_type_id = 1 
                              and hh.status_id in (4,5,6,20)) panelSuccess
            		,( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id  in (2,3,7,8,9,14,18) ) LostCalls
					 	,( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id   not in (2,3,4,5,6,7,8,9,14,18)
                            and  exists (select 1 from contacts where  household_id = o.id   and contact_type_id  = 10 and  status_id in (208,217)) )PotentialCalls
                     , ( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id   not in (2,3,4,5,6,7,8,9,14,18)
                              and  exists (select 1 from contacts where  household_id = o.id   and contact_type_id  = 10 and  status_id in (211,213,209,214,235))
        
                        ) NoAnswerCalls
                     ,( select count(1)
                        	from households o
                        	where    o.region_id = r.id and status_id not in   (2,3,4,5,6,7,8,9,14,18) and not exists (select 1 from contacts where  household_id = o.id )
                                and exists (select 1 from tasks where task_type_id =12 and tasks.household_id = o.id and closed  is null)
                            ) NotCalledCalls
					,0 TopUser
                    ,0 LessUser
        
   FROM  regions r, geo_panel g, governorates  m, districts q
                where r.id  = g.region_id
                and m.id = q.governorate_id
                and q.id =  r.district_id";
    
    
    
    //     if (!empty($telephone) && strlen(trim($telephone)) > 0) {
    //         $sql .= " and o.serv_line_no like '%" .$telephone. "%'";
    //     }
    
    //     if (!empty($statusId) && (trim($statusId)) <> "999") {
    //         $sql .= " and t.status_id in (" .$statusId. ")";
    //     }
    
    //     if(!empty($searchDate) && (trim($searchDate)) <> "999")
    //     {
    //         $sql.="   and DATE_FORMAT(t.updated_date, '%Y-%m-%d')   = '".$searchDate."'   ";
    
    //     }
    
    
    //     if (!empty($userId) && (trim($userId)) <> "999") {
    //         $sql .= " and t.user_id in (" .$userId. ")";
    //     }
    
    
    //     if (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11')
    //     {
    //         if (  $_SESSION['userRole'] != 1)
    //         {
    //             $sql .= " and t.user_id ='" . $userId. "'";
    //         }
    
    //     }
    
    if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
        
        $sql .= " and m.id in (" .$mohafazaId. ")";
    }
    
    if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
        
        $sql .= " and q.id in (" .$qadaaId. ")";
    }
    
    if (!empty($regionId) &&   implode(" , ",$regionId) != '999') {
        
        
        $sql .= " and r.id in (" . implode(" , ",$regionId). ")";
    }
    
    $sql .= "  )x where 1=1 " ;
    
    $calc= $ratioId + 1 ;
    
    if (!empty($ratioId) && strlen(trim($ratioId)) > 0 && $ratioId != 999  && $ratioId != 0) {
        
        $sql .= "    and (x.totalPanel * ". $ratioId. "  <= x.panelSuccess and x.totalPanel * ".$calc . "  >  x.panelSuccess )";
    }
    else if ( $ratioId == 0)
    {
        $sql .= "    and  x.totalPanel  > x.panelSuccess";
    }
    
    
    if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
        //         $sql.=" AND (  m.username LIKE '".$requestData['search']['value']."%' ";
        //         $sql.=" OR x.desc LIKE '".$requestData['search']['value']."%' ";
        
        //         $sql.=" OR  DATE_FORMAT(t.updated_date, '%d-%m-%Y') LIKE '".$requestData['search']['value']."%' )";
    }
    // print $sql;
    $query=mysqli_query($conn, $sql) or die("getServices.php: get Panel Data");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
    $query=mysqli_query($conn, $sql) or die("getServices.php: get Panel Data");
    $totalData = mysqli_num_rows($query);
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $nestedData=array();
        
        foreach($row as $index=>$value) {
            $nestedData[$index] = $value;
        }
        
        
        /*  $nestedData[] = $row["mohafaza"];
         $nestedData[] = $row["qadaa"];
         $nestedData[] = $row["region"];
         $nestedData[] = $row["totalQuota"];
         $nestedData[] = $row["openQuota"];
         $nestedData[] = $row["quotaPercent"];
         $nestedData[] = $row["totalPanel"];
         $nestedData[] = $row["panelSuccess"];
         $nestedData[] = $row["panelPercent"];
         $nestedData[] = $row["lostCalls"];
         $nestedData[] = $row["potentialCalls"];
         $nestedData[] = $row["noAnswerCalls"];
         $nestedData[] = $row["notCalledCalls"];*/
        
        $data[] = $nestedData;
    }
    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal"    => intval( $totalData ),  // total number of records
        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
    
    
}

/*get household DATA
 *
 * */
/**
 * Demographic Panel Report
 * @param  $ds
 * @param  $mohafazaId
 * @param  $qadaaId
 * @param  $regionId
 * @param  $statusId
 * @param  $ratioId
 */
function getTVMeterData($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$ratioId )
{
    $connMTV = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, "mtvdb");
    $connMTV->set_charset("utf8");
    $sql="SELECT max(list_devices) list_devices, report_date
             FROM mtvdb.households_reports where target = 1 and category = 1 and criteria = 1
             group by report_date";
    $query=mysqli_query($connMTV, $sql) or die("getServices.php: get Panel Data");
     $totalData = mysqli_num_rows($query);
     $data = array();
     while( $row=mysqli_fetch_array($query) ) {  // preparing an array
         $nestedData=array();
        
         foreach($row as $index=>$value) {
             $nestedData[$index] = $value;
             $output = json_decode($value);
             
             foreach($output as $item){
                 echo $item->device_id;
                 echo "<br>";
                 echo $item->household_id;
             }
         }
         
         $data[] = $nestedData;
     }
        
        
    $conn = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $conn->set_charset("utf8");
    $requestData = $_REQUEST;
    $columns = array(
        
        0 => 'mohafaza',
        1 => 'qadaa',
        2 => 'region',
        3=> 'totalQuota',
        4=> 'openQuota',
        5=> 'quotaPercent',
        6=> 'totalPanel',
        7=> 'panelSuccess',
        8=> 'panelPercent',
        9=> 'lostCalls',
        10=> 'potentialCalls',
        11=> 'noAnswerCalls',
        12=> 'notCalledCalls',
        13=> 'topUser',
        14=> 'lessUser'
    );
    
    $sql = "  select mohafaza, qadaa, region
            ,totalQuota totalQuota, openQuota  openQuota, round((openQuota/totalPanel)*100,2) quotaPercent /*production percent*/
            ,totalPanel, panelSuccess, round((panelSuccess/totalPanel)*100,2) panelPercent
            ,lostCalls,potentialCalls,noAnswerCalls,notCalledCalls
            ,topUser, lessUser
             from ( SELECT  m.name  as mohafaza, q.name as qadaa, r.name as region
            		, (
                            select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.id in (
                                        select  household_id   from tvsets where household_id in (SELECT id FROM households where status_id in (4,5,6) )
                                                  and   (tvset_status_id)  not in  (0,4,5,6,7,8,9,10,11,12,13,14,15,16,17)
                                                  
                                                  group by household_id 
                                                  having max(tvset_status_id) <>  2
                                                )


                                ) totalQuota
                    , (
                            select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.id in (
                                         select  household_id from tvsets where household_id in (SELECT id FROM households where status_id in (4,5,6) AND tvset_status_id = 2 )   
                                        )


                                ) openQuota
                    , g.panel_nb  totalPanel
                    ,( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id  in ( 4,5,6) ) panelSuccess
            		,( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id  in (2,3,7,8,9,14,18) ) LostCalls
					 	,( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id   not in (2,3,4,5,6,7,8,9,14,18)  
                            and  exists (select 1 from contacts where  household_id = o.id   and contact_type_id  = 10 and  status_id in (208,217)) )PotentialCalls
                     , ( select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.status_id   not in (2,3,4,5,6,7,8,9,14,18)
                              and  exists (select 1 from contacts where  household_id = o.id   and contact_type_id  = 10 and  status_id in (211,213,209,214,235))

                        ) NoAnswerCalls
                     ,( select count(1)
                        	from households o  
                        	where    o.region_id = r.id and status_id not in   (2,3,4,5,6,7,8,9,14,18) and not exists (select 1 from contacts where  household_id = o.id )
                                and exists (select 1 from tasks where task_type_id =12 and tasks.household_id = o.id and closed  is null)
                            ) NotCalledCalls
					,0 TopUser
                    ,0 LessUser 
 
   FROM  regions r, geo_panel g, governorates  m, districts q
                where r.id  = g.region_id
                and m.id = q.governorate_id
                and q.id =  r.district_id";
    
    
    
    //     if (!empty($telephone) && strlen(trim($telephone)) > 0) {
    //         $sql .= " and o.serv_line_no like '%" .$telephone. "%'";
    //     }
    
    //     if (!empty($statusId) && (trim($statusId)) <> "999") {
    //         $sql .= " and t.status_id in (" .$statusId. ")";
    //     }
    
    //     if(!empty($searchDate) && (trim($searchDate)) <> "999")
        //     {
        //         $sql.="   and DATE_FORMAT(t.updated_date, '%Y-%m-%d')   = '".$searchDate."'   ";
    
        //     }
    
    
    //     if (!empty($userId) && (trim($userId)) <> "999") {
    //         $sql .= " and t.user_id in (" .$userId. ")";
    //     }
    
    
    //     if (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11')
    //     {
    //         if (  $_SESSION['userRole'] != 1)
    //         {
    //             $sql .= " and t.user_id ='" . $userId. "'";
    //         }
    
    //     }
    
    if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
        
        $sql .= " and m.id in (" .$mohafazaId. ")";
    }
    
    if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
        
        $sql .= " and q.id in (" .$qadaaId. ")";
    }
    
    if (!empty($regionId) &&   implode(" , ",$regionId) != '999') {
        
        
        $sql .= " and r.id in (" . implode(" , ",$regionId). ")";
    }
    
    $sql .= "  )x where 1=1 " ;
    
    $calc= $ratioId + 1 ;
    
    if (!empty($ratioId) && strlen(trim($ratioId)) > 0 && $ratioId != 999  && $ratioId != 0) {
        
        $sql .= "    and (x.totalPanel * ". $ratioId. "  <= x.panelSuccess and x.totalPanel * ".$calc . "  >  x.panelSuccess )";
    }
    else if ( $ratioId == 0)
    {
        $sql .= "    and  x.totalPanel  > x.panelSuccess";
    }
    
    
    if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
        //         $sql.=" AND (  m.username LIKE '".$requestData['search']['value']."%' ";
        //         $sql.=" OR x.desc LIKE '".$requestData['search']['value']."%' ";
        
        //         $sql.=" OR  DATE_FORMAT(t.updated_date, '%d-%m-%Y') LIKE '".$requestData['search']['value']."%' )";
    }
     // print $sql;
    $query=mysqli_query($conn, $sql) or die("getServices.php: get Panel Data");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
    $query=mysqli_query($conn, $sql) or die("getServices.php: get Panel Data");
    $totalData = mysqli_num_rows($query);
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $nestedData=array();
        
        foreach($row as $index=>$value) {
            $nestedData[$index] = $value;
        }
        
        
        /*  $nestedData[] = $row["mohafaza"];
         $nestedData[] = $row["qadaa"];
         $nestedData[] = $row["region"];
         $nestedData[] = $row["totalQuota"];
         $nestedData[] = $row["openQuota"];
         $nestedData[] = $row["quotaPercent"];
         $nestedData[] = $row["totalPanel"];
         $nestedData[] = $row["panelSuccess"];
         $nestedData[] = $row["panelPercent"];
         $nestedData[] = $row["lostCalls"];
         $nestedData[] = $row["potentialCalls"];
         $nestedData[] = $row["noAnswerCalls"];
         $nestedData[] = $row["notCalledCalls"];*/
        
        $data[] = $nestedData;
    }
    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal"    => intval( $totalData ),  // total number of records
        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
    
    
}

 
/**
 * Demographic Panel Report
 * @param  $ds
 * @param  $mohafazaId
 * @param  $qadaaId
 * @param  $regionId
 * @param  $statusId
 * @param  $ratioId
 */
function getHouseholdData($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$ratioId )
{
    $conn = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $conn->set_charset("utf8");
    $requestData = $_REQUEST;
    $columns = array(
        
        0 => 'householdId',
        1 => 'name',
        2 => 'serv_line_no',
        3=> 'secondContact',
        4=> 'governorate',
        5=> 'district',
        6=> 'region',
        7=> 'full_address',
        
        8=> 'recruit_comments',
        9=> 'installationDate',       
        10=> 'installation_comments',
       
        
        11=> 'house_size',
        12=> 'socialClass',
        13=> 'religion' ,
        14=> 'statusName' ,
        15=> 'contactName' 
    );
    
    $sql = " select  hh.id householdId,  hh.name, 
            concat(phone_numb , '<br/>', mobile_numb) AS serv_line_no,
            concat(second_contact_name , '<br/>', second_mobile_numb) AS secondContact,
        
             m.name as governorate, q.name as district , r.name as region,
            
             concat( '<b>',area,'</b><BR><small><u>Area Details: </u>',area_details, '</b><BR/><u>Street: </u>', address, '<BR/><u>Building:</u> ', building, ' <BR><u>Floor:</u> ', floor, '</small>') full_address,

            recruit_comments, installationTable.date_of_visit installationDate,  installation_comments,
           
             house_size, 
            sc.name as socialClass, rr.name as religion,  ss.name statusName, xx.xxx contactName
            
            FROM  districts q, regions r, governorates  m, religions rr ,statuses ss,
             households hh
             left join social_classes sc
             on sc.id = hh.social_class_id
             left join 
            
             (select tv.date_of_visit , tt.household_id  household_id from  tech_orders tt, tech_visits tv 
				where   tt.id = tv.tech_order_id
                and tt.tech_order_type_id = 1
              
            
            )installationTable
             on installationTable.household_id = hh.id 

left join    
				(SELECT concat(cs.name ,'-', cc.comments) xxx , cc.household_id
				FROM contacts cc, contact_types ct,contacts_statuses cs
				WHERE cc.contact_type_id = ct.id
  and cs.id = cc.status_id
				AND cc.created_at = (SELECT  MAX(created_at)  FROM contacts c  WHERE c.household_id = cc.household_id GROUP BY c.household_id)
                  )xx
                   ON xx.household_id = hh.id


              where 1=1
              and rr.id = hh.religion_id
              and r.id  = hh.region_id
              and m.id = q.governorate_id
              and q.id =  hh.district_id 
              and hh.district_id =q.id
              and hh.governorate_id = m.id
              and ss.id = hh.status_id
/*and hh.status_id =1*/
                ";
    
    
    
    //     if (!empty($telephone) && strlen(trim($telephone)) > 0) {
    //         $sql .= " and o.serv_line_no like '%" .$telephone. "%'";
    //     }
    
        if (!empty($statusId) && (trim($statusId)) <> "999") {
            $sql .= " and ss.id in (" .$statusId. ")";
        }
    
    //     if(!empty($searchDate) && (trim($searchDate)) <> "999")
    //     {
    //         $sql.="   and DATE_FORMAT(t.updated_date, '%Y-%m-%d')   = '".$searchDate."'   ";
    
    //     }
    
    
    //     if (!empty($userId) && (trim($userId)) <> "999") {
    //         $sql .= " and t.user_id in (" .$userId. ")";
    //     }
    
    
//         if (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11')
//         {
//             if (  $_SESSION['userRole'] != 1)
//             {
//                 $sql .= " and t.user_id ='" . $userId. "'";
//             }
    
//         }
    
    if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
        
        $sql .= " and m.id in (" .$mohafazaId. ")";
    }
    
    if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
        
        $sql .= " and q.id in (" .$qadaaId. ")";
    }
    
    if (!empty($regionId) &&   implode(" , ",$regionId) != '999') {
        
        
        $sql .= " and  r.id in (" . implode(" , ",$regionId). ")";
    }
    
   // $sql .= "  )x where 1=1 " ;
    
//     $calc= $ratioId + 1 ;
    
//     if (!empty($ratioId) && strlen(trim($ratioId)) > 0 && $ratioId != 999  && $ratioId != 0) {
        
//         $sql .= "    and (x.totalPanel * ". $ratioId. "  <= x.panelSuccess and x.totalPanel * ".$calc . "  >  x.panelSuccess )";
//     }
//     else if ( $ratioId == 0)
//     {
//         $sql .= "    and  x.totalPanel  > x.panelSuccess";
//     }
    
    
    if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
        //         $sql.=" AND (  m.username LIKE '".$requestData['search']['value']."%' ";
        //         $sql.=" OR x.desc LIKE '".$requestData['search']['value']."%' ";
        
        //         $sql.=" OR  DATE_FORMAT(t.updated_date, '%d-%m-%Y') LIKE '".$requestData['search']['value']."%' )";
    }
   //print $sql;
    $query=mysqli_query($conn, $sql) or die("getServices.php: get Panel Data");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']. " limit 0,1000";// "  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
    $query=mysqli_query($conn, $sql) or die("getServices.php: get Panel Data");
    $totalData = mysqli_num_rows($query);
    $data = array();
    while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $nestedData=array();
        
        foreach($row as $index=>$value) {
            $nestedData[$index] = $value;
        }
        
        
  
        
        $data[] = $nestedData;
    }
    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal"    => intval( $totalData ),  // total number of records
        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );
    echo json_encode($json_data);  // send data as json format
    
    
}
function updateStatus($ds, $ogeroId, $userId, $statusId,$otherComment)
{
    if ($statusId != null && !empty($statusId))
    
    {
        
        if ($statusId == 5 || $statusId == 7)
        {
            
            $query = " SELECT COUNT(date_of_call) countNA
                       FROM quota_logs x
                       WHERE  x.status_id IN (5 , 7)
                       AND x.comments NOT IN ('Introduction' , 'otherClicked','acceptClicked','stopClicked')
                       and x.quota_id = " .$ogeroId;
            
            $zResult = $ds->select($query);
            
            foreach ($zResult as $quotaData) {
                
                $countNA =  $quotaData["countNA"];
            }
            
            if ($countNA > 6)
            {
                $statusId = 15;
                $otherComment= "Not reached - tried 5 times";
            }
            
        }
        $query = "update quota set status_id = ". $statusId ." , updated_date=now(), user_id = " . $userId .", comments=  '".  mysqli_real_escape_string($ds->getConnection(),$otherComment)."' where ogero_id = " .$ogeroId;
      
        $ds->insert($query);
        
    }
    updatequotalogs($ds, $ogeroId, $userId, $statusId,$otherComment);
    
}

function updatequotalogs($ds, $ogeroId, $userId, $statusId,$otherComment)
{
    
     $query = "insert into quota_logs (quota_id, user_id, date_of_call, status_id, date_of_end_call, comments)
                 values (".$ogeroId. "," .$userId. ",now() ,". $statusId . " , now(),'" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."')";
       $ds->insert($query);
    $json_data = null;
    
    echo json_encode($json_data);  // send data as json format 
}


function  updateTechVisits($ds, $pkId, $distance)
{
    
    $query = " update tech_visits set distance = ".$distance .  "  where id =".$pkId;
    
    $ds->insert($query);
    
    $json_data = null;
    
    echo json_encode($json_data); 
    
}

function  updateAddress($ds, $pkId, $house_size ) // ,$area,$area_details,$address,$building,$floor)
{
   
    
 
    
    $query = " update households  set   " . array_keys($_POST)[1]  . "  = '".array_values($_POST)[1].  "'  where id =".$pkId;
  //  echo $query;
    
    $ds->insert($query);
    
    $json_data = null;
    
    echo json_encode($json_data);
    
}


function  updateTV($ds, $pkId, $house_size ) 
{
   $query = " update tvsets  set   " . array_keys($_POST)[1]  . "  = '".array_values($_POST)[1].  "'  where id =".$pkId;
  //echo $query;
  
    $ds->insert($query);
    
    
    if (array_keys($_POST)[1] == 'comments' )
    {
 
        $query = "insert into tvmeters_log
          SELECT 0,id,room_id, tvm_serial, tvm_sim_serial,'".array_values($_POST)[1].  "' , 1,  now(),  now() 
            FROM tvsets where      id =".$pkId;
            $ds->insert($query);
        
    }
    
    
    if (array_keys($_POST)[1] == 'tvm_serial' )
    {
   
        $query = "insert into tvmeters_log
         SELECT 0,id,room_id  ,'".array_values($_POST)[1].  "'  , tvm_sim_serial, 'changed TV METER' , 1,  now(),  now()
            FROM tvsets where      id =".$pkId;
            $ds->insert($query);
        
    }
    
    
    
    if (array_keys($_POST)[1] == 'tvm_sim_serial')
    {
 
        $query = "insert into tvmeters_log
          SELECT 0,id,room_id, tvm_serial, '".array_values($_POST)[1].  "' , 'changed DONGLE',  1,  now(),  now()
            FROM tvsets where      id =".$pkId;
            $ds->insert($query);
        
    }
    $json_data = null;
    
    echo json_encode($json_data);
    
}


function  updateTVReceiver($ds, $pkId, $house_size ) // ,$area,$area_details,$address,$building,$floor)
{
    
    
    
    
    $query = " update tvset_reception_levels  set   reception_id  = '".array_values($_POST)[1].  "'  where tvset_id =".$pkId;
     echo $query;
    
    $ds->insert($query);
    
    $json_data = null;
    
    echo json_encode($json_data);
    
}

function  updateTVSatellite($ds, $pkId, $house_size ) // ,$area,$area_details,$address,$building,$floor)
{
    
    
    
    
    $query = " update tvset_satellite  set   " . array_keys($_POST)[1]  . "  = '".array_values($_POST)[1].  "'  where tvset_id =".$pkId;
    //echo $query;
    
    $ds->insert($query);
    
    $json_data = null;
    
    echo json_encode($json_data);
    
}


function  updateMembers($ds, $pkId, $comments) // ,$area,$area_details,$address,$building,$floor)
{
        
    $query = " update members  set   " . array_keys($_POST)[1]  . "  = '".array_values($_POST)[1].  "'  where id =".$pkId;
  
    
    $ds->insert($query);
    
    $json_data = null;
    
    echo json_encode($query);
    
}


function updateContactlogs($ds, $householdId, $userId, $statusId,$otherComment,$taskTypeId)
{
    
    //Welcome Call
    if ($taskTypeId == 7)
    {
        $contactTypeId = 4;
    }
    
    // Coincidential check
    else if ($taskTypeId == 8)
    {
        $contactTypeId = 7;
    }
    
    // Maintenance 
    else if ($taskTypeId == 10)
    {
        $contactTypeId = 1;
    }
    
    // Dismantling 
    else if ($taskTypeId == 11)
    {
        $contactTypeId = 9;
    }
    
    // New Installation
    else if ($taskTypeId == 12)
    {
        $contactTypeId = 10;
    }
    
    // Incentive Call - Round 1
    else if ($taskTypeId == 5)
    {
        $contactTypeId = 3;
    }
    
    // Incentive Call - Round 2
    else if ($taskTypeId == 14)
    {
        $contactTypeId = 13;
    }
    
    // Incentive Call - Round 3
    else if ($taskTypeId == 16)
    {
        $contactTypeId = 16;
    }
    
    // Incentive Call - Round 4
    else if ($taskTypeId == 19)
    {
        $contactTypeId = 19;
    }
    
    // Incentive Call - Round 5
    else if ($taskTypeId == 21)
    {
        $contactTypeId = 21;
    }
    
    // Incentive Call - Round 6
    else if ($taskTypeId == 23)
    {
        $contactTypeId = 23;
    }
    
    
    
    // Incentive Delivery - Round 1
    else if ($taskTypeId == 4)
    {
        $contactTypeId = 11;
    }
    // Incentive Delivery - Round 2
    else if ($taskTypeId == 15)
    {
        $contactTypeId = 14;
    }
    
    // Incentive Delivery - Round 3
    else if ($taskTypeId == 17)
    {
        $contactTypeId = 17;
    }
    
    // Incentive Delivery - Round 4
    else if ($taskTypeId == 20)
    {
        $contactTypeId = 20;
    }
    
    
    // Incentive Delivery - Round 5
    else if ($taskTypeId == 22)
    {
        $contactTypeId = 22;
    }
      
    
    // Incentive Delivery - Round 6
    else if ($taskTypeId == 24)
    {
        $contactTypeId = 24;
    }
    
    
    // Regret Call 
    else if ($taskTypeId == 13)
    {
        $contactTypeId = 12;
    }
    
    
    // Incentive Delivery Feedback Call
    else if ($taskTypeId == 18)
    {
        $contactTypeId = 15;
    }
    
    
   $query = "insert into contacts  ( 
        `contact_type_id`,
        `inout`,
        `comments`,
        `created_at`,
        `user_id`,
        `updated_at`,
        `household_id`,
        `status_id`)
         values 
         (".$contactTypeId.", 1 ,'" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."', now(), ".$userId.", now(), ".$householdId.", ". $statusId .")";
    $ds->insert($query);
    $json_data = null;
    
    echo json_encode($json_data);  // send data as json format
}



function closeTask($ds, $hhId, $userId, $taskTypeId,$taskId)
{
    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$hhId . " and task_type_id = " . $taskTypeId;
    $ds->insert($query);
    $json_data = null;
    
    echo json_encode($json_data);  // send data as json format
}


function closeTechOrderFn($ds, $hhId, $userId, $taskTypeId,$taskId)
{
    $query = "update tech_orders set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$hhId . " and (closed_by = 0 or closed_by is null) " ;
    $ds->insert($query);
    $json_data = null;
    
    echo json_encode($json_data);  // send data as json format
}


function  moveHHtoProduction($ds, $hhId, $userId, $taskTypeId)
{
    $query = "update households set  status_id = 6, updated_at=now()   where id = " .$hhId;
    $ds->insert($query);
    
    
    
    $query = "   INSERT INTO household_status (`household_id`, `created_at`, `status_id`, `user_id`, `updated_at`)
                VALUES (".$hhId.", now() , '5', '4', now() );
                ";
    
    $ds->insert($query);
 
 
    $query = "   INSERT INTO household_status (`household_id`, `created_at`, `status_id`, `user_id`, `updated_at`) 
                VALUES (".$hhId.", DATE_ADD(now(), INTERVAL +3 HOUR) , '6', '4',  DATE_ADD(now(), INTERVAL +3 HOUR) );
                ";
    
    $ds->insert($query); 
    
    
    $query = "insert into tvsets_log
    SELECT 0,id, now(), 2, 1, now(), 'activated'
        FROM tvsets where     (tvset_status_id = 1 or tvset_status_id  is null) and household_id = ".$hhId;
    $ds->insert($query); 
    
    $query = "update tvsets set tvset_status_id=2 , updated_at=now() where     (tvset_status_id = 1 or tvset_status_id  is null) and household_id =".$hhId;
        
    $ds->insert($query); 
    
    $json_data = null;
    
    echo json_encode($json_data);  // send data as json format
    
}

function  moveHHtoInactive($ds, $hhId, $userId, $taskTypeId)
{
    $query = "update households set  status_id = 4, updated_at=now()    where id = " .$hhId;
    $ds->insert($query);
    
    
    
    $query = "   INSERT INTO household_status (`household_id`, `created_at`, `status_id`, `user_id`, `updated_at`, comments)
                VALUES (".$hhId.", now() , '4', '4', now() , 'Set to Inactive upon monitoring');
                ";
    
    $ds->insert($query);
    
    // Create coincidential check directly
    $query = " SELECT count(id) id FROM tasks where household_id =  " .$hhId . "  and task_type_id = 8 and closed_by = 0  limit 1";
    $resultset= $ds->select($query);
    //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
    foreach ($resultset as $quotaData) {
        $quotaData["id"];
        
    }
    if (  $quotaData["id"]== 0 )
    {
    
        $query = " insert into tasks (`id`,
                                            `task_type_id`,
                                            `comments`,
                                            `opened`,
                                            `closed`,
                                            `opend_by`,
                                            `closed_by`,
                                            `created_at`,
                                            `updated_at`,
                                            `household_id`,
                                            `comments_details`)
                            values (0,8, '!!!Inactive HOUSEHOLD!!! <BR/> all tv meters are inactive',  now(),null, " . $userId .", 0,now(),now(),". $hhId .", now())";
        
        $ds->insert($query);
        
        $query = "update tvsets set tvset_status_id=1 , updated_at=now() where     (tvset_status_id =  2) and household_id =".$hhId;
        
        $ds->insert($query);
        
        
        $query = "insert into tvsets_log
            SELECT 0,id, now(), 1, 1, now(), 'inactive'
        FROM tvsets where     (tvset_status_id = 1) and household_id = ".$hhId;
        $ds->insert($query); 
        
        $json_data = null;
    
    }
  
  // set the related tv meters to inactive /*TODO*/ 
    
    
    $json_data = null;
    echo json_encode($json_data);  // send data as json format
}



function createIncentiveDelivery($ds, $hhId, $userId, $taskTypeId,$taskId)
{
    // Step 1 - Close current Incentive Call Round
    $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$hhId . " and task_type_id = " . $taskTypeId;
    
     $ds->insert($query);
     
     
    $contactTypeId= 3; 
    $roundNb= 0;
     if ($taskTypeId == 5)
     {
         $contactTypeId= 3; 
         $newtaskTypeId = 4;
         $roundNb = 1;
     }
     else if ($taskTypeId == 14)
     {
         
         $contactTypeId= 13; 
         $roundNb = 2;
         $newtaskTypeId = 15;
     }
     
     else if ($taskTypeId == 16)
     {
         
         $contactTypeId= 16;
         $roundNb = 3;
         $newtaskTypeId = 17;
     }
    
     
     else if ($taskTypeId == 19)
     {
         
         $contactTypeId= 19;
         $roundNb = 4;
         $newtaskTypeId = 20;
     }
     
     else if ($taskTypeId == 21)
     {
         
         $contactTypeId= 21;
         $roundNb = 5;
         $newtaskTypeId = 22;
     }
     
     else if ($taskTypeId == 23)
     {
         
         $contactTypeId= 23;
         $roundNb = 6;
         $newtaskTypeId = 24;
     }
     
     
     
     else if ($taskTypeId == 25)
     {
         
         $contactTypeId= 25;
         $roundNb = 7;
         $newtaskTypeId = 26;
     }
     
     
     
     
    //Step 2 - Create appropriate Incentive Delivery Round 
 
    $query = " insert into tasks (`id`,
                                        `task_type_id`,
                                        `comments`,
                                        `opened`,
                                        `closed`,
                                        `opend_by`,
                                        `closed_by`,
                                        `created_at`,
                                        `updated_at`,
                                        `household_id`,
                                        `comments_details`)

                select 
                0,  " . $newtaskTypeId." , 
                 concat('Incentive Delivery - Round ".$roundNb.": ',(select comments from contacts where household_id =". $hhId ." and contact_type_id= ".$contactTypeId." and status_id =208  order by updated_at desc limit 1)) 
                 ,now(),null, " . $userId .", 0,now(),now(),". $hhId .", now()
                from dual
                ";
    
     $ds->insert($query);
 
  
    $json_data = null;
    
    echo json_encode($json_data);  // send data as json format
}


function insertQuestionnaire($ds, $ogeroId, $userId, $statusId,$otherComment)
{
    if ($statusId != null && !empty($statusId))
    {
        $query = " SELECT id FROM questionnaire where quota_id =  " .$ogeroId . " limit 1";
        $resultset= $ds->select($query);
        
        if (!empty($resultset)) 
        {
            //update questionnaire /*TODO*/
        
        }
        else
        {
        
            $query = " insert into questionnaire (id, quota_id, date_recruitment, user_id, status, start_datetime)
                        values (0, " .$ogeroId . ", now(), " . $userId .", ". $statusId .", now())";
     
              $ds->insert($query);
        }
        
        updateStatus($ds, $ogeroId, $userId, $statusId, $otherComment);
    }

}

function  loadQuota($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$total,$userId)
{
    
    $regionId= implode(',', explode(',',$regionId));
 
    
    
    $query =  "insert into quota
            select  x.AI, x.ogero_id   , x.status_id   , x.comments  ,x.user_id,x.regionId,x.createDate, x.updatedDate, x.userId
            from
            (
            select 0 as AI , o.id as ogero_id   , 1 as status_id   , 'exportOgero' as comments
              , 0 as user_id  , o.region_id regionId, now() createDate , null as updatedDate, " .$userId. " as userId
                  
         from ogero  o, mohafaza m, qadaa q, regions r
            where o.processed = 0
            and m.id = q.mohafaza_id
            and q.id =  r.qadaa_id
            and m.id = r.mohafaza_id
            and o.region_id = r.id
            and r.status = 1
            and m.status = 1
            and q.status = 1
            AND O.id NOT IN  (SELECT  Q.ogero_id FROM quota Q WHERE Q.region_id = r.id )";
    
    
    
    if(!empty($mohafazaId)  && $mohafazaId != "999")
    {
        $query .= " and m.id in (".$mohafazaId.")";
    }
    
    if(!empty($qadaaId) && $qadaaId != "999")
    {
        $query .= " and q.id in (".$qadaaId.")";
    }
    
    if (!empty($regionId) && $regionId != "999") {
        
        $query .= " and r.id in (" .$regionId. ")";
    }
    
    
    
    $query .=    "  order by rand()
             )x order by rand() limit " .$total;
    
   // print $query;
    if($stmtx = mysqli_prepare($ds->conn , $query)){
        mysqli_stmt_execute($stmtx);
    }
    else {
        $json_data = array(
            "zError" => "ERROR: Could not prepare query: $query. " . mysqli_error($ds->conn)
        );
        echo json_encode($json_data);
    }
 
    
    $query ="";
    $query = " update ogero  set processed = 1 where id in  (
                      select x.ogero_id
                      from quota x,mohafaza m, qadaa q, regions r
                      where OGERO.region_id =x.region_id
                      and OGERO.region_id = r.id
                      and OGERO.id =  x.ogero_id
                      and m.id = q.mohafaza_id
                      and OGERO.mohafaza_id = m.id
                      and q.id =  r.qadaa_id
                      and OGERO.qadaa_id = q.id
                      and m.id = r.mohafaza_id
                      and r.status = 1
                      and m.status = 1
                      and q.status = 1";
    
    
    if(!empty($mohafazaId)  && $mohafazaId != "999")
    {
        $query .= " and m.id in (".$mohafazaId.")";
    }
    
    if(!empty($qadaaId) && $qadaaId != "999")
    {
        $query .= " and q.id in (".$qadaaId.")";
    }
    
    if (!empty($regionId) && $regionId != "999") {
        
        $query .= " and r.id in (" .$regionId. ")";
    }
    
    $query .= "   )  and processed = 0 ";
    
    
   // print $query;
    
    
    if($stmtx = mysqli_prepare($ds->conn , $query)){
        mysqli_stmt_execute($stmtx);
    }
    else {
        
        $json_data = array(
            "zError" => "ERROR: Could not prepare query: $query. " . mysqli_error($ds->conn)
        );
        echo json_encode($json_data);
       
    }
    
}
/**
 * 
 * @param  $ds
 * @param  $ogeroId
 * @param  $userId
 * @param  $statusId
 * @param  $otherComment
 */
function updateQuestionnaire($ds, $ogeroId, $userId, $statusId,$otherComment)
{
    if ($statusId != null && !empty($statusId))
    {
        $insertPass=0;
        $query = " SELECT id FROM questionnaire where quota_id =  " .$ogeroId . " limit 1";
        $resultset= $ds->select($query);
        
        if (empty($resultset))
        {
            $query = " insert into questionnaire (id, quota_id, date_recruitment, user_id, status, start_datetime)
                        values (0, " .$ogeroId . ", now(), " . $userId .", ". $statusId .", now())";
            
            
            if($stmtx = mysqli_prepare($ds->conn , $query)){
                mysqli_stmt_execute($stmtx);
            }
            else {
                echo "ERROR: Could not prepare query: $query. " . mysqli_error($ds->conn);
            }
            
            // $ds->insert($query);
            $insertPass=1;
        }
        
        if (!empty($resultset) || $insertPass==1 )  //update questionnaire
        {
            
            $updateStr="UPDATE QUESTIONNAIRE SET  processed=processed ";
            
            foreach($_POST as $key => $val) {
                
                
                if ($key != "ogeroId" && $key  != "userId"   && $key  != "statusId"   && $key  != "action"   && $key  != "otherComment" )
                {
                    if (strlen($val) == 0 )
                    {
                        
                        $updateStr.=",". $key  . "= NULL";
                    }
                    ELSE
                    {
                        
                        $updateStr.=",". $key  . "='".mysqli_real_escape_string($ds->getConnection(),$val)."'";
                    }
                    
                    
                }
            }
            
            $updateStr .= "  where quota_id  =  " .$ogeroId ;
            
            $link = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
            // Prepare an insert statement
            $sql = $updateStr;
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                //mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $email);
                mysqli_stmt_execute($stmt);
                if ( mysqli_error($link))
                {
                    
                    $json_data = array(
                        "zError" =>  mysqli_error($link)
                    );
                    echo json_encode($json_data);  // send data as json format
                }
                else
                {
                    
                    // updateStatus($ds, $ogeroId, $userId, $statusId, $otherComment);
                    if ($statusId == 2) // // update Status for Success on Finish only
                    {
                        $updateStr = " update questionnaire set end_datetime = now(), status = 2  where quota_id =  " .$ogeroId ;
                        $ds->insert($updateStr);
                        updateStatus($ds, $ogeroId, $userId, $statusId, $otherComment);
                    }
                    else
                    {
                        updatequotalogs($ds, $ogeroId, $userId, $statusId,$otherComment);
                    }
                    
                    
                    
                }
                
                
            } else
            {
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
            }
            
            
            
            // Close statement
            mysqli_stmt_close($stmt);
            
            // Close connection
            mysqli_close($link);
            
            
        }//end update
        
    }
    
    
    
}

function getMohafaza($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM governorates ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Mohafaza...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="<option value='". $row["id"]."' >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}


function getBrands($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM brands ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getBrands...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="{value:'". $row["id"]."', text: '".$row["name"]."'}";
        
    }
    
    echo json_encode($data);
}

function getRooms($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM rooms ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getRooms...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="{value:'". $row["id"]."', text: '".$row["name"]."'}";
        
    }
    
    echo json_encode($data);
}


function getReligion($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM religions ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getReligion...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="{value:'". $row["id"]."', text: '".$row["name"]."'}";
        
    }
    
    echo json_encode($data);
}


function getScreen($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM screen_types ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getScreen...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="{value:'". $row["id"]."', text: '".$row["name"]."'}";
        
    }
    
    echo json_encode($data);
}


function getReceiver($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM reception_levels ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getScreen...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="{value:'". $row["id"]."', text: '".$row["name"]."'}";
        
    }
    
    echo json_encode($data);
}

function getSatellite($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id,  name FROM satellites ";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query getSatellite...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="{value:'". $row["id"]."', text: '".$row["name"]."'}";
        
    }
    
    echo json_encode($data);
}



function getQadaa($ds, $mohafazaId)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    $sql = "SELECT id, name FROM districts WHERE  governorate_id= ". $mohafazaId."  ";
 
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Qadaa...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
          $data[] ="<option value='". $row["id"]."' >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}

function getRegion($ds, $qadaaId)
{
  
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    //if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) != 1) {
        
        $sql = "SELECT id, name FROM regions WHERE district_id = ".$qadaaId."  ";
   // }
    
   /* else {
        $sql = " SELECT rr.id,
        concat (rr.region, ' ___Total: ',rr.total
        , '___Processed: ',( select count(1) from ogero o , quota q, regions r  where o.id =  q.ogero_id and  o.region_id = r.id and o.processed = 1 and r.status = 1  and o.region_id = rr.id)) name
        FROM regions rr where  rr.qadaa_id = ".$qadaaId." and  rr.status = 1";
    }*/
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Region ...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="<option value='". $row["id"]."' >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}

function getTaskStatusType($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    if ( $_SESSION['userId'] == 1  || $_SESSION['userId'] ==38)
    $sql = "SELECT id,name FROM task_types where id in  (4, 5 , 7 , 8, 10, 11,12,14 ,15, 16,17, 19,20 ,21,22,23,24) order by sortId";
    else
        $sql = "SELECT id,name FROM task_types where id in  (7,18 ) order by name";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Status...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        if ($row["id"] == 0)
            $selected = " selected ";
            else
                $selected = "";
                
                $data[] ="<option value='". $row["id"]."' ".$selected ." >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}

function getContactStatuses($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    
    $sql = "SELECT   id ,   name  FROM  contacts_statuses where id  in (213,215,217,235,228,219,212,211,229,214,208,236,237,238)";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Status...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        if ($row["id"] == 0)
            $selected = " selected ";
            else
                $selected = "";
                
                $data[] ="<option value='". $row["id"]."' ".$selected ." >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}


function getTaskStatus($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    
    $sql = "SELECT  1 id ,   'OPEN 'name  FROM  DUAL UNION SELECT 2 ID, 'CLOSED' NAME FROM DUAL";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Status...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        if ($row["id"] == 1)
            $selected = " selected ";
            else
                $selected = "";
                
                $data[] ="<option value='". $row["id"]."' ".$selected ." >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}

function getStatus($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
      
        $sql = "SELECT   id ,   name  FROM  statuses";
  
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query Status...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        if ($row["id"] == 1)
           $selected = " selected ";
        else 
            $selected = "";
        
        $data[] ="<option value='". $row["id"]."' ".$selected ." >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}

function getUsers($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
   
 
    $sql =" SELECT id, name as name FROM users where id in (7,8,10)";
   
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    
    $data = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
        $data[] ="<option value='". $row["id"]."' >".$row["name"]."</option>";
    }
    
    echo json_encode($data);
}


function retrieveInstallationGraph($ds)
{
    
    $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
    $DBconnect->set_charset("utf8");
    
    
    $sql ="  SELECT count(id) hhNumber, DATE_FORMAT( installation_date, '%Y-%m') zDate  FROM households where status_id in (4,5,6 )
            and  DATE_FORMAT( installation_date, '%Y-%m') not like '0000-00' 
            group by  DATE_FORMAT( installation_date, '%Y-%m')
            order by  DATE_FORMAT( installation_date, '%Y-%m') ;";
    
    
    
    $query = mysqli_query($DBconnect, $sql) or die("Mysql Mysql Error in getting : get query ...  ". $sql);
    
    $data = array();
    $data1 = array();
    while ($row = mysqli_fetch_array($query)) {  // preparing an array
    
        $data[]=  array('hhNumber' => $row["hhNumber"] ,
            'zDate' =>  $row["zDate"]);
    }
    
    echo json_encode($data);
}


/**`lOGGING ERRORS 
 * 
 * @param   $ds
 * @param   $ogeroId
 * @param   $userId
 * @param   $statusId
 * @param   $otherComment
 */
function insertErrorLogs($ds, $ogeroId, $userId, $statusId,$otherComment)
{
    
            
            $query = ' insert into error_logs (id, error, error_date, user_id, quota_id)
                        values (0, "' .$otherComment . '", now(), ' . $userId .', '. $ogeroId  .' )';
            
            $ds->insert($query);
        
           /* $json_data = array(
                 "data" => $query   // total data array
            );
            
            echo json_encode($json_data);  */
    
}

function generateExcel($ds, $hhId)
{
 
    $output = '';
 
        
        
        $DBconnect = mysqli_connect(DataSource::HOST,DataSource::USERNAME, DataSource::PASSWORD, DataSource::DATABASENAME);
        $DBconnect->set_charset("utf8");
//         $query = "select ct.name contactTaskName, m.username,cs.name contactStatus, c.inout, c.comments, o.name householdname, c.created_at zDate
//             from contacts c, contact_types ct  , members_users m, contacts_statuses cs, households o
//             where ct.id = c.contact_type_id
//             and m.id = c.user_id
//             and o.id = c.household_id
//             and cs.id = c.status_id
//             and c.household_id =  " . $hhId . " order by c.created_at desc  ";
        
        
 
        
        
        
        $query = "SELECT 1 FROM households where id = "   . $hhId ;
        $result = mysqli_query($DBconnect, $query);
      
         $items = array();
        
        //Store table records into an array
         while( $row = $result->fetch_assoc() ) {
              $items[] = $row;
         }
    
            //Define the filename with current date
            $fileName = "itemdata-".date('d-m-Y').".xls";
            
            //Set header information to export data in excel format
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename='.$fileName);
            echo  $fileName;
            //Set variable to false for heading
            $heading = false;
            
//             //Add the MySQL table data to excel file
            if(!empty($items)) {
                foreach($items as $item) {
                    if(!$heading) {
                        echo implode("\t", array_keys($item)) . "\n";
                        $heading = true;
                    }
                    echo implode("\t", array_values($item)) . "\n";
                }
            }
              exit();
        
 
}
?>