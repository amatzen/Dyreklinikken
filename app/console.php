<?php

if ( php_sapi_name() != 'cli' )
{
    echo 'This should be run through CLI';
    die();
}

require_once 'vendor/autoload.php';

$cli = new League\CLImate\CLImate;

$cli->out('');
$cli->out('');
$cli->out('');
$cli->out('');
$cli->backgroundRed()->white()->out('------------------------------------------');
$cli->backgroundRed()->white()->out('             Dyreklinikken A/S            ');
$cli->backgroundRed()->white()->out('------------------------------------------');

$cli->out('');

$cli->green()->out('Vælg en handling:');
$cli->out('1: Opret ny bruger');
$cli->out('2: Opret ny dyr');
$cli->out('3: Opret ny historik');

$cli->out('');
$input = $cli->green()->input('>>> ');
$response = $input->prompt();

switch ($response) {

    case 1:

        // Opret ny bruger
        $cli->out('');
        $cli->backgroundDarkGray()->white()->out('===== Opret ny bruger =====');

        $input = $cli->input('Telefonnummer...:');
        $response = $input->prompt();



        break;
    case 2:
    
        break;
    case 3:

        break;

    default:
        $cli->red()->out("Ugyldig handling.");
        die();
        break;
}