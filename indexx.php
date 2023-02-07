<?php 

        if(isset($_POST['button3'])) 
        {

        $funcionario = $_POST['assignedUserName'];
        $hentrada = $_POST['entrada'];
        $hsaida = $_POST['saida'];
        $data=$_POST['data'];
        $userid="63bbf8d572c41d87d";
        $assiduidades = "
        https://mx.multimac.pt/mxv5/api/v1/Assiduidade?select=assignedUserId%2CassignedUserName%2Centrada%2Csaida&maxSize=25&offset=0&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=
        ";
            $urlnome = "https://mx.multimac.pt/mxv5/api/v1/User?filterList%5B%5D=internal&select=isActive&maxSize=25&offset=0&orderBy=userName&order=asc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=userName&where%5B0%5D%5Bvalue%5D=";

        // ------------------------------------- Meter PHP post aqui -----------------------------------------------

        //$data = "2023-02-02";
        //   $hentrada = "16:20";
        //    $hsaida = "16:20";

        $hentrada = $data." ".$hentrada;
        $hsaida = $data." ".$hsaida;
            /* echo $data," ", $hentrada," ",$hsaida;
        die();*/

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
                CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"63bbf8d572c41d87d\",\"assignedUserName\":\"dbarros\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"assignedUserName\":\"".$funcionario."\",\"entrada\":\"".$hentrada."\",\"saida\":\"".$hsaida."\",\"data\":\"".$data."\"}",
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
                    echo $response;
                    }

        }

?>


<head>
    <base href="https://mxt.pt/servicos/mx/its_atribuido?vl=1&amp;vg=1&amp;vt=">

    <!--title>t e c h</title-->
    <link rel="shortcut icon" type="image/x-icon" href="../../images/mx2.ico">
    <link rel="icon" type="image/png" href="../../images/mxtech01.png">
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
    <!--link rel="shortcut icon" href="../../images/mx2.ico"></link-->


    <script src="../hamburg/js/hamburger.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="../hamburg/css/hamburger.css">
    <link rel="stylesheet" href="../../jqmobile1.4.5/themes/tema4.css">
    <link rel="stylesheet" href="../../jqmobile1.4.5/themes/jquery.mobile.icons.min.css">
    <link rel="stylesheet" href="../../css/jquery.mobile.structure-1.4.5.min.css">
    <script src="../../js/jquery-1.11.1.min.js"></script>
    <script src="../../js/jquery.mobile-1.4.5.min.js"></script>

    <link rel="stylesheet" href="css/font-awesome-animation.css">
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
        .parentx 
        {
            overflow:hidden
        }

        .normn,
        .cleart {
            float: left;
            min-width: 50%;
            padding:10px;
            border:1px solid orange;
            box-sizing: border-box;
            background-color: blue;
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
    <div data-role="page" data-url="/servicos/mx/its_atribuido?vl=1&amp;vg=1&amp;vt=" tabindex="0"
        class="ui-page ui-page-theme-a ui-page-active" style="">

        <header>
            <div class="ui-grid-c" style="padding-right: 20px;">
                <div class="ui-block-a" style="display:table; margin:0 auto;">
                    <span style="display:table; margin:0 auto; font-size: 10px;text-align: center;">
                        <br>
                        <img src="../../images/mxtechnovo.png" style="width: 60px">
                        <br>
                        <font size="1">
                            <!--a href="#" style="color:lightgrey;">
                                <i class="fa fa-envelope faa-flash fa-2x"></i>
                            </a-->
                            <a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop"
                                aria-haspopup="true" aria-owns="popupDialog" aria-expanded="false" class="ui-link">
                                <i class="fa fa-envelope faa-horizontal faa-fast fa-2x animated" style="color:red;"></i>
                            </a>

                            <div style="display: none;" id="popupDialog-placeholder">
                                <!-- placeholder for popupDialog -->
                            </div>

                            <!--a href="#" onclick="ajaxcall('K',378,'err')" style="color:red;"><i class="fa fa-exclamation-circle faa-flash animated fa-2x"></i></a-->
                        </font>
                    </span>
                </div>

                <div class="ui-block-b">
                    <a href="#nav-panel" data-role="button" data-mini="true"
                        class="ui-link ui-btn ui-shadow ui-corner-all ui-mini" role="button">Menu</a>
                </div>
                <div class="ui-block-c">
                    <!--a data-ajax="true" href="javascript:location.reload(true);" data-role="button" data-mini="true" data-theme="a">Actualiza</a-->
                    <!--a href="temp.php?v=_" data-role="button" data-mini="true" data-theme="a" >Actualiza</a-->
                    <a href="temp?v=" data-ajax="false"
                        class="ui-link-inherit ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini"
                        data-role="button" data-mini="true" data-theme="a" role="button">Actualiza</a>

                </div>
                <div class="ui-block-d">
                    <button type="submit" form="form1" value="Submit" data-mini="true" data-theme="c"
                        class=" ui-btn ui-btn-c ui-shadow ui-corner-all ui-mini">Submete</button>
                </div>
            </div>
        </header>


        </div>


        <div data-role="page">
    <div data-role="header">
        <form method="post">
        <header>
            <form action="assiduidadeslista.php" method="post">
                    <img src="2.jpg" width="140px" height="50px" alt="Multimac"><br><br>
                    <!--label>Loja:</label>
                    <input type="text" name="nome"><br-->
                    <label>Funcionário:</label>
                    <input type="text" required name="assignedUserName"><br>
                    <!--label>Observações:</label>
                    <input type="text" name="obs" /-->
                    <!--label>Tipo:</label>
                    <input type="number" name="tipo"><br-->
                    <label>Entrada:</label>
                    <input style="width: 100px" required type="time" name="entrada" />
                    <label>Saída:</label>
                    <input style="width: 100px" required type="time" name="saida" /><br>
                    <label>Data:</label>
                    <input style="width: 150px" required type="date" name="data">
                    <input type="submit" name="button3"value="Submeter"/>
            </form>
        </header>
        </form>

        <div data-role="footer">
		    <h4>Creator:Duarte Barros</h4>
	    </div>
    </div>

</div>


</body>