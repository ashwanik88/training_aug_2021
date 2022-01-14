<?php 

$sql = "SELECT * FROM products WHERE status='1'";
$rs = mysqli_query($con, $sql);
$data_products = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_products[] = $rec;
    }
}

function getProduct($product_id){
    global $con;
    $sql = "SELECT * FROM products WHERE status='1' AND product_id='". (int)$product_id ."'";
    $rs = mysqli_query($con, $sql);
    $data_product = array();
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
        $data_product = $rec;
    }
    return $data_product;
}