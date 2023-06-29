<?php
    
    
    /* session_start();*/

    $routes = [
        'index' => 'homeController.php',
        null => 'homeController.php'
    ];

    $nomDuLien = filter_input(INPUT_GET, "action",FILTER_SANITIZE_URL);

    if ( array_key_exists($nomDuLien, $routes) ):
        require_once 'app/controllers/' . $routes[$nomDuLien];
    else:
        header("HTTP/1.0 404 NotFound");
        require 'ressources/views/errors/erreur404.html';
    endif;


?>