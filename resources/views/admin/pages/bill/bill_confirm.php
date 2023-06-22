<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
         
                <h4 class="card-title d-flex justify-content-between align-items-center  text-uppercase bg-gradient-success p-3 text-white rounded-3">Complete <i class="mdi mdi-check "></i>

                </h4>
            </form>


            <?php
            if (isset($bill) && (is_array($bill))) {
                extract($bill);
            }
            ?>
            <div class="table-responsive">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">code orders</th>
                            <th class="text-center">client</th>
                            <th class="text-center">Shiping Address</th>
                            <th class="text-center">order_date</th>
                            <th class="text-center">Payment</th>
                            <!-- <th class="text-center">manipulation</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center">MT-<?= $bill['id'] ?><?= $bill['bill_phone'] ?></td>
                            <td class="text-center"> <?= $bill['bill_name'] ?></td>
                            <td class="text-center"> <?= $bill['bill_address'] ?></td>
                            <td class="text-center"> <?= $bill['order_date'] ?></td>
                            <td class="text-center"> <?= $bill['bill_payment_methods'] ?></td>
                            </td>
                        </tr>
                    </tbody>
                </table>

        <br>
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Image products</th>
                            <th class="text-center">Name product</th>
                            <th class="text-center">Price</th>
                            <!-- <th class="text-center">manipulation</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        $i = 0;
                        foreach ($_SESSION['mycart_bill'] as $cart) {
                            $image = $cart[2];
                            $total = $cart[3] * $cart[4];
                            $sum += $total;
                        ?>
                            <tr>
                                <td  class="text-center">
                                    <img src="../upload/<?= $image ?>" width="90">
                                </td>
                                <td   class="text-center">
                                    <span class="font-weight-bold"><?= $cart[1] ?></span>
                                    <div class="product-qty">
                                        <span class="d-block">Quantity:<?= $cart[4] ?></span>
                                    </div>
                                </td>
                                <td  class="text-center">
                                    <div class="text-right">
                                        <span class="font-weight-bold">$<?= $total  ?></span>
                                    </div>
                                </td>
                            </tr>
                           
                        <?php
                            $i += 1;
                        }
                        ?>
 <tr>
                                    <td class="text-center">Total</td>
                                    <td class="text-center" colspan="5">$ <?= $sum ?></td>
                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



</div>










<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->

<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- End custom js for this page -->
</body>

</html>