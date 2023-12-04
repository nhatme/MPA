<?php
include_once "./model/userAccount.php";

extract($_REQUEST);
$user = new UserAccount();

if (isset($act)) {
    switch ($act) {
        case 'admin-home':
            if (isset($_POST["submit"]) && $_POST["submit"]) {
                $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
            }
            include_once 'view/header.php';
            include_once 'view/admin.php';
            include_once 'view/footer.php';
            break;
        case 'addcurrency':
            print_r($user->addNewCurr());
            include_once 'view/header.php';
            include_once 'view/addNewCurrency.php';
            include_once 'view/footer.php';
            break;
    }
}
