<?php

 require '../open-ai/vendor/autoload.php'; // remove this line if you use a PHP Framework.
 require '../oauth2-google/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;
use League\OAuth2\Client\Provider\Google;

$open_ai_key = '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';
$open_ai = new OpenAi($open_ai_key);

/*
$provider = new Google([
    'clientId'     => '98798283917-kbgps1pnk11oaoa8f9kopsm84194aisg.apps.googleusercontent.com',
    'clientSecret' => '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',
    'redirectUri'  => 'https://aiartpro.rf.gd/aiartpro/src/square.php',
    'hostedDomain' => '', // optional; used to restrict access to users on your G Suite/Google Apps for Business accounts
]);
*/

$psychology = array(
    'Abnormal',
    'Behavioral',
    'Behavioral genetics',
    'Biological',
    'Cognitive/Cognitivism',
    'Comparative',
    'Cross-cultural',
    'Cultural',
    'Differential',
    'Developmental',
    'Evolutionary',
    'Experimental',
    'Mathematical',
    'Neuropsychology',
    'Personality',
    'Positive',
    'Psychodynamic',
    'Psychometrics',
    'Quantitative',
    'Social'
);

$i = random_int(0,17);
$complete = $open_ai->completion([ ;,;';,';,
    'model' => 'text-davinci-002',
    'prompt' => 'in one word '.$psychology[$i],
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0.5,
    'presence_penalty' => 0,
 ]);

 # var_dump($psychology[$i]);
#var_dump($complete);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PSY SLIDER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<style>
		.container {
			
			justify-content: center;
			align-items: center;
			height: 100vh; /* Set container height to 100% of viewport height */
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
		body {
			background-color: black;
		}
		h1, h3, h4 {
			color: green;
		}
		#myDiv,  #myDivArtist, #myDiv1 {
    		color: yellow;
	  	}
        
	  .myModal {
		display: flex;
		justify-content: center;
		align-items: flex-start;
		position: fixed;
		top: 0;
		left: 0;
		background-color: rgba(0, 0, 0, 0.5);
		opacity: 1;
		z-index: 9999; /* lower z-index to place behind modal-dialog */
		width: 0;
		height: 0;
		overflow: auto;
	}

	.backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999; /* set a lower z-index than the modal dialog */
    display: none; /* hide it by default */
}


.modal-dialog {
    margin-top: 2%;
    background-color: black;
    margin-left: auto;
    margin-right: auto;
    max-width: 50%;
    height: auto;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10000; /* higher z-index to place on top of myModal */
	border-radius: 10px 10px 0 0;
}

.modal-content {
    width: 100%;
    background-color: #black;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
	border-radius: 10px 10px 0 0;
}

.modal-header {
    background-color: #black;
    border-radius: 10px 10px 0 0;
    

}
.modal-title {
	background-color: green;
    background-color: #black;
    padding: 10px;
    flex: 1;
    display: flex;
    white-space: nowrap;
	background-color: #black;
    border-radius: 10px 10px 0 0;
    width: 100%;
	
}

.modal-body {
    padding: 20px;
    background-color: black;    
    max-width: 100%;
    height: auto;
    padding: 20px;
    background-color: black;
	display: flex;
    align-items: center;
    padding: 20px;
    background-color: black;
    max-width: 100%;
    height: auto
}

.modal-footer {
	display: flex;
  justify-content: center;
  align-items: center;
  background-color: #000;
  border-radius: 0 0 10px 10px;
	
}

.btn-secondary {
    background-color: #black;
    border-color: #black;
}	

.modal-body {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-height: 790px; /* adjust the value as needed */
  overflow-y: auto;
}

#imageContainer {
  max-height: calc(100vh - 250px); /* Set max height to 100% of viewport height minus some padding */
  max-width: calc(100vw - 80px); /* Set max width to 100% of viewport width minus some padding */
  object-fit: contain; /* Make sure the image fits within the container without stretching or cropping */
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
}

.sell-text {
  text-align: center;
  margin-top: 10px;
}

    </style>
