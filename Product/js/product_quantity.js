let InputQuantity = document.getElementById('quantity').value;
let InputQuantityNumber = document.querySelector(".product__count-quantity")

if(InputQuantityNumber)
{
    let ProductQuantityIncrease = document.getElementById('product__count-increase');
    let ProductQuantityDecrease = document.getElementById('product__count-decrease');
    
    let increase = () => {
        InputQuantityNumber.value++;
    }

    let decrease = () => {
        if(InputQuantityNumber.value > 0)
        {
            InputQuantityNumber.value--;
        }   
        else 
        {
            InputQuantityNumber.value = 0;
        }
        
    }

    ProductQuantityIncrease.addEventListener('click', increase);
    ProductQuantityDecrease.addEventListener('click', decrease);
}