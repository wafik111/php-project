    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
            <div class="col-md-8">
                <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-success" role="alert">
                 <?php   echo $_SESSION['message'];
                        unset($_SESSION['message']); ?>
                </div>
                <?php } ?>
                <h1 class="page-header">
                    Latest Posts
                    <small>By Uploads</small>
                </h1>
                <?php
                    $per_page = 4;
                
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    
                    $page_1 = ($page*$per_page)-$per_page;
                    }
                else{
                    $page = 1;
                    $page_1 = 0;
                }
                
                $query="SELECT * FROM posts";
                $find_post_count =mysqli_query($connection, $query);
                $post_count = mysqli_num_rows($find_post_count);
                $post_count = ceil($post_count/$per_page);
                
                $query = "SELECT * FROM posts WHERE post_status ='Publish' ORDER BY post_id DESC LIMIT $page_1,$per_page";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_user_id = $row['post_user_id'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content =substr($row['post_content'],0,220);
                    $post_views = $row['post_views'];

                    $query = "SELECT * FROM users WHERE user_id = $post_user_id LIMIT 1";
                    $get_user = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($get_user);
                ?>
                

                    <!-- Blog Post -->
                    <h2>
                        <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        By <a href="author_related_posts.php?author=<?php echo $row['user_id']; ?>"><?php echo $row['user_firstname']; ?></a>
                        <small class="pull-right"><?php echo $post_views;?> Views</small>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } 
                    //Display No result
                    $count = mysqli_num_rows($get_all_posts);
                    if($count == 0 ){
                        
                        echo "<h1 class='text-center'>No Posts Found!</h1>";
                    }  
                ?>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
       <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
        <!-- Pagination Numbering According to post count  -->
        <div>
            <ul class="pager">
                <?php
                for($i =1;$i <= $post_count;$i++){
                    if($i == $page){
                        echo "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
                    }
                    else{
                        echo "<li><a href='index.php?page=$i'>$i</a></li>";
                    }
                    
                }
                ?>
            </ul>
         </div>

       <?php include "includes/footer.php" ?>
