<?php 
require_once('includes/startup.php');
require_once('library/product-form_lib.php');
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
      <a href="products.php" class="btn btn-light">Back</a>
    </div>
  </div>

  <?php displayAlert(); ?>
  
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="productname" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $productname; ?>">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" value="<?php echo $description; ?>"></textarea>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
  </div>
  <div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
    <?php if(!empty($photo)){ ?>
      <img src="../uploads/<?php echo $photo; ?>" width="100px" class="img-thumbnail m-3" />
    <?php } ?>
    <input type="file" class="form-control" id="photo" name="photo" />
  </div>
    
  <?php if(sizeof($product_uploads)){ ?>
  <table class="table table-bordered table-sm">
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Dated</th>
      <th>Action</th>
    </tr>
    <?php foreach($product_uploads  as $product_upload){ ?>
    <tr>
      <td><?php echo $product_upload['product_photo_id']; ?></td>
      <td>
      <?php if(!empty($product_upload['filename'])){ ?>
      <img src="../uploads/<?php echo $product_upload['filename']; ?>" width="100px" class="img-thumbnail m-3" />
    <?php } ?></td>
      <td><?php echo $product_upload['date_added']; ?></td>
      <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
    </tr>
    <?php }?>
  </table>
  <?php } ?>

  <div class="additional_images"></div>

  <div class="mb-3">
    <button class="btn btn-info btn-sm" id="btnMore" type="button">Add More</button>
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
<script src="js/summernote/summernote.min.js"></script>
<script src="js/summernote/summernote-bs4.min.js"></scrpit>

<script type="text/javascript">


</script>

<?php require_once('common/html_end.php'); ?>