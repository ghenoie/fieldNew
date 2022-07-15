 
 <?php 
 require "loginheader.php"; 
 include('menu.php');
 if ( $_SESSION['userRole'] != 1)
 {
     header("location:logout.php");
 }
 
 ?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  </head>

  <body>
<div class="well well-sm">Create New User</div>
    <div class="container">

      <img style="display: block; margin-left: auto; margin-right: auto;margin-top:65px" src="images/signup.png">
      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
        
        <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="email" id="email" type="text" class="form-control" placeholder="Email">
        <input name="password1" id="password1" type="password" class="form-control" placeholder="Password">
        <input name="password2" id="password2" type="password" class="form-control" placeholder="Repeat Password">

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

        <div id="message"></div>
      </form>

    </div> <!-- /container -->
<br/><br/><br/><br/>

<footer class="footer fixed-bottom container" align="center">
        <hr>
        <p style="">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script src="js/signup.js"></script>


    <script src="assets/js/signup/jquery.validate.min.js"></script>
	<script src="assets/js/signup/additional-methods.min.js"></script>
<script>

$( "#usersignup" ).validate({
  rules: {
	email: {
		email: true,
		required: true
	},
    password1: {
      required: true,
      minlength: 4
	},
    password2: {
      equalTo: "#password1"
    }
  }
});
</script>

  </body>
</html>