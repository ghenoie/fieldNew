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
  	
  	<style>
  	.progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #44484b;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}
.progress.blue .progress-bar{
    border-color: #049dff;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1.5s linear forwards 1.8s;
}
.progress.yellow .progress-bar{
    border-color: #fdba04;
}
.progress.yellow .progress-left .progress-bar{
    animation: loading-3 1s linear forwards 1.8s;
}
.progress.pink .progress-bar{
    border-color: #ed687c;
}
.progress.pink .progress-left .progress-bar{
    animation: loading-4 0.4s linear forwards 1.8s;
}
.progress.green .progress-bar{
    border-color: #1abc9c;
}
.progress.green .progress-left .progress-bar{
    animation: loading-5 1.2s linear forwards 1.8s;
}
@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
    }
}
@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}
  	
  	</style>
  	
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
     <div class="page-header">
  	  <h2>Demographic Report</h2>      
     </div>  
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
             	 <th>Target Panel </th>
             	  <th>Accepted Panel </th>
          
            </tr>
            </thead>
        </table>
    </div>
 
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">90%</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
        </div>
    </div>
</div>
 

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
