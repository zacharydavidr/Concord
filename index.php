<?php

require_once("/user/rayzacha/web/Concord/config/global.php");
require_once(BASE_PATH . "/src/views/LoginView.php");
require "src/site.inc.php";


include("/user/rayzacha/web/Concord/config/global.php");



$path_info = parse_path();

switch($path_info['call_parts'][0]) {
    case "" :
        require "web/login.php";
        break;
    case "login" :
        require("src/controllers/LoginController.php");

        if($path_info['call_parts'][1] == "process"){
            $loginController = new Concord\LoginController($site, $_SESSION, $_POST);
            header("location: " . $loginController->getRedirect());
        }
        break;
    case "Create-Account" :
        require "web/create-account.php";
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