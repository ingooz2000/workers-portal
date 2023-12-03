<?php
// approve_worker.php
include("db.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $workerId = $_POST['id'];
    $approve = $_POST['app'];

   
    $statusQuery = "SELECT status FROM approval_requests WHERE id='$workerId'";
    $statusResult = mysqli_query($connection, $statusQuery);

    if ($statusResult) {
        $row = mysqli_fetch_assoc($statusResult);
        $currentStatus = $row['status'];

        
        if ($currentStatus !== 'approved' && $approve) {
            
            $query = "UPDATE approval_requests SET status='approved' WHERE id='$workerId'";
            $updateResult = mysqli_query($connection, $query);

            if (!$updateResult) {
               
                die("Error updating status: " . mysqli_error($connection));
            }

            
            header("Location: workers.php");
            exit();
        } else {
            
            die("Worker is already approved.");
        }
    } else {
        
        die("Error fetching status: " . mysqli_error($connection));
    }
}
?>
