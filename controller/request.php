<?php
include_once "model/coin.php";
include_once "model/userAccount.php";
$classUser = new UserAccount();
extract($_REQUEST);

if (isset($act)) {

    switch ($act) {
        case 'apilogin':
            $classUser->reqLogin();
            break;
        case 'apisignup':
            $classUser->signup();
            break;
        case 'editAdmin':
            $classUser->userEditProfile();
            break;
    }
}
