<div class="g-5 d-flex justify-content-center">
  <div class="col-md-7 col-lg-8">
    <h4 class="card-title d-flex justify-content-between align-items-center  text-uppercase bg-gradient-primary p-3 text-white rounded-3">customer information</h4>
    <form class="needs-validation" action="index.php?act=add_bill" method="post">
      <div class="row g-3">
        <div class="col-12">
          <label for="username" class="form-label">Username</label>
          <div class="input-group has-validation">
            <input type="text" class="form-control" id="username" name="user" value="" placeholder="Username" required>
            <div class="invalid-feedback">
              Your username is required.
            </div>
          </div>
        </div>
        <div class="col-12">
          <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" name="email" value="" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
        <div class="col-12">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="+84" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="col-12">
          <label for="address" class="form-label">Conscious</label>
          <select id="province" class="form-select">
            <option value="">Choose(Conscious)</option>
          </select>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <div class="col-12">
          <label for="address" class="form-label">Town/City</label>
          <select id="district" class="form-select">
          </select>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <div class="col-12">
          <label for="address" class="form-label">Ward</label>
          <select id="ward" class="form-select">
          </select>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

      </div>
      <br class="my-2">
      <input type="hidden" value="" name="address" id="bill_ad">
      <input type="hidden" name="id" value="<?= $id ?>">
      <input type="hidden" name="password" value="">
      <input type="submit" name="account" class="btn btn-gradient-primary btn-fw" value="ADD NEW BILL">
      <a class="btn btn-inverse-danger btn-fw text-uppercase" href="index.php?act=list_bill">CANCEL</a>
      <?php
      if (isset($_SESSION['user_bill'])) {
        echo ' <a href="index.php?act=add_product_bill" class="btn btn-gradient-primary btn-fw">ADD NEW BILL</a>';
      }

      ?>
    </form>
    <?php
    if (isset($notification) && ($notification != "")) echo $notification;
    ?>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // 1. what is API
  // 2. How do I call API
  // 3. Explain code
  const host = "https://provinces.open-api.vn/api/";
  var callAPI = (api) => {
    return axios.get(api)
      .then((response) => {
        renderData(response.data, "province");
      });
  }
  callAPI('https://provinces.open-api.vn/api/?depth=1');
  var callApiDistrict = (api) => {
    return axios.get(api)
      .then((response) => {
        renderData(response.data.districts, "district");
      });
  }
  var callApiWard = (api) => {
    return axios.get(api)
      .then((response) => {
        renderData(response.data.wards, "ward");
      });
  }

  var renderData = (array, select) => {
    let row = ' <option disable value="">Choose(address)</option>';
    array.forEach(element => {
      row += `<option value="${element.code}">${element.name}</option>`
    });
    document.querySelector("#" + select).innerHTML = row
  }

  $("#province").change(() => {
    callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
    printResult();
  });
  $("#district").change(() => {
    callApiWard(host + "d/" + $("#district").val() + "?depth=2");
    printResult();
  });
  $("#ward").change(() => {
    printResult();
  })

  var printResult = () => {
    if ($("#district").val() != "" && $("#province").val() != "" &&
      $("#ward").val() != "") {
      let result = $("#province option:selected").text() +
        " | " + $("#district option:selected").text() + " | " +
        $("#ward option:selected").text();
      $("#result").text(result)

      var bill_ad = document.getElementById("bill_ad").value = result;
    }


  }
  $('.set-bg').each(function() {
    var bg = $(this).data('setbg');
    $(this).css('background-image', 'url(' + bg + ')');
  });
</script>