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

getAutorsList(): array
        return the Autors' list on the database on format:
        [
            [
                "pseudoname" => pseudo1,
                "id" => numeroAutor1
            ],
            [
                "pseudoname" => pseudo2,
                "id" => numeroAutor2
            ],
            ...
        ]
*/



require_once "config/database.php";


function setRequest(PDO $serveurPDO,string $fileName,array $param = [] ): array
{
    $requestContent = file_get_contents("database/" . $fileName);
    $rawContent = $serveurPDO->prepare($requestContent);
    $rawContent->execute($param);
    return $rawContent->fetchAll(PDO::FETCH_ASSOC);
}
function get10LastArticles(): array
{
    $dataBase = getSourceServeur();
    return setRequest($dataBase, "get_last_article_published.sql");
}
function getArticleContent(int $articleID) : array
{
    $dataBase = getSourceServeur();
    $content = setRequest($dataBase, "article_data.sql", [$articleID]);

    if ($content === [] )
    {
        return [];
    }
    else
    {
        return $content[0];
    }
}
function getAutorsList() : array
{
    $dataBase = getSourceServeur();
    return setRequest($dataBase, "getAutorsList.sql");
}

function createArticle(array $param) : void
{
    $dataBase = getSourceServeur();
    setRequest($dataBase, "add_article.sql", [
        'title' => $param['title'],
        'content' => $param['articleContent'],
        'depublicationDate' => $param['date'],
        'importantLevel' => $param['importance'],
        'autor' => $param['autorPseudo']
    ]);
}

function editArticle(array $source, int $idArticle) : void
{
    $dataBase = getSourceServeur();
    setRequest($dataBase, 'edit_article.sql', [
        'newTitre' => $source['title'],
        'newContent' => $source['articleContent'],
        'newDepublicationDate' => $source['date'],
        'newImportance' => $source['importance'],
        'idArticle' => $idArticle
    ]);

    return;
}

function deleteArticle(int $idArticle): void
{
    $dataBase = getSourceServeur();
    setRequest($dataBase, "delete_article.sql", ['idArticle' => $idArticle ]);

}

function getComment(int $idArticle): array
{
    $dataBase = getSourceServeur();
    return setRequest($dataBase, "Get_comment_from_article_ID.sql", [$idArticle] );
}