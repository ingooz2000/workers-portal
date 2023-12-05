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
    $contractorId = mysqli_real_escape_string($con, $contractorId);

    if (strtolower($action) === 'approve') {
        // Debug: Echo the values for troubleshooting
        echo "Contractor ID: $contractorId, Customer ID: $customerId, Action: Approve";

        // Perform actions for approval
        $query = "UPDATE contractor_requests SET status='approved' WHERE coid='$contractorId' AND cid='$customerId'";
        
    } elseif (strtolower($action) === 'reject') {
        // Debug: Echo the values for troubleshooting
        echo "Contractor ID: $contractorId, Customer ID: $customerId, Action: Reject";

        // Perform actions for rejection
        $query = "UPDATE contractor_requests SET status='reject' WHERE coid='$contractorId' AND cid='$customerId'";

        // Also update the flag to 0 for "reject" action
        $flagQuery = "UPDATE contractor SET flag = 0 WHERE coid=$contractorId";
    }

    // Debug: Echo the query for troubleshooting
    echo "Query: $query";

    // Execute the query
    if ($con->query($query) === TRUE) {
        // Query executed successfully

        if (isset($flagQuery) && $con->query($flagQuery) !== TRUE) {
            // Handle the error for the flag update query
            echo "Error updating flag: " . $con->error;
        }

        echo ucfirst($action) . " successful!";
    } else {
        // Handle the error for the main query
        echo "Error updating status: " . $con->error;
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
