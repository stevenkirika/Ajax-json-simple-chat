<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
  $(function(){
  
  	$('#btn_register').click(function(){
  		var email = $('#email').val();
  		var fname = $('#fname').val();
  		var lname = $('#lname').val();
  		var password = $('#password').val();
  		var cpassword = $('#cpassword').val();
        var error_status = 0; //0 represents zero errors 

         //validate email
  		if(email==""){
  			$('span.email').html('Please Enter Email');
  			$('#email').addClass('error-input');
  			error_status = 1;
  		}
  		else if (email.indexOf("@", 0) < 0)
			{
			$('span.email').html('Please enter a valid email');
  			$('#email').addClass('error-input');
  			error_status = 1;
			}
			
		else if (email.indexOf(".", 0) < 0)
			{
			$('span.email').html('Please enter a valid email');
  			$('#email').addClass('error-input');
  			error_status = 1;
			}
  		else{
  			$('span.email').html('');
  			$('#email').removeClass('error-input');
  			error_status = 0;
  		}
        

        //validate first name
  		if(fname==""){
  			$('span.fname').html('Please Enter First Name');
  			$('#fname').addClass('error-input');
  			error_status = 1;
  		}
  		else{
  			$('span.fname').html('');
  			$('#fname').removeClass('error-input');
  			error_status = 0;
  		}
        

        //valdate last name
  		if(lname==""){
  			$('span.lname').html('Please Enter Last Name');
  			$('#lname').addClass('error-input');
  			error_status = 1;
  		}
  		else{
  			$('span.lname').html('');
  			$('#lname').removeClass('error-input');
  			error_status = 0;
  		}


  		//validate password
  		if(password==""){
  			$('span.password').html('Please Enter password');
  			$('#password').addClass('error-input');
  			error_status = 1;
  		}
  		else{
  			$('span.password').html('');
  			$('#password').removeClass('error-input');
  			error_status = 0;
  		}


  		//validate confirm password
  		if(password==""){
  			$('span.cpassword').html('Please confirm Enter password');
  			$('#cpassword').addClass('error-input');
  			error_status = 1;
  		}
  		else{
  			$('span.cpassword').html('');
  			$('#cpassword').removeClass('error-input');
  			error_status = 0;
  		}
       
       //validate both passwords match
  		if(password!=cpassword){
  			if(password!=""){
  			$('span.password').html('PASSWORD DO NOT MATCH');
  			$('#cpassword').addClass('error-input');
  			$('#password').addClass('error-input');
  			error_status = 1;
  		     }
  		     else{
  		    $('span.password').html('');
  			$('#password').removeClass('error-input');
  			$('#cpassword').removeClass('error-input');
  			//error_status = 0;
  		     } 
  		}
  		
        //no errors
  		if(error_status==0){
  				

  			//insert record 
			
			//syntax - $.post('filename', {data}, function(response){});
			$.post('includes/data.php',{action: "singup", email:email, fname:fname, lname:lname, password:password},function(res){
				
				
				$('#result').html(res);
				$('#result').fadeOut(10000);
				$("#email").val('');
				$("#fname").val('');
				$("#lname").val('');
				$("#password").val('');
				$("#cpassword").val('');
			   
				
			});		
		 
  		}

  	});

  	});
  </script>
</head>
<body>
<div class="container">
	<div class="col-md-2"></div>
	<div class="col-md-10 sign-up">
		<h1 align="center">Chat  Sign Up</h1>
		<a href="lost-password.php" class="pull-right">Lost Password</a> <em class="pull-right"> | </em> <a href="login.php" class="pull-right">Login</a>
		<div class="clear"></div>
		<div id="result"></div>
		<hr>
		<label>Email</label>  
		<span class="email"></span>
		<input  type="email" id="email" class="form-control">
		<label>First Name</label>
		<span class="fname"></span>
		<input type="text" class="form-control" id="fname">
		<label>Last Name</label>
		<span class="lname"></span>
		<input type="text" class="form-control" id="lname">
		<label>Password</label>
		<span class="password"></span>
		<input type="password" class="form-control" id="password">
		<label>Confirm Password</label>
		<span class="cpassword"></span>
		<input type="password" class="form-control" id="cpassword">
		<br/>
		<button class="btn btn-primary" id="btn_register" style="width:100%;">Register</button>
	</div>
	<div class="col-md-2"></div>
</div>

</body>
</html>