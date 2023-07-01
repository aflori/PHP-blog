<?php


######## importing DataBase functions ######
require_once 'app/persistences/blogPostData.php';


$metaTitle = "créer un nouvel article";
include "ressources/views/layouts/header.tpl.php";

$autorList = getAutorsList();
include "ressources/views/blogCreateArticle.tpl.php";

var_dump($_POST);

include "ressources/views/layouts/footer.tpl.php";
