<?php 
namespace Phppot;

require_once __DIR__ . '/DataSource.php';

$ds = new DataSource();
 
if(isset($_POST['HHId']) && !empty($_POST['HHId'])){
         // $name = '"'.$ds->real_escape_string($_POST['name']).'"';
        //$email = '"'.$ds->real_escape_string($_POST['email']).'"';
      //  $password = '"'.password_hash($ds->real_escape_string($_POST['password']), PASSWORD_DEFAULT).'"';
       // $gender = '"'.$ds->real_escape_string($_POST['gender']).'"';
		 
        //$query = "insert into test (name) values ('ghenoie')";
        
 
    
    
    $query = "  select  tvi.technician_id  technicianId, too.orderNB orderNbId,
    phone_numb   as serv_line_no, o.name, 		o.area_details as full_address,o.status_id statusId,
    (select tt.name from task_types tt where tt.id = t.task_type_id) taskTypeId,   q.comments as comments ,  DATE_FORMAT( t.visit_date, '%Y-%m-%dT%H:%i')  visitDate
    from households o
    LEFT JOIN  contacts q
    ON o.id = q.household_id
    and q.updated_at = (select max(updated_at) from contacts qc where qc.household_id = q.household_id)
    LEFT JOIN  tasks t ON t.household_id = o.id
    and t.task_type_id  =". $_POST['taskTypeId']."
    
    LEFT JOIN  tech_orders too  ON too.household_id = o.id
    and (case when ". $_POST['taskTypeId']." = 12 then 1
        else case when ". $_POST['taskTypeId']." = 11 then 3
        else case when ". $_POST['taskTypeId']." = 10 then 2
        end end end) = too.tech_order_type_id
        
        left join tech_visits tvi on tvi.tech_order_id = too.id
        where o.id = ". $_POST['HHId']." limit 1; " ;
    
    
   //  die($query);
    $zResult = $ds->select($query);
  
    foreach ($zResult as $quotaData) {
         $quotaData["name"];
         $quotaData["visitDate"];  
         $quotaData["taskTypeId"];
         $quotaData["technicianId"];
         $quotaData["orderNbId"];
		  }
      } 
  
      // die( $quotaData["visitDate"]);
       //  die  (date('Y-m-d\TH:i',  $quotaData["visitDate"])); //'2017-06-01T08:30'; 2020-06-19T23:07
    require "loginheader.php";  
?>


 

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/lebanon.png" />
	<title>Update Contact OUT Status</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

 

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="assets/fonts/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
 
	
 
 
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 
 <div class="row">
        <div class="col-sm-3  ">
    <a class="navbar-brand">Welcome <strong>  <?php echo  $_SESSION['username'] ?> </strong></a>
    </div>
    
    
 <div class="col-sm-8  col-offset-2">
    <div class="collapse navbar-collapse pull-right" id="navbarResponsive">
  
       <button class="btn btn-default" style="width: 100px;"  ><a href="logout.php?userId=<?php echo $_SESSION['userId'] ?>">Logout</a></button>
         <div style="text-align: right;"><b>Contact Us at <a>+961 4 443011</a></b></div>
     </div>
  </div>
</div>

