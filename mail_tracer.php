<?php

if (isset($_POST['email'])){
  if (!empty($_POST['email'])){
    $text = $_POST['email'];
    $out;
    exec("cat mail.txt",$out);

    $open_file = fopen("mail.txt", "w");
    fwrite($open_file,$text);
    fclose($open_file);
  }
}


 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mail Tracer </title>
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
  <h2 style="border:2px solid black;">MoniterME | Trace your Mail</h2>
  <pre>
  <form action="" method="POST" style="border:2px solid black;">
    <p style="padding:5px;margin:0px 0px 1px 10px;background-color:black;color:white;width:595px;">Enter email header :</p> <textarea name = "email" style="width:600px;height:200px;border:2px solid black;"></textarea>
    <input type="submit" value="ANALYZE" style="background-color:black;color:white;border:2px solid black;padding:10px;margin:5px;">
  </form>
</pre>
<!-- mail header details -->
  
    <div id="mail_content" style="width:700px;font-size:15px;background-color:black;color:white;padding:10px;float:right;">
        <h3 style="background-color:white;color:black;padding:5px;">Header details</h3>
        <?php 
        exec("cat mail.txt",$out);
       for($x=0;$x<50;$x++){
        echo $out[$x]."<br>";
       }

    ?>
    </div>
 <!-- get whois Data -->
 <pre style = "border:2px solid black;width:700px;padding:5px;">
 <div id="information" style="position:relative;">
   <h3 style="border:1px solid black;padding:5px;width:400px;background-color:black;color:white;">Check WHOIS data</h3> 
      <form action="" method="POST" style="border:1px solid black;">
          Copy and paste Recieved Ip : <input type="text" name="data" style="border:2px solid black;"> <input type="submit" value="Get" style="border:2px solid black;"> 
      </form>
      <?php 
        if (isset($_POST['data'])){
          if (!empty($_POST['data'])){

            $get_dig = $_POST['data'];
            $result = dns_get_record($get_dig);
            //print_r($result); 
            echo "Domain :" . $result[0]['host'];
            echo "<br>";
            echo "IP : " .$result[1]['ip'];
             $my_ip = $result[1]['ip'];

            $domainname =$get_dig;
            $server = "whois.crsnic.net";
            $port=43;
 
                if(($whoisinfo = fsockopen($server,$port)) == true)
                    {
                        $output = "";
                        fputs($whoisinfo,"$domainname\r\n");
                        while(!feof($whoisinfo)) 
                        $output .= fgets($whoisinfo,128); 
                        fclose($whoisinfo);
                    }
                    echo "<pre>" . $output . "</pre>";
          }
        }

      ?>
    </div>
  </pre>
      <div id="location">
        <h3 style="border:1px solid black;padding:5px;width:400px;background-color:black;color:white;">Location :</h3> 
        <?php
        //include('geo.php');

        ?>
      </div>
 </div>


  </div>

</body>
</html> 
