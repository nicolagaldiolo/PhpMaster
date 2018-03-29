/* SUBQUERIES
Le Subqueries sono query innestate dentro al altre query e sono molto utili ad esempio per fare calcoli al volo 
o ritornare valori*/

SELECT * FROM `Orders` 
WHERE Amount = (SELECT MAX(Amount) FROM `Orders`);

/* Avrei potuto anche fare in maniera tradizionale */
SELECT * FROM `Orders`
ORDER BY Amount DESC
LIMIT 1

/* SUBQUERIES AND OPERATORS */
/*  Se viene tornata una sola riga dalla subquery posso usare l'operatore di confronto (=,<,>,ecc) mentre
    se ho più di un risultato devo usare uno degli operatori seguenti
    - ANY o SOME (la query primaria deve soddisfare almeno uno dei risultati della subquery, se il confronto è un elenco di importi mi basta quello più basso)
    - IN o =ANY (la query primaria soddisfa tutte i risultati che matchano)
    - ALL = (la query primaria deve soddisfare TUTTI i risultati della subquery, se il confronto è un elenco di importi li deve soddisfare tutti quindi il più alto)
*/

SELECT *
FROM Customers
WHERE CustomerID =ANY (SELECT CustomerID FROM Orders WHERE Amount > 50.00)

/*
+------------+-----------------+--------------------+------------+
| CustomerID | Name            | Address            | City       |
+------------+-----------------+--------------------+------------+
|          3 | Michelle Arthur | 357 North Road     | Yarraville |
|          2 | Alan Wong       | 1/47 Haines Avenue | Box Hill   |
+------------+-----------------+--------------------+------------+
2 rows in set (0,00 sec)
*/

/* SUBQUERIES CORRELATE */
/*  Le subquery correlate permettono di accedere a dati (fare riferimento) alla query principale. 
la query interna utilizza gli ISBN della query principale nella condizione where, ho evitato così di fare il JOIN */

SELECT ISBN, Title 
FROM Books
WHERE NOT EXISTS (SELECT * FROM Order_Items WHERE Order_Items.ISBN = Books.ISBN)

/* La query principale trona le righe che non hanno trovato corrispondenza nella subquery grazie alla clausula NOT EXISTS 
La clausula EXISTS fa il contrario, torna tutte le righe che matchano
*/

/*
+---------------+-----------------------------+
| ISBN          | Title                       |
+---------------+-----------------------------+
| 0-672-31745-1 | Installing Debian GNU/Linux |
+---------------+-----------------------------+
1 row in set (0,00 sec)
*/

/* SUBQUERIES IN TABELLE TEMPORANEE */
/* La query mi permette di creare al volo una tabella temporanea con i risulati della subquery,
nb: occorre sempre definire un alias */

SELECT * FROM (SELECT CustomerID from Customers WHERE City = 'Box Hill') AS BoxHillCustomers

/*
+------------+
| CustomerID |
+------------+
|          2 |
+------------+
1 row in set (0,01 sec)
*/