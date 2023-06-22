<?php include "../resources/views/clients/view/intermediary/header.php"; ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="upload/coffee-beans-top-view-white-background-space-text.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Coffee Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            <?php foreach ($list_categories as $category) :  ?>
                                <li><a href="/home-list-product?cate=<?= $category->id ?>"><?= $category->name ?></a></li>
                            <?php endforeach  ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($list_product_new_top3 as $product_top3) : ?>
                                        <a href="' . $link_product . '" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width:40%;">
                                                <img src="upload/<?= $product_top3->image ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $product_top3->name_pro ?></h6>
                                                <span>$ <?= $product_top3->price ?></span>
                                            </div>
                                        </a>
                                    <?php endforeach ?>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($list_product_new_top3 as $product_top3) : ?>
                                        <a href="" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width:40%;">
                                                <img src="upload/<?= $product_top3->image ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $product_top3->name_pro ?></h6>
                                                <span>$ <?= $product_top3->price ?></span>
                                            </div>
                                        </a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-7">

                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__found">
                                <div class="hero__search__form">
                                    <form action="/home-list-product" method="post">
                                        <div class="hero__search__categories">
                                            Search product
                                        </div>
                                        <input type="text" name="kyw" placeholder="What do you need?">
                                        <button type="submit" class="site-btn">SEARCH</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($list_products as $products) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="upload/<?= $products->image ?>">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="/shop-details?id= <?= $products->id ?>&&id_ct=<?= $products->id_ct ?>"><i class="fa fa-retweet"></i></a></li>
                                        <li>
                                            <form action="/add-cart" method="post">
                                                <input type="hidden" name="id" value="<?= $products->id ?>">
                                                <input type="hidden" name="name_pro" value="<?= $products->name_pro ?>">
                                                <input type="hidden" name="image" value="<?= $products->image ?>">
                                                <input type="hidden" name="price" value="<?= $products->price ?>">
                                                <input type="hidden" name="number" value="<?= $products->number ?>">
                                                <button type="submit" class="button" name="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#"> <?= $products->name_pro ?></a></h6>
                                    <h5>$ <?= $products->price ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach  ?>
                </div>
            </div>

        </div>

</section>
<!-- Product Section End -->
<?php include "../resources/views/clients/view/intermediary/footer.php"; ?>