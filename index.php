<?php
session_start();
include_once "./model/userAccount.php";
$classUser = new UserAccount();
extract($_REQUEST);
if (isset($mod)) {
    switch ($mod) {
        case 'page':
            include_once 'controller/page.php';
            break;
        case 'admin':
            include_once 'controller/admin.php';
            break;
        case 'page-detail':
            include_once 'controller/page-detail.php';
        case 'request':
            include_once 'controller/request.php';
    }
} else {
    header('location: ?mod=page&act=home');
}
