<?php
    session_start();

    include("db.php");

    $email= $_SESSION['email'];
    if($email===null || empty($email)){
      header("location:login.php");
    }
    else{

    $query="select * from signup where email ='$email' limit 1";
    $result= mysqli_query($con,$query);

    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
        
         $user_data =mysqli_fetch_assoc($result);

         
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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="styleindex.css" rel="stylesheet">
  <link rel="stylesheet" href="editsec.css">

  </head>

<body>
<script>
    const isTouchDevice = 'ontouchstart' in document.documentElement;

    // Prevent default scroll behavior on touch devices
    if (isTouchDevice) {
        document.addEventListener('touchmove', function (e) {
            e.preventDefault();
        }, { passive: false });
    }

    const links = document.querySelectorAll(".scrollto");

    links.forEach(link => {
        link.addEventListener(isTouchDevice ? "touchstart" : "click", (event) => {
            if (isTouchDevice) {
                event.preventDefault(); // Prevent the default touchstart behavior
            }
            const targetId = link.getAttribute("href").substring(1); // Extract the target ID
            const targetElement = document.getElementById(targetId); // Get the target element
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: "smooth" }); // Scroll to the target element smoothly
            }
        });
    });
</script>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php echo $user_data['first']  ?></a></h1>
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
          
          <li><a href="#about" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Workers</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Edit</span></a></li>
         
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

  
  
 

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
         
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            
            
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Name:</strong> <span></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Place:</strong> <span></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Type:</strong> <span></span></li>
                </ul>
              </div>
              <!-- <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong></strong> <span></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong></strong> <span></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong></strong> <span></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong></strong> <span></span></li>
                </ul>
              </div> -->
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  
      <!-- ======= Facts Section ======= -->
      <section id="facts" class="facts">
        <div class="container">

        </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

      </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">

            <div class="portfolio-links">
               
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
             
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
             
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
             
              <div class="portfolio-links">
                
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="services" class="services">
  <div class="container">
    <form action="editsec.php" method="POST">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Name</span>
          <input type="text" name="first" placeholder="Enter your  name" required>
        </div>
        <div class="input-box">
          <span class="details">Age</span>
          <input type="text" name="age" placeholder="Enter your Age" required>
        </div>
        <div class="input-box">
          <span class="details">Phone</span>
          <input type="text" name="phone" placeholder="Enter your Phone No" required>
        </div>
        <div class="input-box">
          <span class="details">Place</span>
          <input type="text" name="place" placeholder="Enter your place" required>
        </div>
        <div class="input-box">
          <!-- <span class="details">Type of Works</span> -->
          <!-- <input type="text" name="type" placeholder="Enter your Work" required> -->
          <label for="dropdown">Type Of Works:</label>
          <!-- <div class="styled-select"> -->
            <select id="dropdown" name="type">
              <option value="select">Select</option>
              <option value="Painter">Painter</option>
              <option value="Carpenter">Carpenter</option>
              <option value="Plumber">Plumber</option>
              <option value="Mover">Mover</option>
            </select>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
        
        
        
      </div>
      
    </form>
  </div>
</section>
<!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

      </div>
    </section>

    
    
  </main>
  

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

 
  
</body>

</html>

<?php
    }
  }
  }
?>