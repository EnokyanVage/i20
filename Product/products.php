<?php

$link = mysqli_connect("localhost", "root", "", "product");
if (mysqli_connect_errno()) 
{
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

if(!empty($_GET['id_product'])){
    $id_p = $link -> real_escape_string($_GET['id_product']); 

    $sql_product = 'SELECT * 
    FROM category c JOIN produccategories pc on c.id_category = pc.id_category 
    join product p on p.id_product = pc.id_product 
    join mainproductimage pi on pi.id_product = p.id_product 
    join imagep i on i.id_image = pi.id_image 
    WHERE p.id_product = "'.$id_p.'"';

    $result_product = mysqli_query($link,$sql_product);
    $result_p = mysqli_query($link,$sql_product);
    
    $result_main = mysqli_fetch_assoc($result_p);

    $id_p = $link -> real_escape_string($_GET['id_product']); 
    $sql_image = 'SELECT p.id_product, i.link 
    from product p join productimage pi on p.id_product = pi.id_product 
    join imagep i on i.id_image = pi.id_image 
    WHERE p.id_product = "'.$id_p.'"';

    $result_image = mysqli_query($link,$sql_image);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Adidas</title>
</head>
<body>
    <div class="layout">
    <div class="product">
        <div class="product__preview">
                <div class="product__preview-bread">     
                <?php
                    while($rows = mysqli_fetch_array($result_image)) 
                    {
			    ?>
                    <div class="product__preview-clothes">
                        <img src="<?=$rows['link']; ?>">
                    </div>
                    <?php
                    }
                ?>
                </div>
                <div class="product__preview-clothes-top">
                        <img src="<?=$result_main['link']; ?>">
                </div>
            </div>


            <div class="product__description">
                <h2 class="product__title"><?=$result_main['product_name']; ?></h2>

                <div class="product__categories">
                    <?php
                        while($rows = mysqli_fetch_array($result_product))
                        {
                    ?>
                    <a href = "main.php?id_category=<?=$rows['id_category'];?>"><?php echo $rows["product_type"]?></a> 
                    <?php
                        }
                    ?>
                </div>
                <div class="product__price">
                    <div class="product__price-actual">
                        <span class="product__price-old"><?=$result_main['old_price']; ?></span>
                        <span class="product__price-current price"><?=$result_main['price']; ?></span>
                    </div>
                    <div class="product__price-promo">
                        <span class="product__price-promo price"><?=$result_main['promo_price']; ?></span>
                        <span class="product__price-text"> <span style="font-size: 15px;">- с промокодом</span></span>
                    </div>
                </div>
                
                <div class="product__info">
                    <div class="product__info-item">
                        <img src = "images/ok.ico" alt="#"/>В наличии в магазине
                        <a href="#">Lamoda</a>
                    </div>
                    <div class="product__info-item">
                        <img src = "images/fast.ico" alt="#"/>Бесплатная доставка
                    </div>
                </div>
                <div class="product__count">
                    <div class="product__count-info">
                        <span id="product__count-decrease" style="color: #d6d6d6;">
                            -
                        </span>
                        <input type="text" class="product__count-quantity" id="quantity" value="1">
                        <span id="product__count-increase">
                            +
                        </span>
                    </div>
                </div>
                <div class="product__actions">
                    <button class="custom-button custom-button--blue" id="product__actions-buy">Купить</button>
                    <button class="custom-button">в избранное</button>
                </div>

                <div class="product__text">
                    <span class="product__text-text"><?=$result_main['description']; ?></span>
                </div>

                <div class="product__share">
                    <span class="product__share-title">Поделиться:</span>

                    <div class="product__share-list">
                        <a href="#">
                            <img src="images/vk.ico"/>
                        </a>
                        <a href="#">
                            <img src="images/google.ico"/>
                        </a>
                        <a href="#">
                            <img src="images/facebook.ico"/>
                        </a>
                        <a href="#">
                            <img src="images/twitter.ico"/>
                        </a>
                    </div>
                    <span class="product__share-count">123</span>
                </div>
            </div>
        </div>
    </div>
    <script src = "js/product_quantity.js"></script>
    <script src= "js/buy_product.js"></script>
    <script src = "js/image_zoom.js"></script>
</body>
</html>