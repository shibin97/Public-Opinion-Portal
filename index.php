<?php include "includes/header.php";?>

    <!-- Navigation -->  <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-sm-12">
               <h1 class="page-header">
                PUBLIC OPINION PANEL-
                <small>A Platform for public opinion</small>
                </h1>
                 <section class="main-slider">
    <div class="container-fluid">
      <div class="row">
        <div class="col col-sm-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <div class="item active">
      <img src="images/1.jpg" alt="...">
    </div>
    <div class="item">
      <img src="images/8.jpg" alt="...">
    
    </div>
    <div class="item">
      <img src="images/7.jpg" alt="...">
    
    </div>
  
    <div class="item">
      <img src="images/3.jpg" alt="...">
    
    </div>
    <div class="item">
      <img src="images/10.jpg" alt="...">
    
    </div>
  </div>
   </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">                                            
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
  <span class="icon-next"></span>
  </a>

  </div>
  </div>
 

      </div>
    </div>
  </section>


                <?php
                
                $query = "SELECT * FROM posts ";
                $select_all_posts_query = mysqli_query($connection, $query);
                
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_image = $row["post_image"];
                    $post_content = substr($row["post_content"],0,100);
                    $post_status = $row["post_status"];
                    
                    if($post_status == 'published') {
                    ?>

                <!-- HTML/PHP for displaying POSTS -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?>...</p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    
                    
                <?php }} // end while and end if ?>
                
                
                

                

            </div>

            <!-- Blog Sidebar Widgets Column -->

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";?>