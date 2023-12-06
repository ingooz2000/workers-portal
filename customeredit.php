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
          <li><a href="cardview.php" ><i class="bx bx-file-blank"></i> <span>Contractors</span></a></li>
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

        <div class="content">
            <form action="customereditsec.php" method="POST">
              <div class="user-details">
                <div class="input-box">
                  <span class="details">First Name</span>
                  <input type="text" name="first"  value="<?php echo $user_data1['first_name'];?>" required>
                </div>
                <div class="input-box">
                  <span class="details">Last Name</span>
                  <input type="text" name="second" value="<?php echo $user_data1['last_name'];?>" required>
                </div>
                <div class="input-box">
                  <span class="details">Email</span>
                  <input type="text" name="mail" value="<?php echo $user_data1['email'];?>" required>
                </div>
                <div class="input-box">
                  <span class="details">Phone Number</span>
                  <input type="text" name="phno" value="<?php echo $user_data1['phone'];?>" required>
                </div>
                <div class="input-box">
                  <span class="details">Address</span>
                  <input type="text" name="add" value="<?php echo $user_data1['address'];?>" required>
                </div>
                <div class="input-box">
                  <span class="details">Place</span>
                  <input type="text" name="place" value="<?php echo $user_data1['place'];?>" required>
                </div>

                <div>
                    
                   
                
                
                </div>

                <div class="button">
                    <input type="submit" value="Submit">
                </div>

             

              </div>
              
             
            
             
              
            </form>
          </div>




    </div> 
    </section>
  </main>
  

  
</body>
</html>