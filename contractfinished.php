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

    if ($action === 'finished') {
        $query3 = "SELECT * FROM contractor_requests WHERE coid=$contractorId AND cid=$customerId AND status='approved'";
        $checkquery3 = mysqli_query($con, $query3);

        if ($checkquery3) {
            while ($select3 = mysqli_fetch_assoc($checkquery3)) {
                $update4 = "UPDATE contractor_requests SET status='finished' WHERE id={$select3['id']}";
                mysqli_query($con, $update4);
                // echo "Status updated to finished successfully for request ID {$select3['id']}<br>";
                $update5 = "UPDATE contractor SET flag=0 WHERE contractor.coid='$contractorId'";
                header("location:contractorhome.php");
            }
        } else {
            echo "Query error: " . mysqli_error($con);
        }

    } else {
        // Handle the error for the action
        echo "Invalid action";
    }
}
?>
