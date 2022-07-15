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





<?php
$recipientEmail = "Enter Recipient Email Here!";
$emailSubject = "PHP Mailing Function";
$emailContext = "Sending content using PHP mail function";

$emailHeaders = "Cc: ghenoie@gmail.com" . "\r\n";
$emailHeaders .= "Bcc:ghenoie@gmail.com" . "\r\n";

$fromAddress = "-ghenoie@gmail.com";
$emailStatus = mail($recipientEmail, $emailSubject, $emailContext, $emailHeaders, $fromAddress);
if($emailStatus) {
echo "EMail Sent Successfully!";
} else {
echo "No Email is sent";
}
?>





<?php







// $url = "http://192.168.108.29:8000/admin/devices";
// echo $url ;
// //  Initiate curl
// $ch = curl_init();
// // Will return the response, if false it print the response
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// // Set the url
// curl_setopt($ch, CURLOPT_URL,$url);
// // Execute
// $result=curl_exec($ch);
// // Closing
// curl_close($ch);

// // Will dump a beauty json :3
// var_dump(json_decode($result, true));

// $result = file_get_contents($url);
// echo $result;
// // Will dump a beauty json :3
// var_dump(json_decode($result, true));

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

	 getTVMeters();
	 getStatus();
	 getTaskStatus();
	 getContactStatuses();
	 getUsers();
	// buildGrid();
 

	 $(".table-responsive").find("table").find("tbody tr").each(function(){
	     var self=$(this);
	     var col_1_value = self.find("td:eq(0)").text().trim();
         var col_2_value = self.find("td:eq(1)").text().trim();
    
             $.ajax({
                 type: "POST",
                 url: "getServices.php",
                 data:   "name=" + col_1_value + "&telephone=" + col_2_value+ "&lastname="+ col_1_value+"&action=insertOgero" ,
                 dataType: 'JSON' ,
                 success: function (html) {   }     
                  
    		        }); // end insert  
              console.log(col_1_value + '------------------ ' + col_2_value );
	 	});

	 	
	 }
);



var cors_api_url = 'https://cors-anywhere.herokuapp.com/';
function doCORSRequest(options, printResult) {
  var x = new XMLHttpRequest();
  options.url = "http://192.168.108.29:8000/admin/devices";
  x.open(options.method, cors_api_url + options.url);
  x.onload = x.onerror = function() {alert("here");
    printResult(
      options.method + ' ' + options.url + '\n' +
      x.status + ' ' + x.statusText + '\n\n' +
      (x.responseText || '')
    );
  };
  if (/^POST/i.test(options.method)) {
    x.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  }
 // x.send(options.data);
}

// Bind event
 
//   var urlField = document.getElementById('url');
//   var dataField = document.getElementById('data');
//   var outputField = document.getElementById('output');
 

 
 




 

 function getTVMeters() { 

	    doCORSRequest({
	        //method: this.id === 'post' ? 'POST' : 'GET',
	      		  method: 'GET',
	        url:  "http://192.168.108.29:8000/admin/devices",
	        data: ""
	      }, function printResult(result) {
	        console.log (result);
	      });
	   

 }




//     $.ajax({
//         type: "POST",
//         url: "https://cors-anywhere.herokuapp.com/http://192.168.108.29:8000/admin/devices",
      
       
//         dataType: "html",   
//         //async: "false",
//         success: function (data) { alert("done"); //console.log('directory start!'+ " FirstName="+alphabet[x]+"&FatherName=&LastName="+zLastName);
//       //  sleep(Math.floor(17000 - Math.random()*(17000-5000)));
//        }
     
//     }  

//     ) .done( function( data ) { alert("doddddddddne");
        
// 		/*	$("#message").html(data);
        
//         $("#message").find(".DirectoryResultsContainer").find("table").find("tbody tr").each(function(){
//     	     var self=$(this);
//     	     var col_1_value = self.find("td:eq(0)").text().trim();
//              var col_2_value = self.find("td:eq(1)").text().trim();
        
//                  $.ajax({
//                      type: "POST",
//                      url: "getServices.php",
//                      data:   "name=" + col_1_value + "&telephone=" + col_2_value+ "&lastname="+ col_1_value+"&action=insertOgero" ,
//                      dataType: 'JSON' ,
//                      success: function (html) {   }     
                      
//         		        }); // end insert  
//                   console.log(col_1_value + '------------------ ' + col_2_value );
//     	 	}); // end success 
// 	 	*/
//     } );
  
