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
   <script type="text/javascript" src="./js/loader.js"></script>
    <script type='text/javascript'  src='./js/functions.js' ></script>
    
 
  <script src="js/zchartjs/fusioncharts.js"></script>
  <script src="js/zchartjs/fusioncharts.charts.js"></script>
  <script src="js/zchartjs/themes/fusioncharts.theme.zune.js"></script>
  
<!-- new -->
      
      
    <script type="text/javascript">
var userRole = <?php echo  $_SESSION['userRole'] ?>;
var userName = '<?php echo  $_SESSION['username'] ?>';
	

$(document).ready(function () {  

	 getMohafaza();
	 getStatus();
	 getTaskStatus();
	 getContactStatuses();
	 getUsers();
	 buildGrid();


	  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#quota-grid tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });

 
	 
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
		
	 //get Religions
	 $.ajax({
			type: "POST",
			  dataType: "json",
			url: "getServices.php",
			data:'action=getReligion',
			
			success: function(json){  
		 		 var $el2 = $("#religionX");
		         $el2.val('['+json+']'); 
		      }
			});


	//get Rooms
	 $.ajax({
			type: "POST",
			  dataType: "json",
			url: "getServices.php",
			data:'action=getRooms',
			
			success: function(json){  
		 		 var $el2 = $("#roomX");
		         $el2.val('['+json+']'); 
		      }
			});

		
  //get Brands
	 $.ajax({
			type: "POST",
			  dataType: "json",
			url: "getServices.php",
			data:'action=getBrands',
			
			success: function(json){  
		 		 var $el2 = $("#brandX");
		         $el2.val('['+json+']'); 
		      }
			});
		
	//get SCreen
	 $.ajax({
			type: "POST",
			  dataType: "json",
			url: "getServices.php",
			data:'action=getScreen',
			
			success: function(json){  
		 		 var $el2 = $("#screenX");
		         $el2.val('['+json+']'); 
		      }
			});



		//get receiver
	 $.ajax({
			type: "POST",
			  dataType: "json",
			url: "getServices.php",
			data:'action=getReceiver',
			
			success: function(json){  
		 		 var $el2 = $("#receiverX");
		         $el2.val('['+json+']'); 
		      }
			});



		//get satellite
	 $.ajax({
			type: "POST",
			  dataType: "json",
			url: "getServices.php",
			data:'action=getSatellite',
			
			success: function(json){  
		 		 var $el2 = $("#satelliteX");
		         $el2.val('['+json+']'); 
	 
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
	                    .attr("value", '999').text('All Statuses (excluding Not Called Yet/ No Answer 5+)'));
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
 
.modal-body
{
font-size:1rem;
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
.mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    float:right;padding-left:10px;
}


  /*NEWWWWWWWW*/
 
/* body,html{ */
/* 			height: 100%; */
/* 			margin: 0; */
/* 			background: #7F7FD5; */
/* 	       background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); */
	       
/* 		} */
		.chat{
			margin-top: auto;
			margin-bottom: auto;
		}
		.card{
			height: 400px;
			width: 1100px;
			border-radius: 15px !important;
				background: #7f7fd51f;
	     
		}
		
			.zcard{
			height: 60px;
			 
			border-radius: 15px !important;
				background: #7f7fd51f;
	     
		}
		
		.cardSearch{
			height: 300px;
			width: 1190px;
			border-radius: 15px !important;
            background-color: rgba(0,0,0,0.4) !important;
			 background: linear-gradient(to right, #91EAE4, #86A8E7, #7fd59533);

			 
		}
		.contacts_body{
			padding:  0.75rem 0 !important;
			overflow-y: auto;
			white-space: nowrap;
		}
		.msg_card_body{
			overflow-y: auto;
		}
		.card-header{
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
		}
	 .card-footer{
		border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
	}
		 
		.search{
			border-radius: 15px 0 0 15px !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
		}
		.search:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.type_msg{
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
			height: 60px !important;
			overflow-y: auto;
		}
			.type_msg:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.attach_btn{
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.send_btn{
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.search_btn{
			border-radius: 0 15px 15px 0 !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.contacts{
			list-style: none;
			padding: 0;
		}
		.contacts li{
			width: 100% !important;
			padding: 5px 10px;
			margin-bottom: 15px !important;
		}
	.active{
			background-color: rgba(0,0,0,0.3);
	}
		.user_img{
			height: 70px;
			width: 70px;
			border:1.5px solid #f5f6fa;
		
		}
		.user_img_msg{
			height: 45px;
			width: 45px;
			border:1.5px solid #f5f6fa;
		
		}
	.img_cont{
			position: relative;
			height: 70px;
			width: 70px;
	}
	.img_cont_msg{
			height: 40px;
			width: 40px;
	}
	.online_icon{
		position: absolute;
		height: 15px;
		width:15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border:1.5px solid white;
	}
	
	
	 .offline_icon{
		position: absolute;
		height: 15px;
		width:15px;
		background-color: #d13749;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border:1.5px solid white;
	}
	
	
	.offline{
		background-color: #c23616 !important;
	}
/* 	.user_info{ */
/* 		margin-top: auto; */
/* 		margin-bottom: auto; */
/* 		margin-left: 15px; */
/* 	} */
/* 	.user_info span{ */
/* 		font-size: 20px; */
/* 		color: red; */
/* 	} */
/* 	.user_info p{ */
/* 	font-size: 10px; */
/* 	color: rgba(255,255,255,0.6); */
/* 	} */
	.video_cam{
		margin-left: 50px;
		margin-top: 5px;
	}
	.video_cam span{
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}
	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd78;
		padding: 10px;
		position: relative;
	}
	
	
	
	
   .msg_cotainer_in{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #dc35453d;
		padding: 10px;
		position: relative;
	}
	
	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78a7e0c4;
		padding: 10px;
		position: relative;
	}
	.msg_time{
/* 		position: absolute; */
		left: 0;
		bottom: -15px;
		color: black;
		font-size: 11px;
		font-weight:bold;
	}
	.msg_time_send{
/* 		position: absolute; */
		right:0;
		bottom: -15px;
		color: black;
		font-size: 11px;
		font-weight:bold;
	}
	.msg_head{
		position: relative;
	}
	#action_menu_btn{
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}
	.action_menu{
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0,0,0,0.5);
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}
	.action_menu ul{
		list-style: none;
		padding: 0;
	margin: 0;
	}
	.action_menu ul li{
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}
	.action_menu ul li i{
		padding-right: 10px;
	
	}
	.action_menu ul li:hover{
		cursor: pointer;
		background-color: rgba(0,0,0,0.2);
	}
	@media(max-width: 576px){
	.contacts_card{
		margin-bottom: 15px !important;
	}
	}



/*|New for chart*/
.button {
  left: 50%;
  margin: 0;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.chart {
  align-content: center;
  display: flex;
  justify-content: center;
}

.modal {
  text-align: center;
}

@media screen and (min-width: 768px) {
  .modal:before {
    content: " ";
    display: inline-block;
    height: 100%;
    vertical-align: middle;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: center;
  vertical-align: middle;
}

.modal-footer {
  color: #00b5e6;
  font-size: 25px;
  text-align: center;
}
  
</style>
<body>   
 	<?php      if (!empty($_SESSION['userRole'])  && ($_SESSION['userRole']) == 1) { ?>
 
		<div class="well well-sm">TASKS Grid</div>  
 
     <?php }?>
 
 <form method="POST" name="search" action="">
 <input  id="religionX" name="religionX" type="hidden"  class="form-control"  />	 
<input  id="roomX" name="roomX" type="hidden"  class="form-control"  />	 
<input  id="brandX" name="brandX" type="hidden"  class="form-control"  />
<input  id="screenX" name="screenX" type="hidden"  class="form-control"  />
<input  id="receiverX" name="receiverX" type="hidden"  class="form-control"  />
<input  id="satelliteX" name="satelliteX" type="hidden"  class="form-control"  />
 <section class="search-banner text-white py-3 form-arka-plan" id="search-banner">
    <div class="container py-1 my-1">
        <div class="row">
            <div class="col-md-12">
                <div class="cardSearch acik-renk-form">
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
                            <div class="col-md-3">
                                <div class="form-group "> <span style="color:red;font-weight: bolder;">TASK TYPE *</span>
								 
                                     <select name="status" id="status-list" class="form-control">
                                       	<option value="0">SELECT TASK</option>
									  </select>
								 
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group "><span style="color:black;font-weight: bolder;">TASK STATUS</span>
							 		<select name="taskStatus" id="taskStatus-list" class="form-control">
                                       	<option value="1">Open</option>
									  </select>
                                </div>
                            </div>
                            
                                <div class="col-md-3">
                                <div class="form-group "> <span style="color:black;font-weight: bolder;">APPOINTMENT VISIT DATE</span>
							 		<input  id="searchDate" name="searchDate" type="date"  class="form-control"  >	 
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group "><span style="color:black;font-weight: bolder;">HH ID</span>
							 		<input  id="hhID" name="hhID" type="number"  class="form-control"  >	 
                                </div>
                            </div>
                            
                
                            
                           
                            
                            
                             <div class="col-md-4">
                                <div class="form-group "> <span style="color:black;font-weight: bolder;">OUTGOING CONTACT STATUS</span>
							 		<select name="contactStatus" id="contactStatus-list" class="form-control">
                                       	<option value="-1">Not Called Yet</option>
									  </select>
                                </div>
                            </div>
                           
                           
 
 						 <div class="col-md-4">
                                <div class="form-group "> <span style="color:black;font-weight: bolder;">GRID SEARCH</span>
							 		  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                </div>
                            </div>

                          <div class=" col-md-3">
								  <input type='button' class='btn   btn-primary btn-lg' style='padding-top:  1rem; padding-right: 6rem;padding-left: 7rem; margin-left:1rem' name='filter' id="filterbtn" value='Search'/>
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
		var taskStatusId =$("#taskStatus-list").val();
		var contactStatusId=$("#contactStatus-list").val();
 		var searchDate=$("#searchDate").val();
 		var hhID=$("#hhID").val();
 		var orderID=$("#orderID").val();
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
			dom = 'tr';
		/*}
		else
		{
			dom = 'tr';
		}*/
        var dataTable = $('#quota-grid').DataTable({

//         	 responsive: {
//                  details: {
//                      display: $.fn.dataTable.Responsive.display.modal( {
//                          header: function ( row ) {
//                              var data = row.data();
//                              return 'Details for '+data[0]+' '+data[1];
//                          }
//                      } ),
//                      renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
//                          tableClass: 'table'
//                      } )
//                  }
//              },
        	"rowCallback": function( row, data, index ) {
        		 if (data[4]  != null &&  data[4].toUpperCase().includes("194988")  ) 
                 { 
                     $('td', row).css('background-color', '#6610f24d');
                 }

        		   if (data[9]  != null &&  data[9].toUpperCase().includes("5+ TIMES")  ) 
                   { 
                       $('td', row).css('background-color', '#0008ff66');
                   }
            	 
                if (( data[10] != null &&  data[10].toUpperCase().includes("CORONA") )|| ( data[3] != null &&   data[3].toUpperCase().includes("CORONA"))) 
                { 
                    $('td', row).css('background-color', '#fe6b6b');
                }
                else if (( data[10] != null &&  data[10].toUpperCase().includes("ACCEPT FOR LATER") ) ||  ( data[3] != null && data[3].length > 10 && data[3].toUpperCase().includes("ACCEPT FOR LATER"))) 
                     { 
                         $('td', row).css('background-color', '#ef82c8');
                     }
               if (data[0] == 5 && ( data[10] != null &&  data[10].toUpperCase().includes("GIFT") ) ) 
                { 
                    $('td', row).css('background-color', '#6bfece');
                }

               if (( data[10] != null &&  data[10].toUpperCase().includes("DETECTIVE") )) 
               { 
                   $('td', row).css('background-color', 'yellow');
               }

            
               
               
             },
             "footerCallback": function ( row, data, start, end, display ) {
                 var api = this.api(), data;
      
                 // converting to interger to find total
                 var intVal = function ( i ) {
                     return typeof i === 'string' ?
                         i.replace(/[\$,]/g, '')*1 :
                         typeof i === 'number' ?
                             i : 0;
                 };
      
                 // computing column Total of the complete result 
                  var columnData = api
                         .column( 4 )
                         .data();
       
             var numFormat = $.fn.dataTable.render.number( '\,', '.', 0 ).display;
             $( api.column( 3).footer() ).html( ' Number of HH:');
     		// Update footer by showing the total with the reference of the column index .
     		 $( api.column( 4 ).footer() ).html(
                     columnData.count()
                 );
     	 
          
                 
             },

            
       	 "destroy": true, //use for reinitialize datatable
			"searching":false,
			 "dom": dom,
			"stateSave": true,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
         
            "ajax": {
                url: "getServices.php", // json datasource
                data: {action: 'getTasks',mohafazaId : mohafazaId, qadaaId : qadaaId, regionId : regionId, statusId : statusId,taskStatusId : taskStatusId,contactStatusId: contactStatusId, userId: userId, telephone:telephone, searchDate:searchDate, hhID: hhID, orderID: orderID},
                type: 'post',  // method  , by default get
            },
            error: function () {  // error handling
                $(".quota-grid-error").html("");
                $("#quota-grid").append('<tbody class="quota-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#quota-grid_processing").css("display", "none");
            },
		       "columnDefs": [ 


		    	   {
					   "targets": 5,
					   "render": function ( data, type, full, meta ) {
						   var zlink ="";
						     if (full[14]  != null ) 
		    				  { 
		    					zlink = full[5]+ '<div class="spinner-grow text-danger"></div>';
		    				  }
						     else
						     {
						    	 zlink = full[5]
							 }
						     return zlink;
					   }
		    					   
					}

					,

			       {
			   "targets": 13,
			   "render": function ( data, type, full, meta ) {
				   zlink="";
				   var taskStatusId =$("#taskStatus-list").val(); 
				   var contactStatusId=$("#contactStatus-list").val();
				  console.log(contactStatusId);

				   if (full[0] == 7 || full[0] == 8 || full[0] == 10 || full[0] == 11 || full[0] == 12  || full[0] == 5 || full[0] == 4  || full[0] ==  13 || full[0] ==  15  || full[0] ==  16  || full[0] ==  17  || full[0] ==  19 || full[0] ==  20   || full[0] ==  21  || full[0] ==  22  || full[0] ==  23  || full[0] ==  24  || full[0] == 14|| full[0] == 18)  // Welcome call or Rotation Priority or Maintenance or Dismantling or Incentive Call
				   {
					   if (full[14]  != null && !( full[0] == 8 || full[0] ==  10  || full[0] ==  13  || full[0] ==  18)) 
					   { 
						   zlink +=  '<button  disabled class="btn btn-warning col-md-12" id="Filter" onclick=""><span class="fa fa-phone"></span> Contact OUT</button> <div class="clearfix"  ></div> <br>';
					   }
					   else
					   {
						   zlink +=  '<button   class="btn btn-warning col-md-12" id="Filter" onclick="goToWelcome('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-phone"></span> Contact OUT</button> <div class="clearfix"  ></div> <br>';

    				   }
					   if ( full[0] == 10 || full[0] == 11 || full[0] == 12 || full[0] == 4 || full[0] == 15 || full[0] == 17  || full[0] == 20  || full[0] ==  22  || full[0] ==  24)
					   { 
						   var today = new Date();
//     					   if (Date.parse(full[12]) <= Date.parse(today)+100000000)
//     					   { //console.log("yes");
	       					   	zlink +=  '<button   class="btn btn-success col-md-12" id="Filter" onclick=" reviewOrder('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-phone"></span> Set Order Status</button> <div class="clearfix"  ></div> <br>';
	       					   	
//     					   }

    					   zlink +=  '<button   class="btn btn-warning col-md-12" id="Filter" onclick="generateExcel('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-phone"></span> Generate Excel</button> <div class="clearfix"  ></div> <br>';

    					   
					   }
					   





				 }
				 
				   if (contactStatusId == -1  && full[0] == 12 )
				   { 
					
				   }
				   else
				   {
 					  zlink += ' <div><button type="button" class="btn btn-info col-md-12" data-toggle="modal" onclick="viewContactsHistory('+full[0]+',' + full[4]+ ',' + full[16]+ ',\''+ full[5]+'\')" data-target=".bs-example-modal-lg"><span class="fa fa-comments"></span>Contact Chat</button></div><div class="clearfix"  ></div> <br>';
				    }
				    
				    

				    zlink +="<table><tr>";
				    zlink += '<td><div><button type="button" class="btn btn-success  col-md-12" data-toggle="modal" onclick="viewDetails('+full[0]+',' + full[4]+ ',' + full[4]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-users"></span> Members</button> </div></td>';
					zlink += '<td><button type="button" class="btn btn-primary   col-md-12" onclick="viewTVDetails('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-television"></span> Televisions</button></div> </td>';
					 
					zlink+="</tr>";


     			     zlink +="<tr>";
					    zlink += '<td><div><button type="button" class="btn btn-info  col-md-12" data-toggle="modal" onclick="viewTechOrders('+full[4]+',' + full[0]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-support"></span> Tech Orders</button> </div></td>';
						zlink += '<td><button type="button" class="btn btn-info col-md-12" onclick="viewTechVisits('+full[4]+',' + full[0]+ ')"><span class="fa fa-cab"></span> Tech Visits</button></div> </td>';
					zlink+="</tr>";
					
					
    			         if (full[9]  != null &&  full[9].toUpperCase().includes("5+ TIMES")  ) 
    		               { 
    			        	//  zlink  =  '<button  class="btn btn-danger pl-4 pr-4" id="close" onclick="closeTaskFn('+full[4]+',' + full[0]+ ')">Close Task</button>';
    		               }
    		               

	      				 zlink+="<tr>";
						 zlink +=  '<td style="width:50%"><div><button  class="btn btn-danger col-md-12" id="close" onclick="viewTasks('+full[4]+',' + full[0]+ ')"><span class="fa fa-tasks"></span> Tasks</button></div> </td>';
	      				 zlink +=  '<td style="width:50%"><div><button type="button" class="btn btn-success col-md-12" data-toggle="modal" onclick="viewGifts(' + full[4]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-gift"></span> Gifts</button></div> </td>';
	      				 zlink+="</tr>";

	      				 zlink+="<tr>";
	      				 	 zlink +=  '<td style="width:50%"><div><button  class="btn btn-warning col-md-12" id="close" onclick="viewAddress('+full[4]+',' + full[0]+ ')"><span class="fa fa-home"></span> HH Address</button></div> </td>';
	      				 zlink+="</tr>"

	      					 zlink+="<tr>";
		      				zlink += '<td><button type="button" class="btn btn-primary   col-md-12" onclick="viewTVDetails2('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-television"></span> Televisions DATA</button></div> </td>';	
							 zlink +=  '<td style="width:50%"><div><button  class="btn btn-warning col-md-12" id="close" onclick="viewTVDetailsReceiver('+full[4]+',' + full[0]+ ')"><span class="fa fa-home"></span> TV Receiver</button></div> </td>';
		      				 zlink+="</tr>"
			      				 

						 if (userRole == 1   )
		    			  {
							 zlink+="<tr>";
							 zlink +=  '<td style="width:50%"><div><button  class="btn btn-danger col-md-12" id="close" onclick="closeTaskFn('+full[4]+',' + full[0]+ ')"><span class="fa fa-times-circle"></span>  Close Task</button></div> </td>';
		      				 zlink +=  '<td style="width:50%"><div><button type="button" class="btn btn-success col-md-12" data-toggle="modal" onclick="getTVMeters('+full[0]+',' + full[4]+ ',' + full[4]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-television"></span> TV Meters</button></div> </td>';
		      				 
			      				
			      				 zlink+="</tr>";




							
		      				 zlink+="<tr>";
							 zlink +=  '<td style="width:50%"><div><button  class="btn btn-danger col-md-12" id="close" onclick="closeTechOrderFn('+full[4]+',' + full[0]+ ')"><span class="fa fa-times-circle"></span>  Close Technician Order</button></div> </td>';
							
		      				 zlink+="</tr>"

			      				 
		      				 
		      				 zlink+="<tr>";
		      				// Move HH to production
// 							 if (  ( full[16] == 4 || full[16] == 5 )  )
// 							 {
		      				     zlink += '<td><div><button type="button" class="btn btn-danger col-md-12" data-toggle="modal" onclick="moveHHtoProduction('+full[4]+',' + full[0]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-play"></span> Set HH Production</button></div></td>';
//  		     				 }	

							// Set HH inactive
							 if (  full[16] == 6   )
							 {
		      				     zlink += '<td><div><button type="button" class="btn btn-warning col-md-12" data-toggle="modal" onclick="moveHHtoInactive('+full[4]+',' + full[0]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-close"></span> Set HH Inactive </button></div></td>';
							 }

							 // Incentive Calls (R1 , R2, R3 , R4, R5, R6...)								 
		      				 if (full[0] == 5 || full[0] == 14 || full[0] == 16 || full[0] == 19 || full[0] == 21 || full[0] == 23 || full[0] == 25)
		      				 {
		      					  zlink +=  '<td><div><button  class="btn btn-danger col-md-12" id="createIncentiveDelivery" onclick="createIncentiveDeliveryFn('+full[4]+',' + full[0]+ ')"><span class="fa fa-gift"></span> Create i-Delivery</button> </div></td>';
		        							
			      		     }
		      				 zlink+="</tr>";

 						}

						zlink +="</table>";
							   
				   return zlink;
				}
			}


				]

        });



/*ghenoie*/
   
 
}


 function testing(tvMeterId)
 {


	 $(".modal-body div span").text("");
     $(".username span").text("TEST");
     
		var myDate = new Date();
		var myEpoch = myDate.getTime()/1000;
		var exists=null;
		myEpoch = Math.round(myEpoch);
		console.log(myEpoch);
		myEpochStart= 1604275200 ; // (myEpoch-100000);
		console.log(myEpochStart);

				// setTimeout(function(){ alert("Hello"); }, 3000);
			 $.ajax({
					type: "POST",
					  dataType: "json",
					  async: true,
					  url:"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch ,
	     			  success: function(data){
					  console.log ("get tv meter " +"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch );
			    
// 			          $.each(data, function (index, value ) {  
// 			      		if(value.source  != 'NO_DATA' /*&& value.source != 'SILENCE'*/)
// 			      		{
// 			      			exists = 'valid';
// 			      			//console.log ("VALID............"+ tvMeterId + ":" +value.source  );
// 			      			alert (tvMeterId + "is working normally");
// 			      			return false; // 
// 			      		}
// 			      		else
// 			      		{
// 			      			 console.log (tvMeterId + ":" +value.source  );
// 				      	}
// 			      	   });  
			          	
						 
						 
					 //  $("#graphDiv div").html("<h4> test</h4>");
						}
					});

	

// 	  		if (exists != 'valid')
// 	  		{

// 	  			alert (tvMeterId + "is NOT working!!!!");
// 		  	}

		  	 $("#myModalGraph").modal("show");

		  	 }



	  
 


//ghenoieee
 function checkTVMeter(tvMeterId) {
 
	 $('#response').empty();
     $("#response").removeClass("alert-success");
     $("#response").removeClass("alert-danger");
     
// // 	 google.charts.load('current', {'packages':['line']});
// //     google.charts.setOnLoadCallback(drawChartWeighted); // (testing(tvMeterId));
// 	 drawChart();

	 var dateObj = new Date(); 
	 dateObj.setDate(dateObj.getDate()-1);  
	 
	 dateObj.setHours(0);
	 dateObj.setMinutes(0);
	 dateObj.setSeconds(0);
	 var myEpochStart = dateObj.getTime()/1000;
	 myEpochStart = Math.round(myEpochStart);
     var exists;
    // alert ("hi");
	// myEpoch= (myEpochStart+43200);
	 myEpoch= (myEpochStart+1000000);
 
				// setTimeout(function(){ alert("Hello"); }, 3000);
			 $.ajax({
					type: "POST",
					  dataType: "json",
					  async: true,
					  url:"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch ,
					   beforeSend: function(){
						    // Show image container
						      $('#response').empty();
						      $("#response").removeClass("alert-success");
						      $("#response").removeClass("alert-danger");
						    $("#loader").show();
						   },
	     			  success: function(data){
					  console.log ("get tv meter " +"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch );
			    
			          $.each(data, function (index, value ) {  
			      		if(value.source  != 'NO_DATA' /* && value.source != 'SILENCE'*/ )
			      		{
			      			exists = 'valid';
			      			//console.log ("VALID............"+ tvMeterId + ":" +value.source  );

			      	
						    
			      			return false; // 
			      		}
			      		else
			      		{
			      			// console.log (tvMeterId + ":" +value.source  );
				      	}
			      	   });  
			          	
						 
						 
					 //  $("#graphDiv div").html("<h4> test</h4>");
						}
						   ,
						   complete:function(data){
						    // Hide image container
						    $("#loader").hide();
						    if (exists != 'valid')
 				  		{
						    $('#response').empty();
						    $("#response").addClass("alert-danger");
						    $('#response').append(tvMeterId +  " is not working, ask to unplug then plug");
						    }

						    else

						    {	  
							    $('#response').empty();
				      		$("#response").addClass("alert-success");
						    $('#response').append(tvMeterId +  " is OK");
						    }

						    
// 						    if (exists != 'valid')
// 					  		{

// 					  			alert (tvMeterId + " seems NOT working, please wait for 30 seconds...");
// 						  	}
						    
						   }
					}


				);

	

	  		

    

		}



//ghenoie 
 function checkTVMeterPerformance(tvMeterId) {

     $(".modal-body div span").text("");
     $(".username span").text("TEST");

     $('.response').empty();
     $(".response").removeClass("alert-success");
     $(".response").removeClass("alert-danger");
 
     $.ajax({

         url: 'http://192.168.126.98:88/chart_data.php',
         data: encodeURI('tvMeterId='+tvMeterId),
         type: 'POST',
         success: function(data) {
             chartData = data;
             var chartProperties = {
                 "caption": "Last 14 days performance for: " + tvMeterId ,
                 "xAxisName": "TV Meter",
                 "yAxisName": "ON/OFF",
                 "rotatevalues": "1",
                 "theme": "zune"
             };

             apiChart = new FusionCharts({
                 type: 'column2d',
                 renderAt: 'chart-container',
                 width: '550',
                 height: '300',
                 dataFormat: 'json',
                 dataSource: {
                     "chart": chartProperties,
                     "data": chartData
                 }
             });
             apiChart.render();
         }
     });
     
	 
	 $("#myModalChart").modal("show");
	
    

		}

 // real one
 function getTVMeters(taskTypeId,HHId, HHId) {
	 var dateObj = new Date(); 
	 dateObj.setDate(dateObj.getDate() - 1);  
	 dateObj.setHours(0);
	 dateObj.setMinutes(0);
	 dateObj.setSeconds(0);
	 var myEpochStart = dateObj.getTime()/1000;
	 myEpochStart =   Math.round(myEpochStart); // 1605391201;
 
	// myEpoch= (myEpochStart+43200);
       myEpoch=(myEpochStart+43200); // 1605484800; // 
	 
	// alert(dateObj);  

		
		var myDate = new Date();
		var myEpoch = myDate.getTime()/1000;
		myEpoch = Math.round(myEpoch);
		console.log(myEpoch);
		myEpochStart= (myEpoch-100000);
       //myEpochStart = 1624989180 ; // 8:53
	   //myEpochStart = 1625075280;// 8:54
	   //myEpoch = 1625075700 ;

 
 
		console.log(myEpochStart);
	 var dataa = [];
	 	$.ajax({
		type: "POST",
		  dataType: "json",
		url: "getServices.php",
		
		data:'action=getTVMeters&hhId='+HHId,
		async: true,
		
		success: function(json){  
			dataa = json;
			var exists = 'noData';
			var count =0 ;
			for(i =0 ; i <dataa.length; i++)
			{
				//console.log(dataa[i]);
				var xx = dataa[i];
				
				
			 $.ajax({
					type: "POST",
					  dataType: "json",
					  async: false,
					 url:"http://192.168.108.22:7070/reports/DeviceMatchHistory?device="+xx +"&from="+myEpochStart+"&to="+ myEpoch ,
					 //url:"http://192.168.108.22:7070/reports/DeviceMatchHistory?device="+xx +"&from=1606176000&to=1606262400",
	     			  success: function(data){
					   console.log ("get tv meter " +"http://192.168.108.22:7070/reports/DeviceMatchHistory?device="+xx +"&from="+myEpochStart+"&to="+ myEpoch);
			    	
			          $.each(data, function (index, value ) {  
			      		if(  value.source != 'NO_DATA'  && value.source != 'SILENCE' && value.source != 'NO_MATCH')
			      		{
			      			exists = 'valid';
			      			console.log (xx + ";" +value.source );
			      			 
			      			return false; // 
			      		}
			      		else
			      		{
			      			// console.log (xx + ";" +value.source );
				      	}
			      	   });  
			          setTimeout(function(){ console.log(" "); }, 5000);	
						
						}
					});

			 setTimeout(function(){   console.log(" "); }, 5000);
			}
		}
		});

	  

		}
 
 function viewContactsHistory(taskTypeId,HHId, hhStatus, hhName)
 {
	 
     $(".modal-body div span").text("");
     $(".username span").text("TEST");
//      $(".position span").text(table.row(this).data()[1]);
//      $(".office span").text(table.row(this).data()[2]);
//      $(".age span").text(table.row(this).data()[3]);
//      $(".date span").text(table.row(this).data()[4]);

     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+HHId+'&action=getContactsHistory'),
         dataType: 'JSON' ,
         success: function (response) { // alert (JSON.stringify(html));
            // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
             $(".username span").text(response);
            
             //  window.location.href = 'taskGrid.php';
             var len = response.length;
             var tr_str="";
             var control="";
             var inoutStr = "";
             var msg_cotainer="msg_cotainer";

			 var hhStatusIcon="online_icon";
			 if (hhStatus !=  6)
			 {
				 hhStatusIcon="offline_icon";
		     } 
             
             control = '<div class="col-md-12 col-xl-12 chat">'


            		+ '<div class="card">'
            		
            	    	+ '<div class="card-header msg_head">'
            	        	 + '<div class="d-flex bd-highlight">'
            	                	+ '	<div class="img_cont">'
            	                	+ '		<img src="http://placehold.it/50/55C1E7/fff&text=HH" alt="User Avatar" class="rounded-circle user_img">'
            	                	+ '	<span class='+hhStatusIcon+'></span>'
            	                	+ '</div>'
            	                	+ '<h4>Chat History of ' +hhName+ '</h4>'
            	                	
            	                	 
            	       
            	            	+ '</div>'
            	    	+ '</div>'
            		
            	    	+ '<div class="card-body msg_card_body" style="	overflow-y: auto;">'; 

            	    	
             for(var i=0; i<len; i++){
                // var id = response[i].id;
                 var contactTaskName = response[i].contactTaskName;
                 var username = response[i].username;
                 var contactStatus = response[i].contactStatus;
                 var inout = response[i].inout;
                 var comments = response[i].comments;
   				 var householdname = response[i].householdname;
   				 var zDate = response[i].zDate;
				 var firstLetter= householdname.charAt(0);

	             if (inout == 1)
	             {
	            	 inoutStr = "OUT";
	            	 msg_cotainer="msg_cotainer";
	            	 
	             }
	             else if (inout == 2)
		         {
	            	 inoutStr = "IN";
	            	 msg_cotainer="msg_cotainer_in";
		         }
		         else if (inout == 3)
		         {
		        	 inoutStr =  '<i class="fa fa-whatsapp"></i>' ;
		        	 msg_cotainer="msg_cotainer_send";
		         }


		         if (inout == 1 || inout == 2)
		         {

		        	  control += '<div class="d-flex justify-content-start mb-4">'
		                	+ '<div class="img_cont_msg">'
		                	+ '	<img src="http://placehold.it/50/55C1E7/fff&text='+inoutStr+'" alt="User Avatar" c class="rounded-circle user_img_msg">'
		                	+ '	</div>'
		                	
		                	+ '	<div class='+msg_cotainer+'>'
		                	+comments + '... '
		                	+ '		<span class="msg_time"><BR/>'+ contactTaskName + "("+contactStatus+") by Operator " +username  +" on " + zDate+'</span>'
		                	+ '	</div>'
		                	
		            	+ '</div>'
				 }
		         else if (inout == 3) // STATLEB whatsapp 
		         {
    		       control +=  '<div class="d-flex justify-content-end mb-4">'
    	                 	+ '	<div class='+msg_cotainer+'><i  class="fa fa-whatsapp"></i>  '
    	                 	+comments
    	                 	+ '		<span class="msg_time_send"><BR/>'+ contactTaskName + "("+contactStatus+") by Operator " +username  +" on " + zDate+'</span>'
    	                 	+ '	</div>'
    	                	
    	                 	+ '	<div class="img_cont_msg">'
    	                 		+ '<img src="images/logo.png" class="rounded-circle user_img_msg"><i  class="fa fa-whatsapp"></i> '
    	                 	+ ' </div>'
     	                 + '</div>';

			     }
		 
             }

          control   += '</div>';
             + '</div>';

              $("#chatDiv div").html(control);
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
     
	 
	 $("#myModal1").modal("show");
	

	 }


 function viewTasks(HHId , taskTypeId)
 {  
     $(".modal-body div span").text("");
     $(".username span").text("TEST");
//      $(".position span").text(table.row(this).data()[1]);
//      $(".office span").text(table.row(this).data()[2]);
//      $(".age span").text(table.row(this).data()[3]);
//      $(".date span").text(table.row(this).data()[4]);

     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+HHId+'&action=getHHTasks'),
         dataType: 'JSON' ,
         success: function (response) { // alert (JSON.stringify(html));
            // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
             $(".username span").text(response);
            
             //  window.location.href = 'taskGrid.php';
             var len = response.length;
             var tr_str="";
             
             for(var i=0; i<len; i++){
                // var id = response[i].id;
                 var name = response[i].name;
                 var comments = response[i].comments;
                 var opened = response[i].opened;
                 var closed = response[i].closed;
              
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                     "<td align='center'>" + name  + "</td>" +
                     "<td align='center'>" + comments + "</td>" +
                     "<td align='center'>" + opened + "</td>" +
                     "<td align='center'>" + closed + "</td>" +
                    
                     "</tr>";

                // $("#modalTable tbody").append(tr_str);
                 $("#modalTable tbody").html(tr_str);
                
               
             }
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
     
	 
	 $("#myModalTask").modal("show");
	

	 }


 function viewGifts(HHId)
 {  
	 
     $(".modal-body div span").text("");
     $(".username span").text("TEST");
//      $(".position span").text(table.row(this).data()[1]);
//      $(".office span").text(table.row(this).data()[2]);
//      $(".age span").text(table.row(this).data()[3]);
//      $(".date span").text(table.row(this).data()[4]);

     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+HHId+'&action=getHHGifts'),
         dataType: 'JSON' ,
         success: function (response) { // alert (JSON.stringify(html));
            // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
             $(".username span").text(response);
            
             //  window.location.href = 'taskGrid.php';
             var len = response.length;
             var tr_str="";
             
             
             for(var i=0; i<len; i++){
                // var id = response[i].id;
                 var name = response[i].name;
                 var delivery_date = response[i].delivery_date;
                 var giftName = response[i].giftName;
                 var ticket_count = response[i].ticket_count;
                 var totalAmount = response[i].totalAmount;
                 var giftStatus = response[i].giftStatus;
              
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                     "<td align='center'>" + name  + "</td>" +
                     "<td align='center'>" + delivery_date + "</td>" +
                     "<td align='center'>" + giftName + "</td>" +
                     "<td align='center'>" + ticket_count + "</td>" +
                     "<td align='center'>" + totalAmount + "</td>" +
                     "<td align='center'>" + giftStatus + "</td>" +
                    
                     "</tr>";

                // $("#modalTable tbody").append(tr_str);
                 $("#modalTable tbody").html(tr_str);
                
               
             }
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
     
	 
	 $("#myModalGifts").modal("show");
	

	 }
 

function generateExcel(taskTypeId,HHId, HHId)
{


alert (HHId);

$.ajax({
    type: "POST",
    url: "getServices.php",
    data: encodeURI('hhId='+HHId+'&action=generateExcel'),
    dataType: 'JSON' ,
    success: function (response) {   alert (JSON.stringify(response));
       // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
//         $(".username span").text(response);
       
//         //  window.location.href = 'taskGrid.php';
//         var len = response.length;
//         var tr_str="";
        
//         for(var i=0; i<len; i++){
//            // var id = response[i].id;
//             var firstname = response[i].firstname;
//             var lastname = response[i].lastname;
//             var relation = response[i].relation;
//             var gender = response[i].gender;
            
//             var age = response[i].age;
//             var occupation = response[i].occupation;
//             var education = response[i].education;
//             var headofFamily = response[i].headofFamily;
//             var decisionMaker = response[i].decisionMaker;
//             var comments = response[i].comments;

            
// 			 tr_str += "<tr>" +
//                 "<td align='center'>" + (i+1) + "</td>" +
//                 "<td align='center'>" + firstname + " " +  lastname + "</td>" +
//                 "<td align='center'>" + relation + "</td>" +
//                 "<td align='center'>" + gender + "</td>" +
//                 "<td align='center'>" + age + "</td>" +
//                 "<td align='center'>" + occupation + "</td>" +
//                 "<td align='center'>" + education + "</td>" +
//                 "<td align='center'>" + headofFamily + "</td>" +
//                 "<td align='center'>" + decisionMaker + "</td>" +
//                 "<td align='center'>" + comments + "</td>" +
               
//                 "</tr>";

//            // $("#modalTable tbody").append(tr_str);
//             $("#modalTable tbody").html(tr_str);
//             $("#recruitingHH").html("<p class='card-text'>"+ response[i].recruiting_id+"</p> ");
//             $("#religionH").html("<p class='card-text'>"+ response[i].religion+"</p> ");
//             $("#socialClassH").html("<p class='card-text'>"+ response[i].socialClass+"</p> ");
//             $("#houseSizeH").html("<p class='card-text'>"+ response[i].houseSize+"</p> ");
//             console.log(response[i].houseSize);
//         }
           
    }//,
//     error: function(xhr, status, error) {
//     	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
          
//     	}
   
});




}
 
 function viewDetails(taskTypeId,HHId, HHId)
 {
 
     $(".modal-body div span").text("");
     $(".username span").text("TEST");

     dom = 'tr';
	 var dataTable = $('#membersTable').DataTable({
		 "searching":false,
		 'bSort': false, 
		 "paging": false ,
		 "destroy": true, //use for reinitialize datatable
		"processing": true,
		"serverSide": true,
		"dom": dom,
		"order":[],
		"ajax":{
			url:"getServices.php",
	      data: {action: 'getHHDetails', hhId: HHId},
		type:"POST",
		},
		createdRow:function(row, data, rowIndex)
		{
 
 
             $("#religionH").html("<p class='card-text'>"+  data[14]+"</p> ");
             $("#socialClassH").html("<p class='card-text'>"+  data[15]+"</p> ");
             $("#houseSizeH").html("<p class='card-text'>"+  data[16]+" m2</p> ");
			  $("#recruitingHH").html("<p class='card-text'>"+ data[17]+"</p> ");
			console.log(row);
			$.each($('td', row), function(colIndex){
				if(colIndex == 1)
				{
					$(this).attr('data-name', 'firstname');
					$(this).attr('class', 'firstname');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 2)
				{
					$(this).attr('data-name', 'lastname');
					$(this).attr('class', 'lastname');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
				

				if(colIndex ==3)
				{
					$(this).attr('data-name', 'relation_id');
					$(this).attr('class', 'relation_id');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
				
				if(colIndex == 4)
				{
					$(this).attr('data-name', 'gender_id');
					$(this).attr('class', 'gender_id');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 5)
				{
					$(this).attr('data-name', 'age');
					$(this).attr('class', 'age');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 6)
				{
					$(this).attr('data-name', 'date_of_birth');
					$(this).attr('class', 'date_of_birth');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 7)
				{
					$(this).attr('data-name', 'occupation_id');
					$(this).attr('class', 'occupation_id');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 8)
				{
					$(this).attr('data-name', 'education_id');
					$(this).attr('class', 'education_id');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 9)
				{
					$(this).attr('data-name', 'head_of_family');
					$(this).attr('class', 'head_of_family');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
				

				if(colIndex == 10)
				{
					$(this).attr('data-name', 'decision_maker');
					$(this).attr('class', 'decision_maker');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				//	console.log ( data[9] );
					 if ( data[10] == "Yes" ) {
					      $(row).addClass( 'success' );
					     }
				}
				
				 
				if(colIndex == 11)
				{
					$(this).attr('data-name', 'comments');
					$(this).attr('class', 'comments');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}


				if(colIndex == 12)
				{
					$(this).attr('data-name', 'member_status_id');
					$(this).attr('class', 'member_status_id');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				//	console.log ( data[9] );
					 if ( data[12] == "3" ) {
					      $(row).addClass( 'bg-dark' );
					      $(row).addClass( 'text-white' );
					     }
				}


				if(colIndex == 13)
				{
					$(this).attr('data-name', 'birth_check');
					$(this).attr('class', 'birth_check');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				
				 
				}
				
			});
		}
	}); 

	 $('#membersTable').editable({
			container:'body',
			selector:'td.firstname',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'First Name',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
              var data = {};
              data['pkId'] = params.pk;
              data[params.name] = params.value;
              data['action'] = 'updateMembers';
              data['hhID'] = HHId; // not used
              return data;
          }, 
			 
			validate:function(value){
				if($.trim(value) == '' || $.trim(value) > 99)
				{
					return 'This field is required';
				}
			}
		});

	 $('#membersTable').editable({
			container:'body',
			selector:'td.lastname',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Last Name',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
              var data = {};
              data['pkId'] = params.pk;
              data[params.name] = params.value;
              data['action'] = 'updateMembers';
              data['hhID'] = HHId; // not used
              return data;
          }, 
			 
			validate:function(value){
				if($.trim(value) == '' || $.trim(value) > 99)
				{
					return 'This field is required';
				}
			}
		});



	 	$('#membersTable').editable({
			container:'body',
			selector:'td.gender_id',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Gender',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                     var data = {};
                                     data['pkId'] = params.pk;
                                     data[params.name] = params.value;
                                     data['action'] = 'updateMembers';
                                     data['hhID'] = HHId; // not used
                                     return data;
           						  }, 

             source:[{value: "0", text: "Male"}, {value: "1", text: "Female"}],
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});



		$('#membersTable').editable({
			container:'body',
			selector:'td.relation_id',
			 mode : 'inline',
			 url: 'getServices.php',
			 title:'occupation',
			 type:'POST',
			 datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                  var data = {};
                                  data['pkId'] = params.pk;
                                  data[params.name] = params.value;
                                  data['action'] = 'updateMembers';
                                  data['hhID'] = HHId; // not used
                                  return data;
        						  }, 

          source:[{value: "1", text: "Son"},
        	  {value: "2", text: "Daughter"},
        	  {value: "3", text: "Father"},
        	  {value: "4", text: "Mother"},
        	  {value: "5", text: "Grandpa"},
        	  {value: "6", text: "Grandma"},
        	  {value: "7", text: "Sister"},
        	  {value: "8", text: "Brother"},
        	  {value: "9", text: "Uncle (father side)"},
        	  {value: "10", text: "Aunt (father side)"},
        	  {value: "11", text: "Uncle (mother side)"},
        	  {value: "12", text: "Aunt (mother side)"},
        	  {value: "13", text: "Nephew (brother side)"},
        	  {value: "14", text: "Nephew (Sister side)"},
        	  {value: "15", text: "Male cousin (mother’s brother)"},
        	  {value: "16", text: "Male cousin (mother’s sister)"},
        	  {value: "17", text: "Male cousin (father’s brother)"},
        	  {value: "18", text: "Male cousin (father’s sister)"},
        	  {value: "19", text: "Son in law"},
        	  {value: "20", text: "Mother in law"},
        	  {value: "21", text: "Daughter in law"},
        	  {value: "22", text: "Grandson"},
        	  {value: "23", text: "Granddaughter"},
        	  {value: "24", text: "Husband"},
        	  {value: "25", text: "Respondent"},
        	  {value: "26", text: "Wife"},
        	  {value: "27", text: "Maid"},
        	  {value: "28", text: "Other"}],
                  
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});

	 	
	 	$('#membersTable').editable({
			container:'body',
			selector:'td.education_id',
			 mode : 'inline',
			 url: 'getServices.php',
			 title:'occupation',
			 type:'POST',
			 datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                  var data = {};
                                  data['pkId'] = params.pk;
                                  data[params.name] = params.value;
                                  data['action'] = 'updateMembers';
                                  data['hhID'] = HHId; // not used
                                  return data;
        						  }, 

          source:[{value: "1", text: "Illiterate"},
        	  {value: "2", text: "Primary school"},
        	  {value: "3", text: "Complementary"},
        	  {value: "4", text: "School Brevet"},
        	  {value: "5", text: "Secondary School, BT"},
        	  {value: "6", text: "Polytechnic(TS)"},
        	  {value: "7", text: "University"},
        	  {value: "8", text: "High University Degree"},
        	  {value: "999", text: "Not Specified"}],
                  
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});
	 	
	 	$('#membersTable').editable({
			container:'body',
			selector:'td.occupation_id',
			 mode : 'inline',
			 url: 'getServices.php',
			 title:'occupation',
			 type:'POST',
			 datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                  var data = {};
                                  data['pkId'] = params.pk;
                                  data[params.name] = params.value;
                                  data['action'] = 'updateMembers';
                                  data['hhID'] = HHId; // not used
                                  return data;
        						  }, 

          source:[{value: "1", text: "1-EMPLOYER / OWNER (Company / Shop / Farm with 6 or more employees) SELF-EMPLOYED"},
                  {value: "2", text: "2-SENIOR MANAGER (accounting for 6 or more employees)"},
                  {value: "3", text: "3-SENIOR MANAGER (responsible for 5 or fewer employees)"},
                  {value: "4", text: "4-PROFESSIONAL AND SIMILAR SELF-EMPLOYED"},
                  {value: "5", text: "5-MIDDLE MANAGEMENT (accounting for 6 or more employees)"},
                  {value: "6", text: "6-EMPLOYER / OWNER (Shop / Farm / Merchant … with 5 or fewer employees) SELF-EMPLOYED"},
                  {value: "7", text: "7-TECHNICAL PROFESSIONS, science and art  (similar to code 04 , but on behalf of others)"},
                  {value: "8", text: "8-MIDDLE MANAGEMENT (responsible for 5 or fewer employees)"},
                  {value: "9", text: "9-EMPLOYEES  / WHITE-COLLAR-WORKERS"},
                  {value: "10", text:"10-RETIRED / PENSIONERS - If never been occupied before, else specific occupation code. "},
                  {value: "11", text: "11-SKILLED WORKERS (manual)"},
                  {value: "12", text: "12-WORKERS self-employed"},
                  {value: "13", text: "13-UNEMPLOYED – ASSETS"},
                  {value: "14", text: "14-WORKERS NOT QUALIFIED"},
                  {value: "15", text: "15-HOUSEWIFE – NONACTIVE"},
                  {value: "16", text: "16-STUDENTS"},
                  {value: "17", text: "17-CHILD / PRESCHOOLER"},
                  {value: "999", text: "999-REFUSAL"}],
                  
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});

	 	$('#membersTable').editable({
			container:'body',
			selector:'td.head_of_family',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Head of Family',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                     var data = {};
                                     data['pkId'] = params.pk;
                                     data[params.name] = params.value;
                                     data['action'] = 'updateMembers';
                                     data['hhID'] = HHId; // not used
                                     return data;
           						  }, 

             source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});

	 	$('#membersTable').editable({
			container:'body',
			selector:'td.decision_maker',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Decision Maker',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                     var data = {};
                                     data['pkId'] = params.pk;
                                     data[params.name] = params.value;
                                     data['action'] = 'updateMembers';
                                     data['hhID'] = HHId; // not used
                                     return data;
           						  }, 

             source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});


	 	$('#membersTable').editable({
			container:'body',
			selector:'td.age',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Age',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                 var data = {};
                 data['pkId'] = params.pk;
                 data[params.name] = params.value;
                 data['action'] = 'updateMembers';
                 data['hhID'] = HHId; // not used
                 return data;
             }, 
			 
			validate:function(value){
				if($.trim(value) == '' || $.trim(value) > 99)
				{
					return 'This field is required';
				}
			}
		});

	 	$('#membersTable').editable({
			container:'body',
			selector:'td.date_of_birth',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Age',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                 var data = {};
                 data['pkId'] = params.pk;
                 data[params.name] = params.value;
                 data['action'] = 'updateMembers';
                 data['hhID'] = HHId; // not used
                 return data;
             }, 
			 
			validate:function(value){
// 				if($.trim(value) == '' || $.trim(value) > 99)
// 				{
// 					return 'This field is required';
// 				}
			}
		});
		

	 	$('#membersTable').editable({
			container:'body',
			selector:'td.birth_check',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'birth_check',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                     var data = {};
                                     data['pkId'] = params.pk;
                                     data[params.name] = params.value;
                                     data['action'] = 'updateMembers';
                                     data['hhID'] = HHId; // not used
                                     return data;
           						  }, 

             source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});


	 	$('#membersTable').editable({
			container:'body',
			selector:'td.comments',
			 mode : 'inline',
			 url: 'getServices.php',
			title:'Occupation Details',
			type:'POST',
			datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                 var data = {};
                 data['pkId'] = params.pk;
                 data[params.name] = params.value;
                 data['action'] = 'updateMembers';
                 data['hhID'] = HHId; // not used
                 return data;
             }, 
			 
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});

		 
	 
	 $("#myModal").modal("show");
	

	 }

 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});


 function viewAddress(HHId, taskTypeId)
 { 
 //zozo
     $(".modal-body div span").text("");
  
	 dom = 'tr';
	 var dataTable = $('#addressTable').DataTable({
		 "searching":false,
		 'bSort': false, 
		 "paging": false ,
		 "destroy": true, //use for reinitialize datatable
		"processing": true,
		"serverSide": true,
		"dom": dom,
		"order":[],
		"ajax":{
			url:"getServices.php",
	      data: {action: 'getAddress', hhID: HHId},
		type:"POST",
		},
		createdRow:function(row, data, rowIndex)
		{
			$.each($('td', row), function(colIndex){
				if(colIndex == 1)
				{
					$(this).attr('data-name', 'house_size');
					$(this).attr('class', 'house_size');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 2)
				{
					$(this).attr('data-name', 'area');
					$(this).attr('class', 'area');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}


				if(colIndex == 3)
				{
					$(this).attr('data-name', 'area_details');
					$(this).attr('class', 'area_details');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}


				if(colIndex == 4)
				{
					$(this).attr('data-name', 'address');
					$(this).attr('class', 'address');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}


				if(colIndex == 5)
				{
					$(this).attr('data-name', 'building');
					$(this).attr('class', 'building');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}


				if(colIndex == 6)
				{
					$(this).attr('data-name', 'floor');
					$(this).attr('class', 'floor');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 7)
				{
					$(this).attr('data-name', 'location');
					$(this).attr('class', 'location');
					$(this).attr('data-type', 'url');
					$(this).attr('data-pk', data[0]);
				}
				
				if(colIndex == 8)
				{
					$(this).attr('data-name', 'installation_comments');
					$(this).attr('class', 'installation_comments');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}

				if(colIndex == 9)
				{
					$(this).attr('data-name', 'religion_id');
					$(this).attr('class', 'religion');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
 
			});
		}
	}); 


// 	 if (userRole == 1   )
// 	  {
		  
    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.house_size',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'House size in m2',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' || $.trim(value) < 0)
    			{
    				return 'This field is required';
    			}
    			if( $.trim(value) < 0)
    			{
    				return 'This field cannot be less than Zero';
    			}
    		}
    	});


    	  
    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.area',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'area',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' )
    			{
    				return 'This field is required';
    			}
    			 
    		}
    	});

    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.area_details',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'area details',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' )
    			{
    				return 'This field is required';
    			}
    			 
    		}
    	});

    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.address',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'Street',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' )
    			{
    				return 'This field is required';
    			}
    			 
    		}
    	});

    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.building',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'building',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' )
    			{
    				return 'This field is required';
    			}
    			 
    		}
    	});

    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.floor',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'floor',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' )
    			{
    				return 'This field is required';
    			}
    			 
    		}
    	});


    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.location',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'location',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' )
    			{
    				return 'This field is required';
    			}
    			 
    		}
    	});


    	$('#addressTable').editable({
    		container:'body',
    		selector:'td.installation_comments',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateAddress';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'Installation Comments',
    		type:'POST',
    		validate:function(value){
    			 
//     			if($.trim(value) == '' || $.trim(value) < 0)
//     			{
//     				return 'This field is required';
//     			}
//     			if( $.trim(value) < 0)
//     			{
//     				return 'This field cannot be less than Zero';
//     			}
    		}
    	});

 


    	$('#addressTable').editable({
			container:'body',
			selector:'td.religion',
			 mode : 'inline',
			 url: 'getServices.php',
			 title:'religion',
			 type:'POST',
			 datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                  var data = {};
                                  data['pkId'] = params.pk;
                                  data[params.name] = params.value;
                                  data['action'] = 'updateAddress';
                                  data['hhID'] = HHId; // not used
                                  return data;
        						  }, 
        	 source:$('#religionX').val() ,  
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});
	
 
	 //  }

