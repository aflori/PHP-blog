<?php
require_once 'ressources/views/pageIndex.php';

echo getPageTitleH1('Les derniers articles du blogs');
echo transform2DtableIntoHTML($articlesContent);
