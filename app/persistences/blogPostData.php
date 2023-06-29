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

*/



require_once "config/database.php";


function get10LastArticles()
{
    $dataBase = getSourceServeur();
    $rawData = setRequest("get_last_article_published.sql", $dataBase);

    $formatedArray = [ ];
    //initilizing ID raw
    $raw = [];
    foreach($rawData[0] as $key => $value)
    {
        array_push($raw, $key);
    }
    // $formatedArray[0] = $raw;
    array_push($formatedArray, $raw);

    foreach($rawData as $line)
    {
        $raw = [];
        foreach($line as $value)
        {
            array_push($raw, $valus);
        }
        array_push($formatedArray, $raw);
    }

    return $formatedArray;
}