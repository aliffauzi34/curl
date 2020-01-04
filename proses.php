<?php
$uid = $_POST['uid'];
$tok = $_POST['token'];
$pkt = $_POST['kuota'];
$ch = curl_init();

$headers = array(
    'accept: application/json, text/plain, */*',
    'version:undefined',
    'authorization: Bearer '. $tok ,
    'content-type:application/json',
    'Host:api.domain.id',
    'Connection:Keep-Alive',
    'Accept-Encoding:gzip',
    'User-Agent:okhttp/3.12.1',
);


curl_setopt_array($ch, array(
  CURLOPT_URL => "https://api.domain.id/api/order/$uid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CONNECTTIMEOUT => 20,
  CURLOPT_CUSTOMREQUEST => "POST",  
  CURLOPT_POST => true,                                                                   
  CURLOPT_POSTFIELDS => "array('data' => order_detail, array('0' => plan_id, $pkt););",
  CURLOPT_RETURNTRANSFER => true,     
  CURLOPT_HTTPHEADER => $headers,

));

$response = curl_exec($ch);
$err = curl_error($ch);

curl_close($ch);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$response = json_decode($response,TRUE);
echo "<pre>";
print_r($response);
echo "</pre>";
}
?>      
