<?php
include_once "./model/categoryFunc.php";

extract($_REQUEST);
if (isset($act)) {
    $listCategories = new CategoryFunc();
    $result = $listCategories->getListCategories();
    include_once 'view/header.php';
    include_once 'view/category.php';
    include_once 'view/footer.php';
} else {
    header('location: ?mod=page&act=home');
}
