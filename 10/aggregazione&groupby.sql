/* 
FUNZIONI DI AGGREGAZIONE (AVG, COUNT, MIN, MAX, STD, STDDEV, SUM)
Funzioni che mi permettono di aggregare i dati e ricavare informazioni al volo sui dati.
Ad esempio AVG mi torna la media dei totali di tutta la colonna Amount della tabella orders
*/
SELECT AVG(Amount) from orders;
/*
+-------------+
| AVG(Amount) |
+-------------+
|   54.985002 |
+-------------+
1 row in set (0,00 sec)
*/

/* AGGIUNTA DI GROUP BY
Se alle funzioni di aggregazioni aggiungo l'istruzione GROUP BY hanno lo stesso comportamento solo che 
raggruppano i dati in base alla condizione.
Nella query sottostante raggruppo i dati per CustomerID quindi mi tornerà la media degli ordini per ogni Customer
*/

SELECT CustomerID, AVG(Amount) from orders GROUP BY CustomerID;
/*
+------------+-------------+
| CustomerID | AVG(Amount) |
+------------+-------------+
|          1 |   49.990002 |
|          2 |   74.980003 |
|          3 |   47.485002 |
+------------+-------------+
3 rows in set (0,00 sec)
*/

/* CONDIZIONARE CON HAVING
Quando si utilizzano le funzioni di aggregazione e i raggruppamenti GROUP BY è possibile condizionare
i risultati con la clausula HAVING che funzione in maniera analoga a WHERE solo che viene applicata ai gruppi
*/
SELECT CustomerID, AVG(Amount) from orders GROUP BY CustomerID HAVING AVG(Amount) > 50;
/*
+------------+-----------+
| CustomerID | AVGAmount |
+------------+-----------+
|          2 | 74.980003 |
+------------+-----------+
1 row in set (0,00 sec)
*/