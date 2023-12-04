<?php
session_start();
include("db.php");

$customerapp = []; // Initialize the variable for approval requests


// Check if the user is a contractor
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Fetch contractor profile data
    $contractor_query = "SELECT coid, first_name, last_name, email, phone, address, place, type FROM contractor WHERE email ='$email' LIMIT 1";
    $contractor_result = mysqli_query($con, $contractor_query);

    if ($contractor_result && mysqli_num_rows($contractor_result) > 0) {
        $user_data = mysqli_fetch_assoc($contractor_result);
    }

    // Include the HTML code for contractor profile
    // include("contractorhome.php");
}

 if (isset($_SESSION['contractor_id'])) {
    // Check if the user is a contractor
    $contractor_id = $_SESSION['contractor_id'];

    // Fetch approval requests for the current contractor
    $query = "SELECT contractor_requests.id, customer.first_name, customer.last_name,customer.email,customer.phone,customer.place,customer.cid
              FROM contractor_requests
              INNER JOIN customer ON contractor_requests.cid = customer.cid
              WHERE contractor_requests.coid = $contractor_id AND contractor_requests.status='pending'";

    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $customerdata = array(
                'name' => $row['first_name'],
                'last' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'place' => $row['place'],
                'id' => $row['cid']
            );
            
            // Append the array to the $contractors array
            $customerapp[] = $customerdata;
        }
    }else {
            // Redirect to login page if there are no approved requests
            header("location: contractorhome.php");
            exit();
        }


    // Include the HTML code for worker profile
    // include("workers.php");
} 

  
?>

