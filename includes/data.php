<?php
    //include connection
   require_once("connection.php");

   //include session
   require_once("session.php");
     

    if($_POST['action'] == 'insert'){ //
     
      //form data
     $id = $_SESSION['chat_user_id'];
     $msg = mysqli_real_escape_string($connection, $_POST['chat_msg']);

     $query = "INSERT INTO chat_tbl (user_id, chat_msg) VALUES ('{$id}', '{$msg}')";
     $result = mysqli_query($connection, $query);
     if($result){
        echo '<div class="alert alert-info">New post posted...</div>';
     }
        else{

            echo '<div class="alert alert-danger">Something went wrong</div>';
        }

    }//


    if($_POST['action'] == 'singup'){ //
     
      //form data
     $email = mysqli_real_escape_string($connection, $_POST['email']);
     $fname =ucfirst(mysqli_real_escape_string($connection, $_POST['fname']));
     $lname =ucfirst(mysqli_real_escape_string($connection, $_POST['lname']));
     $password = md5($_POST['password']);

     //check if email exists

     $query ="SELECT * FROM users_tbl WHERE email = '$email'";
     $result = mysqli_query($connection, $query);
     $row_count= mysqli_fetch_array($result);
     
     if($row_count>0){
        //email exists
        echo '<div class="alert alert-danger">Email already exists</div>';

     }  
     else{///

             $query = "INSERT INTO users_tbl (email, firstname, lastname, password) VALUES ('{$email}', '{$fname}', '{$lname}','{$password}')";
             $result = mysqli_query($connection, $query);
             if($result){
                echo '<div class="alert alert-success alert-xs">Sing-up Successfully. Please proceed to <a href="login.php">Login</a></div>';
             }
                else{

                    echo '<div class="alert alert-danger">Something went wrong</div>';
                }
    }///

    }//


     if($_POST['action'] == 'login'){ //
     
     
     //form data
     $email = mysqli_real_escape_string($connection, $_POST['email']);
     $password = md5($_POST['password']);

     //check if email exists

     $query ="SELECT * FROM users_tbl WHERE email = '$email' and password = '$password'";
     $result = mysqli_query($connection, $query);
     $row_count= mysqli_fetch_array($result);
     
     if($row_count>0){
            $query2 ="SELECT * FROM users_tbl WHERE email = '$email' and password = '$password'";
            $result2 = mysqli_query($connection, $query2);
            while($row= mysqli_fetch_array($result2)){
                $_SESSION['chat_user_id']=$row['id'];
            }

            //update active
            $id = $_SESSION['chat_user_id'];
            $query3 = "UPDATE users_tbl SET active_status = 1 WHERE id = $id";
            $result3 = mysqli_query($connection, $query3);

            echo "<script>document.location='index.php';</script>";

     }  
     else{///

          echo '<div class="alert alert-danger">Invalid Login! Access Denied</div>';
          }///


    }//

    if($_POST['action'] == 'delete_chat'){ //
        $delete_id = $_POST['chat_id'];
        $query = "DELETE FROM chat_tbl WHERE id = $delete_id ";
        $result = mysqli_query($connection, $query);
        if($result){
           echo '<div class="alert alert-success">Chat Deleted Successfully</div>';
        }
        else{
            echo '<div class="alert alert-danger">Something went wrong</div>';     
        }


    }//



?>