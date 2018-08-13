<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
    
       <link rel="stylesheet" type="text/css" href="assets/css/modal.css">
<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">


 <div class="navbar-collapse collapse">

          <!-- Right nav -->
          <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="index.php">Home</h4>
       
                    <?php
                    $query = "SELECT * FROM categories";
                    $category_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($category_query)) {
                        $title = $row['cat_title'];
                        $cat_id = $row["cat_id"];
                        echo "<li><a href='category.php?category=$cat_id'>{$title}</a></li>";
                    } 
                    
                    ?>
                    <?php
    if(!isset($_SESSION['username'])){
        echo '
      <li class="dropdown">
      <a class="dropdown-toggle" href="#" data-toggle="dropdown">
      <span class="glyphicon glyphicon-log-in"></span> Login</a>
        <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px; background-color:white;">
        <form class="form-horizontal" action="includes/login.php" method="post">
          <input id="sp_uname" class="form-control login" type="text" name="username" placeholder="Username.." required=""/>
          <input id="sp_pass" class="form-control login" type="password" name="password" placeholder="Password.."/>
          <input class="btn btn-primary" type="submit" name="login" value="login" />
        </form>
        </div>
      </li>';
        }
    ?>

  </ul>

        </div>
 
                    
                    <?php
                    
                    if(isset($_SESSION['role'])){
                        echo "<li class='pull-right'><a href='includes/logout.php'>Logout</a></li>";
                        
                        if($_SESSION['role'] == 'admin') {
                            echo "<li class='pull-right'><a href='admin'>Admin</a></li>";
                        }

                        if(isset($_GET['p_id']) && $_SESSION['role'] == 'admin'){
                            $p_id = $_GET['p_id'];
                            echo "<li><a href='admin/post.php?source=edit_post&p_id=$p_id'>Edit Post</a></li>";
                        }
                    }
 
                        ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>