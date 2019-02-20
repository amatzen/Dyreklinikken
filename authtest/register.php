<?php
session_name('mtzn.auth-test');
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

$db = new mysqli("iqu.dk", "mgx_dyrek", "Ci50oh~8", "mgx_dyreklinikken");

if($db->connect_error){
    die("Failed establishment of database connection.");
}


if(!isset($_POST['phone']) OR !isset($_POST['password']) OR !isset($_POST['name']) OR !isset($_POST['address']) OR !isset($_POST['email'])) {
    header("Refresh:2;index.php");
    die("Noget mangler.");
}

$name = $db->real_escape_string($_POST['name']);
$phone = $db->real_escape_string($_POST['phone']);
$email = $db->real_escape_string(strtolower(htmlentities($_POST['email'])));
$address = $db->real_escape_string($_POST['address']);
$p = $db->real_escape_string(
    hash(
        'sha256',
        $_POST['password']
    )
);

$db->query("INSERT INTO `users` (`name`, `phone`, `email`, `password`, `address`) VALUES ('$name', '$phone', '$email', '$p', '$address')") or die($db->error);

echo 'Konto oprettet';

header("Refresh: 2;index.php");