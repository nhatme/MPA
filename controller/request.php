<?php
include_once "model/cryptoCurrency.php";

extract($_REQUEST);

if (isset($act)) {

    switch ($act) {
        case 'apilogin':
            include_once "model/userAccount.php";
            $classUser = new UserAccount();
            $classUser->reqLogin();
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
