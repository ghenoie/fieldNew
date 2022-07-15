

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
		 		  var $el = $("#user-list");
		            $el.empty();  
		            $el.append($("<option></option>")
		                    .attr("value", '999').text('All users'));
		            $el.append(json);  
				}
			});
		}
       
function drawChart() {

	    
    var data2 = new google.visualization.DataTable();
    
    data2.addColumn('date','Hours');
    
    // tooltip column
    
    data2.addColumn({type: 'string', role: 'annotation'});
    data2.addColumn('number','lbc'); // blue
    data2.addColumn('number','mtv'); // red
    data2.addColumn('number', 'aljadeed');//gray
    data2.addColumn('number', 'manar'); //yellow
    data2.addColumn('number','teleliban');//blue
    data2.addColumn('number', 'otv');//orange
    data2.addColumn('number', 'nbn');//brown
  
//    data2.addColumn('number','mbcdrama'); // green
//    data2.addColumn('number', 'mbc1');//ROSE.
     data2.addColumn('number', 'mbc4');//turquoise.
 
    
 

    $.ajax({
        url:  "../10December2020.json", //"http://tam.statleb.com:7070/reports/RawFullDayRating?yyyy=2020&mm=05&dd=28", //
        dataType: "json", 
        type: "GET",
        contentType: "application/json; charset=utf-8",
        success: function (data) {
      	  var arrSales = [[]] ;
    $.each(data.records, function (index, value ) { 

		var date = new Date(value.time * 1000);
		//console.log(" date:" +  date + " hours:"  +date.getHours());
		
		var day= date.getUTCDate();

		
		// Hours part from the timestamp
		var hours = date.getHours();
	 
		// Minutes part from the timestamp
		var minutes = "0" + date.getMinutes();
		// Seconds part from the timestamp
		var seconds = "0" + date.getSeconds();
		// Will display time in 10:30:23 format
		var formattedTime = hours + ':' + minutes.substr(-2)  ;
		 //console.log(formattedTime);
//		
//		if(hours <3)
//		{
//       data1.addRows([[
//				date
//				,value.sources.lbc*100
//			    ,value.sources.mtv*100
//			    ,value.sources.aljadeed*100
//			    ,value.sources.manar*100
//				,value.sources.teleliban*100
//			    ,value.sources.otv*100
//			    ,value.sources.nbn*100
////			    ,value.sources.mbcdrama*100
////			    ,value.sources.mbc1*100
////			    ,value.sources.mbc4*100
// 
//			    
//
//		       ]
//	       ]);
//		}
//		
	if(hours >= 18)
		{console.log(value.time);
		
//		console.log(day + '... hours:' + hours);
//		if ( (hours >= 3 && day == 21) ||  ( day == 27))
//		{
       data2.addRows([[
				date ,'yyyy'
				,value.sources.lbc*100
			    ,value.sources.mtv*100
			    ,value.sources.aljadeed*100
			    ,value.sources.manar*100
				,value.sources.teleliban*100
			    ,value.sources.otv*100
			    ,value.sources.nbn*100
//			    ,value.sources.mbcdrama*100
//			    ,value.sources.mbc1*100
 		    ,value.sources.mbc4*100
 
			    

		       ]
	       ]);
 		}
				 
    });
    
 
    var options = {
    		 //enableInteractivity: false,
  		  curveType: 'function',
  		  // Allow multiple
  		  // simultaneous selections.
  		  selectionMode: 'multiple',
  		  // Trigger tooltips
  		  // on selections.
  		  tooltip: {trigger: 'selection'},
  		  // Group selections
  		  // by x-value.
  		  aggregationTarget: 'category',
      chart: {
        title: 'Thursday Peak',
        subtitle: '10 December 2020'
      },
      colors:['blue','red','gray','#e6e600','#00ccff','orange','brown','black'],
      width: 1800,// 4500,
      height: 500,
      axes: {
        x: {
          0: {side: 'bottom'}
        }
      }, tooltip: {isHtml: true}
      
      
    };
    
    
 

    
    var chart = new google.charts.Line(document.getElementById('line_top_x'));
 
 
//    		google.visualization.events.addListener(chart, 'ready', function(e) {
//    		  var selected_rows = [];
//    		  for (var i = 0; i < 2 - 1; i++) {
//    		    selected_rows.push({row: i, column: null});
//    		  }
//    		  chart.setSelection(selected_rows);
//    		  console.log(selected_rows);
//    		});
    
    
 
     chart.draw(data2, google.charts.Line.convertOptions(options));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert('Got an Errorrr');
    }
}); 
}


