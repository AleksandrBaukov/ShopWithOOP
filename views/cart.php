<?
if ($cartGoods == null){
    echo "Cart is empty.";
} else
    //print_r($cartGoods);
    foreach ($cartGoods as $cartGood){
        $id = $cartGood['id_good'];
        $good= SQL::Instance()->SelectWithKey('goods', 'id', $id);
        $goodsCount += $cartGood['quantity'];
        $sumPrice += $cartGood['quantity']*$good['price'];
        ?>
        <div class="cart-item">
            <div class="product-bio">
                <img src="<?= $good['path']?>" alt="Some image" width="92.5px" height="59px">
                <div class="product-desc">
                    <p class="product-title"><?= $good['name']?></p>
                    <p class="product-quantity"><?= $cartGood['quantity']?></p>
                    <p class="product-single-price">$ <?= $good['price']?> each</p>
                </div>
            </div>
            <div class="right-block">
                <p class="product-price"><?= ($cartGood['quantity']*$good['price']);?> $</p>
                <button class="del-btn" onclick="delProduct(<?= $good["id"] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
        </div>
    <?}
?>
<span class="counter">Items in Cart : <span class="counter-item"><?= $goodsCount?></span></span>
<span class="priceCounter">Total amount : <span class="priceCounter-item"><?= $sumPrice?> $</span></span>
