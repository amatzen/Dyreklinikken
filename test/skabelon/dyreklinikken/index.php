<?php
// Session
session_name('_initial');
session_start();

// Router Validator
$exe = true;

// Functions
function page($p) {$exe = true; require_once 'protected/pages/'.$p.'.phtml';}
function tpl($p,$a1 = 0) {$exe = true; require_once 'protected/tpl/'.$p.'.phtml';}

// Get Request
$req = (explode('?', $_SERVER["REQUEST_URI"], 2)[0]);

// Load router
require_once 'protected/router.php';