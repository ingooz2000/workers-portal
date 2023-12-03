<?php
include("db.php");
// approve_reject.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $workerId = $_POST['worker_id'];
    $action = $_POST['action'];
    $contractorId=$_POST['contractor_id'];

    if ($action === 'approve') {
        // Perform actions for approval
        $query = "UPDATE approval_requests SET status='approved' WHERE coid='$contractorId'AND wid='$workerId'";
        mysqli_query($con, $query);
    } elseif ($action === 'reject') {
        // Perform actions for rejection
        $query = "UPDATE approval_requests SET status='reject' WHERE coid='$contractorId'AND wid='$workerId'";
        mysqli_query($con, $query);
    }

    // Redirect to the original page or perform any other action
    header("Location: workers.php");
    exit();
} else {
    // Handle other types of requests or redirect
    header("Location: workers.php");
    exit();
}
?>
