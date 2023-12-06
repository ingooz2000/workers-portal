<?php
session_start();
include("db.php");

$workerspen = []; // Initialize the variable for approval requests
$workersapp = [];

// Check if the user is a contractor
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Fetch contractor profile data
    $contractor_query = "SELECT coid, first_name, last_name, email, phone, address, place, type FROM contractor WHERE email ='$email' LIMIT 1";
    $contractor_result = mysqli_query($con, $contractor_query);

    if ($contractor_result && mysqli_num_rows($contractor_result) > 0) {
        $user_data = mysqli_fetch_assoc($contractor_result);
    } else {
        // Handle the case where no contractor profile is found
        // You might want to redirect the user or show an error message
    }
    
    $_SESSION['contractor_id'] = $user_data['coid'];
}

// Check if the contractor_id session variable is set
if (isset($_SESSION['contractor_id'])) {
    $contractor_id = $_SESSION['contractor_id'];

    // Fetch approval requests for the current contractor
    $query = "SELECT approval_requests.id, worker.first_name, worker.last_name, worker.email, worker.phone, worker.place, worker.wid
              FROM approval_requests
              INNER JOIN worker ON approval_requests.wid = worker.wid
              WHERE approval_requests.coid = $contractor_id AND approval_requests.status='pending'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $workerdata = array(
                'name' => $row['first_name'],
                'last' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'place' => $row['place'],
                'id' => $row['wid']
            );
            
            // Append the array to the $contractors array
            $workerspen[] = $workerdata;

                    // echo "Approval Requests Data: ";
                    // print_r($workerspen);
                    // echo "<br>";
        }
    }
}

// Check for approved requests
if (isset($_SESSION['contractor_id'])) {
    $contractor_id = $_SESSION['contractor_id'];

    $nextquery = "SELECT approval_requests.id, worker.first_name, worker.last_name, worker.email, worker.phone, worker.place, worker.wid
                    FROM approval_requests
                    INNER JOIN worker ON approval_requests.wid = worker.wid
                    WHERE approval_requests.coid = $contractor_id AND approval_requests.status='approved'";

    $result2 = mysqli_query($con, $nextquery);

    if ($result2 && mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $workerdata = array(
                'name' => $row['first_name'],
                'last' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'place' => $row['place'],
                'id' => $row['wid']
            );

            // Append the array to the $workers1 array
            $workersapp[] = $workerdata;
        }
    } 
    // else {
    //     // Redirect to login page if there are no approved requests
    //     header("location: workers.php");
    //     exit();
    // }
}

// Function to compare arrays based on the 'email' key
function compareByEmail($a, $b) {
    return strcmp($a['email'], $b['email']);
}

// Remove duplicates and sort $workerspen
$workerspen = array_values(array_unique($workerspen, SORT_REGULAR));
usort($workerspen, 'compareByEmail');

// Remove duplicates and sort $workersapp
$workersapp = array_values(array_unique($workersapp, SORT_REGULAR));
usort($workersapp, 'compareByEmail');


?>


