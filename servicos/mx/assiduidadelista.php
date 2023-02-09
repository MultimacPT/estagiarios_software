<?php
//$_GET['button3']='DEBUG';
if(isset($_GET['button3'])) {
    if ($_GET['button3']=='DEBUG'){
        $funcionario = "dcorreia";
        $data = "2023-02-05";
        $hentrada = "11:00";
        $hsaida = "12:00";
        echo $data," ", $hentrada," ",$hsaida;

    }
    else{
        $hentrada = $_GET['entrada'];
        $hsaida = $_GET['saida'];
        $data=$_GET['data'];
        $funcionario = $_GET['assignedUserName'];
        $tipo=$_GET['tipo'];
    }
    $hentrada = $data." ".$hentrada;
    $hsaida = $data." ".$hsaida;

                $curl = curl_init();
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/User?filterList%5B%5D=internal&maxSize=25&offset=0&orderBy=userName&order=asc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=userName&where%5B0%5D%5Bvalue%5D=".$funcionario,
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
                    
                if ($err) 
                {
                  //echo "cURL Error #:" . $err;
                  //echo $key . " => " . $value . "<br>";

                } 
                else 
                {
                  $userLista = json_decode($response,true);
                }
            
 };





 if($userLista["list"][0]["id"] != NULL)
 {
     $curl = curl_init();
     curl_setopt_array($curl, [
     CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Assiduidade?maxSize=25&offset=0&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=".$userLista["list"][0]["id"],
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
         
     if ($err) 
     {
       //echo "cURL Error #:" . $err;
       //echo $key . " => " . $value . "<br>";

     } 
     else 
     {
       $assiduidadeLista = json_decode($response,true);
     }
 }
 else{};
//print_r($assiduidadeLista);

//////////////////////////////////////////////////////////////
$gravar = true;
$pop = false;

foreach($assiduidadeLista["list"] as $k=>$v){

    if (trim($v["entrada"])===trim($hentrada).":00" || trim($v["saida"])===trim($hsaida).":00" || trim($v["entrada"])>trim($hentrada).":00" || trim($v["saida"])>trim($hsaida).":00" || trim($hentrada).":00">trim($hsaida).":00"){
        $gravar = false;
        $pop = true;
        //die();
    }

    echo trim($v["entrada"]), "**", trim($hentrada),  "**", trim($v["saida"]), "**", trim($hsaida), "<br>";
}
//echo $gravar;

//echo "zzzzzz",$v["entrada"]," ", $hentrada," ", $v["saida"], " ",$hsaida;
//die();
//$gravar = false;
/////////////////////////////////////////////////////////////////
if ($gravar==true){

    
    $curl = curl_init();

    curl_setopt_array($curl, 
        [
        CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Assiduidade",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"".$userLista["list"][0]["id"] ."\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"assignedUserName\":\"".$funcionario."\",\"entrada\":\"".$hentrada."\",\"tipo\":\"".$tipo."\",\"saida\":\"".$hsaida."\",\"data\":\"".$data."\"}",
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
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

            if ($err) 
            {
            echo "cURL Error #:" . $err;
            } 
            else 
            {
            //echo $response;
            }

}

/////////////////////////////////////////////////////////////////



            if($userLista["list"][0]["id"] != NULL)
            {
                $curl = curl_init();
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Assiduidade?maxSize=25&offset=0&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=".$userLista["list"][0]["id"],
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
                    
                if ($err) 
                {
                  //echo "cURL Error #:" . $err;
                  //echo $key . " => " . $value . "<br>";

                } 
                else 
                {
                  $assiduidadeLista = json_decode($response,true);
                }
            }
            else{};





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
        .wrapper {
            position: relative;
            width: 100%;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: whitesmoke;
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



    <div data-role="page" data-url="servicos/mx/its_atribuido?vl=1&amp;vg=1&amp;vt=" tabindex="0" class="ui-page ui-page-theme-a ui-page-active">

        <header style="padding-right: 20px;">

            <div class="ui-grid-c">

                <div class="ui-block-a" style="display:table; margin:0 auto;">
                    <span style="display:table; margin:0 auto; font-size: 10px;text-align: center;">
                        <br>
                        <img src="../images/mxtechnovo.png" style="width: 60px" >
                        <br>
                    </span>
                </div>

                <div class="ui-block-b">
                    <a href="http://192.168.30.198/estagiarios/estagiarios_software/joaocatita/calendario_digital/ficheiro/calendario.php" data-role="button" data-mini="true"
                        class="ui-link ui-btn ui-shadow ui-corner-all ui-mini" role="button">Calendário</a>
                </div>

                <div class="ui-block-c">
                    <!--a data-ajax="true" href="javascript:location.reload(true);" data-role="button" data-mini="true" data-theme="a">Actualiza</a-->
                    <!--a href="temp.php?v=_" data-role="button" data-mini="true" data-theme="a" >Actualiza</a-->
                    <a href="temp?v=" data-ajax="false"
                        class="ui-link-inherit ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini"
                        data-role="button" data-mini="true" data-theme="a" role="button">Actualiza</a>

                </div>

                <div class="ui-block-d">

                        <button type="button" value="Voltar" onclick="history.back()" data-mini="true" data-theme="c"
                        class=" ui-btn ui-btn-c ui-shadow ui-corner-all ui-mini">Voltar</button>
                        
                </div>

            </div>

        </header>


            <div data-theme="c">
                <div>
                <br><br><br><br>

        <div data-role="popup" id="popupDialog" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">
            <div data-role="header" data-theme="a">
            <h1>ERRO!</h1>
            </div>
            <div role="main" class="ui-content">
            <h3 class="ui-title">Já tem um registo nesta data!</h3>
            <p>Pensa bem.</p>
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Voltar</a>
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back" data-transition="flow">Cancelar</a>
             </div>
        </div>
                    <?php

                                echo "<ul data-role='listview' data-inset='true'>";

                                foreach($assiduidadeLista['list'] as $key => $value) 
                                {
                                    echo "<li>";
                                    echo "<h4>" . $value['assignedUserName']," - ",$value['entrada']," / ",$value['saida']," / ",$value['tipo']."</h4>";
                                    echo "</li>";            
                                }

                    ?>

            </div>
        </div>
        <div data-role="footer" data-position="fixed"  data-theme="a">
                <h4>Creator:Duarte Barros</h4>
            </div>
        <footer>
      </div>
      <script type="text/javascript" language="JavaScript">
      if (<?= $pop ?>){
        $(":jqmData(role='page'):last").on("pageshow", function(event) {
                  $("#popupDialog", $(this)).popup("open");
                });
      }

      </script>

</body>