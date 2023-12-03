<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail=$_POST['mail'];
        $password=$_POST['pass'];
        


        if(!empty($gmail) && !empty($password))
        {
            $query="SELECT email, password, role
            FROM customer
            WHERE email = '$gmail'
            UNION
            SELECT email, password, role
            FROM contractor
            WHERE email = '$gmail'
            UNION
            SELECT email, password, role
            FROM worker
            WHERE email = '$gmail'
            LIMIT 1;";
            $result= mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data =mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        $_SESSION['email'] = $gmail;
                        $_SESSION['loggedInUserId'] = $row['cid'];
                        
                        
                        if($user_data['role']=="customer"){
                            header("location:customerhome.php");
                            die;
                        }
                        else if($user_data['role']=="contractor"){
                            header("location:contractorhome.php");
                            die;
                        }
                        else{
                            header("location:workerhome.php");
                            die;
                        }
                        echo "<script type='text/javascript'> alert('Log In Success')</script>";

                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong Username or passsword')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Wrong Username or passsword')</script>";
        }
    }
?>