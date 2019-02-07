<?php
session_name('mtzn.auth-test');
session_start();

$db = new mysqli("iqu.dk", "mgx_dyrek", "Ci50oh~8", "mgx_dyreklinikken");

if($db->connect_error){
    die("Failed establishment of database connection.");
}


if(!isset($_POST['phone']) OR !isset($_POST['password']) OR !isset($_POST['name']) OR !isset($_POST['address']) OR !isset($_POST['email'])) {
    header("Refresh:2;index.php");
    die("Noget mangler.");
}

$name = $db->real_escape_string($_POST['name']);
$n = $db->real_escape_string($_POST['phone']);
$email = $db->real_escape_string($_POST['email']);
$address = $db->real_escape_string($_POST['address']);
$p = hash(
    'sha256',
    $db->real_escape_string($_POST['password'])
);

$q = $db->query("INSERT INTO users (`name`, `phone`, `email`, `password`, `address`) VALUES ($name, $n, $email, $p, $address)");

if($q === TRUE){
    echo 'Konto oprettet';

}else {
    echo ' Der skete en fejl.';
}


header("Refresh: 2;index.php");