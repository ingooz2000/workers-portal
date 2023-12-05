<?php
    session_start();

    include("db.php");

    $email= $_SESSION['email'];
    if($email===null || empty($email)){
      header("location:login.php");
    }
    else{

    $query="SELECT aid,name,email,phone FROM admin WHERE email ='$email' limit 1";

    
    $result= mysqli_query($con,$query);

    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
        
         $admin_data =mysqli_fetch_assoc($result);
        }
    }
    
    

    $query2="select cid,first_name,last_name,email,phone,address,place from customer where email ='$email' limit 1";

    $result2= mysqli_query($con,$query2);

    if($result2)
    {
        if($result2 && mysqli_num_rows($result2) > 0)
        {
        
         $user_data1 =mysqli_fetch_assoc($result2);
        }
    }

    $query3="select coid,first_name,last_name,email,phone,address,place,type from contractor where email ='$email' limit 1";

    $result3= mysqli_query($con,$query3);

    if($result3)
    {
        if($result3 && mysqli_num_rows($result3) > 0)
        {
        
         $user_data =mysqli_fetch_assoc($result3);
        }
    }

    $query4="select wid,first_name,last_name,email,phone,address,place from worker where email ='$email' limit 1";

    $result4= mysqli_query($con,$query4);

    if($result4)
    {
        if($result4 && mysqli_num_rows($result4) > 0)
        {
        
         $user_data2 =mysqli_fetch_assoc($result4);
        }
    }
}      
?>