</head>
<body>
	<div class="container">
        <h1>AIARTPRO v0.0.2</h1>
		<div class="row">
			<div class="col-md-6">
				<h4>$psychology</h4>
				<input type="range" min="0" max="100" value="43" class="slider" id="slider">
				<h3 id="slider-value"></h3>
				<div id="myDiv"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h4>$emotions</h4>
				<input type="range" min="0" max="100" value="13" class="slider" id="slider1">
				<h3 id="slider-value1"></h3> 
		        <div id="myDiv1"></div>
				<button id="ajax-button-artist" class="btn btn-success btn-lg shadow-lg">STYLE</button>
				<div id="myDivArtist"></div>
				<button id="ajax-button" class="btn btn-success btn-lg shadow-lg">MAKE</button>
			</div>	
		</div>
	</div>
	<div class="backdrop"></div>
	<div class="myModal" tabindex="-1" role="dialog" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Your Masterpiece!</h5>
        <button id="close-button" type="button" class="btn btn-success btn-lg shadow-lg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="imageContainer"></div>
        <div class="form-group">
          <label for="green-textbox">NAME YOUR AIARTPRO WORK OR USE CURRENT SETTINGS?</label>
          <input type="text" class="form-control bg-success text-white" id="art-name">
        </div>
        <div class="form-group">
          <label for="green-textbox">Describe (optional):</label>
          <input type="text" class="form-control bg-success text-white" id="describe">
        </div>
        <p class="sell-text">Sell in Marketplace! earn commission. gain community.</p>
      </div>
      <div class="modal-footer">

	  	<button id="add-to-marketPlace" class="btn btn-success btn-lg shadow-lg">Add to MarketPlace</button>
		<button id="close-button-footer" type="button" class="btn btn-success btn-lg shadow-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	<script src="vendor/components/jquery/jquery.min.js"></script>
	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script>
	$(document).ready(function() {	
		$(document).on('keydown', function(event) {
			if (event.keyCode == 27) {
				$('.backdrop').hide();
				$('.myModal').hide();
			}
		});
		
		$('body').click(function(event) {
					console.log('clicked');
			if (!$(event.target).closest('.myModal').length && !$(event.target).is('.myModal')) {
				console.log('clicked out');
				$('.backdrop').hide();
				$('.myModal').hide();
			
			}
		});		
		
		$('#close-button').click(function() {
			$('.backdrop').hide();
			$('.myModal').hide();
		});

		$('#close-button-footer').click(function() {
			$('.backdrop').hide();
			$('.myModal').hide();
		});


	});		
		$('#ajax-button-artist').click(function() {
			// Send an AJAX request to the server with the data
			
			$.ajax({
				url: 'artist.php',
				type: 'POST',
				success: function(data) {
					// Parse the JSON object and create a new div for each item
					var jsonObj = JSON.parse(data);
					var html = '<div class="new-diva">' + jsonObj + '</div>';
					console.log(jsonObj);
					$('#myDivArtist').html(html);
				},
				error: function(xhr, textStatus, errorThrown) {
					console.log('There was an error with the AJAX request!');
					console.log('Error: ' + errorThrown);
					console.log('Status: ' + textStatus);
					console.log(xhr);
				}
			});
		});

		

		$('#ajax-button').click(function() {
			// Load the contents of the two div elements
			const myDivContent = $('#myDiv').html();
			const myDiv1Content = $('#myDiv1').html();
			const myDivArtist = $('#myDivArtist').html();
			// Send an AJAX request to the server with the data

			var makeButton = document.getElementById(".ajax-button");
		    var modal = document.querySelector(".myModal");
			modal.style.display = "block";

			$.ajax({
			url: 'genrate.php',
			type: 'POST',
			data: {
				myDivContent: myDivContent,
				myDiv1Content: myDiv1Content,
				myDivArtist: myDivArtist
			},
			success: function(data) {
				// Display the image returned by generate.php 
				// Return the data variable
				$('.backdrop').show();
				$('#imageContainer').html('<img src="' + data + '" >'); 				
				$('.myModal').show(); // Trigger the modal popup

			},
			error: function() {
				console.log('There was an error with the AJAX request!');
			}
			})
		});


		// Listen for changes to the slider value
		$('#slider').on('input', function(q) {
			var sliderValue = $(this).val();
			$('#slider-value').html(sliderValue);

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
	
		// Listen for changes to the slider value
		$('#slider1').on('input', function() {
			var sliderValue1 = $(this).val();
			$('#slider-value1').html(sliderValue1);

			// Send an AJAX request to the server with the slider value
			$.ajax({
				type: 'POST',
				url: 'get_json_second.php',
				data: {slider_value1: sliderValue1},
				success: function(data) {
					// Parse the JSON object and create a new div for each item
					var jsonObj = JSON.parse(data);
					var html = '';
					for (var i = 0; i < jsonObj.length; i++) {
						html += '<div class="new-div1">' + jsonObj[i].text + '</div>';
						console.log(jsonObj);
					}
					$('#myDiv1').html(html);
				}
			});
		});
	
	</script>	
  
</body>
</html>