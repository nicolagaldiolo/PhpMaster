/* SUBQUERIES
Le Subqueries sono query innestate dentro al altre query e sono molto utili ad esempio per fare calcoli al volo 
o ritornare valori*/

SELECT * FROM `Orders` 
WHERE Amount = (SELECT MAX(Amount) FROM `Orders`);

/* Avrei potuto anche fare in maniera tradizionale */
SELECT * FROM `Orders`
ORDER BY Amount DESC
LIMIT 1