<?php

require __DIR__ . '/vendor/autoload.php';
require 'src/site.inc.php';

//----------MAIN--------------
if(false) {
    ini_set("display_errors", true);
    error_reporting(E_ALL);
}


$urlInfo = parse_path();
route($site, $urlInfo);
//-----------------------------

/**
 * Primary URL mappings
 * @param \Concord\classes\Site $site
 * @param array $urlInfo
 */
function route(\Concord\classes\Site $site, array $urlInfo){
    $controller = $urlInfo['call_parts'][0];
    $action = $urlInfo['call_parts'][1];
    $param = $urlInfo['call_parts'][2];

    switch($controller) {
        case "" :
            root($site, $action, $param);
            break;
        case "login" :
            login($site, $action, $param);
            break;
        case "account" :
            account($site, $action, $param, $urlInfo);
            break;
        case "calendar":
            calendar($site, $action, $param, $urlInfo);
            break;
        case "trips":
            trips($site,$action, $param, $urlInfo);
            break;
        default:
            require "web/page-not-found.php";
            break;
    }
}



/**
 * Mapping for /~rayzacha/Concord/
 */
function root($site, $action, $param){
    require "web/login.php";
}

/**
 * Mapping for /~rayzacha/Concord/
 */
function login($site, $action, $param){
    if ($action == "process") {

        $loginController = new Concord\controllers\LoginController($site, $_SESSION, $_POST);
        header("location: " . $loginController->getRedirect());

    } elseif($action == 'auth-error'){

        require "web/login.php";

    } else {

        require "web/login.php";

    }
}

/**
 *  * Mapping for /~rayzacha/Concord/account/*
 * @param $site
 * @param $action
 * @param $param
 */
function account($site, $action, $param, $urlInfo){
    if ($action == "create") {

        require "src/controllers/CreateAccountController.php";
        $newAccountController = new Concord\controllers\NewAccountController($site, $_POST);
        header("location: " . $newAccountController->getRedirect());

    } elseif ($action == "validate") {

        require "src/controllers/ConfirmAccountController.php";
        $confirmAccountController = new Concord\controllers\ConfirmAccountController($site, $_POST);
        header("location: " . $confirmAccountController->getRedirect());

    } elseif($action == "registration-success"){

        require "web/account-registration-successful.php";

    } elseif ($action == "check-email") {

        $_GET['sign-up-email'] = $param;
        require "web/check-email.php";

    } elseif ($action == "confirm") {

        $_GET['validation-code'] = $param;
        require "web/confirm-account.php";

    } elseif ($action == "register") {

        require "web/create-account.php";

    } elseif ($action == "registration-error"){

        require "web/confirm-account.php";

    } else{

        require "web/page-not-found.php";

    }
}

/**
 *  * Mapping for /~rayzacha/Concord/calendar/*
 * @param $site
 * @param $action
 * @param $param
 */
function calendar($site, $action, $param, $urlInfo){
    require "web/calendar.php";

}

/**
 *  * Mapping for /~rayzacha/Concord/trips/*
 * @param $site
 * @param $action
 * @param $param
 */
function trips($site, $action, $param, $urlInfo){
    if ($action == "create") {

        require "src/controllers/CreateTripController.php";
        $createTripController = new Concord\controllers\CreateTripController($site, $_POST);
        header("location: " . $createTripController->getRedirect());

    } else{
        require "web/create-trip.php";
    }
}

function parse_path() {
    $path = array();
    if (isset($_SERVER['REQUEST_URI'])) {
        $request_path = explode('?', $_SERVER['REQUEST_URI']);

        $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
        $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
        $path['call'] = utf8_decode($path['call_utf8']);
        if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
            $path['call'] = '';
        }
        $path['call_parts'] = explode('/', $path['call']);

        $path['query_utf8'] = urldecode($request_path[1]);
        $path['query'] = utf8_decode(urldecode($request_path[1]));
        $vars = explode('&', $path['query']);
        foreach ($vars as $var) {
            $t = explode('=', $var);
            $path['query_vars'][$t[0]] = $t[1];
        }
    }
    return $path;
}