-- ISTE 240
-- Modified Spring 2022


DROP table IF EXISTS  pizzacost; 

CREATE TABLE pizzacost (
   size  char(1) PRIMARY KEY,
   price decimal(7,2) unsigned default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
INSERT INTO pizzacost(size, price) 
     VALUES("P", 7.99);
INSERT INTO pizzacost(size, price) 
     VALUES("S", 10.99);
INSERT INTO pizzacost(size, price) 
     VALUES("M", 13.99);
INSERT INTO pizzacost(size, price) 
     VALUES("L", 16.99);
