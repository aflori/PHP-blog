<?php

##################### importing HTML generating function ##################
require_once 'ressources/views/layouts/header.php';
require_once 'ressources/views/layouts/footer.php';
require_once 'ressources/views/index.php';

##################### importing Data base functions ##################
require_once 'app/persistences/blogPostData.php';


// $articlesTable = getTable($dataBlog, "id, title, content");

//views function 
echo getHtmlHeader("test");
echo getPageTitleH1();
echo transform2DtableIntoHTML([ 
    "title" => [ 
        0 => 'article title',
        //0.5 => 'article content' #float keys are converted into an int causing two keys '0'
        5 => 'article content'
    ],
    1 => [
        0 => 'Le sport préféré des dromois',
        1 => 'Le sport préféré des dromois est le biathlon'
    ],
    2 => [
        0 => 'Le sport préféré des ardéchois',
        1 => 'Le sport préféré des ardéchois n\'est pas le biathlon'
    ]
]);
echo transformSimpleTableIntoHTML([
    0 => 'Bonjour',
    1 => 1,
    "quatorze" => "2023-05-28"
]);



// putting on site the last 10 blog articles
echo getHtmlFooter();


