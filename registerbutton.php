<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register_as'])) {
        $registration_type = $_POST['register_as'];

        if ($registration_type === "Register as Customer") {
            // Handle customer registration
            header("location: customer_signup.html");
            die;
        } elseif ($registration_type === "Register as Contractor") {
            // Handle contractor registration
            header("location: contractor_signup.html");
            die;
        } elseif ($registration_type === "Register as Worker") {
            // Handle worker registration
            header("location: worker_signup.html");
            die;
        }
    }
    // Handle the case where no registration type is selected
    echo "Please select a registration type.";
}
?>