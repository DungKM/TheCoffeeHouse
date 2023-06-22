<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Comfirm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/app.css" type="text/css">
</head>

<body>


<div class="container mt-5 mb-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-8">

            <div class="card">


                <div class="text-left logo p-2 px-5">

                 <a href="/unset"><img src="view/img/the-coffee-house-logo-inkythuatso-01.png" width="50"></a>   
                </div>
        
                <div class="invoice p-5">

                    <h5>Your order Confirmed!</h5>

                    <span class="font-weight-bold d-block mt-4">Hello, <?= $bill->user ?></span>
                    <span>You order has been confirmed and will be shipped in next two days!</span>

                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                        <table class="table table-borderless">

                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Order Date</span>
                                            <span><?= $bill->date_order ?></span>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Order No</span>
                                            <span>MT-<?= $bill->id ?><?= $bill->phone ?></span>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Payment</span>
                                            <span><?= $bill->bill_payment_methods ?></span>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Shiping Address</span>
                                            <span><?= $bill->address?></span>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>





                    </div>




                    <div class="product border-bottom table-responsive">

                        <table class="table table-borderless">

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
                                    <td width="20%">

                                        <img src="upload/<?= $image ?>" width="90">

                                    </td>

                                    <td width="60%">
                                        <span class="font-weight-bold"><?= $cart['name_pro'] ?></span>
                                        <div class="product-qty">
                                            <span class="d-block">Quantity:<?= $cart['number'] ?></span>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold">$<?= $total  ?></span>
                                        </div>
                                    </td>
                                </tr>

                                    <?php
                                        $i += 1;
                                    }
                                    ?>
                               


                               
                            </tbody>

                        </table>



                    </div>



                    <div class="row d-flex justify-content-end">

                        <div class="col-md-5">

                            <table class="table table-borderless">

                                <tbody class="totals">

                                    <tr>
                                        <td>
                                            <div class="text-left">

                                                <span class="text-muted">Subtotal</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <span>$<?= $sum ?></span>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="text-left">

                                                <span class="text-muted">Shipping Fee</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <span>$22</span>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="text-left">

                                                <span class="text-muted">Tax Fee</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <span>$7</span>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left">

                                                <span class="font-weight-bold">Subtotal</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <span class="font-weight-bold"><?= $bill->total ?></span>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>



                    </div>


                    <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                    <span>THE COFFEE TEAM</span>





                </div>


                <div class="d-flex justify-content-between footer p-3">

                    <span>Need Help? visit our <a href="#"> help center</a></span>
                    <span>12 June, 2020</span>

                </div>




            </div>

        </div>

    </div>

</div>
