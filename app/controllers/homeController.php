<?php

##################### importing Data base functions ##################
require_once 'app/persistences/blogPostData.php';


// $articlesTable = getTable($dataBlog, "id, title, content");

//views function 
$metaTitle = "Mon blog";
$articlesContent = get10LastArticles();

include "ressources/views/layouts/header.tpl.php";
include "ressources/views/home.tpl.php";
include "ressources/views/layouts/footer.tpl.php";
