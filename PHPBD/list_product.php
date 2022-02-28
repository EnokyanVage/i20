<?php

    $link = mysqli_connect("localhost", "root", "", "product");
	if (mysqli_connect_errno()) 
	{
		printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    	exit();
	}

    $sql = "SELECT c.product_type, GROUP_CONCAT(p.product_name SEPARATOR ', ') as product_name FROM category c JOIN produccategories pc on c.id_category = pc.id_category join product p on p.id_product = pc.id_product GROUP BY c.product_type;";
    $result = mysqli_query($link,$sql);
    
    if (mysqli_num_rows($result) > 0){
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)) {
            echo  $row["product_type"]. " - " . $row["product_name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>