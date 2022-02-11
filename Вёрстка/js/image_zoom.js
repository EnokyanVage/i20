let save_image = $(".product__preview-clothes-top img").attr("src")
$(".product__preview-clothes").each(function(){
    $(this).mouseenter(function() {
        $(".product__preview-clothes-top img").attr("src", $(this).find("img").attr("src"));
    });

    $(this).mouseout(function() {
        $(".product__preview-clothes-top img").attr("src", save_image);
    });

});