// 	$('#visitTable').editable({
// 		container:'body',
// 		selector:'td.last_name',
// 		url:'update.php',
// 		title:'Last Name',
// 		type:'POST',
// 		validate:function(value){
// 			if($.trim(value) == '')
// 			{
// 				return 'This field is required';
// 			}
// 		}
// 	});

// 	$('#visitTable').editable({
// 		container:'body',
// 		selector:'td.gender',
// 		url:'update.php',
// 		title:'Gender',
// 		type:'POST',
// 		datatype:'json',
// 		source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
// 		validate:function(value){
// 			if($.trim(value) == '')
// 			{
// 				return 'This field is required';
// 			}
// 		}
// 	});
	 
	 
	 $("#addressModal").modal("show");
	

	 }


 function viewTVDetailsReceiver(HHId,taskTypeId)
 { 
	 //zozo
     $(".modal-body div span").text("");
 
		 dom = 'tr';
		 var dataTable = $('#tvTableReceiver').DataTable({
			 "searching":false,
			 'bSort': false, 
			 "paging": false ,
			 "destroy": true, //use for reinitialize datatable
			"processing": true,
			"serverSide": true,
			"dom": dom,
			"order":[],
			"ajax":{
				url:"getServices.php",
		      data: {action: 'getTVReceivers', hhId: HHId},
			type:"POST",
			},
			createdRow:function(row, data, rowIndex)
			{
				$.each($('td', row), function(colIndex){
					 

					if(colIndex == 1)
					{
						$(this).attr('data-name', 'room_id');
						$(this).attr('class', 'room');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
 
					if(colIndex == 2)
					{
						$(this).attr('data-name', 'tvm_serial');
						$(this).attr('class', 'tvm_serial');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}
 

				   if(colIndex == 3)
					{
							$(this).attr('data-name', 'tvm_sim_serial');
							$(this).attr('class', 'tvm_sim_serial');
							$(this).attr('data-type', 'text');
							$(this).attr('data-pk', data[0]);
					}
						
					if(colIndex == 4)
					{
						$(this).attr('data-name', 'receiver_id');
						$(this).attr('class', 'receiver_id');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
					
					if(colIndex == 5)
					{
						$(this).attr('data-name', 'satellite_id');
						$(this).attr('class', 'satellite_id');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}

					
 
			        
					
					
				}); }
	}); 


// 	 if (userRole == 1   )
// 	  {
	
 
		  
	$('#tvTableReceiver').editable({
		container:'body',
		selector:'td.receiver_id',
   	    url: 'getServices.php',
   	 mode : 'inline',
        type: 'post',
        params: function(params) {  //params already contain `name`, `value` and `pk`
	                     var data = {};
	                     data['pkId'] = params.pk;
	                     data[params.name] = params.value;
	                     data['action'] = 'updateTVReceiver';
	                     data['hhID'] = HHId; // not used
	                     return data;
	                 },
	  

	                 
		title:'receiver',
		 source:$('#receiverX').val(),
		type:'POST',
		validate:function(value){
			 
		}
	});
	$('#tvTableReceiver').editable({
		container:'body',
		selector:'td.satellite_id',
		 mode : 'inline',
   	    url: 'getServices.php',
        type: 'post',
        params: function(params) {  //params already contain `name`, `value` and `pk`
	                     var data = {};
	                     data['pkId'] = params.pk;
	                     data[params.name] = params.value;
	                     data['action'] = 'updateTVSatellite';
	                     data['hhID'] = HHId; // not used
	                     return data;
	                 },
	  

	                 
		title:'satellite',
		 source:$('#satelliteX').val(),
		type:'POST',
		validate:function(value){
			 
		}
	});
	 
	 $("#myModalTVReceiver").modal("show"); 
	

	 }
 
 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});
 
