<?php


######## importing DataBase functions ######
require_once 'app/persistences/blogPostData.php';

$metaTitle = "créer un nouvel article";
$autorList = getAutorsList();

#form gestion
if(count($_POST) !== 0)
{
    $filters = [
        'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'articleContent' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'date' => FILTER_SANITIZE_NUMBER_INT,
        'importance' => FILTER_VALIDATE_INT,
        'autorPseudo'=> FILTER_VALIDATE_INT
    ];
    $_SESSION['create'] = filter_input_array(INPUT_POST, $filters);
    $_SESSION['createError'] = false;

    if($_SESSION['create']['title'] == "")
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorTitle'] = true;
        $_SESSION['createErrorTitleMessage'] = 'L\'article DOIT avoir un titre';
    }
    elseif(strlen($_POST['title']) <= 5 )
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorTitle'] = true;
        $_SESSION['createErrorTitleMessage'] = 'Le titre de l\'article est trop court';
    }
    else 
    {
        $_SESSION['createErrorTitle'] = false;
    }
    
    if($_SESSION['create']['articleContent'] == "")
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorContent'] = true;
        $_SESSION['createErrorContentMessage'] = 'Tu dois écrire l\'article';
    }
    elseif(strlen($_POST['articleContent']) < 25)
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorContent'] = true;
        $_SESSION['createErrorContentMessage'] = 'Le contenue de l\'article est trop court';
    }
    elseif ( strlen($_SESSION['create']['articleContent']) > 150 )
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorContent'] = true;
        $_SESSION['createErrorContentMessage'] = 'Le contenue de l\'article est trop long';
    }
    else
    {
        $_SESSION['createErrorContent'] = false;
    }
    #for date, I assume that navigator filter is enough (bad practice, I know)
    if($_SESSION['create']['date']==null)
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorDate'] = true;
        $_SESSION['createErrorDateMessage'] = 'Veuillez indiquer une date:';
    }
    else
    {
        $_SESSION['createErrorDate'] = false;
    }

    if($_SESSION['create']['importance']===false)
    {
        $_SESSION['create']['importance'] = 0;
        $_SESSION['createErrorImportance'] = false;
    }
    elseif($_SESSION['create']['importance']>=1 and $_SESSION['create']['importance'] <=5)
    {
        $_SESSION['createErrorImportance'] = false;
    }
    else
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorImportance'] = true;
        $_SESSION['createErrorImportanceMessage'] = 'Entré une importance valide';
    }

    function autorsIDexist($listAutors, $idTested)
    {
        foreach($listAutors as $arrayAutor)
        {
            if($arrayAutor['id']===$idTested)
            {
                return true;
            }
        }
        return false;
    }
    if ( autorsIDexist($autorList, $_SESSION['create']['autorPseudo']) )
    {
        $_SESSION['createErrorPseudo'] = false;
    }
    else
    {
        $_SESSION['createError'] = true;
        $_SESSION['createErrorPseudo'] = true;
        $_SESSION['createErrorPseudoMessage'] = "Veuillez choisir UN auteur:";
    }

    header("Location: http://blog.local/?action=blogPostCreate&createArticle=true");
    die();
}


$formSent = filter_input(INPUT_GET, "createArticle", FILTER_VALIDATE_BOOL);


include "ressources/views/layouts/header.tpl.php";
include "ressources/views/blogCreateArticle.tpl.php";
include "ressources/views/layouts/footer.tpl.php";
