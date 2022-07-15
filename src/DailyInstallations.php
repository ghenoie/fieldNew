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
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css"/>
 
<!-- scripts -->
<script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src='./js/functions.js' type='text/javascript'></script>

<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="assets/js/datatables.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/jszip.min.js"></script>
<script src="assets/fonts/pdfmake.min.js"></script>
<script src="assets/fonts/vfs_fonts.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>

 
<!-- script src="http://cdn.datatables.net/plug-ins/1.10.20/dataRender/percentageBars.js"></script-->  	
 
<script type="text/javascript">


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
		data:'action=getTaskStatusType',
		
		success: function(json){  
	 		  var $el = $("#status-list");
	           $el.empty();  
	           $el.append($("<option></option>")
	                    .attr("value", '999').text('SELECT TASK'));
	            $el.append(json);  
			
			}
		});
	}


function getTaskStatus() {
	  $.ajax({
		type: "POST",
	    dataType: "json",
		url: "getServices.php",
		data:'action=getTaskStatus',
		
		success: function(json){  
	 		  var $el = $("#taskStatus-list");
	           $el.empty();  
	           //$el.append($("<option></option>")
	              //      .attr("value", '999').text('All Statuses'));
 	            $el.append(json);  
			
			}
		});
	}


function getContactStatuses() {
	  $.ajax({
		type: "POST",
	    dataType: "json",
		url: "getServices.php",
		data:'action=getContactStatuses',
		
		success: function(json){  
	 		  var $el = $("#contactStatus-list");
	           $el.empty();  
	           $el.append($("<option></option>")
	                    .attr("value", '-1').text('Not Called Yet'));
	           $el.append($("<option></option>")
	                    .attr("value", '999').text('All Statuses (excluding Not Called Yet)'));
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
		 		  var $el = $("#tech-user-list");
		            $el.empty();  
		            $el.append($("<option></option>")
		                    .attr("value", '999').text('All users'));
		            $el.append(json);  
				
				}
			});
		}
       


var buttonCommon='';
var userRole = "<?php echo $userRole; ?>"; 
$(document).ready(function () {  
	   buttonCommon = {
		        exportOptions: {
		            format: {
		                body: function ( data, row, column, node ) {
		                    return column === 5 ?
		                        data.replace( /[$,]/g, '' ) :
		                        data;
		                }
		            }
		        }
		    };

	 getMohafaza();
	 getStatus();
	 getUsers();
	  //buildReport();
    }
);


 
</script>
    
</head>
<style> 

.lightRed {
  background-color: #f0aaaa !important
}
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

table.dataTable tbody th, table.dataTable tbody td {
    padding: 1px 1px;
    font-size: smaller;
    font-style: normal;
}

table.dataTable thead th, table.dataTable thead td {
    padding: 1px 20px;
    font-size: small;
}
 
 
 table.dataTable tfoot th, table.dataTable tfoot td {
 
    font-size: small;
}


</style>
<body>
<div>  <!-- class="container" --> 
 <div class="well well-sm">Technician Daily Installation Status</div> 
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
<!--                                     <select name="mohafaza" id="mohafaza-list" class="form-control" onChange="getQadaa(this.value);"> -->
<!-- 											<option value="999">Select Mohafaza</option> -->
<!-- 									</select> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
<!--                                      <select name="qadaa" id="qadaa-list" class="form-control" onChange="getRegion(this.value);"> -->
<!--                                      		<option value="999">All Qadaas</option> -->
<!--                                      </select> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
<!--                                  	<select name="region[]"  id="region-list" class="form-control"  multiple="multiple" size=4>  -->
<!-- 										    <option value="999">All Regions</option> -->
<!-- 									</select>  -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        
                            <div class="col-md-4">
                                <div class="form-group ">
							 
                                     <select name="ratio" id="ratio-list" class="form-control">
                                       <option value="-1">Daily Status</option>
