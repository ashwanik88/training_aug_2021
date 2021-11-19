<?php

checkAdminLogin();
$document_title = 'Users';

if($_POST){
    if(isset($_POST['user_ids']) && !empty($_POST['user_ids'])){
        foreach($_POST['user_ids'] as $user_id){
            deleteUser($user_id);
        }
        addAlert('success', 'User deleted successfully!');
        redirect('users.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}


if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];

    switch($action){
        case 'delete':
            if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
                $user_id = $_GET['user_id'];
                deleteUser($user_id);
                addAlert('success', 'User deleted successfully!');
                redirect('users.php');
            }
        break;

    }

}
$page_start = 0; 
$page_limit = 10;
$page = 1;

$sort = 'user_id';
$order = 'DESC';

$sql_total = "SELECT count(*) as total FROM users"; // field alias as total
$rs_total = mysqli_query($con, $sql_total);
$rec_total = mysqli_fetch_assoc($rs_total);
$total_users = $rec_total['total'];


if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = $_GET['page'];
    $page_start = ($page - 1) * $page_limit; // 0, 10, 20 | 1, 2, 3
}

if(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['order']) && !empty($_GET['order'])){
    $sort = $_GET['sort'];
    $order = $_GET['order'];
}
$sql = "SELECT * FROM users ORDER BY ". $sort ." ". $order ." LIMIT ". $page_start .", " . $page_limit;
$rs = mysqli_query($con, $sql);

$order = ($order == 'ASC')?'DESC':'ASC';

$data_users = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_users[] = $rec;
    }
}


function deleteUser($user_id){
    global $con;
    if($user_id != 1){
        $sql = "DELETE FROM users WHERE user_id='". $user_id ."'";
        mysqli_query($con, $sql);
    }else{
        addAlert('warning', 'You can\'t delete admin user!');
        redirect('users.php');
    }
}

// tasks 9/11/2021
// jquery validation
// confirm password
// username already exist
// edit form