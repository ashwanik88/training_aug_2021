<?php

checkAdminLogin();

$document_title = 'Add Category';
$category_id = 0;
$category_name = '';
$parent_id = '';
$sort_order = '';
$photo = '';
$status = 0;




if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
    $category_id = $_GET['category_id'];
    $document_title = 'Edit Category : ' . $category_id;
    $category_data = getCategory($category_id);
    if($category_data){
    $category_name = $category_data['category_name'];
    $parent_id = $category_data['parent_id'];
    $sort_order = $category_data['sort_order'];
    $photo = $category_data['photo'];
    $status = $category_data['status'];
    }else{
        addAlert('danger', 'Category ID not found!');
        redirect('categories.php');
    }
}

if($_POST){
    if(isset($_POST['category_name']) && !empty($_POST['category_name']) && isset($_POST['sort_order']) && !empty($_POST['sort_order'])){
        $category_name = $_POST['category_name'];
        $parent_id = $_POST['parent_id'];
        $sort_order = $_POST['sort_order'];
        $status = (isset($_POST['status']))?1:0;

        // if(!alreadyExist($con, $category_name)){
        if(!alreadyExist($category_name, $category_id)){

                $new_photo = uploadFile();
                if($new_photo){

                    if(!empty($photo)){
                        unlink( '../uploads/' . $photo);
                    }

                    $photo = $new_photo;
                }

                if($category_id){
                    $sql = "UPDATE categories SET category_name='". $category_name ."', parent_id='". $parent_id ."', sort_order='". $sort_order ."', photo='". $photo ."', status='". (int)$status ."' WHERE category_id='". $category_id ."'";
                    addAlert('success', 'Category added successfully!');

                }else{
                    $sql = "INSERT categories SET category_name='". $category_name ."', parent_id='". $parent_id ."', sort_order='". $sort_order ."', photo='". $photo ."', status='". (int)$status ."'";
                    addAlert('success', 'Category added successfully!');
                }

                mysqli_query($con, $sql);
                redirect('categories.php');

            
        }else{
            addAlert('danger', 'Category Name already exists!');
        }   

    }else{
        addAlert('danger', 'Incomplete form data!');
    }
}

// function alreadyExist($con, $category_name){  // without global 
function alreadyExist($category_name, $category_id){
    global $con;
    $sql = "SELECT * FROM categories WHERE category_name='". $category_name ."' AND category_id!='". $category_id ."'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
}

function getCategory($category_id){
    global $con;
    $sql = "SELECT * FROM categories WHERE category_id='". (int)$category_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }

    return $rec;
}

function getCategories($parent_id){
    global $con;
    $sql = "SELECT * FROM categories WHERE parent_id=" . $parent_id;
    $rs = mysqli_query($con, $sql);
    $data = array();
    if(mysqli_num_rows($rs)){
        while($rec = mysqli_fetch_assoc($rs)){
            $data[] = $rec;
        }
    }
    return $data;
}

function makeCategory($parent_id, $parent_name = ''){
    $data_categories = getCategories($parent_id);
    foreach($data_categories as $data_category){
        echo '<option value="'. $data_category['category_id'] .'">'. getParents($data_category['parent_id']) . $data_category['category_name'] .'</option>';

        makeCategory($data_category['category_id']);    // recursion
    }

}

function getParents($parent_id){
    $data_parent = getCategory($parent_id);
    $html = '';
    if(sizeof($data_parent)){
        $html .= getParents($data_parent['parent_id']);
        $html .= $data_parent['category_name'] .' &raquo; ';
    }
    return $html;
}

function uploadFile(){
    if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])){
        $filename = time() . '_'. $_FILES['photo']['name'];
        $src = $_FILES['photo']['tmp_name'];
        (copy($src, '../uploads/' . $filename));
        return $filename;
    }else{
        return false;
    }
}

/*
0) password visible option
1) Update query after submit
2) avoid empty password update
3) Category Name already exists

*/

