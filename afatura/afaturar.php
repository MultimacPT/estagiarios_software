<?php 

//$ID=$_GET['id'];


$curl = curl_init();

curl_setopt_array($curl, [

  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Afaturar",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "GET",

  CURLOPT_POSTFIELDS => "",

  CURLOPT_HTTPHEADER => ["x-api-key: 4551D74F0502A6409445E49961896B49"],

]);



// Desactiva o certificado SSL

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

//$response = json_encode($response);


if ($err) {

  echo "cURL Error #:" . $err;

} else {

  //$response = json_encode($response);
  $array = json_decode($response,true);
}

$list = json_encode($array['list']);
$list = json_decode($list,true);
//$ID = $list['id'];
$i = 0;
//--------------------------------------------FOREACH FOR EACH ID---------------------------------------------------
foreach ($list as $item) {
  $ID = $item['id'];
  $curlID = curl_init();

curl_setopt_array($curlID, [

  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Afaturar/".$ID,

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "GET",

  CURLOPT_POSTFIELDS => "",

  CURLOPT_HTTPHEADER => ["x-api-key: 4551D74F0502A6409445E49961896B49"],

]);



// Desactiva o certificado SSL

curl_setopt($curlID, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curlID, CURLOPT_SSL_VERIFYPEER, false);

$responseID = curl_exec($curlID);

$errID = curl_error($curlID);

curl_close($curlID);

//$response = json_encode($response);


if ($errID) {

  echo "cURL Error #:" . $errID;

} else {

  //$response = json_encode($response);
  $arrayID = json_decode($responseID,true);
}
  $ID_display[$i] = $arrayID['id'];
  $fID[$i] = $arrayID;
  $i += 1;
//------------------------------------------------------END OF FOREACH----------------------------------------------
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<style>
  table{
    color:white;
  }
  #faturaI{
    padding-left: 10%;
    padding-right: 10%;
  }
</style>

                <?php for ($x = 0; $x < $i; $x++){

                  echo "<div data-role='collapsible' data-mini='true' id='faturaI' data-theme='b' data-content-theme='b'>";
                  echo "<h3>" . $ID_display[$x] . "</h3>";
                  echo "<table data-role='table' data-mode='reflow' id='table' class='ui-responsive' >";
                  echo "<thead>" . "<tr>" . "<th data-priority='1'>Key</th>" . "<th data-priority='2'>Value</th>" . "</tr>"."</thead>"."<tbody>";

                  foreach ($fID[$x] as $key => $value) {
                    //$a[$key] = $value;
                    if (!is_string($key)) {
                      $key = json_encode($key);
                    }
                    if (!is_string($value)) {
                      $value = json_encode($value);
                    }
                    if (!is_string($key) and !is_string($value)) {

                    }
                    if ($value == "" or $value == "null" or empty($value) == true or $value == "[]") {
                      $value = "0";
                      echo "<tr>" . "<th>" . $key . "</th>" . "<td>" . $value . "</td>" . "</tr>";
                    } else {
                      echo "<tr>" . "<th>" . $key . "</th>" . "<td>" . $value . "</td>" . "</tr>";
                    }
                  }
                  echo "</tbody>" . "</table>"."</div>";
            } ?>

</body>
</html>