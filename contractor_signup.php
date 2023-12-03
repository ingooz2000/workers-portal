<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $firstname=$_POST['first'];
        $lastname=$_POST['last'];
        $gmail=$_POST['mail'];
        $phno=$_POST['phno'];
        $address=$_POST['add'];
        $password=$_POST['pass'];
        // $confirmpassword=$_POST['cfpass'];
        $place=$_POST['place'];
        $type=$_POST['type'];

        if(!empty($gmail) && !empty($password) && $type!='select')
        {
            $query ="insert into contractor (first_name,last_name,email,phone,address,place,password,type) values ('$firstname','$lastname','$gmail','$phno','$address','$place','$password','$type')";

            mysqli_query($con, $query) or die(mysqli_error($con));

            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
            header("location: login.html");


        }
        else
        {
            echo "<script type='text/javascript'> alert('Please Enter some valid information')</script>";
        
        }



    }
?>