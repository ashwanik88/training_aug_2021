<?php 
require_once('includes/startup.php');
require_once('library/users_lib.php');
?>
<?php require_once('common/html_start.php'); ?>
<link href="css/dashboard.css" rel="stylesheet">
<?php require_once('common/body_start.php'); ?> 
<?php require_once('common/header.php'); ?> 
<?php require_once('common/sidebar.php'); ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <form action="" method="POST">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $document_title; ?></h1>
    <div class=" mb-2 mb-md-0">
      <input type="submit" value="Delete" class="btn btn-danger" name="btnDelete" onclick="return confirm('Are you sure want to delete this?');" /> 
      <a href="user-form.php" class="btn btn-primary">Add User</a>
    </div>
  </div>
<?php displayAlert();?>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" onclick="$('.chk').prop('checked', $(this).is(':checked'));" /></th>
          <th scope="col"><a href="users.php?sort=user_id&order=<?php echo $order; ?>">ID</a></th>
          <th scope="col"><a href="users.php?sort=username&order=<?php echo $order; ?>">Username</a></th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Fullname</th>
          <th scope="col">Status</th>
          <th scope="col">Date Added</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

      <?php if(sizeof($data_users)){ ?>
        <?php foreach($data_users as $data_user){ ?>
        <tr>
          <td><input type="checkbox" name="user_ids[]" value="<?php echo $data_user['user_id']; ?>" class="chk" /></td>
          <td><?php echo $data_user['user_id']; ?></td>
          <td><?php echo $data_user['username']; ?></td>
          <td><?php echo $data_user['email']; ?></td>
          <td><?php echo $data_user['phone']; ?></td>
          <td><?php echo $data_user['fullname']; ?></td>
          <td><?php echo ($data_user['status'] == 1)?'Active':'Inactive'; ?></td>
          <td><?php echo changeDate($data_user['date_added']); ?></td>
          <td>
            <a href="user-form.php?user_id=<?php echo $data_user['user_id']; ?>">Edit</a>
             | 
            <a href="users.php?action=delete&user_id=<?php echo $data_user['user_id']; ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
          </td>
          
        </tr>
        <?php } ?>
      <?php }else{ ?>
      <tr><td colspan="8" class="text-center text-danger"> No record found! </td></tr>  
      <?php } ?>

      </tbody>
    </table>

  <?php if($total_users > $page_limit){ ?>
  <nav aria-label="...">
    <ul class="pagination">
    <?php if($page > 1){ ?>
      <li class="page-item"><a class="page-link" href="users.php?page=<?php echo $page-1; ?>">Prev</a></li>
      <?php }else{ ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Prev</a></li>
      <?php } ?>
      <?php for($n = 1; $n <= ceil($total_users / $page_limit); $n++){ ?>
      <li class="page-item <?php echo ($page == $n)?'active':'';?>"><a class="page-link" href="users.php?page=<?php echo $n; ?>"><?php echo $n; ?></a></li>
      <?php } ?>
      <?php if($page < $n - 1){ ?>
      <li class="page-item"><a class="page-link" href="users.php?page=<?php echo $page+1; ?>">Next</a></li>
      <?php }else{ ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Next</a></li>
      <?php } ?>
    </ul>
  </nav>
  <?php } ?>
  </div>
      </form>
</main>
<?php require_once('common/scripts.php'); ?>

<script src="js/dashboard.js"></script>

<?php require_once('common/html_end.php'); ?>