<?php
    session_start();

    include("db.php");

    $email= $_SESSION['email'];
    if($email===null || empty($email)){
      header("location:login.php");
    }
    else{

    $query="select cid,first_name,last_name,email,phone,address,place from customer where email ='$email' limit 1";
    $result= mysqli_query($con,$query);

    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
        
         $user_data1 =mysqli_fetch_assoc($result);
        }
    }
    
    }
         
?>