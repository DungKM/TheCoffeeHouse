<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form action="index.php?act=add_product_bill" method="post">
                <h4 class="card-title d-flex justify-content-between align-items-center  text-uppercase bg-gradient-primary p-3 text-white rounded-3">List products
                    <div class="input-group md-3" style="width: 800px;">
                        <div class="input-group-text" style="width: 200px;">
                            <select name="id_ct" class="form-select form-select-md border-0">
                                <option value="">All</option>
                                <?php
                                foreach ($list_category as $category) {
                                    extract($category);
                                    echo '   <option value="' . $id . '">' . $name_ct . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="kyw" placeholder="Search Here">
                        <button type="submit" name="list_ok" class="input-group-text shadow-none px-4  btn btn-gradient-light btn-fw ">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </div>

                </h4>
            </form>
           

          

            <p class="card-description">
                <a href="index.php?act=shop-cart" class="btn btn-gradient-primary" style="text-decoration: none;">
                    Add Products
                    <i class="mdi mdi-cart"></i>
                    <?php
                    if (isset($_SESSION['mycart_bill']))
                        echo '<span>' . count($_SESSION['mycart_bill']) . '</span>'
                    ?>
                </a>
            </p>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Type_code </th>
                            <th class="text-center">Name products </th>
                            <th class="text-center">Image product </th>
                            <th class="text-center"> Price</th>
                            <!-- <th class="text-center"> View</th> -->
                            <th class="text-center"> Manipulation </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_products as $product) {
                            extract($product);
                            $image_path = "../upload/" . $product['image'];
                            if (is_file($image_path)) {
                                $image = "<img src='" . $image_path . "' width='100' heigth ='80'>";
                            } else {
                                $image = "no photo";
                            }
                            echo '
                                       <tr>
                                       <td class="text-center">' . $product['id'] . '</td>
                                       <td class="text-center">' . $product['name_pro'] . '</td>
                                       <td class="text-center">' . $image . '</td>
                                       <td class="text-center">' . $product['price'] . '</td>
                                       <form action="index.php?act=addtocart" method="post">
                                       <input type="hidden" name="id" value="' . $id . '">
                                       <input type="hidden" name="name" value="' . $name_pro . '">
                                       <input type="hidden" name="img" value="' . $product['image'] . '">
                                       <input type="hidden" name="price" value="' . $price . '">
                                       <td class="text-center"> <button type="submit" class="btn btn-gradient-primary btn-fw mdi mdi-plus text-uppercase" name="add_to_cart"></button></td>
                                      </form>
   
                                   </tr>
                                 
                                       ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr class="my-4">
            <div class="btn-group " role="group" aria-label="Basic example">
                <?php
                for ($i = 1; $i <= $list_Page; $i++) {
                ?>
                    <a href="index.php?act=add_product_bill&page=<?php echo $i  ?>"  class="btn btn-outline-secondary <?php if($i == $page){echo "btn-gradient-danger ";}else echo "";  ?> "><?php echo $i  ?></a>
                <?php
                }
                ?>
               
            </div>
           
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