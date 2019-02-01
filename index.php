<?php
session_name('_sid');
session_start();
require_once 'mysql.php';
?>
<!doctype html>
<html lang="da">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dyreklinikken - Informatik projekt</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- JS -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js" async></script>

        <meta name="robots" content="noindex,nofollow">
    </head>
    <body>

    <?php require_once 'header.php'; ?>
    <?php require_once 'content/home.php'; ?>
    <?php require_once 'footer.php'; ?>

    </body>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js'></script>
    <script async>
        WebFont.load({
            google: {
                families: ['Source Sans Pro:200,300,400,600,700,900', 'Slabo 13px']
            }
        });   
    </script>
</html>
