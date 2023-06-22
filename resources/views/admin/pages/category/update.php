<?php include '../resources/views/admin/pages/header/header.php'; ?>
<!-- category  -->

<div class="col-md-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Category</h4>
      <p class="card-description"> Update category </p>
      <form class="forms-sample" action="/update-category" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Type name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="name" value="<?= $list_categories->name ?>" placeholder="Type name">
          </div>
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Avata</label>
          <div class="col-sm-9">
             <?php
                    $image_path = "upload/" . $list_categories->image;
                    if (is_file($image_path)) {
                        $image = "<img src='" . $image_path . "' width='100' heigth ='80'>";
                    } else {
                        $image = "no photo";
                    }
                    ?>
                    <div><?= $image ?></div>
            <input type="file" name="image" class="form-control file-upload-info" value="" placeholder="Upload Image">
          </div>
        </div>
        <input type="hidden" name="id" value="<?= $list_categories->id ?>">
        <input type="submit" value="Update"  class="btn btn-gradient-primary me-2 text-uppercase">

      </form>
    </div>
  </div>
</div>

<!-- category end  -->
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