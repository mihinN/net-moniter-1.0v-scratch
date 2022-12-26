<?php 
include('session.start.php');
include('db_connect.php');
if(isset($_SESSION['username'])){
  echo "set";
}else {
  header('Location:securebox.php');
}
 if ($db_connect = mysqli_connect($host,$username,$password)){
  if ($select_db = mysqli_select_db($db_connect,$database)){
    //echo "successfully connected to db ";
  }else {
    echo "not connected";
  }
 }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
  <a href="add_servers.php"><i class=""></i>check servers</a>
  <a href="n_structure.php"><i class=""></i>N.Structure</a>
  <a href="#clients"><i class=""></i>Topology view</a><hr>
  <a href="#contact"><i class=""></i> Contact</a>
  <a href="#userguids"><i class=""></i>Mannual</a><hr>
</div>

<div class="main">
  <h2 style="border:2px solid black;">MoniterMe 
    <a href="signout.php" style="font-size:15px;color:black;text-decoration:none;float:right;padding:5px;background-color:black;margin:1px;color:white;">[[signout]]</a>
    <a href="" style="font-size:15px;color:black;text-decoration:none;float:right;padding:5px;background-color:black;margin:1px;color:white;">[[<?php echo $_SESSION['username']?>]]</a>
    <a href="" style="font-size:15px;color:black;text-decoration:none;float:right;padding:5px;background-color:black;margin:1px;color:white;">[[<?php system('uptime');?>]]</a>
    <a href="" style="font-size:15px;color:black;text-decoration:none;float:right;padding:5px;background-color:black;margin:1px;color:white;">[[Alerts]]</a>
    <a href="" style="font-size:15px;color:black;text-decoration:none;float:right;padding:5px;background-color:black;margin:1px;color:white;">[[Warnings]]</a>

  </h2>
  <form action="dash-board.php" method="POST">
    <h4>Default IP Addr:<pre style="border:2px solid black;background-color: white;color:white;"><?php exec('ip route | grep "default" | cut -d " " -f 3',$out);print_r(":".'<a href="">'.$out[0]."</a>"); ?></pre></h4>
    <!-- network moniter area -->

     <label for="cars" style="background-color:black;color:white ;padding:10px;">Filter protocol :</label>
      <select name="net_traffic" id="traffic_types" style="background-color:white;color:black;border:2px solid black;height:30px;text-align:center;padding:5px;">
      <option value="tcp">TCP</option>
      <option value="udp">UDP</option>
      <option value="ipv4">IPv4</option>
      <option value="ipv6">IPv6</option>
      <option value="icmp">ICMP</option>
      <option value="all">All</option>
  </select>
    <!-- END OF THE NETWORK MONITER AREA -->
  <input type="submit" value="Analyze Network" name="analyze_b "style="background-color:black;color:white;height:50px;width: 120px;border:1px solid black;">
  <pre>
        <?php 
       if (isset($_POST['net_traffic'])){

       $network_traffic = $_POST['net_traffic'];
         if ($network_traffic == 'tcp'){
          echo "<br>".shell_exec(' netstat -at')."<br>";
          echo '<h3 style="border:2px solid black;">'."statics:".'</h3>';
          echo '<textarea rows="20" cols="70" style="border:2px solid black;">'.shell_exec('netstat -st').'</textarea>' ; 
         }elseif($network_traffic == 'udp'){
          echo "<br>".shell_exec(' netstat -au');
          echo '<h3 style="border:2px solid black;">'."statics:".'</h3>';
          echo '<textarea rows="20" cols="70" readonly style="border:2px solid black;">'.shell_exec('netstat -su').'</textarea>' ; 
         }elseif ($network_traffic == 'ipv4') {
            echo "<br>".shell_exec(' netstat -lp');
         }elseif ($network_traffic == 'ipv6') {
           echo 'ipv6';
         }elseif ($network_traffic == 'icmp') {
           echo 'icmp';
         }elseif ($network_traffic == 'all') {
           echo 'all traffic';
         }else{
          echo 'tcp.. standard ';
         }
          }else {
            echo 'not set';
          }
        ?>
      </pre>
       <!-- source and Destination Details -->
<pre>
<h3 style="border:2px solid black;padding:5px;">Source and Destination Details</h3>
    <table style="border:2px solid black;padding:10px;">
  <tr>
    <th style="border:1px solid black;">Source Ip</th>
    <th style="border:1px solid black;">Source Port</th>
    <th style="border:1px solid black;">Destination Ip</th>
    <th style="border:1px solid black;">Destination Port</th>
  </tr>
  <tr style="background-color:black;color:white;">
    
    <td style="padding:5px 5px 5px 0px;border:1px solid black;"><pre><?php echo shell_exec('cat log.txt | grep "|-Source IP" ');?></pre></td>
    <td style="padding:5px 5px 5px 0px;border:1px solid black;"><pre><?php echo shell_exec('cat log.txt | grep "Source Port"');?></pre></td>
    <td style="padding:5px 5px 5px 0px;border:1px solid black;"><pre><?php echo shell_exec('cat log.txt | grep "Destination IP"| tr -d ""');?></pre></td>
    <td style="padding:5px 5px 5px 0px;border:1px solid black;"><pre><?php echo shell_exec('cat log.txt | grep "Destination Port"| tr -d ""');?></pre></td>
  </tr>
</table> 
</pre>
        <!-- END of the source and Destination Details -->
        <!-- Server list start-->
<pre>
<h3 style="border:2px solid black;padding:5px;">Server List <a href ="add_server_more.php" style="text-decoration:none;background-color:black;color:white;padding:3px;margin:2px;">ADD NEW +</a></h3>
      <?php 
        $username = $_SESSION['username'];
        $query = "SELECT * FROM servers WHERE `username`='$username'";
        if($query_run = mysqli_query($db_connect,$query)){
          while($getting_data = mysqli_fetch_assoc($query_run)){
              echo "<li>". $getting_data['address'] ."</li>". "<br><br>";
        }
        }else {
              echo "error";
        }

?>
<a href = "" style="text-decoration:none;background-color:black;width:200px;color:white;padding:5px;border:1px solid black;">Visit server</a>
</pre>
<!-- End of the Server list -->
<!-- hardware Details Enter -->
<pre>
  <h3 style="border:2px solid black;padding:5px;">Hardware Details</h3>
    <?php system("free -m",$out); print_r($out);?>
</pre>
  <!-- end of the hardware Details -->
</div>

     
</body>
</html> 
