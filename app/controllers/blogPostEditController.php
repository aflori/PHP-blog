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
    $metaTitle = "Éditer un article";
    $articleContent = getArticleContent($idArticle);
    if( count($articleContent)!== 0 ) {
        $formSent = filter_input(INPUT_GET,'editArticle',FILTER_VALIDATE_BOOL);

        if (count($_POST) === 0) {
            include "ressources/views/layouts/header.tpl.php";
            include "ressources/views/blogEditArticle.tpl.php";
            include "ressources/views/layouts/footer.tpl.php";
        }
        else #we received a post request: editing article
        {
        
            $filters = [
                'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'articleContent' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'date' => FILTER_SANITIZE_NUMBER_INT,
                'importance' => FILTER_VALIDATE_INT,
            ];
            $newDatas = filter_input_array(INPUT_POST, $filters);
            $_SESSION['edit'] = false;

            if($newDatas['title'] == null or strlen($newDatas['title']) <= 5 ):
                $_SESSION['edit'] = true;
                $_SESSION['editTitle'] = true;
                $_SESSION['editTitleMessage'] = ($newDatas['title'] == null? "Écrivez un titre":"Le nouveau titre est trop court!");
            else:
                $_SESSION['editTitle'] = false;
            endif;
            if($newDatas['articleContent'] == null or strlen($newDatas['articleContent'])<25):
                $_SESSION['edit'] = true;
                $_SESSION['editContent'] = true;
                $_SESSION['editContentMessage'] = ($newDatas['articleContent'] == null ? "Écrivez un contenu":"Le contenu est trop court");
            else:
                $_SESSION['editContent'] = false;
            endif;
            if ($newDatas['date']==null):
                $_SESSION['edit'] = true;
                $_SESSION['editDate'] = true;
                $_SESSION['editDateMessage'] = "Veuillez rentrer une date valide";
            else:
                $_SESSION['editDate'] = false;
            endif;
            
            if( ((int)$newDatas['importance'])> 5 or ((int)$newDatas['importance'])<=0 && $_POST['importance'] !== ""):
                $_SESSION['edit'] = true;
                $_SESSION['editImportance'] = true;
                $_SESSION['editImportanceMessage'] = "Veuillez rentrer une valeur valide";
            else:
                if($_POST['importance'] === "") $newDatas['importance'] = 0;
                $_SESSION['editImportance'] = false;
            endif;

            if( !$_SESSION['edit'])
            {
                //fonction à faire pour éditer l'article
                editArticle($newDatas, $idArticle);
            }
            header("Location: http://blog.local/?action=blogPostEdit&id=$idArticle&editArticle=true");
        }
    }
    else
    {
        include "ressources/views/blogPostArticleNotFound.tpl.php";
    }
}
