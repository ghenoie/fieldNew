<?php 
namespace Phppot;

require_once __DIR__ . '/DataSource.php';
 require "loginheader.php";  
$ds = new DataSource();
 
if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];
}



if(!empty($id))
{
    $query = " select    phone_numb  as serv_line_no, o.name, 		o.area_details as full_address,
             'test' as status, q.comments
        
                 from households o  left join contacts q
                 on o.id = q.household_id
                  where o.id = ". $_POST['id']." limit 1; " ;
    // print $query;
    $zResult = $ds->select($query);
    
    if (empty($zResult))
    {
        header("Location: ErrorUserPage.php");
    }
    else
    {  
        foreach ($zResult as $quotaData) 
        {
          $quotaData["name"];  
        }
 
  
      if (isset( $_POST['nbTvSet'])  && !empty( $_POST['nbTvSet']))
      {
          $nbTvSet = $_POST['nbTvSet'];
      }
      else
      {
          $query = "  select count_tvset as number_Tv_sets from households where  id = ". $id." limit 1  " ;
          $zResultTV = $ds->select($query);
          foreach ($zResultTV as $questionnaireData) {
              $nbTvSet = $questionnaireData["number_Tv_sets"];
           }
     }
    }
}
else
{
    header("Location: ErrorPage.php");
}

if (empty($nbTvSet)) { $nbTvSet = 1;}
?>
   
<!doctype html>
<html lang="en">
<head>
<meta  http-equiv="content-type" charset="utf-8" />
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
	<link href="../assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="assets/fonts/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">

 <style>
.form-group .required .control-label:after {
  content:"*";color:red;
}
</style>
</head>
<style>
.form-group .required .control-label:after {
  content:"*";color:red;
}
</style>
  
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="margin-bottom: 0px">
 <div class="row">
        <div class="col-sm-3  ">
    <a class="navbar-brand">Welcome <strong>  <?php echo  $_SESSION['username'] ?> </strong></a>
    </div>
    
    
 <div class="col-sm-8  col-offset-2">
    <div class="collapse navbar-collapse pull-right" id="navbarResponsive">
  
         <button class="btn btn-outline-light btn-default" class="navbar-brand" style="width: 100px;margin-top:10px"  onClick="window.location.href='logout.php?userId=<?php echo $_SESSION['userId'] ?>'">Logout</button>
         <div style="text-align: right;"><b>Contact Us at <a>+961 4 443011</a></b></div>
     </div>
  </div>
</div>
</nav>
 
 
 <div class="tab-pane" id="TVsets<?php echo $i; ?>">
		                                   
		                                <div class="row">
		                                    
		                                        <p class="info-text">Information about TV Set <?php echo $i; ?> </p>
		                                    
		                                  
		                                      <div class="col-sm-2 col-sm-offset-0" style="float:right;">
		                                    	<div class="form-group">
		                                    	
  <?php  $sel_query="Select * from tvsets  where household_id = ".$id." limit 1;";
                              $result = mysqli_query($ds->conn,$sel_query);
                              
                                  
                                  while($row = mysqli_fetch_assoc($result)) { ?>
                        <table>
                           <tr>
                              <td>
                              <?php echo "room:".$row['room_id']; ?>
                              </<td>
                              <td>
                              <?php echo "brand:".$row['brand_id']; ?>
                              </td>
                              <td>
                              <?php echo $row['model_numb']; ?>
                              </td>
                              <td>
                              <?php echo $row['screen_type_id']; ?>
                              </td>
                              <td>
                             
                              </td>
                           </tr>
                        </table>

                        <?php
$count++;
}
                                  
                                  
                                  
                          ?>
                          
		                                           
		                                             <label  class="control-label pull-right" style="color:red"  for="TV<?php echo $i ?>_Room_of_TV_set">* وين حاطين التليفزيون؟ </label>
		                                            <select required name="TV<?php echo $i ?>_Room_of_TV_set" name="TV<?php echo $i ?>_Room_of_TV_set"  class="form-control" dir="rtl">
		                                             <option value=''>-------------------------</option>
		                                           <?php
		                                               $query =  "SELECT  p.id as id , p.name as name FROM  rooms p ";
		                                               
		                                               $statusResult = $ds->select($query);
    		                                           foreach ($statusResult as $status) {
    		                                               $selected ='';
    		                                               if (isset($row['room_id']) && !empty($row['room_id']))
    		                                               {
    		                                                   if ($status["id"] ==$row['room_id'])
    		                                                   {
    		                                                       $selected = "selected='selected'";
    		                                                   }
    		                                               }
    		                                               echo $status["id"];
    		                                             // echo "<option value='".$status["id"] ."' ".$selected."><label> " .$status["name"] ." </label></option>";
    		                                              }
		                                           ?>
		                                           </select>
		                                           
		                                        </div>
		                                    </div>
		                                    
 
 

	    <div class="footer">
	        <div class="container text-center">
	            
	        </div>
	    </div>
	 
	</div>


</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
		<script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/demo.js" type="text/javascript"></script>
	<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>


