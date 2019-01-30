<?php
session_name('_sid');
session_start();
?>
<!doctype html>
<html lang="da">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dyreklinikken - Informatik projekt</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- JS -->
        <script src="assets/js/jquery.js" async></script>
        <script src="assets/js/bootstrap.js" async></script>

        <meta name="robots" content="noindex,nofollow">
    </head>
    <body>

    <?php require_once 'header.php'; ?>
    <?php require_once 'content/home.php'; ?>
    <?php require_once 'footer.php'; ?>

    </body>
</html>
