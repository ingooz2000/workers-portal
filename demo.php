<?php
session_start();
include("db.php");

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
    $query = "SELECT approval_requests.id, worker.first_name, worker.last_name
              FROM approval_requests
              INNER JOIN worker ON approval_requests.wid = worker.wid
              WHERE approval_requests.coid = $contractor_id";

    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

    // Include the HTML code for worker profile
    // include("workers.php");
} else {
    // Redirect to login page if the user is not logged in
    header("location: contractorhome.php");
    exit();
}
}
?>
