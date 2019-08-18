<?php

session_start();
// Set POST variables
$email=$_POST['email'];
$password=$_POST['password'];

$url = 'https://3assal.net/scripts/loginAdmin.php';

$headers = array(
    'Content-Type: application/json'
);

$fields = array(
    'email' => $email,
    'password' => $password

);

// Open connection
$ch = curl_init();

// Set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Disabling SSL Certificate support temporarly
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

// Execute post
$result = curl_exec($ch);
if ($result === FALSE) {
    die('Curl failed: ' . curl_error($ch));
}

// Close connection
curl_close($ch);

if ($result == 1){
    header("location: home.php");
    $_SESSION['user_id'] = 1;
}else{
    header("location: index.html");
}