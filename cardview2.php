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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html"><?php include 'customer_profilename.php';echo $user_data['first_name'] ?></a></h1>
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

                    <li><a href="customerhome.php"><i class="bx bx-home"></i> <span>About</span></a></li>
                    <li><a href="cardview.php"><i class="bx bx-file-blank"></i> <span>Contractors</span></a></li>
                    <li><a href="#portfolio"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
                    <li><a href="customeredit.php"><i class="bx bx-server"></i> <span>Edit</span></a></li>
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
                    <!-- <div class="candidate-list-box ">
                        <div class="p-4 card-body">
                            <div class="align-items-center row">
                                <div class="col-auto">

                                    <div class="card-body">
                                        <img src="">
                                    </div> -->
                                    <div class="contractor-card">
                                   
                                                <p class="contractor-info" href="#"><?php echo $contractor['name'] ?></p> 
                                                    
                                            
                                                        <i class="mdi mdi-star align-middle"></i>4.8</span>
                                            </h5>
                                            <p class="text-muted mb-2">Type Of Work:<?php echo $contractor['type']; ?></p>
                                            
                                                <p class= "contractor-info"> Place:<?php echo $contractor['place']; ?></p>
                                                <p class= "contractor-info">Contact:<?php echo $contractor['phone']; ?></p>
                                                <p class= "contractor-info">Mail:<?php echo $contractor['email']; ?></p>
                                            

                                            
                                        </div>
                                    <!-- </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                <?php } ?>

            </div>
        </section>

    </main>
</body>

</html>
