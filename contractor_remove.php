<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $contractorId = $_POST['contractor_id'];

    if (strtolower($action) === 'remove') {
        // Check if there are related rows in contractor_requests
        $checkQuery = "SELECT id FROM contractor_requests WHERE contractor_requests.coid = $contractorId";
        $stmtCheck = mysqli_prepare($con, $checkQuery);
        // mysqli_stmt_bind_param($stmtCheck, "i", $contractorId);
        mysqli_stmt_execute($stmtCheck);
        mysqli_stmt_store_result($stmtCheck);

        if (mysqli_stmt_num_rows($stmtCheck) > 0) {
            // If there are related rows, delete them first
            $deleteRequestsQuery = "DELETE FROM contractor_requests WHERE contractor_requests.coid = $contractorId";
            $stmtDeleteRequests = mysqli_prepare($con, $deleteRequestsQuery);
            // mysqli_stmt_bind_param($stmtDeleteRequests, "i", $contractorId);
            mysqli_stmt_execute($stmtDeleteRequests);
        }

        // Delete from approval_requests
        $deleteApprovalQuery = "UPDATE approval_requests SET approval_requests.coid = NULL WHERE coid = $contractorId";
        $stmtDeleteApproval = mysqli_prepare($con, $deleteApprovalQuery);
        // mysqli_stmt_bind_param($stmtDeleteApproval, "i", $contractorId);
        mysqli_stmt_execute($stmtDeleteApproval);

        // Delete from contractor
        $deleteContractorQuery = "DELETE FROM contractor WHERE contractor.coid = $contractorId";
        $stmtDeleteContractor = mysqli_prepare($con, $deleteContractorQuery);
        // mysqli_stmt_bind_param($stmtDeleteContractor, "i", $contractorId);
        mysqli_stmt_execute($stmtDeleteContractor);

        // Check for errors
        // if ($stmtDeleteRequests === false || $stmtDeleteApproval === false || $stmtDeleteContractor === false) {
        //     echo "Error: " . mysqli_error($con);
        // }

        // Close the statements
        mysqli_stmt_close($stmtCheck);
        // mysqli_stmt_close($stmtDeleteRequests);
        mysqli_stmt_close($stmtDeleteApproval);
        mysqli_stmt_close($stmtDeleteContractor);

        echo "<script type='text/javascript'> alert('Removed Successfully ')</script>";
        header("Refresh:0.5;url=admin_contractor_list.php");
    }
} else {
    header("location: admin_contractor_list.php");
}
?>
