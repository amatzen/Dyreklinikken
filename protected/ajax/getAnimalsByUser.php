<?php
    if(!isset($exe)) die("<b>Error!</b> This page should run through the router.");
    
    $db = new mysqli("infrequent.dk", "mgx_dyrek", base64_decode(hex2bin('51326b314d47396f666a673d')), "mgx_dyreklinikken");

    if($db->connect_error){
        die("Database fejl.");
    }

    if(!isset($_SESSION['SignedIn'])){
        header("Location: logind"); die();

    }

    // Tjekker forespørgsel
    $id = $_SESSION['id'];
    if($id != $_GET['user'])
        die("Brugeren ikke fundet.");

    // Hent dyr: "HENT *(ALT) FRA animals(tabel) HVOR ejer(attribut) = id(variabel)"
    $animals = $db->query("SELECT * FROM animals WHERE `owner` = '$id'");

    sleep(1);

    // Hvis der ikke er dyr, der tilhører brugeren
    if($animals->num_rows < 1):
    ?>
    <div class="alert">Ingen dyr fundet.</div>
    <?php else: ?>

    <?php //Hvis der er dyr, der tilhører brugeren
    while($animal = $animals->fetch_assoc()): ?>

    <!-- Ny boks, der har billede af dyret, hvis der er et billede tilknyttet. -->
    <div class="animal" <?php if(isset($animal['image'])): ?>style="background-image:linear-gradient(rgba(255,255,255,.85),rgba(230,230,230,.75)),url('<?= $animal['image'] ?>');background-size:cover;background-position: center center;"<?php endif ?>>
        <div class="animal-background"></div>
        <div>
            <h2><?= $animal['name'] // Skriver navnet ?></h2>
            <p>
                <b>Art:</b> <?= $animal['species'] // Skriver arten ?><br>
                <b>Race:</b> <?= $animal['race'] // Skriver racen ?><br>
                <b>Alder:</b> <?= (new DateTime($animal['birthday']))->diff(new DateTime())->y // Beregner alder og skriver det ?> år<br>
            </p>
            <p>
                <a href="journal?animal=<?= $animal['id'] ?>" class="btn btn-primary btn-sm">Journal</a> <!-- Giver link til journal -->
            </p>
        </div>
    </div>

    <?php endwhile ?>

    <?php endif ?>