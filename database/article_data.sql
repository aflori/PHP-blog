SELECT 
    articles.title AS title,
    articles.content AS content,
    DATE_FORMAT(articles.publicationDate, "%d/%m/%Y" ) AS 'date Posté',
    autors.pseudoname AS pseudo
FROM
    articles
  INNER JOIN
    autors ON autors.ID = articles.Autors_ID
WHERE
    articles.ID = ?
