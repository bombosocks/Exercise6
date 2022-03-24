-- ISTE 240
-- Modified Spring 2022


DROP table IF EXISTS  pizzatopping;

CREATE TABLE pizzatopping (
   topping tinyint      unsigned PRIMARY KEY,
   cost    decimal(4,2) unsigned default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
INSERT INTO pizzatopping(topping, cost) 
     VALUES(0, 0);
INSERT INTO pizzatopping(topping, cost) 
     VALUES(1, 2.00);
INSERT INTO pizzatopping(topping, cost) 
     VALUES(2, 3.00);
INSERT INTO pizzatopping(topping, cost) 
     VALUES(3, 3.75);
