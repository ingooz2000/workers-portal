<?php
session_start();

// Include your database connection file
include("db.php");

if (isset($_SESSION['customer_id']) && isset($_POST['contractor_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $contractor_id = $_POST['contractor_id'];

    // Validate or sanitize the contractor_id if needed

    $selectedDate = isset($_POST['selected_date']) ? $_POST['selected_date'] : '';

    if (!empty($selectedDate)) {
        // Insert a new approval request
        $insertQuery = "INSERT INTO contractor_requests (cid, coid, status, selected_date) VALUES ($customer_id, $contractor_id, 'pending', '$selectedDate')";
        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            echo "<script type='text/javascript'> alert('Approval Request sent Successfully '); window.location.href='cardview.php';</script>";
        } else {
            echo "Failed to send approval request. Please try again. Error: " . mysqli_error($con);
        }

        $flag = "UPDATE contractor SET flag = 1 WHERE contractor.coid = $contractor_id";
        $flagresult = mysqli_query($con, $flag);
    } else {
        // Date not selected
        echo "<script type='text/javascript'> alert('Please select a date before submitting the request');</script>";
        header("Refresh:0.5;url=cardview.php");
    }
} else {
    echo "Invalid request. Session: " . print_r($_SESSION, true);
}
?>
