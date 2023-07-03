SELECT 
    Articles.title AS title,
    Articles.content AS content,
    DATE_FORMAT(Articles.publicationDate, "%d/%m/%Y" ) AS 'date Posté',
    Autors.pseudoname AS pseudo
FROM
    Articles
  INNER JOIN
    Autors ON autors.ID = articles.Autors_ID
WHERE
    Articles.ID = ?
