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
$idSelect;
$numclick = 0;
$numEdit = 0;
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

  $numIt = $_POST['itN'];
  $codg = $_POST['Cod'];
  $modelo = $_POST['Mod'];
  $serie = $_POST['Ser'];
  $inter = $_POST['Inter'];
  $desloc = $_POST['Desloc'];
  $pecas = $_POST['Pec'];
  $cons = $_POST['Cons'];
  $desc = $_POST['Desc'];
  $totalF = $desloc + $pecas + $cons + $inter;

  echo "<script type='javascript'>alert('Email enviado com Sucesso!');";
  echo "javascript:window.location='index.php';</script>";

  log($numIt);


  $curlS = curl_init();

  curl_setopt_array($curlS, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Afaturar",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"63bbf945cfbab4a54\",\"assignedUserName\":\"rsebastiao\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"itnumero\":".$numIt.",\"codigo\":". $codg .",\"modelo\":\"". $modelo ."\",\"serie\":\"". $serie ."\",\"intervencao\":". $inter .",\"intervencaoCurrency\":\"EUR\",\"pecas\":". $pecas .",\"pecasCurrency\":\"EUR\",\"deslocacao\":". $desloc .",\"deslocacaoCurrency\":\"EUR\",\"consumiveis\":". $cons .",\"consumiveisCurrency\":\"EUR\",\"total\":". $totalF .",\"totalCurrency\":\"EUR\",\"description\":\"". $desc ."\"}",
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
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Afaturar/".$idSelect,
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

//if(isset($_POST['getIdBtn'])){
//  $idSelect = $_POST['getIdBtn'];
//}




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


<script>
  
</script>

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
  #criarF{
    width: 90vw;
    height: 90vh;
  }
  #editarBtn{
    text-decoration: none;
  }
  .ui-block-a,.ui-block-b{
    padding-right: 10px;
    padding-left: 10px;
  }
  #Desc{
    overflow: hidden;
    height: 40px;
  }
  #DescDiv{
    padding-right: 10px;
    padding-left: 10px;
  }
  #descView{
    overflow: hidden;
    height: 40px;
  }
  ::placeholder{
    color: white !important;
    opacity: 1 !important;
  }
  #totalView{
    float: right;
  }
