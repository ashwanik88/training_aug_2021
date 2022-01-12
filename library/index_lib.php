<?php 

$sql = "SELECT * FROM products WHERE status='1'";
$rs = mysqli_query($con, $sql);
$data_products = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_products[] = $rec;
    }
}