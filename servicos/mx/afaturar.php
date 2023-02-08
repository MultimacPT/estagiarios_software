<?php 

//$ID=$_GET['id'];

$itnumero = filter_input(INPUT_GET, 'itnumero', FILTER_SANITIZE_STRING);    //Obtem o valor caso o user decida pesquisar por nº it nesta página
//$itnumero = 22;
//$maqnumero = $_GET['maqcod'];
$maqnumero = filter_input(INPUT_GET, 'maqcod', FILTER_SANITIZE_STRING);     //Obtem o valor a partir da página anterior

//If que verifica se o valor para itnumero existe(se o user pesquisou por nºit) para decidir qual dos links vai usar
if (!isset($itnumero)) {
  @$itnumero;
  $zz = "Afaturar?select=itnumero&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=codigo&where%5B0%5D%5Bvalue%5D=".$maqnumero;
}
else{
  $zz = "Afaturar?select=itnumero&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=codigo&where%5B0%5D%5Bvalue%5D=".$maqnumero."&where%5B0%5D%5Battribute%5D=itnumero&where%5B0%5D%5Bvalue%5D=".$itnumero;
}


//------------------------------------------------------Bloco com a leitura dos dados de acordo com o link obtido no if---------------------------------
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

//--------------------------------------------------------Fim de leitura----------------------------------------------------

// Definição de variáveis a serem usadas mais tarde no código
$i = 0;
$z = 3;
$x = 0;
$showMore = "true";// = true;
$dataS;
$idSelect;
$numclick = 0;
$numEdit = 0;
//--------------------------------------------FOREACH para ler os dados de cada ID obtido no bloco acima---------------------------------------------------
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

}//------------------------------------------------------END OF FOREACH----------------------------------------------

//--------------------------------------------------Bloco que faz a criação de uma nova fatura(é chamado pelo botão 'btn1')---------------------
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
//-----------------------------------------------------------Fim do bloco de criação de fatura------------------------------------

//-----------------------------------------------------Bloco que faz a edição de dados existentes(NAO ESTA A SER USADO)----------------------------

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
      "Accept: application/json, text/javascript, */* */; q=0.01",
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

//-----------------------------------------------------------------Fim do bloco de edição-------------------------------------------------------


?>
<head>
    <!--base href="https://mxt.pt/servicos/mx/its_atribuido?vl=1&amp;vg=1&amp;vt="-->

    <!--title>t e c h</title-->
    <link rel="shortcut icon" type="image/x-icon" href="images/mx2.ico">
    <link rel="icon" type="image/png" href="../images/mxtech01.png">
    <!--meta name = "theme-color" content = "#0071BC"/-->
    <!--meta name = "theme-color" content = "#F0B032"/-->
    <meta name="theme-color" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="msapplication-tap-highlight" content="no">
    <!--meta name="apple-itunes-app" content="app-id=1148137751"-->
    <meta name="keywords" content="mxtech">
    <meta name="description" content="Página dashboard.">
    <title>mxtech</title>
    <!--link rel="shortcut icon" href="images/mx2.ico"></link-->


    <script src="hamburg/js/hamburger.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="../hamburg/css/hamburger.css">
    <link rel="stylesheet" href="../jqmobile1.4.5/themes/tema4.css">
    <link rel="stylesheet" href="../jqmobile1.4.5/themes/jquery.mobile.icons.min.css">
    <link rel="stylesheet" href="../css/jquery.mobile.structure-1.4.5.min.css">
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/jquery.mobile-1.4.5.min.js"></script>

    <link rel="stylesheet" href="../css/font-awesome-animation.css">
    <script src="https://use.fontawesome.com/7c524b6728.js"></script>
    <link href="https://use.fontawesome.com/7c524b6728.css" media="all" rel="stylesheet">

    <script>
        $(document).bind("mobileinit", function () {
            $.mobile.selectmenu.prototype.options.nativeMenu = false;
        });
        $(document).bind("mobileinit", function () {
            $.mobile.ajaxEnabled = false;
        });

        //window.history.back();
        //location.reload();
    </script>
    <style>
      * { outline: none !important; }
        .wrapper {
            position: relative;
            width: 100%;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 200px;
            background-color: white;
        }

        .ui-page {
            background: #C6D0E2;
        }
    </style>
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <style>
        .parentx {
            //overflow:hidden
        }

        .normn,
        .cleart {
            float: left;
            min-width: 50%;
            //padding:10px;
            //border:1px solid orange;
            //box-sizing: border-box;
            //background-color: blue;
        }

        @media screen and (max-width:700px) {
            .cleart {
                clear: both;
                width: 100%;
            }

            .normn {
                width: 100%;

            }
            #faturaI{
    padding-left: 3%;
    padding-right: 3%;
  }
  #criarF{
    width: 90vw;
    height: 90vh;
  }
  #mainDiv{
    background-color: white;
    border-radius: 5%;
    padding: 0.2%;
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
    color: black !important;
  }
  #totalView{
    float: right;
  }
  #editITN,#editCOD,#editMOD,#editSER,#editDESC,#editINT,#editDESLOC,#editPECAS,#editCONS,#editTOTAL{
    pointer-events: none !important;
  }
  #searchForm{
    padding-left: 10%;
    padding-right: 10%;
  }
  #searchBar::placeholder{
    color: black !important;
    opacity: 0.7;
  }

            /* }
             .ui-body-a
             {
                 background: linear-gradient(to bottom, lightgrey, grey);
             }
             .ui-body-a,
             .ui-page-theme-a .ui-body-inherit,
             html .ui-bar-a .ui-body-inherit,
             html .ui-body-a .ui-body-inherit,
             html body .ui-group-theme-a .ui-body-inherit,
             html .ui-panel-page-container-a {

             }*/
    </style>
