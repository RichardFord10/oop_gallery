<?php include("includes/header.php"); ?>

<?php  if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php


if(empty($_GET['id'])){

redirect("photos.php");

}

$comments = Comment::find_the_comments($_GET['id']);
$photo = Photo::find_by_id($_GET['id']);


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
 <h3 class="bg bg-success">
        <?php echo $session->message(); ?>
      </h3>
    <!-- Page Heading -->
    <div class="row">
     
      <div class="col-lg-12">
        <h1 class="page-header">
         Comments
        </h1>
        <div class="col-md-12">
          <span>
            <img  class="comment_page_photo" src="<?php echo $photo->picture_path();?>" alt="">
          </span> 
      
          
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Body</th>
              </tr>
            </thead>
            <tbody>
              
            <?php  foreach($comments as $comment) :?>
              
              <tr>
                 <td><?php echo $comment->photo_id;?></td>
             
                  <td><?php echo $comment->author;?>
                
                 <div class="actions_link">
                            <a href="delete_photo_comment.php?id=<?php echo $comment->id;?>">Delete</a>
                            <a href="edit_comment.php?id=<?php   echo $comment->id;?>">Edit</a>
                            <a href="">View</a>
                   </td>
                  <td><?php echo $comment->body;?></td>
                
              </tr>
            <?php endforeach ?>
            
            
            </tbody>
          </table><!-- end of table-->
                 
          
          
          
          
          
          
          
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
      </div>
    </div>
    <!-- /.row -->

  </div>
</div>
  <!-- /.container-fluid -->

</div>




<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>