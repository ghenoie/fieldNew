<?php 
namespace Phppot;

require_once __DIR__ . '/DataSource.php';
require "loginheader.php";  
$ds = new DataSource();
 
  if (isset($_POST['statusId']) && !empty($_POST['statusId']) ) // if Status is success , review the 
  {
    
      $status = $_POST['statusId'];
  }
  else
      $status = 0;

// else 
    
    if(isset($_POST['id']) && !empty($_POST['id'])  ){
          $id  = $_POST['id'];
        // $name = '"'.$ds->real_escape_string($_POST['name']).'"';
  /*      
    $query = "select  coalesce(concat('0',substring(o.serv_line_no,1,1),' - ',substring(o.serv_line_no,2,3),' ',substring(o.serv_line_no,5)),'N/A') as serv_line_no, o.name, 		o.full_address,
                (SELECT p.desc FROM  params p where p.type_id = 26  and q.status_id = p.param_id) status, q.status_id statusId
                 from ogero o join quota q
                 on o.id = q.ogero_id
                 where q.ogero_id = ". $_POST['id']." 
                 AND not exists (
                select x.quota_id  from quota_logs x WHERE     
								x.date_of_call = (select max(date_of_call) from quota_logs xx  where xx.quota_id =   x.quota_id )  
								and (comments in ('acceptClicked', 'otherClicked', 'Introduction','acceptClicked') )
                                and  x.quota_id =   q.ogero_id 
                                )

                limit 1; " ;
   
    $zResult = $ds->select($query);
 */
    if  (1 != 1 ) // (empty($zResult))
    {
        header("Location: ErrorUserPage.php");
    }
    else 
    {
  /*  foreach ($zResult as $quotaData) {
         $quotaData["name"];  
		  }
      */
        /*
		  $query = " INSERT INTO `umshini_bo`.`tasks`
		  (`id`,
		      `task_type_id`,
		      `comments`,
		      `opened`,
		      `closed`,
		      `opend_by`,
		      `closed_by`,
		      `created_at`,
		      `updated_at`,
		      `household_id`)
		      VALUES
		      (
                ".$_POST['id']. ",
		         4,
		      
		      <{opened: CURRENT_TIMESTAMP}>,
		      <{closed: CURRENT_TIMESTAMP}>,
		      <{opend_by: }>,
		      <{closed_by: }>,
		      <{created_at: CURRENT_TIMESTAMP}>,
		      <{updated_at: CURRENT_TIMESTAMP}>,
		      <{household_id: }>";
		      
		  
		  */
     /* // insert into quota logs
		$query = "insert into quota_logs (quota_id, user_id, date_of_call, status_id, date_of_end_call, comments)
                  values (".$_POST['id']. "," . $_SESSION['userId'] . ",now() , null  , null,'Introduction')";
		$ds->insert($query);

        */
		if(isset($_POST['countNA']) && !empty($_POST['countNA'])){
		    $countNA = $_POST['countNA'];
		}
    }
		
}
 else
 {
     header("Location: ErrorPage.php");
 }
 
 
if(empty($id))
{
    $id=0;
}

