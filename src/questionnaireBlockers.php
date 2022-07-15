<?php 
namespace Phppot;

require_once __DIR__ . '/DataSource.php';
 require "loginheader.php";  
 $ds = new DataSource();
 
if(isset($_GET['id']) && !empty($_GET['id'])){
         // $name = '"'.$ds->real_escape_string($_POST['name']).'"';
        //$email = '"'.$ds->real_escape_string($_POST['email']).'"';
      //  $password = '"'.password_hash($ds->real_escape_string($_POST['password']), PASSWORD_DEFAULT).'"';
       // $gender = '"'.$ds->real_escape_string($_POST['gender']).'"';
		 
        //$query = "insert into test (name) values ('ghenoie')";
        
    $query = "select case when qu.HH_telephone is null then  coalesce(concat('0',substring(o.serv_line_no,1,1),' - ',substring(o.serv_line_no,2,3),' ',substring(o.serv_line_no,5)),'N/A')
                else qu.HH_telephone end  as serv_line_no , case when qu.HH_name_arabic is null then  o.name else qu.HH_name_arabic end as name, o.full_address,
                (SELECT p.desc FROM  params p where p.type_id = 26  and q.status_id = p.param_id) status, q.status_id statusId, case when qu.number_tv_sets is null then 0 else qu.number_tv_sets  end as nbTvSet
                 from ogero o join quota q
                  on o.id = q.ogero_id
                left join questionnaire qu
                 on o.id = q.ogero_id
                 and o.id = qu.quota_id
                 and q.ogero_id = qu.quota_id
                 where q.ogero_id = ". $_GET['id']." limit 1; " ;
   // print $query;
    $zResult = $ds->select($query);
  
    foreach ($zResult as $quotaData) {
         $quotaData["name"];  
        $nbTvSet =  $quotaData["nbTvSet"];
		  }
      } 
  
      
?>


 

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/lebanon.png" />
	<title>questionnaire</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
 

  

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
     <link href="assets/fonts/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
	<!-- End Google Tag Manager -->
 
</head>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="margin-bottom: 0px">
 <div class="row">
        <div class="col-sm-3  ">
    <a class="navbar-brand">Welcome <strong>  <?php echo  $_SESSION['username'] ?> </strong></a>
    </div>
    
    
 <div class="col-sm-8  col-offset-2">
    <div class="collapse navbar-collapse pull-right" id="navbarResponsive">
       <button class="btn btn-outline-light btn-default" class="navbar-brand" style="width: 100px;margin-top:10px"  onClick="window.location.href='logout.php?userId=<?php echo $_SESSION['userId'] ?>'">Logout</button>
         <div style="text-align: right;"><b>Contact Us at <a>+961 4 443011</a></b></div>
     </div>
  </div>
