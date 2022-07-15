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


// 	  $(".modal").on("hidden.bs.modal", function() {
// // 		    $(".modal-body").html("Where did he go?!?!?!");
// 		  $(this).removeData();
// 		  });
	  
	 
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

				   if (full[0] == 7 || full[0] == 8 || full[0] == 10 || full[0] == 11 || full[0] == 12  || full[0] == 5 || full[0] == 4  || full[0] ==  13)  // Welcome call or Rotation Priority or Maintenance or Dismantling or Incentive Call
				   {
					   if (full[14]  != null && !( full[0] == 8 || full[0] ==  10  || full[0] ==  13)) 
					   { 
						   zlink +=  '<button  disabled class="btn btn-warning col-md-12" id="Filter" onclick=""><span class="fa fa-phone"></span> Contact OUT</button> <div class="clearfix"  ></div> <br>';
					   }
					   else
					   {
						   zlink +=  '<button   class="btn btn-warning col-md-12" id="Filter" onclick="goToWelcome('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-phone"></span> Contact OUT</button> <div class="clearfix"  ></div> <br>';

    				   }
					   if ( full[0] == 10 || full[0] == 11 || full[0] == 12 || full[0] == 4)
					   { 
						   var today = new Date();
    					   if (Date.parse(full[12]) <= Date.parse(today)+100000000)
    					   { //console.log("yes");
	       					   	zlink +=  '<button   class="btn btn-success col-md-12" id="Filter" onclick=" reviewOrder('+full[0]+',' + full[4]+ ',' + full[4]+ ')"><span class="fa fa-phone"></span> Set Order Status</button> <div class="clearfix"  ></div> <br>';
    					   }
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
    		               
						

						 if (userRole == 1   )
		    			  {
							 zlink+="<tr>";
							 zlink +=  '<td style="width:50%"><div><button  class="btn btn-danger col-md-12" id="close" onclick="closeTaskFn('+full[4]+',' + full[0]+ ')"><span class="fa fa-times-circle"></span>  Close Task</button></div> </td>';
		      				 zlink +=  '<td style="width:50%"><div><button type="button" class="btn btn-success col-md-12" data-toggle="modal" onclick="getTVMeters('+full[0]+',' + full[4]+ ',' + full[4]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-television"></span> TV Meters</button></div> </td>';
		      				 zlink+="</tr>";



	

							
		      				 zlink+="<tr>";
							 zlink +=  '<td style="width:50%"><div><button  class="btn btn-danger col-md-12" id="close" onclick="closeTechOrderFn('+full[4]+',' + full[0]+ ')"><span class="fa fa-times-circle"></span>  Close Technician Order</button></div> </td>';
		      				 zlink +=  '<td style="width:50%"><div><button type="button" class="btn btn-success col-md-12" data-toggle="modal" onclick="showGraph('+full[4]+',' + full[0]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-television"></span> Set Distance/ Impacted TV Show</button></div> </td>';
		      				 zlink+="</tr>"

			      				 
		      				 
		      				 zlink+="<tr>";
		      				// Move HH to production
							 if (  ( full[16] == 4 || full[16] == 5 )  )
							 {
		      				     zlink += '<td><div><button type="button" class="btn btn-danger col-md-12" data-toggle="modal" onclick="moveHHtoProduction('+full[4]+',' + full[0]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-play"></span> Set HH Production</button></div></td>';
		     				 }	

							// Set HH inactive
							 if (  full[16] == 6   )
							 {
		      				     zlink += '<td><div><button type="button" class="btn btn-warning col-md-12" data-toggle="modal" onclick="moveHHtoInactive('+full[4]+',' + full[0]+ ')" data-target=".bs-example-modal-lg"><span class="fa fa-close"></span> Set HH Inactive </button></div></td>';
							 }

							 // Incentive Calls								 
		      				 if (full[0] == 5 )
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

}


 function testing(tvMeterId)
 {


	 $(".modal-body div span").text("");
     $(".username span").text("TEST");
     
		var myDate = new Date();
		var myEpoch = myDate.getTime()/1000;
		var exists=null;
		myEpoch = 1604361540; //  Math.round(myEpoch);
		console.log(myEpoch);
		myEpochStart= 1604275200; // (myEpoch-100000);
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

		  	// $("#myModalGraph").modal("show");

		  	 }




 google.charts.load("current", {
	  packages: ['corechart']
	});
	google.charts.setOnLoadCallback(zdrawChart);

	function zdrawChart() {
	  var data = google.visualization.arrayToDataTable([
	    ['Name', 'Age', {
	      role: 'style'
	    }],
	    ['Kaleb', 1, 'cyan', ],
	    ['Dakota', 1, 'orange', ],
	    ['Jaden', 4, 'yellow'],
	    ['Kayla', 25, 'pink'],
	    ['Thomas', 28, 'lime']
	  ]);

	  var options = {
	    bar: {
	      groupWidth: '80%'
	    },
	    height: '300',
	    legend: 'none',
	    width: '550',
	  };

	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

	  if (navigator.userAgent.match(/Trident\/7\./)) {
	    google.visualization.events.addListener(chart, 'click', function() {
	      chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
	      console.log(chart_div.innerHTML);
	    });
	    chart.draw(data, options);
	  } else {
	    google.visualization.events.addListener(chart, 'select png', function() {
	      chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
	      console.log(chart_div.innerHTML);
	    });
	    chart.draw(data, options);
	    document.getElementById('png').innerHTML = '<a href="' + chart.getImageURI() + '" target="_blank"><span class="glyphicon glyphicon-print"></span></a>';
	  }
	}


function showGraph(tvMeterId)
{ //myModalGraph
	
 	 $("#line-example").html("");
$(".username span").text("TEST");

lineChart(tvMeterId);
 

 

// $.get('main.php',
//         {Productnum: 'XXXXXX', 
//     	MODEL: 'Product Name'},
//         function(content) {
//               $('#dialogs').html(content).dialog('open');
//         });




//s$("#graphDiv div").html("<h4>testtt</h4>");
 

$("#myModalGraph").modal("show");





}


/*Line chart*/
function lineChart(tvMeterId) {
		 var myDate = new Date();
	var myEpoch = myDate.getTime()/1000;
	var exists=null;
	myEpoch =  1604361540; // Math.round(myEpoch);
	 
	var myEpochStart=1604275200;  //(myEpoch-50000);//50000
	console.log(myEpochStart);
	console.log(myEpoch);
	var date = new Date(myEpochStart * 1000);
	console.log(date);
	var enddate = new Date(myEpoch * 1000);
	console.log("http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch);
	//var tvMeterId='laqgsq2p-1333';
	 $.ajax({
		 url:"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch ,
	        dataType: 'JSON',
	        type: 'POST',
	        data: {get_values: true},
	        success: function(response) { console.log ("done");
	        console.log(response);
	            Morris.Bar({
	                element: 'line-example',
	                data:response,
	                xkey: 'source',
	                redraw: true,
	                ykeys: ['time'],
	                hideHover: 'auto',
	                labels: ['Time'],
	                lineColors: ['#B4C1D7']
	            });
	        }
	    });
	 
	
//    window.lineChart = Morris.Line({
//        element: 'line-example',
//        data: [
//            { y: '1982', a: 1000, b: 90 },
//            { y: '2007', a: 75, b: 65 },
//            { y: '2008', a: 50, b: 40 },
//            { y: '2009', a: 75, b: 65 },
//            { y: '2010', a: 50, b: 40 },
//            { y: '2011', a: 75, b: 65 },
//            { y: '2012', a: 100, b: 90 }
//        ],
//        xkey: 'y',
//        redraw: true,
//        ykeys: ['a', 'b'],
//        hideHover: 'auto',
//        labels: ['Series A', 'Series B'],
//        lineColors: ['#B4C1D7', '#FF9F55']
//    });
}

	
 function checkTVMeter(tvMeterId) {

// // 	 google.charts.load('current', {'packages':['line']});
// //     google.charts.setOnLoadCallback(drawChartWeighted); // (testing(tvMeterId));
// 	 drawChart();

	 var myDate = new Date();
		var myEpoch = 1604361540; // myDate.getTime()/1000;
		var exists=null;
		myEpoch = Math.round(myEpoch);
		console.log(myEpoch);
		myEpochStart= 1604275200; // (myEpoch-100000);
		console.log(myEpochStart);

				// setTimeout(function(){ alert("Hello"); }, 3000);
			 $.ajax({
					type: "POST",
					  dataType: "json",
					  async: true,
					  url:"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch ,
	     			  success: function(data){
					  console.log ("get tv meter " +"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+tvMeterId +"&from="+myEpochStart+"&to="+ myEpoch );
			    
			          $.each(data, function (index, value ) {  
			      		if(value.source  != 'NO_DATA' /*&& value.source != 'SILENCE'*/)
			      		{
			      			exists = 'valid';
			      			//console.log ("VALID............"+ tvMeterId + ":" +value.source  );
			      			alert (tvMeterId + " is working normally for the DATE 2/11/2020");
			      			return false; // 
			      		}
			      		else
			      		{
			      			 console.log (tvMeterId + ":" +value.source  );
				      	}
			      	   });  
			          	
						 
						 
					 //  $("#graphDiv div").html("<h4> test</h4>");
						}
					});

	

	  		if (exists != 'valid')
	  		{

	  			alert (tvMeterId + "is NOT working!!!!");
		  	}

    

		}
 
 function getTVMeters(taskTypeId,HHId, HHId) {
		
		var myDate = new Date();
		var myEpoch = 1604361540; // myDate.getTime()/1000;
		myEpoch = Math.round(myEpoch);
		console.log(myEpoch);
		myEpochStart= 1604275200;// (myEpoch-100000);
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
			for(i =0 ; i <dataa.length; i++)
			{
				console.log(dataa[i]);
				var xx = dataa[i];
				// setTimeout(function(){ alert("Hello"); }, 3000);
			 $.ajax({
					type: "POST",
					  dataType: "json",
					  async: true,
					  url:"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+xx +"&from="+myEpochStart+"&to="+ myEpoch ,
	     			  success: function(data){
					  console.log ("get tv meter " +"http://tam.statleb.com:7070/reports/DeviceMatchHistory?device="+xx +"&from="+myEpochStart+"&to="+ myEpoch );
			    
			          $.each(data, function (index, value ) {  
			      		if(value.source  != 'NO_DATA' && value.source != 'SILENCE')
			      		{
			      			exists = 'valid';
			      			console.log ("VALID........for the DATE 2/11/2020...."+ xx + ":" +value.source  );
			      			return false; // 
			      		}
			      		else
			      		{
			      			console.log (xx + ":" +value.source  );
				      	}
			      	   });  
			          	
						
						}
					});

			  
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

 
 function viewDetails(taskTypeId,HHId, HHId)
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
         data: encodeURI('hhId='+HHId+'&action=getHHDetails'),
         dataType: 'JSON' ,
         success: function (response) { // alert (JSON.stringify(html));
            // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
             $(".username span").text(response);
            
             //  window.location.href = 'taskGrid.php';
             var len = response.length;
             var tr_str="";
             
             for(var i=0; i<len; i++){
                // var id = response[i].id;
                 var firstname = response[i].firstname;
                 var lastname = response[i].lastname;
                 var relation = response[i].relation;
                 var gender = response[i].gender;
                 
                 var age = response[i].age;
                 var occupation = response[i].occupation;
                 var education = response[i].education;
                 var headofFamily = response[i].headofFamily;
                 var decisionMaker = response[i].decisionMaker;
                 var comments = response[i].comments;
 
                 
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                     "<td align='center'>" + firstname + " " +  lastname + "</td>" +
                     "<td align='center'>" + relation + "</td>" +
                     "<td align='center'>" + gender + "</td>" +
                     "<td align='center'>" + age + "</td>" +
                     "<td align='center'>" + occupation + "</td>" +
                     "<td align='center'>" + education + "</td>" +
                     "<td align='center'>" + headofFamily + "</td>" +
                     "<td align='center'>" + decisionMaker + "</td>" +
                     "<td align='center'>" + comments + "</td>" +
                    
                     "</tr>";

                // $("#modalTable tbody").append(tr_str);
                 $("#modalTable tbody").html(tr_str);
                 $("#recruitingHH").html("<p class='card-text'>"+ response[i].recruiting_id+"</p> ");
                 $("#religionH").html("<p class='card-text'>"+ response[i].religion+"</p> ");
                 $("#socialClassH").html("<p class='card-text'>"+ response[i].socialClass+"</p> ");
                 $("#houseSizeH").html("<p class='card-text'>"+ response[i].houseSize+"</p> ");
                 console.log(response[i].houseSize);
             }
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
     
	 
	 $("#myModal").modal("show");
	

	 }

 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});


 function viewTechVisits(HHId, taskTypeId)
 { 
 
     $(".modal-body div span").text("");
 
//      $(".position span").text(table.row(this).data()[1]);
//      $(".office span").text(table.row(this).data()[2]);
//      $(".age span").text(table.row(this).data()[3]);
//      $(".date span").text(table.row(this).data()[4]);

     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+HHId+'&action=viewTechVisits'),
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
                 var problem = response[i].problem;
                 var techName = response[i].techName;
                 var date_of_visit = response[i].date_of_visit;
                 var distance = response[i].distance;
                 var impacted_tvsets = response[i].impacted_tvsets;
                 
                 var remarks = response[i].remarks;
 
 
                 
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                   
                     "<td align='center'>" + problem + "</td>" +
                     "<td align='center'>" + techName + "</td>" +
                     "<td align='center'>" + date_of_visit + "</td>" ;


					 if(distance == -1) 
					 {                    
                     tr_str +=  "<td style='background-color:#f2dede' align='center'>" + distance + "</td>" +
                     "<td style='background-color:#f2dede' align='center'>" + impacted_tvsets + "</td>";
					 }
					 else
					 {
						 tr_str +=  "<td align='center'>" + distance + "</td>" +
	                     "<td align='center'>" + impacted_tvsets + "</td>";

						 }


                     tr_str += "<td align='center'>" + remarks + "</td>" + 
                    
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
 
                 
 				 tr_str += "<tr>" +
                     "<td align='center'>" + (i+1) + "</td>" +
                   
                     "<td align='center'>" + techType + "</td>" +
                     "<td align='center'>" + orderNb + "</td>" +
                     "<td align='center'>" + comments + "</td>" +
                     "<td align='center'>" + opened + "</td>" +
                     "<td align='center'>" + closed + "</td>" +
                     "<td align='center'>" + household_id + "</td>" +  
                    
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
 function viewTVDetails(taskTypeId,HHId, HHId)
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
                 var strTvm_serial = "showGraph('"+tvm_serial+"')";
                
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
                    "<td align='center'><button type='button' class='btn btn-primary' data-toggle='modal' onclick= "+ strTvm_serial+" data-target='.bs-example-modal-lg'><span class='fa fa-check'></span></button></td>"  +
                    
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
  
    var r = confirm("Are you sure you want to create an Incentive Delivery Task (Round 1) ?");
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
 
      <table id="modalTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
 
        
				<th>#</th>
				<th>Issue</th>  
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


<div class="modal fade" id="myModalGraph" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
  		<h4 class="modal-title">HouseHold Details</h4>
       

                    
                    
       </div>
    
    <div class="modal-body">
    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
               
            <div id="graphDiv" class="panel" id="collapseOne">
                <div class="panel-body">
                     
                     <div class="pcoded-content"><!-- pcoded-content -->
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
         

                                    <div class="page-body">
                                        <div class="row">
       
                      
                                 
                                            <!-- LINE CHART start -->
                                            <div class="col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="line-example"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector">

                            </div>
                        </div>
      
    </div>
                     
                     
                     
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
 
      <table id="modalTable" class="table table-striped table-bordered " style="width:100%;">
           <thead>
            <tr>
    
				<th>#</th>
				<th>Name</th>  
				<th>Relation</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Occupation</th>
				<th>Education</th>
				<th>Head of Family</th>
				<th>Decision Maker</th>
				<th>Occupation Details</th>
				 
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
<div class="modal fade" id="myModalTV" role="dialog" style="padding-top: 150px;padding-right: 200px;">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content"  style="width: 1150px">
    <div class="modal-header">
      <h4 class="modal-title">TV Details</h4>
    </div>
    <div class="modal-body">
 
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
				<th>Check</th>
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
        <div class="chart" id="chart_div"></div>
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
        <p style="">&copy; 2020 All Rights Reserved</p>
</footer>
</body>
 
<!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->





<!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
<!--   <script src="js/demo/chart-area-demo.js"></script> -->
   
   
   <!-- Required Jquery -->
<!-- <script type="text/javascript" src="ds/assets/js/jquery/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="ds/assets/js/jquery-ui/jquery-ui.min.js"></script> -->
<!-- <script type="text/javascript" src="ds/assets/js/popper.js/popper.min.js"></script> -->
<!-- <script type="text/javascript" src="ds/assets/js/bootstrap/js/bootstrap.min.js"></script> -->
<!-- jquery slimscroll js -->
<script type="text/javascript" src="ds/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="ds/assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="ds/assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="ds/assets/js/classie/classie.js"></script>
<!-- Morris Chart js -->
<script src="ds/assets/js/raphael/raphael.min.js"></script>
<script src="ds/assets/js/morris.js/morris.js"></script>
<!-- Custom js -->
<!-- <script src="ds/assets/pages/chart/morris/morris-custom-chart.js"></script> -->
<script type="text/javascript" src="ds/assets/js/script.js"></script>
<script src="ds/assets/js/pcoded.min.js"></script>
<script src="ds/assets/js/demo-12.js"></script>
<script src="ds/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</html>
 