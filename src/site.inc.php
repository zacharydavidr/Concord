<?php


namespace Concord;

use Concord\classes\Site;
use Concord\classes\User;

if(false) {
    ini_set("display_errors", true);
    error_reporting(E_ALL);
}

require __DIR__ . "/../vendor/autoload.php";

$site = new Site();

$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}

// Start the session system
session_start();



