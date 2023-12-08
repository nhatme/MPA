<?php
include_once './model/openOrders.php';
include_once './model/coin.php';
include_once './model/userAccount.php';

$openOrder = new openOrder();
$coin = new Coin();
$resultOrders = $openOrder->getOrderByIdUser($_SESSION["id"]);
$resultTransHistory = $openOrder->queryAllTransHistory($_SESSION["id"]);

extract($_REQUEST);

if (!empty($_SESSION["id"])) {
    if (isset($act)) {
        switch ($act) {
            case 'orders':
                include_once 'view/header.php';
                include_once 'view/order/orders.php';
                include_once 'view/footer.php';
                break;
            case 'transaction_history':
                include_once 'view/header.php';
                include_once 'view/order/transaction.php';
                include_once 'view/footer.php';
                break;
            case 'funds':
                include_once 'view/header.php';
                include_once 'view/order/funds.php';
                include_once 'view/footer.php';
                break;
        }
    }
} else {
    header("location: $_SERVER[PHP_SELF]");
}
