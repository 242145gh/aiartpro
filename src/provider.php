<?php

 require __DIR__ . '../oauth2-google/vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;

// Replace these with your token settings
// Create a project at https://console.developers.google.com/
$clientId     = '98798283917-kbgps1pnk11oaoa8f9kopsm84194aisg.apps.googleusercontent.com';
$clientSecret = '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';

// Change this if you are not using the built-in PHP server
$redirectUri  = 'https://aiartpro.rf.gd/aiartpro/src/user.php';

// Start the session
session_start();                    

// Initialize the provider
$provider = new Google(compact('clientId', 'clientSecret', 'redirectUri'));

// No HTML for demo, prevents any attempt at XSS
header('Content-Type', 'text/plain');

return $provider;
?>