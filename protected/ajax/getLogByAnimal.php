<?php
    if(!isset($exe)) die("<b>Error!</b> This page should run through the router.");
    
    $db = new mysqli("infrequent.dk", "mgx_dyrek", base64_decode(hex2bin('51326b314d47396f666a673d')), "mgx_dyreklinikken");

    if($db->connect_error){
        die("Database fejl.");
    }

    if(!isset($_SESSION['SignedIn'])){
        header("Location: logind"); die();

    }

    if(!isset($_GET['animal']))
        die("Ingen forespørgsel.");

    $aid = $_GET['animal'];
    
    $id = $_SESSION['id'];

    $animalinfo = ($db->query("SELECT * FROM animals WHERE id = '$aid' LIMIT 1"))->fetch_assoc();

    if($animalinfo['owner'] != $id){
        die("Du har ikke adgang til dette dyr.");
    }


    $animalhistory = $db->query("SELECT * FROM animals_history WHERE `animal` = '$aid'");

    sleep(1);   

    if($animalhistory->num_rows < 1):
        
    ?>
    <div class="alert">Ingen historik fundet.</div>
    <?php else: ?>

    <table class="table animal-meta">
        <thead>
            <tr>
                <th>Lokation</th>
                <th>Handling</th>
                <th>Tidsstempel</th>
            </tr>
        </thead>
        <tbody>
            <?php while($e = $animalhistory->fetch_assoc()):
                $locid = $e['location']; ?>
                <tr>
                    <td><?= ($db->query("SELECT name FROM locations WHERE id = '$locid' LIMIT 1"))->fetch_assoc()['name'] ?></td>
                    <td><?= $e['action'] ?></td>
                    <td><?= (new DateTime($e['timestamp']))->format('j.m.Y H:i') ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <?php endif ?>