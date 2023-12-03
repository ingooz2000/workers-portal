<?php

include("db.php");
include("workers.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $workerId = $_POST['worker_id'];
    $approve = $_POST['app'];

   
    

    if ($approve) {
       
            
            $query = "UPDATE approval_requests SET status='approved' WHERE approval_requests.wid='$workerId'";
            $updateResult = mysqli_query($con, $query);
            echo "<script type='text/javascript'> alert('Successfully Approved')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Unsuccessfull Approved')</script>";
        }
    }
//         $statusQuery = "SELECT * FROM approval_requests WHERE approval_requsts.wid='$workerId'";
//         $statusResult = mysqli_query($con, $statusQuery);

//         if ($statusResult == 'approved' ) {
//             $nextquery = "SELECT approval_requests.id, worker.first_name, worker.last_name,worker.email,worker.phone,worker.place,worker.wid
//             FROM approval_requests
//             INNER JOIN worker ON approval_requests.wid = worker.wid
//             WHERE approval_requests.coid = $contractor_id";

//             $result = mysqli_query($con, $nextquery);
//             if ($result && mysqli_num_rows($result) > 0) {
//             while($row = mysqli_fetch_assoc($result)){
//             $workerdata1 = array(
//                 'name' => $row['first_name'],
//                 'last' => $row['last_name'],
//                 'email' => $row['email'],
//                 'phone' => $row['phone'],
//                 'place' => $row['place'],
//                 'id' => $row['wid']
//         );
        
//         // Append the array to the $contractors array
//         $workers1[] = $workerdata1;
//     }

        
// } else {
//     // Redirect to login page if the user is not logged in
//     header("location: contractorhome.php");
//     exit();
// }
// }
// }
?>
