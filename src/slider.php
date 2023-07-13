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
    <div class="container">
      <h1>PSY Slider </h1>
      <?php
        $min = 0;
        $max = 100;
        $value = 50;
      ?>
      <input type="range" min="<?php echo $min ?>" max="<?php echo $max ?>" value="<?php echo $value ?>" class="slider">
    </div>
    <script>
      var slider = document.querySelector('.slider');
      slider.addEventListener('input', function(event) {
        var value = event.target.value;
        if (value < 25) {
          // Execute function for value less than 25
          console.log('Value is less than 25');
        } else if (value < 50) {
          // Execute function for value less than 50
          console.log('Value is less than 50');
        } else if (value < 75) {
          // Execute function for value less than 75
          console.log('Value is less than 75');
        } else {
          // Execute function for value greater than or equal to 75
          console.log('Value is greater than or equal to 75');
        }
      });
    </script>
  </body>
</html>