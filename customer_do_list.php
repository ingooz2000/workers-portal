<?php
session_start();
include("db.php");

// Check if the user is a contractor
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $contractor_query = "SELECT coid, first_name, last_name, email, phone, address, place, type FROM contractor ";
    $stmt = mysqli_prepare($con, $contractor_query);
    // mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $contractor_result = mysqli_stmt_get_result($stmt);

    if ($contractor_result && mysqli_num_rows($contractor_result) > 0) {
        $user_data = mysqli_fetch_assoc($contractor_result);
    } else {
        // Redirect or display an error message if contractor data is not found
        header("Location: error_page.php");
        exit();
    }

    $query="select first_name,last_name from customer where email ='$email' limit 1";
    $result= mysqli_query($con,$query);

    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
        
         $user_data1 =mysqli_fetch_assoc($result);
        }
    }
}

// Set the customer ID in the session
$_SESSION['contractor_id'] = isset($user_data['coid']) ? $user_data['coid'] : null;

if (isset($_SESSION['contractor_id'])) {
    // Check if the user is a contractor
    $contractor2_id = $_SESSION['contractor_id'];

    $query2 = "SELECT contractor_requests.id, contractor_requests.selected_date, contractor.first_name, contractor.last_name, contractor.email, contractor.phone, contractor.place, contractor.coid
    FROM contractor_requests
    INNER JOIN contractor ON contractor_requests.coid = contractor.coid
    WHERE contractor_requests.coid = $contractor2_id AND contractor_requests.status='finished'";
    
    // $stmt2 = mysqli_prepare($con, $query2);
    // mysqli_stmt_bind_param($stmt2, "i", $contractor2_id);
    // mysqli_stmt_execute($stmt2);
    $result2 = mysqli_query($con,$query2);

    if ($result2 && mysqli_num_rows($result2) > 0) {
        $customers = [];

        while ($row = mysqli_fetch_assoc($result2)) {
            $customerdata = array(
                'date' => $row['selected_date'],
                'name' => $row['first_name'],
                'last' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'place' => $row['place'],
                'id' => $row['coid']
            );

            $customers[] = $customerdata;
        }

        // Debug: Display approval requests data
        // print_r($customers);
        // echo "<br>";
    } else {
        // Handle case where no finished requests are found
        echo "No finished requests found for contractor.";
    }
}
?>
