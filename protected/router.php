<?php if(!isset($exe)) die("<b>Error!</b> This page should run through the router.");
//echo $req;
switch ($req):

    case "/":
        page('home');
        break;
    
    case "/priser":
        page('prices');
        break;
        
    case "/logind":
        page('login');
        break;

    case "/min-side":
    case "/min-side/":
        page('mypage');
        break;

    case "/journal":
        page('journal');
        break;

    case "/logud":
        session_destroy();
        header("Location: /");
        break;

    case "/form/user/update":
        page('user.update.action');
        break;

    case "/privacy":
        page('privacypolicy');
        break;

    // Ajax
    case "/ajax/getAnimalsByUser":
        ajax('getAnimalsByUser');
        break;
    case "/ajax/getLogByAnimal":
        ajax('getLogByAnimal');
        break;

    default:
        page('404');
        break;

endswitch;