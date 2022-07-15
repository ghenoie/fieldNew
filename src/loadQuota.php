<?php
namespace Phppot;

//use \Phppot\DataSource;
require_once __DIR__ . '/DataSource.php';
$ds = new DataSource();

?>
  
<html>
 <?php 
 require "loginheader.php"; 
 include('menu.php');
 ?>

<head>


<link href="../assets/css/main.css" rel="stylesheet" media="screen">
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

 <script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script src="./js/bootstrap.min.js"></script>
 <script src='./js/functions.js' type='text/javascript'></script>

 
<style>
.form-control
{
     padding: 0px 0px;
}
.firma-ara{
    padding-bottom: 100px;
    padding-top: 100px;
}
.form-arka-plan{
    background-image: url('/images/files.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
}
.acik-renk-form{
    background: rgba(255, 255, 255, 0.58);
}
.siyah-cerceve{
    -webkit-text-fill-color: white;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: black;
}
</style>


<script type="text/javascript">
var userRole = <?php echo  $_SESSION['userRole'] ?>;
$(document).ready(function () {  

	 getMohafaza();
	 getStatus();
	 
	 }
);


function getMohafaza() {
	 $.ajax({
		type: "POST",
		  dataType: "json",
		url: "getServices.php",
		data:'action=getMohafaza',
		
		success: function(json){  
	 		  var $el = $("#mohafaza-list");
	            $el.empty();  
	            $el.append($("<option></option>")
	                    .attr("value", '999').text('All Qadaas'));
	            $el.append(json);  
			
			}
		});
	}

function getQadaa(val) {
$.ajax({
	type: "POST",
	  dataType: "json",
	url: "getServices.php",
	data:'action=getQadaa&mohafazaId='+val,
	
	success: function(json){  
		  var $el = $("#qadaa-list");
           $el.empty();  
           $el.append($("<option></option>")
                   .attr("value", '999').text('All Qadaas'));
           $el.append(json);  
		
		}
	});
}

function getRegion(val) {
 $.ajax({
	type: "POST",
   dataType: "json",
	url: "getServices.php",
	data:'action=getRegion&qadaaId='+val,
	
	success: function(json){  
		  var $el = $("#region-list");
           $el.empty();  
           $el.append($("<option></option>")
                   .attr("value", '999').text('All Regions'));
           $el.append(json);  
		
		}
	});
}

function getStatus() {
	  $.ajax({
		type: "POST",
	    dataType: "json",
		url: "getServices.php",
		data:'action=getStatus',
		
		success: function(json){  
	 		  var $el = $("#status-list");
	            $el.empty();  
	            $el.append($("<option></option>")
	                    .attr("value", '999').text('All Statuses'));
	            $el.append(json);  
			
			}
		});
	}

 
</script>
</head>
 
<body>   
 
 <div class="well well-sm">Load Quota</div>
 
 <form method="POST" name="search" action="">
 <section class="search-banner text-white py-5 form-arka-plan" id="search-banner">
    <div class="container py-1 my-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card acik-renk-form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                   <select name="mohafaza"
											id="mohafaza-list" class="form-control" onChange="getQadaa(this.value);">
											<option value="999">Select Mohafaza</option>
												 
										</select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                         <select name="qadaa" id="qadaa-list" class="form-control" onChange="getRegion(this.value);">
                                     <option value="999">All Qadaas</option>
                                     </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                       	<select name="region[]"  id="region-list" class="form-control"  multiple="multiple" size=4> 
										    <option value="999">All Regions</option>
										  </select> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
								<?php      if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) != 1) { ?>
                                     <select name="status" id="status-list" class="form-control">
									   <option value="999">All Statuses</option>
									 </select>
								<?php  }?>
                                </div>
                            </div>
                            
							<div class="col-md-4">
                                <div class="form-group ">
									<?php      if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) == 1) { ?>
                                      <input type="number" class="form-control" value="10" step="10" min=0  name="total" id="total">
									<?php  }?>
                                </div>
                            </div>
								<div class="col-md-4">
								 
								<?php      if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) == 1) { ?>
									  			<input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='filter' id="filterbtn" value='Generate'/>

										<?php  }?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
 
 
 
  <div id="message"></div>
 </form>
 
  <br/><br/><br/><br/><br/>
 <footer class="footer fixed-bottom container" align="center">
        <hr>
         <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>
<script>

$("#filterbtn").click(function () 
		{  
		  generateQuota();

	     });

function generateQuota()
{ 
 
	var mohafazaId = $("#mohafaza-list").val(); 
	var qadaaId = $("#qadaa-list").val(); 
	var regionId = $("#region-list").val(); 
    var total = $("#total").val();


    
	// alert ("mohafazaId="+mohafazaId + "qadaaId="+qadaaId + " regionId="+regionId + " total="+ total  )
	
	       $.ajax({
                type: "POST",
                url: "getServices.php",
                data: "mohafazaId="+mohafazaId+"&qadaaId="+qadaaId+"&regionId="+regionId+"&total="+total+"&action=loadQuota",
                
                success: function (data) {  
                   		 if (typeof data  === "undefined" || data == "" || data == "null") 
                  	  		{
                   		  $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button> Quota data loaded successfully  </div>");
   	                    
                      
                 	       } else 
                     	     {
        	                    if (data.length >0)
        	                    {
        		                   $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Error: Records Not Saved - Contact Administrator <br/>"+ data+"</div>");
        	                    }
        	                    
                 			 }
                    
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#message").html("<h5 class='text-center'><img src='images/ajax-loading.gif'></h5>");
                }
            });
 

	}



</script>


</body>
</html>

 