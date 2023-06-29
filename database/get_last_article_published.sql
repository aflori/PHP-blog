SELECT
    articles.title AS "Article title",
    autors.pseudoname AS "writen by",
    articles.publicationDate AS "ON"
FROM
    articles
  INNER JOIN
    autors ON articles.Autors_ID = autors.ID
ORDER BY
    publicationDate DESC
LIMIT
    10;