</nav>
	<div class="image-container set-full-height" style="background-image: url('/images/day.jpg')">
	    
	     <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12 col-sm-offset-0">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="red" id="wizardProfile">
		                    <form method="" name=""   action="">
		                     
		                <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

		                		<div class="wizard-header text-center"  style="background-color: #f3f3f3">
		                        	 <div class=" row"> <!-- modal-body -->
                                  		 <div class="col-xs-6">
                                   		     <h5><?php echo  $quotaData["serv_line_no"] ;?></h5> 
                                             <h5>  <?php echo $quotaData["taskTypeId"];?></h5> 
                                          </div>
                                 
                                       <div class="col-xs-6">
                						<h5>
                                        	   <b> <?php echo  $quotaData["name"] ;?> </b> <br/>
                                        	    <small><?php    if (isset($_GET['HHId']) && !empty($_GET['HHId']) ) {echo $_GET['HHId'];} else  if (isset($_POST['HHId']) && !empty($_POST['HHId']) ) {echo $_POST['HHId'];}?></small><br/> 
                                        	    <small><?php echo $quotaData["full_address"];?></small>
                                        	  
                                        </h5>
                  					   </div>
								</div>
								</div>

								<div class="wizard-navigation">
								 
								  <div  class="col-sm-9 col-sm-offset-0" id="message"></div>
								    <div class="col-sm-12 col-sm-offset-3">
								 
								      <h4 class="wizard-title"><u>Update HouseHold Status</u> </h4>   
								     <br>    
									<?php 
									 
									    if ($_POST['taskTypeId'] == 10)
									    {
									        $query =  "SELECT  p.id as id , p.name from statuses p  where id in (4,9,10,20)";
									    }
									    else if ($_POST['taskTypeId'] == 11) 
									    {
									        $query =  "SELECT  p.id as id , p.name from statuses p  where id in (9,10,20)";
									    }
									    else if ($_POST['taskTypeId'] == 12)
									    {
									        $query =  "SELECT  p.id as id , p.name from statuses p  where id in (2,3,4,10,20)";
									    }
									    else if ($_POST['taskTypeId'] == 4)
									    {
									        $query =  "SELECT  p.id as id , p.name from statuses p  where id in ( 3,4,10,20);";
									    }
									    
									     $statusResult = $ds->select($query);
								         foreach ($statusResult as $status) {
									       $selected ='';
									       if (isset($quotaData["statusId"]) && ($quotaData["statusId"]) >= 0)
									       {
									           if ($status["id"] ==$quotaData["statusId"])
									           {
									               $selected = " checked='checked'";
									           }
									       }
									       
									       echo "<div class='radio radio-info'><input type='radio' name='statusRadio'  value='".$status["id"] ."' required $selected><label> " .$status["name"] ." </label></div>";
									       //echo "<div class='radio radio-info'><input type='radio' required name='Religion_sect_of_family'  value='".$status["id"] ."' required ".$selected."><label> " .$status["desc"] ." </label></div>";
									   }
									   
									   
									 
									?>
									
									</div>
									
									  <div  class="col-sm-6 col-sm-offset-3" >
									   <label   for="otherComment" style="font-size: 20px;color:red;" >*Remarks</label>
									 	 <textarea maxlength="750" class="form-control" id="otherComment" rows="3" class="form-control" required ><?php echo $quotaData["comments"];?></textarea>
									  </div>
									  
								
									  	<BR/>  
									  
									  	<div  class="col-sm-6 col-sm-offset-3" >
    									   	<label   for="technicianRadio" style="font-size: 20px;color:red;" >*Technician</label>
    									    <?php 
									          $query =  "SELECT  p.id as id , p.name from users  p  where id in (7,10)";
    									      $statusResult = $ds->select($query);
    								         foreach ($statusResult as $status) {
    									       $selected ='';
    									       if (isset($quotaData["technicianId"]) && ($quotaData["technicianId"]) >  0)
    									       {
    									           if ($status["id"] == $quotaData["technicianId"])
    									           {
    									               $selected = " checked='checked'";
    									           }
    									       }
    									   
									       echo "<div class='radio radio-info'><input type='radio' name='technicianRadio'  value='".$status["id"] ."' required  $selected><label> " .$status["name"] ." </label></div>";
									 	   }
									   
									   
									 
									?>	
    									
    									
    									
    									
									  </div><BR/>  
									  
									  	<div  class="col-sm-6 col-sm-offset-3" >
    									 	<label   for="visitDate" style="font-size: 20px;color:red;" >*Time of Visit</label>
    									 	 <input  class="form-control"  id="visitDate"  type="datetime-local" name="visitDate"   min="2020-06-01 08:30"  value="<?php if (!empty( $quotaData["visitDate"])) echo   $quotaData["visitDate"] ; ?>"> 
									  </div>
									  
									  
									  <div  class="col-sm-6 col-sm-offset-3" >
    									 	<label   for="orderNbId" style="font-size: 20px;color:red;" >*Order Number</label>
    									 	 <input  class="form-control"  id="orderNbId"  type="number" name="orderNbId"  value="<?php if (!empty( $quotaData["orderNbId"])) echo   $quotaData["orderNbId"] ; ?>"> 
									  </div>
									  
									  
									  
									
								</div>
		                        
		                        <div class="wizard-footer">
		                        
		                            <div class="pull-right">
		                                <input type='button' class='btn  btn-fill btn-warning btn-wd' id="updateStatus" name='updateStatus' value='Save' />
		                                 <input type='button' class='btn  btn-fill btn-primary btn-wd' id="cancel" name='cancel' value='Cancel' />
		                                
		                            </div>
 									
		                         
		                            <div class="clearfix"></div> <br>
		                         
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->
</div>	 
	    <div class="footer">
	        <div class="container text-center">
	            
	        </div>
	    </div>
	 


