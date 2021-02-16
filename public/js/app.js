// Открытие/закрытие корзины при клике на кнопку.
const basketBtn = document.querySelector('.icon-cart');
const tbl = document.querySelector('.cart-block');

basketBtn.addEventListener('click', function(){
    tbl.classList.toggle('invisible');
});


function delProduct(id) {
    //console.log(id);
    $.ajax({
        type: 'POST',
        url: 'index.php?act=cartDel&c=page',
        data: 'del-id='+id,
        success: function (res){
            alert(res); // Придумать как уведомлять пользователя о добавлении/удалении товара.
        }
    });
}
function addProduct(id) {
    //console.log(id);
    $.ajax({
        type: 'POST',
        url: 'index.php?act=cartAdd&c=page',
        data: 'id='+id,
        success: function(res){
            alert(res);
            //$('.product-quantity').html(response);
        }
    });
}
