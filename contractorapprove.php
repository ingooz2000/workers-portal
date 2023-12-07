<?php
session_start();
include("db.php");

$customerapp = []; // Initialize the variable for approval requests

// Check if the user is a contractor
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $contractor_query = "SELECT coid, first_name, last_name, email, phone, address, place, type FROM contractor WHERE email ='$email' LIMIT 1";
    $contractor_result = mysqli_query($con, $contractor_query);

    if ($contractor_result && mysqli_num_rows($contractor_result) > 0) {
        $user_data = mysqli_fetch_assoc($contractor_result);
    } else {
        // Debug: Display an error message if contractor data is not found
        echo "Error: Contractor data not found.<br>";
    }
}

// Include the HTML code for contractor profile
// include("contractorhome.php");

$_SESSION['contractor_id'] = $user_data['coid'];

if (isset($_SESSION['contractor_id'])) {
    // Check if the user is a contractor
    $contractor2_id = $_SESSION['contractor_id'];

    $query = "SELECT contractor_requests.id,contractor_requests.selected_date, customer.first_name, customer.last_name,customer.email,customer.phone,customer.place,customer.cid
              FROM contractor_requests
              INNER JOIN customer ON contractor_requests.cid = customer.cid
              WHERE contractor_requests.coid = $contractor2_id AND contractor_requests.status='pending'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customerdata = array(
                'date' => $row['selected_date'],
                'name' => $row['first_name'],
                'last' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'place' => $row['place'],
                'id' => $row['cid']
            );

            $customerapp[] = $customerdata;
            print_r($customerapp);
        }

       
    } else {
        // Session write close before the redirection
        session_write_close();

        // Redirect to login page if there are no approved requests
        // header("location: contractorhome.php");
        // exit();
    }
}

if (isset($_SESSION['contractor_id'])) {
    // Check if the user is a contractor
    $contractor2_id = $_SESSION['contractor_id'];

$query2 = "SELECT contractor_requests.id,contractor_requests.selected_date, customer.first_name, customer.last_name,customer.email,customer.phone,customer.place,customer.cid
FROM contractor_requests
INNER JOIN customer ON contractor_requests.cid = customer.cid
WHERE contractor_requests.coid = $contractor2_id AND contractor_requests.status='approved'";

$result2 = mysqli_query($con, $query2);

if ($result2 && mysqli_num_rows($result2) > 0) {
while ($row = mysqli_fetch_assoc($result2)) {
  $customerdata = array(
      'date' => $row['selected_date'],
      'name' => $row['first_name'],
      'last' => $row['last_name'],
      'email' => $row['email'],
      'phone' => $row['phone'],
      'place' => $row['place'],
      'id' => $row['cid']
  );

  $customeracc[] = $customerdata;
//   print_r($customeracc);
  
}

// Debug: Display approval requests data
// print_r($customeracc);
// echo "<br>";
}
}


if (isset($_SESSION['contractor_id'])) {
    // Check if the user is a contractor
    $customerid = $_SESSION['contractor_id'];

$query3 = "SELECT contractor_requests.id,contractor_requests.selected_date,contractor_requests.completed_date, customer.first_name, customer.last_name,customer.email,customer.phone,customer.place,customer.cid
FROM contractor_requests
INNER JOIN customer ON contractor_requests.cid = customer.cid
WHERE   contractor_requests.status='finished'";

$result3 = mysqli_query($con, $query3);

if ($result3 && mysqli_num_rows($result3) > 0) {
while ($row = mysqli_fetch_assoc($result3)) {
  $customerdata = array(
      'date' => $row['selected_date'],
      'cdate' => $row['completed_date'],
      'name' => $row['first_name'],
      'last' => $row['last_name'],
      'email' => $row['email'],
      'phone' => $row['phone'],
      'place' => $row['place'],
      'id' => $row['cid']
  );

  $customersc[] = $customerdata;
  
}
// print_r($customersc);

// Debug: Display approval requests data
// print_r($customeracc);
// echo "<br>";
} else{

}
}


?>
