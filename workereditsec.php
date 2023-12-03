<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name=$_POST['first'];
        $secname=$_POST['second'];
        $gmail=$_POST['mail'];
        $address=$_POST['add'];
        $phone=$_POST['phno'];
        $place=$_POST['place'];
       
        
        if(!empty($name) )
        {
            $query = "UPDATE worker
          SET first_name = '$name',last_name='$secname',email='$gmail', phone = '$phone',address='$address',place='$place'
          WHERE email = '$gmail'";


            mysqli_query($con, $query) or die(mysqli_error($con));

            echo "<script type='text/javascript'> alert('Successfully Entered')</script>";
            header("location:workeredit.php");

        }
        else
        {
            echo "<script type='text/javascript'> alert('Please Enter some valid information')</script>";
        
        }



    }
?>