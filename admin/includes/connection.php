<?php

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$con){
    echo 'Error: Database connection failed!';
    die;
}