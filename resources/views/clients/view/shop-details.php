<?php include "../resources/views/clients/view/intermediary/header.php"; ?>
<link rel="stylesheet" href="form-validation.css">
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="upload/coffee-beans-top-view-white-background-space-text.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Coffee’s Package</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Coffee</a>
                        <span>Coffee’s Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Details Section Begin -->
<section class="product-details spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="upload/<?= $shop_detail->image ?>" alt="">
                    </div>

                    <div class="product__details__pic__slider owl-carousel">
                        <?php foreach ($shop_similar_product as $similar_product) :  ?>

                            <a href="' . $link_product . '">
                                <img data-imgbigurl="upload/<?= $similar_product->image ?>" src="upload/<?= $similar_product->image ?>" alt="">
                            </a>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $shop_detail->name_pro ?></h3>
                    <div class="product__details__price">$<?= $shop_detail->price ?>.00</div>
                    <p><?= $shop_detail->describe ?></p>
                    <form action="/add-cart" method="post">
                        <input type="hidden" name="id" value="<?= $shop_detail->id ?>">
                        <input type="hidden" name="name_pro" value="<?= $shop_detail->name_pro ?>">
                        <input type="hidden" name="image" value="<?= $shop_detail->image ?>">
                        <input type="hidden" name="price" value="<?= $shop_detail->price ?>">
                        <div class="product__details__quantity">
                            <style>
                                #quantity {
                                    height: 52px;
                                }
                            </style>
                            <div class="quantity">
                                <input type="number" value="<?= $shop_detail->number ?>" placeholder="multiple of 10" id="quantity" name="number" min="1" max="5">
                            </div>

                        </div>
                        <button type="submit" class="primary-btn">ADD TO CARD</button>
                        <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                    </form>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($shop_similar_product as $similar_product) :  ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="upload/<?= $similar_product->image ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?= $similar_product->name_pro ?></a></h6>
                            <h5>$ <?= $similar_product->price ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<!-- 
            <iframe src="/blogcomment?id_pro=<?= $shop_detail->id ?>" width="100%" height="500px" frameborder="0"></iframe> -->

<!-- Contenedor Principal -->
<?php if (isset($comments) && isset($_SESSION['user'])) { ?>


    <div class="comments-container">
        <h1>Comentarios <a href="http://creaticode.com">creaticode.com</a></h1>
        <form class="w3-container" action="/comment" method="post">
            <p>
                <label class="w3-text-brown"><b>First Name</b></label> <br>
                <textarea name="contents" id="" cols="40" rows="3"></textarea>
            </p>
            <input type="hidden" name="user" value="<?= $_SESSION['user']['user'] ?>">
            <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id'] ?>">
            <input type="hidden" name="id_pro" value="<?= $shop_detail->id ?>">
            <input type="hidden" name="id_ct" value="<?= $shop_detail->id_ct?>">
            <input type="hidden" name="comment_date" value="<?= date('h:i:sa d/m/Y') ?>">


            <button type="submit" class="primary-btn">Send</button></p>
        </form>
        <ul id="comments-list" class="comments-list">
            <?php foreach ($comments as $comment) : ?>
                <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="https://cdn.pixabay.com/photo/2012/04/18/15/20/nurse-37322_960_720.png" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author"><a href="http://creaticode.com/blog"><?= $comment->user ?></a></h6>
                                <span><?= $comment->comment_date ?></span>
                                <i class="fa fa-reply"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                <?= $comment->contents ?>
                            </div>
                        </div>
                    </div>

                </li>
            <?php endforeach  ?>

        </ul>
    </div>


<?php  } ?>


<?php include "../resources/views/clients/view/intermediary/footer.php"; ?>