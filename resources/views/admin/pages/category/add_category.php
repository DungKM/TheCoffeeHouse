
<?php include '../resources/views/admin/pages/header/header.php'; ?>
<!-- category  -->
<div class="col-md-10 grid-margin stretch-card">
  <div class="card ">
    <div class="card-body">
      <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">Add categories <i class="mdi mdi-buffer menu-icon"></i></h4>
      <p class="card-description"> 
      <?php
        if (isset($notification) && ($notification != "")){
          echo '<h4 class=" d-flex justify-content-between   text-uppercase bg-gradient-success p-3 text-white">'.$notification.' <i class="mdi mdi-check "></i></h4>';

        }else{
          echo 'add category';
        }
        ?>
      </p>
      <form class="forms-sample" method="post" action="/add-category" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Type name</label>
          <div class="col-sm-9">
         
            <input type="text" class="form-control" name="name" placeholder="Type name">
          </div>
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Avata</label>
          <div class="col-sm-9">
          
            <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
          </div>
        </div>
        <input type="submit"  value="Add type name" class="btn btn-gradient-primary me-2 text-uppercase"></input>
        
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