<script>
 
 
//on Stop click
$("#stopBtn").click(function () 
	     {  
	    	var userId =  <?php echo $_SESSION['userId']?>;
			var ogeroId =  <?php if (!empty($id)) { echo $id;} else { echo '0';}?>;
			var statusId = <?php if (isset($quotaData["statusId"])) {echo $quotaData["statusId"];} else { echo '0';}?>;
		    var array_values = [];
	         $("#private").each( function() {
	        	 
	             if( $(this).is(':checked') ) {  
	                 array_values.push( $(this).val() );
	             }
	         });

	       //handling Private checkboxes
	         var array_values = [];
	         $(".mylistPrivate").each(function()
	         {
	             if($(this).is(':checked'))
	             {   array_values.push( $(this).val() );
	                  
	             }
	            
	         })
	         var arrayValues = array_values.join('x');
	     	 
			//handling shared checkboxes
	         var array_values1 = [];
	         $(".mylistShared").each(function()
	         {
	             if($(this).is(':checked'))
	             {   array_values1.push( $(this).val() );
	                  
	             }
	            
	         })
	         var arrayValues1 = array_values1.join('x');
	      
	   	//Multiple Select for the Satellites, devices and receivers
	     if ($("#TV1_Satellites")  !== "undefined" && typeof ($("#TV1_Satellites").val())  !== "undefined") var arrayValueszTV1 = $("#TV1_Satellites").val().join(',');
	     if ($("#TV2_Satellites")  !== "undefined" && typeof ($("#TV2_Satellites").val())  !== "undefined") var arrayValueszTV2 = $("#TV2_Satellites").val().join(',');
	     if ($("#TV3_Satellites")  !== "undefined" && typeof ($("#TV3_Satellites").val())  !== "undefined") var arrayValueszTV3 = $("#TV3_Satellites").val().join(',');
	     if ($("#TV4_Satellites")  !== "undefined" && typeof ($("#TV4_Satellites").val())  !== "undefined") var arrayValueszTV4 = $("#TV4_Satellites").val().join(',');
	     if ($("#TV5_Satellites")  !== "undefined" && typeof ($("#TV5_Satellites").val())  !== "undefined") var arrayValueszTV5 = $("#TV5_Satellites").val().join(',');
	     if ($("#TV6_Satellites")  !== "undefined" && typeof ($("#TV6_Satellites").val())  !== "undefined") var arrayValueszTV6 = $("#TV6_Satellites").val().join(',');
	     if ($("#TV7_Satellites")  !== "undefined" && typeof ($("#TV7_Satellites").val())  !== "undefined") var arrayValueszTV7 = $("#TV7_Satellites").val().join(',');
	     if ($("#TV8_Satellites")  !== "undefined" && typeof ($("#TV8_Satellites").val())  !== "undefined") var arrayValueszTV8 = $("#TV8_Satellites").val().join(',');
	     if ($("#TV9_Satellites")  !== "undefined" && typeof ($("#TV9_Satellites").val())  !== "undefined") var arrayValueszTV9 = $("#TV9_Satellites").val().join(',');
	     if ($("#TV10_Satellites")  !== "undefined" && typeof ($("#TV10_Satellites").val())  !== "undefined") var arrayValueszTV10 = $("#TV10_Satellites").val().join(',');
	     if ($("#TV11_Satellites")  !== "undefined" && typeof ($("#TV11_Satellites").val())  !== "undefined") var arrayValueszTV11 = $("#TV11_Satellites").val().join(',');
	     if ($("#TV12_Satellites")  !== "undefined" && typeof ($("#TV12_Satellites").val())  !== "undefined") var arrayValueszTV12 = $("#TV12_Satellites").val().join(',');
 

	     if ($("#TV1_Devices_connected")  !== "undefined" && typeof ($("#TV1_Devices_connected").val())  !== "undefined") var arrayValuesDevTV1 = $("#TV1_Devices_connected").val().join(',');
	     if ($("#TV2_Devices_connected")  !== "undefined" && typeof ($("#TV2_Devices_connected").val())  !== "undefined") var arrayValuesDevTV2 = $("#TV2_Devices_connected").val().join(',');
	     if ($("#TV3_Devices_connected")  !== "undefined" && typeof ($("#TV3_Devices_connected").val())  !== "undefined") var arrayValuesDevTV3 = $("#TV3_Devices_connected").val().join(',');
	     if ($("#TV4_Devices_connected")  !== "undefined" && typeof ($("#TV4_Devices_connected").val())  !== "undefined") var arrayValuesDevTV4 = $("#TV4_Devices_connected").val().join(',');
	     if ($("#TV5_Devices_connected")  !== "undefined" && typeof ($("#TV5_Devices_connected").val())  !== "undefined") var arrayValuesDevTV5 = $("#TV5_Devices_connected").val().join(',');
	     if ($("#TV6_Devices_connected")  !== "undefined" && typeof ($("#TV6_Devices_connected").val())  !== "undefined") var arrayValuesDevTV6 = $("#TV6_Devices_connected").val().join(',');
	     if ($("#TV7_Devices_connected")  !== "undefined" && typeof ($("#TV7_Devices_connected").val())  !== "undefined") var arrayValuesDevTV7 = $("#TV7_Devices_connected").val().join(',');
	     if ($("#TV8_Devices_connected")  !== "undefined" && typeof ($("#TV8_Devices_connected").val())  !== "undefined") var arrayValuesDevTV8 = $("#TV8_Devices_connected").val().join(',');
	     if ($("#TV9_Devices_connected")  !== "undefined" && typeof ($("#TV9_Devices_connected").val())  !== "undefined") var arrayValuesDevTV9 = $("#TV9_Devices_connected").val().join(',');
	     if ($("#TV10_Devices_connected")  !== "undefined" && typeof ($("#TV10_Devices_connected").val())  !== "undefined") var arrayValuesDevTV10 = $("#TV10_Devices_connected").val().join(',');
	     if ($("#TV11_Devices_connected")  !== "undefined" && typeof ($("#TV11_Devices_connected").val())  !== "undefined") var arrayValuesDevTV11 = $("#TV11_Devices_connected").val().join(',');
	     if ($("#TV12_Devices_connected")  !== "undefined" && typeof ($("#TV12_Devices_connected").val())  !== "undefined") var arrayValuesDevTV12 = $("#TV12_Devices_connected").val().join(',');

	     
	     if ($("#TV1_Reception_TV_signal")  !== "undefined" && typeof ($("#TV1_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV1 = $("#TV1_Reception_TV_signal").val().join(',');
	     if ($("#TV2_Reception_TV_signal")  !== "undefined" && typeof ($("#TV2_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV2 = $("#TV2_Reception_TV_signal").val().join(',');
	     if ($("#TV3_Reception_TV_signal")  !== "undefined" && typeof ($("#TV3_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV3 = $("#TV3_Reception_TV_signal").val().join(',');
	     if ($("#TV4_Reception_TV_signal")  !== "undefined" && typeof ($("#TV4_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV4 = $("#TV4_Reception_TV_signal").val().join(',');
	     if ($("#TV5_Reception_TV_signal")  !== "undefined" && typeof ($("#TV5_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV5 = $("#TV5_Reception_TV_signal").val().join(',');
	     if ($("#TV6_Reception_TV_signal")  !== "undefined" && typeof ($("#TV6_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV6 = $("#TV6_Reception_TV_signal").val().join(',');
	     if ($("#TV7_Reception_TV_signal")  !== "undefined" && typeof ($("#TV7_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV7 = $("#TV7_Reception_TV_signal").val().join(',');
	     if ($("#TV8_Reception_TV_signal")  !== "undefined" && typeof ($("#TV8_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV8 = $("#TV8_Reception_TV_signal").val().join(',');
	     if ($("#TV9_Reception_TV_signal")  !== "undefined" && typeof ($("#TV9_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV9 = $("#TV9_Reception_TV_signal").val().join(',');
	     if ($("#TV10_Reception_TV_signal")  !== "undefined" && typeof ($("#TV10_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV10 = $("#TV10_Reception_TV_signal").val().join(',');
	     if ($("#TV11_Reception_TV_signal")  !== "undefined" && typeof ($("#TV11_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV11 = $("#TV11_Reception_TV_signal").val().join(',');
	     if ($("#TV12_Reception_TV_signal")  !== "undefined" && typeof ($("#TV12_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV12 = $("#TV12_Reception_TV_signal").val().join(',');

	     if ($("#TV1_Receiver_type")  !== "undefined" && typeof ($("#TV1_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV1 = $("#TV1_Receiver_type").val().join(',');
	     if ($("#TV2_Receiver_type")  !== "undefined" && typeof ($("#TV2_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV2 = $("#TV2_Receiver_type").val().join(',');
	     if ($("#TV3_Receiver_type")  !== "undefined" && typeof ($("#TV3_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV3 = $("#TV3_Receiver_type").val().join(',');
	     if ($("#TV4_Receiver_type")  !== "undefined" && typeof ($("#TV4_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV4 = $("#TV4_Receiver_type").val().join(',');
	     if ($("#TV5_Receiver_type")  !== "undefined" && typeof ($("#TV5_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV5 = $("#TV5_Receiver_type").val().join(',');
	     if ($("#TV6_Receiver_type")  !== "undefined" && typeof ($("#TV6_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV6 = $("#TV6_Receiver_type").val().join(',');
	     if ($("#TV7_Receiver_type")  !== "undefined" && typeof ($("#TV7_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV7 = $("#TV7_Receiver_type").val().join(',');
	     if ($("#TV8_Receiver_type")  !== "undefined" && typeof ($("#TV8_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV8 = $("#TV8_Receiver_type").val().join(',');
	     if ($("#TV9_Receiver_type")  !== "undefined" && typeof ($("#TV9_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV9 = $("#TV9_Receiver_type").val().join(',');
	     if ($("#TV10_Receiver_type")  !== "undefined" && typeof ($("#TV10_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV10 = $("#TV10_Receiver_type").val().join(',');
	     if ($("#TV11_Receiver_type")  !== "undefined" && typeof ($("#TV11_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV11 = $("#TV11_Receiver_type").val().join(',');
	     if ($("#TV12_Receiver_type")  !== "undefined" && typeof ($("#TV12_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV12 = $("#TV12_Receiver_type").val().join(',');

	     
	     
	       //  setHHName(); // setting HHName for Respondant 
	     	//
		    var out = {};
		    var s_data = $("#questionnaireForm").serializeArray();
		   
		    //transform into simple data/value object
		    for(var i = 0; i<s_data.length; i++){
		        var record = s_data[i];
 
		        if (record.name == "second_House_Private")
		        {

		        	 out[record.name] =arrayValues;
			    }
		        else if (record.name == "second_House_Shared")
		        {

		        	 out[record.name] =arrayValues1;
			    }
		        else if (record.name == "TV1_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV1;
			    }
		        else if (record.name == "TV2_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV2;
			    }
		        else if (record.name == "TV3_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV3;
			    }

		        else if (record.name == "TV4_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV4;
			    }

		        else if (record.name == "TV5_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV5;
			    }

		        else if (record.name == "TV6_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV6;
			    }

		        else if (record.name == "TV7_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV7;
			    }

		        else if (record.name == "TV8_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV8;
			    }

		        else if (record.name == "TV9_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV9;
			    }

		        else if (record.name == "TV10_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV10;
			    }
		        else if (record.name == "TV11_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV11;
			    }
		        else if (record.name == "TV12_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV12;
			    }
		        else if (record.name == "TV1_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV1;
			    }
		        else if (record.name == "TV2_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV2;
			    }
		        else if (record.name == "TV3_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV3;
			    }

		        else if (record.name == "TV4_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV4;
			    }

		        else if (record.name == "TV5_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV5;
			    }

		        else if (record.name == "TV6_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV6;
			    }

		        else if (record.name == "TV7_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV7;
			    }

		        else if (record.name == "TV8_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV8;
			    }

		        else if (record.name == "TV9_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV9;
			    }

		        else if (record.name == "TV10_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV10;
			    }
		        else if (record.name == "TV11_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV11;
			    }
		        else if (record.name == "TV12_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV12;
			    }
			    
		        else if (record.name == "TV1_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV1;
			    }
		        else if (record.name == "TV2_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV2;
			    }
		        else if (record.name == "TV3_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV3;
			    }

		        else if (record.name == "TV4_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV4;
			    }

		        else if (record.name == "TV5_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV5;
			    }

		        else if (record.name == "TV6_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV6;
			    }

		        else if (record.name == "TV7_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV7;
			    }

		        else if (record.name == "TV8_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV8;
			    }

		        else if (record.name == "TV9_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV9;
			    }

		        else if (record.name == "TV10_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV10;
			    }
		        else if (record.name == "TV11_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV11;
			    }
		        else if (record.name == "TV12_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV12;
			    }
		        
		        else if (record.name == "TV1_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV1;
			    }
		        else if (record.name == "TV2_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV2;
			    }
		        else if (record.name == "TV3_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV3;
			    }

		        else if (record.name == "TV4_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV4;
			    }

		        else if (record.name == "TV5_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV5;
			    }

		        else if (record.name == "TV6_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV6;
			    }

		        else if (record.name == "TV7_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV7;
			    }

		        else if (record.name == "TV8_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV8;
			    }

		        else if (record.name == "TV9_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV9;
			    }

		        else if (record.name == "TV10_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV10;
			    }
		        else if (record.name == "TV11_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV11;
			    }
		        else if (record.name == "TV12_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV12;
			    }
			    
		        else if (record.name == "TV1_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV1;
			    }
		        else if (record.name == "TV2_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV2;
			    }
		        else if (record.name == "TV3_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV3;
			    }

		        else if (record.name == "TV4_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV4;
			    }

		        else if (record.name == "TV5_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV5;
			    }

		        else if (record.name == "TV6_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV6;
			    }

		        else if (record.name == "TV7_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV7;
			    }

		        else if (record.name == "TV8_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV8;
			    }

		        else if (record.name == "TV9_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV9;
			    }

		        else if (record.name == "TV10_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV10;
			    }
		        else if (record.name == "TV11_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV11;
			    }
		        else if (record.name == "TV12_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV12;
			    }
		        
		        else
		        {
		        out[record.name] = record.value;
		        }
		    }
		   
		    var str = jQuery.param( out );

		    console.log( out);
		
	        if (typeof ogeroId  == "undefined"  ||  ogeroId  == ""   ||  ogeroId  == "0"   ||  statusId  == "0") {
	            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Error!</div>");
	        } else {
	        	  //alert("id="+ogeroId+"&userId="+userId+"&statusId="+statusId);
	            $.ajax({
	                type: "POST",
	                url: "getServices.php",
	                data: "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updateQuestionnaire&otherComment=stopClicked&"+str,
	                success: function(data, status, xhr) {  
	                		 if (typeof data  === "undefined" || data == "" || data == "null") {
	                    	  $.redirect("updateStatus.php",
	    	                        {
	    	                        	id: ogeroId,
	    	                        });  
	                        
	                    } else {
		                    if (data.length >0)
		                    {
			                   $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Questionnaire Not Saved - Contact Administrator <br/>"+ data+"</div>");
		                    }
		                    else
		                    {

		                    	window.location.href = 'quotaGrid.php';
			                }
	                    }
	                     
	                } 
	               
	            });
	        }
	        return false;


	       
		    		
	      });


//on Finish click
$("#finishBtn").click(function () 
	     {   $("#warning").html("");
	    	var userId =  <?php echo $_SESSION['userId']?>;
			var ogeroId =  <?php if (!empty($id)) { echo  $id;} else { echo '0';}?>;
			var statusId = 2; // Success
		 
	         //alert ( "xxxtatusId=" + statusId + "&ogeroId="+ogeroId+"&userId="+userId );
 			 var array_values = [];
	         $("#private").each( function() {
	        	 
	             if( $(this).is(':checked') ) {  
	                 array_values.push( $(this).val() );
	             }
	         });

	       //handling Private checkboxes
	         var array_values = [];
	         $(".mylistPrivate").each(function()
	         {
	             if($(this).is(':checked'))
	             {   array_values.push( $(this).val() );
	                  
	             }
	            
	         })
	         var arrayValues = array_values.join('x');
	     	 
			//handling shared checkboxes
	         var array_values1 = [];
	         $(".mylistShared").each(function()
	         {
	             if($(this).is(':checked'))
	             {   array_values1.push( $(this).val() );
	                  
	             }
	            
	         })
	         var arrayValues1 = array_values1.join('x');
	       	//
	       	//Multiple Select for the Satellites, devices and receivers
	     	//Multiple Select for the Satellites, devices and receivers
	     if ($("#TV1_Satellites")  !== "undefined" && typeof ($("#TV1_Satellites").val())  !== "undefined") var arrayValueszTV1 = $("#TV1_Satellites").val().join(',');
	     if ($("#TV2_Satellites")  !== "undefined" && typeof ($("#TV2_Satellites").val())  !== "undefined") var arrayValueszTV2 = $("#TV2_Satellites").val().join(',');
	     if ($("#TV3_Satellites")  !== "undefined" && typeof ($("#TV3_Satellites").val())  !== "undefined") var arrayValueszTV3 = $("#TV3_Satellites").val().join(',');
	     if ($("#TV4_Satellites")  !== "undefined" && typeof ($("#TV4_Satellites").val())  !== "undefined") var arrayValueszTV4 = $("#TV4_Satellites").val().join(',');
	     if ($("#TV5_Satellites")  !== "undefined" && typeof ($("#TV5_Satellites").val())  !== "undefined") var arrayValueszTV5 = $("#TV5_Satellites").val().join(',');
	     if ($("#TV6_Satellites")  !== "undefined" && typeof ($("#TV6_Satellites").val())  !== "undefined") var arrayValueszTV6 = $("#TV6_Satellites").val().join(',');
	     if ($("#TV7_Satellites")  !== "undefined" && typeof ($("#TV7_Satellites").val())  !== "undefined") var arrayValueszTV7 = $("#TV7_Satellites").val().join(',');
	     if ($("#TV8_Satellites")  !== "undefined" && typeof ($("#TV8_Satellites").val())  !== "undefined") var arrayValueszTV8 = $("#TV8_Satellites").val().join(',');
	     if ($("#TV9_Satellites")  !== "undefined" && typeof ($("#TV9_Satellites").val())  !== "undefined") var arrayValueszTV9 = $("#TV9_Satellites").val().join(',');
	     if ($("#TV10_Satellites")  !== "undefined" && typeof ($("#TV10_Satellites").val())  !== "undefined") var arrayValueszTV10 = $("#TV10_Satellites").val().join(',');
	     if ($("#TV11_Satellites")  !== "undefined" && typeof ($("#TV11_Satellites").val())  !== "undefined") var arrayValueszTV11 = $("#TV11_Satellites").val().join(',');
	     if ($("#TV12_Satellites")  !== "undefined" && typeof ($("#TV12_Satellites").val())  !== "undefined") var arrayValueszTV12 = $("#TV12_Satellites").val().join(',');
 

	     if ($("#TV1_Devices_connected")  !== "undefined" && typeof ($("#TV1_Devices_connected").val())  !== "undefined") var arrayValuesDevTV1 = $("#TV1_Devices_connected").val().join(',');
	     if ($("#TV2_Devices_connected")  !== "undefined" && typeof ($("#TV2_Devices_connected").val())  !== "undefined") var arrayValuesDevTV2 = $("#TV2_Devices_connected").val().join(',');
	     if ($("#TV3_Devices_connected")  !== "undefined" && typeof ($("#TV3_Devices_connected").val())  !== "undefined") var arrayValuesDevTV3 = $("#TV3_Devices_connected").val().join(',');
	     if ($("#TV4_Devices_connected")  !== "undefined" && typeof ($("#TV4_Devices_connected").val())  !== "undefined") var arrayValuesDevTV4 = $("#TV4_Devices_connected").val().join(',');
	     if ($("#TV5_Devices_connected")  !== "undefined" && typeof ($("#TV5_Devices_connected").val())  !== "undefined") var arrayValuesDevTV5 = $("#TV5_Devices_connected").val().join(',');
	     if ($("#TV6_Devices_connected")  !== "undefined" && typeof ($("#TV6_Devices_connected").val())  !== "undefined") var arrayValuesDevTV6 = $("#TV6_Devices_connected").val().join(',');
	     if ($("#TV7_Devices_connected")  !== "undefined" && typeof ($("#TV7_Devices_connected").val())  !== "undefined") var arrayValuesDevTV7 = $("#TV7_Devices_connected").val().join(',');
	     if ($("#TV8_Devices_connected")  !== "undefined" && typeof ($("#TV8_Devices_connected").val())  !== "undefined") var arrayValuesDevTV8 = $("#TV8_Devices_connected").val().join(',');
	     if ($("#TV9_Devices_connected")  !== "undefined" && typeof ($("#TV9_Devices_connected").val())  !== "undefined") var arrayValuesDevTV9 = $("#TV9_Devices_connected").val().join(',');
	     if ($("#TV10_Devices_connected")  !== "undefined" && typeof ($("#TV10_Devices_connected").val())  !== "undefined") var arrayValuesDevTV10 = $("#TV10_Devices_connected").val().join(',');
	     if ($("#TV11_Devices_connected")  !== "undefined" && typeof ($("#TV11_Devices_connected").val())  !== "undefined") var arrayValuesDevTV11 = $("#TV11_Devices_connected").val().join(',');
	     if ($("#TV12_Devices_connected")  !== "undefined" && typeof ($("#TV12_Devices_connected").val())  !== "undefined") var arrayValuesDevTV12 = $("#TV12_Devices_connected").val().join(',');

	     
	     if ($("#TV1_Reception_TV_signal")  !== "undefined" && typeof ($("#TV1_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV1 = $("#TV1_Reception_TV_signal").val().join(',');
	     if ($("#TV2_Reception_TV_signal")  !== "undefined" && typeof ($("#TV2_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV2 = $("#TV2_Reception_TV_signal").val().join(',');
	     if ($("#TV3_Reception_TV_signal")  !== "undefined" && typeof ($("#TV3_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV3 = $("#TV3_Reception_TV_signal").val().join(',');
	     if ($("#TV4_Reception_TV_signal")  !== "undefined" && typeof ($("#TV4_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV4 = $("#TV4_Reception_TV_signal").val().join(',');
	     if ($("#TV5_Reception_TV_signal")  !== "undefined" && typeof ($("#TV5_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV5 = $("#TV5_Reception_TV_signal").val().join(',');
	     if ($("#TV6_Reception_TV_signal")  !== "undefined" && typeof ($("#TV6_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV6 = $("#TV6_Reception_TV_signal").val().join(',');
	     if ($("#TV7_Reception_TV_signal")  !== "undefined" && typeof ($("#TV7_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV7 = $("#TV7_Reception_TV_signal").val().join(',');
	     if ($("#TV8_Reception_TV_signal")  !== "undefined" && typeof ($("#TV8_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV8 = $("#TV8_Reception_TV_signal").val().join(',');
	     if ($("#TV9_Reception_TV_signal")  !== "undefined" && typeof ($("#TV9_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV9 = $("#TV9_Reception_TV_signal").val().join(',');
	     if ($("#TV10_Reception_TV_signal")  !== "undefined" && typeof ($("#TV10_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV10 = $("#TV10_Reception_TV_signal").val().join(',');
	     if ($("#TV11_Reception_TV_signal")  !== "undefined" && typeof ($("#TV11_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV11 = $("#TV11_Reception_TV_signal").val().join(',');
	     if ($("#TV12_Reception_TV_signal")  !== "undefined" && typeof ($("#TV12_Reception_TV_signal").val())  !== "undefined") var arrayValuesRecTV12 = $("#TV12_Reception_TV_signal").val().join(',');

	     if ($("#TV1_Receiver_type")  !== "undefined" && typeof ($("#TV1_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV1 = $("#TV1_Receiver_type").val().join(',');
	     if ($("#TV2_Receiver_type")  !== "undefined" && typeof ($("#TV2_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV2 = $("#TV2_Receiver_type").val().join(',');
	     if ($("#TV3_Receiver_type")  !== "undefined" && typeof ($("#TV3_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV3 = $("#TV3_Receiver_type").val().join(',');
	     if ($("#TV4_Receiver_type")  !== "undefined" && typeof ($("#TV4_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV4 = $("#TV4_Receiver_type").val().join(',');
	     if ($("#TV5_Receiver_type")  !== "undefined" && typeof ($("#TV5_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV5 = $("#TV5_Receiver_type").val().join(',');
	     if ($("#TV6_Receiver_type")  !== "undefined" && typeof ($("#TV6_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV6 = $("#TV6_Receiver_type").val().join(',');
	     if ($("#TV7_Receiver_type")  !== "undefined" && typeof ($("#TV7_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV7 = $("#TV7_Receiver_type").val().join(',');
	     if ($("#TV8_Receiver_type")  !== "undefined" && typeof ($("#TV8_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV8 = $("#TV8_Receiver_type").val().join(',');
	     if ($("#TV9_Receiver_type")  !== "undefined" && typeof ($("#TV9_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV9 = $("#TV9_Receiver_type").val().join(',');
	     if ($("#TV10_Receiver_type")  !== "undefined" && typeof ($("#TV10_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV10 = $("#TV10_Receiver_type").val().join(',');
	     if ($("#TV11_Receiver_type")  !== "undefined" && typeof ($("#TV11_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV11 = $("#TV11_Receiver_type").val().join(',');
	     if ($("#TV12_Receiver_type")  !== "undefined" && typeof ($("#TV12_Receiver_type").val())  !== "undefined") var arrayValuesReceiverTV12 = $("#TV12_Receiver_type").val().join(',');
	     
		    var out = {};
		    var s_data = $("#questionnaireForm").serializeArray();
		   
		    //transform into simple data/value object
		    for(var i = 0; i<s_data.length; i++){
		        var record = s_data[i];
		        if (record.name == "second_House_Private")
		        {

		        	 out[record.name] =arrayValues;
			    }
		        else if (record.name == "second_House_Shared")
		        {

		        	 out[record.name] =arrayValues1;
			    }
		        else if (record.name == "TV1_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV1;
			    }
		        else if (record.name == "TV2_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV2;
			    }
		        else if (record.name == "TV3_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV3;
			    }

		        else if (record.name == "TV4_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV4;
			    }

		        else if (record.name == "TV5_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV5;
			    }

		        else if (record.name == "TV6_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV6;
			    }

		        else if (record.name == "TV7_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV7;
			    }

		        else if (record.name == "TV8_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV8;
			    }

		        else if (record.name == "TV9_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV9;
			    }

		        else if (record.name == "TV10_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV10;
			    }
		        else if (record.name == "TV11_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV11;
			    }
		        else if (record.name == "TV12_Satellites")
		        {

		        	 out[record.name] =arrayValueszTV12;
			    }
		        else if (record.name == "TV1_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV1;
			    }
		        else if (record.name == "TV2_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV2;
			    }
		        else if (record.name == "TV3_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV3;
			    }

		        else if (record.name == "TV4_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV4;
			    }

		        else if (record.name == "TV5_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV5;
			    }

		        else if (record.name == "TV6_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV6;
			    }

		        else if (record.name == "TV7_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV7;
			    }

		        else if (record.name == "TV8_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV8;
			    }

		        else if (record.name == "TV9_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV9;
			    }

		        else if (record.name == "TV10_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV10;
			    }
		        else if (record.name == "TV11_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV11;
			    }
		        else if (record.name == "TV12_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV12;
			    }
			    
		        else if (record.name == "TV1_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV1;
			    }
		        else if (record.name == "TV2_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV2;
			    }
		        else if (record.name == "TV3_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV3;
			    }

		        else if (record.name == "TV4_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV4;
			    }

		        else if (record.name == "TV5_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV5;
			    }

		        else if (record.name == "TV6_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV6;
			    }

		        else if (record.name == "TV7_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV7;
			    }

		        else if (record.name == "TV8_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV8;
			    }

		        else if (record.name == "TV9_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV9;
			    }

		        else if (record.name == "TV10_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV10;
			    }
		        else if (record.name == "TV11_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV11;
			    }
		        else if (record.name == "TV12_Devices_connected")
		        {

		        	 out[record.name] =arrayValuesDevTV12;
			    }
		        
		        else if (record.name == "TV1_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV1;
			    }
		        else if (record.name == "TV2_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV2;
			    }
		        else if (record.name == "TV3_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV3;
			    }

		        else if (record.name == "TV4_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV4;
			    }

		        else if (record.name == "TV5_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV5;
			    }

		        else if (record.name == "TV6_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV6;
			    }

		        else if (record.name == "TV7_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV7;
			    }

		        else if (record.name == "TV8_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV8;
			    }

		        else if (record.name == "TV9_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV9;
			    }

		        else if (record.name == "TV10_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV10;
			    }
		        else if (record.name == "TV11_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV11;
			    }
		        else if (record.name == "TV12_Reception_TV_signal")
		        {

		        	 out[record.name] =arrayValuesRecTV12;
			    }
			    
		        else if (record.name == "TV1_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV1;
			    }
		        else if (record.name == "TV2_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV2;
			    }
		        else if (record.name == "TV3_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV3;
			    }

		        else if (record.name == "TV4_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV4;
			    }

		        else if (record.name == "TV5_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV5;
			    }

		        else if (record.name == "TV6_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV6;
			    }

		        else if (record.name == "TV7_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV7;
			    }

		        else if (record.name == "TV8_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV8;
			    }

		        else if (record.name == "TV9_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV9;
			    }

		        else if (record.name == "TV10_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV10;
			    }
		        else if (record.name == "TV11_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV11;
			    }
		        else if (record.name == "TV12_Receiver_type")
		        {

		        	 out[record.name] =arrayValuesReceiverTV12;
			    }
		        
		        else
		        {
		        out[record.name] = record.value;
		        }
		        
		    }
		    //console.log( out);
		    var str = jQuery.param( out );


		 //   setHHName(); // setting HHName for Respondant 
			 
   	 	 var zValFamily = parseInt($("#HH_size_without_Maids").val()) ;
       	 var zValMaid = parseInt($("#Number_of_Maids").val()) ;
       	// alert (zValFamily + '.deed.'+ zValMaid )
       	 var total = zValFamily +  zValMaid;
       	 //  alert ("total" + total )
       	 if (  total > 0)
       	 {
       		 
       		 var Ztotal = total + 1;
       		 for (i = Ztotal; i <= 13; i++) {
       			  
       			   $("#zPanel"+i).remove();
       			 
       		 } 
       	 
       	  }
 		 //console.log(   "osssgeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updateQuestionnaire&otherComment=finishClicked&"+str);
		
	        if (typeof ogeroId  == "undefined"  ||  ogeroId  == ""   ||  ogeroId  == "0"   ||  statusId  == "0") { alert ("error");
	            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">You have missed mandatory fields in the Survey</button>Error!</div>");
	        } else {
	        	 //  alert("id="+ogeroId+"&userId="+userId+"&statusId="+statusId);
	        	 // Recheck mandatory fields
	        var requiredMissingArr = [];
	        var fields=	 $(".wizard-card").find("select, textarea, input, radio, checkbox").filter('[required]').serializeArray();
	        var passingCheck = true;
              $.each(fields, function(i, field) {
                if (!field.value)
                {
                 // console.log(field.name + ' is required, Value='+ field.value+ '!');
                  requiredMissingArr.push(field.name);
               	  passingCheck = false;
                }
               }); 
 
 
                  if (requiredMissingArr === undefined || requiredMissingArr.length == 0) { // array empty or does not exist
                	    
                        	  $.ajax({
                        	                type: "POST",
                        	                url: "getServices.php",
                        	                data: "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updateQuestionnaire&otherComment=success&"+str,
                        	                
                        	                success: function (data) { 
                        	                	 
                   	                		 if (typeof data  === "undefined" || data == "" || data == "null") 
                       	                	  {
                   	                			window.location.href = 'quotaGrid.php';
                   	                        
                   	                   	     } else 
                       	                   	     {
                           		                    if (data.length >0)
                           		                    {
                           			                   $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Questionnaire Not Saved - Contact Administrator <br/>"+ data+"</div>");
                           		                    }
                           		                    else
                           		                    {
         												window.location.href = 'quotaGrid.php';
                           			                }
                   	                   			 }
                   	                  
                         				 }  
                        	            });
                        
                        }
                  else
                  {
                      $("#warning").html("<div class=\"alert alert-danger alert-dismissable\"><h5 style='word-wrap: break-word;color:red' >Survey is NOT SAVED !!! You have missed mandatory fields in the Survey:  " +requiredMissingArr+ "</h5></div>");
                   }
	            
	        }
	        return false;
 	    		
	      });



//Gender Setting
// $('.relationClass').change(function(){  alert("tes");
//   var males = ["1", "3", "5", "8", "9", "11", "15", "16", "17", "18", "19", "22", "24" ];
//   var females = ["2", "4", "6", "7", "10", "12", "20", "21", "23", "26", "27"]; 
//    var maleFound = males.indexOf($(this).val());
//    var femaleFound = females.indexOf($(this).val());

//    var relationValue =$(this).val(); alert ("=$(this)="+ $(this).innerHTML())
  
// 			   $("#zPanel"+i).find('.relationClass').each(function() {
// 			      alert (males.indexOf(relationValue));
 
// 			        if(  males.indexOf(relationValue) > 0 )
// 			        {alert("maleFound");
// 			        	 if ($('#P'+i+'_Relation').length > 0)
// 			        	 {

// 			        		 $('#P'+i+'_Gender').val(0);
				        	 
// 				        	 }
				        
// 			      } else if ( females.indexOf(relationValue) > 0){
// 			    	  $('#P'+i+'_Gender').val(1);
// 			      }
// 			   });
			   
			  
	 
	 
	 
// });


//HH_size_without_Maids on change
$('input[name=Number_of_Maids]').change(function(){  
	 
	 var zValFamily = parseInt($("#HH_size_without_Maids").val()) ;
	 var zValMaid = parseInt($("#Number_of_Maids").val()) ;
	// alert (zValFamily + '.deed.'+ zValMaid )
	 var total = zValFamily +  zValMaid;
	 //  alert ("total" + total )
	 if (  total > 0)
	 {
		 for (i = 1; i <= total; i++) {
			  $("#zPanel"+i).css('display','block');

		 } 
		 
		 var Ztotal = total + 1;
		 for (i = Ztotal; i <= 13; i++) {
			   $("#zPanel"+i).find(':input').each(function() {
			   
			        if(this.type == 'checkbox' || this.type == 'radio') {
			        this.checked = false;
			      } else{
			        $(this).val('');
			      }
			   });
			   $("#zPanel"+i).css('display','none');
			 
		 } 
	 
	  }
	 
});



//number_of_maids on change
$('input[name=HH_size_without_Maids]').change(function(){  
	 
	 var zValFamily = parseInt($("#HH_size_without_Maids").val()) ;
	 var zValMaid = parseInt($("#Number_of_Maids").val()) ;
	  //alert (zValFamily + '.deed.'+ zValMaid )
	 var total = zValFamily +  zValMaid;
	  //alert ("total" + total )
	 if (  total > 0)
	 {
		 for (i = 1; i <= total; i++) {
			  $("#zPanel"+i).css('display','block');

		 } 
		 
		 var Ztotal = total + 1;
		 for (i = Ztotal; i <= 13; i++) {
			   $("#zPanel"+i).find(':input').each(function() {
			   
			        if(this.type == 'checkbox' || this.type == 'radio') {
			        this.checked = false;
			      } else{
			        $(this).val('');
			      }
			   });
			   $("#zPanel"+i).css('display','none');
			  
		 } 
	 
	  }
	 
});

// function to SEt the respondant as HH NAME
function setHHName()
{
			   var i = 0;
			   $('.respondant').each(function() {
				   i++;  
				   if($(this).val() == 1) //Respondant is yes
					 { 
					   if ($('#P'+i+'_Name').length > 0 ||  $('#P'+i+'_Last_name').length > 0)
			    	   {
						   $('#HH_name').val($('#P'+i+'_Name').val()+ ' ' + $('#P'+i+'_Last_name').val());
			    	   } 
			    	  
			    	   if ($('#P'+i+'_Name_arabic').length > 0 ||  $('#P'+i+'_Last_name_arabic').length > 0)
			    	   {
			    	   		$('#HH_name_arabic').val($('#P'+i+'_Name_arabic').val()+ ' ' + $('#P'+i+'_Last_name_arabic').val());
			    	   }
			    	  }
			    });
}
//On change on Respondant
  $('.respondant').change(function(){  setHHName()});

  
$(document).ready(function() {
    $('.pull-right').each(function() {
        if($(this).parent().css('direction') == 'rtl')
            $(this).attr('style', 'float:left !important');
    });


    // Setting HH Arabic Name and HH Phone by default
      var HHnameArabic = "<?php if (isset($quotaData["name"])) {echo $quotaData["name"];} else { echo '';}?>";
      var HH_telephone =  "<?php if (isset($quotaData["serv_line_no"])) {echo $quotaData["serv_line_no"];} else { echo '';}?>";
      $("#HH_name_arabic").val(HHnameArabic);
      $("#HH_telephone").val(HH_telephone);

    // allow arabic characters only for following fields
//       for (i=1; i<14; i ++ )
//       {
       
//         restrictInputOtherThanArabic($('#P'+i+'_Name_arabic'));
//         restrictInputOtherThanArabic($('#P'+i+'_Last_name_arabic'));
//       }
//     restrictInputOtherThanArabic($('#candidate_lastname'));
//     restrictInputOtherThanArabic($('#Area_arabic'));
//     restrictInputOtherThanArabic($('#Area_details_arabic'));
//     restrictInputOtherThanArabic($('#Address_arabic'));
//     restrictInputOtherThanArabic($('#Building_arabic'));
 
 
});
 
function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  
function restrictInputOtherThanArabic($field)
{
  // Arabic characters fall in the Unicode range 0600 - 06FF
  var arabicCharUnicodeRange = /[\u0600-\u06FF]/;
  $field.bind("keypress", function(event)
  {
    var key = event.which;
    // 0 = numpad
    // 8 = backspace
    // 32 = space
    if (key==8 || key==0 || key === 32)
    {
      return true;
    }
    var str = String.fromCharCode(key);
    if ( arabicCharUnicodeRange.test(str) )
    {
      return true;
    }
    return false;
  });
}
 
</script>

 <script src="assets/js/yamli_api.js" type="text/javascript"></script>
   <script type="text/javascript">
        if (typeof(Yamli) == "object" && Yamli.init( { uiLanguage: "en" , startMode: "onOrUserDefault" } ))
        {
            Yamli.yamlify( "HH_name_arabic", { settingsPlacement: "inside" } );
            Yamli.yamlify( "Area_arabic", { settingsPlacement: "inside" } );
            Yamli.yamlify( "Area_details_arabic", { settingsPlacement: "inside" } );
            Yamli.yamlify( "Street_arabic", { settingsPlacement: "inside" } );
            Yamli.yamlify( "Building_arabic", { settingsPlacement: "inside" } );
            Yamli.yamlify( "Floor_arabic", { settingsPlacement: "inside" } );
        }
    </script>
    
</html>