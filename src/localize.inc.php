<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Concord\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('rayzacha@cse.msu.edu');
    $site->setRoot('/~rayzacha/Concord');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=rayzacha',
        'rayzacha',       // Database user
        'rayzacha',     // Database password
        '');            // Table prefix

};