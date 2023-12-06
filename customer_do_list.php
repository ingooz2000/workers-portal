<?php
session_start();
include("db.php");

$customerapp = []; // Initialize the variable for approval requests
$user_data=[];
// Check if the user is a contractor
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $customer_query = "SELECT cid, first_name, last_name, email, phone, address, place FROM customer WHERE email ='$email' LIMIT 1";
    $customer_result = mysqli_query($con, $customer_query);

    if ($customer_result && mysqli_num_rows($customer_result) > 0) {
        $user_data = mysqli_fetch_assoc($customer_result);
        
    } else {
        // Debug: Display an error message if contractor data is not found
        echo "Error: customer data not found.<br>";
    }
}


$contquery="SELECT * FROM contractor";
$result=mysqli_query($con,$contquery);
if($result && mysqli_num_rows($result)>0){
    $contdata=mysqli_fetch_assoc($result);
}

// Include the HTML code for contractor profile
// include("contractorhome.php");

// $_SESSION['customer_id'] = $user_data['cid'];



if (isset($_SESSION['customer_id'])) {
    // Check if the user is a contractor
    $customerid = $_SESSION['customer_id'];

$query2 = "SELECT contractor_requests.id,contractor_requests.selected_date, contractor.first_name, contractor.last_name,contractor.email,contractor.phone,contractor.place,contractor.coid
FROM contractor_requests
INNER JOIN contractor ON contractor_requests.coid = contractor.coid
WHERE   contractor_requests.status='finished'";

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
      'id' => $row['coid']
  );

  $customers[] = $customerdata;
  
}
// print_r($customers);

// Debug: Display approval requests data
// print_r($customeracc);
// echo "<br>";
}
}

?>
