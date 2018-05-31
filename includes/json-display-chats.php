<?php
    //include connection
   require_once("connection.php");
       
        $query = "SELECT * FROM view_chats ORDER BY chat_date_time DESC";
     	$result =  mysqli_query($connection, $query);
     	$count = 0;
     	$res = array();
     	while($row =mysqli_fetch_array($result)){//
				         
				          if($count%2==0){
				          	$em ="even";
				          }
				          else{
				          	$em = "odd";
				          }
				    $firstletter = substr($row['firstname'], 0,1);
         array_push($res, array('letter' => $firstletter,
         	                    'em_style'=> $em,
         	                    'id' => $row[4],
			                    'user_id'  => $row[5],
								'chat_msg' => $row[6],
								'read_status' => $row[8],									  
			 			        'chat_date_time' => $row[7],
			 			        'firstname' => $row[0],
                                'lastname' => $row[1]));


         $count++;
		}//

		echo json_encode(array("result" => $res));	


?>