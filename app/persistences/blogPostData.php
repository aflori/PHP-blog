<?php
/*
Le fichier contient les fonctions suivantes:

    getTable(
        PDO $dataBase,
        string $column ="*",
        string $tableName = "Articles"
    ) : [ (int) -> [TableAttribute -> value ] ]

    retourne sous la forme d'un tableau en HTML le tableau $tableName
    des champs spécifiés (séparé par des ',').
    By default, $column fait tout affiché, et $tableName concerne la table 'Articles'

*/



include "config/database.php";


function getTable($dataBase, $column="*", $tableName = "Articles")
{
    $rawContent = $dataBase->query('SELECT ' . $column . ' FROM ' . $tableName . ';');
    return $rawContent->fetchAll(PDO::FETCH_ASSOC);

}
