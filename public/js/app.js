// Открытие/закрытие корзины при клике на кнопку.
const basketBtn = document.querySelector('.icon-cart');
const tbl = document.querySelector('.cart-block');

basketBtn.addEventListener('click', function(){
    tbl.classList.toggle('invisible');
});

// function addProduct(id) {
//     console.log(id);
//     $.ajax({
//         type: 'POST',
//         url: 'models/Cart.php',
//         data: 'id='+id,
//         success: function(response){
//             //alert(response);
//             $('.product-quantity').html(response);
//         }
//     });
// }

function delProduct(id) {
    console.log(id);
    $.ajax({
        type: 'POST',
        url: 'index.php?act=cartDel&c=page',
        data: 'del-id='+id,
        success: function (res){
            alert(res);
        }
    });
}
function addProduct(id) {
    console.log(id);
    $.ajax({
        type: 'POST',
        url: 'index.php?act=cartAdd&c=page',
        data: 'id='+id,
        success: function(res){
            //console.log(res)
            alert(res);
            //$('.product-quantity').html(response);
        }
    });
}
