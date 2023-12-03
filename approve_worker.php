<?php
// approve_worker.php
include("db.php");

include 'demo.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the worker ID from the POST data
    $workerId = $_POST['id'];
    $approve=$_POST['app'];

    // TODO: Implement the logic to update the worker status as approved in the database
    // For example: $result = approveWorkerInDatabase($workerId);
    if($approve){
    

    $query = "UPDATE approval_requets SET status='approved' where id='$workerId'"; 

    
    }


    // After updating the status, you can redirect back to the original page
    header("Location: workers.php");
    exit();
}
?>
