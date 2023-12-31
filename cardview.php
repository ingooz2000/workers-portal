<?php
include 'customer_profilename.php';
$customerid=$user_data1['cid'];
$_SESSION['customer_id'] = $customerid;
?>


<!DOCTYPE html>
<html>

    
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
  <!-- <link href="home/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="cardview.css">
  <link href="styleindex.css" rel="stylesheet">

  <!-- Add these script tags to include jQuery and jQuery UI -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




  </head>
    

<body>


  
     <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
  <div class="d-flex flex-column">

    <div class="profile">
      <img src="" alt="" class="img-fluid rounded-circle">
      <h1 class="text-light"><a href="index.html"><?php  echo $user_data1['first_name'].' '.$user_data1['last_name']; ?></a></h1>
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
        
        <li><a href="customerhome.php" ><i class="bx bx-home"></i> <span>About</span></a></li>
        <li><a href="cardview.php"><i class="bx bx-file-blank"></i> <span>Contractors</span></a></li>
        <li><a href="customer_projects.php" ><i class="bx bx-book-content"></i> <span>Previous Projects</span></a></li>
        <li><a href="customeredit.php" ><i class="bx bx-server"></i> <span>Edit</span></a></li>
        <li><a href="logout.php"><i class="bx bx-log-out"></i> <span>Logout</span></a></li>
       
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header>
<main id="main">
    <section id="about" class="about">
      <div class="container">
        <!-- Add a form for filtering -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-4">
          <label for="filterInput">Filter Contractors:</label>
          <div class="styled-select">
            <input type="text" id="filterInput" name="filterInput" placeholder="Type to filter">
            <button type="submit">Filter</button>
          </div>
        </form>

        <div class="contractor-card-container">
          <?php
          include("contractor_lists.php");
          // Check if a filter term is provided
          $filterTerm = isset($_POST['filterInput']) ? strtolower($_POST['filterInput']) : '';

          foreach ($contractors as $contractor) {
            // If a filter term is provided, check if the contractor matches the filter
            // If not, skip to the next iteration of the loop
            if ($filterTerm !== '' && stripos($contractor['type'], $filterTerm) === false) {
              continue;
            }
          ?>
            <div class="contractor-card">
              <h5 class="fs-19 mb-0">
                <a class="primary-link" href="#">
                  <?php echo $contractor['firstname'] . ' ' . $contractor['secondname'] ?>
                </a>
                <span class="rating-box">
                  <i class="mdi mdi-star align-middle">
                    <?php echo $contractor['rating']; ?>
                  </i>
                </span>
              </h5>
              <p class="contractor-info">Type Of Work:<?php echo $contractor['type']; ?></p>
              <ul class="list-inline mb-0 text-muted">
                <li class="contractor-info"><i class="mdi mdi-map-marker"></i> Place:<?php echo $contractor['place']; ?></li>
                <li class="contractor-info"><i class="mdi mdi-wallet"></i> Contact:<?php echo $contractor['phone']; ?></li>
                <li class="contractor-info"><i class="mdi mdi-map-marker"></i> Mail:<?php echo $contractor['email']; ?></li>
              </ul>
              <form id="requestForm" action="request_contractor.php" value="<?php echo $contractor['id']; ?>" method="post">
                <input type="hidden" name="selected_date" class="datepicker">
                <input type="hidden" name="contractor_id" value="<?php echo $contractor['id']; ?>">
                <button type="button" class="btn btn-primary mt-3" onclick="showDatePicker(<?php echo $contractor['id']; ?>)">Select Date</button>
                <button type="submit" class="btn btn-primary mt-3" name="submit_request">Request Service</button>
              </form>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main>

  <script>
    $(document).ready(function() {
      // Initialize datepicker
      $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd', // Set the desired date format
        minDate: 0 // Restrict date selection to future dates
      });

      // Function to show datepicker on button click
      window.showDatePicker = function() {
        $(".datepicker").datepicker("show");
      };
    });
  </script>
</body>
</html>
