<?php
    //include connection
   require_once("connection.php");

   //include session
   require_once("session.php");

        $id = $_SESSION['chat_user_id'];
        $query = "SELECT COUNT(*) FROM users_tbl WHERE active_status = 1 and id != $id";
     	$result =  mysqli_query($connection, $query);
     	$res = array();
     	while($row =mysqli_fetch_array($result)){//
				        
         array_push($res, array( 'count_active' => $row[0]));

		}//

		echo json_encode(array("result" => $res));	


?>