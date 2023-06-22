<?php include '../resources/views/admin/pages/header/header.php'; ?>
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form action="index.php?act=list_bill" method="post">
                <h4 class="card-title d-flex justify-content-between align-items-center  text-uppercase bg-gradient-primary p-3 text-white rounded-3">List bill

                    <div class="input-group md-3" style="width: 800px;">
                        <input type="text" class="form-control" name="kyw" placeholder="Search Here">
                        <button type="submit" name="list_ok" class="input-group-text shadow-none px-4  btn btn-gradient-light btn-fw ">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </div>
                    <a href="/add_bill" class="btn btn-gradient-primary btn-fw">ADD NEW BILL</a>
                </h4>
            </form>
            <div class="col-lg-12 grid-margin">
                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">code orders</th>
                                <th class="text-center">client</th>
                                <th class="text-center">number of rows</th>
                                <th class="text-center">order value</th>
                                <th class="text-center">order status</th>
                                <th class="text-center">manipulation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_bill as $bill) : ?>
                                <?php
                                $client = $bill->name . '
                         <br> ' . $bill->email . '
                         <br> ' . $bill->address . '
                         <br> ' . $bill->phone . '
                         <br> ' . $bill->date_order;
                                ?>
                                <tr>
                                    <td class="text-center">MT-<?= $bill->bill_id ?></td>
                                    <td class="text-center"><?= $client ?></td>
                                    <td class="text-center" style="width: 100px"> <?= $bill->sumcart ?> </td>
                                    <td class="text-center">$ <?= $bill->total ?></td>
                                    <td class="text-center" style="color:red ;">
                                        <form  class="d-flex gap-1">
                                            <select name="bill_status" id="" style="color: red;" class="form-select">
                                                <option <?php if (isset($bill->bill_status) && $bill->bill_status == '0') echo "selected=\"selected\"";  ?> value="0">New orders</option>
                                                <option <?php if (isset($bill->bill_status) && $bill->bill_status == '1') echo "selected=\"selected\"";  ?> value="1">Processing</option>
                                                <option <?php if (isset($bill->bill_status) && $bill->bill_status == '2') echo "selected=\"selected\"";  ?> value="2">Cancel</option>
                                                <option <?php if (isset($bill->bill_status) && $bill->bill_status == '3') echo "selected=\"selected\"";  ?> value="3">Completed</option>
                                            </select>
                                    
                                            <!-- <button type="submit" class="btn btn-gradient-primary me-1 mdi mdi-content-save"></button> -->
                                        </form>
                                    </td>

                                    <td class="text-center">
                                        <a href="/detail?id=<?= $bill->bill_id ?>"><input type="button" class="btn btn-gradient-primary btn-fw text-uppercase" value="detail"></a>
                                        <a href="/update-bill?id=<?= $bill->bill_id ?>"><input type="button" class="btn btn-gradient-primary btn-fw text-uppercase" value="update"></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <hr class="my-4">
                <div class="btn-group d-flex" role="group" aria-label="Basic example">

                </div>
            </div>
        </div>
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