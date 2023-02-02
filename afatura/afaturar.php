<?php 

//$ID=$_GET['id'];



$itnumero = filter_input(INPUT_GET, 'itnumero', FILTER_SANITIZE_STRING);
//$itnumero = 22;
//$maqnumero = $_GET['maqcod'];
$maqnumero = 55;
if (!isset($itnumero)) {
  @$itnumero;
  $zz = "Afaturar?select=itnumero&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=codigo&where%5B0%5D%5Bvalue%5D=".$maqnumero;
}
else{
  $zz = "Afaturar?select=itnumero&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=codigo&where%5B0%5D%5Bvalue%5D=".$maqnumero."&where%5B0%5D%5Battribute%5D=itnumero&where%5B0%5D%5Bvalue%5D=".$itnumero;
}

$curl = curl_init();

curl_setopt_array($curl, [

  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/".$zz,

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
    <script type="text/javascript">
    $(document).bind("mobileinit", function () {
        $.mobile.ajaxEnabled = false;
    });
    </script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>


<script>
  
</script>

<style>
  #faturaI{
    padding-left: 10%;
    padding-right: 10%;
  }
  #header{
    text-align: right;
  }
  #image{
    position: absolute;
    left: 3%;
    top: 0%;
    width: 10%;
    height: 100%;
    border-radius: 5%;
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
  }
  #totalView{
    float: right;
  }
  #editITN,#editCOD,#editMOD,#editSER,#editDESC,#editINT,#editDESLOC,#editPECAS,#editCONS,#editTOTAL{
    pointer-events: none;
  }
  #searchForm{
    padding-left: 10%;
    padding-right: 10%;
  }
  #searchBar::placeholder{
    color: black !important;
    opacity: 0.7;
  }
