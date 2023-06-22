<?php

namespace App\Controllers;

use App\Models\Account;
use App\Models\Bills;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Products;
use App\Request;

class clientController extends Controller
{
    public function index_client()
    {
        $list_categories = Categories::all();
        $list_products = Products::all();
        $list_product_new_top3 = Products::top3_new_product();
        return $this->views('clients/view/home', ['list_categories' => $list_categories, 'list_products' => $list_products, 'list_product_new_top3' => $list_product_new_top3]);
    }

    public function show_details(Request $request)
    {
        $id = $request->getBody()['id'];
        $id_ct = $request->getBody()['id_ct'];
        $shop_detail = Products::findOne($id);
        $comments = Comment::loadall_comments($id);
        $shop_similar_product = Products::load_similar_products($id, $id_ct);
        return $this->views(
            'clients/view/shop-details',
            [
                'shop_detail' => $shop_detail,
                'shop_similar_product' => $shop_similar_product,
                'comments' => $comments
            ]
        );
    }
    public function comment(Request $request)
    {
        $body = $request->getBody();
        $id = $body['id_pro'];
        $id_ct = $body['id_ct'];

        array_splice($body, 4, 1);

        $p = new Comment();
        $p->insert($body);
        header('location:/shop-details?id=' . $id . '&&id_ct=' . $id_ct);
    }
    // Products
    public function show_product(Request $request)
    {
        $body = $request->getBody();
        if (isset($body['cate']) && ($body['cate']) > 0) {
            $cate = $body['cate'];
        } else {
            $cate = "";
        }
        $list_products = Products::loadal_product("", $cate);
        $list_categories = Categories::all();
        $list_product_new_top3 = Products::top3_new_product();
        return $this->views('clients/view/shop-grid', ['list_products' => $list_products, 'list_categories' => $list_categories, 'list_product_new_top3' => $list_product_new_top3]);
    }
    public function store(Request $request)
    {
        $body = $request->getBody();
        if (isset($body['kyw'])) {
            $kyw = $body['kyw'];
        } else {
            $kyw = "";
        }
        $list_products = Products::loadal_product($kyw, "");
        $list_product_new_top3 = Products::top3_new_product();
        $list_categories = Categories::all();
        return $this->views('clients/view/shop-grid', ['list_products' => $list_products, 'list_categories' => $list_categories, 'list_product_new_top3' => $list_product_new_top3]);
    }

    // Logic

