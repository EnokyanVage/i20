<?php

    $link = mysqli_connect("localhost", "root", "", "product");
	if (mysqli_connect_errno()) 
	{
		printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    	exit();
	}
    // Получения кол-во товара в категории

    $sql = "SELECT p.product_name,p.price,i.link FROM product p JOIN productimage pi on pi.id_product = p.id_product JOIN imagep i on i.id_image = pi.id_image";
    $result = mysqli_query($link,$sql);
    
    if (mysqli_num_rows($result) > 0){
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)) {
            // header("Content-type: jpeg");
            echo '<img src="'.$row['link'].'" heigth=500 width=500><br>';
            echo  $row["product_name"]. " - " . $row["price"]."<br>";
        }
    } else {
        echo "0 results";
    }
?>