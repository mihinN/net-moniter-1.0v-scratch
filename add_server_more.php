<?php
include ('session.start.php');
 if (!isset($_SESSION['id'])  && isset($_SESSION['username'])){
   header('Location:securebox.php');
 }
 echo $_SESSION['id'];
include('db_connect.php');
 if($db_connect = mysqli_connect($host,$username,$password)){
  if ($db_select = mysqli_select_db($db_connect,$database)){
    if (isset($_POST['enter_address']) && isset($_POST['enter_port_number'])){
      echo "set all";
      if (!empty($_POST['enter_address']) && !empty($_POST['enter_port_number'])){
         $session_id = $_SESSION['id'];
         $username = $_SESSION['username'];
         $address = $_POST['enter_address'];
         $port_number = $_POST['enter_port_number'];
         $insert_query = "INSERT INTO servers(user_id,username,address,port) VALUES('$session_id' , '$username' ,'$address','$port_number')";
         $query_run = mysqli_query($db_connect , $insert_query);
           if ($query_run){
            echo "successfully added";
           }else {
            echo "Not added";
           }
         
      }else {
        echo "empty";
      }
    }else {
      echo "not set";
    }
  }else {
    echo "error";
  }
 }




 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Servers | Add More</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet"> 
<style>
body {font-family: 'Source Code Pro', monospace;padding: 5px;margin: 5px;}

.sidebar {
  height: 100%;
  width: 170px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  margin:10px 0px 6px 0px;
  padding: 0px 5px 0px 0px;
}

.sidebar a {
  padding:10px 10px 10px 10px;
  text-decoration: none;
  margin: 5px;
  border: 1px solid white;
  font-size: 20px;
  color: white;
  display: block;
}

.sidebar a:hover {
  color:black;
  background-color: white;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidebar" style="font-face">
  <a href="dash-board.php"><i class=""></i>Dashboard</a>
  <a href="dash-board.php"><i class=""></i>check servers</a>
  <a href="#services"><i class=""></i>N.Structure</a>
  <a href="#clients"><i class=""></i>Topology view</a>
  <a href="#contact"><i class=""></i> Contact</a>
</div>

<div class="main">
  <h2 style="border:2px solid black;">MoniterME | server availability</h2>
  <form action="" method="POST">
  	Enter address :<input type="text" name="enter_address">
  	Enter Port Number :<input type="number" name="enter_port_number">
    <input type="submit" value="add" name="add">
  </form>

</div>

     
</body>
</html> 