<!--                                        Not Paid Yet -->
                                       <!-- option value="0">Not To be Paid </option>
									   <option value="1">Total Paid</option-->
									 </select>
							 
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group ">
							 
                                     <select name="techId" id="tech-user-list" class="form-control">
									   <!-- option value="999">All Users</option-->
									 </select>
							 
                                </div>
                            </div>
                            
							<div class="col-md-4">
                               <div class="form-group ">
									 <select name="amount" id="amount-list" class="form-control">
									 		<!-- option value="999">ALL</option-->
									 		<option value="202104">#16 - April 2021 till December2021</option>
									 		<option value="202103">#15 - March 2021</option>
									 		<option value="202102">#14 - February 2021</option>
									 		<option value="202101">#13 - January 2021</option>
									 		<option value="202012">#12 - December 2020</option>
									 		<option value="202011">#11 - November 2020</option>
									 		<option value="202010">#10 - October 2020</option>
									 		<option value="202009">#9 - September 2020</option>
									 		<option value="202008">#8 - August 2020</option>
									 		<option value="202007">#7 - July 2020</option>
									 		<!--option value="202006">#6 - June 2020</option>
									 	    <option value="202005">#5 - May 2020</option>
                          				    <option value="202004">#4 - April 2020</option> 
                          				    <option value="202003">#3 - March 2020</option-->
									 </select>
                                </div>
                            </div>
                               
                             <div class="col-md-4">
                                <div class="form-group "> <span style="color:black;font-weight: bolder;">Installation Date</span>
							 		<input  id="searchDate" name="searchDate" type="date"  class="form-control"  >	 
                                </div>
                            </div>
                            
								<div class="col-md-4">
								  <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='filter' id="filterbtn" value='Generate'/>
	                           </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
       </div>
     </section>
  </form>
  </div>

    
 <div class="col-sm-12 col-offset-0 ">
	<div>
	
	<!-- button id="btn-show-all-children" type="button">Expand All</button -->

 
	
        <table id="quota-grid" class="table dataTable table-striped table-bordered" style="width:100%">
             <thead>
                <tr>
                    <th colspan="3" class="text-center">Techician Info</th>
                    <th colspan="3"  class="text-center">HouseHold Details</th>
                    <th colspan="3"  class="text-center">Visit Type</th>

  
                </tr>
                <tr>  
                     <th>Technician</th>
                     <th> </th>
                     <th>Impacted tvsets</th>
                      
                 	 <th>Date of visit</th>
                 	 <th>Order Nb</th>
                 	 <th>HH ID</th>
                 	 
                     <th>Technician Order</th>
                     <th>Detected Problem </th>
                     <th>Remarks</th>
                  	 <th></th>
                     <th></th>
                     <th></th>
                  	 <th>Incentive Details</th>
                 	 <th>Number of Vouchers</th>
                	 
                 
                </tr>
      	    </thead>
 
            
            <tfoot style="background-color:#e3e3e3">
				<tr>
    			     
                     <th></th>
                     <th></th>
                     <th></th>
                 	 <th></th>
                 	 <th></th>
                     <th></th>
                     <th></th>
                 	 <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
 					<th></th>
                     <th></th>
                    <th></th>
 				</tr>
			</tfoot>
        </table>
    </div>
 </div>
 <br/><br/><br/><br/><br/>
 <footer class="footer fixed-bottom container" align="center">
        <hr>
        <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>

<script>

pdfMake.fonts = {
        
        Arial: {
            normal:  'ae_AlArabiya.ttf',
            bold: 'ae_AlArabiya.ttf',
            italics: 'ae_AlArabiya.ttf',
            bolditalics:'ae_AlArabiya.ttf'
    }
};

 
$("#filterbtn").click(function () {buildReport();});

