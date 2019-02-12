<?php  include "includes/database.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php
if(isset($_POST['register'])){
    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    if(!empty($username) && !empty($user_email) && !empty($user_password)){
        
        $username = mysqli_real_escape_string($connection,$username);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_password = mysqli_real_escape_string($connection,$user_password);
        
        $user_password = password_hash($user_password, PASSWORD_BCRYPT,array('cost' => 10));

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        
        $user_image = $_FILES['user_image']['name'];
        $tmp_user_image = $_FILES['user_image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        move_uploaded_file($tmp_user_image, "./images/$user_image");
        
        $query = "INSERT INTO users(username,user_email,user_password, user_firstname, user_lastname, user_image, user_role) values ('$username','$user_email','$user_password', '$user_firstname', '$user_lastname', '$user_image', '$user_role')";
        $register_user = mysqli_query($connection, $query);
        confirm_query($register_user);
        
        $message = "User Created!";
    }
    else{
       $error = "All Fields Are Required !";
    }
}


?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    <style>
        .label-width{
            width:90px;
        }
        #login-header{
            margin-bottom: 30px;
        }
        .form-wrap{
            margin-top:60px;
        }
        #btn-login{
            margin:60px 0 80px 0;
        }

    </style>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center well">
                <div class="form-wrap" style="width:60%; margin:auto;">
                <h1 id="login-header" class="text-center">Register User</h1>
                    <form role="form" action="" method="post" id="login-form" enctype="multipart/form-data" autocomplete="off">
                       <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label for="username" class="btn btn-default label-width"> Username </label>
                               </span>
                               <input type="text" class="form-control" name="username" placeholder="John">
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label class="btn btn-default label-width" for="email"> Email </label>
                               </span>
                               <input type="email" class="form-control" name="user_email" placeholder="John@gmail.com">
                            </span>
                        </div>
                       <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label class="btn btn-default label-width" for="password"> Password </label>
                               </span>
                               <input type="password" class="form-control" name="user_password" placeholder="***">
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label class="btn btn-default label-width" for="first_name"> First Name </label>
                               </span>
                               <input type="text" class="form-control" name="user_firstname" placeholder="John@gmail.com">
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label class="btn btn-default label-width" for="first_name"> Last Name </label>
                               </span>
                               <input type="text" class="form-control" name="user_lastname" placeholder="John@gmail.com">
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label class="btn btn-default label-width" for="role"> Role </label>
                               </span>
                               <input type="radio" class="form-control" name="user_role" value="User" placeholder="John@gmail.com">User <br>
                               <input type="radio" class="form-control" name="user_role" value="Subscriber" placeholder="John@gmail.com">Subscriber
                            </span>
                        </div>
                        <div class="form-group">
                          
                            <input type="file" name="user_image">
                        </div>
                        <div class="form-group text-center">
                        <input type="submit" name="register" id="btn-login" class="btn btn-primary btn-lg btn-block text-center" value="Register">
                        </div>
                    </form>
                     <?php
                    if(isset($message)){
                        echo "<h4 class='alert alert-success text-center'>{$message}</h4>";
                    }if(isset($error)){
                        echo "<h4 class='alert alert-danger text-center'>{$error}</h4>";
                    }
                    ?>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<hr>



<?php include "includes/footer.php";?>
