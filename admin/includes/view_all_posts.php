<?php
if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $checkBoxValue){
        $bulk_options = $_POST['bulk_options'];
        echo $bulk_options;
    }
}
  

?>
<form action="" method="post" class="">
   <table class="table table-bordered table-hover">
   <div id="bulkOptionsContainer" class="col-xs-4 form-group">
       <select name="bulk_options" id="" class="form-control">
           <option value="">Select Option</option>
           <option value="publish">Publish</option>
           <option value="draft">Draft</option>
           <option value="delete">Delete</option>
       </select>
   </div>
   <div class="col-xs-4">
       <input type="submit" name="submit" class="btn btn-success" value="Apply">
       <a href="add_post.php" class="btn btn-primary">Add New</a>
   </div>
    <thead>
        <tr>
           <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
       <?php
        $query = "SELECT * FROM posts";
        $category_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($category_posts)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_category_id = $row['post_category_id'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];

            echo "<tr>";
            echo "<td><input class='checkBoxes' id='' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            
            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
            
            $select_cat_id = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($select_cat_id)){
                $cat_title = $row['cat_title'];
            
            
            echo "<td>{$cat_title}</td>";
            }
            
            echo "<td>{$post_status}</td>";
            echo "<td><img src='../images/{$post_image}' width='80' alt='Image of {$post_author}' /></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td class='btn-toolbar'><a href='post.php?delete={$post_id}' class='btn btn-danger'>Delete</a><br>
                    <a href='post.php?source=edit_post&p_id={$post_id}' class='btn btn-info'>Edit</a></td>";
            echo "<tr>";
        }




        ?>
    </tbody>
</table>
</form>

<?php

if (isset($_GET['delete'])){
    $del_post_id = $_GET['delete'];
    
    $query = "DELETE FROM posts WHERE post_id={$del_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: post.php");
}


?>










