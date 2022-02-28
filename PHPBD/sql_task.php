<?php

    $link = mysqli_connect("localhost", "root", "", "product");
	if (mysqli_connect_errno()) 
	{
		printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    	exit();
	}
    // Получения кол-во товара в категории

    $sql = "SELECT c.product_type, p.product_quantity FROM product p JOIN mainproduccategory mpc on p.id_product = mpc.id_product join category c on c.id_category = mpc.id_category;  ";
    $result = mysqli_query($link,$sql);
    
    if (mysqli_num_rows($result) > 0){
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)) {
            echo  $row["product_type"]. " - " . $row["product_quantity"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>