//***********************
 function viewTVDetails2(taskTypeId,HHId)
 { 
	 //zozo
     $(".modal-body div span").text("");
  
 
		 dom = 'tr';
		 var dataTable = $('#tvTable').DataTable({
			 "searching":false,
			 'bSort': false, 
			 "paging": false ,
			 "destroy": true, //use for reinitialize datatable
			"processing": true,
			"serverSide": true,
			"dom": dom,
			"order":[],
			"ajax":{
				url:"getServices.php",
		      data: {action: 'getTVDetails2', hhId: HHId},
			type:"POST",
			},
			createdRow:function(row, data, rowIndex)
			{
				$.each($('td', row), function(colIndex){
					 

					if(colIndex == 1)
					{
						$(this).attr('data-name', 'room_id');
						$(this).attr('class', 'room');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
 
					if(colIndex == 2)
					{
						$(this).attr('data-name', 'brand_id');
						$(this).attr('class', 'brand');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
					
					if(colIndex == 3)
					{
						$(this).attr('data-name', 'brand_txt');
						$(this).attr('class', 'brand_txt');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}
					

					if(colIndex == 4)
					{
						$(this).attr('data-name', 'model_numb');
						$(this).attr('class', 'model_numb');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}
					
					if(colIndex == 5)
					{
						$(this).attr('data-name', 'screen_type_id');
						$(this).attr('class', 'screen_type_id');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
					if(colIndex == 6)
					{
						$(this).attr('data-name', 'hd_enabled');
						$(this).attr('class', 'hd_enabled');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
					if(colIndex == 7)
					{
						$(this).attr('data-name', 'tvm_serial');
						$(this).attr('class', 'tvm_serial');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}
					if(colIndex == 8)
					{
						$(this).attr('data-name', 'tvm_sim_serial');
						$(this).attr('class', 'tvm_sim_serial');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 9)
					{
						$(this).attr('data-name', 'mic');
						$(this).attr('class', 'mic');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}


					if(colIndex == 10)
					{
						$(this).attr('data-name', 'power_socket');
						$(this).attr('class', 'power_socket');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 11)
					{
						$(this).attr('data-name', 'optical_audio_adapter');
						$(this).attr('class', 'optical_audio_adapter');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 12)
					{
						$(this).attr('data-name', 'audio_relay');
						$(this).attr('class', 'audio_relay');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 13)
					{
						$(this).attr('data-name', 'scart_adapter');
						$(this).attr('class', 'scart_adapter');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 14)
					{
						$(this).attr('data-name', 'extension_usb');
						$(this).attr('class', 'extension_usb');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
					

					if(colIndex == 15)
					{
						$(this).attr('data-name', 'jack_to_jack');
						$(this).attr('class', 'jack_to_jack');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 16)
					{
						$(this).attr('data-name', 'multiple_outlet');
						$(this).attr('class', 'multiple_outlet');
						$(this).attr('data-type', 'select');
						$(this).attr('data-pk', data[0]);
					}
					

					if(colIndex == 17)
					{
						$(this).attr('data-name', 'other_kit');
						$(this).attr('class', 'other_kit');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}

					if(colIndex == 18)
					{
						$(this).attr('data-name', 'comments');
						$(this).attr('class', 'comments');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
					}
					if(colIndex == 19)
					{
						$(this).attr('data-name', 'statuss');
						$(this).attr('class', 'statuss');
						$(this).attr('data-type', 'text');
						$(this).attr('data-pk', data[0]);
						if ( data[19] != "In Production" ) {
						      $(row).addClass( 'bg-dark' );
						      $(row).addClass( 'text-white' );
						     }
					}
					
					
				}); }
	}); 


// 	 if (userRole == 1   )
// 	  {
	
	$('#tvTable').editable({
			container:'body',
			selector:'td.room',
			 mode : 'inline',
			 url: 'getServices.php',
			 title:'room',
			 type:'POST',
			 datatype:'json',
			 params: function(params) {  //params already contain `name`, `value` and `pk`
                                  var data = {};
                                  data['pkId'] = params.pk;
                                  data[params.name] = params.value;
                                  data['action'] = 'updateTV';
                                  data['hhID'] = HHId; // not used
                                  return data;
        						  }, 
        	 source:$('#roomX').val() ,  
			validate:function(value){
				if($.trim(value) == '')
				{
					return 'This field is required';
				}
			}
		});
	
		  
    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.brand',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	    source:$('#brandX').val() ,  
    
    	                 
    		title:'brand',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' || $.trim(value) < 0)
    			{
    				return 'This field is required';
    			}
    			
    		}
    	});


    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.brand_txt',
    		mode : 'inline',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    
    	                 
    		title:'brand_txt',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});


    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.model_numb',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    
    	                 
    		title:'model_numb',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});
    	

    
    	

    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.screen_type_id',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    
    	                 
    		title:'screen_type_id',
    		 source:$('#screenX').val(),
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});
    	

    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.hd_enabled',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'hd_enabled',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});

    	
    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.tvm_serial',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    
    	                 
    		title:'tvm_serial',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});
    	
 
    	
    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.tvm_sim_serial',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    
    	                 
    		title:'tvm_sim_serial',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});
    	
    	
    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.mic',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'mic',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});
 


    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.power_socket',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'power_socket',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});


    	$('#tvTable').editable({
    		container:'body',
    		 mode : 'inline',
    		selector:'td.optical_audio_adapter',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'optical_audio_adapter',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});


    	$('#tvTable').editable({
    		container:'body',
    		 mode : 'inline',
    		selector:'td.audio_relay',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'audio_relay',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});


    	$('#tvTable').editable({
    		container:'body',
    		 mode : 'inline',
    		selector:'td.scart_adapter',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'scart_adapter',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});

    	

    	$('#tvTable').editable({
    		container:'body',
    		 mode : 'inline',
    		selector:'td.extension_usb',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'extension_usb',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});


    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.jack_to_jack',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'jack_to_jack',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});
    	

    	
    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.multiple_outlet',
    		 mode : 'inline',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	                 source:[{value: "0", text: "No"}, {value: "1", text: "Yes"}],
    	                 
    		title:'multiple_outlet',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});

    	
    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.other_kit',
       	    url: 'getServices.php',
            type: 'post',
            mode : 'inline',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	     
    	                 
    		title:'other_kit',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});

    	$('#tvTable').editable({
    		container:'body',
    		selector:'td.comments',
       	    url: 'getServices.php',
       	 mode : 'inline',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTV';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 },
    	  
    	     
    	                 
    		title:'comments',
    		type:'POST',
    		validate:function(value){
    			 
    		}
    	});

    	 
    	

      	 
	 
	 $("#myModalTV2").modal("show"); 
	

	 }
 
 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});

 

 function viewTechVisits(HHId, taskTypeId)
 { 
 //zozo
     $(".modal-body div span").text("");
  
	 dom = 'tr';
	 var dataTable = $('#visitTable').DataTable({
		 "searching":false,
		 'bSort': false, 
		 "paging": false ,
		 "destroy": true, //use for reinitialize datatable
		"processing": true,
		"serverSide": true,
		"dom": dom,
		"order":[],
		"ajax":{
			url:"getServices.php",
	      data: {action: 'getTechVisits', hhID: HHId},
		type:"POST",
		},
		createdRow:function(row, data, rowIndex)
		{
			$.each($('td', row), function(colIndex){
				if(colIndex == 5)
				{
					$(this).attr('data-name', 'distance');
					$(this).attr('class', 'distance');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
 
			});
		}
	}); 


// 	 if (userRole == 1   )
// 	  {
		  
    	$('#visitTable').editable({
    		container:'body',
    		selector:'td.distance',
       	    url: 'getServices.php',
            type: 'post',
            params: function(params) {  //params already contain `name`, `value` and `pk`
    	                     var data = {};
    	                     data['pkId'] = params.pk;
    	                     data[params.name] = params.value;
    	                     data['action'] = 'updateTechVisits';
    	                     data['hhID'] = HHId; // not used
    	                     return data;
    	                 }, 
    
    	                 
    		title:'Distance in KMs',
    		type:'POST',
    		validate:function(value){
    			 
    			if($.trim(value) == '' || $.trim(value) < 0)
    			{
    				return 'This field is required';
    			}
    			if( $.trim(value) < 0)
    			{
    				return 'This field cannot be less than Zero';
    			}
    		}
    	});
	 //  }

// 	$('#visitTable').editable({
// 		container:'body',
// 		selector:'td.last_name',
// 		url:'update.php',
// 		title:'Last Name',
// 		type:'POST',
// 		validate:function(value){
// 			if($.trim(value) == '')
// 			{
// 				return 'This field is required';
// 			}
// 		}
// 	});

// 	$('#visitTable').editable({
// 		container:'body',
// 		selector:'td.gender',
// 		url:'update.php',
// 		title:'Gender',
// 		type:'POST',
// 		datatype:'json',
// 		source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
// 		validate:function(value){
// 			if($.trim(value) == '')
// 			{
// 				return 'This field is required';
// 			}
// 		}
// 	});
	 
	 
	 $("#techVisitsModal").modal("show");
	

	 }

 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});
 


 function viewTechOrders(HHId, taskTypeId)
 { 
 
     $(".modal-body div span").text("");
 
//      $(".position span").text(table.row(this).data()[1]);
//      $(".office span").text(table.row(this).data()[2]);
//      $(".age span").text(table.row(this).data()[3]);
//      $(".date span").text(table.row(this).data()[4]);

     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+HHId+'&action=viewTechOrders'),
         dataType: 'JSON' ,
         success: function (response) {
              
            // alert (JSON.stringify(response));
            // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
             $(".username span").text(response);
            
             //  window.location.href = 'taskGrid.php';
             var len = response.length;
             var tr_str="";

 

             
             for(var i=0; i<len; i++){
                // var id = response[i].id;
                 var techType = response[i].techType;
                 var orderNb = response[i].orderNb;
                 var comments = response[i].comments;
                 var opened = response[i].opened;
                 
                 var closed = response[i].closed;
                 var household_id = response[i].household_id;
                 var doc = response[i].doc;
                 var doc_exists = response[i].doc_exists;
 
                 
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                   
                     "<td align='center'>" + techType + "</td>" +
                     "<td align='center'>" + orderNb + "</td>" +
                     "<td align='center'>" + comments + "</td>" +
                     "<td align='center'>" + opened + "</td>" +
                     "<td align='center'>" + closed + "</td>" +
                     "<td align='center'>" + household_id + "</td>" +  
                     "<td align='center'>" + doc + "</td>" +  
                     "<td align='center'>"+ doc_exists +" </td>" +  
                    
                     "</tr>";

                // $("#modalTable tbody").append(tr_str);
              
                $("#modalTable tbody").html(tr_str);
                // $("#techOrderModal").html(response[i].recruiting_id);
             }
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
     
	 
	 $("#techOrderModal").modal("show");
	

	 }

 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});



 /**
  * TV MODAL
  */
  function viewTVChart(taskTypeId,HHId, HHId)
  {
  
      $(".modal-body div span").text("");
      $(".username span").text("TEST");
 
//ghenoie
      $.ajax({

          url: 'http://localhost:88/chart_data.php',
          data: encodeURI('hhId='+HHId),
          type: 'POST',
          success: function(data) {
              chartData = data;
              var chartProperties = {
                  "caption": "Last 14 days performance",
                  "xAxisName": "TV Meter",
                  "yAxisName": "ON/OFF",
                  "rotatevalues": "1",
                  "theme": "zune"
              };

              apiChart = new FusionCharts({
                  type: 'column2d',
                  renderAt: 'chart-container',
                  width: '550',
                  height: '300',
                  dataFormat: 'json',
                  dataSource: {
                      "chart": chartProperties,
                      "data": chartData
                  }
              });
              apiChart.render();
          }
      });
      
 	 
 	 $("#myModalChart").modal("show");
 	

 	 }
	 
 
