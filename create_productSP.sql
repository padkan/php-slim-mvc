DELIMITER $$
 DROP PROCEDURE IF EXISTS create_product$$
 CREATE PROCEDURE create_product()
 BEGIN
   DECLARE r float DEFAULT 0;
   DECLARE x int DEFAULT 0;   
   DECLARE p int DEFAULT 0;
   DECLARE pn int DEFAULT 0;
   DECLARE productName  VARCHAR(255);
   DECLARE small_desc  VARCHAR(255);
 
   SET x = 1;
   SET small_desc = "Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,";
   
   WHILE x  <= 20 DO
   SET productName = CONCAT('product_name',x);
	SET r = rand();
	SET p = r*10;
    SET p = p*100;
    SET pn = p-20;
    INSERT INTO products
			(name, small_desc,price_gross, price_net, image)
	VALUES
			(productName, p, pn, productName);
    SET x = x+1;
   END WHILE;
END$$
DELIMITER ;
       