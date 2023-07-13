<?php

require 'vendor/autoload.php';
use DonatelloZa\RakePlus\RakePlus;

$myDivContent = $_POST['myDivContent'];
$myDiv1Content = $_POST['myDiv1Content'];
$myDivArtist = $_POST['myDivArtist'];
$textbox = $_POST['textbox'];

$phrases = RakePlus::create($myDivContent)->get();
$phrases1 = RakePlus::create($myDiv1Content)->get();


$myDivArtist = preg_replace('/[^a-zA-Z0-9\s]/', '', $myDivArtist);
$myDiv1Content = preg_replace('/[^a-zA-Z0-9\s]/', '', $phrases);
$myDivCsontent = preg_replace('/[^a-zA-Z0-9\s]/', '', $phrases1);

    
 // print_r($phrases);
//  print_r($phrases1);

$destination_path = "images/media/orginals/" . implode('-', $phrases) . implode('-', $phrases1) . $myDivArtist . ' ' .$textbox.".png";

$url = "https://api-inference.huggingface.co/models/runwayml/stable-diffusion-v1-5";
$token = "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";

// Combine the values of myDivArtist, phrases, and phrases1
$combinedData = $myDivArtist . ' ' . implode(' ', $phrases) . ' ' . implode(' ', $phrases1) . ' ' .$textbox;

// Split the combined data into chunks
$dataChunks = str_split($combinedData, 500);

$responseChunks = [];

// Make multiple API requests with smaller data chunks
foreach ($dataChunks as $chunk) {
    $data = '{"inputs": "' . $chunk . '"}';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $token
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

    curl_close($ch);

    $responseChunks[] = $response;
}

// Combine the response chunks
$response = implode('', $responseChunks);

file_put_contents($destination_path, $response);
echo $destination_path;


?>