<?php if(!isset($exe)) die("<b>Error!</b> This page should run through the router.");

switch ($req):

    case "/":
        page('home');
        break;

    default:
        page('404');
        break;

endswitch;