CREATE TABLE IF NOT EXISTS test1
( CustomerID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name CHAR(50) NOT NULL,
  Address CHAR(100) NOT NULL,
  City CHAR(30) NOT NULL
);


/* è possibile salvare più righe con un unica istruzione passando i dati tra parentesi seguiti da , */
INSERT INTO test1 VALUES
  (1, 'Julie Smith', '25 Oak Street', 'Airport West'),
  (2, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
  (3, 'Michelle Arthur', '357 North Road', 'Yarraville'),
  (4, 'Julie Smith', '25 Oak Street', 'Airport West'),
  (5, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
  (6, 'Michelle Arthur', '357 North Road', 'Yarraville'),
  (7, 'Julie Smith', '25 Oak Street', 'Airport West'),
  (8, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
  (9, 'Michelle Arthur', '357 North Road', 'Yarraville');