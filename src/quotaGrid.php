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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 


    <!-- scripts -->
	<script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
 
	<script src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css"/>
    
    
    <script type="text/javascript">
var userRole = <?php echo  $_SESSION['userRole'] ?>;



$(document).ready(function () {  

	 getMohafaza();
	 getStatus();
	 getUsers();
	 buildGrid();
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
	                    .attr("value", '999').text('All Mohafazas'));
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

function getUsers() {
	  $.ajax({
			type: "POST",
		    dataType: "json",
			url: "getServices.php",
			data:'action=getUsers',
			
			success: function(json){  
		 		  var $el = $("#user-list");
		            $el.empty();  
		            $el.append($("<option></option>")
		                    .attr("value", '999').text('All users'));
		            $el.append(json);  
				
				}
			});
		}
      
 
</script>
</head>
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
    background-image: url('/images/loginBackground.jpg');
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
<body>   
 	<?php      if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) == 1) { ?>
 
		<div class="well well-sm">HOUSEHOLDS Grid</div>  
 
     <?php }?>
 
 <form method="POST" name="search" action="">
 <section class="search-banner text-white py-3 form-arka-plan" id="search-banner">
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
								 
                                     <select name="status" id="status-list" class="form-control">
                                       	<option value="1">Not Called</option>
									  </select>
								 
                                </div>
                            </div>
                            
                                   <div class="col-md-4">
                                <div class="form-group ">
							 <?php    /*  if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) == 1) { ?>
                                     <select name="userId" id="user-list" class="form-control">
									   <option value="999">All Users</option>
									 </select>
							 <?php  }*/?>
                                </div>
                            </div>
                            
							<!-- div class="col-md-4">
                                <div class="form-group ">
									<?php      if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) == 1) { ?>
                                       <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Search by Telephone 9123123">
									<?php  }?>
                                </div>
                            </div-->
								<div class="col-md-4">
								 
						 
									  <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='filter' id="filterbtn" value='Search'/>
							 
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
<script>

$("#filterbtn").click(function () 
{  
  buildGrid();
});


 
 function buildGrid()
 {
		var mohafazaId = $("#mohafaza-list").val(); 
		var qadaaId = $("#qadaa-list").val(); 
		var regionId = $("#region-list").val(); 
		var statusId =$("#status-list").val();
		var telephone =$("#telephone").val(); 
		var userId = $("#user-list").val(); 
		/*

		  t - The table
		    i - Table information summary
		    p - pagination control
		    r - processing display element
		*/
		// alert ("mohafazaId="+mohafazaId + "qadaaId="+qadaaId + " regionId="+regionId + " telephone="+ telephone + "statusId=" + statusId)
		
		var dom = 'tr';
		/*if (userRole == 1)
		{*/
			dom = 'trp';
		/*}
		else
		{
			dom = 'tr';
		}*/
        var dataTable = $('#quota-grid').DataTable({

        	"rowCallback": function( row, data, index ) {
                if ( data[5] == "2" ||
                		data[5] == "3" ||
                		data[5] == "4" ||
                		data[5] == "5" ||
                		data[5] == "6" ||
                		data[5] == "7" ||
                		data[5] == "9" ||
                		data[5] == "14" ||
                		data[5] == "15" ||
                		data[5] == "18" ) 
                {
                    $('td', row).css('background-color', '#ff000057');
                }
                else
                {
                   // $('td', row).css('background-color', 'Orange');
                }
             },
       	 "destroy": true, //use for reinitialize datatable
			"searching":false,
			 "dom": dom,
			"stateSave": true,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "getServices.php", // json datasource
                data: {action: 'getQuota',mohafazaId : mohafazaId, qadaaId : qadaaId, regionId : regionId, statusId : statusId, userId: userId, telephone:telephone},

                type: 'post',  // method  , by default get
            },
            error: function () {  // error handling
                $(".quota-grid-error").html("");
                $("#quota-grid").append('<tbody class="quota-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#quota-grid_processing").css("display", "none");
            },
		       "columnDefs": [ {
			   "targets": 11,
			   "render": function ( data, type, full, meta ) {console.log(full[5]);
				   var zlink ="";

				   if ( full[5] == "2" ||
						   full[5] == "3" ||
						   full[5] == "4" ||
						   full[5] == "5" ||
						   full[5] == "6" ||
						   full[5] == "7" ||
						   full[5] == "9" ||
						   full[5] == "14" ||
						   full[5] == "15" ||
						   full[5] == "18" ) 
				   {
					
				   }
				   else 
				   {
					   zlink +=  '<br/><button   class="btn btn-warning  pl-4 pr-4" id="Filter" onclick="goToWelcome(12,' + full[0]+ ',' + full[0]+ ')">Contact Out</button>';
   					  }
				  
				   return zlink;
				}
			}]

			

        });

}

//on Grid link click
 function goToWelcome(id,taskTypeId, countNA)
 {
 	  var zUrl="";
 	   zUrl = "updateStatus.php";
 	   $.redirect(zUrl, {statusId:taskTypeId, id:id, countNA: countNA }, "POST" );
 } 
 
 
//on Grid link click
 function goToTasks(id,status, countNA)
 {
 	  var zUrl="";
 	 /* if (status == 4) // Postponned or incomplete surveys
 	   {
 		  zUrl = "questionnaire.php";
 	   }
 	   else 
 	   {
 		   zUrl = "welcomeSurvey.php";
 	   }*/
 	   zUrl = "welcomeSurvey.php";
 	   $.redirect(zUrl, {statusId:status, id:id, countNA: countNA }, "POST" );
 }


//on Grid link click
 function goToData(id,status, countNA)
 {
 	  var zUrl="";
 	 /* if (status == 4) // Postponned or incomplete surveys
 	   {
 		  zUrl = "questionnaire.php";
 	   }
 	   else 
 	   {
 		   zUrl = "welcomeSurvey.php";
 	   }*/
 	  zUrl = "questionnaire.php";
 	   $.redirect(zUrl, {statusId:status, id:id, countNA: countNA }, "POST" );
 } 
        
    </script>
</head>
<body>
<div>  <!-- class="container" --> 
    
 
<div style="margin-left:50px;margin-right: 50px;">  <!-- class="container" --> 
        <table id="quota-grid" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>HH Id</th>
                <th>Address</th>
                <th>Region</th>
                <th>HH Name</th>
                <th>HH Phone Number</th>
				<th>Status</th>
				<th>HH Status</th>
				<th>username</th>
				<th>comments</th>
				<th>Call Counts</th>
				<th>Total N/A</th>
				<th>Link</th>
            </tr>
            </thead>
        </table>
    </div>
 


</div>

<br/>
<br/>
<br/>
<br/>

<footer class="footer fixed-bottom container" align="center">
        <hr>
        <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>
</body>
</html>
