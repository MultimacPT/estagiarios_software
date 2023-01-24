<?php

$b=$_GET['id'];
$curl = curl_init();
curl_setopt_array($curl, [
 CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case/".$b,
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "GET",
 CURLOPT_POSTFIELDS => "",
 CURLOPT_HTTPHEADER => ["X-Api-Key: 4551D74F0502A6409445E49961896B49"],]);
// Desactiva o certificado SSL
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, f
alse);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) { echo "cURL Error #:" . $err;
} else { $array = json_decode($response,true);
 foreach($array as $key => $value) { 
 $a[$key] = $value;
 echo $key . " => " . $value . "<br>";
 }
}