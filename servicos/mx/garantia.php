<?php

//--------------------------------------------------Bloco que faz a criação de uma nova fatura(é chamado pelo botão 'btn1')---------------------
if (isset($_POST['button3'])) {



  $nome = $_POST['nome'];
  $descprob = $_POST['descprob'];
  $status = $_POST['status'];

  //echo $nome;
  //echo $descprob;
  //echo $status;
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Garantia",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"status\":\"" . $status . "\",\"assignedUserId\":\"63bbf9692399fe2cb\",\"assignedUserName\":\"drodrigues\",\"name\":\"" . $nome . "\",\"problema\":\"" . $descprob . "\",\"productName\":null,\"productId\":null,\"serielote\":null,\"documentosIds\":[],\"docsRecebidosIds\":[],\"dataFecho\":null,\"respostaFabricante\":null,\"equipamentosName\":null,\"equipamentosId\":null,\"teamsIds\":[],\"teamsNames\":{}}",
    CURLOPT_HTTPHEADER => [
      "Accept: application/json, text/javascript, */*; q=0.01",
      "Accept-Encoding: gzip, deflate, br",
      "Accept-Language: pt-PT,pt;q=0.8,en;q=0.5,en-US;q=0.3",
      "Content-Type: application/json",
      "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
      "X-Api-Key: 4551D74F0502A6409445E49961896B49",
      "X-Requested-With: XMLHttpRequest"
    ],
  ]);

  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  //echo $response;

  if ($err) {
    // echo "cURL Error #:" . $err;
    log($err);
  } else {

    //echo $response;
  }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

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
  <title>Garantias</title>
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
    * {
      outline: none !important;
    }

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


    .ui-block-a,
    .ui-block-b {
      padding-right: 10px;
      padding-left: 10px;
    }



    @media screen and (max-width:700px) {
      .cleart {
        clear: both;
        width: 100%;
      }

      .normn {
        width: 100%;

      }

      #faturaI {
        padding-left: 3%;
        padding-right: 3%;
      }

      #criarF {
        width: 90vw;
        height: 90vh;
      }

      #mainDiv {
        background-color: white;
        border-radius: 5%;
        padding: 0.2%;
      }

      .ui-block-a,
      .ui-block-b {
        padding-right: 10px;
        padding-left: 10px;
      }

      #Desc {
        overflow: hidden;
        height: 40px;
      }

      #DescDiv {
        padding-right: 10px;
        padding-left: 10px;
      }

      #descView {
        overflow: hidden;
        height: 40px;
      }

      ::placeholder {
        color: black !important;
      }

      #totalView {
        float: right;
      }

      #editITN,
      #editCOD,
      #editMOD,
      #editSER,
      #editDESC,
      #editINT,
      #editDESLOC,
      #editPECAS,
      #editCONS,
      #editTOTAL {
        pointer-events: none;
      }

      #searchForm {
        padding-left: 10%;
        padding-right: 10%;
      }

      #searchBar::placeholder {
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
  <div data-role="page" class="ui-page ui-page-theme-a ui-page-active" style="">

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
        <!-- <button onclick='javascript:history.back()' data-theme='c'
            class='ui-btn ui-corner-all ui-shadow ui-mini'>Voltar</button> -->
        </div>
        <div class="ui-block-c">
          <!--a data-ajax="true" href="javascript:location.reload(true);" data-role="button" data-mini="true" data-theme="a">Actualiza</a-->
          <!--a href="http://localhost/rodrigo/servicos/mx/garantia.php" data-role="button" data-mini="true" data-theme="a" >Actualiza</a-->
          <a href="garantia.php" data-ajax="false"
            class="ui-link-inherit ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" data-role="button"
            data-mini="true" data-theme="a" role="button">Actualizar</a>

        </div>
        <div class="ui-block-d">
          <a href="#criarF" data-prefetch data-position-to="window" data-theme="c" data-rel="popup" id="criarBtn"
            class="ui-btn ui-btn-c ui-corner-all ui-shadow ui-mini">Criar</a>
        </div>
      </div>
    </header>






    <div data-theme="c">





      <div data-role="popup" data-history="false" id="criarF" class="ui-corner-all" data-ajax=false>



        <form method="POST" data-ajax=false>


          <div ><label for="Cod">Nome:</label>
            <input type="text" name="nome" pattern="[a-zA-Z0-9]{0,35}" title="Digite entre 6 a 8 digitos" required>
          </div>


          <div ><label for="Cod">Descriçao do problema:</label>
            <input type="text" name="descprob" pattern="[a-zA-Z0-9]{0,35}" title="Digite entre 6 a 8 digitos" required>
          </div>

          
          <div ><label for="Cod">status:</label>
            <input type="text" name="status" pattern="[a-zA-Z0-9]{0,35}" title="Digite entre 6 a 8 digitos" required>
          </div>

     
          <input type="submit" name="button3" value="Submeter" />


        </form>

      </div>




      <div data-role="footer" data-position="fixed" data-theme="a">
        <form method='get' data-ajax='false' id='searchForm' action=''>
          <input type='search' id='searchBar' name='itnumero' placeholder='Pesquisar por intervenção' data-mini='true'>
        </form>
      </div>
      <footer>


</body>

</html>