<?php
include 'customer_do_list.php';
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
  <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="styleindex.css" rel="stylesheet">
  <link rel="stylesheet" href="editsec.css">


  <style>
    .rating span {
      font-size: 2em;
      cursor: pointer;
    }

    .rating span:hover {
      color: orange;
    }

    .selected {
      color: orange;
    }
  </style>

  </head>

<body>

  <!-- Mobile nav toggle button -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- Header -->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php echo $user_data1['first_name'].' '.$user_data1['last_name'] ;?></a></h1>
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
          <li><a href="customer_projects.php"><i class="bx bx-book-content"></i> <span>Previous Projects</span></a></li>
          <li><a href="customeredit.php"><i class="bx bx-server"></i> <span>Edit</span></a></li>
          <li><a href="logout.php"><i class="bx bx-log-out"></i> <span>Logout</span></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main">
    <section id="about" class="about">
      <div class="container">
        <h3>Previous Works</h3>

        <div class="customer-card">
          <?php if (!empty($customers)) {
            foreach ($customers as $customer) {
          ?>
              <p>ON DATE: <?php echo $customer['date']; ?></p>
              <p class="customer-info">Customer ID: <?php echo $customer['id']; ?>, Name: <?php echo $customer['name'] . " " . $customer['last']; ?></p>
              <p class="customer-info">Email: <?php echo $customer['email']; ?>, Phone: <?php echo $customer['phone']; ?></p>
              <p class="customer-info">Place: <?php echo $customer['place']; ?></p>
              <p class="customer-info">Date: <?php echo $customer['date']; ?></p>
              <div class="customer_action-buttons">
                <form>
                  <input type="hidden" name="contractor_id" value="<?php echo $contractor2_id; ?>">
                  <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
                  <button type="button" class="btn btn-primary open-modal-btn" data-bs-toggle="modal" data-bs-target="#ratingModal">Rate Us</button>
                </form>
              </div>
          <?php
            }
          } else {
            echo "No work found.";
          } ?>
        </div>
      </div>
    </section>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate Us</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Select your rating:</p>
          <div class="rating">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
          </div>
          <p id="selectedRatingText">Selected Rating: <span id="selectedRating">0</span></p>
          <label for="review">Type your review:</label>
          <textarea id="review" name="review" rows="4" cols="50"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="submitRating">Submit Rating</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JavaScript (make sure it is included before your custom script) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Your custom script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var openModalBtns = document.querySelectorAll('.open-modal-btn');
      var ratingModal = new bootstrap.Modal(document.getElementById('ratingModal'));
      var ratingStars = document.querySelectorAll('.rating .star');
      var selectedRatingText = document.getElementById('selectedRatingText');
      var selectedRatingValue = document.getElementById('selectedRating');
      var reviewTextarea = document.getElementById('review');

      ratingStars.forEach(function (star) {
        star.addEventListener('click', function () {
          var value = parseInt(star.getAttribute('data-value'));
          updateSelectedRating(value);
        });
      });

      function updateSelectedRating(value) {
        selectedRatingValue.textContent = value;
        selectedRatingText.classList.add('selected');
      }

      openModalBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          // Reset the selected rating and review when the modal is opened
          updateSelectedRating(0);
          reviewTextarea.value = '';
          ratingModal.show();
        });
      });
    });
  </script>

</body>

</html>
