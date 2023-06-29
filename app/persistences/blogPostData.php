<?php
/*
Le fichier contient les fonctions suivantes:

get10LastArticles(): array
    return an array contening exactly 10 articles

*/



require_once "config/database.php";

$dataBase = getSourceServeur();
var_dump( setRequest("get_last_article_published.sql", $dataBase) );