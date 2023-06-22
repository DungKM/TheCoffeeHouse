<?php

use App\Controllers\accountController;
use App\Controllers\billCotroller;
use App\Controllers\categoriesController;
use App\Controllers\clientController;
use App\Controllers\commentCotroller;
use App\Controllers\homeController;
use App\Controllers\productController;
use App\Router;

 session_start() ;
 if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
 date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once __DIR__."/../vendor/autoload.php";

$router = new Router;




Router::get('/home',[homeController::class, 'index']);
Router::get('/dash',[homeController::class, 'dash']);
/** PRODUCT ADMIN */
// list product
Router::get('/list-product',[productController::class,'index']);
// add product
Router::get('/add-product',[productController::class,'create']);
Router::post('/add-product',[productController::class, 'store']);
// delete product
Router::get('/delete-product',[productController::class,'delete']);
//Update product
Router::get('/update-product', [ProductController::class, 'show']);
Router::post('/update-product', [ProductController::class, 'update']);
/**CATEGORY ADMIN */
// add category
Router::get('/list-categories',[categoriesController::class, 'index']);
Router::get('/add-category',[categoriesController::class, 'create']);
Router::post('/add-category',[categoriesController::class, 'store']);
// delete category
Router::get('/delete-category',[categoriesController::class,'delete']);
// update category 
Router::get('/update-category', [categoriesController::class, 'show']);
Router::post('/update-category', [categoriesController::class, 'update']);
/** ACCOUNT */
Router::get('/list-account',[accountController::class, 'index']);
// delete category
Router::get('/delete-account',[accountController::class,'delete']);
// update category 
Router::get('/update-account', [accountController::class, 'show']);
Router::post('/update-account', [accountController::class, 'update']);
/** BILL */
Router::get('/list-bill',[billCotroller::class, 'index']);
// update bill
Router::get('/update-bill',[billCotroller::class, 'show']);
Router::post('/update-bill',[billCotroller::class, 'update']);
/**COMMENTS */
Router::get('/list-comments',[commentCotroller::class, 'index']);
Router::get('/delete-comment',[commentCotroller::class,'delete']);
/**CLIENT USER */
Router::get('/home-product',[clientController::class,'index_client']);
Router::get('/home-list-product',[clientController::class,'show_product']);
Router::post('/home-list-product',[clientController::class,'store']);
/**SHOP-DETAILS */
Router::get('/shop-details',[clientController::class,'show_details']);
Router::post('/comment',[clientController::class,'comment']);
/**LOGIN */
Router::get('/login',[clientController::class,'createlogin']);
Router::post('/login',[clientController::class,'check_login']);
/**REGISTER */
Router::get('/register',[clientController::class,'createregister']);
Router::post('/register',[clientController::class,'load_register']);
/**PROFILE */
Router::get('/profile',[clientController::class,'check_profile']);
Router::get('/order',[clientController::class,'check_order']);
Router::get('/detail_bill',[clientController::class,'list_bill_details']);
Router::get('/cancel_bill',[clientController::class,'getcancel']);


Router::get('/logout',[clientController::class,'logout']);
/**FORGOT */
Router::get('/forgot',[clientController::class,'forgot']);
Router::post('/forgot',[clientController::class,'check_forgot']);
/**CART */
Router::get('/add-cart',[clientController::class,'shop_cart']);
Router::get('/detail',[clientController::class,'details']);
Router::post('/add-cart',[clientController::class,'add_cart']);
/**CHECKOUT */
Router::get('/checkout',[clientController::class,'checkout']);
Router::post('/bill-comfirm',[clientController::class,'bill_comfirm']);
/**UNSET CART */
Router::get('/unset',[clientController::class,'unset']);
/**CONTACT */
Router::get('/contact',[clientController::class,'contact']);
/**Blog */
Router::get('/blog',[clientController::class,'blog']);



$router->resolve();
