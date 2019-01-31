<?php
$db = new mysqli("infrequent.dk", "mgx_dyrek", "Ci50oh~8", "mgx_dyreklinikken");

if(isset($db->connect_errno)) {
    die("Failed establishing connection to MySQL: ".$db->connect_errno. " - ".$db->connect_error);
}