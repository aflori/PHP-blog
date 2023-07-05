INSERT INTO
    Comments
    (ID,
     datePublication,
     commentContent,
     Autors_ID,
     Articles_ID)
VALUES
    (NULL,
     NOW(),
     :commentContent,
     :AutorID,
     :ArticleID );