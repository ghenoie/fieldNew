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
	

    switch ($action) {
        
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
            getTasks($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$taskStatusId,$contactStatusId,$userId,$zUserId,$telephone,$searchDate);
            break;
        case 'getQuotaData' :
            getQuotaData($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$zUserId,$telephone, $searchDate);
            break;

            
        case 'getPanelData' :
            getPanelData($ds, $mohafazaId, $qadaaId, $regionId, $statusId, $ratioId);
            break;
            
        case 'getTechInvoices' :
            getTechInvoices($ds,$paidId, $techUserId, $amountId);
            break;
            
        case 'updateStatus' :
            updateStatus($ds, $ogeroId, $userId, $statusId, $otherComment);
            break;
            
        case 'updateContacts' :
            updateContacts($ds, $ogeroId, $userId, $statusId, $otherComment,$taskId, $visitDate);
            break;
            
            
        case 'updateHousehold' :
            updateHousehold($ds, $ogeroId, $userId, $statusId, $otherComment,$taskId, $visitDate,$techUserId, $orderNbId);
                break;
                
        case 'closeTask' :
            closeTask($ds, $hhId, $userId, $taskTypeId,$taskId);
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
function getTasks($ds, $mohafazaId, $qadaaId, $regionId, $statusId,$taskStatusId,$contactStatusId,$userId,$zUserId,$telephone,$searchDate)
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
    );
    $sql = "  select  hhId, hhName, serv_line_no,full_address,mohafaza,mohafazaId,regionId,districtId,region,isProcessed,statusId,contactComments, 
                      username,taskIdlink,taskUpdatedAt,taskTypeName,taskTypeId,taskComments, visitDate 
            from (
           SELECT 
             o.id as hhId,
             o.name as hhName,
              concat(phone_numb , '<br/><i class=fa fa-mobile aria-hidden=true></i>', mobile_numb,'<br/>', second_mobile_numb)AS serv_line_no,
             concat( '<b>',area,'</b><BR><small><u>Area Details: </u>',area_details, '</b><BR/><u>Street: </u>', address, '<BR/><u>Building:</u> ', building, ' <BR><u>Floor:</u> ', floor, '</small>') full_address,
             (select username from members_users where id = xx.user_id limit 1 )username,
             m.name mohafaza,
             m.id  mohafazaId,
             d.id  as districtId,
             r.id as regionId,
             r.name as region,
             0 isprocessed,
             concat('<u>', xx.name, '</u>: ', (SELECT name FROM contacts_statuses p WHERE p.id = xx.status_id) ) statusId,
             ta.updated_at as taskUpdatedAt,";
    
    //Incentive Call
    if ($statusId == '5')
    {
        $sql .= " (
                SELECT    concat( 'Unplugged:<B>' ,  (select count(ts.id)   from tvsets ts where  ts.household_id = hh.id and ts.tvset_status_id <> 2), ' </B><BR/> Visited at:<BR/>', tt.date_of_visit) 
                       from tech_orders oo , tech_visits tt, households hh 
                        where oo.id = tt.tech_order_id
                        and oo.household_id = hh.id
                        and hh.status_id in (4,5,6)
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
             xx.comments as contactComments,
             ta.id AS taskIdlink,";
    
    
    //Incentive Call
    if ($statusId == '5')
    {
        $sql .= " (
                SELECT   case when ceiling(datediff(now(), tt.date_of_visit) 
                                 + ( (select count(id) from tvsets ts where ts.household_id = hh.id
                                	and ts.tvset_status_id = 2)*5)  /2 ) > 50 
                        
                        then 
                         ceiling(datediff(now(), tt.date_of_visit) 
                                 + ( (select count(id) from tvsets ts where ts.household_id = hh.id
                                	and ts.tvset_status_id = 2)*5)  /2 ) 
                    
                        else 0 end  points
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
        $sql.=" ta.comments as taskComments,";
    }
    
        
    $sql.="  ta.visit_date as visitDate
                ";
    
    $sql .= " from  regions r, districts d, governorates m, task_types ty, tasks ta,  households o   
     LEFT JOIN (SELECT cc.status_id,
					cc.household_id,
					cc.comments,
					cc.user_id,
					ct.name,
					ct.id
				FROM contacts cc, contact_types ct
				WHERE cc.contact_type_id = ct.id
				AND cc.created_at = (SELECT  MAX(created_at)  FROM contacts c  WHERE c.household_id = cc.household_id GROUP BY c.household_id)
            ) xx 
            ON xx.household_id = o.id  " ;
  
               
                
    $sql .= " where  o.region_id = r.id
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
               $sql .= " and (xx.id not in (4)";
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
           
           //Incentive Call
           if ($statusId == '5')
           {
               $sql .= " and (xx.id not in (3)";
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
              // $sql .= " and xx.id  in (1)";
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
           
           //Incentive Call
           if ($statusId == '5')
           {
               $sql .= " and xx.id  in (3)";
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
function getTechInvoices($ds,  $paidId, $techUserId, $amountId)
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
        11=> 'distance' 
 
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
                , case when ti.tech_order_type_id= 1 AND vi.prob_detected_id = 1  and coalesce(vi.distance) <> 0  then 35  else 15 end    installationCost   ,
                case when ti.tech_order_type_id= 1 and vi.prob_detected_id =1  and coalesce(vi.distance) <> 0 then ( case when vi.impacted_tvsets-1 <0 then 0 else  vi.impacted_tvsets-1 end  )*15
                else  case when ti.tech_order_type_id= 2 and vi.prob_detected_id =1  and coalesce(vi.distance) <> 0 then vi.impacted_tvsets*15
                else 0 end
                end additionalCost
                ,vi.distance distance
            ";

    
    $sql .= " from  tech_visits vi, tech_orders ti , households hh
                where hh.id = ti.household_id
                and ti.id = vi.tech_order_id
               /* and vi.orderNb not in (344,341,345,346)*/ 
                ";
    
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
    
        if (trim($paidId) <> "999") {
            $sql .= " and ti.paid  in  (" .$paidId.")";
        }
        
        if (trim($amountId) <> "999") {
            $sql .= " and ti.amount   in  (" .$amountId.")";
        }
        
        if (!empty($techUserId) && (trim($techUserId)) <> "999") {
            $sql .= " and vi.technician_id  in  (" .$techUserId.")";
      }
    
    
    //     if (trim($statusId) == '4' ||  trim($statusId) == '8' ||  trim($statusId) == '11')
        //     {
        //         if (  $_SESSION['userRole'] != 1)
            //         {
            //             $sql .= " and t.user_id ='" . $userId. "'";
            //         }
        
        //     }
    
//     if (!empty($mohafazaId) && strlen(trim($mohafazaId)) > 0 && $mohafazaId != 999) {
        
//         $sql .= " and m.id in (" .$mohafazaId. ")";
//     }
    
//     if (!empty($qadaaId) && strlen(trim($qadaaId)) > 0 && $qadaaId != 999) {
        
//         $sql .= " and q.id in (" .$qadaaId. ")";
//     }
    
//     if (!empty($regionId) && strlen(trim($regionId)) > 0 && $regionId != 999) {
      
        
//         $sql .= " and r.id in (" . implode(" , ",$regionId). ")";
//     }
    
    
    
    if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
//         $sql.=" AND (  m.username LIKE '".$requestData['search']['value']."%' ";
//         $sql.=" OR x.desc LIKE '".$requestData['search']['value']."%' ";
        
//         $sql.=" OR  DATE_FORMAT(t.updated_date, '%d-%m-%Y') LIKE '".$requestData['search']['value']."%' )";
    }
    
 
    
    
    $query=mysqli_query($conn, $sql) or die("getServices.php: getTechInvoices");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT 0,1000   ";
     // print $sql;
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
        $query = "update tasks set  updated_at=now() , visit_date = '".date("Y-m-d H:i:s",strtotime($visitDate)) ."'   where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
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
                        values (0, " .$taskTypeId . ", 'Installation Task',  now(),null, " . $userId .", 0,now(),now(),". $householdId .", now())";
        
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



function updateHousehold($ds, $householdId, $userId, $statusId,$otherComment,$taskTypeId,$visitDate,$techUserId,$orderNbId)
{
    
    $query = " SELECT id FROM tasks where household_id =  " .$householdId . "  and task_type_id = " . $taskTypeId . " limit 1";
    $resultset= $ds->select($query);
    //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
    if (!empty($resultset))
    {
        $query = "update tasks set  updated_at=now() , visit_date = '".date("Y-m-d H:i:s",strtotime($visitDate)) ."' , comments = concat(comments,'-', '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."')  where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
        $ds->insert($query);
        
        
        $query = "update households set  updated_at=now() , status_id = ".$statusId ."   where id = " .$householdId ;
        $ds->insert($query);
        
        
         
        
        $query = "INSERT INTO household_status
                    (id, household_id, created_at,status_id,user_id, updated_at)
                    VALUES (0 , " . $householdId . ",now(), ".$statusId." , 4, now() )";
        
        $ds->insert($query);
        
        //If TAsk Type Installation and HH Status installated , create automatically TASK welcome call
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
            
                $query = "INSERT INTO tasks values (0,7, 'Welcome Call', now(), null ,4,0, now(), now() ,".$householdId .", null , null)";
                $ds->insert($query);
                
                $query = "INSERT INTO tasks values (0,5, 'Incentive Points: ', now(), null ,4,0, now(), now() ,".$householdId .", null , null)";
                $ds->insert($query);
            }
        }
        
        

        if (($taskTypeId == 12 && ( $statusId == 3 || $statusId == 4)) || ($taskTypeId == 11 &&  $statusId == 9) ||($taskTypeId == 10 &&  $statusId == 4)  )
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
            
            // Create Tech Order 
            $query = " SELECT count(id) id FROM tech_orders where household_id =  " .$householdId . "  and tech_order_type_id = ".$techOrderTypeId." limit 1";
            $resultset= $ds->select($query);
            //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
            foreach ($resultset as $quotaData) {
                $quotaData["id"];
                
            }
            if (  $quotaData["id"]== 0 )
            {
                $orderNbId =$orderNbId;
                $query = "INSERT INTO tech_orders values (0,".$techOrderTypeId.",".$orderNbId.", '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."', -1,202007, 1, 4,0, now(), null ,".$householdId .", now() , now())";
                $ds->insert($query);
                $json_data .= " Technician Order Created ";
            }
            
            // Create Tech Visit 
            $query = " SELECT count(id) id FROM tech_visits where tech_order_id in (SELECT id FROM tech_orders where household_id  =  " .$householdId . "  and tech_order_type_id = ".$techOrderTypeId.") ";
            $resultset= $ds->select($query);
            //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
            foreach ($resultset as $quotaData) {
                $quotaData["id"];
                
            }
            if (  $quotaData["id"]== 0 )
            {
                
                
                $query = " SELECT id FROM tech_orders where household_id  =  " .$householdId . "  and tech_order_type_id = ".$techOrderTypeId." ";
                $resultset= $ds->select($query);
                //  die (date("Y-m-d H:i:s",strtotime($visitDate)) );
                foreach ($resultset as $techOrder) {
                    $techOrder["id"];
                    
                }
                
                
                $query = "INSERT INTO tech_visits values (0,". $techOrder["id"].",".$techProblem.",".$techUserId.", '".date("Y-m-d H:i:s",strtotime($visitDate)) ."',-1,-1, '" .mysqli_real_escape_string($ds->getConnection(),$otherComment) ."',now() , now(),".$orderNbId.")";
                $ds->insert($query);
                
                $json_data .= " - Technician Visit  Created ";
            }
            // update Tech Visit details
            else 
            {
                
                
            }
            
            
            
            $query = "update tasks set  updated_at=now()  , closed=now()  , closed_by=1  where household_id = " .$householdId . " and task_type_id = " . $taskTypeId;
            $ds->insert($query);
            
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
            ,totalQuota totalQuota, openQuota  openQuota, round((openQuota/totalPanel)*100,2) quotaPercent /*production percent*/
            ,totalPanel, panelSuccess, round((panelSuccess/totalPanel)*100,2) panelPercent
            ,lostCalls,potentialCalls,noAnswerCalls,notCalledCalls
            ,topUser, lessUser
             from ( SELECT  m.name  as mohafaza, q.name as qadaa, r.name as region
            		, (
                            select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.id in (
                                        select  household_id from tvsets where household_id in (SELECT id FROM households where status_id in (4,5,6) )     group by household_id having max(tvset_status_id) <>  2

                                                )


                                ) totalQuota
                    , (
                            select count(1)
                        	from  households o
                        	where   o.region_id = r.id and o.id in (
                                         select  household_id from tvsets where household_id in (SELECT id FROM households where status_id in (4,5,6) )     group by household_id having max(tvset_status_id) =  2
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
                              and  exists (select 1 from contacts where  household_id = o.id   and contact_type_id  = 10 and  status_id in (211,213,209,214,235))) NoAnswerCalls
                     ,( select count(1)
                        	from households o  
                        	where    o.region_id = r.id and status_id not in   (2,3,4,5,6,7,8,9,14,18) and not exists (select 1 from contacts where  household_id = o.id )) NotCalledCalls
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
    
    // Incentive Call
    else if ($taskTypeId == 5)
    {
        $contactTypeId = 3;
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
    
    
    $sql = "SELECT   id ,   name  FROM  task_types";
    
    
    
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
    
    
    $sql = "SELECT   id ,   name  FROM  contacts_statuses where id  in (213,215,217,235,228,219,212,211,229,214,208,236)";
    
    
    
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



?>