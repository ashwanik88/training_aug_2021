<?php

function redirect($url){
    header("Location: " . $url);
    die;
}

function checkAdminLogin(){
    if(!isset($_SESSION['admin_user']) || empty($_SESSION['admin_user'])){
        header("Location: index.php");
        die;
    }
}