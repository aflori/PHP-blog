<?php


##################### importing Data base functions ##################
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
    if(array_key_exists('title', $articleContent))
    {
        $metaTitle = $articleContent['title'];
    }
    else
    {
        $metaTitle = "Article not found";
    }
    include "ressources/views/layouts/header.tpl.php";

    
    if( count($articleContent)=== 4 )
    {
        include "ressources/views/blogPost.tpl.php";
    }
    else
    {
        include "ressources/views/blogPostArticleNotFound.tpl.php";
    }
    include "ressources/views/layouts/footer.tpl.php";
}