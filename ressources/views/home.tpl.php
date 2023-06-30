<?php
/*
print the page content
-----
need $articlesContent defined with a 2D array (see transform2DtableIntoHTML) to see the format
*/

require_once 'ressources/views/pageIndex.php';

echo getPageTitleH1('Les derniers articles du blogs');
echo transform2DtableIntoHTML($articlesContent);
