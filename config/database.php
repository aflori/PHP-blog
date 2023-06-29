<?php
/*
 getSourceServeur(): PDO
    return a PDO object connected to blog database

 setRequest(string $fileName, PDO $serveurID()): array
    return an array holding request result
        from $fileName script (for exemple get_last_article_published.sql)
        Result is based on PDO object dataBase
    The return format is 
    [
        'key1' => [value1, value2, value3]
        'key2' => [value1_, value2_,value3_]
    ]
*/

function getSourceServeur()
{
    return new PDO('mysql:host=localhost;dbname=blog', 'aflori', 'vtBtepJD4Q');
}

function setRequest($fileName, $serveurID)
{
    $requestContent = file_get_contents("database/" . $fileName);
    $rawContent = $serveurID->query($requestContent);
    return $rawContent->fetchAll(PDO::FETCH_ASSOC);
}