function drawChartWeighted() {

    
    var data2 = new google.visualization.DataTable();
    
    data2.addColumn('date','Hours');
    
    // tooltip column
    data2.addColumn({type: 'string', role: 'annotation'});
    data2.addColumn('number','lbc'); // blue
    data2.addColumn('number','mtv'); // red
    data2.addColumn('number', 'aljadeed');//gray
    data2.addColumn('number', 'manar'); //yellow
    data2.addColumn('number','teleliban');//blue
    data2.addColumn('number', 'otv');//orange
    data2.addColumn('number', 'nbn');//brown
    
	console.log(" hiiiii");

    $.ajax({
        url:  "../8January2021.json", //"http://tam.statleb.com:7070/reports/RawFullDayRating?yyyy=2020&mm=05&dd=28", //
        dataType: "json", 
        type: "GET",
        contentType: "application/json; charset=utf-8",
        success: function (data) {console.log(" hiiiii2");
      	  var arrSales = [[]] ;
    $.each(data, function (index, value ) { console.log(data.data_time);
	console.log(" hiiiii3");
		
		var date = new Date(value.time * 1000);
		console.log(" date:" +  date + " hours:"  +date.getHours());
		
		var day= date.getUTCDate();

		
		// Hours part from the timestamp
		var hours = date.getHours();
	 
		// Minutes part from the timestamp
		var minutes = "0" + date.getMinutes();
		// Seconds part from the timestamp
		var seconds = "0" + date.getSeconds();
		// Will display time in 10:30:23 format
		var formattedTime = hours + ':' + minutes.substr(-2)  ;
		 //console.log(formattedTime);

	if(hours >= 18)
		{
 
		
 
	    
	    
       data2.addRows([[
				date ,'yyyy'
				,value.values[4]*100 // lbc
				,value.values[6]*100 //mtv
				,value.values[3]*100 //aljadeed
				,value.values[11]*100 //manar
				,value.values[9]*100 //teleliban
				,value.values[8]*100 //otv
				,value.values[10]*100 //nbn
 
 
//			    ,value.sources.mbcdrama*100
//			    ,value.sources.mbc1*100
//			    ,value.sources.mbc4*100
 
			    

		       ]
	       ]);
 		}
				 
    });
    
 
    var options = {
    		 //enableInteractivity: false,
  		  curveType: 'function',
  		  // Allow multiple
  		  // simultaneous selections.
  		  selectionMode: 'multiple',
  		  // Trigger tooltips
  		  // on selections.
  		  tooltip: {trigger: 'selection'},
  		  // Group selections
  		  // by x-value.
  		  aggregationTarget: 'category',
      chart: {
        title: 'Tuesday Peak - Rating (weighted)',
        subtitle: '17 November2020'
      },
      colors:['blue','red','gray','#e6e600','#00ccff','orange','brown'],
      width: 1800,// 4500,
      height: 500,
      axes: {
        x: {
          0: {side: 'bottom'}
        }
      }, tooltip: {isHtml: true}
      
      
    };
    
    
 

    
    var chart = new google.charts.Line(document.getElementById('line_top_x'));
 
 
//    		google.visualization.events.addListener(chart, 'ready', function(e) {
//    		  var selected_rows = [];
//    		  for (var i = 0; i < 2 - 1; i++) {
//    		    selected_rows.push({row: i, column: null});
//    		  }
//    		  chart.setSelection(selected_rows);
//    		  console.log(selected_rows);
//    		});
    
    
 
     chart.draw(data2, google.charts.Line.convertOptions(options));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert('Got an Errorrr');
    }
}); 
}


