<?php 
include 'workerapprove.php';
// include 'approve_worker.php';

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
        <h1 class="text-light"><a href="index.html"><?php echo $user_data['first_name'] .' '. $user_data['coid']; ?></a></h1>
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
          <li><a href="approved_worker.php"><i class="bx bx-file-blank"></i> <span>Approved Worker</span></a></li>
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
    
    <!-- You can add a dropdown or handle notifications with JavaScript here -->
  </div>
  

<h2>Approved Workers</h2>
<?php
    foreach ($workersapp as $workerapp) {
        
        
  ?>

  <div class="worker-card">
    
    <p class="worker-info">Worker ID: <?php echo $workerapp['id']; ?>, Name: <?php echo $workerapp['name'] . " " . $workerapp['last']; ?></p>
    <p class="worker-info">Email: <?php echo $workerapp['email']; ?>, Phone: <?php echo $workerapp['phone'] ; ?></p>
    <p class="worker-info">Place: <?php echo $workerapp['place']; ?>, ID: <?php echo $workerapp['id'] ; ?></p>
   </div>


  
<?php
    }
?>


</section>

</main>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>


  
</body>
</html>