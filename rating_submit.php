<?php
// Include your database connection code here
include("db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the contractor and customer IDs from the form
    $contractor_id = $_POST['contractor_id'];
    $customer_id = $_POST['customer_id'];

    // Get the rating and review from the form
    $rating = $_POST['rating']; // Assuming you have a hidden input in the form for rating
    // $review = $_POST['review'];
    $rating_count = 1;
    $total_rating = $rating;
    $average_rating = $rating;

    // Check if the contractor has existing ratings
    $ext_rating_query = "SELECT * FROM contractor_ratings WHERE coid = '$contractor_id'";
    $result = mysqli_query($con, $ext_rating_query);
    $ext_result = mysqli_fetch_assoc($result);

    if ($ext_result) {
        // Contractor ratings exist, update the existing record
        $rating_count = $ext_result['rating_count'] + 1;
        $total_rating = $ext_result['total_rating'] + $rating;
        $average_rating = $total_rating / $rating_count;

        $update_query = "UPDATE contractor_ratings SET rating_count = '$rating_count', total_rating = '$total_rating', average_rating = '$average_rating' WHERE coid = '$contractor_id'";
        mysqli_query($con, $update_query);

        echo "<script type='text/javascript'> alert('Done')</script>";
        header("Refresh: 0.5; url=customer_projects.php");
    } elseif(empty($ext_result)){
        // No existing ratings, insert a new record
        $insert_query = "INSERT INTO contractor_ratings (coid, rating_count, total_rating, average_rating) VALUES ('$contractor_id', '1', '$total_rating', '$average_rating')";
        $ins_res=mysqli_query($con, $insert_query);

        if($ins_res){

        echo "<script type='text/javascript'> alert('Done')</script>";
        header("Refresh: 0.5; url=customer_projects.php");
    }
}else{

}
}
?>