/**
 * TV MODAL
 */
 function viewTVDetails(taskTypeId,HHId, HHId)
 {
 
     $(".modal-body div span").text("");
     $(".username span").text("TEST");
     $("#response").empty();
     $("#response").removeClass("alert-success");
     $("#response").removeClass("alert-danger");
     
//      $(".position span").text(table.row(this).data()[1]);
//      $(".office span").text(table.row(this).data()[2]);
//      $(".age span").text(table.row(this).data()[3]);
//      $(".date span").text(table.row(this).data()[4]);

     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+HHId+'&action=getTVDetails'),
         dataType: 'JSON' ,
         success: function (response) { // alert (JSON.stringify(html));
            // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
             $(".username span").text(response);
            
             //  window.location.href = 'taskGrid.php';
             var len = response.length;
             var tr_str="";
             
             for(var i=0; i<len; i++){
                // var id = response[i].id;
                 var tvm_serial = response[i].tvm_serial;
                 var tvm_sim_serial = response[i].tvm_sim_serial;
                 var model_numb = response[i].model_numb;
                 var equipment = response[i].equipment;
                 var strTvm_serial = "checkTVMeter('"+tvm_serial+"')";
                 var strTvm_serial_per = "checkTVMeterPerformance('"+tvm_serial+"')";
//                  var strTvm_serial_devices = "checkTVMeterPerformance('"+tvm_serial+"')";
                
                 var statusId = response[i].statusId;
                 var comments = response[i].comments;
                 var checkStatus = response[i].checkStatus;
                
                 
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                     "<td align='center'>" + tvm_serial + "</td>" +
                     "<td align='center'>" + tvm_sim_serial + "</td>" +
                     "<td align='center'>" + model_numb + "</td>" +
                     "<td align='center'>" + equipment + "</td>" +
                     "<td align='center'>" + statusId + "</td>" +
                     "<td align='center'>" + comments + "</td>" +
                    "<td align='center'><button type='button' class='btn btn-primary' data-toggle='modal' onclick= "+ strTvm_serial+" data-target='.bs-example-modal-lg'><span class='fa fa-plug'></span></button></td>"  +
//                     "<td align='center'><button type='button' class='btn btn-primary' data-toggle='modal' onclick= "+ strTvm_serial_devices+" data-target='.bs-example-modal-lg'><span class='fa fa-play-circle'></span></button></td>"  +
                    "<td align='center'><button type='button' class='btn btn-primary' data-toggle='modal' onclick= "+ strTvm_serial_per+" data-target='.bs-example-modal-lg'><span class='fa fa-play-circle'></span></button></td>"  +
                     "</tr>";

                // $("#modalTable tbody").append(tr_str);
                 $("#modalTable tbody").html(tr_str);
             }
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
     
	 
	 $("#myModalTV").modal("show");
	

	 }

 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});
 
 