function drawChartWeightedAllChannels() {
 
//    
//    var data2 = new google.visualization.DataTable();
//    
//    
//    data2.addColumn('date','Hours');
//    
//    // tooltip column
//    
// 
//    
//    data2.addColumn({type: 'string', role: 'annotation'});
//    data2.addColumn('number','lbc'); // blue
//    data2.addColumn('number','mtv'); // red
//    data2.addColumn('number', 'aljadeed');//gray
//    data2.addColumn('number', 'otv'); //yellow
// 
//
//    $.ajax({
//        url:  "../8January2021.json", //"http://tam.statleb.com:7070/reports/RawFullDayRating?yyyy=2020&mm=05&dd=28", //
//        dataType: "json", 
//        type: "GET",
//        contentType: "application/json; charset=utf-8",
//        success: function (data) {
//      	  var arrSales = [[]] ;
//    $.each(data.data, function (index, value ) {// console.log(data.data);
//
//		
//		var date = new Date(value.time * 1000);
//		 console.log(" date:" +  date + " hours:"  +date.getHours());
//		
//		var day= date.getUTCDate();
//
//		
//		// Hours part from the timestamp
//		var hours = date.getHours();
//		 console.log(" hours:" + hours + ",value.values[4]"+  value.values[4]);
//		// Minutes part from the timestamp
//		var minutes = "0" + date.getMinutes();
//		// Seconds part from the timestamp
//		var seconds = "0" + date.getSeconds();
//		// Will display time in 10:30:23 format
//		var formattedTime = hours + ':' + minutes.substr(-2)  ;
// 
//	 
//		//"NO_MATCH","aljadeed","lbc","lb2","mtv","one","otv","teleliban","nbn","manar","future","mbc1","mbc4","mbcdrama"
//	   /* 0 "NO_DATA", 
//	    1 "SILENCE",
//	    2 "NO_MATCH" , 0
//	    3 "aljadeed", 1
//	    4 "lbc", 2
//	    5 "lb2", 3
//	    6 "mtv", 4
//	    7 "one", 5 
//	    8 "otv", 6
//	    9 "teleliban",
//	    10 "nbn",
//	    11 "manar",
//	    12 "future",
//	    "mbc1",
//	    "mbc4",
//	    "mbcdrama"*/
//	if(hours >= 18)
//		{
// 
//       data2.addRows([[
//				date ,'yyyy' 
//				,value.values[4]*100
//				,value.values[6]*100
//				,value.values[3]*100
//				,value.values[9]*100
// 
//			    
//
//		       ]
//	       ]);
// 		}
//				 
//    });
//    
// 
//    
// 
//    var options = {
//    		 //enableInteractivity: false,
//  		  curveType: 'function',
//  		  // Allow multiple
//  		  // simultaneous selections.
//  		  selectionMode: 'multiple',
//  		  // Trigger tooltips
//  		  // on selections.
//  		  tooltip: {trigger: 'selection'},
//  		  // Group selections
//  		  // by x-value.
//  		  aggregationTarget: 'category',
//      chart: {
//        title: 'Tuesday 24 November 2020',
//        subtitle: 'Unweighted'
//      },
//      colors:['blue','red','gray','yellow' ],
//      width: 1800,// 4500,
//      height: 500,
//      axes: {
//        x: {
//          0: {side: 'bottom'}
//        }
//      }, tooltip: {isHtml: true}
//      
//      
//    };
//    
//    
// 
//
//    
//    var chart = new google.charts.Line(document.getElementById('line_top_x'));
// 
// 
//     chart.draw(data2, google.charts.Line.convertOptions(options));
//    },
//    error: function (XMLHttpRequest, textStatus, errorThrown) {
//					alert('dddGot an Errorrr');
//    }
//}); 
	 var data2 = new google.visualization.DataTable();
	    
	    data2.addColumn('date','Hours');
	    
	    // tooltip column
	    
	    data2.addColumn({type: 'string', role: 'annotation'});
	    data2.addColumn('number','lbc'); // blue
	    data2.addColumn('number','mtv'); // red
	    data2.addColumn('number', 'aljadeed');//gray
 	    data2.addColumn('number', 'manar'); //yellow
 	    data2.addColumn('number','teleliban');//blue
 	    data2.addColumn('number', 'otv');//orange
 	    data2.addColumn('number', 'one');//brown
//	  
//	    data2.addColumn('number','mbcdrama'); // green
//	    data2.addColumn('number', 'mbc1');//ROSE.
//	     data2.addColumn('number', 'mbc4');//turquoise.
	 
	    
	 

	    $.ajax({
	        url:  "../3March2021.json", //"http://tam.statleb.com:7070/reports/RawFullDayRating?yyyy=2020&mm=05&dd=28", //
	        dataType: "json", 
	        type: "GET",
	        contentType: "application/json; charset=utf-8",
	        success: function (data) {
	      	  var arrSales = [[]] ;
	    $.each(data.data, function (index, value ) { 

			var date = new Date(value.time * 1000);
			 console.log(" date:" +  date + " hours:"  +date.getHours());
			
			var day= date.getUTCDate();

			 
			// Hours part from the timestamp
			var hours = date.getHours();
			console.log(hours);
			// Minutes part from the timestamp
			var minutes = "0" + date.getMinutes();
			 
			// Seconds part from the timestamp
			var seconds = "0" + date.getSeconds();
			// Will display time in 10:30:23 format
			var formattedTime = hours + ':' + minutes.substr(-2)  ;
			
 
	 
			console.log("x "+formattedTime);
 
	       data2.addRows([[
					date ,'yyyy'
					,value.values[4]*100
					,value.values[6]*100
					,value.values[3]*100
					 
					,value.values[11]*100
					,value.values[9]*100
					,value.values[8]*100
					,value.values[5]*100
				    

			       ]
		       ]);
	 		   
					 
	    });
	    
	 
	    var options = {
	    		 //enableInteractivity: false,
	  		  curveType: 'function',
	  		  // Allow multiple
	  		  // simultaneous selections.
	  		  selectionMode: 'multiple',
	  		  // Trigger tooltips
	  		  // on selections.
	  		  tooltip: {trigger: 'selection'},
	  		  // Group selections
	  		  // by x-value.
	  		  aggregationTarget: 'category',
	      chart: {
	        title: 'Wednesday Peak',
	        subtitle: '3 February 2021'
	      },
	      colors:['blue','red','gray','#e6e600','#00ccff','orange','brown'],
	      width: 1800,// 4500,
	      height: 500,
	      axes: {
	        x: {
	          0: {side: 'bottom'}
	        }
	      }, tooltip: {isHtml: true}
	      
	      
	    };
	    
	    
	 

	    
	    var chart = new google.charts.Line(document.getElementById('line_top_x'));
	 
	 
//	    		google.visualization.events.addListener(chart, 'ready', function(e) {
//	    		  var selected_rows = [];
//	    		  for (var i = 0; i < 2 - 1; i++) {
//	    		    selected_rows.push({row: i, column: null});
//	    		  }
//	    		  chart.setSelection(selected_rows);
//	    		  console.log(selected_rows);
//	    		});
	    
	    
	 
	     chart.draw(data2, google.charts.Line.convertOptions(options));
	    },
	    error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert('Got an Errorrr');
	    }
	}); 
}