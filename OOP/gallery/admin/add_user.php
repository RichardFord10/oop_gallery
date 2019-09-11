<?php include("includes/header.php"); ?>

<?php  if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php $the_message = "";  ?>
<?php

$user = new User();
  
if(isset($_POST['submit'])) {
    
$user->username = $_POST['username'];
$user->password =  $_POST['password'];
$user->first_name =  $_POST['first_name'];
$user->last_name =  $_POST['last_name'];    
    
 $user->set_file($_FILES['user_image']);
 $user->upload_photo();
  $the_message = "Add User Success!";
  }  
    
  


?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <?php include("includes/top_nav.php"); ?>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <?php include("includes/side_nav.php");?>
  <!-- /.navbar-collapse -->
</nav>



<div id="page-wrapper">
<h3 class="text-center bg-success">
   <?php echo $the_message;?>
  </h3>
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Add User
          <small></small>
        </h1>
       
        <form action="" enctype="multipart/form-data" method="post">
          
        
        
        
        <div class="col-md-8">
        
           
            <input type="file" name ="user_image">

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name ="username" class="form-control">
            
          </div>
          
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name ="password" class="form-control" >
            
          </div>
          
           <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name ="first_name" class="form-control" >
            
          </div>
          
               <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name ="last_name" class="form-control" >
            
          </div>
          
               <div class="form-group">
            <input class="btn btn-primary" type="submit" name ="submit" class="form-control" >
            
          </div>

        </div>
  

        
        
        </form>
        
        
        
        
        
        
        
        
        
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>




<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>