</div>
</nav>

	<div class="image-container set-full-height" style="background-image: url('/images/day.jpg')">
	    
	     <!--   Big container   -->
	    <div class="container" style="direction:rtl">
	        <div class="row">
		        <div class="col-sm-12 col-sm-offset-0">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="red" id="wizardProfile">
		                    <form id="qBlockerForm" action="" >
		                    	<div class="wizard-header text-center"  style="background-color: #f3f3f3"> 
		                        	 <div class="modal-body row">
                                          <div class="col-sm-4">
                                          	  <h5 dir="ltr"><?php echo  $quotaData["serv_line_no"] ;?></h5>
                                              <h5>Status: <?php echo $quotaData["status"];?></h5>
                                              
                                          </div>
                                  		<div class="col-sm-4">
                    						 <h5>
                                            	  <input type='button' class='btn   btn-fill btn-danger btn-wd btn-lg' name='stop' id="stopBtn" value='Stop' />
                                             </h5>
                  					    </div>
                                         <div class="col-sm-4">
                    						 <h5>
                                            	   <b> <?php echo  $quotaData["name"] ;?> </b> <br/>
                                            	    <small><?php echo  $_GET['id'];?></small><br/> 
                                            	    <small><?php echo $quotaData["full_address"];?></small>
                                             </h5>
                  					    </div>
								</div>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                             
			                           
			                            <li>
											<a href="#decisionMakerTab" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-user"></i>
												</div>
												Decision Maker 
											</a>
										</li>
										
										 <li>
											<a href="#lebaneseTab" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-home"></i>
												</div>
												Households 
											</a>
										</li>
										
										
										      <li>
											<a href="#tvSetsTab" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-desktop"></i>
												</div>
												Number of TV sets
											</a>
										</li>
										
										
										
										
										 <!-- li>
											<a href="#startTab" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-map"></i>
												</div>
												 Proceed 
											</a>
										</li-->
										      
			                        </ul>
								</div>
		                        <div class="tab-content">
		                        
		                           
		                            
		                            
		                            <!-- 1) Decision Maker-->
		                             
		                            <div class="tab-pane" id="decisionMakerTab">
		                             <h3 class="info-text">حضرتك مين بتكون؟ </h3>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-4">
		                                       
		                                        <div class="col-sm-12">
		                                       		 <input   type='radio' name='decisionRadio'  value='1' required> <label >رب الأسرة</label> 
		                                       		 </div>
		                                      <div class="col-sm-12">
		                                       		 <input type='radio' name='decisionRadio'  value='2'>  <label >الشخص  الذي يتخذ القرارات الالساسية في الأسرة </label> 
		                                       		 </div>
		                                        
		                                          <div class="col-sm-12">
		                                       		 <input type='radio' name='decisionRadio'  value='3'>  <label>الشخص المسؤول عن الطعام والتبضع للعائلة  </label> 
		                                       		 </div>
		                                       		 
		                                       		  <div class="col-sm-12">
		                                       		 <input type='radio' name='decisionRadio' id="decisionRadioOther"  value='4'> <label>آخر  </label> 
   
		                                       		 </div>
		                                        
		                                    </div>
		                                    
		                                </div> 
		                                  
		                                <div class="row">
		                                	<div class="text-right"><h3 class="info-text"><span class="label label-danger pull-right">المستفتي: إذ لم يكن موجود أحد من الأشخاص المذكورة أعلاه، حاول معرفة من من أفراد العائلة هم هؤلاء الأشخاص وحدد موعد مع احدهم</span></h3></div><br>
		                                 </div> 
		                            </div>
		                            
		                            
		                             <!-- 2) Lebanese family -->
		                             
		                            <div class="tab-pane" id="lebaneseTab">
		                            <h3 class="info-text">هل أنتم عائلة لبنانية؟</h3>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
		                                    
		                                    <?php   $query =  "SELECT  p.param_id as id , p.desc  FROM  params p where p.type_id = 27 and param_id in (1,2) ";
    		                                           $statusResult = $ds->select($query);
    		                                           foreach ($statusResult as $status) {
    		                        
    		                                               echo "<div class='col-sm-4'><input type='radio' name='statusRadio'  id='statusRadio' value='".$status["id"] ."'> " .$status["desc"] ."   </div>";
    		                                           }
    		                                  
    		                              ?>
		                                    
		                                      
		                                     </div>
		                                    
		                                </div> 
		                                  
		                                <div class="row">
		                                	<div class="text-right"><h3 class="info-text"><span class="label label-danger pull-right">المستفتي: إن لم تكن عائلة لبنانية، نعتذر منك أستاذ هذه الدراسة تشمل الأسر اللبنانية فقط</span></h3></div><br>
		                                 </div> 
		                            </div>
		                            
		                            
		                             <!-- 3) # TV Sets-->
		                             
		                            <div class="tab-pane" id="tvSetsTab">
		                            <h3 class="info-text">كم جهاز تليفزيون عندكن بالبيت؟ </h3>
		                                <div class="row">
		                                       <div class="col-sm-2 col-sm-offset-5" style="text-align:center;">
		                                        <div class="form-group">
		                                            <label>Number of TV Sets</label>
		                                           
		                                        </div>
		                                    </div>
		                                      <div class="col-sm-2 col-sm-offset-5" >
		                                    	 <input name="nbTvSets" id="nbTvSets" type="number" class="form-control"   onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)"  min="0"  max="12" maxlength = "2"
		                                    	     value="<?php if (isset($nbTvSet) && !empty($nbTvSet)) { echo $nbTvSet;}  ?>" required>
		                                    </div>
		                                </div> 
		                                 
		                                 <div class="row">
		                                	<div class="text-right"><h3 class="info-text"><span class="col-sm-12 text-right">الرجاء عدم شمل التلفزيونات التي لا تتواجد دائماً في المنزل، مثلاً تلك التي تتواجد في المنزل الصيفي ولا تستعمل في المنزل الأساسي، وعدم شمل التلفزيونات المعطلة التي لا تودون إصلاحها.</span></h3></div><br>
		                                 </div>  
		                                <div class="row">
		                                	<div class="text-right"><h3 class="info-text"><span class="label label-danger pull-right">المستفتي: إن لم يكن لديهم تليفزيون، نعتذر منك أستاذ هذه الدراسة تشمل فقط البيوت التي لديها تليفزيون.</span></h3></div><br>
		                                 </div> 
		                            </div>
		                            
		                            
		                            <!-- 4) Proceed to Questionnaire-->
		                             
		                            <!--div class="tab-pane" id="startTab">
		                            <h3 class="info-text">Start Questionnaire </h3>
		                                 
		                            </div-->
		                            
		                            
		                            
		                            
		                         </div>
		                         
		                         
		                        <div class="wizard-footer">
		                        
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' id ="nextBtn" value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish'  id ="finishBtn"   value='Start Survey' />
		                            </div>

		                            <div class="pull-left">
		                            
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	            
	        </div>
	    </div>
	 
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
	
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/demo.js" type="text/javascript"></script>
	<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>


