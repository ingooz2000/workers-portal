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
        // Perform actions for finishing
        $query = "UPDATE contractor_requests SET status='Finished' WHERE coid='$contractorId' AND cid='$customerId'";

        // Execute the query
        if ($con->query($query) === TRUE) {
            // Query executed successfully
            $flagQuery = "UPDATE contractor SET flag = 0 WHERE coid=$contractorId";

            // Execute the second query
            // if ($con->query($flagQuery) === TRUE) {
            //     Second query executed successfully
            //     echo "<script type='text/javascript'> 
            //             alert('Updated Successfully');
            //             setTimeout(function(){
            //                 window.location.href = 'contractorhome.php';
            //             }, 3000);
            //           </script>";
            //     exit();  // Don't forget to exit after redirecting
             else {
                // Handle the error for the second query
                echo "Error updating flag: " . $con->error;
            }
        } else {
            // Handle the error for the first query
            echo "Error updating status: " . $con->error;
        }
    }
    header("Location: contractorhome.php");
exit();
} 

// Handle other types of requests or redirect
header("Location: contractorhome.php");
exit();
?>
