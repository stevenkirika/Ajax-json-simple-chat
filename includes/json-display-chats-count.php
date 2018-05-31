<?php
    //include connection
   require_once("connection.php");
       
        $query = "SELECT COUNT(*) FROM view_chats";
     	$result =  mysqli_query($connection, $query);
     	$res = array();
     	while($row =mysqli_fetch_array($result)){//
				        
         array_push($res, array( 'count_chats' => $row[0]));

		}//

		echo json_encode(array("result" => $res));	


?>