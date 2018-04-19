/*dichiaro il db che voglio usare*/
USE books;

INSERT INTO Orders VALUES
  (NULL, 1, 69.98, '2007-04-02'),
  (NULL, 1, 49.99, '2007-04-15'),
  (NULL, 1, 74.98, '2007-04-19'),
  (NULL, 1, 24.99, '2007-05-01');

INSERT INTO Order_Items VALUES
  (25, '0-672-31697-8', 2),
  (26, '0-672-31769-9', 1),
  (27, '0-672-31509-2', 1),
  (28, '0-672-31745-1', 3);