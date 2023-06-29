<?php
/*

getHtmlHeader(string $metaTitle= ""): string
    return a header (from <!doctype... to </header>) by setting
    onglet's title to metaTitle




*/


function getHtmlHeader(string $metaTitle="") {
    return "<!DOCTYPE html>
    <html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title> " . $metaTitle . " </title>
    </head>
    <body>
    <header></header>";
}
