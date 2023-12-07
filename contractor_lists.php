<?php

// session_start();

include("db.php");

$query = "SELECT c.coid, c.first_name, c.last_name, c.type, c.place, c.phone, c.email, cr.average_rating
FROM contractor c
LEFT JOIN contractor_ratings cr ON c.coid = cr.coid"; 

$result = mysqli_query($con, $query);

$contractors = array(); // Initialize an empty array to store the data

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Create an associative array for each row of data
        $contractorData = array(
            'firstname' => $row['first_name'],
            'secondname' => $row['last_name'],
            'email' => $row["email"],
            'phone' => $row['phone'],
            'place' => $row['place'],
            'type' => $row['type'],
            'id' => $row['coid'],
            'rating'=>$row['average_rating']
        );
        
        // Append the array to the $contractors array
        $contractors[] = $contractorData;
    }
}

// Now, the $contractors array contains all the data from the database
// $sql = "SELECT c.id, c.firstname, c.secondname, c.type, c.place, c.phone, c.email, cr.rating
//         FROM contractors c
//         LEFT JOIN contractor_ratings cr ON c.id = cr.contractorid";

// $result2 = mysqli_query($connection, $sql);

// $contractors = array();

// while ($row = mysqli_fetch_assoc($result2)) {
//     $contractorrat[] = $row;
// }

// // Close the database connection
// mysqli_close($connection);



?>
