

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Topology View</title>
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
  <h2 style="border:2px solid black;">MoniterME | Topology View</h2>
  <h3>184.102.100.1</h3>
   <?php 
    if (isset($_POST['add_remote'])){
      echo '<form action="" method="POST" style="border:2px solid white;background-color:black;width:1000px;color:white;padding:10px;"><br>
        add Ip or Domain name:<input type="text" name="enter_remote_addr" style="border:2px solid white;padding:3px;">
        port :<input type="number" name="port_number" style="border:2px solid white;padding:3px;">
        
        <input type="submit" name="rest" value="Reset" style="background-color:white;border:1px solid white;width:100px;height:25px;"><br><br>
      </form>' ;

    }else {
      echo "error";
    }

   ?>
  <form action="" method="POST">
    <input type="submit" value="ADD" name="add_remote" style="background-color:black;border:1px solid black;width:200px;height:40px;color:white;">
  
  </form>
  
</div>

     
</body>
</html> 
