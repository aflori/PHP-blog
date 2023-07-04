<?php
require_once "app/persistences/blogPostData.php";

$postRequest = filter_input(INPUT_POST,'submit', FILTER_VALIDATE_BOOL);
$idToDelete = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


if($postRequest and is_int($idToDelete) and count(getArticleContent($idToDelete)) !== 0 )
{
    deleteArticle($idToDelete);
}

header("Location: http://blog.local/?action=index");