<?php 
if (isset($_POST['address']) && isset($_POST['range'])){
  if (!empty($_POST['address']) && isset($_POST['range'])){
    $address = $_POST['address'];
    $range = $_POST['range'];
    
     for($x;$x<=$range;$x++){
      echo $x;
     }
  }else {
    echo "empty fields";
  }
}else {
  //echo "not set";
}




?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Network Structure</title>
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
  <h2 style="border:2px solid black;">MoniterME | Network Structure</h2>
  <h3 style="border:2px solid black;background-color:black;color:white;">
    <img src="" width="80" height="80" style="padding:5px;">
    <form action="" method="POST">
      <pre>
      Enter Ip:<input type="text" name="address"style="background-color:white;width:200px;height:30px;border:1px solid white;margin:5px;">Range : <input type="number" name="range" style="background-color:white;width:200px;height:30px;border:1px solid white;margin:5px;">
      <input type="submit" value="Analyze the Network" name="analyze" style="background-color:white;width:200px;height:30px;border:1px solid white;">
    </pre>
    </form>
    <pre>
  </pre>
  </h3>

  
</div>

     
</body>
</html> 
