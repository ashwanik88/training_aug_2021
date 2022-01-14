<?php require_once('includes/startup.php');

if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $qty = $_GET['qty'];
    if(isset($_SESSION['cart'][$product_id]['qty']) && !empty($_SESSION['cart'][$product_id]['qty'])){
        $qty += $_SESSION['cart'][$product_id]['qty'];
    }
    $_SESSION['cart'][$product_id] = array('qty' => $qty, 'options' => array('color' => 'red', 'size' => 'XL' ));

}
