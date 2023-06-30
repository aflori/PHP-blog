SELECT
    articles.title AS "article",
    autors.pseudoname AS "écrit par",
    articles.publicationDate AS "le"
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