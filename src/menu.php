 <?php require "loginheader.php";  
 

ob_start();
include 'config.php';
require 'includes/functions.php';

// Define $myusername and $mypassword
$username = $_SESSION['username'] ;
$password = $_SESSION['password'] ;

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);

$response = '';
$loginCtl = new LoginForm;
 
$response = $loginCtl->checkLogin($username, $password);
if ($response != "true")
{
    header("location:logout.php");
}
 
?>
  



<head>
 <link rel="icon" type="image/png" href="assets/img/lebanon.png" />
 <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css"/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
 
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> 
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
 
 		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
 
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  
  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
	
  
 <script src='./js/functions.js' type='text/javascript'></script>
 
  <script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
 		

</head> 
<script type="text/javascript">

var userRole = <?php echo  $_SESSION['userRole'] ?>;

</script>
 <style>
<!--

-->
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu>a:after {
  content: "\f0da";
  float: right;
  border: none;
  font-family: 'FontAwesome';
}

.dropdown-submenu>.dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: 0px;
  margin-left: 0px;
}

 

#body {
  background: #4568DC;
  background: -webkit-linear-gradient(to right, #4568DC, #B06AB3);
  background: linear-gradient(to right, #4568DC, #B06AB3);
  min-height: 100vh;
}

code {
  color: #B06AB3;
  background: #fff;
  padding: 0.1rem 0.2rem;
  border-radius: 0.2rem;
}

@media (min-width: 991px) {
  .dropdown-menu {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
}

</style>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top> style= "margin-bottom: 0px">
  <div class="container">
     <div class="col-sm-2  ">
    <a class="navbar-brand" href="#">Welcome <strong>  <?php echo  $_SESSION['username'] ?> </strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    
      <div class="col-sm-9 ">   
 <div id="navbarContent" class="collapse navbar-collapse">
    <div class="navbar-nav">
      <ul class="navbar-nav mr-auto">
      			
    	          
    	          
    	            <?php if ($_SESSION['username'] == "vanessa" || $_SESSION['username'] == "ghenoie" ) { ?>
    	            <li class="nav-item"><a href="main.php" class="nav-link"><i class="fa fa-fw fa-mobile"></i>Dashboard</a></li>
    	              <li class="nav-item"><a href="zTechInvoices.php" class="nav-link"><i class="fa fa-fw fa-dollar"></i>Invoices</a></li>
    	              <li class="nav-item"><a href="zHouseholds.php" class="nav-link"><i class="fa fa-fw fa-user"></i>Households</a></li>  
    	               <li class="nav-item"><a href="DailyInstallations.php" class="nav-link"><i class="fa fa-fw fa-link"></i>Feedback</a></li>
    	              <?php }?>
    	              
    	              
    	                <?php if ($_SESSION['userRole'] == 1 ) { ?>
      			  
 				
 				  <li class="nav-item"><a href="zDevices.php" class="nav-link"><i class="fa fa-fw fa-dollar"></i>Devices</a></li>
        	            
        	          
    	          <?php }?>
    	          
    	          
    	          <li class="nav-item"><a href="Contacts.php" class="nav-link"><i class="fa fa-fw fa-link"></i>Contacts</a></li>
    	          
                  <li class="nav-item"><a href="taskGrid.php" class="nav-link"><i class="fa fa-fw fa-check-square-o"></i>Tasks</a></li>
                   <li class="nav-item"><a href="GeographicPanel.php" class="nav-link"><i class="fa fa-fw fa-map"></i>Report</a></li>
                     <li class="nav-item"><a href="reporting/index.php" class="nav-link"><i class="fa fa-fw fa-map"></i>Reportx</a></li>
                  
                  
      </ul>
                
               
               
    </div>
      <ul class="navbar-nav ml-auto pull-right">
        <li class="nav-item">
		<button class="btn btn-outline-light btn-default" class="navbar-brand" style="width: 100px;margin-top:10px"  onClick="window.location.href='logout.php?userId=<?php echo $_SESSION['userId'] ?>'">Logout</button>

        </li>
        </ul>
    </div>
    		
  </div>
  <div style="text-align: right;" class="navbar-brand pull-right text-right"><b>Contact Us at <a>+961 4 443011</a></b></div>
    </div>
</nav>
 
  

<script type="text/javascript">

$(function() {
	  // ------------------------------------------------------- //
	  // Multi Level dropdowns
	  // ------------------------------------------------------ //
	  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
	    event.preventDefault();
	    event.stopPropagation();

	    $(this).siblings().toggleClass("show");


	    if (!$(this).next().hasClass('show')) {
	      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	    }
	    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	      $('.dropdown-submenu .show').removeClass("show");
	    });

	  });
	});

</script>