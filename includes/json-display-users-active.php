<?php
    //include connection
   require_once("connection.php");

   //include session
   require_once("session.php");

      $id = $_SESSION['chat_user_id'];
      $query = "SELECT * FROM users_tbl WHERE id != $id ORDER BY active_status DESC";
     	$result =  mysqli_query($connection, $query);
     	$res = array();
     	while($row =mysqli_fetch_array($result)){//
				     $active =  $row['active_status'];
             if($active == 1){
              $class = "active";
             }   
             else{
              $class = "";
             }
         array_push($res, array( 'active' => $class,
                                 'id' => $row[0],
                                 'firstname' => $row[1],
                                 'lastname' => $row[2]
                                  ));

		}//

		echo json_encode(array("result" => $res));	


?>