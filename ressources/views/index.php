<?php    
$metaTitle = "Accueil";
require_once 'ressources/views/layouts/header.php';

echo "<h1>Les Article du blog </h1>\n";
printTable($dataBlog, "title, content, publicationDate");


require_once 'ressources/views/layouts/footer.php';
