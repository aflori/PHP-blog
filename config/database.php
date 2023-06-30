<?php
/*
 getSourceServeur(): PDO
    return a PDO object connected to blog database

 
*/

function getSourceServeur()
{
    return new PDO('mysql:host=localhost;dbname=blog', 'aflori', 'vtBtepJD4Q');
}
