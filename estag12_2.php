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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/themes/formulario_themes.css" />
    <link rel="stylesheet" href="css/themes/formulario_themes.min.css" />
    <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link href="estag12.php" rel="import" />


</head>



<body>
<!--
<div data-role="panel" id="uInfo" data-position="left">
  <ul>
    ?php foreach($array as $key => $value){
      if($value == "true"){
        $value = "Sim";
      }
      if(empty($value) == true or $value == "0"){
        $value == "Null";
      }
      if ($key == "temInternet" or $key == "userAT" or $key == "passwordAT" or $key == "licenca" or $key == "cP" or $key == "accountName") {
        echo "<label>" . $key ." ==> " . $value . "</label>" . "<br>";
      }
    } ?>
  </ul>
</div>
<div data-role="panel" id="pInfo" data-position="left">
  <ul>
    ?php foreach($array as $key => $value){
      if($value == "true"){
        $value = "Sim";
      }
      if(empty($value) == true or $value == "0"){
        $value == "Null";
      }
      if ($key == "temInternet" or $key == "userAT" or $key == "passwordAT" or $key == "licenca" or $key == "cP") {
        echo "<label>" . $key ." ==> " . $value . "</label>" . "<br>";
      }
    } ?>
  </ul>
</div>
<div data-role="panel" id="pInfo" data-position="left"></div>
<div data-role="panel" id="lInfo" data-position="left"></div>
<div data-role="panel" id="tInfo" data-position="left"></div>

<div data-role="panel" id="select_panel" data-position="right">
<a href="#uInfo" class="ui-btn ui-btn-icon-left ui-icon-user" id="User">Personal information</a>
<a href="#pInfo" class="ui-btn ui-btn-icon-left ui-icon-phone" id="Phone">Contact information</a>
<a href="#lInfo" class="ui-btn ui-btn-icon-left ui-icon-location" id="Location">Location information</a>
<a href="#tInfo" class="ui-btn ui-btn-icon-left ui-icon-tag" id="Ticket">Ticket information</a>
</div>
  -->

<style>
  #arroz{
    width:80%;
    margin: auto;
  }
  #backBtn{
    margin-left: 80%;
    width: 50px;
    height: 5px;
    text-align: center;
    padding-top: 3.5px;
    color: white;
    background-color: black;
  }
</style>


<div data-role="header" data-position="fixed" data-theme="b"><h1>Ticket information</h1></div>
<!--<a href="#select_panel" class="ui-btn ui-btn-inline">View-only settings</a> -->
<a href="estag12.php" data-transition="fade" class="ui-btn ui-btn-inline" id="backBtn">Voltar</a>
<div data-role="collapsible" data-mini="true" id="arroz">
  <h3><?php echo $ID ?></h3>
<table data-role="table" data-mode="reflow" id="table" class="ui-responsive">
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

