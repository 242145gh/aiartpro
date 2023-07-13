<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Slider</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
	<style>
		.container {
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<input type="range" min="0" max="100" value="50" class="slider" id="slider">
			</div>
			<div class="col-md-6">
				<h3 id="slider-value"></h3>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			var slider = document.getElementById("slider");
			var output = document.getElementById("slider-value");
			output.innerHTML = slider.value;

			slider.oninput = function() {
				output.innerHTML = this.value;
				$.ajax({
					url: "slider.php",
					type: "POST",
					data: {slider_value: this.value},
					success: function(data) {
						console.log(data);
					}
				});
			};
		});
	</script>
</body>
</html>