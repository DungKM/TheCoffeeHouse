<?php include "../resources/views/clients/view/intermediary/header.php"; ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="upload/coffee-beans-top-view-white-background-space-text.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <?php

if(isset($_SESSION['mycart']) && count($_SESSION['mycart']) != 0){
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sum = 0;
                            $i = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                                $image = $cart['image'];
                                $total = $cart['number'] * $cart['price'];
                                $sum += $total;
                            ?>
                             
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="upload/<?= $image ?>" alt="" width="20%">
                                        <h5><?= $cart['name_pro'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $<?= $cart['price']  ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                <input type="number" value="<?= $cart['number'] ?>" placeholder="multiple of 10" id="quantity" name="quantity" min="1" max="5">
                            </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $<?= $total ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="/detail?idcart= <?= $i ?>"><span class="icon_close"></span></a>
                                    </td>
                                </tr>

                            <?php
                                $i += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="index.php?act=shop-grid" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <button type="submit" hidden class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</button>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>$<?= $sum  ?></span></li>
                        <li>Total <span>$<?= $sum  ?></span></li>
                    </ul>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo '<a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>';
                    } else {
                        echo '<a href="/login" class="primary-btn">PROCEED TO CHECKOUT</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
<h2 class="text-center">no products</h2>
    <?php
}
    ?>
</section>
<!-- Shoping Cart Section End -->

<?php include "../resources/views/clients/view/intermediary/footer.php"; ?>