<?php 
require_once('includes/startup.php');
require_once('library/category-form_lib.php');
?>
<?php require_once('common/html_start.php'); ?>
<link href="css/dashboard.css" rel="stylesheet">
<?php require_once('common/body_start.php'); ?> 
<?php require_once('common/header.php'); ?> 
<?php require_once('common/sidebar.php'); ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $document_title; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="categories.php" class="btn btn-light">Back</a>
    </div>
  </div>

  <?php displayAlert(); ?>
  
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="category_name" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>">
  </div>
  <div class="mb-3">
    <label for="parent_id" class="form-label">Parent ID</label>
    

    <select class="form-control" id="parent_id" name="parent_id">
      <option value="0">Top Most Parent</option>



      <?php foreach($data_categories as $data_category){ ?>
        <option style="color: red;" value="<?php echo $data_category['category_id']; ?>"><?php echo $data_category['category_name']; ?></option>

        <?php $data_sub_categories = getCategories($data_category['category_id']); ?>

        <?php foreach($data_sub_categories as $data_sub_category){ ?>
          <option value="<?php echo $data_sub_category['category_id']; ?>"><?php echo $data_category['category_name']; ?> &raquo; <?php echo $data_sub_category['category_name']; ?></option>

          <?php $data_sub_sub_categories = getCategories($data_sub_category['category_id']); ?>

          <?php foreach($data_sub_sub_categories as $data_sub_sub_category){ ?>
            <option value="<?php echo $data_sub_sub_category['category_id']; ?>"><?php echo $data_category['category_name']; ?> &raquo; <?php echo $data_sub_category['category_name']; ?> &raquo; <?php echo $data_sub_sub_category['category_name']; ?></option>
          <?php } ?>

        <?php } ?>

      <?php } ?>


      

    </select>
  </div>
  <div class="mb-3">
    <label for="sort_order" class="form-label">Sort Order</label>
    <input type="text" class="form-control" id="sort_order" name="sort_order" value="<?php echo $sort_order; ?>">
  </div>
  <div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
    <?php if(!empty($photo)){ ?>
      <img src="../uploads/<?php echo $photo; ?>" width="100px" class="img-thumbnail m-3" />
    <?php } ?>
    <input type="file" class="form-control" id="photo" name="photo" />
  </div>
  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="status" name="status" <?php echo ($status == 1)?'checked':''; ?>>
      <label class="form-check-label" for="status">Active</label>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
</main>
<?php require_once('common/scripts.php'); ?>

<script src="js/dashboard.js"></script>

<?php require_once('common/html_end.php'); ?>