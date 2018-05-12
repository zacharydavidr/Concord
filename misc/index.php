<?php

if (isset($_SERVER['REQUEST_URI']) &&  isset($_SERVER['SCRIPT_NAME'])) {
    $requestURI = explode("/", $_SERVER["REQUEST_URI"]);
    $scriptName = explode("/", $_SERVER["SCRIPT_NAME"]);

    // Remove matching base path
    for ($i = 0; $i < sizeof($scriptName); $i++) {
        if ($requestURI[$i] == $scriptName[$i]) {
            unset($requestURI[$i]);
        }
    }

    $command = array_values($requestURI);
    $controller = $command[0];
}