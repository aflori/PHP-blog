<?php

##################### HTML BASE ##################
//set header title
$metaTitle = "Accueil";
//define $header
require_once 'ressources/views/layouts/header.php';
//define $footer
require_once 'ressources/views/layouts/footer.php';
//getting page $content
require_once 'ressources/views/index.php';
//core article

##################### Base de Donnée ##################
//Data fonction
require_once 'app/persistences/blogPostData.php';




echo $header . $content;

$articlesTable = getTable($dataBlog, "id, title, content");
//generating dynamicly a table from table variable in index.php
echo $table['tableStart'];
echo $table['lineStart'];
foreach($articlesTable[0] as $key => $value)
{
    echo $table['valueStart'];
    echo $key;
    echo $table['valueEnd']; 
}
echo $table['lineEnd'];
foreach($articlesTable as $tableID) {
    echo $table['lineStart'];
    foreach( $tableID as $contentID) {
        echo $table['valueStart'];
        echo $contentID;
        echo $table['valueEnd'];
    }
    echo $table['lineEnd'];
}

echo $table['tableEnd'];


echo $footer;

