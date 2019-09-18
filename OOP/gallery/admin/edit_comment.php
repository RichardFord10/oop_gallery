<?php include("includes/header.php"); ?>

<?php  if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php
  
if(empty($_GET['id'])){
  
  redirect("comments.php");
  
} else {
  
$comment = Comment:: find_by_id($_GET['id']);
  
  if(isset($_POST['update'])) {

  if($comment) {

$comment->body = $_POST['body'];
$comment->save();
 }else{

  redirect("edit_comment.php?id={$comment->id}");
   
 }   
  $the_message = "Update Success!";
    
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
        Edit Comment
          <small></small>
        </h1>
       
        <form action="" enctype="multipart/form-data" method="post">
          
        
        
        
        <div class="col-md-8">
        
           
            

          <div class="form-group">
          <h3>
            <?php echo $comment->author;?>
            </h3>
          </div>
          
          <div class="form-group">
            <label for="password">Body</label>
            <input type="text" name ="body" class="form-control" value="<?php echo $comment->body;?>" >
            
          </div>

             
          
               <div class="form-group">
                <a href="delete_comment.php?id=<?php echo $comment->id;?>" class="btn btn-danger">Delete</a>
            <input class="btn btn-primary" type="submit" name ="update" class="form-control" value="update">
            
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