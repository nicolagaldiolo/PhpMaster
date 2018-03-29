/* ON DUPLICATE KEY UPDATE | Permette di aggiornare i dati in caso la chiave primaria sia già presente */

INSERT INTO Customers SET CustomerID=8, Name = 'Nicola Galdiolo', Address= 'Via Giovanni Caboto, 3/A', City='Vigasio, VR' 
ON DUPLICATE KEY UPDATE Name = 'Nicola Galdiolo', Address= 'Via Caduti di Nassirya', City='Vigasio, VR'