<?php
/*
 getSourceServeur(): PDO
    return a PDO object connected to blog database

 getArticleDataFromID(string|int $idNumber): string
    return the request to do to SQL to takget the article informations from its ID passed in argument
    parametter must be an int or a string conaining only an int
*/

function getSourceServeur()
{
    return new PDO('mysql:host=localhost;dbname=blog', 'aflori', 'vtBtepJD4Q');
}

function getArticleDataFromID($idNumber)
{
    return 
"SELECT 
    articles.title AS title,
    articles.content AS content,
    articles.publicationDate AS 'date Posté',
    autors.pseudoname AS pseudo
FROM
    articles
  INNER JOIN
    autors ON autors.ID = articles.Autors_ID
WHERE
    articles.ID = $idNumber;";
}