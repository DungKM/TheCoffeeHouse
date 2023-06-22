<?php include "../resources/views/clients/view/intermediary/header.php"; ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="upload/coffee-beans-top-view-white-background-space-text.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<script src="https://www.paypal.com/sdk/js?client-id=AbyDdv42cu0wTOQKc2hjuflIr-rHr1mnH-4lbQjTwo4LZCHNKjrFFDfjVLn2q64_cFr1l4kB2sXbdiEv&currency=USD"></script>
<script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            var sum = document.getElementById("sum").value;
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: sum // Can also reference a variable or function

                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                window.location.replace('http://localhost/PHP%20DOC/Web_coffee_main/index.php?act=pay&pay_paypal=paypal');
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        },
        onCancle: function(data) {
            window.location.replace('http://localhost/PHP%20DOC/Web_coffee_main/index.php?act=checkout');
        }
    }).render('#paypal-button');
</script>
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <?php
            if (isset($_SESSION['user'])) {
                $name = $_SESSION['user']['user'];
                $address = $_SESSION['user']['address'];
                $email = $_SESSION['user']['email'];
                $phone = $_SESSION['user']['phone_number'];
            } else {
                $name = "";
                $firstname = "";
                $lastname = "";
                $address = "";
                $email = "";
                $phone_number = "";
            }
            ?>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="/bill-comfirm" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>User name<span>*</span></p>
                                <input type="text" name="user" value="<?= $user  ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" value="<?= $address ?>" name="address" id="bill_ad">
                            </div>
                            <div class="checkout__input">
                                <p>Conscious<span>*</span></p>
                                <select id="province" class="form-select">
                                    <option value="">Choose(Conscious)</option>
                                </select>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <select id="district" class="form-select">
                                </select>
                            </div>
                            <div class="checkout__input">
                                <p>ward<span>*</span></p>
                                <select id="ward" class="form-select">
                                </select>
                            </div>
                            <h2 id="result" hidden></h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" name="phone" value="<?= $phone ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id_user" value="<?= (isset($_SESSION['user'])) ? $_SESSION['user']['id'] :  0; ?>">
                            
                                <input type="hidden" name="id">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="<?= $email  ?>">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <!-- <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div> -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php
                                    $sum = 0;
                                    $i = 0;
                                    foreach ($_SESSION['mycart'] as $cart) {
                                        $image = $cart['image'];
                                        $total = $cart['number'] * $cart['price'];
                                        $sum += $total;
                                    ?>
                                        <li><?= $cart['number'] ?> X <?= $cart['name_pro'] ?><span>$<?= $cart['price'] ?></span></li>
                                    <?php
                                        $i += 1;
                                    }
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$<?= $sum  ?></span></div>
                                <div class="checkout__order__total">Total <span>$<?= $sum  ?></span></div>
                                <input type="hidden" name="total" value="<?= $sum ?>" id="sum">

                                <?php
                                if (isset($bill_payment_methods)) {
                                    if ($bill_payment_methods == 'PayPal' || $bill_payment_methods == 'momo') {
                                ?>
                                <?php
                                    }
                                } else {
                                    echo '
                             <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Receive goods before payment
                                        <input type="radio" name="bill_payment_methods" value="Receive goods before payment" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    </div>
                            ';
                                }
                                ?>
                                <?php
                                if (isset($bill_payment_methods)) {
                                    if ($bill_payment_methods == 'PayPal' || $bill_payment_methods == 'momo') {
                                ?>
                                <?php
                                    }
                                } else {
                                    echo '
                                    <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        <img src="upload/PP_logo_h_100x26.png" alt="" width="100">
                                        <input type="radio" name="payment_methods" value="PayPal" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="momo">
                                    <img src="upload/momo_icon_square_pinkbg@3x.png" alt="" width="50">
                                        <input type="radio" name="payment_methods" value="momo" id="momo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="vnpay">
                                        <img src="upload/Logo-VNPAY-QR-1.png" alt="" width="100">
                                        <input type="radio" name="payment_methods" value="Online VnPay" id="vnpay">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                             <button type="submit" class="site-btn">PLACE ORDER</button>';
                                }
                                ?>
                                <?php
                                if (isset($bill_payment_methods) && $bill_payment_methods == 'PayPal') {
                                    echo '<div id="paypal-button"></div>';
                                }
                                ?>
                </form>
                <?php
                if (isset($bill_payment_methods)  && $bill_payment_methods == 'momo') {
                ?>
                    <form action="view/momo_atm.php" target="_blank" method="post" enctype="application/x-www-form-urlencoded">
                        <!-- <input type="hidden" name="sum_vn" value="<?= $sum_vn   ?>" id="sum"> -->
                        <button type="submit"  class="btn" style="background-color: #fff;"><img src="upload/momo_icon_square_pinkbg@3x.png" alt="" width="50"></button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // 1. what is API
    // 2. How do I call API
    // 3. Explain code
    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "province");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Choose(address)</option>';
        array.forEach(element => {
            row += `<option value="${element.code}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#province").change(() => {
        callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").val() + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").val() != "" && $("#province").val() != "" &&
            $("#ward").val() != "") {
            let result = $("#province option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").text(result)

            var bill_ad = document.getElementById("bill_ad").value = result;
        }


    }
    $('.set-bg').each(function() {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });
</script>

<?php include "../resources/views/clients/view/intermediary/footer.php"; ?>