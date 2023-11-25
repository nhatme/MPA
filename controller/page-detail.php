<?php
include_once "./model/cryptoCurrency.php";

extract($_REQUEST);

if (isset($id)) {
    $classCoin = new Coin();
    $infoCoin = $classCoin->getDetailCoin($id);
    if (($infoCoin) != false) {
        $classCoin = new Coin();
        include_once 'view/header.php';
        include_once 'view/currency.php';
        include_once 'view/footer.php';
    } else {
        header('location: ?mod=page&act=home');
    }
} else {
    header('location: ?mod=page&act=home');
}