// alert ("fiomo");
// 	}

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
 
		<div class="well well-sm">Contacts</div>  
 
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
									 <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Search by Telephone 9123123">
								 </div>
						  </div>
						 <div class="col-sm-1">
                                <span style='font-weight:bold;background-color:black'>OR</span>
						  </div>	
						  <div class="col-md-4">
                               <div class="form-group ">
									 <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Search by Mobile Number 03xxxxxxx">
								 </div>
						   </div>	 
								 
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
		var taskStatusId =$("#taskStatus-list").val();
		var contactStatusId=$("#contactStatus-list").val();
 		var searchDate=$("#searchDate").val();
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
        	"rowCallback": function( row, data, index ) {

        		   if (data[9]  != null &&  data[9].toUpperCase().includes("5+ TIMES")  ) 
                   { 
                       $('td', row).css('background-color', '#0008ff66');
                   }
            	 
                if (( data[10] != null &&  data[10].toUpperCase().includes("CORONA") )|| ( data[3] != null &&   data[3].toUpperCase().includes("CORONA"))) 
                { 
                    $('td', row).css('background-color', '#fe6b6b');
                }
                else if (( data[10] != null &&  data[10].toUpperCase().includes("ACCEPT FOR LATER") ) ||  data[3].toUpperCase().includes("ACCEPT FOR LATER")) 
                     { 
                         $('td', row).css('background-color', '#ef82c8');
                     }
               if (data[0] == 5 && ( data[10] != null &&  data[10].toUpperCase().includes("GIFT") ) ) 
                { 
                    $('td', row).css('background-color', '#6bfece');
                }

               if (data[4] == 1794 ) 
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
            "ajax": {
                url: "getServices.php", // json datasource
                data: {action: 'getTasks',mohafazaId : mohafazaId, qadaaId : qadaaId, regionId : regionId, statusId : statusId,taskStatusId : taskStatusId,contactStatusId: contactStatusId, userId: userId, telephone:telephone, searchDate:searchDate},
                type: 'post',  // method  , by default get
            },
            error: function () {  // error handling
                $(".quota-grid-error").html("");
                $("#quota-grid").append('<tbody class="quota-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#quota-grid_processing").css("display", "none");
            },
		       "columnDefs": [ {
			   "targets": 13,
			   "render": function ( data, type, full, meta ) {
				   
				  var zlink ="";
				  var taskStatusId =$("#taskStatus-list").val(); 
				  
				  if (/*taskStatusId == 1*/1 == 1)
				  {
    				   if (userRole == 1   )
    				   {
      					   zlink +=  '<button  class="btn btn-danger pl-4 pr-4" id="close" onclick="closeTaskFn('+full[4]+',' + full[0]+ ')">Close Task</button>';
      					 
      					 
    				   }
    				   if (full[0] == 7 || full[0] == 8 || full[0] == 10 || full[0] == 11 || full[0] == 12  || full[0] == 5 )  // Welcome call or Rotation Priority or Maintenance or Dismantling or Incentive Call
    				   {
    					   zlink +=  '<br/><button   class="btn btn-warning  pl-4 pr-4" id="Filter" onclick="goToWelcome('+full[0]+',' + full[4]+ ',' + full[4]+ ')">Contact OUT</button>';
    					   if ( full[0] == 10 || full[0] == 11 || full[0] == 12)
    					   { 
    						   var today = new Date();
        					   if (Date.parse(full[12]) <= Date.parse(today)+100000000)
        					   { //console.log("yes");
    	       					   	zlink +=  '<br/><button   class="btn btn-success  pl-4 pr-4" id="Filter" onclick=" reviewOrder('+full[0]+',' + full[4]+ ',' + full[4]+ ')">Set Order Status</button>';
        					   }
    					   }
    					   
    				   }

    			         if (full[9]  != null &&  full[9].toUpperCase().includes("5+ TIMES")  ) 
    		               { 
    			        	//  zlink  =  '<button  class="btn btn-danger pl-4 pr-4" id="close" onclick="closeTaskFn('+full[4]+',' + full[0]+ ')">Close Task</button>';
    		               }
    		               

				  }
				   else //
				   {
					  //zlink =  '<button   class="btn btn-warning  pl-5 pr-5" id="Filter" onclick="goToTasks('+data+',' + full[4]+ ',' + full[9]+ ')">Tasks</button>';
				   }

				   return zlink;
				}
			}]

        });

}
 
//on Grid link click
 function closeTaskFn(hhId,taskTypeId)
 {
//alert ('taskId='+id+'&statusId='+ status);
     
     $.ajax({
         type: "POST",
         url: "getServices.php",
         data: encodeURI('hhId='+hhId+'&taskTypeId='+ taskTypeId+'&action=closeTask'),
         dataType: 'JSON' ,
         success: function (html) { // alert (JSON.stringify(html));
             $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Task Closed</div>");
              window.location.href = 'taskGrid.php';
                
         }//,
//          error: function(xhr, status, error) {
//          	  //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+JSON.stringify(xhr.responseText)+"</div>");
               
//          	}
        
     });
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
        <table id="quota-grid" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Task Type</th>
				<th>Task Date</th>
				<th>Task Comments</th>
				<th>HH Id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Region</th>
                <th>full_address</th>
                <th>Latest Contact Status</th>
				<th>Latest Contact Comments</th>
				<th>User</th>
				<th>Visit Time</th>  
				<th>Link</th>
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

<br/>
<br/>
<br/>
<br/>

<footer class="footer fixed-bottom container" align="center">
        <hr>
        <span>Copyright &copy;StatLeb <?php echo date("Y");?></span>
</footer>
</body>
</html>
