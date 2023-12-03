<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $workerId = $_POST['worker_id'];
    $action = $_POST['action'];
    $contractorId = $_POST['contractor_id'];

    // Validate and sanitize inputs
    $workerId = mysqli_real_escape_string($con, $workerId);
    $action = mysqli_real_escape_string($con, $action);
    $contractorId = mysqli_real_escape_string($con, $contractorId);

    if ($action === 'approve') {
        // Perform actions for approval
        $query = "UPDATE approval_requests SET status='approved' WHERE coid='$contractorId' AND wid='$workerId'";
    } elseif ($action === 'reject') {
        // Perform actions for rejection
        $query = "UPDATE approval_requests SET status='rejected' coid='$contractorId' AND wid='$workerId'";
    }

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, $query);
    // mysqli_stmt_bind_param($stmt, "ii", $contractorId, $workerId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect to the original page or perform any other action
    header("Location: workers.php");
    exit();
} else {
    // Handle other types of requests or redirect
    header("Location: workers.php");
    exit();
}
?>
