<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adgangskodehasher</title>
</head>
<body>

    <form method="post">
        <input type="password" name="password" id="password">
        <input type="submit" value="Hash">
    </form>

    <pre><?php
        if(isset($_POST['password'])){
            echo hash('sha256',($_POST['password']));
        }
    ?></pre>
    
</body>
</html>