<script type="text/javascript">

 
$('#wizardProfile .btn-next').click(function() {

	var selValue = $('input[name=statusRadio]:checked').val();
 
  
    // Blocker 1 -  if the HouseHold is not Lebanese, update quota to Out of Quota automatically
  if(selValue == 2) 
  { 
		var userId = <?php echo $_SESSION['userId']?>;
		var ogeroId = <?php echo  $_GET['id']?>;
		var statusId= 18;  // out of quota
        var otherComment = 'Out of Quota - Non Lebanese'; 
  		// alert ( "statusId=" + statusId + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=updateStatus");
  		 $.ajax({
                type: "POST",
                url: "getServices.php",
                data: "statusId=" + statusId + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=updateStatus",
                dataType: 'JSON' ,
                success: function (html) { 
                   // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Saved</div>");
                     window.location.href = 'quotaGrid.php';
                  } 
            });
         
        return false;
  
  }



//Blocker 2 - if the Decision Maker Result is Other, take appointment
  var decisionRadioValue = $('input[name=decisionRadio]:checked').val();
  if (decisionRadioValue== 4 ){
		var userId = <?php echo $_SESSION['userId']?>;
		var ogeroId = <?php echo  $_GET['id']?>;
		var statusId= 11;   
	    var otherComment = 'decisionMakerOtherClicked'; 
  		 $.ajax({
              type: "POST",
              url: "getServices.php",
              data: "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updatequotalogs&otherComment=" + otherComment,
              success: function (html) {   console.log (html);
                  
              $.redirect("updateStatus.php",
              {
              	id: ogeroId,
                  appointmentCheck : 1
              });

              },

               error: function (textStatus, errorThrown) {
                  console.log(textStatus);
                  console.log(errorThrown);
              } 
  		 });
         
         return false;
     } 
//end

 
});

// on Stop click
$("#stopBtn").click(function () 
	     {  
	    	var userId = <?php echo $_SESSION['userId']?>;
			var ogeroId = <?php echo  $_GET['id']?>;
			var statusId = <?php echo $quotaData["statusId"]?>; 
		 
	        //alert ( "statusId=" + statusRadio + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=updateStatus");
	 
	        if (typeof ogeroId  == "undefined"  ||  ogeroId === ""  ) {
	            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Error!</div>");
	        } else {
	        	//alert("id="+ogeroId+"&userId="+userId+"&statusId="+statusId);
	            $.ajax({
	                type: "POST",
	                url: "getServices.php",
	                data: "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updatequotalogs&otherComment=stopClicked",
	                
	                success: function (html) {   console.log (html);
	                $.redirect("updateStatus.php",
	                        {
	                        	id: ogeroId,
	                        	step: 'blocker',
	                           
	                        });
	                    
	                },
	                error: function (textStatus, errorThrown) {
	                    console.log(textStatus);
	                    console.log(errorThrown);
	                },
	                beforeSend: function () {
	                    //$("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
	                }
	            });
	        }
	        return false;


	       
		    		
	      });

