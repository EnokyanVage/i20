<?php
    $link = mysqli_connect("localhost", "root", "", "product");
    if (mysqli_connect_errno()) 
    {
        printf("Не удалось подключиться: %s\n", mysqli_connect_error());
        exit();
    }
    $sql_category = "select * from category";

    $result_category = mysqli_query($link,$sql_category);
    
    // $id_product = $link -> real_escape_string($_GET['id_product']);

    // $id = $link -> real_escape_string($_GET['id_category']);
    if(!empty($_GET['id_category'])){
        $id = $link -> real_escape_string($_GET['id_category']); 

        $sql_product = 'SELECT *
        FROM category c JOIN produccategories pc on c.id_category = pc.id_category 
        join product p on p.id_product = pc.id_product 
        join mainproductimage pi on pi.id_product = p.id_product 
        join imagep i on i.id_image = pi.id_image
        WHERE c.id_category = "'.$id.'"';

        $result_product = mysqli_query($link,$sql_product);

        $sql_number = 'SELECT count(pc.id_product) as product_number from product p 
        join produccategories pc on p.id_product = pc.id_product
        WHERE pc.id_category = "'.$id.'"';
        $result_number = mysqli_query($link,$sql_number);
        $product_number = mysqli_fetch_assoc($result_number);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Adidas</title>
<header>
    <div class="categories">
            <?php
                while($row = mysqli_fetch_assoc($result_category)) 
                {
                ?>
                    <div class = "categories__href" >
                        <a href = "?id_category=<?=$row['id_category']; ?>"><?php echo  $row["product_type"]; ?></a>
                    </div>
                    <?php
                }
            ?>
    </div>
</header>
</head>
    <div class="layout">
        <div class="product__numbers">
            <?php
            if(!empty($_GET['id_category'])){
            ?>

            <p>Количество товара:<?=$product_number['product_number']; ?></p>
        <?php
            }
        ?>
        </div>
        <div class="product">
                <?php
                    if(!empty($_GET['id_category'])){
                    while($row = mysqli_fetch_assoc($result_product)) 
                    {
                ?>
                        <div class = "product__item" >
                            <a href="products.php?id_product=<?=$row['id_product']; ?>">
                            <div class="product__item-image">
                                    <?php 
                                        echo '<img src="'.$row['link'].'"'; 
                                    ?>
                            </div>
                            </a>
                            <div class="product__item-name">
                                <?php
                                    echo  '<p>'.$row["product_type"].'</p>';
                                    echo  $row["product_name"];
                                ?>
                            </div>
                        </div>
                        
                        </div>
                <?php
                    }
                }
                ?>
        </div>
    </div>
</body>
</html>