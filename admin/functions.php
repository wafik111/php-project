<?php

function confirm_query($result){
    global $connection;
    if(!$result){
        
        die("Query Failed". mysqli_error($connection));
    }
}

function adminCheck(){
    
   if(!isset($_SESSION['user_role'])){ 
        header("Location: ../index.php");
   }
    else{
    if($_SESSION['user_role'] !== "Admin"){
        
        header("Location: ../index.php");
    }

    }

}

function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
                                
         $cat_title = $_POST['cat_title'];
                                
            if(empty($cat_title)){
                 echo "This field needs to have something!";
            }
             else{
                 $query= "INSERT INTO categories(cat_title) values('$cat_title')";
                                    
                 $add_category = mysqli_query($connection,$query);
                                    
                 if(!$add_category){
                                            
                 die("Query Failed".mysqli_error($connection));
                 }
                 else{
                     $message = "Post Successfully Created!";
                 }
            }
    }

}


function delete_categories(){
    
        global $connection;
        if(isset($_GET['delete'])){
        $del_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = $del_id";
        $del_cat = mysqli_query($connection,$query);
            
        $query = "DELETE FROM posts WHERE post_category_id=$del_id";
        $del_category_rel_post = mysqli_query($connection,$query);
        header("Location: categories.php");
        }
    

                                    
                                
}

function delete_posts(){  ///Delete posts
    
      global $connection;
      $del_id = $_GET['delete'];
      $query = "DELETE FROM posts WHERE post_id = $del_id";
      $del_post = mysqli_query($connection, $query);
      header("Location: posts.php");
}


function bulk_post_options(){    //Bulk Options in Post Page on Select Option
        global $connection;
        foreach($_POST['checkBoxArray'] as $checkBoxValue){
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options)
        {
            case 'Draft':
                $query = "UPDATE posts SET post_status ='Draft' WHERE post_id ={$checkBoxValue}";
                $bulk_draft = mysqli_query($connection, $query);
                confirm_query($bulk_draft);
 
                break;
                
            case 'Publish':
                $query = "UPDATE posts SET post_status ='Publish' WHERE post_id ={$checkBoxValue}";
                $bulk_publish = mysqli_query($connection, $query);
                confirm_query($bulk_publish);
    
                break;
                
            case 'Delete':
                $query = "DELETE FROM posts WHERE post_id ={$checkBoxValue}";
                $bulk_delete = mysqli_query($connection, $query);
                confirm_query($bulk_delete);           
            default:
                break;
        }
    }
}

function delete_users(){
    global $connection;
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = $user_id";
    $delete_user = mysqli_query($connection,$query);
    confirm_query($delete_user);
    header("Location: users.php");
}
function change_to_subscriber(){
    global $connection;
    $user_id = $_GET['change_to_subscriber'];
    $query = "UPDATE users SET user_role ='Subscriber' WHERE user_id = $user_id";
    $change_to_subscriber = mysqli_query($connection,$query);
    confirm_query($change_to_subscriber);
    header("Location: users.php");
}

function change_to_admin(){
    
    global $connection;
    $user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role ='Admin' WHERE user_id = $user_id";
    $change_to_admin = mysqli_query($connection,$query);
    confirm_query($change_to_admin);
    header("Location: users.php");
}

function approve_user(){
    
    global $connection;
    $user_id = $_GET['approve_user'];
    $query = "UPDATE users SET approved = 1 WHERE user_id = $user_id";
    $change_to_admin = mysqli_query($connection,$query);
    confirm_query($change_to_admin);
    header("Location: users.php");
}

function disapprove_user(){
    
    global $connection;
    $user_id = $_GET['disapprove_user'];
    $query = "UPDATE users SET approved = 0 WHERE user_id = $user_id";
    $change_to_admin = mysqli_query($connection,$query);
    confirm_query($change_to_admin);
    header("Location: users.php");
}

function lock_user(){
    
    global $connection;
    $user_id = $_GET['lock_user'];
    $query = "UPDATE users SET locked = 1 WHERE user_id = $user_id";
    $change_to_admin = mysqli_query($connection,$query);
    confirm_query($change_to_admin);
    header("Location: users.php");
}

function unlock_user(){
    
    global $connection;
    $user_id = $_GET['unlock_user'];
    $query = "UPDATE users SET locked = 0 WHERE user_id = $user_id";
    $change_to_admin = mysqli_query($connection,$query);
    confirm_query($change_to_admin);
    header("Location: users.php");
}

function comment_unapprove(){
    global $connection;
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status ='Unapproved' WHERE comment_id = $comment_id";
    $unapprove_comment = mysqli_query($connection,$query);
    confirm_query($unapprove_comment);
    header("Location: comment.php");
}
function comment_approve(){
    global $connection;
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status ='Approved' WHERE comment_id = $comment_id";
    $approve_comment = mysqli_query($connection,$query);
    confirm_query($approve_comment);
    header("Location: comment.php");
}

function comment_delete(){
    global $connection;
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = $comment_id";
    $delete_comment = mysqli_query($connection,$query);
    confirm_query($delete_comment);
    header("Location: comment.php");
}

?>