<?php

######## importing DataBase functions ######
require_once 'app/persistences/blogPostData.php';

$metaTitle = "Éditer un article";




include "ressources/views/layouts/header.tpl.php";
include "ressources/views/blogEditArticle.tpl.php";
include "ressources/views/layouts/footer.tpl.php";