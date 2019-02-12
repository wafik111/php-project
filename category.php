    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <?php
                
                 if(isset($_GET['cat_id'])){ //Displaying Title header of Category
                    $cat_id = $_GET['cat_id'];
                    $query = "SELECT cat_title FROM categories WHERE cat_id = $cat_id";
                    $get_category_header = mysqli_query($connection, $query);
                
                    $row = mysqli_fetch_assoc($get_category_header);
                    $cat_title = $row['cat_title'];
                 }
                ?>
                <h1 class="page-header">
                    <?php echo $cat_title; ?>
                </h1>
                <!-- Displaying Post According To post_category_id -->
                <?php 
                if(isset($_GET['cat_id'])){
                        
                    $per_page = 4;
                    if(isset($_GET['page'])){
                        
                        $page = $_GET['page'];

                        $page_1 = ($page*$per_page)-$per_page;
                        }
                    else{
                        $page = 1;
                        $page_1 = 0;
                    }
                    
                    $cat_id = $_GET['cat_id'];
                    $query = "SELECT * FROM posts WHERE post_category_id = $cat_id AND post_status ='Publish' ";
                    
                    $find_post_count = mysqli_query($connection, $query);
                    $post_count = mysqli_num_rows($find_post_count);
                    $post_count = ceil($post_count/$per_page);
                    
                    
                    $query = "SELECT * FROM posts WHERE post_category_id = $cat_id AND post_status ='Publish' LIMIT $page_1,$per_page ";
                    $get_cat_post = mysqli_query($connection, $query);
                
                    while($row = mysqli_fetch_assoc($get_cat_post)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_user_id = $row['post_user_id'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $query = "SELECT * FROM users WHERE user_id = $post_user_id LIMIT 1";
                        $get_user = mysqli_query($connection,$query);
                        $row = mysqli_fetch_assoc($get_user);
                    
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_related_posts.php?author=<?php echo $post_author; ?>"><?php echo $row['user_firstname']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }
                    if($post_count == 0 ){
                        
                        echo "<h1 class='text-center'>No Posts Found!</h1>";
                    }
                
                }
                else{
                    header("Location: index.php");
                }
                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
       <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->
        <div>
           
            <ul class="pager">
                <?php
                for($i =1;$i <= $post_count;$i++){
                    if($i == $page){
                        echo "<li><a class='active_link' href='category.php?cat_id=$cat_id&page=$i'>$i</a></li>";
                    }
                    else{
                        echo "<li><a href='category.php?cat_id=$cat_id&page=$i'>$i</a></li>";
                    }
                    
                }
                ?>
            </ul>
         </div>

        <hr>

       <?php include "includes/footer.php" ?>
