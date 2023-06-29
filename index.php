<?php

    // session_start();

    $routes = [
        // 'index' => "ressources/views/index.php",
        // null => "ressources/views/index.php"
    ];

    $nomDuLien = filter_input(INPUT_GET, "action",FILTER_SANITIZE_URL);

    if ( isset($routes[$nomDuLien]) ):
        require $routes[$nomDuLien];
    else:
        require 'ressources/views/errors/erreur404.html';
    endif;


?>