    public function createlogin()
    {
        return $this->views('clients/view/account/login');
    }
    // login
    public function check_login(Request $request)
    {

        if ($request) {

            $body = $request->getBody();
            $error = [];
            if (empty($body['email'])) {
                $error['email'] = "Email is required";
            } else {
                $email = ($body['email']);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Invalid email format";
                }
            }
            if (empty($body['password']) || $body['password'] == " ") {
                $error['password'] = "password is required";
            } else {
                $password = ($body['password']);
            }
            if (empty($error)) {
                $login = Account::checklogin($email, $password);
                if (is_array($login)) {
                    $_SESSION['user'] = $login;
                }
                header('Location:/home-product');
            }
            $this->views('clients/view/account/login', ['error' => $error]);
        }
    }
    // logout
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['mycart']);
        header('Location:/home-product');
    }

    // register
    public function createregister()
    {
        return $this->views('clients/view/account/register');
    }
    public function load_register(Request $request)
    {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $register = $request->getBody();
        $error = [];
        if (empty($register['email'])) {
            $error['email'] = "Email is required";
        } else {
            $email = test_input($register['email']);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Invalid email format";
            }
        }
        if (empty($register['user'])) {
            $error['user'] = "user is required";
        } else {
            $user = test_input($register['user']);
            // check if user only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $user)) {
                $error['user'] = "Only letters and white space allowed";
            }
        }
        if (empty($register['password'])) {
            $error['password'] = "password is required";
        } else {
            $password = test_input($register['password']);
        }
        if (empty($error)) {
            $p = new Account();
            $p->insert_account($email, $user, $password);
            header(("Location:/login"));
        }
        $this->views('clients/view/account/register', ['error' => $error]);
    }
    // profile
    public function check_profile()
    {
        return $this->views('clients/view/profile/profile');
    }
    public function check_order()
    {

        $bills = Bills::finOnebill($_SESSION['user']['id']);
        return $this->views('clients/view/profile/orders', ['bills' => $bills]);
    }

    public function list_bill_details(Request $request)
    {
        $body = $request->getBody();
        $bills = Bills::list_bill($body['id_bill']);
        $this->views('clients/view/profile/bill_confirm', ['bills' => $bills]);
    }
    // forgot
    public function forgot()
    {
        return $this->views('clients/view/account/forgot_password');
    }
    public function check_forgot(Request $request)
    {

        $body = $request->getBody();
        $error = [];
        if (empty($body['email'])) {
            $error['email'] = "Email is required";
        } else {
            $email = $body['email'];
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Invalid email format";
            }
        }
        if (empty($error)) {
            $checkemail = Account::check_mail($email);
            if (is_array($checkemail)) {
                $check = "Mật khẩu của bạn là :" . $checkemail['password'];
            } else if ($checkemail['password'] == "") {
                $check = "Tài khoản thanh toán không hợp lệ";
            } else {
                $check = "Tài Khoản không tồn tại";
            }
            $this->views('clients/view/account/forgot_password', ['check' => $check]);
        } else {
            $this->views('clients/view/account/forgot_password', ['error' => $error]);
        }
    }


    // shop-cart
    public function shop_cart()
    {
        return $this->views('clients/view/cart/shoping-cart');
    }
    public function add_cart(Request $request)
    {
        $body = $request->getBody();
        array_push($_SESSION['mycart'], $body);
        $this->views('clients/view/cart/shoping-cart');
    }
    public function details(Request $request)
    {
        $body = $request->getBody();
        if (isset($body['idcart'])) {
            array_splice($_SESSION['mycart'], $body['idcart'], 1);
        } else {
            $_SESSION['mycart'] = [];
        }
        header('location:/add-cart');
    }
    public function checkout()
    {
        return $this->views('clients/view/cart/checkout');
    }
    // bill comfirm
    public function bill_comfirm(Request $request)
    {
        $body = $request->getBody();
        $bill_check = new Bills();
        $id = $bill_check->insert_bill($body);
        $bill = Bills::findOne($id);
        if (isset($body['bill_payment_methods']) &&   $body['bill_payment_methods'] == 'Receive goods before payment') {
            foreach ($_SESSION['mycart'] as $cart) {
                $cart = Cart::insert_cart($_SESSION['user']['id'], $cart['id'], $cart['image'], $cart['name_pro'], $cart['price'], $cart['number'], $id);
            }
            $_SESSION['cart'] = [];
            return $this->views('clients/view/cart/bill_comfirm', ['bill' => $bill]);
        }
    }
    public function unset()
    {
        unset($_SESSION['mycart']);
        header('Location:/home-product');
    }

    // public function comments(){
    //     $id =$_REQUEST['id_pro'];
    //     $list_comments = Comment::loadall_comments($id);
    //     var_dump($list_comments);
    //     $this->views('clients/view/comments/blog_item_comments',['list_comments'=>$list_comments,'id'=>$id]);
    // }
    // public function recomment(Request $request){
    //    $id = $request->getBody()['id'];
    //    $list_comments = Comment::loadall_comments($id);
    //    $this->views('clients/view/comments/blog_item_comments',['list_comments'=>$list_comments]);
    // }

    public function getcancel(Request $request)
    {
        $body = $request->getBody();
        $bill = ['bill_status' => '2'];
        $p = new Bills;
        $p->update($body['id_bill'],$bill);
        header('location:/order');
    }

    // Contact 
    public function contact(){
        return $this->views('clients/view/contact');
    }
    // Blog
    public function blog(){
        $list_categories = Categories::all();
        $list_top6_products = Products::top6_new_product();
        return $this->views('clients/view/intermediary/blog',['list_categories'=>$list_categories,'list_top6_products'=>$list_top6_products]);
    }
}
