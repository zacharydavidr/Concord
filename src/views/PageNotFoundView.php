<?php

namespace Concord\views;

class PageNotFoundView extends View
{
    public function __construct(){
    }

    public function body(){
        return <<<HTML
    <h1>Debug information</h1>
HTML;

    }
}