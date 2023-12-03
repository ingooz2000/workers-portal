<?php
session_start();
include("db.php");

// Check if the contractor is logged in
if (!isset($_SESSION['contractor_id'])) {
    
    exit();
}
else{

// Get the contractor's ID
$contractor_id = $_SESSION['contractor_id'];

// Fetch approval requests for the current contractor
$query = "SELECT approval_requests.id, worker.first_name, worker.last_name
          FROM approval_requests
          INNER JOIN worker ON approval_requests.wid = worker.wid
          WHERE approval_requests.coid = $contractor_id";


$result = mysqli_query($con, $query);}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Workers Portal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="home/img/favicon.png" rel="icon">
  <link href="home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="home/vendor/aos/aos.css" rel="stylesheet">
  <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="styleindex.css" rel="stylesheet">
  <link rel="stylesheet" href="editsec.css">

  </head>

<body>



  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php include 'contractor_profilename.php'; echo $user_data['first_name'] .' '. $user_data['coid']; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          
          <li><a href="contractorhome.php" ><i class="bx bx-home"></i> <span>About</span></a></li>
          <li><a href="workers.php" ><i class="bx bx-file-blank"></i> <span>Workers</span></a></li>
          <li><a href="#portfolio" ><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="contractoredit.php" ><i class="bx bx-server"></i> <span>Edit</span></a></li>
          <li><a href="logout.php"><i class="bx bx-log-out"></i> <span>Logout</span></a></li>
         
        </ul>
      </nav><!-- .nav-menu -->

      

    

    </div>
  </header>
  <main id="main">

  <section id="about" class="about">
    <div class="container">
    <div class="notification-bell">
    <i class="fas fa-bell"></i>
    <span class="notification-count">3</span>
    <!-- You can add a dropdown or handle notifications with JavaScript here -->
  </div>

    <div>
    <h1>Contractor Profile</h1>

    <h2>Approval Requests</h2>
    

    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Display the worker's name
                            echo "<p>Worker ID: " . $row['id'] . ", Name: " . $row['first_name'] . " " . $row['last_name'] . "</p>";
                            // Add approve and reject buttons with appropriate links
                            echo '<button onclick="approveWorker(' . $row['id'] . ')">Approve</button>';
                            echo '<button onclick="rejectWorker(' . $row['id'] . ')">Reject</button>';
                        }
                    } else {
                        // No approval requests found for the contractor
                        echo "<p>No approval requests found for the contractor.</p>";
                    }
                    ?>
    
</div>

  

</section>

</main>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>


  
</body>
</html>