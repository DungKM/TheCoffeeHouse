<?php include '../resources/views/admin/pages/header/header.php'; ?>
<div class="col-9 grid-margin stretch-card">
  
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update</h4>
            <p class="card-description"> Update </p>
            <form class="forms-sample" action="/update-bill" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputCity1">Bill - Status</label>
                
                    <select name="bill_status" id="" class="form-control">
                        <option <?php if ($list_bills->bill_status === '0') echo "selected";  ?> value="0">New orders</option>
                        <option <?php if ($list_bills->bill_status === '1') echo "selected";  ?> value="1">Processing</option>
                        <option <?php if ($list_bills->bill_status === '2') echo "selected";  ?> value="2">Cancel</option>
                        <option <?php if ($list_bills->bill_status === '3') echo "selected";  ?> value="3">Completed</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?= $list_bills->id ?>">
                <input type="submit" class="btn btn-gradient-primary me-2 text-uppercase" value="Update"></input>
            </form>
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