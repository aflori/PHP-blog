<?php

$dataBlog = new PDO('mysql:host=localhost;dbname=blog', 'aflori', 'vtBtepJD4Q');
// $testCmd = $dataBlog->query("SELECT * FROM autors;");
// var_dump($testCmd->fetch());

function printTable($dataBase, $column="*", $tableName="Articles")
{
    $content = $dataBase->query('SELECT ' . $column . ' FROM ' . $tableName . ';');
    $content = $content->fetchAll();

    echo "<table> ";
    echo '<tr> ';
    $index = 0;
    foreach ($content[0] as $IdName => $value)
    {
        if ($IdName === $index):
            $index += 1;
        else:
            echo '<th> ' . $IdName . ' </th>' ;
        endif;
    }
    echo ' </tr>';
    foreach ($content as $line)
    {
        $index = 0;
        echo '<tr> ';
        foreach($line as $IdName => $Value)
        {
            if ($IdName ===$index)
            {
                $index += 1;
                echo '<th> ' . $Value . ' </th>';
            }
        }
        echo '</tr>';
    }
    echo " </table>";
}