</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/demo.js" type="text/javascript"></script>
	<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function () {
    "use strict";
 


  		function escape_html(str) {
  		  
  			 if ((str===null) || (str===''))
  			       return false;
  			 else
  			   str = str.toString();
  			  
  			  var map = {
  			    '&': ' and ',
  				'<': ' greater ',
  				'>': ' lower',
  				'"': '&quot;',
  				"'": '&#039;'
  			  };

  			  return str.replace(/[&<>]/g, function(m) { return map[m]; });
  			}

   $("#cancel").click(function () {
	   window.location.href = 'taskGrid.php';
   });
		 
    $("#updateStatus").click(function () {


    	
        var r = confirm("Are you sure you want to Save?");
       if (r == true) {
    	var userId = <?php echo $_SESSION['userId']?>;
		var ogeroId = <?php echo  $_POST['HHId']?>;
		var taskId = <?php echo  $_POST['taskTypeId']?>; 
		var statusRadio= $("input[name='statusRadio']:checked"). val();
		var technicianRadio  =  $("input[name='technicianRadio']:checked"). val();
        var otherComment = $("#otherComment").val();
        var visitDate = $("#visitDate").val();  
        var orderNbId =   $("#orderNbId").val();  
       
       //alert (encodeURI('taskId='+taskId+'&statusId='+ statusRadio+'&otherComment='+  otherComment +'&ogeroId='+ogeroId+'&userId='+userId+'&action=updateContacts'));
 
        if (typeof statusRadio  == "undefined"  ||  statusRadio === "" ||  otherComment ===  "undefined" ||  otherComment === "" || technicianRadio == "undefined"  ||  technicianRadio === "" || visitDate == "undefined"  ||  visitDate === ""   || orderNbId == "undefined"  ||  orderNbId === "") {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Missing Status, Remarks , Technician Name or Order Number</div>");
        } else {
            
            $.ajax({
                type: "POST",
                url: "getServices.php",
                data: encodeURI('taskId='+taskId+'&statusId='+ statusRadio+'&otherComment='+  otherComment +'&ogeroId='+ogeroId+'&userId='+userId+'&visitDate='+visitDate+'&action=updateHousehold'+'&techUserId='+ technicianRadio+"&orderNbId="+orderNbId),
                dataType: 'JSON' ,
                success: function (html) { // alert (JSON.stringify(html));
                    $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Saved</div>");
                     window.location.href = 'taskGrid.php';
                       
                }//,
//                 error: function(xhr, status, error) {
//                 	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
                      
//                 	}
               
            });
        }
        return false;
    }});
    });

</script>
</html>