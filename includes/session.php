<?php
      //start session
      session_start();

      function logged_in(){
      	return isset($_SESSION['chat_user_id']);
      }

      function confirm_logged_in(){
      	if(!logged_in()){
      		header("Location: login.php");
      	}
      }





?>