</style>
                <div data-role="header" id="header" data-position="fixed">
                <form>
                  <button href="#mxmainpage" id="image" class="ui-btn ui-icon-myicon ui-btn-icon-notext ui-corner-all ui-shadow">MainMenu</a>
                  <button href="" class="ui-btn ui-corner-all ui-shadow">Menu</button>
                  <a href="#criarF" data-prefetch data-position-to="window" data-rel="popup" id="criarBtn" class="ui-btn ui-corner-all ui-shadow">Criar</a>
                </form>
                </div>

                <div>
                <?php
                //while($x < $i) {
                  ?>
                  <?php
                    //if ($showMore == "true") {
                      //$z = 3;
                      for ($x; $x < 5; $x=$x) {
                        if(empty($ID_display[$x])){
                      break;
                        }
                        echo "<div data-role='collapsible' data-mini='true' id='faturaI' data-theme='b' data-content-theme='b'>";
                        echo "<h3>" . $ID_display[$x] . "</h3>";
                        //echo "<a href='#editarF' data-position-to='window' data-rel='popup'><input type='submit' name='getIdBtn' value='<?php $ID_display[$x]'></input></a>";
                        echo /*"<a href='#editarF' data-position-to='window' data-rel='popup' id='editarBtn'>*/"<form method='post' action='' data-prefetch>
                              <input type='hidden' name='editIdT' value='" . $ID_display[$x] . "'>
                              <input type='submit' name='getIdBtn' value='Editar' class='ui-btn ui-corner-all ui-shadow'></a></form>";
                        //echo "<table data-role='table' data-mode='reflow' id='table' class='ui-responsive' >";
                        //echo "<thead>" . "<tr>" . "<th data-priority='1'>Key</th>" . "<th data-priority='2'>Value</th>" . "</tr>" . "</thead>" . "<tbody>";
                    echo "<div class='ui-grid-b'>"; 

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
                            $value = "Sem informação";
                            //echo "<tr>" . "<th>" . $key . "</th>" . "<td>" . $value . "</td>" . "</tr>";
                          }
                          
                        }
                    $totalV = $fID[$x]['intervencao'] + $fID[$x]['deslocacao'] + $fID[$x]['pecas'] + $fID[$x]['consumiveis'];
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Itnumero:"."</label><input type='text' placeholder='".$fID[$x]['itnumero']."'disabled></div>";
                    echo "<div class='ui-block-b'><label>"."Codigo:"."</label><input type='text' placeholder='".$fID[$x]['codigo']."'disabled></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."modelo:"."</label><input type='text' placeholder='".$fID[$x]['modelo']."'disabled></div>";
                    echo "<div class='ui-block-b'><label>"."Serie:"."</label><input type='text' placeholder='".$fID[$x]['serie']."'disabled></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "Description"."</label><input type='text' name='descView' placeholder='".$fID[$x]['description']."'disabled></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Intervencao:"."</label><input type='text' placeholder='".$fID[$x]['intervencao']."'disabled></div>";
                    echo "<div class='ui-block-b'><label>"."Deslocacao:"."</label><input type='text' placeholder='".$fID[$x]['deslocacao']."'disabled></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Pecas:"."</label><input type='text' placeholder='".$fID[$x]['pecas']."'disabled></div>";
                    echo "<div class='ui-block-b'><label>"."Consumiveis:"."</label><input type='text' placeholder='".$fID[$x]['consumiveis']."'disabled></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a' id='totalView'><label>Total:</label><input type='text' placeholder='".$totalV."'disabled></div></div>";

                        //echo "</tbody>" . "</table>" . "</div>";
                        $x += 1;
                    echo "</div></div>";
                      }
                  //$showMore = "false";
                    //}
                    if(empty($ID_display[$x])){

                    } else {
                    echo "<div id='showBtn'>" . "<form action='' id='showMore' method='post' data-prefetch>" .
                      "<input type='submit' name='showMoreBtn0' value='Mostrar mais'>" . "</form>" . "</div>";
                  }
                    //$showMore = $_GET;
                    ?>
                    
                  </div>
                   
                 <div data-role="popup" data-history="false" id="criarF" class="ui-corner-all">
                  <form method="post" action="">
                    <div>
                      <h3>Create</h3>
                      <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="itN">ItNumero:</label>
                      <input type="text" name="itN"></div>
                      <div class="ui-block-b"><label for="Cod">Codigo:</label>
                      <input type="text" name="Cod"></div>
                    </div> 
                    <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="Mod">Modelo:</label>
                      <input type="text" name="Mod"></div>
                      <div class="ui-block-b"><label for="Ser">Serie:</label>
                      <input type="text" name="Ser"></div>
                    </div>
                    <div id="DescDiv">
                    <label for="Desc">Descrição</label>
                    <input type="text" name="Desc"></input>
                  </div><br><br>
                  <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="Inter">Intervencao:</label>
                      <input type="text" name="Inter"></div>
                      <div class="ui-block-b"><label for="Desloc">Deslocacao:</label>
                      <input type="text" name="Desloc"></div>
                    </div>
                    <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="Pec">Pecas:</label>
                      <input type="text" name="Pec"></div>
                      <div class="ui-block-b"><label for="Cons">Consumiveis:</label>
                      <input type="text" name="Cons"></div>
                    </div>
                    <input type="submit" name="btn1" value="Submeter" />
                   </div>
                  </form>
                  </div>


                      <script>
                        $('input[name="editIdT"]').on('click', function(){
                            $('#editarF').popup('open', {
                            x: 50,
                            y: 50,
                            });
                            });
                      </script>

                      <?php if(isset($_POST['getIdBtn'])){
                            $idSelect = $_POST['editIdT'];
                        echo "<h3>".$idSelect."</h3>";
                      }?>

                  <div data-role="popup" data-history="false" id="editarF" class="ui-corner-all">
                  <form method="post" action="">
                    <div>
                      <h3>Edit <?php echo $idSelect ?></h3>
                      <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="itNE">ItNumero:</label>
                      <input type="text" name="itNE"></div>
                      <div class="ui-block-b"><label for="CodE">Codigo:</label>
                      <input type="text" name="CodE"></div>
                    </div> 
                    <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="ModE">Modelo:</label>
                      <input type="text" name="ModE"></div>
                      <div class="ui-block-b"><label for="SerE">Serie:</label>
                      <input type="text" name="SerE"></div>
                    </div>
                    <div id="DescDiv">
                    <label for="DescE">Descrição</label>
                    <input type="text" name="DescE"></input>
                  </div><br><br>
                  <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="InterE">Intervencao:</label>
                      <input type="text" name="InterE"></div>
                      <div class="ui-block-b"><label for="DeslocE">Deslocacao:</label>
                      <input type="text" name="DeslocE"></div>
                    </div>
                    <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="PecE">Pecas:</label>
                      <input type="text" name="PecE"></div>
                      <div class="ui-block-b"><label for="ConsE">Consumiveis:</label>
                      <input type="text" name="ConsE"></div>
                    </div>
                    <input  type="submit" name="btn2" value="Editar"/>
                   </div>
                  </form>
                  </div>


                  <?php 

                  if(isset($_POST['showMoreBtn'.$numclick])){

                    if ($numclick > 0) {
                      echo "<style>" . "#showMore" . $numclick . "{ display: none;}" . "</style>";
                    }
                    else{
                      echo "<style>" . "#showMore" . "{ display: none;}" . "</style>";
                    }
                    //$numclick += 1;
                    //$x3 = 3;
                    //$x3 += 3;

                    for ($x; $x < $i; $x++) {
                      echo "<div data-role='collapsible' data-mini='true' id='faturaI' data-theme='b' data-content-theme='b'>";
                      echo "<h3>" . $ID_display[$x] . "</h3>";
                      //echo "<a href='#editarF' data-position-to='window' data-rel='popup'><input type='submit' name='getIdBtn' value='<?php $ID_display[$x]'></input></a>";
                      echo "<a href='#editarF' data-prefetch data-position-to='window' data-rel='popup' id='editarBtn' class='ui-btn ui-corner-all ui-shadow'>Editar</a>";
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
                    //echo "<div id='showBtn'>" . "<form action='' id='showMore" . $numclick . "'method='post'>" .
                    //"<input type='submit' name='showMoreBtn" . $numclick . "' value='Mostrar mais'>" . "</form>" . "</div>";
                  }
                  ?>
</body>
</html>