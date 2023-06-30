<?php
    
    
    // session_start(); #no use for it yet

    $routes = [ # now, the file generating html page are there 
        'index' => 'homeController.php',
        null => 'homeController.php',
        'blogpost' => 'blogPostController.php'
    ];
    $nomDuLien = filter_input(INPUT_GET, "action",FILTER_SANITIZE_URL);

    if ( array_key_exists($nomDuLien, $routes) ): #get method redirect to a page
        require_once 'app/controllers/' . $routes[$nomDuLien];
    else: #error page: link dosn't work
        header("HTTP/1.0 404 NotFound");
        require 'ressources/views/errors/erreur404.html';
    endif;