UPDATE
    `articles`
SET 
    `title` = :newTitre,
    `content` = :newContent,
    `publicationDate` = NOW(),
    `unpublicationDate` = :newDepublicationDate,
    `importantLevel` = :newImportance
WHERE
    `articles`.`ID` = :idArticle;
    