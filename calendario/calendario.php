<?php
$aaa=" 
curl 'https://mx.multimac.pt/mxv5/api/v1/PeriodoFerias?select=assignedUserId%2CassignedUserName%2CferiasId%2CferiasName%2CdateStart%2CdateStartDate%2CdateEnd%2CdateEndDate%2Cdiasuteis%2Cmeiodia%2CaprovacaoChefia%2CaprovadoporChefe%2CaprovChefiaEm%2Caprovadirecao%2CaprovadoporDiretor%2CaprovDirEm%2CconferidoDAF%2CcreatedById%2CcreatedByName&maxSize=25&offset=0&orderBy=assignedUser&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=3' \
-H 'Accept: application/json, text/javascript, */*; q=0.01' \
-H 'Accept-Language: pt-PT,pt;q=0.9,en-US;q=0.8,en;q=0.7,es;q=0.6,it;q=0.5' \
-H 'Authorization: Basic amNhdGl0YTo2ZWM5YmNlNmFhOWRkZjEyNDIxMjI3MmE5MzlhOTg4Yw==' \
-H 'Connection: keep-alive' \
-H 'Cookie: _ga=GA1.1.1181704117.1673259127; _ga_BF2RH76ZFH=GS1.1.1674812968.2.0.1674812969.0.0.0; auth-token-secret=0457cc1463d3d1af96590814f971be7c; auth-username=jcatita; auth-token=6ec9bce6aa9ddf124212272a939a988c' \
-H 'Espo-Authorization: amNhdGl0YTo2ZWM5YmNlNmFhOWRkZjEyNDIxMjI3MmE5MzlhOTg4Yw==' \
-H 'Espo-Authorization-By-Token: true' \
-H 'Referer: https://mx.multimac.pt/mxv5/' \
-H 'Sec-Fetch-Dest: empty' \
-H 'Sec-Fetch-Mode: cors' \
-H 'Sec-Fetch-Site: same-origin' \
-H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36' \
-H 'X-Requested-With: XMLHttpRequest' \
-H 'sec-ch-ua: \"Not_A Brand\";v=\"99\", \"Google Chrome\";v=\"109\", \"Chromium\";v=\"109\"' \
-H 'sec-ch-ua-mobile: ?0' \
-H 'sec-ch-ua-platform: \"Windows\"' \
--compressed
";
//header("Location: estag12.php");
$ID="639df22a8d7e751b3";
$ID="3";
$curlUrl="https://mx.multimac.pt/mxv5/api/v1/PeriodoFerias?select=assignedUserId%2CassignedUserName%2CferiasId%2CferiasName%2CdateStart%2CdateStartDate%2CdateEnd%2CdateEndDate%2Cdiasuteis%2Cmeiodia%2CaprovacaoChefia%2CaprovadoporChefe%2CaprovChefiaEm%2Caprovadirecao%2CaprovadoporDiretor%2CaprovDirEm%2CconferidoDAF%2CcreatedById%2CcreatedByName&maxSize=25&offset=0&orderBy=assignedUser&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $curlUrl.$ID,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => ["X-Api-Key: 4551D74F0502A6409445E49961896B49"],
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



$response = json_encode($response);

  $array = json_decode($response, true);

}

//echo $array;

$out=json_decode($array, true);

/*
echo $out['total'];
echo "<br><br>";
echo $out['list'][0]['id'];
echo "<br><br>";
echo $out['list'][1]['id'];
echo "<br><br>";*/
$dados="";

foreach($out['list'] as $v){
    echo $v['id'], $v['assignedUserName'],"<br>";
    $dados = $dados."
    {
        id: 1,
        name: '".$v['assignedUserName']."',
        startDate: '".substr($v['dateStart'],0,10)."',
        endDate: '".substr($v['dateEnd'],0,10)."',
        customClass: 'greenClass',
        title: 'Title 1'
    },";
}
$name="";
if ($name==""){
    $name = $v['assignedUserName'];
}
else{
    $name = $name . ',' . $v['assignedUserName'];
}

//echo $dados;
//print_r($out);
?>
