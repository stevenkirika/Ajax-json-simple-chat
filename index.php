<?php
   //include connection
   require_once("includes/connection.php");

   //include session
   require_once("includes/session.php");

   //restrict access
   confirm_logged_in();

   //include logged in user info
   include("includes/template-top.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title class="count">Json (0)</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="js/jquery.min.js"></script>
  <script>
	$(function(){
		//insert record
		$('#insert_post').click(function(){
			var msg = $('#msg').val();

			//syntax - $.post('filename', {data}, function(response){});
			$.post('includes/data.php',{action: "insert",chat_msg:msg},function(res){
				$('#result').fadeIn(5000);
				$('#result').html(res);
				$('#result').fadeOut(5000);
				$("#msg").val('');
				
			});		
		});

		
	

	});
$(document).on('click', '#delete',  function() {
	 
		var id = $(this).attr('rel');
		confirm('Delete this?');
		$.post('includes/data.php',{action: "delete_chat", chat_id:id},function(res){
				$('#result').fadeIn(3000);
				$('#result').html(res);
				$('#result').fadeOut(3000);
				
			});	
	 
});	

		</script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid navbar">
<div class="container">
	<div class="row">
	<div class="col-md-4"><h3>AJAX CHAT</h3></div>
	<div class="col-md-8">
		<ul class="nav navbar-top-links navbar-right">
                 
  
                <!-- /.dropdown -->
                <li><b>Welcome <?php echo $session_fname.' '.$session_lname; ?></b></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
	</div>
	</div>
</div>
</div>

<div class="container">

	 
     <div class="col-md-9">
     	 
     	<label>What are you thinking? </label>
     	<div id="result"></div>
     	<textarea name="msg" id="msg" class="form-control" required=""></textarea><br>
     	<button id="insert_post" class="btn btn-primary pull-right">POST</button>
     	 
     	<div class="clear"></div>
     

        <div class="post-list"></div>
     	
     </div>
     <div class="col-md-3"><b class="users-active">Online(0)</b>
      <div class="online-box">
      	<ul class="users-online"></ul> 
      </div>
     </div>
</div>
</body>
</html>
<script type="text/javascript">

//call function
$(document).ready( function() {
 display_chat_msg(); 
});
	 function display_chat_msg() {
	  setTimeout( function() { 
	  chat_msges();
	  chat_msges_count();
	  users_active_count();
	  users_active();
	  display_chat_msg();
	  }, 2000);
   }
   
   function chat_msges(){
   	   $.getJSON("includes/json-display-chats.php", function(data) {
       $("div.post-list").empty();
	   $.each(data.result, function(){
	   $("div.post-list").append("<hr><div class=\"row\" id=\"msg-box\"><div class=\"col-md-1\"><em class=\""+this['em_style']+"\">"+this['letter']+"</em></div><div class=\"col-md-11\"><small class=\"from\">From: "+this['firstname']+" "+this['lastname']+"</small> <small class=\"time pull-right\">"+this['chat_date_time']+"</small><br><p>"+this['chat_msg']+"</p><a id=\"delete\" href=\"#\"  rel=\""+this['id']+"\"  class=\"pull-right\"><span class=\"glyphicon glyphicon-trash\"></span></a></div></div>");
	   });
 });
   }

    function chat_msges_count(){
   	   $.getJSON("includes/json-display-chats-count.php", function(data) {
       $("title.count").empty();
	   $.each(data.result, function(){
	   $("title.count").append("Json ("+this['count_chats']+")");
	   });
 });
   }

    function users_active_count(){
   	   $.getJSON("includes/json-display-users-active-count.php", function(data) {
       $("b.users-active").empty();
	   $.each(data.result, function(){
	   $("b.users-active").append("Online("+this['count_active']+")");
	   });
 });
   }

   function users_active(){
   	   $.getJSON("includes/json-display-users-active.php", function(data) {
       $("ul.users-online").empty();
	   $.each(data.result, function(){
	   $("ul.users-online").append("<li><a href=\"\"><i class=\"fa fa-circle "+this['active']+"\"></i> "+this['firstname']+" "+this['lastname']+"");
	   });
 });
   }


</script>