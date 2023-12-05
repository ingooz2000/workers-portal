<?php

// session_start();

include("db.php");

$query = "SELECT * FROM worker "; 

$result = mysqli_query($con, $query);

$workers = array(); // Initialize an empty array to store the data

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Create an associative array for each row of data
        $workerData = array(
            'firstname' => $row['first_name'],
            'secondname' => $row['last_name'],
            'email' => $row["email"],
            'phone' => $row['phone'],
            'place' => $row['place'],
            
            'id' => $row['wid']
        );
        
        // Append the array to the $contractors array
        $workers[] = $workerData;
    }
}

// Now, the $contractors array contains all the data from the database

?>
