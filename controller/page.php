<?php
include_once "./model/cryptoCurrency.php";
include_once "./model/userAccount.php";

extract($_REQUEST);

if (isset($act)) {

    switch ($act) {
        case 'home':
            $coinDetail = new Coin();
            $viewTitle = truncateText("MPA - Official");

            include_once 'view/header.php';
            include_once 'view/home.php';
            include_once 'view/footer.php';
            break;
        case 'profile':
            $viewTitle = truncateText("Profile User");
            include_once 'view/header.php';
            include_once 'view/user.php';
            include_once 'view/footer.php';
            break;
        case 'watchlistNotLogin':
            $viewTitle = truncateText("Sign up today and get");
            include_once 'view/header.php';
            include_once 'view/watchlistNotLogin/createownacc.php';
            include_once 'view/watchlistNotLogin/mobileapp.php';
            include_once 'view/watchlistNotLogin/faq.php';
            include_once 'view/footer.php';
            break;
        case 'admin':
            include_once 'view/header.php';
            include_once 'view/admin.php';
            include_once 'view/footer.php';
        case 'logout':
            $classUser = new UserAccount();
            $classUser->reqlogout();
            header("location: ./");
    }
}

function truncateText($text, $length = 15)
{
    $result = "";
    if (strlen($text) < $length)
        return $text;
    for ($i = 0; $i < strlen($text); $i++) {
        $result .= $text[$i];
        if ($i == $length) {
            $result .= "...";
            break;
        }
    }
    return $result;
}
