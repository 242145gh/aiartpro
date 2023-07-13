<?php

require 'vendor/autoload.php';
use DonatelloZa\RakePlus\RakePlus;

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

$jj = random_int(0,19);


$url = "https://api-inference.huggingface.co/models/gpt2";
$data = '{"inputs": "'.$psychology[$jj].'"}';
$token = "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";


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

$response = trim(stripslashes($response)); // Remove leading/trailing spaces and slashes
$response = preg_replace('/[^a-zA-Z0-9\s]/', '', $response); // Remove non-text characters
  // Remove "generatedtext" from the response
$response = str_replace('generatedtext', '', $response);
    // Remove new lines from the response
$response = str_replace(array("\r", "\n"), '', $response);

$response = RakePlus::create($response)->get();
echo implode(' ', $response);


?>
