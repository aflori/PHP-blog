<?php
    
    
    // session_start(); #no use for it yet

    $routes = [ # now, the file generating html page are there 
        'index' => 'homeController.php',
        // null => 'homeController.php',
        'blogpost' => 'blogPostController.php',
        'blogPostCreate' => 'blogPostCreateController.php'
    ];
    $nomDeLaRoute = filter_input(INPUT_GET, "action",FILTER_SANITIZE_URL);
    if($nomDeLaRoute === null) $nomDeLaRoute = 'index';

    if ( array_key_exists($nomDeLaRoute, $routes) ): #get method redirect to a page
        require_once 'app/controllers/' . $routes[$nomDeLaRoute];
    else: #error page: link dosn't work
        header("HTTP/1.0 404 NotFound");
        require 'ressources/views/errors/erreur404.html';
    endif;