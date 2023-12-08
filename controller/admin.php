<?php
include_once "./model/userAccount.php";
include_once "./model/categoryFunc.php";
include_once "./model/coin.php";
include_once "./model/openOrders.php";

extract($_REQUEST);
$user = new UserAccount();
$orders = new openOrder();
$coin = new Coin();
$category = new CategoryFunc();

if (!empty($_SESSION["id"])) {
    if (isset($act)) {
        switch ($act) {
            case 'admin-home':
                if ($_SESSION["role_user"] == 1) {
                    header("location: ?mod=page&act=profile");
                } else {
                    $getAllorders = $orders->getAllOrders();
                    if (isset($_POST["submit"]) && $_POST["submit"]) {
                        $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
                    }
                    include_once 'view/header.php';
                    include_once 'view/admin.php';
                    include_once 'view/footer.php';
                    break;
                }
            case 'addcurrency':
                $getLatestCurr = $coin->getLatestRecord();
                if (isset($_POST["updateCurrByAdmin"]) && $_POST["updateCurrByAdmin"]) {
                    $updateCurr = $coin->updateCurrByAdmin($_POST["currIdtoUpdate"], $_POST["name"], $_POST["symbol"], $_FILES["logo"], (float)($_POST["price"]), (float)($_POST["marketcap"]), (float)($_POST["circulating"]));
                }
                if (isset($_POST["submitAdd"]) && $_POST["submitAdd"]) {
                    $user->insertaddNewCurr($_POST["name"], $_POST["symbol"], $_FILES["image"], $_POST["price"], $_POST["marketcap"], $_POST["circulating"]);
                }
                if (isset($_POST["submit"]) && $_POST["submit"]) {
                    $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
                }
                include_once 'view/header.php';
                include_once 'view/addNewCurrency.php';
                include_once 'view/footer.php';
                break;
            case 'addcategory':
                $getLatestCateg = $category->getLatestRecord();

                if (isset($_POST["updateCategByAdmin"]) && $_POST["updateCategByAdmin"]) {
                    $updateCateg = $category->updateCategByAdmin($_POST["updateCategId"], $_POST["Name"], $_POST["Title"], $_POST["Description"]);
                }

                if (isset($_POST["submitAdd"]) && $_POST["submitAdd"]) {
                    $category->createNewCategory($_POST["name"], $_POST["title"], $_POST["desc"]);
                }

                if (isset($_POST["submit"]) && $_POST["submit"]) {
                    $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
                }
                include_once 'view/header.php';
                include_once 'view/addNewCategory.php';
                include_once 'view/footer.php';
                break;
            case 'manageuser':
                if (isset($_POST["updateUserByAdmin"]) && $_POST["updateUserByAdmin"]) {
                    $user->updateUserByAdmin($_POST["userIdUpdate"], $_FILES["avatar"], $_POST["email"], $_POST["username"], $_POST["password"]);
                }
                if (isset($_POST["submitAddNewUser"]) && $_POST["submitAddNewUser"] && isset($_FILES["avatar"])) {
                    $createNewUser = $user->createNewUser($_FILES["avatar"], $_POST["name"], $_POST["title"]);
                }
                $getLatestRecord = $user->getLatestRecord();
                if (isset($_POST["submit"]) && $_POST["submit"]) {
                    $value = $user->userEditProfile($_FILES["avatar"], $_POST["username"], $_POST["currentpassword"], $_POST["newpassword"]);
                }
                include_once 'view/header.php';
                include_once 'view/manageUser.php';
                include_once 'view/footer.php';
                break;
        }
    }
} else {
    header("location: ./");
}
