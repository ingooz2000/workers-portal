<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <link rel="stylesheet" href="rating.css">

    </head>
    <body>
        <!-- Add this modal in your HTML body -->
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="submitRating">Submit Rating</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function () {
      // Trigger the modal when the "Rate Us" button is clicked
      $('button[name="action"][value="rate"]').on('click', function () {
        $('#ratingModal').modal('show');
      });
  
      // Handle star rating
      $('.rating .star').on('click', function () {
        $(this).addClass('selected').prevAll().addClass('selected');
        $(this).nextAll().removeClass('selected');
      });
  
      // Submit rating when the "Submit Rating" button is clicked
      $('#submitRating').on('click', function () {
        var selectedRating = $('.rating .star.selected').length;
        if (selectedRating > 0) {
          // TODO: Implement AJAX or form submission to send the rating to the server
          var contractorId = $('input[name="contractor_id"]').val();
          var customerId = $('input[name="customer_id"]').val();
          var ratingValue = selectedRating;
  
          // Use AJAX to send the rating to the server
          $.ajax({
            url: 'process_rating.php', // Replace with your rating processing script
            type: 'POST',
            data: { contractor_id: contractorId, customer_id: customerId, rating: ratingValue },
            success: function (response) {
              // Handle the response, e.g., show a success message
              console.log(response);
            },
            error: function (error) {
              // Handle errors, e.g., show an error message
              console.error(error);
            }
          });
  
          // Close the modal after submission
          $('#ratingModal').modal('hide');
        } else {
          // Display an error message if no rating is selected
          alert('Please select a rating before submitting.');
        }
      });
    });
  </script>
  
  
    </body>
</html>