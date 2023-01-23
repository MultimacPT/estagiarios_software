<?php


//header("Location: estag12.php");

$ID=$_GET['id']; 



$curl = curl_init();

curl_setopt_array($curl, [

  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case/".$ID,

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

  //$response = json_encode($response);
  $array = json_decode($response,true);
}

/*$i = 0;

foreach ($array as $key => $value) {
  //$a[$key] = $value;
  if (!is_string($key)) {
    $key = json_encode($key);
  }
  if (!is_string($value)) {
    $value = json_encode($value);
  }
  if ($value == "" or $value == "null" or empty($value) == true or $value == "[]") {
    $value = "0";
    $T1[$i] = $key;
    $T2[$i] = $value;
    $i += 1;
  } else {
    $T1[$i] = $key;
    $T2[$i] = $value;
    $i += 1;
  }
}*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


</head>

<body>

<div data-role="header" data-position="fixed"><h1>Ticket information</h1></div>
<div>
<a href="estag12.php" class="ui-btn">Voltar</a>
</div>
<div data-role="collapsible">
  <h3><?php echo $ID ?></h3>
<table data-role="table" data-mode="reflow" class="ui-responsive">
                <thead>
                  <tr>
                  <th data-priority="1">Key</th>
                  <th data-priority="2">Value</th>
                  </tr>
                </thead>
              <tbody>
                <?php foreach($array as $key => $value) {
                        //$a[$key] = $value;
                        if (!is_string($key)) {
                          $key = json_encode($key);
                        }
                        if (!is_string($value)){
                          $value = json_encode($value);
                        }
                        if (!is_string($key) and !is_string($value)){
                          
                        }
                        if ($value == "" or $value == "null" or empty($value) == true or $value == "[]"){
                          $value = "0";
                          echo "<tr>" . "<th>" . $key . "</th>" . "<td>" . $value . "</td>" . "</tr>";
                        }
                        else {
                          echo "<tr>" . "<th>" . $key . "</th>" . "<td>" . $value . "</td>" . "</tr>";
                        }
            } ?>
            </tbody>
              </table>
</div>
</body>
</html>

