<?php
include_once "./model/coin.php";
include_once "./model/userAccount.php";

$user = new UserAccount();
$coinDetail = new Coin();

extract($_REQUEST);

if (isset($act)) {
    switch ($act) {

        case 'home':
            $page = 1;
            $category = '';
            if (isset($_GET['page']) && $_GET['page']) {
                $page = $_GET['page'];
            }
            if (isset($_GET['categoryid']) && $_GET['categoryid']) {
                $category = $_GET['categoryid'];
            }

            $listCoin = $coinDetail->getPageCoin($page, $category);
            $viewTitle = truncateText("MPA - Official");
            $resultCount = $coinDetail->getCountListCoin();

            include_once 'view/header.php';
            include_once 'view/home.php';
            include_once 'view/footer.php';
            break;
        case 'profile':
            if (!empty($_SESSION["id"])) {
                if ($_SESSION["role_user"] == 0) {
                    header("location: ?mod=admin&act=admin-home");
                }
                $viewTitle = truncateText("Profile User");
                if (isset($_POST["submitEditProfile"]) && $_POST["submitEditProfile"]) {
                    $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
                }
                include_once 'view/header.php';
                include_once 'view/user.php';
                include_once 'view/footer.php';
                break;
            } else {
                header("location: ./");
                break;
            }
        case 'watchlistNotLogin':
            $viewTitle = truncateText("Sign up today and get");
            include_once 'view/header.php';
            include_once 'view/watchlistNotLogin/createownacc.php';
            include_once 'view/watchlistNotLogin/mobileapp.php';
            include_once 'view/watchlistNotLogin/faq.php';
            include_once 'view/footer.php';
            break;
        case 'admin':
            include_once 'controller/admin.php';
            break;
        case 'categories':
            include_once 'view/category.php';
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
