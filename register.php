<?php 
include 'db_connect.php';

 if ($database_connect = mysqli_connect($host,$username,$password)){
 	if($select_db = mysqli_select_db($database_connect,$database)){
       			echo "connecting to the db successfully \n<br>";

       if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_addr']) && isset($_POST['user_password']) && isset($_POST['re_password'])){
       	    $first_name = $_POST['first_name'];
       	    $last_name =$_POST['last_name'];
       	    $email_address =$_POST['email_addr'];
       	    $password =md5($_POST['user_password']);
       	    $re_password=md5($_POST['re_password']);
       	       if (!empty($first_name) && !empty($last_name) && !empty($email_address) && !empty($password) && !empty($re_password)){
       	       	 if ($password == $re_password){
       	       	 	$insert_query = "INSERT INTO securebox_users(first_name,last_name,email,password) VALUES('$first_name' , '$last_name' ,'$email_address','$password')";
       	       	 	$query_run =mysqli_query($database_connect,$insert_query); 
       	       	 	  if ($query_run == true){
       	       	 	  	//echo "successfully regstered";
       	       	 	  	header("Location:securebox.php");
       	       	 	  	exit;
       	       	 	  }else {
       	       	 	  	echo "errorrr";
       	       	 	  }

       	       	 }else {
       	       	 	echo "passwords are not simmilar";
       	       	 }

       	       }else {
       	       	 echo "fill all blanks";
       	       }
       }else {
       	echo 'not set';
       }
   

 	}else {
 		echo "connecting error in second statement ";
 	}
 }else {
 	echo "connecting error in 1";
 }


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoniterMe | Register</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet" > 
</head>
<body>
<div id="admin_area" style="text-align:center;margin:100px 100px 100px 100px;border:2px solid black;padding:100px;font-family: 'Source Code Pro', monospace;">
  <h2 style="border:2px solid black; text-align:center;">SECUREBOX</h2>
  <img src="https://artistmarketingsalon.files.wordpress.com/2015/07/bloggiphy.gif" width="400" height="400">
           <!-- form section -->
		  <form action="register.php" method="POST" style="padding:10px 10px 10px 10px;font-family: 'Source Code Pro', monospace;">

		    First Name <br><input type="text" name="first_name" id="first_name" style="margin:10px;padding:5px;text-align: center;"><br>

		    Last Name<br><input type="text" name="last_name" style="margin:10px;padding:5px;text-align: center;"><br>

		    email<br><input type="email" name="email_addr" style="margin:10px;padding:5px;text-align: center;"><br>
		    Password<br><input type="password" name="user_password" style="margin:10px;padding:5px;text-align: center;"><br>
		    Re-Enter password<br><input type="password" name="re_password" style="margin:10px;padding:5px;text-align: center;"><br><br>
            <input type="submit" value="Register" style="padding:10px;background-color:black;color:white;border:1px solid white;text-decoration:none;">
		  </form>
</div>
</body>
</html>