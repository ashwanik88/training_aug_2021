<?php require_once('includes/startup.php');

if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $_SESSION['cart'][] = $product_id;
}
