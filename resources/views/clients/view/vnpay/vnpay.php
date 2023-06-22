<?php


include "view/config_php_vnpay.php";


if (isset($_GET['vnp_Amount'])) {
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $id_bill = $_SESSION['code_cart'];
    $insert_vnpay = pay_vnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_TransactionNo, $id_bill);
}
if (isset($_GET['partnerCode'])) {
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];
    $id_bill = $_SESSION['code_cart'];
    $insert_momo = pay_momo($partnerCode, $orderId, $amount, $orderInfo, $orderType, $transId, $payType,  $id_bill);
    foreach ($_SESSION['mycart'] as $cart) {
        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
    }
    $_SESSION['cart'] = [];
    $bill = loadone_bill($id_bill);
    $bill_cart = loadall_cart($id_bill);
}
if (isset($_GET['pay_paypal']) == 'paypal') {
    $id_bill = $_SESSION['code_cart'];
    foreach ($_SESSION['mycart'] as $cart) {
        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
    }
    $_SESSION['cart'] = [];
    $bill = loadone_bill($id_bill);
    $bill_cart = loadall_cart($id_bill);
}

$bill = loadone_bill($id_bill);
$bill_cart = loadall_cart($id_bill);
include "view/cart/bill_comfirm.php";
