<?php
include_once "./model/coin.php";
include_once "./model/openOrders.php";
include_once "./model/userAccount.php";

$user = new UserAccount();
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
            if (isset($_POST["submitEditProfile"]) && $_POST["submitEditProfile"]) {
                $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
            }
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
        case 'orders':
            include_once 'view/header.php';
            include_once 'view/orders.php';
            include_once 'view/footer.php';
            break;
        case 'transaction_history':
            include_once 'view/header.php';
            include_once 'view/transaction.php';
            include_once 'view/footer.php';
            break;
        case 'funds':
            include_once 'view/header.php';
            include_once 'view/funds.php';
            include_once 'view/footer.php';
            break;
        case 'admin':
            if (isset($_POST["submit"]) && $_POST["submit"]) {
                $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
                // echo $value;
                // var_dump($_SESSION["avatar"]);
                // var_dump($_SESSION["username"]);
                // var_dump($_SESSION["password"]);
            }
            include_once 'view/header.php';
            include_once 'view/admin.php';
            include_once 'view/footer.php';
            break;
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
