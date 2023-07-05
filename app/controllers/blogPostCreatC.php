<?php
include_once "app/persistences/blogPostData.php";

$idArticle = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!$idArticle or count(getArticleContent($idArticle))===0):
    header("HTTP/1.0 404 NotFound");
    require 'ressources/views/errors/erreur404.html';
else:

    if(count($_POST)!==0)
    {
        $myFilters = [
            'autorPseudo' => FILTER_VALIDATE_INT,
            'commentContent' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ];
        $requestContent = filter_input_array(INPUT_POST, $myFilters );

        $formNoError = true;
        if($requestContent['commentContent'] == null or strlen($requestContent['commentContent'])===0 )
        {
            $_SESSION['commentTextM'] = 'Entrez du TEXTE!';
            $formNoError = false;
        }

        if( $requestContent['autorPseudo'] == null )
        {
            $_SESSION['commentAuthorM'] = "CHOISISSEZ UN AUTEUR!";
            $formNoError = false;
        }

        if($formNoError)
        {
            setComment($requestContent['commentContent'], $idArticle, $requestContent['autorPseudo']);
            header("Location: http://blog.local/?action=blogpost&id=" . $_GET['id'] );
            die();
        }
    }
    else
    {
        $_SESSION['commentAuthorM'] = 'Choisissez l\'autur de l\'article';
        $_SESSION['commentTextM'] = "Contenu du commentaire";
    }

    $autorList = getAutorsList();
    $metaTitle = "Créer un commentaire";
    include "ressources/views/layouts/header.tpl.php";
    include "ressources/views/blogCreateComment.tpl.php";
    include "ressources/views/layouts/footer.tpl.php";
endif;