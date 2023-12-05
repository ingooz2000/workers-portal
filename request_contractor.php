<?php
session_start();

// Include your database connection file
include("db.php");


if (isset($_SESSION['customer_id']) && isset($_POST['contractor_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $contractor_id = $_POST['contractor_id'];

    // Validate or sanitize the contractor_id if needed

    // Insert a new approval request
    $insertQuery = "INSERT INTO contractor_requests (cid, coid,status) VALUES ($customer_id, $contractor_id,'pending')";
    
    $result = mysqli_query($con, $insertQuery);

    if ($result) {
        echo "<script type='text/javascript'> alert('Approval Request sent Successfully ')</script>";
        header("Refresh:0.5;url=cardview.php");
    } else {
        echo "Failed to send approval request. Please try again. Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid request. Session: " . print_r($_SESSION, true);
}

    $flag="UPDATE contractor SET flag = 1 WHERE contractor.coid=$contractor_id";
    $flagresult = mysqli_query($con, $flag);
?>
