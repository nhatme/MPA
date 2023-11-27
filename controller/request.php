<?php
include_once "model/cryptoCurrency.php";
include_once "model/userAccount.php";

extract($_REQUEST);

if (isset($act)) {

    switch ($act) {
        case 'apilogin':
            $classUser = new UserAccount();
            $classUser->reqLogin();
            break;
        case 'apisignup':
            $classUser = new UserAccount();
            $classUser->signup();
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
