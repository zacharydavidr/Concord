<?php

namespace Concord;

//require __DIR__ . "/../vendor/autoload.php";
require "/user/rayzacha/web/Concord/src/classes/Site.php";
require "/user/rayzacha/web/Concord/src/classes/User.php";

$site = new Site();

$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}

// Start the session system
session_start();
$user = null;
if(isset($_SESSION[User::SESSION_NAME])) {
    $user = $_SESSION[User::SESSION_NAME];
}