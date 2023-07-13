<!DOCTYPE html>
<html>
<head>
	<title>MAIN TOOL FOR SITE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<style>
		.container {
			position: relative;
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
			display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
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


body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .loader-container {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Adjust the transparency as desired */
  z-index: 99999; /* Set a high z-index to ensure it appears on top */
}

.loader {
  border: 9px solid #f3f3f3;
  border-top: 9px solid #3498db;
  border-radius: 50%;
  width: 70px;
  height: 70px;
  animation: spin 3s linear infinite;
  position: relative; /* Add position relative */
  top: -50%; /* Move the loader up by 50% of its height */
  left: -50%; /* Move the loader left by 50% of its width */
  transform: translate(-50%, -50%); /* Center the loader using transform */
}


  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
    </style>
</head>
<body>
<div class="container">
        <h1>AIARTPRO v0.1.0</h1>
		<div id="loader-container">
			<div id="loader"></div>
		</div>	
		<div class="row">
			<div class="col-md-6">
				<button id="supermodels" class="btn btn-success btn-lg shadow-lg">SuperModels</button>
		        <div id="myDiv"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<button id="emotions" class="btn btn-success btn-lg shadow-lg">Emotions</button>
		        <div id="myDiv1"></div>
				<button id="artist" class="btn btn-success btn-lg shadow-lg">Artist</button>
				<div id="myDivArtist"></div>
				<input type="text" class="form-control" id="textbox" placeholder="describe model">
				<button id="genrate" class="btn btn-success btn-lg shadow-lg">Generate</button>
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
        <p class="sell-text">
			Get your free high resoltuion 1024x1024 orginal image after signing up plus Sell it on Marketplace! and earn commission for a basic license,   Access to member gallery too1 :)</p>
      </div>
      <div class="modal-footer">
	  	<button id="add-to-marketPlace" class="btn btn-success btn-lg shadow-lg">Add to MarketPlace</button>
		<button id="close-button-footer" type="button" class="btn btn-success btn-lg shadow-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
	<script src="vendor/components/jquery/jquery.min.js"></script>
	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script>
	$(document).ready(function() {	
		$('#supermodels').click(function() {
		$.ajax({
			type: 'POST',
			url: 'supermodels.php',
			success: function(data) {
				var html = '<div class="newDiv">' + data + '</div>';			
				$('#myDiv').html(data);
			},
			error: function(xhr, textStatus, errorThrown) {
				console.log('There was an error with the AJAX request!');
				console.log('Error: ' + errorThrown);
				console.log('Status: ' + textStatus);
				console.log(xhr);
			}
		});
	});
	$('#emotions').click(function() {
		$.ajax({
			type: 'POST',
			url: 'get_json_second.php',
			success: function(data) {
				var html = '<div class="newDiv1">' + data + '</div>';
				console.log(data);
				$('#myDiv1').html(data);
			},
			error: function(xhr, textStatus, errorThrown) {
				console.log('There was an error with the AJAX request!');
				console.log('Error: ' + errorThrown);
				console.log('Status: ' + textStatus);
				console.log(xhr);
			}
		});
	});
	$('#artist').click(function() {
		$.ajax({
			url: 'artist.php',
			type: 'POST',
			success: function(data) {
				var html = '<div class="newDivArtist">' + data + '</div>';
				$('#myDivArtist').html(data);
			},
			error: function(xhr, textStatus, errorThrown) {
				console.log('There was an error with the AJAX request!');
				console.log('Error: ' + errorThrown);
				console.log('Status: ' + textStatus);
				console.log(xhr);
			}
		});
	});

	$('#genrate').click(function() {
		const myDivContent = $('#myDiv').html();
		const myDiv1Content = $('#myDiv1').html();
		const myDivArtist = $('#myDivArtist').html();
		const textbox = $('#textbox').val();

		var makeButton = document.getElementById(".ajax-button");
		var modal = document.querySelector(".myModal");
		modal.style.display = "block";

		$.ajax({
			url: 'genrate.php',
			type: 'POST',
			data: {
				myDivContent: myDivContent,
				myDiv1Content: myDiv1Content,
				myDivArtist: myDivArtist,
				textbox: textbox
			},
			beforeSend: function() {
				$('#loader-container').addClass('spinner-border text-primary');
				$('.backdrop').show();
			},
			success: function(data) {
				$('#loader-container').removeClass('spinner-border text-primary');
				$('.backdrop').show();	
				$('#imageContainer').html('<img src="' + data + '" >'); 				
				$('.myModal').show(); // Trigger the modal popup
			},
			error: function() {
				console.log('There was an error with the AJAX request!');
				$('#loader-container').removeClass('spinner-border text-primary');
			}
		});

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
});
	</script>	
</body>
</html>