<!DOCTYPE html>
<html>
  <head><!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-NAt6bBmfg57Kj6h+UZ7fBZ6OuK7NL1w0QzV6eLUNSGd1VhU9c6Ug+Zz70bZaPBy0zATwPYKnu5pjCmn5y5ueQ==" crossorigin="anonymous" />

<!-- Define slider input element -->
<div class="container mt-3">
  <input type="range" min="0" max="100" value="50" class="slider">
  <br>
  <p id="result"></p>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-BYzj5NcHXFn/xN9Z6wruil6AK/EXgUzB6JbKjWuVQmYZm6UoV7h9RLGSb4Q2WPIIrKoPVSEsXXsTClTlC8T8MA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-2jF9lZLaqb8ZDuc+ZzUpnPlxj3yvce8GqWNBWeNfjK9Xm4J4Q4H/hKjLGcGMeK22Jojl20lNtgNO8WJHgDpRw==" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    // Define slider input element
    var slider = $('.slider');

    // Add event listener to slider input element
    slider.on('input', function(event) {
      var value = event.target.value;

      // Send AJAX request to PHP script with slider value as parameter
      $.ajax({
        url: 'slider.php',
        data: {value: value},
        type: 'POST',
        success: function(result) {
          // Update result element with result from PHP script
          $('#result').text(result);
        }
      });
    });
  });
</script>
</head>
</HTML>
