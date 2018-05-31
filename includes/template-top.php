<?php

   //fetch logged in user
   
   $id = $_SESSION['chat_user_id'];
   $query = "SELECT * FROM users_tbl WHERE id = $id";
   $result = mysqli_query($connection, $query);
            while($row= mysqli_fetch_array($result)){
                $session_fname=$row['firstname'];
                $session_lname=$row['lastname'];
                $session_email=$row['email'];
            }
?>