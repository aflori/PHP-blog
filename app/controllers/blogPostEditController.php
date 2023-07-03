<?php

######## importing DataBase functions ######
require_once 'app/persistences/blogPostData.php';

$idArticle = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if( $idArticle== false) #'==' to have the compatible test with null
{
    header("HTTP/1.0 404 NotFound");
    require 'ressources/views/errors/erreur404.html';
}
else
{
    $articleContent = getArticleContent($idArticle);

    if( count($articleContent)!== 0 )
    {
        include "ressources/views/blogEditArticle.tpl.php";
    }
    else
    {
        include "ressources/views/blogPostArticleNotFound.tpl.php";
    }
}
