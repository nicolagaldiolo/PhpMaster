/*

Programming Exercises
1. Use SQL to insert the values NULL, prod1, and $9.99 into the PRODUCTS table

2. Use the mysql command to log into the localhost MySQL host with the username tom, password P@$$w0rd! and run the script insert.sql.

3. Use SQL to select the name and city columns from the Customers table.

4. Select all rows from the Orders table where the CustomerID is greater than 300.

5. Select all rows from the Orders table where the CustomerID is 400 or 500.

*/


/* 1 */

INSERT INTO products (name, alias, price) VALUES (NULL, 'prod1', '9.99');
INSERT INTO products VALUES (NULL, NULL, 'prod2', '100.99');

/*
mysql> select * from products;
+----+------+-------+--------+
| id | name | alias | price  |
+----+------+-------+--------+
|  1 | NULL | prod1 |   9.99 |
|  2 | NULL | prod2 | 100.99 |
+----+------+-------+--------+
2 rows in set (0,00 sec)

*/

/* 2 */
CREATE USER 'tom'@'localhost' IDENTIFIED BY 'P@$$w0rd!';
GRANT ALL ON test.* TO 'tom'@'localhost';

/* mysql -h localhost -u tom -p test < Projects/Httpdocs/Corsi/phpmaster/10/insert.sql */
/* use test */
/* select * from test1; */
/*
+------------+-----------------+--------------------+--------------+
| CustomerID | Name            | Address            | City         |
+------------+-----------------+--------------------+--------------+
|          1 | Julie Smith     | 25 Oak Street      | Airport West |
|          2 | Alan Wong       | 1/47 Haines Avenue | Box Hill     |
|          3 | Michelle Arthur | 357 North Road     | Yarraville   |
|          4 | Julie Smith     | 25 Oak Street      | Airport West |
|          5 | Alan Wong       | 1/47 Haines Avenue | Box Hill     |
|          6 | Michelle Arthur | 357 North Road     | Yarraville   |
|          7 | Julie Smith     | 25 Oak Street      | Airport West |
|          8 | Alan Wong       | 1/47 Haines Avenue | Box Hill     |
|          9 | Michelle Arthur | 357 North Road     | Yarraville   |
+------------+-----------------+--------------------+--------------+
9 rows in set (0,00 sec)
*/

/* 3 */
SELECT Name,City FROM Customers;
/*
+-----------------+--------------+
| name            | city         |
+-----------------+--------------+
| Julie Smith     | Airport West |
| Alan Wong       | Box Hill     |
| Michelle Arthur | Yarraville   |
+-----------------+--------------+
3 rows in set (0,00 sec)
*/

/* 4 */
SELECT * FROM Orders WHERE CustomerID > 2;
/*
+---------+------------+--------+------------+
| OrderID | CustomerID | Amount | Date       |
+---------+------------+--------+------------+
|       1 |          3 |  69.98 | 2007-04-02 |
|       4 |          3 |  24.99 | 2007-05-01 |
+---------+------------+--------+------------+
2 rows in set (0,00 sec)
*/

/* 5 */
SELECT * FROM Orders WHERE CustomerID IN (2,3);
SELECT * FROM Orders WHERE CustomerID = 2 or CustomerID = 3;
SELECT * FROM Orders WHERE CustomerID BETWEEN 2 AND 3;
/*
+---------+------------+--------+------------+
| OrderID | CustomerID | Amount | Date       |
+---------+------------+--------+------------+
|       1 |          3 |  69.98 | 2007-04-02 |
|       3 |          2 |  74.98 | 2007-04-19 |
|       4 |          3 |  24.99 | 2007-05-01 |
+---------+------------+--------+------------+
3 rows in set (0,00 sec)
*/