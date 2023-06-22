<?php include '../resources/views/admin/pages/header/header.php'; ?>

<div class="col-lg-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">List categories <i class="mdi mdi-buffer menu-icon"></i></h4>
      <p class="card-description"> List category
      </p>
      <div class="table-responsive">
        <table class="table  table-bordered">
          <thead>
            <tr>
              <th class="text-center">Type code</th>
              <th class="text-center">Type name</th>
              <th class="text-center">Image Type</th>
              <th class="text-center">Manipulation</th>

            </tr>
          </thead>
          <tbody>
           

            <?php foreach ($list_categories as $category) : ?>
              <?php
              $image_path = "upload/" . $category->image;
              if (is_file($image_path)) {
                $image = "<img src='" . $image_path . "' width='100' heigth ='80'>";
              } else {
                $image = "no photo";
              }
              ?>
              <tr>
                <td class="text-center"><?= $category->id ?></td>
                <td class="text-center"><?= $category->name ?></td>
                <td class="text-center"><?= $image ?></td>
                <td class="text-center"><a href="/update-category?id=<?= $category->id ?>" class="btn btn-gradient-primary btn-fw text-uppercase">update</a> <a href="/delete-category?id=<?= $category->id ?>" class="btn btn-gradient-danger btn-fw text-uppercase">delete</a></td>
              </tr>
            <?php endforeach   ?>


          </tbody>
        </table>
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