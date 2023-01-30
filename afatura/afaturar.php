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
$z = 3;
$x = 0;
$showMore = "true";// = true;
$dataS;
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

if(isset($_POST['btn1'])){
  //$num = "92849";

  $curlS = curl_init();

  curl_setopt_array($curlS, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Afaturar",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"63bbf945cfbab4a54\",\"assignedUserName\":\"rsebastiao\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"itnumero\":9999,\"codigo\":20000,\"modelo\":\"MX\",\"serie\":\"Mx2\",\"intervencao\":10,\"intervencaoCurrency\":\"EUR\",\"pecas\":20,\"pecasCurrency\":\"EUR\",\"deslocacao\":30,\"deslocacaoCurrency\":\"EUR\",\"consumiveis\":40,\"consumiveisCurrency\":\"EUR\",\"total\":100,\"totalCurrency\":\"EUR\",\"description\":\"Teste de api\"}",
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
  curl_setopt($curlS, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curlS, CURLOPT_SSL_VERIFYPEER, false);
  $responseS = curl_exec($curlS);
  $errS = curl_error($curlS);

  curl_close($curlS);

  if ($errS) {
    echo "cURL Error #:" . $errS;
  } else {
    echo $responseS;
  }
}

if(isset($_POST['btn2'])){
  //$num = "92849";

  $curlE = curl_init();


  curl_setopt_array($curlE, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Afaturar/63d7a1f71c432d039",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "PATCH",
    CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"63bbf945cfbab4a54\",\"assignedUserName\":\"rsebastiao\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"itnumero\":1977,\"codigo\":20000,\"modelo\":\"MX\",\"serie\":\"Mx2\",\"intervencao\":10,\"intervencaoCurrency\":\"EUR\",\"pecas\":20,\"pecasCurrency\":\"EUR\",\"deslocacao\":30,\"deslocacaoCurrency\":\"EUR\",\"consumiveis\":40,\"consumiveisCurrency\":\"EUR\",\"total\":100,\"totalCurrency\":\"EUR\",\"description\":\"Teste de api\"}",
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
  curl_setopt($curlE, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curlE, CURLOPT_SSL_VERIFYPEER, false);
  $responseE = curl_exec($curlE);
  $errE = curl_error($curlE);

  curl_close($curlE);

  if ($errE) {
    echo "cURL Error #:" . $errE;
  } else {
    echo $responseE;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="themes/formulario_themes.css" />
    <link rel="stylesheet" href="themes/formulario_themes.min.css" />
    <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
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
  #header{
    text-align: right;
  }
  #image{
    position: absolute;
    left: 0px;
    top: 0px;
  }
  .ui-icon-myicon:after {
	background-image: url("mxLogo.png");
  }
</style>

                <div data-role="header" id="header" data-position="fixed">
                <form method="post">
                  <button href="#mxmainpage" id="image" class="ui-btn ui-icon-myicon ui-btn-icon-notext ui-corner-all ui-shadow">MainMenu</a>
                  <button href="" class="ui-btn ui-corner-all ui-shadow">Menu</button>
                  <input  type="submit" name="btn2" value="Editar" />
                  <input  type="submit" name="btn1" value="Submeter" />
                </form>
                </div>

                <div>
                <?php
                //while($x < $i) {
                  ?>
                  <?php
                    if ($showMore == "true") {
                      //$z = 3;
                      for ($x; $x < $i; $x++) {
                        echo "<div data-role='collapsible' data-mini='true' id='faturaI' data-theme='b' data-content-theme='b'>";
                        echo "<h3>" . $ID_display[$x] . "</h3>";
                        echo "<table data-role='table' data-mode='reflow' id='table' class='ui-responsive' >";
                        echo "<thead>" . "<tr>" . "<th data-priority='1'>Key</th>" . "<th data-priority='2'>Value</th>" . "</tr>" . "</thead>" . "<tbody>";

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
                        echo "</tbody>" . "</table>" . "</div>";
                      }
                  $showMore = "false";
                    }
                    echo "<div id='showBtn'>" . "<form action='afaturar.php' method='post'>" . "<input type='hidden' name='show+' value='arroz'>" .
                      "<input type='submit' value='Mostrar mais' onclick='showDisappear()'>" . "</form>" . "</div>";
                    $showMore = $_GET;
                    ?>
                    <?php
                  
                 ?>
                 </div>

</body>
</html>