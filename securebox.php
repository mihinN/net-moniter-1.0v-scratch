 <?php
 include('db_connect.php');
 session_start();
 if($db_connect = mysqli_connect($host,$username,$password)){
  if($select_db = mysqli_select_db($db_connect,$database)){
        echo "successfully connecting to the db <br>";

      if(isset($_POST['username']) && isset($_POST['password']) ){
       if (empty($POST['username']) && empty($_POST['password'])){
        echo "empty";
       }else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = md5($_POST['password']);
        $query="SELECT `id` FROM `securebox_users` WHERE `email`='$username' && `password`='$password_hash'";
          if ($query_run = mysqli_query($db_connect,$query)){
            $_SESSION['username'] = $username ;
            echo "successfully run the query <br>";
            echo $number_of_rows = mysqli_num_rows( $query_run);
             if ($number_of_rows != 0){
                 $getting_user_id= mysqli_fetch_assoc($query_run);
                 $_SESSION['username'] =$username;
                 $_SESSION['id']=$getting_user_id['id'];

              header('Location:dash-board.php');
              
             }
          }else{
            echo "error";
          }
       }
     }

  }else{
    echo "error in selecting db";
  }
 }else {
  echo "connection failed";
 }
   ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>SecureBox</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="admin_area" style="background-color:black;text-align:center;margin:100px 100px 100px 100px;border:2px solid white;padding:100px;font-family: 'Source Code Pro', monospace;color:white;">
  <h2 style="border:2px solid white; text-align:center;">MoniterMe</h2>
  <img src="https://giffiles.alphacoders.com/360/36093.gif">

  <form action="" method="POST" style="padding:10px 10px 10px 10px;font-family: 'Source Code Pro', monospace;">

    User<br><input type="text" name="username" style="margin:10px;padding:5px;text-align: center;"><br>
    Password<br><input type="password" name="password" style="margin:10px;padding:5px;text-align: center;"><br>
    <input type="submit" value="LOGIN" style="padding:10px;background-color:black;color:white;border:1px solid white;">
    <a href="register.php" style="padding:10px;background-color:black;color:white;border:1px solid white;text-decoration:none;">Register</a>
  </form>
</div>
</body>
</html>