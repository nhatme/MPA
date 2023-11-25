<?php
include_once "./model/cryptoCurrency.php";

extract($_REQUEST);

$classCoin = new Coin();

if (isset($id)) {
    $infoCoin = $classCoin->getDetailCoin($id);
    if (($infoCoin) != false) {
        include_once 'view/header.php';
        include_once 'view/currency.php';
        include_once 'view/footer.php';
    } else {
        header('location: ?mod=page&act=home');
    }
} else {
    header('location: ?mod=page&act=home');
}
