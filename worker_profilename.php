<?php
    session_start();

    include("db.php");

    $email= $_SESSION['email'];
    
    if($email===null || empty($email)){
      header("location:login.php");
    }
    else{

    $query="select wid,first_name,last_name,email,phone,address,place from worker where email ='$email' limit 1";
    
    $result= mysqli_query($con,$query);

    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
        
         $user_data2 =mysqli_fetch_assoc($result);
        }
    }
    
    }
     
?>