</head>

<body class="ui-mobile-viewport ui-overlay-a" cz-shortcut-listen="true">
    <div data-role="page" data-url="servicos/mx/its_atribuido?vl=1&amp;vg=1&amp;vt=" tabindex="0"
        class="ui-page ui-page-theme-a ui-page-active" style="">

        <header>
            <div class="ui-grid-c" style="padding-right: 20px;">
                <div class="ui-block-a" style="display:table; margin:0 auto;">
                    <span style="display:table; margin:0 auto; font-size: 10px;text-align: center;">
                        <br>
                        <img src="../images/mxtechnovo.png" style="width: 60px">
                        <br>
                    </span>
                </div>

                <div class="ui-block-b">
                <button onclick='javascript:history.back()' data-theme='c' class='ui-btn ui-corner-all ui-shadow ui-mini'>Voltar</button>
                </div>
                <div class="ui-block-c">
                    <!--a data-ajax="true" href="javascript:location.reload(true);" data-role="button" data-mini="true" data-theme="a">Actualiza</a-->
                    <!--a href="temp.php?v=_" data-role="button" data-mini="true" data-theme="a" >Actualiza</a-->
                    <a href="temp?v=" data-ajax="false"
                        class="ui-link-inherit ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini"
                        data-role="button" data-mini="true" data-theme="a" role="button">Actualiza</a>

                </div>
                <div class="ui-block-d">
                <a href="#criarF" data-prefetch data-position-to="window" data-theme="c" data-rel="popup" id="criarBtn" class="ui-btn ui-btn-c ui-corner-all ui-shadow ui-mini">Criar</a>
                </div>
            </div>
        </header>


        



        <div data-theme="c">
            <div>
                <form action="its_atribuido" method="POST" data-ajax="false" id="form1">
                <br><br><br><br>
                <?php
                    //if ($showMore == "true") {
                      //$z = 3;
                      
                      for ($x; $x < 5; $x=$x) {
                        if(empty($ID_display[$x])){
                      break;
                        }
                        echo "<div data-role='collapsible' data-mini='true' id='faturaI'>";
                        echo "<h3>" . "<div>Nº IT: " . $fID[$x]['itnumero'] . "</div>" . "</h3>";
                        //echo "<a href='#editarF' data-position-to='window' data-rel='popup'><input type='submit' name='getIdBtn' value='<?php $ID_display[$x]'></input></a>";
                              
                        //echo "<table data-role='table' data-mode='reflow' id='table' class='ui-responsive' >";
                        //echo "<thead>" . "<tr>" . "<th data-priority='1'>Key</th>" . "<th data-priority='2'>Value</th>" . "</tr>" . "</thead>" . "<tbody>";
                    echo "<div class='ui-grid-b' data-mini='true'>"; 

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
                    echo "<div class='ui-grid-a'><div class='ui-block-a'><label>"."Itnumero:"."</label><a href='afaturar.php?itnumero=" . $fID[$x]['itnumero'] . "'></a><input type='text' id='editITN' placeholder='".$fID[$x]['itnumero']."'></div>";
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
                    <input type="submit" data-ajax='false' name="btn1" value="Submeter" />
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
                      echo "<div data-role='collapsible' data-mini='true' id='faturaI'>";
                      echo "<h3> Nº IT: " . $fID[$x]['itnumero'] . "</h3>";
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

        

        <div data-role="footer" data-position="fixed"  data-theme="a">
        <form method='get' data-ajax='false' id='searchForm' action=''>
                    <input type='search' id='searchBar' name='itnumero' placeholder='Pesquisar por intervenção' data-mini='true'>
                  </form>
            </div>
        <footer>
      </div>

</body>