<?php
    extract($_REQUEST);
    if(isset($act)){
        switch($act){
            case 'home':
                include_once 'view/header.php';
                include_once 'view/home.php';
                include_once 'view/footer.php';
                break;
            case 'about':
                include_once 'view/header.php';
                include_once 'view/about.php';
                include_once 'view/footer.php';
                break;
            case 'contact':
                include_once 'view/header.php';
                include_once 'view/contact.php';
                include_once 'view/footer.php';
                break;
        }
    }
?>