
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



  

  #criarF{
    width: 90vw;
    height: 90vh;
    padding-top: 30px;
    padding-left: 30px;
    padding-right: 30px;
  }



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

<?php

if(isset($_POST['button3'])) {


 $nome = $_POST['nome'];
 $descprob = $_POST['descprob'];
 $status = $_POST['status'];

echo $nome;
echo $descprob;
echo $status;
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Garantia",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"status\":\"".$status."\",\"assignedUserId\":\"63bbf9692399fe2cb\",\"assignedUserName\":\"drodrigues\",\"name\":\"".$nome."\",\"problema\":\"".$descprob."\",\"productName\":null,\"productId\":null,\"serielote\":null,\"documentosIds\":[],\"docsRecebidosIds\":[],\"dataFecho\":null,\"respostaFabricante\":null,\"equipamentosName\":null,\"equipamentosId\":null,\"teamsIds\":[],\"teamsNames\":{}}",
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
echo $response;

if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    
    echo $response;
    }
}


    ?>




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
                    <a href="#nav-panel" data-role="button" data-mini="true"
                        class="ui-link ui-btn ui-shadow ui-corner-all ui-mini" role="button">Menu</a>
                </div>
                <div class="ui-block-c">
                

                <a href="#criarF" data-prefetch data-position-to="window" data-rel="popup" id="button3" class="ui-btn ui-corner-all ui-shadow">Criar</a>





    


<p></p>

                </div>
            </div>
        </header>



        <div data-role="popup" data-history="false" id="criarF" class="ui-corner-all" >
           
            
           <form method="post">
                   
                           <label>Nome:</label>
                           <input type="text" name="nome"><br>
                           <label>Descriçao do problema:</label>
                           <input type="text" name="descprob"><br>
                           <label>status:</label>
                           <input type="text" name="status" />
                          
                           <input type="submit" name="button3"value="Submeter"/>
              
                   </form>
           
           
                             </div>


        <div data-role="panel" data-position-fixed="true" data-theme="a" id="nav-panel"
            class="ui-panel ui-panel-position-left ui-panel-display-reveal ui-panel-closed ui-body-a ui-panel-fixed ui-panel-animate">
            <div class="ui-panel-inner">
                <ul data-role="listview" data-theme="a" class="nav-search ui-listview ui-group-theme-a">
                    <li data-icon="delete" class="ui-first-child"><a href="#" data-rel="close"
                            class="ui-btn ui-btn-icon-right ui-icon-delete">Fechar menu</a></li>
                    <!--li><a href="http://intranet.multimac.pt/mxtech/auth.php">Interno</a></li-->
                    <!--li><a href="#">Atribuido</a></li-->
                    <li data-icon="delete" class="ui-last-child"><a href="its_fechadas"
                            class="ui-btn ui-btn-icon-right ui-icon-delete">Efectuado</a></li>
                    <br>
                    <label data-mini="true">&nbsp;&nbsp;&nbsp;Username: jg</label>

                    <div class="ui-select ui-mini"><a href="#" role="button" id="local-button" aria-haspopup="true"
                            class="ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-f ui-corner-all ui-shadow"><span>Local:
                                Lisboa</span></a><select name="local" id="local" data-native-menu="false"
                            data-mini="true" data-theme="f" tabindex="-1">
                            <option value="0">Local: s/Filtro</option>
                            <option selected="" value="1">Local: Lisboa</option>
                            <option value="2">Local: Porto</option>
                            <option value="3">Local: Faro</option>
                        </select>
                        <div style="display: none;" id="local-listbox-placeholder">
                            <!-- placeholder for local-listbox -->
                        </div>
                    </div>
                    <div class="ui-select ui-mini"><a href="#" role="button" id="grupo-button" aria-haspopup="true"
                            class="ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-f ui-corner-all ui-shadow"><span>Grupo:
                                1</span></a><select name="grupo" id="grupo" data-native-menu="false" data-mini="true"
                            data-theme="f" tabindex="-1">
                            <option value="0">Grupo: s/Filtro</option>
                            <option selected="" value="1">Grupo: 1</option>
                            <option value="2">Grupo: 2</option>
                        </select>
                        <div style="display: none;" id="grupo-listbox-placeholder">
                            <!-- placeholder for grupo-listbox -->
                        </div>
                    </div>
                    <div class="ui-input-text ui-body-f ui-corner-all ui-mini ui-shadow-inset"><input data-theme="f"
                            data-mini="true" value="" placeholder="Nome Técnico:" type="text" name="tecn" id="tecn">
                    </div>
                    <a href="#" data-role="button" data-mini="true" data-theme="c" onclick="filtrar()"
                        class="ui-link ui-btn ui-btn-c ui-shadow ui-corner-all ui-mini" role="button">Filtrar</a>
                </ul>
            </div>

        </div>


        <div data-theme="c">
            <div>
                <form action="its_atribuido" method="POST" data-ajax="false" id="form1">
                    <br><br><br><br>

                    <div class="parentx" style="margin-top: -18px;">
                        <div class="normn">
<br><h1>Bloco 1</h1>
                        </div>

                        <div class="cleart" style="margin-bottom: 11px;">

<br><h1>Bloco 2</h1>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        <div data-role="footer" data-position="fixed"  data-theme="a">
                <h4>mxtech2</h4>
            </div>
        <footer>
      </div>

</body>
