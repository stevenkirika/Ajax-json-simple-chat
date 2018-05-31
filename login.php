 <?php
   //include connection
   require_once("includes/connection.php");

   //include session
   require_once("includes/session.php");

   if(isset($_SESSION['chat_user_id'])){
   	header("Location: index.php");
   }


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
  	$(function(){
       $('#btn_login').click(function(){
        var email = $('#email').val();
        var password = $('#password').val();
  
        
  			//select record 
			
			//syntax - $.post('filename', {data}, function(response){});
			$.post('includes/data.php',{action: "login", email:email, password:password},function(res){
				$('#result').html(res);
			   	
			});		
		 	

       });
  	});
  </script>
</head>
<body>
<div class="container">
	<div class="col-md-2"></div>
	<div class="col-md-10 sign-up">
		<h1 align="center">Chat  Login</h1>
<a href="lost-password.php" class="pull-right">Lost Password</a> <em class="pull-right"> | </em> <a href="signup.php" class="pull-right">Sign Up</a>
<div class="clear"></div>
<div id="result"></div>
		<hr>
		<label>Email</label><span class="email"></span>
		<input  type="email" id="email" class="form-control">
		<label>Password</label><span class="password"></span>
		<input type="password" class="form-control" id="password">
		<br/>
		<button class="btn btn-primary" id="btn_login" style="width:100%;">Login</button>
	</div>
	<div class="col-md-2"></div>
</div>

</body>
</html>