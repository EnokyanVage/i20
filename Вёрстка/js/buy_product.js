$(document).ready(function () {
    $(".product__actions button").click(function () {
        
        let parent = $(this).parent().parent();

        let count = parent.find('input').val();
        toastr.success("В корзину добавлено " + count + " товаров")
    });
});
