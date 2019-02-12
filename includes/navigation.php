<style>
    #logo{
        width: 150px;
        margin-right: 10px;

    }
    #logo_link{
        padding:0;
    }
</style>
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" id="logo_link" href="index.php"><img id="logo" src="./images/Sanish1.png" alt="logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  
                  <?php
                    
                    $query = "SELECT * FROM categories";
                    $getData = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($getData)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        
                        $class_category = '';
                        $registration = 'registration.php';
                        $registration_class = '';
                        $contact = 'contact.php';
                        $contact_class = '';
                        
                        $pageName = basename($_SERVER['PHP_SELF']);
                        
                        if(isset($_GET['cat_id']) && $_GET['cat_id'] == $cat_id){
                            $class_category = 'active';
                        }
                        else if($pageName == $registration){
                            $registration_class ='active';
                        }
                        else if($pageName == $contact){
                            $contact_class = 'active';
                        }
                        
                        echo "<li class='$class_category'><a href='./category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                    }
                    if (!isset($_SESSION['username'])) {
                    
                   ?>
                    <li class="<?php echo $registration_class;?>">
                        <a href="registration.php">User Registration</a>
                    </li>
                    <?php } ?>
                    <li  class="<?php echo $contact_class;?>">
                    <a  href="contact.php">Contact Us</a>
                    </li>
                </ul>

              <?php if ($_SESSION['user_role'] == "Subscriber") {
                    
                   ?>
                <ul class="nav navbar-nav" style="float: right;">
                    <li>
                    <a  href="add_posts.php">+ Create New Post</a>
                    </li>

                    <li>
                    <a  href="author_related_posts.php?author=<?php echo $_SESSION['db_user_id']; ?>">My Posts</a>
                    </li>
                </ul>

            <?php } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>