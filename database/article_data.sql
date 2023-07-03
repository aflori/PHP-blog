SELECT 
    Articles.title AS title,
    Articles.content AS content,
    DATE_FORMAT(Articles.publicationDate, "%d/%m/%Y" ) AS 'date Posté',
    Autors.pseudoname AS pseudo
FROM
    Articles
  INNER JOIN
    Autors ON Autors.ID = Articles.Autors_ID
WHERE
    Articles.ID = ?
