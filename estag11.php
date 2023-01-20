<?php

$curl = curl_init();

curl_setopt_array($curl, [

  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case/63c533cb565f40f56",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "GET",

  CURLOPT_POSTFIELDS => "",

  CURLOPT_HTTPHEADER => [
    
    "X-Api-Key: 4551D74F0502A6409445E49961896B49"

  ], 

]);

// Desactiva o certificado SSL

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

if ($err) {

  echo "cURL Error #:" . $err;

} else {

  //$xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);

  //echo $response;

 //echo "-------------------------------------------------------------------------------------------------------------------";

 //$json = json_encode($response);

  //$json = '(name)';

  $array = json_decode($response,true);

  echo $array["id"];


}
