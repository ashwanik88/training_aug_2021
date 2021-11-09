<?php

checkAdminLogin();
$document_title = 'Users';

$sql = "SELECT * FROM users";

$rs = mysqli_query($con, $sql);

$data_users = array();
if(mysqli_num_rows($rs)){
    while($rec = mysqli_fetch_assoc($rs)){
        $data_users[] = $rec;
    }
}


// tasks 9/11/2021
// jquery validation
// confirm password
// username already exist
// edit form