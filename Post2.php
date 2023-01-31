<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Assiduidade",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"63bbf8d572c41d87d\",\"assignedUserName\":\"dbarros\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"name\":\"nova_entrada\",\"tipo\":\"nova_entrada\",\"description\":\"nova_entrada\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json, text/javascript, */*; q=0.01",
    "Accept-Encoding: gzip, deflate, br",
    "Accept-Language: pt-PT,pt;q=0.8,en;q=0.5,en-US;q=0.3",
    "Content-Type: application/json",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
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
  echo $response;
}