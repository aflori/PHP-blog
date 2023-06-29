<?php
    // initialize the variable $dataBlog + request functions
    include "config/database.php";
    
    /* session_start();*/

    $routes = [
        'index' => ['app/controllers/homeController.php', "ressources/views/index.php"],
        null => ['app/controllers/homeController.php', "ressources/views/index.php"]
    ];

    $nomDuLien = filter_input(INPUT_GET, "action",FILTER_SANITIZE_URL);

    if ( isset($routes[$nomDuLien]) ):
        foreach($routes[$nomDuLien] as $valueImport){
            require_once $valueImport;
        }
    else:
        require 'ressources/views/errors/erreur404.html';
    endif;


?>