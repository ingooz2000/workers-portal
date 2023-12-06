<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = mysqli_real_escape_string($con, $_POST['customer_id']);
    $action = mysqli_real_escape_string($con, $_POST['action']);
    $contractorId = mysqli_real_escape_string($con, $_POST['contractor_id']);

    if ($action === 'approve') {
        $query = "SELECT * FROM contractor_requests WHERE coid=$contractorId AND cid=$customerId AND status='pending'";
        $checkquery = mysqli_query($con, $query);

        if ($checkquery) {
            while ($select = mysqli_fetch_assoc($checkquery)) {
                $update = "UPDATE contractor_requests SET status='approved' WHERE id={$select['id']}";
                mysqli_query($con, $update);
                // echo "Status updated to approved successfully for request ID {$select['id']}<br>";
                header("location:contractorhome.php");
            }
        } else {
            echo "Query error: " . mysqli_error($con);
        }

    } elseif ($action === 'reject') {
        $query2 = "SELECT * FROM contractor_requests WHERE coid=$contractorId AND cid=$customerId AND status='pending'";
        $checkquery2 = mysqli_query($con, $query2);

        if ($checkquery2) {
            while ($select2 = mysqli_fetch_assoc($checkquery2)) {
                $update2 = "UPDATE contractor_requests SET status='rejected' WHERE id={$select2['id']}";
                $update3 = "UPDATE contractor SET flag = 0 WHERE coid=$contractorId";
                mysqli_query($con, $update2);
                mysqli_query($con, $update3);
                // echo "Status updated to reject successfully for request ID {$select2['id']}<br>";

                header("location:contractorhome.php");
            }
        } else {
            echo "Query error: " . mysqli_error($con);
        }
    } else {
        echo "Invalid action";
    }
}
?>
