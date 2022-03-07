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
		product_name varchar(128), 
		product_quantity int,
        old_price varchar(10), 
        price varchar(10), 
        promo_price varchar(10), 
		description varchar(512))";

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
    ('1', 'КРОССОВКИ NMD_R1 PRIMEBLUE', '200', '16 990', '14 990', '12 990', 'Модель содержит Primeblue, функциональный переработанный материал с волокнами Parley Ocean Plastic. 50% верха — текстиль, из них 75% — волокно Primeblue. Без первичного полиэстера.'),
    ('2', 'ВЫСОКИЕ КРОССОВКИ FORUM', '250', '11 999', '10 599', '9 999', '25% элементов верха минимум на 50% состоят из переработанных материалов. Цвет модели: Cloud White / Orbit Green / Gum'),
    ('3', 'КРОССОВКИ OZELIA', '100', '11 990', '10 490', '9 990', 'Амортизация Adiprene Резиновая подметка. Цвет модели: Savanna / Savanna / Savanna'),
    ('4', 'КУРТКА TECH WARM KNIT', '100', '11 999', '10 999', '9 499', 'Эластичные манжеты и нижний край В рамках инициативы Better Cotton. Цвет модели: Black'),
    ('5', 'УТЕПЛЕННЫЙ АНОРАК PRIMALOFT PARLEY TERREX MYSHELTER', '100', '18 999', '16 999', '12 499', 'Анатомическая конструкция рукавов и нижнего края. Частично эластичные манжеты. Утепленные манжеты Parley Ocean Plastic. Цвет модели: Non Dyed'),
    ('6', 'КРОССОВКИ FORUM BOLD', '100', '11 999', '10 999', '9 499', 'Резиновая подметка 25% компонентов верха на 50% выполнены из переработанных материалов. Цвет модели: Wonder Mauve / Wonder Mauve / Ecru Tint'),
    ('7', 'БРЮКИ ADIDAS X KARLIE KLOSS', '100', '7 999', '6 999', '6 499', 'Стандартная посадка. Эластичный пояс со светоотражающими завязками-шнурками. Плотный трикотаж: 67% хлопок, 33% переработанный полиэстер. Боковые карманы на молнии. Легкая драпировка на лицевой стороне');
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
    ('1', 'Мужчинам'),
    ('2', 'Женщинам'),
    ('3', 'Обувь'),
    ('4', 'Одежда');
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
    ('1', '1'),
    ('1', '3'),
    ('2', '1'),
    ('2', '3'),
    ('3', '1'),
    ('3', '3'),
    ('4', '1'),
    ('4', '4'),
    ('5', '1'),
    ('5', '4'),
    ('6', '2'),
    ('6', '3'),
    ('7', '2'),
    ('7', '4');
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
    ('1', '1'),
    ('2', '1'),
    ('3', '1'),
    ('4', '1'),
    ('5', '1'),
    ('6', '2'),
    ('7', '2');
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
    ('1', 'КРОССОВКИ NMD_R1', 'images/КРОССОВКИ_NMD_R1_ОСНОВА.jpg'),
    ('2', 'КРОССОВКИ NMD_R1', 'images/КРОССОВКИ_NMD_R1_1.jpg'),
    ('3', 'КРОССОВКИ NMD_R1', 'images/КРОССОВКИ_NMD_R1_2.jpg'),
    ('4', 'КРОССОВКИ NMD_R1', 'images/КРОССОВКИ_NMD_R1_3.jpg'),
    ('5', 'КРОССОВКИ FORUM', 'images/КРОССОВКИ_FORUM_ОСНОВА.jpg'),
    ('6', 'КРОССОВКИ FORUM', 'images/КРОССОВКИ_FORUM_1.jpg'),
    ('7', 'КРОССОВКИ FORUM', 'images/КРОССОВКИ_FORUM_2.jpg'),
    ('8', 'КРОССОВКИ FORUM', 'images/КРОССОВКИ_FORUM_3.jpg'),
    ('9', 'КРОССОВКИ OZELIA', 'images/КРОССОВКИ_OZELIA_ОСНОВА.jpg'),
    ('10', 'КРОССОВКИ OZELIA', 'images/КРОССОВКИ_OZELIA_1.jpg'),
    ('11', 'КРОССОВКИ OZELIA', 'images/КРОССОВКИ_OZELIA_2.jpg'),
    ('12', 'КРОССОВКИ OZELIA', 'images/КРОССОВКИ_OZELIA_3.jpg'),
    ('13', 'КУРТКА_WARM_KNIT', 'images/КУРТКА_WARM_KNIT_ОСНОВА.jpg'),
    ('14', 'КУРТКА_WARM_KNIT', 'images/КУРТКА_WARM_KNIT_1.jpg'),
    ('15', 'КУРТКА_WARM_KNIT', 'images/КУРТКА_WARM_KNIT_2.jpg'),
    ('16', 'КУРТКА_WARM_KNIT', 'images/КУРТКА_WARM_KNIT_3.jpg'),
    ('17', 'АНОРАК PRIMALOFT', 'images/АНОРАК_PRIMALOFT_ОСНОВА.jpg'),
    ('18', 'АНОРАК PRIMALOFT', 'images/АНОРАК_PRIMALOFT_1.jpg'),
    ('19', 'АНОРАК PRIMALOFT', 'images/АНОРАК_PRIMALOFT_2.jpg'),
    ('20', 'АНОРАК PRIMALOFT', 'images/АНОРАК_PRIMALOFT_3.jpg'),
    ('21', 'КРОССОВКИ FORUM BOLD', 'images/КРОССОВКИ_FORUM_BOLD_ОСНОВА.jpg'),
    ('22', 'КРОССОВКИ FORUM BOLD', 'images/КРОССОВКИ_FORUM_BOLD_1.jpg'),
    ('23', 'КРОССОВКИ FORUM BOLD', 'images/КРОССОВКИ_FORUM_BOLD_2.jpg'),
    ('24', 'КРОССОВКИ FORUM BOLD', 'images/КРОССОВКИ_FORUM_BOLD_3.jpg'),
    ('25', 'БРЮКИ ADIDAS X KARLIE KLOSS', 'images/БРЮКИ_ADIDAS_WOMEN_ОСНОВНОЙ.jpg'),
    ('26', 'БРЮКИ ADIDAS X KARLIE KLOSS', 'images/БРЮКИ_ADIDAS_WOMEN_1.jpg'),
    ('27', 'БРЮКИ ADIDAS X KARLIE KLOSS', 'images/БРЮКИ_ADIDAS_WOMEN_2.jpg'),
    ('28', 'БРЮКИ ADIDAS X KARLIE KLOSS', 'images/БРЮКИ_ADIDAS_WOMEN_3.jpg');
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
    ('1', '2'),
    ('1', '3'),
    ('1', '4'),
    ('2', '6'),
    ('2', '7'),
    ('2', '8'),
    ('3', '10'),
    ('3', '11'),
    ('3', '12'),
    ('4', '14'),
    ('4', '15'),
    ('4', '16'),
    ('5', '18'),
    ('5', '19'),
    ('5', '20'),
    ('6', '22'),
    ('6', '23'),
    ('6', '24'),
    ('7', '26'),
    ('8', '27'),
    ('9', '28');
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
    ('2', '5'),
    ('3', '9'),
    ('4', '13'),
    ('5', '17'),
    ('6', '21'),
    ('7', '25');
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