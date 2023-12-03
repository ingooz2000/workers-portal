<?php
session_start();
include("db.php");

// Check if the contractor is logged in
if (!isset($_SESSION['contractor_id'])) {
    
    exit();
}
else{

// Get the contractor's ID
$contractor_id = $_SESSION['contractor_id'];

// Fetch approval requests for the current contractor
$query = "SELECT approval_requests.id, worker.first_name, worker.last_name
          FROM approval_requests
          INNER JOIN worker ON approval_requests.wid = worker.wid
          WHERE approval_requests.coid = $contractor_id";


$result = mysqli_query($con, $query);}

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); 
      
}
// Include the HTML code
include("workers.php")
?>
