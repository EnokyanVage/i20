CREATE DATABASE Product

create table category
(
   id_category INT(4),
   product_type VARCHAR(25) NOT NULL
);

INSERT INTO category VALUES
  ('1', 'Рубашка'),
  ('2', 'Футболка'),
  ('3', 'Джинсы'),
  ('4', 'Мужская одежда'),
  ('5', 'Женская одежда'),
  ('6', 'Штаны'),
  ('7', 'Летняя одежда');

create table ProductCategory
(
	id_product INT(4),
	id_category CHAR(4)  NOT NULL 
);

INSERT INTO ProductCategory VALUES
  ('1', '1'),
  ('1', '4'),
  ('2', '1'),
  ('2', '5'),
  ('3', '3'),
  ('3', '4'),
  ('3', '6'),
  ('3', '7'),
  ('4', '3'),
  ('4', '5'),
  ('4', '6'),
  ('4', '7');


create table product
(
   id_product INT(4),
   product_name VARCHAR(25) NOT NULL,
   product_quantity INT(25) NOT NULL,
   old_price INT(25) NOT NULL,
   price INT(25) NOT NULL,
   promo_price INT(25),
   description VARCHAR(255) NOT NULL
);

INSERT INTO product VALUES
  ('1', 'Рубашка черная', '12', '2999', '2499', '1999', 'Мужская, чёрная рубашка'),
  ('2', 'Рубашка белая', '8', '2999', '2499', '1999', 'Женская, белая рубашка'),
  ('3', 'Синие джинсы', '7', '3499', '2999', '2499', 'Летние, мужские джинсы'),
  ('4', 'Черные джинсы', '5', '4999', '4499', '2999', 'Летние, женские джинсы');


create table photo
(
   id_product INT(4),
   id_photo INT(4) NOT NULL,
   link VARCHAR(255) NOT NULL ,
   ALT VARCHAR(45) NOT NULL
);

INSERT INTO photo VALUES
  ('1','1','url','ALT фото')

-- SELECT p.product_name,p.price,c.product_type FROM 
-- productcategory pc JOIN category c on pc.id_category = c.id_category 
-- JOIN product p on p.id_product = pc.id_product;