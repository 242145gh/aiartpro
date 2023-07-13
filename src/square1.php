<!DOCTYPE html>
<html>
<head>
	<title>PSY SLIDER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<style>
		.container {
			margin-top: 50px;
		}

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
        <h1> PYS SLIDER! </h1>
		<div class="row">
			<div class="col-md-6">
				<input type="range" min="0" max="100" value="50" class="slider" id="slider">
			</div>
			<div class="col-md-6">
				<h3 id="slider-value"></h3> 
        <div id="myDiv"></div>       
			</div>
		</div>
    <div class="row">
			<div class="col-md-6">
				<input type="range" min="0" max="100" value="50" class="slider" id="slider1">
			</div>
			<div class="col-md-6">
				<h3 id="slider-value1"></h3> 
        <div id="myDiv1"></div>       
			</div>
		</div>
	</div>

	<script src="vendor/components/jquery/jquery.min.js"></script>
	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		// Listen for changes to the slider value
		$('#slider').on('input', function() {
			var sliderValue = $(this).val();
			$('#slider-value').html('Slider value: ' + sliderValue);
			// Send an AJAX request to the server with the slider value
			$.ajax({
				type: 'POST',
				url: 'get_json.php',
				data: {slider_value: sliderValue},
				success: function(data) {
					// Parse the JSON object and create a new div for each item
					var jsonObj = JSON.parse(data);
					var html = '';
					for (var i = 0; i < jsonObj.length; i++) {
						html += '<div class="new-div">' + jsonObj[i].text + '</div>';
					}
					$('#myDiv').html(html);
				}
			});
      
		});
	</script>
  <script>
		// Listen for changes to the slider value
		$('#slider1').on('input', function() {
			var sliderValue1 = $(this).val();
			$('#slider-value1').html('Slider value: ' + sliderValue1);
			// Send an AJAX request to the server with the slider value
			$.ajax({
				type: 'POST',
				url: 'get_json_second.php',
				data: {slider_value: sliderValue1},
				success: function(data) {
					// Parse the JSON object and create a new div for each item
					var jsonObj = JSON.parse(data);
					var html = '';
					for (var i = 0; i < jsonObj.length; i++) {
						html += '<div class="new-div1">' + jsonObj[i].text + '</div>';
					}
					$('#myDiv1').html(html);
				}
			});
      
		});
	</script>
  		  
</body>
</html>

