<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $customerId = $_POST['customer_id'];

    if (strtolower($action) === 'remove') {
        // Check if there are related rows in contractor_requests
        $checkQuery = "SELECT id FROM contractor_requests WHERE contractor_requests.cid = ?";
        $stmtCheck = mysqli_prepare($con, $checkQuery);
        mysqli_stmt_bind_param($stmtCheck, "i", $customerId);
        mysqli_stmt_execute($stmtCheck);
        mysqli_stmt_store_result($stmtCheck);

        if (mysqli_stmt_num_rows($stmtCheck) > 0) {
            // If there are related rows, delete them first
            $deleteRequestsQuery = "DELETE FROM contractor_requests WHERE contractor_requests.cid = ?";
            $stmtDeleteRequests = mysqli_prepare($con, $deleteRequestsQuery);
            mysqli_stmt_bind_param($stmtDeleteRequests, "i", $customerId);
            mysqli_stmt_execute($stmtDeleteRequests);
        }

        // Delete from approval_requests
        $deleteApprovalQuery = "UPDATE approval_requests SET coid = NULL WHERE coid = ?";
        $stmtDeleteApproval = mysqli_prepare($con, $deleteApprovalQuery);
        mysqli_stmt_bind_param($stmtDeleteApproval, "i", $customerId);
        mysqli_stmt_execute($stmtDeleteApproval);

        // Delete from contractor
        $deleteCustomerQuery = "DELETE FROM customer WHERE customer.cid = ?";
        $stmtDeleteCustomer = mysqli_prepare($con, $deleteCustomerQuery);
        mysqli_stmt_bind_param($stmtDeleteCustomer, "i", $customerId);
        mysqli_stmt_execute($stmtDeleteCustomer);

        // Check for errors
        // if ($stmtDeleteRequests === false || $stmtDeleteApproval === false || $stmtDeleteCustomer === false) {
        //     echo "Error: " . mysqli_error($con);
        // }

        // Close the statements
        mysqli_stmt_close($stmtCheck);
        // mysqli_stmt_close($stmtDeleteRequests);
        mysqli_stmt_close($stmtDeleteApproval);
        mysqli_stmt_close($stmtDeleteCustomer);

        echo "<script type='text/javascript'> alert('Removed Successfully ')</script>";
        header("Refresh:0.5;url=admin_customer_list.php");
    }
} else {
    header("location: admin_customer_list.php");
}
?>
