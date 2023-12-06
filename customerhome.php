
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
  <!-- <link href="home/vendor/aos/aos.css" rel="stylesheet"> -->
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
        <h1 class="text-light"><a href="index.html"><?php include 'customer_profilename.php';echo $user_data1['first_name'].' '.$user_data1['last_name']; ?></a></h1>
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

      <div class="section-title">
        <h2>About</h2>
        <p></p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3></h3>
          <p class="fst-italic">
            
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                
              
                <li><i class="bi bi-chevron-right"></i> <strong>Name:</strong> <span><?php echo $user_data1['first_name'] ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $user_data1['email'] ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $user_data1['phone'] ?></span></li>
               
              </ul>
            </div>
            
          </div>
          <p>

          </p>
          
          
        </div>
      </div>

    </div>
  </section>

  </main>

  
</body>
</html>