if(empty($countNA))
{
    $countNA=0;
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
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12 col-sm-offset-0">

		            <!--      Wizard container        -->
		            <div class="wizard-container" style="padding-top:0px">

		                <div class="card wizard-card" data-color="green" id="wizardProfile" style="padding: 0px">
		                  
		                     
		                <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

		                    	<div class="wizard-header text-center"  style="background-color: #f3f3f3">
		                        	 <div class=" row"> <!-- modal-body -->
                                  		 <div class="col-xs-6">
                                   		     <h5><?php echo  $quotaData["serv_line_no"] ;?></h5> 
                                             <h5>  Status: <?php echo $quotaData["status"];?></h5> 
                                          </div>
                                 
                                       <div class="col-xs-6">
                						<h5>
                                        	   <b> <?php echo  $quotaData["name"] ;?> </b> <br/>
                                        	    <small><?php echo $id;?></small><br/> 
                                        	    <small><?php echo $quotaData["full_address"];?></small>
                                        	  
                                        </h5>
                  					   </div>
								</div>
								
								    <div class="tab-pane" id="">
		                            	<div class="col-sm-12 col-sm-offset-0 text-right" dir='rtl'>
										 
											<p   dir='rtl'>   مرحبا معك <?php echo  $_SESSION['username'] ?>  </p>             
                                            <p   dir='rtl'> من الشركة اللبنانية للإحصاءات، نحنا عم نعمل دراسه لصالح كل المحطات التلفزيون اللبنانية، </p>
                                            <p dir='rtl'>  ولهلدراسة عم نركب مكنة صغيرة على كل التلفزيونات بلبنان، وما بتكلفك بشي. </p>
                                            <p  dir='rtl'> بالمقابل بتحصل على جوائز قيمة، بتتخطى قيمتها 200$ سنوياً  </p>
                                            
                                            <p  style="color:red"  dir='rtl' > <u>ملاحظة: </u>في حال تم سؤال ما هي هذه المكنة؟ ؟ ؟ نجيب بالتالي:  </p>
		                                    <p dir='rtl'>- المكنة صغيرة كتير، بتتركب مخفية ورا التلفزيون، إنت ما بتشوفا ولا حداً بشوفا وولا بيعرف إنو راكبة عندك.</p> 
                                             <p dir='rtl'>- المكنة بتنوصل على التلفزيون لنعرف نسبة مشاهدة التلفزيون بلبنان. </p>
                                             <p dir="rtl">- بكرا لما يجو لعندك بفسرولك أكتر (كل يلي بعرفو عن المكنة خبرتك ياه يا استاذ)</p> 
                                           <p  style="color:red"  dir='rtl' > <u>ملاحظة: </u>في حال تم سؤال ما هي هذه الجوائز؟ ؟ ؟ نجيب بالتالي:  </p>
		                                    <p dir='rtl'>جوائز قيمة متعددة، منها دعوات لحضور المهرجانات وحفلات فنية متنوعة. منها مهرجانات بعلبك، الأرز، بيت الدين، صور، بيروت إلخ...</p> 
                                           
                                             <hr style="margin-top:2px;margin-bottom: 10px; border-top-color:black"/>
                                             <p  style="color:red"  dir='rtl'   style="text-decoration: underline;">بحال الموافقة على المشاركة بالدراسة، نسأل السؤال التالي:</p>
                                            <p  dir='rtl'>هون بيت  أو شركة؟ </p>
                                      		<p  style="color:red"  dir='rtl' ><u>االمستفتي:</u>  إذا لم يكن بيت، نعتذر منك استاذ هذه الدراسة تشمل البيوت فقط.</p> 
                                           
                                            <hr style="margin-top:2px;margin-bottom: 10px; border-top-color:black"/>
                                             <p dir='rtl'>هل في حداً بالبيت بيشتغل:	</p> 
                                             <p dir='rtl'>- بالإعلام أو الإعلان أو الصحافة (التلفزيون، الراديو، الصحافة، شركات الدعايات، شركات الانتاج التلفزيوني ...إلخ).</p>
                                             <p dir='rtl'>- أو بأي شركة احصاءات أخرى. </h5>
                                             <p dir='rtl' style="color:red" ><u>االمستفتي:</u> إذ وجدت عاملاً في تلك المجالات، نعتذر منك استاذ هذه الدراسة لا تشمل العاملين في هذا المجال.</p> 
                                              
                                            
                                             
										</div>
		                            </div>
		                            
		                    	</div>

								<div class="wizard-navigation">
									 
								</div>
		                        
		                        <div class="wizard-footer">
		                        
		                            <div class="pull-right">
		                                 

		                                 <input type='button' class='btn  btn-fill btn-warning btn-wd' id="otherBtn" name='otherBtn' value='Others' />
		                                 <input type='button' class='btn  btn-fill btn-success btn-wd' id="acceptBtn" name='acceptBtn' value='Proceed' />
		                              </div>

		                         
		                            <div class="clearfix"></div>
		                        </div>
		                     
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

$(document).ready(function () {
    "use strict";
  
   
    $("#acceptBtn").click(function () {  
    	 
		var userId = <?php echo $_SESSION['userId']?>;
		var ogeroId = <?php echo $id?>;
		var statusId = <?php echo $status?>; 
	 
//        alert (  "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updatequotalogs&otherComment=acceptClicked");
 
        if (typeof ogeroId  == "undefined"  ||  ogeroId === "" ||ogeroId == "0" || statusId == "0" ) {
        	 alert ("Missing data:You are not allowed to refresh the page \n Go Back to Quota Grid");
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Error!</div>");
        } else {
        	console.log ("id="+ogeroId+"&userId="+userId+"&statusId="+statusId);
            $.ajax({
                type: "POST",
                url: "getServices.php",
                data: "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updatequotalogs&otherComment=acceptClicked",
                
                success: function (html) {   console.log (html);
                   // $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Saved</div>");
                    window.location.href = 'questionnaireBlockers.php?id='+ogeroId;
                        //return html.username;
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




    $("#otherBtn").click(function () 
     {  
    	var userId = <?php echo $_SESSION['userId']?>;
		var ogeroId = <?php echo $id ?>;
		var statusId = <?php echo $status?>; 
		var countNA = <?php echo $countNA?>;
	 
      	 //alert (  "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updatequotalogs&otherComment=otherClicked");
 
        if (typeof ogeroId  == "undefined"  ||  ogeroId === "" ||ogeroId == "0" || statusId == "0" ) {
        	 alert ("Missing data:You are not allowed to refresh the page \n Go Back to Quota Grid");
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Error!</div>");
        } else {
        	//alert("id="+ogeroId+"&userId="+userId+"&statusId="+statusId);
            $.ajax({
                type: "POST",
                url: "getServices.php",
                data: "ogeroId="+ogeroId+"&userId="+userId+"&statusId="+statusId+"&action=updatequotalogs&otherComment=otherClicked",
                
                success: function (html) {   console.log (html);
                $.redirect("updateStatus.php",
                        {
                        	id: ogeroId,
                        	countNA: countNA
                           
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
    
});

</script>
</html>