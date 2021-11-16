<?php

checkAdminLogin();
$document_title = 'Users';


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


$sql = "SELECT * FROM users";

$rs = mysqli_query($con, $sql);

$data_users = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_users[] = $rec;
    }
}


function deleteUser($user_id){
    global $con;
    $sql = "DELETE FROM users WHERE user_id='". $user_id ."'";
    mysqli_query($con, $sql);
}

// tasks 9/11/2021
// jquery validation
// confirm password
// username already exist
// edit form