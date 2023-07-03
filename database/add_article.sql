INSERT INTO 
    `Articles`
    (`ID`,
    `title`,
    `content`,
    `publicationDate`,
    `unpublicationDate`,
    `importantLevel`,
    `Autors_ID`)
VALUES 
    (NULL,
    :title,
    :content,
    NOW(),
    :depublicationDate,
    :importantLevel,
    :autor );
