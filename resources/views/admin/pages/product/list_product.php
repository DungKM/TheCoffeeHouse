<?php include '../resources/views/admin/pages/header/header.php'; ?>

<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form action="index.php?act=list_product" method="post">
                <h4 class="card-title d-flex justify-content-between align-items-center  text-uppercase bg-gradient-primary p-3 text-white rounded-3">List products
                    <div class="input-group md-3" style="width: 800px;">
                        <div class="input-group-text" style="width: 200px;">
                            <select name="id_ct" class="form-select form-select-md border-0">
                                <option value="">All</option>
                           <?php foreach ($list_categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php endforeach   ?> 
                            </select>
                        </div>
                        <input type="text" class="form-control" name="kyw" placeholder="Search Here">
                        <button type="submit" name="list_ok" class="input-group-text shadow-none px-4  btn btn-gradient-light btn-fw ">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </div>

                </h4>
            </form>
            <p class="card-description"> List products
            </p>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"> Type_code </th>
                            <th class="text-center">Name products </th>
                            <th class="text-center">Image product </th>
                            <th class="text-center"> Price</th>
                            <!-- <th class="text-center"> View</th> -->
                            <th class="text-center"> Manipulation </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_products as $product) :
                        ?>
                            <?php
                            $image_path = "upload/" . $product->image;
                            if (is_file($image_path)) {
                                $image = "<img src='" . $image_path . "' width='100' heigth ='80'>";
                            } else {
                                $image = "no photo";
                            }
                            ?>

                            <tr>
                                <td class="text-center"><?= $product->id ?></td>
                                <td class="text-center"> <?= $product->name_pro ?></td>
                                <td class="text-center"><?= $image?></td>
                                <td class="text-center"><?= $product->price ?></td>
                                <td class="text-center"><a href="/update-product?id=<?= $product->id ?>" class="btn btn-gradient-primary btn-fw text-uppercase">update</a>  <a class="btn btn-gradient-danger btn-fw text-uppercase" onclick="return comfirm('I want delete??')" href="/delete-product?id=<?= $product->id ?>">delete</a></td>
                            </tr>

                        <?php endforeach   ?>

                    </tbody>
                </table>
            </div>
            <hr class="my-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <!-- <?php
                        for ($i = 1; $i <= $list_Page; $i++) {
                        ?>
                    <a href="index.php?act=list_product&page=<?php echo $i  ?>" class="btn btn-outline-secondary <?php if ($i == $page) {
                                                                                                                        echo "btn-gradient-danger";
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>"><?php echo $i  ?></a>
                <?php
                        }
                ?> -->

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