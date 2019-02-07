<?php
session_name('mtzn.auth-test');
session_start();

$db = new mysqli("iqu.dk", "mgx_dyrek", "Ci50oh~8", "mgx_dyreklinikken");

if($db->connect_error){
    die("Failed establishment of database connection.");
}


if(!isset($_POST['name']) OR !isset($_POST['password'])) {
    header("Refresh:2;index.php");
    die("Noget mangler.");
}

$n = $db->real_escape_string($_POST['phone']);
$p = hash(
    'sha256',
    $db->real_escape_string($_POST['password'])
);

$q = $db->query("SELECT * FROM users WHERE phone = '$n' AND password = '$p' LIMIT 1");
if ($q->num_rows == 1){
    $_SESSION['signedIn'] = true;
    $_SESSION['name'] = $q->fetch_assoc()[name];
    $_SESSION['phone'] = $q->fetch_assoc()[phone];
    $_SESSION['email'] = $q->fetch_assoc()[email];
}else{
    header("Refresh:2;index.php");
    die("Brugernavn eller kode forkert.");
}

header("Location: index.php");