//Blocker 3 -  if the HouseHold doesnt have a TV Set, update quota to Out of Quota automatically
$('#wizardProfile .btn-finish').click(function() {
 
 
     var zVal = $("#nbTvSets").val() ;
    //  alert ("zval-" + zVal + " wizard step=" +  $('#wizardProfile').bootstrapWizard('currentIndex') );
     if (zVal.trim() == "" || zVal   <= 0  || zVal  > 12)
     {
         alert ('You should fill Number of TV Sets with correct values');
     }
     else if ( /* $('#wizardProfile').bootstrapWizard('currentIndex') == 2 &&*/ zVal.length > 0 && zVal == 0)
	 { 
   		var userId = <?php echo $_SESSION['userId']?>;
   		var ogeroId = <?php echo  $_GET['id']?>;
   		var statusId= 18;  // out of quota
           var otherComment = 'Out of Quota - No Television'; 
        // alert ( "statusId=" + statusRadio + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=updateStatus");
     	   $.ajax({
                   type: "POST",
                   url: "getServices.php",
                   data: "statusId=" + statusId + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=updateStatus",
                   dataType: 'JSON' ,
                   success: function (html) { 
                         window.location.href = 'quotaGrid.php';
                       },
                   error: function (textStatus, errorThrown) {
                       console.log(textStatus);
                       console.log(errorThrown);
                   } 
     	 });
          
          return false;
      }  
     //Start Survey 

	 else
	 {
			var userId = <?php echo $_SESSION['userId']?>;
			var ogeroId = <?php echo  $_GET['id']?>;
			var statusId= 4;  //  Interview Postponed/incomplete
 			  var otherComment = 'StartSurveyBtn'; 
	   //  alert ( "proceed statusId=" + statusRadio + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=updateStatus");
	  		 $.ajax({
	                type: "POST",
	                url: "getServices.php",
	                data: "statusId=" + statusId + "&otherComment=" + otherComment+ "&ogeroId="+ogeroId+"&userId="+userId+"&action=insertQuestionnaire",
	                dataType: 'JSON' ,
	                success: function (html) { 
	                    $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Saved</div>");
	                     $.redirect("questionnaire.php",
		                        {
		                        	id: ogeroId,
		                        	nbTvSet: $("#nbTvSets").val() 
		                         });
 					 },
	                error: function (textStatus, errorThrown) {
	                    console.log(textStatus);
	                    console.log(errorThrown);
	                } 
	            });
	         
	        return false;

	 }
   

});



$(document).ready(function(){

	var statusId = <?php echo $quotaData["statusId"]?>; 
	 
	if (statusId == 2 || statusId == 4) // success or interview postponned
	{
		$('#wizardProfile  a[href="#tvSetsTab"]').tab('show');
	}
	
	//CHANGE Button 
	$('input[name=statusRadio]').change(function(){
		if ($('input[name=statusRadio]:checked').val() == 2 )
		 {
			$("#nextBtn").prop('value', 'Stop');
			$("#nextBtn").removeClass('btn-warning');
			$("#nextBtn").addClass('btn-danger');
		  }
		else
		{
			$("#nextBtn").prop('value', 'Next');
			$("#nextBtn").removeClass('btn-danger');
			$("#nextBtn").addClass('btn-warning');
	     }
	});


 $('input[name=decisionRadio]').change(function(){
		if ($('input[name=decisionRadio]:checked').val() == 4  )
		 {
			$("#nextBtn").prop('value', 'Stop');
			$("#nextBtn").removeClass('btn-warning');
			$("#nextBtn").addClass('btn-danger');
		  }
		else
		{
			$("#nextBtn").prop('value', 'Next');
			$("#nextBtn").removeClass('btn-danger');
			$("#nextBtn").addClass('btn-warning');
	     }
	});

 $('input[name=nbTvSets]').change(function(){
	
		 var zVal = $("#nbTvSets").val() ;
		// $("#finishBtn").removeAttr('disabled');
		  
		 if ( /* $('#wizardProfile').bootstrapWizard('currentIndex') == 2 && zVal.length > 0 &&*/ zVal == 0)
		 {
			$("#finishBtn").prop('value', 'Stop');
			$("#finishBtn").removeClass('btn-warning');
			$("#finishBtn").addClass('btn-danger');
		  }
		else
		{
			$("#finishBtn").prop('value', 'Start Survey');
			$("#finishBtn").removeClass('btn-danger');
			$("#finishBtn").addClass('btn-warning');
	     }
	});

	

});

function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  
	
</script>

</html>