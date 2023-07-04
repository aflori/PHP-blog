SELECT
    DATE_FORMAT(Comments.datePublication, "%d/%m/%Y") AS dateDePublication,
    Comments.commentContent AS comentaire,
    Autors.pseudoname AS pseudo
FROM
    Comments
        INNER JOIN
    Autors ON Comments.Autors_ID = Autors.ID
WHERE
        Comments.Articles_ID = ?
ORDER BY
    Comments.datePublication;