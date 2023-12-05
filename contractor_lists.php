<?php

// session_start();

include("db.php");

$query = "SELECT * FROM contractor WHERE flag=0"; 

$result = mysqli_query($con, $query);

$contractors = array(); // Initialize an empty array to store the data

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Create an associative array for each row of data
        $contractorData = array(
            'name' => $row['first_name'],
            'email' => $row["email"],
            'phone' => $row['phone'],
            'place' => $row['place'],
            'type' => $row['type'],
            'id' => $row['coid']
        );
        
        // Append the array to the $contractors array
        $contractors[] = $contractorData;
    }
}

// Now, the $contractors array contains all the data from the database

?>
