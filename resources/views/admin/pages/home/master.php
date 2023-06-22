<?php include '../resources/views/admin/pages/header/header.php'; ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

    <div class="row">

      <div class="col-md-12 grid-margin  stretch-card">
        <div class="card">
          <div class="card-body align-self-center text-center">


            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <canvas id="myChart" style="width: 100%; max-width: 600px; display: block;" width="500"></canvas>
            <script>
              var xValues = [
                <?php
                $sum_category = count($statisticals);
                $i = 1;
                foreach ($statisticals as $statistical) {
                  extract($statistical);
                  if ($i ==  $sum_category) $comma = "";
                  else $comma = ",";
                  echo '
                
               " ' . $statistical['name_catgteory'] . '"
                ' . $comma;
                  $i += 1;
                }
                ?>

              ];
              var yValues = [
                <?php
                $sum_category = count($statisticals);
                $i = 1;
                foreach ($statisticals as $statistical) {
                  extract($statistical);
                  if ($i ==  $sum_category) $comma = "";
                  else $comma = ",";
                  echo '
                
               " ' . $statistical['count_products']. '"
                ' . $comma;
                  $i += 1;
                }
                ?>
              ];
              var barColors = [
                "#55efc4",
                "#81ecec",
                "#74b9ff",
                "#a29bfe",
                "#dfe6e9",
                "#ffeaa7",
                "#e17055",
                "#d63031"
              ];

              new Chart("myChart", {
                type: "doughnut",
                data: {
                  labels: xValues,
                  datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: "Category and product statistics chart team 3"
                  }
                }
              });
            </script>

          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">Statistical</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">catalog code</th>
                    <th class="text-center">Name list</th>
                    <th class="text-center">Number</th>
                    <th class="text-center">Highest price</th>
                    <th class="text-center">Lowest price</th>
                    <th class="text-center">Average price</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- <?php
                        foreach ($list_statistical as $statistical) {
                          extract($statistical);

                          echo '
                            <tr>
                            <td class="text-center">' . $code_category . '</td>
                            <td class="text-center">' . $name_catgteory . '</td>
                            <td class="text-center">' . $count_products . '</td>
                            <td class="text-center">' . $max_price . '</td>
                            <td class="text-center">' . $min_price . '</td>
                            <td class="text-center">' . $avg_price . '</td>
                           
                        </tr>
                            ';
                        }
                        ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">Statistics on which products are ordered the most</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>

                    <th class="text-center">Name list</th>
                    <th class="text-center">Number</th>

                  </tr>
                </thead>
                <tbody>

                  <!-- <?php
                        foreach ($list_cart as $cart) {
                          extract($cart);

                          echo '
                            <tr>
                            <td class="text-center">' . $name_products . '</td>
                            <td class="text-center">' . $count_pro . '</td>
                           
                        </tr>
                            ';
                        }
                        ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">Statistics of the number of orders by day</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>

                    <th class="text-center">Date list</th>
                    <th class="text-center">Number</th>

                  </tr>
                </thead>
                <tbody>

                  <!-- <?php
                        foreach ($list_date as $date) {
                          extract($date);

                          echo '
                            <tr>
                            <td class="text-center">' . $date . '</td>
                            <td class="text-center">' . $count_pro . '</td>
                           
                        </tr>
                            ';
                        }
                        ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title text-uppercase bg-gradient-primary p-3 text-white rounded-3">Statistical revenue by day</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Date list</th>
                    <th class="text-center">total revenue</th>
                  </tr>
                </thead>
                <tbody>
                  <!--              
                   <?php
                    foreach ($list_sum as $sum) {
                      extract($sum);

                      echo '
                            <tr>
                            <td class="text-center">' . $date . '</td>
                            <td class="text-center">' . $total . ' $</td>
                           
                        </tr>
                            ';
                    }
                    ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- content-wrapper ends -->

</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
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