<?php
require '../../vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri('http://localhost/portfolioready/portal/classroom/class_callback.php'); // Change to your redirect URI
$client->addScope([
    "https://www.googleapis.com/auth/classroom.courses.readonly",
    "https://www.googleapis.com/auth/classroom.rosters.readonly",
    "https://www.googleapis.com/auth/classroom.coursework.students.readonly"
]);
$client->setAccessType('offline');

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
} else {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    header('Location: home.php'); // Redirect to main page
    exit();
}

