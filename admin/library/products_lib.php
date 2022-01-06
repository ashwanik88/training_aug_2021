<?php

checkAdminLogin();
$document_title = 'Products';

if($_POST){
    if(isset($_POST['product_ids']) && !empty($_POST['product_ids'])){
        foreach($_POST['product_ids'] as $product_id){
            deleteProduct($product_id);
        }
        addAlert('success', 'Product deleted successfully!');
        redirect('products.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}


if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];

    switch($action){
        case 'delete':
            if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
                $product_id = $_GET['product_id'];
                deleteProduct($product_id);
                addAlert('success', 'Product deleted successfully!');
                redirect('products.php');
            }
        break;

    }

}
$page_start = 0; 
$page_limit = 10;
$page = 1;

$sort = 'product_id';
$order = 'DESC';
$sort_url = '';
$page_url = '';

$filter_product_id = '';
$filter_productname = '';
$filter_description = '';
$filter_price = '';
$filter_status = '';
$filter_date_added = '';
$where = ' WHERE 1=1 ';
if(isset($_GET['filter_product_id']) && !empty($_GET['filter_product_id'])){
    $filter_product_id = $_GET['filter_product_id'];
    $where .= " AND product_id='". (int)$filter_product_id ."'";
}
if(isset($_GET['filter_productname']) && !empty($_GET['filter_productname'])){
    $filter_productname = $_GET['filter_productname'];
    $where .= " AND productname LIKE '%". $filter_productname ."%'";
}

$sql_total = "SELECT count(*) as total FROM products " . $where; // field alias as total
$rs_total = mysqli_query($con, $sql_total);
$rec_total = mysqli_fetch_assoc($rs_total);
$total_products = $rec_total['total'];


if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = $_GET['page'];
    $page_start = ($page - 1) * $page_limit; // 0, 10, 20 | 1, 2, 3
    $page_url .= '&page='.$page;
}

if(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['order']) && !empty($_GET['order'])){
    $sort = $_GET['sort']; // $this->request->get['']
    $order = $_GET['order'];
    $sort_url .= '&sort='.$sort;
    $sort_url .= '&order='.$order;
}

$sql = "SELECT * FROM products ". $where ." ORDER BY ". $sort ." ". $order ." LIMIT ". $page_start .", " . $page_limit;
$rs = mysqli_query($con, $sql);

$order = ($order == 'ASC')?'DESC':'ASC';

$data_products = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_products[] = $rec;
    }
}


function deleteProduct($product_id){
    global $con;
    if($product_id != 1){
        $sql = "DELETE FROM products WHERE product_id='". $product_id ."'";
        mysqli_query($con, $sql);
    }else{
        addAlert('warning', 'You can\'t delete admin product!');
        redirect('products.php');
    }
}

// tasks 9/11/2021
// jquery validation
// confirm password
// productname already exist
// edit form