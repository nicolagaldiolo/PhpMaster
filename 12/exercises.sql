/*Programming Exercises*/
/*1. Use the appropriate MySQL command to list all tables in the current database.*/
use Books;
show tables;

/*2. Use the appropriate MySQL command to view the structure of the user table.*/

describe user;

/*3. Use the appropriate command to point out to the MySQL server that a change has occurred. Assume you're already logged into the server at the mysql command prompt.*/
flush tables;

/*4. Use the appropriate MySQL command to list all tables in the books database.*/
use Books;
show tables;

/*5. Use the appropriate MySQL command to list all columns from the Orders table in the books database.*/
describe Orders;