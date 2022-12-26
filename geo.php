<pre>
<?php

$settings = [
  "apiKey" => "c91f7bf029004329a45170be13533f92",
  "ip" => "$my_ip",
  "lang" => "en",
  "fields" => "*"
];
 
// (B) INIT CURL + OPTIONS
$ch = curl_init();
$url = "https://api.ipgeolocation.io/ipgeo?";
foreach ($settings as $k=>$v) { $url .= urlencode($k)."=".urlencode($v)."&"; }
$url = substr($url, 0, -1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
// (C) CURL FETCH
$result = curl_exec($ch);
if (curl_errno($ch)) {
  // (C1) CURL FETCH ERROR
  echo curl_error($ch);
} else {
  // (C2) CURL FETCH OK
  $info = curl_getinfo($ch);
  $result = json_decode($result, 1);
  //print_r($result); // GEO IP INFORMATION
  echo "IP:" . $result['ip']."<br>";
  echo "Continent code : " .$result['continent_code']."<br>";
  echo "Continent name: " . $result['continent_name']."<br>";
  echo "Country code 1 : ".$result['country_code2']."<br>";
  echo "Country code 2 : ".$result['country_code3']."<br>";
  echo "Country Name : ".$result['country_name']."<br>";
  echo $result['state_prov']."<br>";
  echo $result['district']."<br>";
  echo $result['city']."<br>";
  echo $result['zipcode']."<br>";
  echo "Latitude : ". $result['latitude']."<br>";
  echo "Longitute :" . $result['longitude']."<br>";
  echo $result['isp']."<br>";

  //print_r($info); // MORE INFORMATION ON THE CURL CALL
}
curl_close($ch);
?>
</pre>