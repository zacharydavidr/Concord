<?php

namespace Concord\views;

class View
{
    /**
     * The base head for all views
     * @return string HTML formatted header
     */
    public function head()
    {
        return <<<HTML
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="/~rayzacha/Concord/web/images/favicons/favicon.ico" />
    <link rel="shortcut icon" href="/~rayzacha/Concord/web/images/favicons/favicon-16x16.png" />
    <link rel="shortcut icon" href="/~rayzacha/Concord/web/images/favicons/favicon-32x32.png" />
    <link rel="shortcut icon" href="/~rayzacha/Concord/web/images/favicons/favicon-96x96.png" />

    <title>Concord</title>

HTML;
    }

    /**
     * The base header for all views
     * @return string HTML formatted header
     */
    public function header()
    {
        return <<<HTML
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/~rayzacha/Concord/">Concord</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cottage<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trips<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Account<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
HTML;
    }
}