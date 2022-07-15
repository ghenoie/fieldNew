<?php
namespace Phppot;
error_reporting(E_ALL);
require_once __DIR__ . '/DataSource.php';
 
if(!ob_start('ob_gzhandler'))
	ob_start();
 	 
	
header('Content-Type: text/html; charset=utf-8');
 
 

if (isset($_SESSION['userRole']))
{
 $userRole = $_SESSION['userRole'];
}
 
 
 ?>
<html>
 <?php 
 require "loginheader.php"; 
 include('menu.php');
 ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../assets/css/main.css" rel="stylesheet" media="screen">
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

 <script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script src="./js/bootstrap.min.js"></script>
 <script src='./js/functions.js' type='text/javascript'></script>
 
 <!-- scripts -->
	<script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="assets/js/datatables.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
  	<script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
    <script>
/*

  t - The table
    i - Table information summary
    p - pagination control
    r - processing display element
*/
var userRole = " <?php echo $userRole; ?> "; 
$(document).ready(function () {  

	 getMohafaza();
	 getStatus();
	 getUsers();
	// buildReport();
	
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
.Reportcontainer
{
    max-width:760px;
    margin-left: 500px;
}
</style>
<body>
<div>  <!-- class="container" --> 
 <div class="well well-sm">Demographic Report</div> 
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
                        
                        <!-- div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
							 
                                     <select name="status" id="status-list" class="form-control">
									   <option value="999">All Statuses</option>
									 </select>
							 
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group ">
							 
                                     <select name="userId" id="user-list" class="form-control">
									   <option value="999">All Users</option>
									 </select>
							 
                                </div>
                            </div>
                            
							<div class="col-md-4">
                               <div class="form-group ">
							       <input  id="searchDate" name="searchDate" type="date"  class="form-control"  >	 
                                </div>
                            </div-->
								<div class="col-md-4">
								  <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='filter' id="filterbtn" value='Generate'/>
							
                                 
								 
							 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </section>
 
 
	</form>
	
    </div>

  
	<div class="Reportcontainer">
        <table id="quota-grid" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
 
                 <th>Mohafaza</th>
                 <th>Qadaa</th>
                 <th>Region</th>
                 <th>Total Quota</th>
             	 <th>Open Quota</th>
             	 <th>Total Panel </th>
                 <th>Recruited Panel </th>
              	 <th>Lost Calls</th>
             	 <th>Potential Calls</th>
              	 <th>No Anwer </th>
             	 <th>Not Called </th>
        
            </tr>
            </thead>
        </table>
    </div>
 
 <br/><br/><br/><br/><br/>
 <footer class="footer fixed-bottom container" align="center">
        <hr>
      <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>

<script>
$("#filterbtn").click(function () 
		{  
		  buildReport();

	     });

function buildReport()
{ 
 
	var mohafazaId = $("#mohafaza-list").val(); 
	var qadaaId = $("#qadaa-list").val(); 
	var regionId = $("#region-list").val(); 
	var statusId = $("#status-list").val(); 
	var userId = $("#user-list").val(); 
	var searchDate = $("#searchDate").val();

	 
	 
    var dataTable = $('#quota-grid').DataTable({
    	 "destroy": true, //use for reinitialize datatable
		"searching":true,
		 
		 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "getServices.php", // json datasource
            data: {action: 'getPanelData',mohafazaId : mohafazaId, qadaaId : qadaaId, regionId : regionId, statusId : statusId , userId: userId, searchDate:searchDate},

            type: 'post',  // method  , by default get
        },
        error: function () {  // error handling
            $(".quota-grid-error").html("");
            $("#quota-grid").append('<tbody class="quota-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#quota-grid_processing").css("display", "none");
        } 

    });

	}

</script>

</body>
</html>
