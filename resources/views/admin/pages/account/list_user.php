<?php include '../resources/views/admin/pages/header/header.php'; ?>
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">List user <i class="mdi mdi-account-multiple  menu-icon"></i></h4>
            <p class="card-description"> list of customers
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Account code</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">First name</th>
                            <th class="text-center">Last name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone_number</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">manipulation</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php foreach ($list_accounts as $account) :  ?>
                            <?php
                            if ($account->role == 1) {
                                $username = "Admin";
                            } else {
                                $username = "User";
                            }
                            ?>

                            <tr>
                                <td class="text-center"><?= $account->id ?></td>
                                <td class="text-center"><?= $account->user ?></td>
                                <td class="text-center"><?= $account->first_name ?></td>
                                <td class="text-center"><?= $account->last_name ?></td>
                                <td class="text-center"><?= $account->address ?></td>
                                <td class="text-center"><?= $account->email ?></td>
                                <td class="text-center"><?= $account->phone_number ?></td>
                                <td class="text-center"><?= $username ?></td>
                                <td class="text-center"><a href="/delete-account?id=<?= $account->id ?> "><input type="button" class="btn btn-gradient-danger btn-fw text-uppercase" value="delete"></a> <a href="/update-account?id=<?= $account->id ?>"><input type="button" class="btn btn-gradient-primary btn-fw text-uppercase" value="update"></a></td>
                            </tr>
                        <?php endforeach ?>
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