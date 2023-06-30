<?php
/*
Le fichier contient les fonctions suivantes:

get10LastArticles(): array
    return an array contening at most 10 articles writen on BDD on format
    [
        0 => [
            0 => 'Article Name',
            1 => 'Autor name'
        ]
        1 => [
            0 => 'Le sport',
            1 => 'Matéo'
        ]
        2 => [
            0 => 'Le sportif',
            1 => 'Matilda'
        ]
    ]

setRequest(string $fileName, PDO $serveurID()): array
    return an array holding request result
        from $fileName script (for exemple get_last_article_published.sql)
        Result is based on PDO object dataBase
    The return format is 
    [
        'key1' => [value1, value2, value3]
        'key2' => [value1_, value2_,value3_]
    ]

getArticleContent(int | string $articleID): array
    return an array holding article ID content ('title' => 'nom, 'content' => ..., 'date Posté' => ... 'pseudo' => ...)
    $numberArticle must be an integer or an integer formated into a string 
    if article ID dosn't exist, return [].

writeArticleData(array $articleContent):
    put into a proper html code the content of an article defined in an array on the form of
    [
        'title' => string,
        'content' => string,
        'date Posté' => string
        'pseudo' => string
    ]
*/



require_once "config/database.php";


function setRequest($fileName, $serveurID)
{
    $requestContent = file_get_contents("database/" . $fileName);
    $rawContent = $serveurID->query($requestContent);
    return $rawContent->fetchAll(PDO::FETCH_ASSOC);
}


function get10LastArticles()
{
    $dataBase = getSourceServeur();
    return setRequest("get_last_article_published.sql", $dataBase);
}

function getArticleContent($articleID)
{
    $dataBase = getSourceServeur();
    $rawContent = $dataBase->query(
        getArticleDataFromID($articleID)
    );
    $content = $rawContent->fetchAll(PDO::FETCH_ASSOC);
    if ($content === [] )
    {
        return [];
    }
    else
    {
        return $content[0];
    }
}

function writeArticleData($articleContent)
{

    $render  = "<h1> " . $articleContent['title'] . " </h1> ";
    $render .= "<p> " . $articleContent['content'] . " <p> ";
    $render .= "<p>  publié le <i>" . $articleContent['date Posté'] . " </i>par<i> " . $articleContent['pseudo'] . "</i>.</p>";
    return $render;
}