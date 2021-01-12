
<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'C:\xampp\php\vendor\autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('189378579763-jc4dkdr028fj4rjin62pukj9cvm0mlpb.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('AzIEHV7Iuvxzm3vBgmXjGFoB');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Deltanow/test.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>