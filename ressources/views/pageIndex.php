<?php    
/*
define main function to convert arrays and title into html code

function defined here:
getPageTitleH1(string $titleName = "Hello world") : string
    return a html title with $titleName inside
    by default, return '<h1> Hello world </h1>' string

transform2DtableIntoHTML($tableToPrint): string
    return a string html table from the 2D array $tableToPrint:
    for exemple if $tableToPrint is 
    [ 
        "title" => [ 
            0 => 'article title',
            4 => 'article content'
        ],
        1 => [
            0 => 'Le sport préféré des dromois',
            1 => 'Le sport préféré des dromois est le biathlon'
        ],
        2 => [
            0 => 'Le sport préféré des ardéchois',
            1 => 'Le sport préféré des ardéchois n\'est pas le biathlon'
        ]
    ]
    return
    "<table>
        <tr>
            <th>
                article title
            </th>
            <th>
                article content
            </th>
        </tr>
        <tr>
            <th>
                Le sport préféré des droimois
            </th>
            <th>
                Le sport préféré des droimois est le biathlon
            </th>
        </tr>
        <tr>
            <th>
                Le sport préféré des ardéchois
            </th>
            <th>
                Le sport préféré des ardéchois n'est pas le biathlon
            </th>
        </tr>
    </table>"
    


transformSimpleTableIntoHTML($tableToPrint): string
    return a html list from the simple array $tableToPrint
    for exemple, if $tableToPrint is
    [
        0 => 'Bonjour',
        5 => 1,
        "quatorze" => "2023-05-28"
    ]
    return 
    "<ul>
        <li> Bonjour </li>
        <li> 1 </li>
        <li> 2023-05-28 </li>
    </ul>"

*/

function getPageTitleH1($titleName = "Hello world")
{
    return "<h1> " .$titleName . " </h1>";
}

function transform2DtableIntoHTML($tableToPrint)
{
    $render = '<table> ';

    foreach($tableToPrint as $line)
    {
        $render .= '<tr> ';

        foreach($line as $value)
        {
            $render .= '<th> ' . (string)$value . '</th> ';
        }

        $render .= '</tr> ';
    }

    return $render . '</table> ';
}

function transformSimpleTableIntoHTML($tableToPrint)
{
    $render = '<ul> ';

    foreach($tableToPrint as $value)
    {
        $render .=  '<li> ' . (string)$value . ' </li>';
    }

    return $render . ' </ul>';
}
