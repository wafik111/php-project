    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <?php 
        if (!isset($_SESSION['username'] )) {
            $_SESSION['message'] = "Please Login First To be able to read the full Article";
            header("Location: index.php");
        }
    ?> 
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['post_id'])){
                    
                $post_id = $_GET['post_id'];
                    
                $query="UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id";
                $get_post_view = mysqli_query($connection,$query);
                    
                $query = "SELECT * FROM posts WHERE post_id ={$post_id} ";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    
                    $post_title = $row['post_title'];
                    $post_user_id = $row['post_user_id'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_views = $row['post_views'];
                    $query = "SELECT * FROM users WHERE user_id = $post_user_id LIMIT 1";
                    $get_user = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($get_user);
                ?>

                <!-- First Blog Post -->
                <h1>
                    <a href="#"><?php echo $post_title; ?></a>
                    <?php
                    if(isset($_SESSION['user_role'])){
                        if($_SESSION['user_role'] === "Admin"){
                        echo "<a href='admin/posts.php?source=edit_posts&update=$post_id'><button class='btn btn-default pull-right'> Edit Post</button></a>";
                        }
                    }        
                    ?>
                    
                </h1>
                <p class="lead">
                    by <a href="author_related_posts.php?author=<?php echo $row['user_id']; ?>"><?php echo $row['user_firstname']; ?></a>
                    <small class="pull-right"><?php echo $post_views;?> Views</small>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>
                <?php } 
                }
                else{
                    header("Location: index.php");    
                }
                ?>
                
                <!-- Comments Form -->
                
                <?php
                
                if(isset($_POST['add_comment'])){
                        $comment_post_id = $_GET['post_id'];
                        $comment_user_id = $_SESSION['db_user_id'];
                        $comment_content = $_POST['comment_content'];
                        $comment_date = date('d-m-y');

                        if(!empty($comment_content)){
                             $query = "INSERT INTO comments(comment_post_id ,comment_user_id , comment_content, comment_date) values($comment_post_id,'$comment_user_id','$comment_content',now())";

                            $add_comment = mysqli_query($connection, $query);

                            confirm_query($add_comment);
                                $success = "Succesfully Deliverd! . Your comment will be listed after it is reviewd by the admin";
                        }
                        else{
                            $error = "Content are requried!";
                        }
                } 
                ?>
                <?php if ($_SESSION['user_role'] == "User") { ?>
                    
                
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                          
                        <div class="form-group">
                           <label for="comment_content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_comment">Add Comment</button>
                    </form>
                    <?php if(isset($error)){
                    echo "<h4 class='alert alert-danger text-center'>{$error}</h4>";
                        } 
                    if(isset($success)){
                    echo "<h4 class='alert alert-success text-center'>{$success}</h4>";
                        }
                    ?>
                    
                </div>

                <hr>

            <?php } ?>
                <!-- Posted Comments -->

                <!--Display Only Approved Comments Comment -->
                <?php
                
                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                    
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status ='Approved' ORDER BY comment_id DESC";
                    $get_comments = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($get_comments)){
                        $comment_user_id = $row['comment_user_id'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        $comment_status = $row['comment_status'];

                        $query = "SELECT * FROM users WHERE user_id = $comment_user_id LIMIT 1";
                        $get_user = mysqli_query($connection,$query);
                        $row = mysqli_fetch_assoc($get_user);
                         ?>
                        <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width="64" height="64" src="admin/images/<?php echo $row['user_image'] ; ?>" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $row['user_firstname'] . " " . $row['user_lastname'];?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                    </div>
                               
                        <?php } } ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            
       <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php" ?>
