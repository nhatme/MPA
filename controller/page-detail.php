<?php
include_once "./model/cryptoCurrency.php";
include_once "./model/openOrders.php";

extract($_REQUEST);

if (isset($id)) {
    $classCoin = new Coin();
    $infoCoin = $classCoin->getDetailCoin($id);
    if (($infoCoin) != false) {
        $order = new openOrder();

        if (isset($_POST["inputcrypto"]) && $_POST["inputcrypto"]) {
            var_dump($_POST["inputcrypto"]);
        }

        // $order->insertToOrder($id, $amount);
        // var_dump($id);

        include_once 'view/header.php';
        include_once 'view/currency.php';
        include_once 'view/footer.php';
    } else {
        header('location: ?mod=page&act=home');
    }
} else {
    header('location: ?mod=page&act=home');
}
