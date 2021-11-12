<?php 
require_once('includes/startup.php');
require_once('library/user-form_lib.php');
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
      <a href="users.php" class="btn btn-light">Back</a>
    </div>
  </div>

  <?php displayAlert(); ?>
  
  <form action="" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="confirm" class="form-label">Confirm</label>
    <input type="password" class="form-control" id="confirm" name="confirm">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
  </div>
  <div class="mb-3">
    <label for="fullname" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
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