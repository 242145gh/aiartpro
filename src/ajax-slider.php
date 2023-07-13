<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Slider Example</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      /* Custom styles for the slider */
      .slider {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 10px;
        background: #f2f2f2;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
      }

      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        background: #4CAF50;
        cursor: pointer;
      }

      .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #4CAF50;
        cursor: pointer;
      }
    </style>
  </head>
<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-6">
        <input type="range" min="0" max="100" value="50" class="slider">
        <br>
        <p>Slider Value: <span class="slider-value">50</span></p>
      </div>
      <div class="col-md-6">
        <p>Result: <span class="result">N/A</span></p>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Define slider input element
      var slider = $('.slider');

      // Add event listener to slider input element
      slider.on('input', function(event) {
        var value = event.target.value;

        // Update slider value display
        $('.slider-value').text(value);

        // Send AJAX request to PHP script with slider value as parameter
        $.ajax({
          url: 'ajax-slider.php',
          data: {value: value},
          type: 'POST',
          success: function(result) {
            // Update result element with result from PHP script
            $('.result').text(result);
          }
        });
      });
    });
  </script>
</body>
</html>