//on Grid link click : CLOSE TASK
 function closeTaskFn(hhId,taskTypeId)
 {
//alert ('taskId='+id+'&statusId='+ status);
  var r = confirm("Are you sure you want to close the task ?");
  if (r == true) {
     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+hhId+'&taskTypeId='+ taskTypeId+'&action=closeTask'),
         dataType: 'JSON' ,
         success: function (html) { // alert (JSON.stringify(html));
             $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Close Task done</div>");
              window.location.href = 'taskGrid.php';
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });

  }
     
 }


//on Grid link click : CLOSE Tech Order
 function closeTechOrderFn(hhId,taskTypeId)
 {
//alert ('taskId='+id+'&statusId='+ status);
  var r = confirm("Are you sure you want to close the tech Order ?");
  if (r == true) {
     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+hhId+'&taskTypeId='+ taskTypeId+'&action=closeTechOrderFn'),
         dataType: 'JSON' ,
         success: function (html) { // alert (JSON.stringify(html));
             $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>close the tech Order done</div>");
              window.location.href = 'taskGrid.php';
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });

  }
     
 }

 
 function moveHHtoInactive(hhId,taskTypeId)
 {
	 // alert ('hhId='+hhId+'&taskTypeId='+ taskTypeId);
  var r = confirm("Are you sure you want to move the household to Inactive and create automatically Coincidential Task	?");
  if (r == true) {
	     $.ajax({
	         type: "POST",
	         url: "getServices.php",
	         data: encodeURI('hhId='+hhId+'&taskTypeId='+ taskTypeId+'&action=moveHHtoInactive'),
	         dataType: 'JSON' ,
	         success: function (html) { // alert (JSON.stringify(html));
	             $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>moveHHtoInactive Created</div>");
	              window.location.href = 'taskGrid.php';
	                
	         }//,
//	          error: function(xhr, status, error) {
//	          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
	               
//	          	}
	        
	     });
  }
	 }
  
 function moveHHtoProduction(hhId,taskTypeId)
 {
	 // alert ('hhId='+hhId+'&taskTypeId='+ taskTypeId);
  var r = confirm("Are you sure you want to move the household to production ?");
  if (r == true) {
	     $.ajax({
	         type: "POST",
	         url: "getServices.php",
	         data: encodeURI('hhId='+hhId+'&taskTypeId='+ taskTypeId+'&action=moveHHtoProduction'),
	         dataType: 'JSON' ,
	         success: function (html) { // alert (JSON.stringify(html));
	             $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>moveHHtoProduction Created</div>");
	              window.location.href = 'taskGrid.php';
	                
	         }//,
//	          error: function(xhr, status, error) {
//	          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
	               
//	          	}
	        
	     });
  }
	 }

 
