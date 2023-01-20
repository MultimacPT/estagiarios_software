<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case?select=number%2CtemInternet%2CaccountId%2CaccountName%2CcP%2Cstatusne%2Cstatus%2Cdescription%2CsalesOrderId%2CsalesOrderName%2Cpriority%2Cdatahorafecho%2CmodifiedById%2CmodifiedByName%2CmodifiedAt%2CcreatedAt%2CteamsIds%2CteamsNames&maxSize=25&offset=0&orderBy=number&order=desc",
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
  echo $response;
 echo "-------------------------------------------------------------------------------------------------------------------";
  $json = json_encode($response);
  $array = json_decode($json,TRUE);
  echo $array;
}
