<?php

require 'vendor/autoload.php';
use DonatelloZa\RakePlus\RakePlus;

$emotions = array(
  "Acceptance",
  "Admiration",
  "Adoration",
  "Aesthetic",
  "Affection",
  "Agitation",
  "Agony",
  "Amusement",
  "Anger",
  "Angst",
  "Anguish",
  "Annoyance",
  "Anticipation",
  "Anxiety",
  "Apathy",
  "Arousal",
  "Attraction",
  "Awe",
  "Boredom",
  "Calmness",
  "Compassion",
  "Confidence",
  "Confusion",
  "Contempt",
  "Contentment",
  "Courage",
  "Cruelty",
  "Curiosity",
  "Defeat",
  "Depression",
  "Desire",
  "Disappointment",
  "Disgust",
  "Distrust",
  "Doubt",
  "Ecstasy",
  "Embarrassment",
  "vicarious",
  "Empathy",
  "Emptiness",
  "Enthrallment",
  "Enthusiasm",
  "Envy",
  "Euphoria",
  "Excitement",
  "Faith",
  "Fear",
  "Flow",
  "Frustration",
  "Gratification",
  "Gratitude",
  "Greed",
  "Grief",
  "Guilt",
  "Happiness",
  "Hatred",
  "Hiraeth",
  "Homesickness",
  "Hope",
  "Horror",
  "Hostility",
  "Humiliation",
  "Hygge",
  "Hysteria",
  "Indulgence",
  "Infatuation",
  "Insecurity",
  "Inspiration",
  "Interest",
  "Irritation",
  "Isolation",
  "Jealousy",
  "Joy",
  "Kindness",
  "Loneliness",
  "Love",
  "limerence",
  "Lust",
  "Mono no aware",
  "Neglect",
  "Nostalgia",
  "Outrage",
  "Panic",
  "Passion",
  "Pity",
  "self-pity",
  "Pleasure",
  "Pride",
  "grandiosity",
  "hubris",
  "insult",
  "vanity",
  "Rage",
  "Regret",
  "Rejection",
  "Relief",
  "Remorse",
  "Resentment",
  "Sadness",
  "melancholy",
  "Saudade",
  "Schaden",
  "freude Sehnsucht",
  "Sentimentality", 
  "Shame",
  "Shock",
  "Shyness",
  "Social", 
  "connection", 
  "Sorrow", 
  "Spite",
  "Stress", 
  "chronic", 
  "Suffering", 
  "Surprise", 
  "Sympathy", 
  "Trust", 
  "Wonder",
  "sense of wonder",
  "Worry"

);

$i = random_int(0,129);


$url = "https://api-inference.huggingface.co/models/gpt2";
$data = '{"inputs": "'.$emotions[$i].'"}';
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


// sort text to human readable
$response = trim(stripslashes($response)); // Remove leading/trailing spaces and slashes
$response = preg_replace('/[^a-zA-Z0-9\s]/', '', $response); // Remove non-text characters
  // Remove "generatedtext" from the response
  $response = str_replace('generatedtext', '', $response);
    // Remove new lines from the response
$response = str_replace(array("\r", "\n"), '', $response);

$response = RakePlus::create($response)->get();
echo implode(' ', $response);


?>