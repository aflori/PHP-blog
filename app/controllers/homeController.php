<?php

##################### importing HTML generating function ##################
require_once 'ressources/views/layouts/header.php';
require_once 'ressources/views/layouts/footer.php';
require_once 'ressources/views/viewsFunction.php';

##################### importing Data base functions ##################
require_once 'app/persistences/blogPostData.php';


// $articlesTable = getTable($dataBlog, "id, title, content");

//views function 
$metaTitle = "Mon blog";
include "ressources/views/layouts/header.tpl.php";

$articlesContent = get10LastArticles();
include "ressources/views/home.tpl.php";

//ending page
include "ressources/views/layouts/footer.tpl.php";
