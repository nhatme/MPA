<?php
include_once "./model/coin.php";
include_once "./model/openOrders.php";

extract($_REQUEST);

if (isset($id)) {
    $classCoin = new Coin();
    $infoCoin = $classCoin->getDetailCoin($id);
    $order = new openOrder();
    if (isset($_POST["addToOrder"]) && $_POST["addToOrder"]) {
        $formatNumber = str_replace(",", "", $_POST["inputcrypto"]);
        $order->insertToOrder($id, (float)($formatNumber));
    }
    if (($infoCoin) != false) {
        if (isset($_POST["inputcrypto"]) && $_POST["inputcrypto"]) {
        }
        include_once 'view/header.php';
        include_once 'view/currency.php';
        include_once 'view/footer.php';
    } else {
        header('location: ?mod=page&act=home');
    }
} else {
    header('location: ?mod=page&act=home');
}
