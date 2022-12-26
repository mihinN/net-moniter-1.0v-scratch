<?php 
include('session.start.php');
include('db_connect.php');
if ($db_connect = mysqli_connect($host,$username,$password)){
  if($select_db = mysqli_select_db($db_connect,$database)){
    //echo "connected to the db";
  }else {
    echo 'not connected';
  }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Servers</title>
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
  <h3>
    <pre>
    <?php 
    $session_id = $_SESSION['id'];
    $session_username = $_SESSION['username'];
    $query = "SELECT * from servers WHERE `user_id`='$session_id' && `username`='$session_username'";
    if ($query_run = mysqli_query($db_connect,$query)){
      //echo "successfully run the query" ."<br>";

        while($getting_assoc = mysqli_fetch_assoc($query_run)){
          //print_r($getting_assoc);
          echo "<pre style='border:2px solid black;padding:5px;'>";
          echo $ip_address = $getting_assoc['address'];
          echo "<br>";
          $ping = exec("ping -c 1 $ip_address",$out,$status);
            //print_r($out) ;
                if ($status == 0){
                    echo "<pre style='background-color:green;'>Online</pre>";
                          }else {
                            echo "<pre style='background-color:red;'>Offline</pre>";
                          }
        //echo $status;
        echo "<br>";
        echo "</pre>";
        }

        
    }else {
      echo "error";
    }

    ?>
  </pre>
  </h3>
  <form action="add_server_more.php" method="POST">

    <input type="submit" value="ADD +" name="add" style="background-color:black;border:1px solid black;height:40px;width:100px;color:white;">
  </form>

</div>

     
</body>
</html> 
