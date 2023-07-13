<?php

require_once 'vendor/autoload.php';

use \Bootstrap\Slider;

$slider = new Slider();

$slider->addImage('image1.jpg', 'Caption for image 1');
$slider->addImage('image2.jpg', 'Caption for image 2');
$slider->addImage('image3.jpg', 'Caption for image 3');

echo $slider->render();


?>