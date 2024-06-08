<?php
require_once '../vendor/autoload.php';

$clientID = '993443318801-bihrfs1370edp9d4m07bvg5f36bhf0o6.apps.googleusercontent.com';
$clientSecret = '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';
$redirectURI = 'https://santrimart.co.id/w/aut/login.php';
// $redirectURI = 'http://localhost/santrimart/w/aut/login.php';

// CREATE CLIENT REQUEST TO GOOGLE
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');