function buildReport()
{ 
 
	var mohafazaId = $("#mohafaza-list").val(); 
	var qadaaId = $("#qadaa-list").val(); 
	var regionId = $("#region-list").val(); 
	var statusId = $("#status-list").val(); 
	var paidId = $("#ratio-list").val(); 
	var amountId = $("#amount-list").val(); 
	var techUserId = $("#tech-user-list").val(); 
	var searchDate = $("#searchDate").val();

 	/*

	  t - The table
	    i - Table information summary
	    p - pagination control
	    r - processing display element
	*/
   var dataTable = $('#quota-grid').DataTable({
    	"autoWidth": true,
  		dom: 'Bfrtip',
  
// 	 	"columns": [
// 	 		{
// 	 		      className: 'details-control',
// 	 		      orderable: false,
// 	 		      data: null,
// 	 		      defaultContent: '<img src="http://i.imgur.com/SD7Dz.png">'
//             },

            
//         { "data": "mohafaza" },
//         { "data": "qadaa" },
//         { "data": "region" },
//         { "data": "totalQuota" },

//         { "data": "openQuota" },
//         { "data": "quotaPercent" },
//         { "data": "totalPanel" },
//         { "data": "panelSuccess" },


//         { "data": "panelPercent" },
//         { "data": "lostCalls" },
//         { "data": "potentialCalls" },
//         { "data": "noAnswerCalls" },
         
//         { "data": "notCalledCalls" } ,
//         { "data": "topUser" } 
//   	  ],
         buttons: [ 
        	 
             $.extend( true, {}, buttonCommon, {
            	 footer: true,
                 extend: 'excelHtml5',
                 "text": "Export as Excel",
                 "filename": "Technician_Installation_Status",
                 "className": "btn btn-warning",
                 "charset": "utf-8",
                 "bom": "true",
                 "title":"Technician Installation Status",
                 init: function(api, node, config) {
                     $(node).removeClass("btn-default");
                 }
             } ),
             $.extend( true, {}, buttonCommon, {
            	 footer: true,
                 extend: 'pdfHtml5',
                	 
                     "text": "Export as PDF",
                     "filename": "Installation Status PDF",
                     "className": "btn btn-warning",
                     "charset": "utf-8",
                      "bom": "true",
                     "title":"Technician Installation Status",
                     customize: function (doc) {
                     
                    	 doc.styles.title.fontSize = 9;
                    	 doc.defaultStyle.fontSize = 6;
                    	 doc.styles.tableHeader.fontSize = 7;
                    	 doc.styles.tableFooter.fontSize = 7;
                    	 
                         //doc.content[1].layout = "Borders";
                         doc.defaultStyle = 
                         {
                             font: 'Arial'
                         }

                         var rowCount = doc.content[1].table.body.length;
                         for (i = 1; i < rowCount; i++) {
                        	 doc.content[1].table.body[i][0].alignment = 'center';
                        	 doc.content[1].table.body[i][1].alignment = 'center';
                             doc.content[1].table.body[i][2].text = doc.content[1].table.body[i][2].text.split(' ').reverse().join('  ');
                             doc.content[1].table.body[i][2].alignment = 'center';
                             doc.content[1].table.body[i][3].alignment = 'center';
                             doc.content[1].table.body[i][4].alignment = 'center';
                             doc.content[1].table.body[i][5].alignment = 'center';
                             doc.content[1].table.body[i][6].alignment = 'center';
                             doc.content[1].table.body[i][7].alignment = 'center';
                             doc.content[1].table.body[i][8].alignment = 'center';
//                              doc.content[1].table.body[i][9].alignment = 'right';
//                              doc.content[1].table.body[i][10].alignment = 'right';
//                              doc.content[1].table.body[i][11].alignment = 'right';
 
      
                         }

                    	//Remove the title created by datatTables
 						doc.content.splice(0,1);
 						//Create a date string that we use in the footer. Format is dd-mm-yyyy
 						var now = new Date();
 						var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
 						// Logo converted to base64
 						// var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
 						// The above call should work, but not when called from codepen.io
 						// So we use a online converter and paste the string in.
 						// Done on http://codebeautify.org/image-to-base64-converter
 						// It's a LONG string scroll down to see the rest of the code !!!
 						var logo = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4RCKRXhpZgAATU0AKgAAAAgABAE7AAIAAAAIAAAISodpAAQAAAABAAAIUpydAAEAAAAQAAAQcuocAAcAAAgMAAAAPgAAAAAc6gAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEdoZW5vaWUAAAHqHAAHAAAIDAAACGQAAAAAHOoAAAAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEcAaABlAG4AbwBpAGUAAAD/4QpgaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyI+PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj48cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0idXVpZDpmYWY1YmRkNS1iYTNkLTExZGEtYWQzMS1kMzNkNzUxODJmMWIiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIvPjxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSJ1dWlkOmZhZjViZGQ1LWJhM2QtMTFkYS1hZDMxLWQzM2Q3NTE4MmYxYiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIj48ZGM6Y3JlYXRvcj48cmRmOlNlcSB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPjxyZGY6bGk+R2hlbm9pZTwvcmRmOmxpPjwvcmRmOlNlcT4NCgkJCTwvZGM6Y3JlYXRvcj48L3JkZjpEZXNjcmlwdGlvbj48L3JkZjpSREY+PC94OnhtcG1ldGE+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9J3cnPz7/2wBDAAcFBQYFBAcGBQYIBwcIChELCgkJChUPEAwRGBUaGRgVGBcbHichGx0lHRcYIi4iJSgpKywrGiAvMy8qMicqKyr/2wBDAQcICAoJChQLCxQqHBgcKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKir/wAARCAD0Ak4DASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD6RooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK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iiivnD2QooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAqtdadZ3wxd2sM3u6AkfjVmigDDfwdobnP2Laf9mVx/WpYfCuiQMGSwjYj/noS/6EmteilZDuxsUUcMYSGNY0HRUXAFOoopiCiiigAqG4tLa7TZdQRzL2EiBsfnU1FAGemgaTG+5NOts+8YNX1UKoVQAAMAAdKWigAooooArXGnWV22bq0gmPrJGGP5mq6+H9IVsjTrbPvGDWjRQA2OKOFAkSLGo6KowKQxRscmNSfUqKfRQAwQxg5EagjuFFPoooAKOvWiigChLoelzuXl0+3Zj1PlgZqe2sLSyB+yW0MGevloFzViigAooooAKKKKACobq0tr63a3vbeK4hb70cyB1P1B4qaigDmZvhv4MnfdJ4X0oH/YtUQfkAK0dM8LaBozB9J0XT7Nx/HBbIjfmBmtWindgFFFFIAqA2NoSSbWEk9SYxU9FAEMdpbROHit4kYdGVACKbe6fZ6lAYNRtILuI9Y54g6/kRViigDmG+Gvgp5N58L6Xn0FsoH5DitbTPD+jaLn+x9JsbAsME21skZP12gZrRop3YBRRRSAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAP/9k=';

 						
 						// A documentation reference can be found at
 						// https://github.com/bpampuch/pdfmake#getting-started
 						// Set page margins [left,top,right,bottom] or [horizontal,vertical]
 						// or one number for equal spread
 						// It's important to create enough space at the top for a header !!!
 						doc.pageMargins = [5,60,0,15];
 						
 						// Set the font size fot the entire document
 						doc.defaultStyle.fontSize = 5;
 						// Set the fontsize for the table header
 						doc.styles.tableHeader.fontSize = 5;
 						// Create a header object with 3 columns
 						// Left side: Logo
 						// Middle: brandname
 						// Right side: A document title
 						doc['header']=(function() {
 							return {
 								columns: [
 									{
 										image: logo,
 										width: 90
 									},
 									{
 										alignment: 'left',
 										italics: false,
 										text: '',
 										fontSize: 18,
 										margin: [10,0]
 									},
 									{
 										alignment: 'right',
 										fontSize: 14,
 										italics: true,
 										text: 'Technician Installation Status'
 									}
 								],
 								margin: 20
 							}
 						});
 						// Create a footer object with 2 columns
 						// Left side: report creation date
 						// Right side: current page and total pages
 						doc['footer']=(function(page, pages) {
 							return {
 								columns: [
 									{
 										alignment: 'left',
 										text: ['Created on: ', { text: jsDate.toString() }]
 									},
 									{
 										alignment: 'right',
 										text: ['page ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
 									}
 								],
 								margin: 20
 							}
 						});
 						// Change dataTable layout (Table styling)
 						// To use predefined layouts uncomment the line below and comment the custom lines below
 						// doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
 						var objLayout = {};
 						objLayout['hLineWidth'] = function(i) { return .5; };
 						objLayout['vLineWidth'] = function(i) { return .5; };
 						objLayout['hLineColor'] = function(i) { return '#aaa'; };
 						objLayout['vLineColor'] = function(i) { return '#aaa'; };
 						objLayout['paddingLeft'] = function(i) { return 4; };
 						objLayout['paddingRight'] = function(i) { return 4; };
 						doc.content[0].layout = objLayout;
 				 
                     },
                     orientation: function (){
                    	 var api = this.api();
                    	 var count = api.columns().header().length;
                    	 if(count> 8){
                    	 orientation = 'landscape';
                    	 }else{
                    	 orientation = 'portrait';
                    	 }
                    	 },
//                     	  exportOptions: {
//                               columns: [0, 1, 2, 3, 4, 5, 8, 7, 8],
//                               orthogonal: 'export'
//                           },
                     init: function(api, node, config) {
                         $(node).removeClass("btn-default");
                     }
             } )
         ] 
		,columnDefs: [
    	    {
    	    	 "targets": "_all",
    	      	className: 'dt-center'
    	    }
    	    ,
    	    {
        	    
        	   "targets": 0,
        	   italics: true}
//     	    ,
//     	    {
//     	        "targets": 7,
//     	        render: function(data, type, full, meta) {
        	       
//     	          if (type === 'display' && data == '0') {
//     	            var rowIndex = meta.row+1;
//     	            $('#quota-grid tbody tr:nth-child('+rowIndex+')').addClass('lightRed');
//     	            console.log(rowIndex);
//     	            return data;
//     	          } else {
//     	            return data;
//     	          }
//     	        }
//     	      }
    	  ],

//     	  "columnDefs": [{
//     	      targets: 5,
//     	      render: $.fn.dataTable.render.percentBar('round','#fff', '#FF9CAB', '#FF0033', '#FF9CAB', 2, 'solid')
//     	    }],
        
//     	"footerCallback": function ( row, data, start, end, display ) {
//             var api = this.api(), data;
 
//             // converting to interger to find total
//             var intVal = function ( i ) {
//                 return typeof i === 'string' ?
//                     i.replace(/[\$,]/g, '')*1 :
//                     typeof i === 'number' ?
//                         i : 0;
//             };
 
//             // computing column Total of the complete result 
//              var columnData = api
//                     .column( 4 )
//                     .data();
 
//     	     var installationCost = api
//              .column( 9 )
//              .data()
//              .reduce( function (a, b) {
//                  return intVal(a) + intVal(b);
//              }, 0 );
             
//     	     var additionalCost = api
//              .column( 10 )
//              .data()
//              .reduce( function (a, b) {
//                  return intVal(a) + intVal(b);
//              }, 0 );
    
    	     
//         	   var distance = api
//                  .column( 11 )
//                  .data()
//                  .reduce( function (a, b) {
//                      return intVal(a) + intVal(b);
//                  }, 0 );
        	     
	   

// 	     var numFormat = $.fn.dataTable.render.number( '\,', '.', 0 ).display;
// 	     var percentFormat = $.fn.dataTable.render.number( '\,', '.', 2 , '% ' ).display;
// 	     var currencyFormat = $.fn.dataTable.render.number( '\,', '.', 2 , '$ ' ).display;
// 		// Update footer by showing the total with the reference of the column index .
// 		 $( api.column( 4 ).footer() ).html(
//                 columnData.count()
//             );
		    
// 	      $( api.column( 8 ).footer() ).html('Total:'+currencyFormat(installationCost+additionalCost+parseInt(distance)*0.3));
// 	   	 // $( api.column( 5 ).footer() ).html(percentFormat(((parseInt(openQuota)/parseInt(totalQuota)*100).toFixed(2))));
//            $( api.column(9).footer() ).html(currencyFormat(installationCost));
//            $( api.column(10).footer() ).html(currencyFormat(additionalCost));
//            $( api.column(11).footer() ).html(  currencyFormat(parseInt(distance)*0.3) +' - <br/>' + distance + ' KMs' );
     
            
//         },
    	"destroy": true, //use for reinitialize datatable
		"searching":false,
		"pageLength": 100,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "getServices.php", 
            data: {action: 'getTechInvoices',paidId : paidId, techUserId: techUserId, searchDate:searchDate, amountId: amountId},
            type: 'post',  
        },
        error: function () {  // error handling
            $(".quota-grid-error").html("");
            $("#quota-grid").append('<tbody class="quota-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#quota-grid_processing").css("display", "none");
        } 

    });



   dataTable.column(1).visible(false);
   dataTable.column(9).visible(false);
   dataTable.column(10).visible(false);
   dataTable.column(11).visible(false);
 

   }

</script>
</body>
</html>
