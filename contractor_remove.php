<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $action = $_POST['action'];
    $contractorId = $_POST['contractor_id'];


    if (strtolower($action) === 'remove') {
        // Debug: Echo the values for troubleshooting
        echo "Contractor ID: $contractorId, Customer ID: $customerId, Action: Approve";

        $query = "DELETE FROM contractor WHERE coid = $contractorId";
}
}

?>