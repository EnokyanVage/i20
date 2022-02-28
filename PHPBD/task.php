<?php

    $link = mysqli_connect("localhost", "root", "", "product");
	if (mysqli_connect_errno()) 
	{
		printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    	exit();
	}
    mysqli_query($link, "DROP TABLE IF EXISTS product");
    $sql_product = "CREATE TABLE product (
		id_product int not null, 
		product_name varchar(70), 
		product_quantity int,
        old_price int, 
        price int, 
        promo_price int, 
		description varchar(256))";

    if (mysqli_query($link, $sql_product)) 
    {
    print "Таблица - product -  успешно создана";
    } 
    else
    {
        print "Ошибка(product): ".mysqli_error($link);
        exit();
    }
    $sql_product_inser = "INSERT INTO product VALUES 
    ('1', 'Черная Рубашка', '200', '2990', '2490', '1990', 'Состав: Хлопок - 100%'),
    ('2', 'Белая Рубашка', '250', '1999', '1599', '999', 'Хлопок 68%, Полиамид 29%, Эластан 3%'),
    ('3', 'Брюки-Massimo Dutti', '100', '4990', '4490', '2990', 'Состав: Хлопок - 98%, Эластан - 2%'),
    ('4', 'Брюки-Bershka', '100', '3599', '2999', '2499', 'Состав: Хлопок - 100%'),
    ('5', 'Куртка-Ostin', '100', '4999', '3999', '2499', 'Состав: Полиэстер - 100%');
    ";
    if(mysqli_query($link, $sql_product_inser))  
    {
        print "Таблица - product -  успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(product): ".mysqli_error($link);
        exit();
    }



    // Category
    mysqli_query($link, "DROP TABLE IF EXISTS Category");
    $sql_Category= "CREATE TABLE Category (
		id_category int not null, 
		product_type VARCHAR(256) not null)";

    if (mysqli_query($link, $sql_Category)) 
    {
    print "Таблица - Category - успешно создана";
    } 
    else
    {
        print "Ошибка(Category): ".mysqli_error($link);
        exit();
    }

    $sql_Category_insert = "INSERT INTO Category VALUES 
    ('1', 'Рубашка'),
    ('2', 'Мужская'),
    ('3', 'Женская'),
    ('4', 'Куртка'),
    ('5', 'Брюки'),
    ('6', 'Весенняя'),
    ('7', 'Женский вверх'),
    ('8', 'Мужской вверх'),
    ('9', 'Женский низ'),
    ('10', 'Мужской низ');
    ";
    if(mysqli_query($link, $sql_Category_insert))  
    {
        print "Таблица - Category - успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(Category): ".mysqli_error($link);
        exit();
    }


    // sql_ProducCategories
    mysqli_query($link, "DROP TABLE IF EXISTS ProducCategories");
    $sql_ProducCategories= "CREATE TABLE ProducCategories (
		id_product int not null, 
		id_category int not null )";

    if (mysqli_query($link, $sql_ProducCategories)) 
    {
    print "Таблица - ProducCategories - успешно создана";
    } 
    else
    {
        print "Ошибка(ProducCategories): ".mysqli_error($link);
        exit();
    }

    $sql_ProducCategories_insert = "INSERT INTO ProducCategories VALUES 
    ('1', '2'),
    ('1', '1'),
    ('2', '3'),
    ('2', '1'),
    ('3', '2'),
    ('3', '5'),
    ('4', '3'),
    ('4', '5'),
    ('5', '4'),
    ('5', '2'),
    ('5', '6');
    ";
    if(mysqli_query($link, $sql_ProducCategories_insert))  
    {
        print "Таблица - ProducCategories - успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(ProducCategories): ".mysqli_error($link);
        exit();
    }
    
    // 
    mysqli_query($link, "DROP TABLE IF EXISTS MainProducCategory");
    $sql_MainProducCategory= "CREATE TABLE MainProducCategory (
		id_product int not null, 
		id_category int not null )";

    if (mysqli_query($link, $sql_MainProducCategory)) 
    {
    print "Таблица - MainProducCategory - успешно создана";
    } 
    else
    {
        print "Ошибка(MainProducCategory): ".mysqli_error($link);
        exit();
    }

    $sql_MainProducCategory_insert = "INSERT INTO MainProducCategory VALUES 
    ('1', '8'),
    ('2', '7'),
    ('3', '9'),
    ('4', '10'),
    ('5', '5');
    ";
    if(mysqli_query($link, $sql_MainProducCategory_insert))  
    {
        print "Таблица - MainProducCategory - успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(MainProducCategory): ".mysqli_error($link);
        exit();
    }







    // Image
    mysqli_query($link, "DROP TABLE IF EXISTS ImageP");
    $sql_ImageP= "CREATE TABLE ImageP (
		id_image int not null, 
		alt varchar(256),
        link varchar(256))";

    if (mysqli_query($link, $sql_ImageP)) 
    {
    print "Таблица - ImageP - успешно создана";
    } 
    else
    {
        print "Ошибка(ImageP): ".mysqli_error($link);
        exit();
    }

    $sql_ImageP_insert = "INSERT INTO ImageP VALUES 
    ('1', 'Рубашка', 'МужскаяРубашка.jpg'),
    ('2', 'Рубашка', 'ЖенскаяРубашка.jpg'),
    ('3', 'Брюки', 'БрюкиMassimo.jpeg'),
    ('4', 'Брюки', 'БрюкиBershka.jpeg'),
    ('5', 'Куртка', 'куртки.jpg');
    ";
    if(mysqli_query($link, $sql_ImageP_insert))  
    {
        print "Таблица - ImageP - успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(ImageP): ".mysqli_error($link);
        exit();
    }
  

    // ProductImage
    mysqli_query($link, "DROP TABLE IF EXISTS ProductImage");
    $sql_ProductImage= "CREATE TABLE ProductImage (
		id_product int not null, 
		id_image int not null )";

    if (mysqli_query($link, $sql_ProductImage)) 
    {
    print "Таблица - ProductImage - успешно создана";
    } 
    else
    {
        print "Ошибка(ProductImage): ".mysqli_error($link);
        exit();
    }

    $sql_ProductImage_insert = "INSERT INTO ProductImage VALUES 
    ('1', '1'),
    ('2', '2'),
    ('3', '3'),
    ('4', '4'),
    ('5', '5');
    ";
    if(mysqli_query($link, $sql_ProductImage_insert))  
    {
        print "Таблица - ProductImage - успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(ProductImage): ".mysqli_error($link);
        exit();
    }
  
    // MainProductImage
    mysqli_query($link, "DROP TABLE IF EXISTS MainProductImage");
    $sql_MainProductImage= "CREATE TABLE MainProductImage (
		id_product int not null, 
		id_image int not null )";

    if (mysqli_query($link, $sql_MainProductImage)) 
    {
    print "Таблица - MainProductImage - успешно создана";
    } 
    else
    {
        print "Ошибка(MainProductImage): ".mysqli_error($link);
        exit();
    }

    $sql_MainProductImage_insert = "INSERT INTO MainProductImage VALUES 
    ('1', '1'),
    ('2', '2'),
    ('3', '3'),
    ('4', '4'),
    ('5', '5');
    ";
    if(mysqli_query($link, $sql_MainProductImage_insert))  
    {
        print "Таблица - MainProductImage - успешно заполнена.<br>";
    } 
    else 
    {
        print "Ошибка(MainProductImage): ".mysqli_error($link);
        exit();
    }

    mysqli_close($link);
?>