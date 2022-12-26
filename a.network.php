<?php 

  if (isset($_POST['analyze'])){
    echo '<form action="" method="POST">
    <pre>
         Enter ip:<input type="text" name="address" placeholder="enter default ip address" style="border:1px solid white;background-color:white;width:300px;height:30px;margin:5px;"> Range :<input type="number" name="range" style="border:1px solid white;background-color:white;width:300px;height:30px;margin:5px;"><br>
         <input type="submit" value="Reset" style="border:1px solid white;background-color:white;width:100px;height:30px;margin:5px;">
    </pre>
    </form>';
    if (isset($_POST['address']) && isset($_POST['range'])){
        $address = $_POST['address'];
        $range =$_POST['range'];
        echo $address;
    }else {
        //echo "not set";
    }
  }

?>