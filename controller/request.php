<?php
include_once "model/coin.php";
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
        case 'editAdmin':
            $classUser = new UserAccount();
            $classUser->editAdminProfile();
            break;
    }
}
