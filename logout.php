<?php
   //include connection
   require_once("includes/connection.php");

   //include session
   require_once("includes/session.php");

            //update inactive
            $id = $_SESSION['chat_user_id'];
            $query3 = "UPDATE users_tbl SET active_status = 0 WHERE id = $id";
            $result3 = mysqli_query($connection, $query3);


		// Four steps to closing a session
		// (i.e. logging out)

		// 1. Find the session
		//session_start();
		
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destroy the session
		session_destroy();
		
		header("Location:login.php");
?>