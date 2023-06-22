<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        
            <!-- <p class="card-description">
                <a href="index.php?act=addtocart" class="btn btn-gradient-primary" style="text-decoration: none;">
                    Add Products
                    <i class="mdi mdi-cart"></i>
                    <?php
                    if (isset($_SESSION['mycart_bill']))
                        echo '<span>' . count($_SESSION['mycart_bill']) . '</span>'
                    ?>
                </a>
            </p> -->
           
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Name products </th>
                            <th class="text-center">Image product </th>
                            <th class="text-center"> Price</th>
                            <th class="text-center"> Quality</th>
                            <th class="text-center"> Total</th>
                            <th class="text-center"> Manipulation </th>
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
                            $delete_products="index.php?act=delcart&idcart=".$i;
                            echo '
                            
                                       <tr>
                                     
                                       <td class="text-center">' . $cart[1] . '</td>
                                       <td class="text-center"><img src="../upload/' . $image . '" alt=""></td>
                                       <td class="text-center">' . $cart[3] . '</td>
                                       <td class="text-center">' . $cart[4] . '</td>
                                       <td class="text-center">' . $total . '</td>
                                    
                                       <td class="text-center"> <a onclick=\'return confirm("you definitely want to delete ??!");\' href="' . $delete_products . '" class="btn btn-gradient-danger btn-fw text-uppercase" >delete</a></td>
                               
   
                                   </tr>
                                 
                                       ';
                        }
                        ?>
                        <tr>
                            <td  class="text-center">Total</td>
                            <td class="text-center" colspan="5">$ <?= $sum ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr class="my-2">
            <a href="index.php?act=checkout_bill" class="btn btn-gradient-primary text-uppercase btn-fw"> keep ordering</a>
            <a href="index.php?act=add_product_bill" class="btn btn-gradient-danger text-uppercase btn-fw">Continue to pay</a>
        </div>
    </div>
</div>



</div>












<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/chart.js"></script>
<!-- End custom js for this page -->
</body>

</html>