<?php    
$metaTitle = "Accueil";
//define $content
require_once 'app/controllers/homeController.php';
//define $header
require_once 'ressources/views/layouts/header.php';
//define $footer
require_once 'ressources/views/layouts/footer.php';

echo $header . "\n" . $content . "\n" . $footer;
/*
echo "<h1>Les Article du blog </h1>\n";
printTable($dataBlog, "title, content, publicationDate");
*/