</style>
                <div data-role="header" id="header" data-position="fixed">
                <form>
                  <a href="#mxmainpage" data-ajax='false'><image src='mxLogo.png' id='image' alt='image'></a>
                  <button href="" data-ajax='false' class="ui-btn ui-corner-all ui-shadow">Menu</button>
                  <a href="#criarF" data-prefetch data-position-to="window" data-rel="popup" id="criarBtn" class="ui-btn ui-corner-all ui-shadow">Criar</a>
                </form>
                </div>

                <div>
                  <?php 
                  if(isset($itnumero)){
                    echo "<button onclick='javascript:history.back()' class='ui-btn ui-corner-all ui-shadow'>Retroceder</button>";
                  }
                  ?>
                  <form method='get' id='searchForm' action='afaturar.php'>
                    <input type='search' id='searchBar' name='itnumero' placeholder='Pesquisar por intervenção' data-mini='true'>
                  </form>
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
                    echo /*"<a href='#editarF' data-position-to='window' data-rel='popup' id='editarBtn'>*/"<form method='post' action='afaturar.php' data-ajax='false' data-prefetch>
                              "//<a href='#editarF' data-position-to='window' id='editarR' data-rel='popup'>Editar</a>
                              .//"<input type='hidden' name='editIdT' value='" . $ID_display[$x] . "'>
                              "<input type='hidden' name='editIDV' value='". $fID[$x]['itnumero'] ."'>
                              <input type='submit' name='getIdBtn' id='sizeTest' value='Editar' class='ui-btn ui-corner-all ui-shadow'>";
                              
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
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Itnumero:"."</label><input type='text' id='editITN' placeholder='".$fID[$x]['itnumero']."'></div>";
                    echo "<div class='ui-block-b'><label>"."Codigo:"."</label><input type='text' id='editCOD' placeholder='".$fID[$x]['codigo']."'></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."modelo:"."</label><input type='text' id='editMOD' placeholder='".$fID[$x]['modelo']."'></div>";
                    echo "<div class='ui-block-b'><label>"."Serie:"."</label><input type='text'id='editSER' placeholder='".$fID[$x]['serie']."'></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "Description"."</label><input type='text' id='editDESC' placeholder='".$fID[$x]['description']."'></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Intervencao:"."</label><input type='text' id='editINT' placeholder='".$fID[$x]['intervencao']."'></div>";
                    echo "<div class='ui-block-b'><label>"."Deslocacao:"."</label><input type='text' id='editDESLOC' placeholder='".$fID[$x]['deslocacao']."'></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Pecas:"."</label><input type='text' id='editPECAS' placeholder='".$fID[$x]['pecas']."'></div>";
                    echo "<div class='ui-block-b'><label>"."Consumiveis:"."</label><input type='text' id='editCONS' placeholder='".$fID[$x]['consumiveis']."'></div></div>";
                    echo "<div class='ui-grid-a'><div class='ui-block-a' id='totalView'><label>Total:</label><input type='text' id='editTOTAL' placeholder='".$totalV."'></div></div>";
                    echo "</form>";
                        //echo "</tbody>" . "</table>" . "</div>";
                        $x += 1;
                    echo "</div></div>";
                      }
                  //$showMore = "false";
                    //}
                    if(empty($ID_display[$x])){

                    } else {
                    echo "<div id='showBtn'>" . "<form action='' data-ajax='false' id='showMore' method='post' data-prefetch>" .
                      "<input type='submit' name='showMoreBtn0' value='Mostrar mais'>" . "</form>" . "</div>";
                  }
                    //$showMore = $_GET;
                    ?>
                    
                  </div>
                   
                 <div data-role="popup" data-history="false" id="criarF" class="ui-corner-all">
                  <form method="post" data-ajax='false' action="" onsubmit="return validateForm()">
                    <div>
                      <h3>Create</h3>
                      <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="itN">ItNumero:</label>
                      <input type="text" name="itN" pattern="[0-9]{6,8}" title="Digite entre 6 a 8 digitos" required></div>
                      <div class="ui-block-b"><label for="Cod">Codigo:</label>
                      <input type="text" name="Cod" pattern="[0-9]{6,8}" title="Digite entre 6 a 8 digitos" required></div>
                    </div> 
                    <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="Mod">Modelo:</label>
                      <input type="text" name="Mod" pattern="[a-zA-Z0-9]{0,10}" title="Máximo de 10 caracteres" required></div>
                      <div class="ui-block-b"><label for="Ser">Serie:</label>
                      <input type="text" name="Ser" pattern="[a-zA-Z0-9]{0,8}" title="Máximo de 8 caracteres" required></div>
                    </div>
                    <div id="DescDiv">
                    <label for="Desc">Descrição</label>
                    <input type="text" name="Desc" pattern="[a-zA-Z0-9\s]{0,100}" title="Máximo de 100 caracteres" ></input>
                  </div><br><br>
                  <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="Inter">Intervencao:</label>
                      <input type="text" name="Inter" pattern="[0-9]{0,10}" title="Digite um valor válido" required></div>
                      <div class="ui-block-b"><label for="Desloc">Deslocacao:</label>
                      <input type="text" name="Desloc" pattern="[0-9]{0,10]" title="Digite um valor válido" required></div>
                    </div>
                    <div class="ui-grid-a">
                      <div class="ui-block-a"><label for="Pec">Pecas:</label>
                      <input type="text" name="Pec" pattern="[0-9]{0,10}" title="Digite um valor válido" required></div>
                      <div class="ui-block-b"><label for="Cons">Consumiveis:</label>
                      <input type="text" name="Cons" pattern="[0-9]{0,10}" title="Digite um valor válido" required></div>
                    </div>
                    <input type="submit" name="btn1" value="Submeter" />
                   </div>
                  </form>
                  </div>



                      <?php if(isset($_POST['getIdBtn'])){
                            //$idSelect = $_POST['editID'];
                            
                        echo "<style>
                        #editITN,#editCOD,#editMOD,#editSER,#editDESC,#editINT,#editDESLOC,#editPECAS,#editCONS,#editTOTAL
                        {pointer-events: auto}
                        </style>";

                      
                      }?>



                  <div data-role="popup" data-history="false" id="editarF" class="ui-corner-all">
                  <form method="post" action="">
                    <div>
                      <h3>Edit <?php $idSelect = $_GET['id'];
                      echo $idSelect ?></h3>
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
                      //echo "<a href='#editarF' data-prefetch data-position-to='window' data-rel='popup' id='editarBtn' class='ui-btn ui-corner-all ui-shadow'>Editar</a>";
                      echo "<form method='post' action='' data-prefetch> <input type='hidden' name='editIdT' id='editIdT' value='" . $ID_display[$x] . "'>
                              <input type='submit' name='getIdBtn' value='Editar' class='ui-btn ui-corner-all ui-shadow'></form>";
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
                        if ($value == "" or $value == "null" or empty($value) == true or $value == "[]" or isset($value)==false) {
                          $value = "Sem informação";
                        }
                      }
                      $totalV = $fID[$x]['intervencao'] + $fID[$x]['deslocacao'] + $fID[$x]['pecas'] + $fID[$x]['consumiveis'];
                        echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "Itnumero:" . "</label><input type='text' placeholder='" . $fID[$x]['itnumero'] . "'disabled></div>";
                        echo "<div class='ui-block-b'><label>" . "Codigo:" . "</label><input type='text' placeholder='" . $fID[$x]['codigo'] . "'disabled></div></div>";
                        echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "modelo:" . "</label><input type='text' placeholder='" . $fID[$x]['modelo'] . "'disabled></div>";
                        echo "<div class='ui-block-b'><label>" . "Serie:" . "</label><input type='text' placeholder='" . $fID[$x]['serie'] . "'disabled></div></div>";
                        echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "Description" . "</label><input type='text' name='descView' placeholder='" . $fID[$x]['description'] . "'disabled></div></div>";
                        echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "Intervencao:" . "</label><input type='text' placeholder='" . $fID[$x]['intervencao'] . "'disabled></div>";
                        echo "<div class='ui-block-b'><label>" . "Deslocacao:" . "</label><input type='text' placeholder='" . $fID[$x]['deslocacao'] . "'disabled></div></div>";
                        echo "<div class='ui-grid-a'><div class='ui-block-a'><label>" . "Pecas:" . "</label><input type='text' placeholder='" . $fID[$x]['pecas'] . "'disabled></div>";
                        echo "<div class='ui-block-b'><label>" . "Consumiveis:" . "</label><input type='text' placeholder='" . $fID[$x]['consumiveis'] . "'disabled></div></div>";
                        echo "<div class='ui-grid-a'><div class='ui-block-a' id='totalView'><label>Total:</label><input type='text' placeholder='" . $totalV . "'disabled></div></div>";
                        echo "</div></div>";
                      }
                    //echo "<div id='showBtn'>" . "<form action='' id='showMore" . $numclick . "'method='post'>" .
                    //"<input type='submit' name='showMoreBtn" . $numclick . "' value='Mostrar mais'>" . "</form>" . "</div>";
                  }
                  ?>

<script>
  function search(){
    var urlITN = document.getElementById('searchBar').value;
    window.location.href = "estag11.php?itnumero=" + urlITN;
  }
</script>

</body>
</html>