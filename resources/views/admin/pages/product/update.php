<?php include '../resources/views/admin/pages/header/header.php'; ?>
<div class="col-9 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-description"> Update products </p>
            <form class="forms-sample" action="/update-product" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Product's name</label>
                    <input type="text" name="name_pro" value="<?= $list_products->name_pro ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label>File upload image</label>
                    <div class="input-group col-xs-10">
                        <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                    </div>
                    <?php
                    $image_path = "upload/" . $list_products->image;
                    if (is_file($image_path)) {
                        $image = "<img src='" . $image_path . "' width='100' heigth ='80'>";
                    } else {
                        $image = "no photo";
                    }
                    ?>
                    <div><?= $image ?></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Price</label>
                    <input type="number" name="price" value="<?= $list_products->price ?>" class="form-control" id="exampleInputCity1" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Type product</label>
                    <select name="id_ct" class="form-control" id="exampleSelectGender">
                        <?php foreach ($list_categories as $category) :   ?>
                            <option value="<?= $category->id ?>" <?= ($category->id === $list_products->id_ct) ? 'selected' : '' ?>>
                                <?= $category->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Describe</label>
                    <textarea name="describe" class="form-control" id="exampleTextarea1" rows="4"><?= $list_products->describe ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?= $list_products->id ?>">
                <input type="submit" class="btn btn-gradient-primary me-2 text-uppercase" value="Update">
                <!-- <a class="btn btn-inverse-danger btn-fw text-uppercase" href="index.php?act=list_product">CANCEL</a> -->


            </form>
        </div>
    </div>
</div>



</div>











<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../assets/js/chart.js"></script>
<!-- End custom js for this page -->
</body>

</html>