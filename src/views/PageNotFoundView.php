<?php

namespace Concord;

require_once('View.php');

/**
 * Class LoginView
 * @package Concord\View
 */
class PageNotFoundView extends View
{
    public function __construct(){
    }
    public function errorMessage(){
        return <<<HTML
    <h1>Debug information</h1>
HTML;

    }
}