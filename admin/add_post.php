<?php include "includes/admin_header.php"; ?>
 
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome to Admin
                            <small>Username</small>
                        </h1>


<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="js/script.js"></script>
  <?php
   if (isset($_POST['create_post'])){
       $post_title = $_POST['title'];
       $post_category_id = $_POST['post_category'];
       $post_author = $_POST['author'];
       $post_status = $_POST['post_status'];
       
       $post_image = $_FILES['image']['name'];
       $post_image_temp = $_FILES['image']['tmp_name'];
       
       $post_date = date('d-m-y');
       
       $post_tags = $_POST['post_tags'];
       $post_content = $_POST['post_content'];
       $post_comment_count = 0;
       
       
       move_uploaded_file($post_image_temp, "../images/$post_image");
       
       $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content,
       post_tags, post_comment_count, post_status) ";
       $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(), '{$post_image}','{$post_content}',
       '{$post_tags}', '{$post_comment_count}','{$post_status}')";
       
       
       $create_post_query = mysqli_query($connection, $query);
       confirm($create_post_query);
       echo "<p class='bg-success'>Post Created: " . "<a href='post.php'>View Post</a></p>";
   }

   ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    
    <div class="form-group">
        <label for="categories">Post Category</label>
        <select name="post_category" class="form-control">
            <?php
            
            $query = "SELECT * FROM categories";
            $category_query = mysqli_query($connection, $query);
            
            confirm($category_query);

            while($row = mysqli_fetch_assoc($category_query)) {
                $id = $row["cat_id"];
                $cat_title = $row["cat_title"];
                
                echo "<option value='{$id}'>{$cat_title}</option>";
            }
            
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
        <p class="help-block">Select an image for the post.</p>
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class=""></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>

 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<?php include "includes/admin_footer.php"; ?>