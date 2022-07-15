<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['userRole'] != 1)
    {
      //header("location:ErrorPage.php");
        header("location:taskGrid.php");
    }
    else
    {
        header("location:taskGrid.php");
    }
 
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="icon" type="image/png" href="assets/img/lebanon.png" />
    <!-- Bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<style>  

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('/images/loginBackground.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}
 
.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

 
.card-header h3{
color: white;
}
 

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}
 

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}
 
</style>
  <body style="background-image: url('/images/loginBackground.jpg')">
 
<div class="container" >
<div class="clearfix"  ></div> <br>
<div class="clearfix"  ></div> <br>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Field Managment</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				  <form class="form-signin" name="form1" method="post" action="checklogin.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
					 
						<input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
					   <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
					</div>
					         <div id="message"></div>
					<div class="form-group">
						<button name="Submit" id="submit" class="btn float-right login_btn" type="submit">Sign in</button>
		 
					</div>


				</form>
			</div>
		 
		</div>
	</div>
</div>

<footer class="footer fixed-bottom container" align="center">
        <hr>
       <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>s
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>

  </body>
</html>