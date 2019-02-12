<?php 
if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] == "Admin"){
?>
<?php include "delete_modal.php"; ?>
<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Delete User</th>
                                    <th>Approve User</th>
                                    <th>Lock</th>
                                    <th>To Subscriber</th>
                                    <th>Edit User</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM users ORDER BY user_id DESC";
                                $get_users = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_users)){
                                    
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_password = $row['user_password'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                                    $user_image = $row['user_image'];
                                    $user_approved = $row['approved'];
                                    $user_locked = $row['locked'];
                                    $user_role = $row['user_role'];
                                    
                                    
                                    echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td><img width='100' src='./images/$user_image'></td>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_firstname</td>";
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";
                                    echo "<td><a href='./users.php?delete=$user_id' class='btn btn-danger'>Delete</a></td>";
                                    if ($user_approved == 0) {
                                         echo "<td><a class='btn btn-success' href='users.php?approve_user=$user_id'>Approve</a></td>";
                                    }elseif ($user_approved == 1) {
                                        echo "<td><a class='btn btn-success' href='users.php?disapprove_user=$user_id'>Disapprove</a></td>";
                                    }
                                   
                                   if ($user_locked == 0) {
                                         echo "<td><a class='btn btn-success' href='users.php?lock_user=$user_id'>Lock</a></td>";
                                    }elseif ($user_locked == 1) {
                                        echo "<td><a class='btn btn-success' href='users.php?unlock_user=$user_id'>Unlock</a></td>";
                                    }
                                    echo "<td><a class='btn btn-warning' href='users.php?change_to_subscriber=$user_id'>Subscriber</a></td>";
                                    echo "<td><a class='btn btn-primary' href='./users.php?source=edit_user&edit_id=$user_id'>Edit</a></td>";
                                    echo "</tr>";
              
                                }
                                ?>
                                
                                <?php
                                if(isset($_GET['approve_user'])){
                                    
                                    approve_user();
                                }


                                if(isset($_GET['disapprove_user'])){
                                    
                                    disapprove_user();
                                }

                                if(isset($_GET['lock_user'])){
                                    
                                    lock_user();
                                }

                                if(isset($_GET['unlock_user'])){
                                    
                                    unlock_user();
                                }
                                
                                if(isset($_GET['change_to_subscriber'])){
                                    change_to_subscriber();
                                }
                                
                                if(isset($_GET['delete'])){
                                    
                                    delete_users();
                                }
                                
                                ?> 
                                  </tbody>
                        </table>

<?php
}
}
else{
    header("Location: ../index.php");
}
?>