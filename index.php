<?php

//ini_set("display_errors", true);
//error_reporting( E_ALL );


require __DIR__ . '/vendor/autoload.php';
require 'src/site.inc.php';

$path_info = parse_path();
$controller = $path_info['call_parts'][0];
$action = $path_info['call_parts'][1];

switch($controller) {
    case "" :
        require "web/login.php";
        break;
    case "login" :

        if($action == "process"){
            $loginController = new Concord\controllers\LoginController($site,$_SESSION,$_POST);
            header("location: " . $loginController->getRedirect());
        }
        break;
    case "account" :
        if($action == "create"){
            require "src/controllers/CreateAccountController.php";
            $newAccountController = new Concord\controllers\NewAccountController($site,$_POST);
            header("location: " . $newAccountController->getRedirect());
            break;
        } elseif($action == "validate"){
            require "src/controllers/ConfirmAccountController.php";
            $confirmAccountController = new Concord\controllers\ConfirmAccountController($site,$_POST);
            header("location: " . $confirmAccountController->getRedirect());
            break;
        } elseif($action == "error"){
            $_GET['v'] = $path_info['call_parts'][2];
            require "web/confirm-account.php";
            break;
        } elseif($action == "check-email"){
            $_GET['sign-up-email'] = $path_info['call_parts'][2];
            require "web/check-email.php";
            break;
        }
        elseif($action == "confirm"){
            $_GET['v'] = $path_info['call_parts'][2];
            require "web/confirm-account.php";
            break;
        } elseif ($action == "register"){
            require "web/create-account.php";
            break;
        }
        break;
    default:
        require "web/page-not-found.php";
        break;
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