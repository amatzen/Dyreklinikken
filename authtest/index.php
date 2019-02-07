<?php
session_name('mtzn.auth-test');
session_start();

$db = new mysqli("iqu.dk", "mgx_dyrek", "Ci50oh~8", "mgx_dyreklinikken");

if($db->connect_error){
    die("Failed establishment of database connection.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if($_SESSION['signedIn']): ?>Velkommen <?= $_SESSION['name'] ?> <?php else: ?> Velkommen<?php endif ?></title>
</head>
<body>

    <?php if($_SESSION['signedIn']): ?>

    Hej <?= $_SESSION['name'] ?>.<br>
    <br>
    Du er logget ind.<br>
    <br>
    <a href="logout.php">Log ud</a>

    <?php else: ?>

    Hej, du er ikke logget ind.
    <br>
    <form action="signin.php" method="post">
        <input type="number" name="phone" id="phone" placeholder="Telefonnummer"><br>
        <input type="password" name="password" id="password" placeholder="Adgangskode"><br>
        <input type="submit" value="Log ind">
    </form>
    <br><br>
    <form action="register.php" method="post">
        <input type="number" name="phone" id="phone" placeholder="Telefonnummer"><br>
        <input type="password" name="password" id="password" placeholder="Adgangskode"><br>
        <input type="text" name="name" id="name" placeholder="Navn"><br>
        <input type="address" name="address" id="address" placeholder="Adresse"><br>
        <input type="email" name="email" id="email" placeholder="Adresse"><br>
        <input type="submit" value="Register">
    </form>

    <?php endif ?>
    
</body>
</html>