//on Grid link click: CREATE INCENTIVE DELIVERY
function createIncentiveDeliveryFn(hhId,taskTypeId)
{
 // alert ('taskId='+taskTypeId+'&hhId='+ hhId);
  
    var r = confirm("Are you sure you want to create an Incentive Delivery Task?");
  if (r == true) {  
    $.ajax({
        type: "POST",
        url: "getServices.php",
        data: encodeURI('hhId='+hhId+'&taskTypeId='+ taskTypeId+'&action=createIncentiveDelivery'),
        dataType: 'JSON' ,
        success: function (html) { // alert (JSON.stringify(html));
            $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Incentive Delivery Task Created </div>");
          window.location.href = 'taskGrid.php';
               
        }//,
//         error: function(xhr, status, error) {
//         	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
              
//         	}
       
    });
  }
}

//on Grid link click
 function goToWelcome(taskTypeId,HHId, HHId)
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
 	   zUrl = "updateStatus.php";
 	   $.redirect(zUrl, {taskTypeId:taskTypeId, HHId:HHId, HHId: HHId }, "POST" );
 } 

//on Grid link click
 function reviewOrder(taskTypeId,HHId, HHId)
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
 	   zUrl = "reviewOrder.php";
 	   $.redirect(zUrl, {taskTypeId:taskTypeId, HHId:HHId, HHId: HHId }, "POST" );
 } 
        
    </script>
