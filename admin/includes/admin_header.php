<?php ob_start(); ?>
<?php session_start(); ?>
<?php include"../includes/database.php" ?>
<?php include "functions.php"; ?>


<?php  
if(!isset($_SESSION['user_role'])){
    
        header("Location: ../index.php");
        
}
else{
    if($_SESSION['user_role'] !== "Admin"){
        
        header("Location: ../index.php");
        
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
	
    <!-- Wisiwig Editer -->
   <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->

    <script src="js/jquery.tinymce.min.js"></script>
  	<script src="js/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
  
    <script src="js/jquery.js"></script>


</head>

<body>
