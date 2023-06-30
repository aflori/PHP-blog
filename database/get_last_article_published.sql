SELECT
    articles.title AS "title",
    autors.pseudoname AS "écrit par",
    DATE_FORMAT(articles.publicationDate, "%d/%m/%Y" )AS "le",
    articles.ID AS "ID"
FROM
    articles
  INNER JOIN
    autors ON articles.Autors_ID = autors.ID
WHERE
    articles.unpublicationDate > NOW()
ORDER BY
    publicationDate DESC
LIMIT
    10;
