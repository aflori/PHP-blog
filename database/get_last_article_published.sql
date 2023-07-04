SELECT
    Articles.title AS "title",
    Autors.pseudoname AS "écrit par",
    DATE_FORMAT(Articles.publicationDate, "%d/%m/%Y" )AS "le",
    Articles.ID AS "ID"
FROM
    Articles
  INNER JOIN
    Autors ON Articles.Autors_ID = Autors.ID
WHERE
    Articles.unpublicationDate > NOW()
  AND
    Articles.publicationDate <= NOW()
ORDER BY
    publicationDate DESC
LIMIT
    10;
