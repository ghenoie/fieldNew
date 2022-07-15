<?php 
namespace Phppot;

require_once __DIR__ . '/DataSource.php';

$ds = new DataSource();
 
if(isset($_POST['id']) && !empty($_POST['id'])){
         // $name = '"'.$ds->real_escape_string($_POST['name']).'"';
        //$email = '"'.$ds->real_escape_string($_POST['email']).'"';
      //  $password = '"'.password_hash($ds->real_escape_string($_POST['password']), PASSWORD_DEFAULT).'"';
       // $gender = '"'.$ds->real_escape_string($_POST['gender']).'"';
		 
        //$query = "insert into test (name) values ('ghenoie')";
        
    $query = " select    phone_numb  as serv_line_no, o.name, 		o.area_details as full_address,
             'test' as status, q.comments 
                
                 from households o  left join contacts q
                 on o.id = q.household_id
                  where o.id = ". $_POST['id']." limit 1; " ;
   // print $query;
    $zResult = $ds->select($query);
  
    foreach ($zResult as $quotaData) {
         $quotaData["name"];  
		  }
      } 
  
 
      
    require "loginheader.php";  
?>


 

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/lebanon.png" />
	<title>questionnaire</title>

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
                                             <h5>  Status: <?php echo $quotaData["status"];?></h5> 
                                          </div>
                                 
                                       <div class="col-xs-6">
                						<h5>
                                        	   <b> <?php echo  $quotaData["name"] ;?> </b> <br/>
                                        	    <small><?php    if (isset($_GET['id']) && !empty($_GET['id']) ) {echo $_GET['id'];} else  if (isset($_POST['id']) && !empty($_POST['id']) ) {echo $_POST['id'];}?></small><br/> 
                                        	    <small><?php echo $quotaData["full_address"];?></small>
                                        	  
                                        </h5>
                  					   </div>
								</div>
								</div>

								<div class="wizard-navigation">
								 
								  <div  class="col-sm-9 col-sm-offset-0" id="message"></div>
								    <div class="col-sm-12 col-sm-offset-3">
								 
								     <?php if ($_POST['appointmentCheck'] == 1){?><h4 class="wizard-title"><u> Set Appointment</u></h4><?php } else { ?> <h4 class="wizard-title"><u>Update Status</u> </h4>   <?php }?>
								     <br>    
									<?php 
									if ($_POST['appointmentCheck'] == 1)
									{
									   /* $query =  "SELECT  p.param_id as id , p.desc  FROM  params p where p.type_id = 26 and P.PARAM_ID  IN (11)";
									    $statusResult = $ds->select($query);
									    foreach ($statusResult as $status) {
									        echo "<div class='radio radio-info'><input type='radio' name='statusRadio'  value='".$status["id"] ."' checked readonly><label> " .$status["desc"] ." </label></div>";
									    }*/
									}
									else
									{
									     if ($_POST['id'] == 12 )
									    {
									        $query =  "SELECT  p.id as id , p.name    from contacts_statuses  p   where p.id in (213,215,217,225,235,228,219,212,211,226,227,229,214,208)";
									    }
									    else
									    { 
									        $query =  "SELECT  p.id as id , p.name    from contacts_statuses  p   where p.id in (213,217,225,235,228,219,212,211,226,227,229,214,208) ";
									     }
									
									 $statusResult = $ds->select($query);
									 foreach ($statusResult as $status) {
									     echo "<div class='radio radio-info'><input type='radio' name='statusRadio'  value='".$status["id"] ."'><label> " .$status["name"] ." </label></div>";
									   }
									}
									?>
									
									</div>
									
									  <div  class="col-sm-6 col-sm-offset-3" >
									   <label   for="otherComment" style="font-size: 20px;color:red;" >*Remarks</label>
									 	 <textarea maxlength="250" class="form-control" id="otherComment" rows="3" class="form-control" required ><?php echo $quotaData["comments"];?></textarea>
									  </div>
									
								    <div  class="col-sm-6 col-sm-offset-3" >
									   <label   for="visitDate" >Time of Visit</label>
									 	 <input  class="form-control"  id="visitDate"  type="datetime-local" name="visitDate"   min="2020-06-01T08:30" > 
									  </div>
									
								</div>
		                        
		                        <div class="wizard-footer">
		                        
		                            <div class="pull-right">
		                                <input type='button' class='btn  btn-fill btn-warning btn-wd' id="updateStatus" name='updateStatus' value='Save' />
		                                 <!-- input type='submit' class='btn  btn-fill btn-primary btn-wd' name='next' value='Back' /-->
		                                
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
  		 
    $("#updateStatus").click(function () {

		var userId = <?php echo $_SESSION['userId']?>;
		var ogeroId = <?php echo  $_POST['statusId']?>;
		var taskId = <?php echo  $_POST['id']?>; 
		var statusRadio= $("input[name='statusRadio']:checked"). val(); 
        var otherComment = $("#otherComment").val(); 
       
       alert ( encodeURI('taskId='+taskId+'&statusId='+ statusRadio+'&otherComment='+  otherComment +'&ogeroId='+ogeroId+'&userId='+userId +'&visitDate='+visitDate+'&action=updateContacts_TEST'));
 
        if (typeof statusRadio  == "undefined"  ||  statusRadio === "" ||  otherComment ===  "undefined" ||  otherComment === "" ) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Missing Status or Comments</div>");
        } else {
            
            $.ajax({
                type: "POST",
                url: "getServices.php",
                data: encodeURI('taskId='+taskId+'&statusId='+ statusRadio+'&otherComment='+  otherComment +'&ogeroId='+ogeroId+'&userId='+userId +'&visitDate='+visitDate+'&action=updateContacts_test'),
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
    });
});

</script>
</html>