</head>
<body>

<div>  <!-- class="container" --> 
    
 
<div style="margin-left:50px;margin-right: 50px;">  <!-- class="container" --> 
        <table id="quota-grid" class="table table-striped table-bordered " style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Task Type</th>
				<th>Task Date</th> 
				<th>Comments/ POINTS</th>
				<th>HH Id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Region</th>
                <th>Address</th>
                <th>Latest Contact Status</th>
				<th>Latest Contact Comments</th>
				<th>User</th>
				<th>Visit Time</th>  
				<th>Link</th>
				<th>Blocking Task</th>
				<th>Lastest Contact Date</th>
				<th>HH Status</th>
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
                     <th></th>
                      <th></th>
                      <th></th>
                  
                    
 				</tr>
			</tfoot>
        </table>
    </div>
 


</div>

<br/>
<br/>
<br/>
<br/>


<!-- Tech Visits Modal -->
<div class="modal fade" id="techVisitsModal" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">Technician Visits</h4>
       
    </div>
    <div class="modal-body">
 
      <table id="visitTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
 
        	   <th>id</th>  
			    <th>Issue</th>  
				<th>OrderNb</th>  
				<th>Technician</th>
				<th>Visit Date</th>
				<th>Distance</th>
				<th>Impacted TV Sets</th>
				<th>Remarks</th>
	 
				 
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>


