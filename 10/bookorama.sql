DROP DATABASE bookorama;

CREATE DATABASE bookorama;

USE bookorama;

CREATE TABLE IF NOT EXISTS Customers
( CustomerID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name CHAR(50) NOT NULL,
  Address CHAR(100) NOT NULL,
  City CHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Orders
( OrderID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CustomerID INT UNSIGNED NOT NULL,
  Amount FLOAT(6,2),
  Date DATE NOT NULL,
  FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

CREATE TABLE IF NOT EXISTS Books
( ISBN CHAR(13) NOT NULL PRIMARY KEY,
  Author CHAR(50),
  Title CHAR(100),
  Price FLOAT(4,2)
);

CREATE TABLE IF NOT EXISTS Order_Items
( OrderID INT UNSIGNED NOT NULL,
  ISBN CHAR(13) NOT NULL,
  Quantity TINYINT UNSIGNED,
  
  PRIMARY KEY (OrderID, ISBN), /* Se una tabella ha una chiave primaria multipla va specificata in questo modo e non a fianco del singolo campo*/
  FOREIGN KEY(OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY(ISBN) REFERENCES Books(ISBN)
);

CREATE TABLE IF NOT EXISTS Books_Reviews
( ISBN CHAR(13) NOT NULL PRIMARY KEY,
  Review TEXT,
  
  FOREIGN KEY(ISBN) REFERENCES Books(ISBN)
);


/* è possibile salvare più righe con un unica istruzione passando i dati tra parentesi seguiti da , */
INSERT INTO Customers VALUES
  (1, 'Julie Smith', '25 Oak Street', 'Airport West'),
  (2, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
  (3, 'Michelle Arthur', '357 North Road', 'Yarraville');

INSERT INTO Books VALUES
  ('0-672-31697-8', 'Michael Morgan', 'Java 2 for Professional Developers', 34.99),
  ('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
  ('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
  ('0-672-31769-9', 'Thomas Schenk', 'Caldera OpenLinux System Administration Unleashed', 49.99);

INSERT INTO Orders VALUES
  (NULL, 3, 69.98, '2007-04-02'),
  (NULL, 1, 49.99, '2007-04-15'),
  (NULL, 2, 74.98, '2007-04-19'),
  (NULL, 3, 24.99, '2007-05-01');

INSERT INTO Order_Items VALUES
  (1, '0-672-31697-8', 2),
  (2, '0-672-31769-9', 1),
  (3, '0-672-31769-9', 1),
  (3, '0-672-31509-2', 1),
  (4, '0-672-31745-1', 3);

INSERT INTO Books_Reviews VALUES
  ('0-672-31697-8', 'The Morgan book is clearly written and goes well beyond most of the basic Java books out there.');