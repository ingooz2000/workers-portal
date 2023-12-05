<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customer_id'];
    $action = $_POST['action'];
    $contractorId = $_POST['contractor_id'];

    // Validate and sanitize inputs
    $customerId = mysqli_real_escape_string($con, $customerId);
    $action = mysqli_real_escape_string($con, $action);
    $contractorId = mysqli_real_escape_string($con, $contractorId);  // Corrected variable name

    if (strtolower($action) === 'approve') {
        // Perform actions for approval
        $query = "UPDATE contractor_requests SET status='approved' WHERE coid='$contractorId' AND cid='$customerId'";
    } elseif (strtolower($action) === 'reject') {
        // Perform actions for rejection
        $query2 = "UPDATE contractor_requests SET status='reject' WHERE coid='$contractorId' AND cid='$customerId'";
        
        // Execute the query
        if ($con->query($query2) === TRUE) {
            // Query executed successfully
            $flagQuery = "UPDATE contractor SET flag = 0 WHERE coid=$contractorId";
    
            // Execute the second query
            if ($con->query($flagQuery) === TRUE) {
                // Second query executed successfully
            } else {
                // Handle the error for the second query
                echo "Error updating flag: " . $con->error;
            }
        } else {
            // Handle the error for the first query
            echo "Error updating status: " . $con->error;
        }
    }

    // Redirect to the original page or perform any other action
    header("Location: contractorhome.php");
    exit();
} else {
    // Handle other types of requests or redirect
    header("Location: contractorhome.php");
    exit();
}
?>
