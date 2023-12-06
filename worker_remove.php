<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $workerId = $_POST['worker_id'];

    if (strtolower($action) === 'remove') {
        // Check if there are related rows in approval_requests
        $checkQuery = "SELECT id FROM approval_requests WHERE wid = $workerId";
        $resultCheck = mysqli_query($con, $checkQuery);

        if ($resultCheck && mysqli_num_rows($resultCheck) > 0) {
            // If there are related rows, delete them first
            $deleteRequestsQuery = "DELETE FROM approval_requests WHERE wid = $workerId";
            $resultDeleteRequests = mysqli_query($con, $deleteRequestsQuery);

            if (!$resultDeleteRequests) {
                // Handle the error if the deletion of approval requests fails
                echo "Error deleting approval requests: " . mysqli_error($con);
            }
        }

        // Now, delete from the worker table
        $deleteWorkerQuery = "DELETE FROM worker WHERE wid = $workerId";
        $resultDeleteWorker = mysqli_query($con, $deleteWorkerQuery);

        if ($resultDeleteWorker) {
            // If the worker deletion is successful, show a success message
            echo "<script type='text/javascript'> alert('Removed Successfully ')</script>";
            header("Refresh:0.5;url=admin_worker_list.php");
        } else {
            // Handle the error if the deletion of the worker fails
            echo "Error deleting worker: " . mysqli_error($con);
        }
    }
} else {
    header("location: admin_worker_list.php");
}
?>
