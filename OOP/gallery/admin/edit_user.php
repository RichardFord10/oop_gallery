<?php include("includes/header.php"); ?>

<?php  if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php
  
if(empty($_GET['id'])){
  
  redirect("users.php");
  
} else {
  
$user = User:: find_by_id($_GET['id']);
  
  if(isset($_POST['update'])) {

  if($user) {
$user->user_image = $_POST['user_image'];   
$user->username = $_POST['username'];
$user->password =  $_POST['password'];
$user->first_name =  $_POST['first_name'];
$user->last_name =  $_POST['last_name'];    
    
 if(empty($_FILES['user_image'])) {
   
   $user->save();
   
   
 }else{
   
 $user->set_file($_FILES['user_image']);
 $user->upload_photo();
 $user->save();
   
  redirect("edit_user.php?id={$user->id}");
   
 }   
  $the_message = "Update Success!";
    
  }  
    
  }
  
  
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
        
           
            

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name ="username" class="form-control" value="<?php echo $user->username;?>">
            
          </div>
          
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name ="password" class="form-control" value="<?php echo $user->password;?>" >
            
          </div>
          
           <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name ="first_name" class="form-control" value="<?php echo $user->first_name;?>" >
            
          </div>
          
               <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name ="last_name" class="form-control" value="<?php echo $user->last_name;?>" >
            
          </div>
          
             
          
               <div class="form-group">
                <a href="delete_user.php?id=<?php echo $user->id;?>" class="btn btn-danger">Delete</a>
            <input class="btn btn-primary" type="submit" name ="update" class="form-control" value="Update">
            
          </div>

        </div>
  
          
          
          <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Photo<span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                <input type="file" name ="user_image">
                                
                                <hr>
                                  <p class="text ">
                                    <span class="data photo_id_box"><img class="admin-thumbnail user-image" src="<?php echo $user->image_path_and_placeholder();?>"></span>
                                  </p>
                                 
                          
                              
                              
                              </div>
                            </div>          
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