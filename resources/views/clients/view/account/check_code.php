<section class="vh-200" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-12">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-8 col-lg-5 d-none d-md-block">
                            <img src="view/img/nathan-dumlao-zUNs99PGDg0-unsplash.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%;" />
                        </div>
                        <div class="col-md-4 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="index.php?act=forgot_password" method="post">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0"><img src="view/img/the-coffee-house-logo-inkythuatso-01.png" alt="" width="40%"></span>
                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Please enter the email code</h5>
                                    <div class="form-outline mb-4">
                                        <input type="text" name="code" id="form2Example17" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Code</label>
                                    </div>
                                    <?php
                                    if (isset($notification) && ($notification != "")) {
                                        echo $notification;
                                    }
                                    ?>
                                    <div class="pt-1 mb-4">
                                        <input type="submit" value="Submit now" name="code" class="btn btn-dark btn-lg btn-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>