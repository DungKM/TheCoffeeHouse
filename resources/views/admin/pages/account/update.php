<?php include '../resources/views/admin/pages/header/header.php'; ?>
        <div class="col-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update</h4>
                    <p class="card-description"> Update </p>
                    <form class="forms-sample" action="/update-account" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">First name</label>
                            <input type="text" name="first_name" value="<?= $list_accounts->first_name ?>" class="form-control" id="exampleInputName1" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Last name</label>
                            <input type="text" name="last_name" value="<?=  $list_accounts->last_name ?>" class="form-control" id="exampleInputName1" placeholder="Last name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" name="user" value="<?= $list_accounts->user?>" class="form-control" id="exampleInputName1" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="text" name="email" value="<?= $list_accounts->email ?>" class="form-control" id="exampleInputName1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Address</label>
                            <input type="text" name="address" value="<?= $list_accounts->address ?>" class="form-control" id="exampleInputCity1" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Phone</label>
                            <input type="text" name="phone_number" value="<?= $list_accounts->phone_number ?>" class="form-control" id="exampleInputCity1" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Role</label>
                            <select name="role" id="" class="form-control" >
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?=  $list_accounts->id ?>">
                        <input type="submit"  class="btn btn-gradient-primary me-2 text-uppercase" value="Update">
                        <!-- <a class="btn btn-inverse-danger btn-fw text-uppercase" href="index.php?act=list_user">CANCEL</a> -->
                    </form>
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