<?php


$url = $_POST[''];
// URL of the PNG file
$url = "https://example.com/image.png";

// Destination path for the downloaded file
$destination_path = "path/to/image.png";

// Download the file
file_put_contents($destination_path, file_get_contents($url));

// Create a copy of the file
$copy_path = "path/to/copy.png";
copy($destination_path, $copy_path);

// Load the original image
$original_image = imagecreatefrompng($copy_path);

// Get the dimensions of the original image
$original_width = imagesx($original_image);
$original_height = imagesy($original_image);

// Set the desired size of the new image
$new_width = 512;
$new_height = 512;

// Create a new image with the desired size
$new_image = imagecreatetruecolor($new_width, $new_height);

// Copy and resize the original image to the new image
imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

// Save the new image to a file
imagepng($new_image, "path/to/resized_image.png");

?>