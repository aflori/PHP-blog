<?php


##################### HTML DATA ######################################
require_once 'ressources/views/layouts/header.php';
require_once 'ressources/views/layouts/footer.php';
require_once 'ressources/views/viewsFunction.php';

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
    $finalHtmlPage = getHtmlHeader("Article");
    $articleContent = getArticleContent($idArticle);

    switch( count($articleContent) )
    {
        default:
            $finalHtmlPage .= getPageTitleH1("Article not found");
            break;
        case 4:
            $finalHtmlPage .= writeArticleData($articleContent);
            // var_dump($finalHtmlPage);
            break;
    }
    echo $finalHtmlPage . getHtmlFooter();
}