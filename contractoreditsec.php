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
        $type=$_POST['type'];
        
        if(!empty($name) && $type!="select")
        {
            $query = "UPDATE contractor
           SET first_name = '$name',last_name='$secname',email='$gmail', phone = '$phone',address='$address',place='$place', type = '$type'
          WHERE email = '$gmail'";


            mysqli_query($con, $query) or die(mysqli_error($con));

            echo "<script type='text/javascript'> alert('Updated Successfully ')</script>";
            header("location:contractoredit.php");

        }
        else
        {
            echo "<script type='text/javascript'> alert('Please Enter some valid information')</script>";
        
        }



    }
?>