<!-- full Address Modal -->
<div class="modal fade" id="addressModal" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">Detailed Address</h4>
       
    </div>
    <div class="modal-body">
 
 
        
      <table id="addressTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
            	 <th>HH Id</th>
            	 <th>House Size(m2)</th>
            	 <th>Area</th>
            	 <th>Near By</th>  
				<th>Street</th>
				<th>Building</th>
				<th>Floor</th>
				<th>Location</th>
				<th>Installation Comments</th>
				<th>Religion</th>
			</tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>


<!-- Tech Orders Modal -->
<div class="modal fade" id="techOrderModal" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">Technician Orders</h4>
 
    </div>
    <div class="modal-body">
 
      <table id="modalTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    
				<th>#</th>
				<th>Order Type</th>  
				<th>Order Number</th>
				<th>Comments</th>
				<th>Openning Date</th>
				<th>Closing Date</th>
				<th>HouseHold Id</th>
				<th>Documents</th>
				<th>exists</th>
	 
				 
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>


 <!-- Members Modal -->
<div class="modal fade" id="myModal" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
  		<h4 class="modal-title">HouseHold Details</h4>
       
       <div class="card-deck">
              <div   class="zcard bg-dark text-white">
                <div id="religionH" class="card-body text-center">
                  
                </div>
              </div>
            
          		
              <div class="zcard bg-default">
                <div id="recruitingHH"  class="card-body text-center">
                   
                </div>
          </div>
          
           <div class="zcard bg-info">
                <div  id="socialClassH"  class="card-body text-center">
                  </div>
              </div>
              
           <div class="zcard bg-warning">
                <div  id="houseSizeH"  class="card-body text-center">
                  </div>
              </div>
	</div>
       
    </div>
    
    <div class="modal-body">
 
      <table id="membersTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    
				<th>#</th>
				<th>First Name</th>  
				<th>Last Name</th>
				<th>Relation</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Birth Date</th>
				<th>Occupation</th>
				<th>Education</th>
				<th>Head of Family</th>
				<th>Decision Maker</th>
				<th>Occupation Details</th>
				<th>Status</th>
				<th>Check Age</th>
				 
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>
 
 
 <!-- Tasks -->
<div class="modal fade" id="myModalTask" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">Tasks</h4>
    </div>
    <div class="modal-body">
 
      <table id="modalTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    
				<th>#</th>
				<th>Task Type</th>  
				<th>Details</th>
				<th>Opened</th>
				<th>Closed</th>
		 
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>

<!-- Gifts  -->
<div class="modal fade" id="myModalGifts" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">Gifts</h4>
    </div>
    <div class="modal-body">
 
      <table id="modalTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
       			<th>#</th>
				<th>Task Type</th>  
				<th>Delivery date</th>
				<th>Gift</th>
				<th># Tickets</th>
				<th>Gift Value</th>
				<th>Gift Status</th>
		     </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>


 <!-- TV Modal -->
<div class="modal fade" id="myModalTV" role="dialog" style="padding-top: 150px;padding-right: 100px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">TV Details</h4>
    </div>
    <div class="modal-body">
 <!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src='images/loader.gif' width='32px' height='32px'>
</div>
<!-- Image loader -->
<div  id="response" class=' display-4 alert'></div>
      <table id="modalTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    
				<th>#</th>
				<th>Serial Number</th>  
				<th>Sim Card</th>
				<th>Model Number</th>
				<th>Equipment</th>
				<th>Status</th>
				<th>comments</th>
				<th>Plugged(24h)</th>
				 
				<th>Graph</th>
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>
 
  <!-- TV Modal DATA-->
<div class="modal fade" id="myModalTV2" role="dialog" style="padding-left:999px;">
<div class="modal-dialog modal-lg" style="display: inline-block;padding-right:1800px">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1655px">
    <div class="modal-header">
      <h4 class="modal-title">TV Details 2</h4>
    </div>
    <div class="modal-body">
 <!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src='images/loader.gif' width='32px' height='32px'>
</div>

<!-- Image loader -->
<div  id="response" class=' display-4 alert'></div>
      <table id="tvTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    			<th>TV ID</th>
				<th>Room</th>
				<th>Brand</th>  
				<th>Specify Other Brand</th> 
				<th>Model Number</th>
				<th>Screen Type</th>
				<th>HD Enabled</th>
				<th>TV METER</th>
				<th>SIM</th>
				<th>Sensor</th>
				<th>Power socket</th>
				<th>Optical Adapter</th>
				<th>Audion Relay</th>
				<th>Scart Adapter</th>
				<th>Extension USB</th>
				<th>Jack to Jack</th>
				<th>Mutliple outlet</th>
				<th>Other kit</th>
				<th>Comments</th>
				<th>Status</th>
				 
				 
				
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>
 
  <!-- TV Receiver-->
<div class="modal fade" id="myModalTVReceiver" role="dialog" >
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 855px">
    <div class="modal-header">
      <h4 class="modal-title">TV Receivers</h4>
    </div>
    <div class="modal-body">
 <!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src='images/loader.gif' width='32px' height='32px'>
</div>

<!-- Image loader -->
<div  id="response" class=' display-4 alert'></div>
      <table id="tvTableReceiver" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    			<th>TV ID</th>
				<th>Room</th>
				<th>TV METER</th>
				<th>SIM</th>
				<th>receiver</th>
				<th>satellite</th>
            </tr>
            </thead>
          <tbody>
            
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div>
 
  <!-- TV METER GRAPH Modal -->
 <div class="modal fade" id="myModalChart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="chart" id="chart-container"></div>
      </div>
      <div class="modal-footer">
        <div id='png'></div>
      </div>
    </div>
  </div>
</div>


  
 <!-- Contacts Modal -->
<div class="modal fade" id="myModal1" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
 
    <div class="modal-body">
   <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
               
            <div id="chatDiv" class="panel" id="collapseOne">
                <div class="panel-body">
                     
                </div>
            </div>
            </div>
        </div>
    </div>     
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
    </div>
  </div>
  </div>
</div> 
 
<footer class="footer fixed-bottom container" align="center">
        <hr>
        <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>
</body>
</html>
 