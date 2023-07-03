UPDATE
    `Articles`
SET 
    title = :newTitre,
    content = :newContent,
    publicationDate = NOW(),
    unpublicationDate = :newDepublicationDate,
    importantLevel = :newImportance
WHERE
    `Articles`.`ID` = :idArticle;
    