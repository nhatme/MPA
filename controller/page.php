<?php
extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'home':
            $viewTitle = truncateText("MPA - Official");
            include_once 'view/header.php';
            include_once 'view/home.php';
            include_once 'view/footer.php';
            break;
        case 'currency':
            $viewTitle = truncateText("Currency Detail");
            include_once 'view/header.php';
            include_once 'view/currency.php';
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
        case 'login':
            $viewTitle = truncateText("login");
            include_once 'view/header.php';
            include_once 'view/signin.php';
            include_once 'view/footer.php';
            break;
        case 'signup':
            $viewTitle = truncateText("signup");
            include_once 'view/header.php';
            include_once 'view/signup.php';
            include_once 'view/footer.php';
            break;
    }
}

function truncateText($text, $length = 10)
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