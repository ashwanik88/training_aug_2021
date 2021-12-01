<?php

checkAdminLogin();
$document_title = 'Categories';

if($_POST){
    if(isset($_POST['category_ids']) && !empty($_POST['category_ids'])){
        foreach($_POST['category_ids'] as $category_id){
            deleteCategory($category_id);
        }
        addAlert('success', 'Category deleted successfully!');
        redirect('categories.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}


if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];

    switch($action){
        case 'delete':
            if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
                $category_id = $_GET['category_id'];
                deleteCategory($category_id);
                addAlert('success', 'Category deleted successfully!');
                redirect('categories.php');
            }
        break;

    }

}
$page_start = 0; 
$page_limit = 10;
$page = 1;

$sort = 'category_id';
$order = 'DESC';
$sort_url = '';
$page_url = '';

$filter_category_id = '';
$filter_category_name = '';
$filter_parent_id = '';
$filter_sort_order = '';
$filter_status = '';
$where = ' WHERE 1=1 ';
if(isset($_GET['filter_category_id']) && !empty($_GET['filter_category_id'])){
    $filter_category_id = $_GET['filter_category_id'];
    $where .= " AND category_id='". (int)$filter_category_id ."'";
}
if(isset($_GET['filter_category_name']) && !empty($_GET['filter_category_name'])){
    $filter_category_name = $_GET['filter_category_name'];
    $where .= " AND category_name LIKE '%". $filter_category_name ."%'";
}

$sql_total = "SELECT count(*) as total FROM categories " . $where; // field alias as total
$rs_total = mysqli_query($con, $sql_total);
$rec_total = mysqli_fetch_assoc($rs_total);
$total_categories = $rec_total['total'];


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

$sql = "SELECT * FROM categories ". $where ." ORDER BY ". $sort ." ". $order ." LIMIT ". $page_start .", " . $page_limit;
$rs = mysqli_query($con, $sql);

$order = ($order == 'ASC')?'DESC':'ASC';

$data_categories = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_categories[] = $rec;
    }
}


function deleteCategory($category_id){
    global $con;
    if($category_id != 1){
        $sql = "DELETE FROM categories WHERE category_id='". $category_id ."'";
        mysqli_query($con, $sql);
    }else{
        addAlert('warning', 'You can\'t delete admin category!');
        redirect('categories.php');
    }
}

// tasks 9/11/2021
// jquery validation
// confirm password
// category_name already exist
// edit form