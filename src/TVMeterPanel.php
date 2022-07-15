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
 
<script>

 

 
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
 <div class="well well-sm">Geographic Report</div> 
 
 
  
  </div>

    
 <div class="col-sm-12 col-offset-0 ">
	 
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
	var ratioId = $("#ratio-list").val(); 
	var userId = $("#user-list").val(); 
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
                 "filename": "Geographic Panel Excel",
                 "className": "btn btn-warning",
                 "charset": "utf-8",
                 "bom": "true",
                 "title":"Geographic Panel",
                 init: function(api, node, config) {
                     $(node).removeClass("btn-default");
                 }
             } ),
             $.extend( true, {}, buttonCommon, {
            	 footer: true,
                 extend: 'pdfHtml5',
                	 
                     "text": "Export as PDF",
                     "filename": "Geographic Panel PDF",
                     "className": "btn btn-warning",
                     "charset": "utf-8",
                      "bom": "true",
                     "title":"Geographic Panel",
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
                        	 doc.content[1].table.body[i][0].text = doc.content[1].table.body[i][0].text.split(' ').reverse().join('  ');
                        	 doc.content[1].table.body[i][0].alignment = 'right';
                        	 doc.content[1].table.body[i][1].text = doc.content[1].table.body[i][1].text.split(' ').reverse().join('  ');
                        	 doc.content[1].table.body[i][1].alignment = 'right';
                             doc.content[1].table.body[i][2].text = doc.content[1].table.body[i][2].text.split(' ').reverse().join('  ');
                             doc.content[1].table.body[i][2].alignment = 'right';
                             doc.content[1].table.body[i][3].alignment = 'right';
                             doc.content[1].table.body[i][4].alignment = 'right';
                             doc.content[1].table.body[i][5].alignment = 'right';
                             doc.content[1].table.body[i][6].alignment = 'right';
                             doc.content[1].table.body[i][7].alignment = 'right';
                             doc.content[1].table.body[i][8].alignment = 'right';
                             doc.content[1].table.body[i][9].alignment = 'right';
                             doc.content[1].table.body[i][10].alignment = 'right';
                             doc.content[1].table.body[i][11].alignment = 'right';
                             doc.content[1].table.body[i][12].alignment = 'right';
      
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
 						var logo = 'data:image/jpeg;base64,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';

 						
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
 										width: 24
 									},
 									{
 										alignment: 'left',
 										italics: false,
 										text: 'StatLeb',
 										fontSize: 18,
 										margin: [10,0]
 									},
 									{
 										alignment: 'right',
 										fontSize: 14,
 										italics: true,
 										text: 'Geographic Panel Report'
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
            var totalQuota = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    var openQuota = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var quotaPercent = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

  	     var totalPanel = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

	     var panelSuccess = api
         .column( 7 )
         .data()
         .reduce( function (a, b) {
             return intVal(a) + intVal(b);
         }, 0 );
    
	     var lostCalls = api
         .column( 9 )
         .data()
         .reduce( function (a, b) {
             return intVal(a) + intVal(b);
         }, 0 );

	     var potentialCalls = api
         .column( 10 )
         .data()
         .reduce( function (a, b) {
             return intVal(a) + intVal(b);
         }, 0 );
	     
	     var noAnswerCalls = api
         .column( 11 )
         .data()
         .reduce( function (a, b) {
             return intVal(a) + intVal(b);
         }, 0 );

	     var notCalledCalls = api
         .column( 12 )
         .data()
         .reduce( function (a, b) {
             return intVal(a) + intVal(b);  
         }, 0 );

	     var numFormat = $.fn.dataTable.render.number( '\,', '.', 0 ).display;
	     var percentFormat = $.fn.dataTable.render.number( '\,', '.', 2 , '% ' ).display;
		// Update footer by showing the total with the reference of the column index .
	      $( api.column( 2 ).footer() ).html('Total');
	   	  $( api.column( 3 ).footer() ).html(numFormat(totalQuota));
	   	 
          $( api.column( 4 ).footer() ).html(numFormat(openQuota));
          $( api.column( 5 ).footer() ).html(percentFormat(((parseInt(openQuota)/parseInt(totalPanel)*100).toFixed(2))));
         
          $( api.column( 6 ).footer() ).html(numFormat(totalPanel));
          $( api.column( 7 ).footer() ).html(numFormat(panelSuccess));
          $( api.column( 8 ).footer() ).html(percentFormat((parseInt(panelSuccess)/parseInt(totalPanel)*100).toFixed(2)));

          $( api.column( 9 ).footer() ).html(numFormat(lostCalls));
          $( api.column( 10 ).footer() ).html(numFormat(potentialCalls));
          $( api.column( 11 ).footer() ).html(numFormat(noAnswerCalls));
          $( api.column( 12 ).footer() ).html(numFormat(notCalledCalls));
     
            
        },
    	"destroy": true, //use for reinitialize datatable
		"searching":false,
		"pageLength": 100,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "getServices.php", 
            data: {action: 'getTVMeterData',mohafazaId : mohafazaId, qadaaId : qadaaId, regionId : regionId, statusId : statusId , ratioId : ratioId, userId: userId, searchDate:searchDate},
            type: 'post',  
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
