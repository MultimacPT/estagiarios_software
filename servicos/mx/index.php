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
                        <div>
                            <?php
                            $aaa = " 
curl 'https://mx.multimac.pt/mxv5/api/v1/Assiduidade?select=assignedUserId%2CassignedUserName%2Centrada%2Csaida&maxSize=25&offset=0&orderBy=createdAt&order=desc' \
-H 'Accept: application/json, text/javascript, */*; q=0.01' \
-H 'Accept-Language: pt-PT,pt;q=0.9,en-US;q=0.8,en;q=0.7,es;q=0.6,it;q=0.5' \
-H 'Authorization: Basic amNhdGl0YTo2ZWM5YmNlNmFhOWRkZjEyNDIxMjI3MmE5MzlhOTg4Yw==' \
-H 'Connection: keep-alive' \
-H 'Cookie: _ga=GA1.1.1181704117.1673259127; _ga_BF2RH76ZFH=GS1.1.1674812968.2.0.1674812969.0.0.0; auth-token-secret=0457cc1463d3d1af96590814f971be7c; auth-username=jcatita; auth-token=6ec9bce6aa9ddf124212272a939a988c' \
-H 'Espo-Authorization: amNhdGl0YTo2ZWM5YmNlNmFhOWRkZjEyNDIxMjI3MmE5MzlhOTg4Yw==' \
-H 'Espo-Authorization-By-Token: true' \
-H 'Referer: https://mx.multimac.pt/mxv5/' \
-H 'Sec-Fetch-Dest: empty' \
-H 'Sec-Fetch-Mode: cors' \
-H 'Sec-Fetch-Site: same-origin' \
-H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36' \
-H 'X-Requested-With: XMLHttpRequest' \
-H 'sec-ch-ua: \"Not_A Brand\";v=\"99\", \"Google Chrome\";v=\"109\", \"Chromium\";v=\"109\"' \
-H 'sec-ch-ua-mobile: ?0' \
-H 'sec-ch-ua-platform: \"Windows\"' \
--compressed
";
                            //header("Location: estag12.php");
                            $ID = "639df22a8d7e751b3";
                            $ID = "3";
                            $curlUrl = "https://mx.multimac.pt/mxv5/api/v1/Assiduidade?select=assignedUserId%2CassignedUserName%2Centrada%2Csaida&maxSize=25&offset=0&orderBy=createdAt&order=desc";
                            $curl = curl_init();

                            curl_setopt_array($curl, [
                                CURLOPT_URL => $curlUrl . $ID,
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



                                $response = json_encode($response);

                                $array = json_decode($response, true);

                            }

                            //echo $array;
                            
                            $out = json_decode($array, true);

                            /*
                            echo $out['total'];
                            echo "<br><br>";
                            echo $out['list'][0]['id'];
                            echo "<br><br>";
                            echo $out['list'][1]['id'];
                            echo "<br><br>";*/
                            $dados = "";
                            $name = "";
                            $counter = 0;
                            $inicio = "";

                            foreach ($out['list'] as $v) {
                                $counter++;
                                //echo $v['id'], $v['assignedUserName'],"<br>";
                                $dados = $dados . "
    {
        id: " . $counter . ",
        name: '" . $v['assignedUserName'] . "',
        startDate: '" . str_replace("-", "/", substr($v['entrada'], 0, 10)) . "',
        endDate: '" . substr($v['saida'], 0, 10) . "',
        customClass: 'greenClass',
        title: 'Title 1'
    },";
                                //if ($name==""){
                                $inicio = str_replace("-", "/", substr($v['entrada'], 0, 10));
                                $nm[$v['assignedUserName']] = true;
                                //$name = "'".$counter.$v['assignedUserName']."'";
                                //}
                                //else{
                                //$name = $name . ", '" . $counter.$v['assignedUserName']."'";
                                //}
                            }
                            foreach ($nm as $k => $v) {
                                if ($name == "") {
                                    $name = "'" . $k . "'";
                                } else {
                                    $name = $name . ",'" . $k . "'";
                                }
                            }

                            //echo $dados;
//print_r($out);
                            ?>
                            <!DOCTYPE html>
                            <html lang="en">

                            <head>

                                <meta charset="utf-8">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>jQuery Horizontal Calendar</title>
                                <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet"
                                    type="text/css">
                                <!-- CSS -->
                                <link rel="stylesheet" href="/css/rescalendar.css">
                                <!--
                                <link rel="stylesheet" href="/css/base.css">
                                -->
                                <link rel="stylesheet" href="/css/basic-style.css">
                                <link rel="stylesheet" href="/css/basic-style-teste.css">
                                <link rel="stylesheet" href="/css/basic-style_seg.css">
                                <link rel="stylesheet" href="/css/basic-style-abert-fich.css">
                                <link rel="stylesheet" href="/css/component.css">
                                <link rel="stylesheet" href="/css/colorblocks-style.css">
                                <link rel="stylesheet" href="/css/cbdb-search-form.css">
                                <link rel="stylesheet"
                                    href="/css/cbdb-saerch-form-jqmobile.css">
                                <link rel="stylesheet" href="/css/ddsmoothmenu-v.css">
                                <link rel="stylesheet" href="/css/ddsmoothmenu.css">
                                <link rel="stylesheet" href="/css/default.css">
                                <link rel="stylesheet" href="/css/demo.css">
                                <link rel="stylesheet" href="/css/easy-responsive-tabs.css">
                                <link rel="stylesheet" href="/css/fancydropdown.css">
                                <link rel="stylesheet" href="/css/flashmo_224_style.css">
                                <link rel="stylesheet" href="/css/font-awesome-animation.css">
                                <link rel="stylesheet" href="/css/jquery.mobile-1.2.1.min.css">
                                <link rel="stylesheet" href="/css/jquery.mmenu.all.css">
                                <link rel="stylesheet"
                                    href="/css/jquery.mobile.structure-1.4.5.min.css">
                                <!--
        <link rel="stylesheet" href="/css/layout.css">
        -->
                                <link rel="stylesheet" href="/css/layout_script.css">
                                <link rel="stylesheet" href="/css/normalize.css">
                                <link rel="stylesheet" href="/css/site.css">
                                <link rel="stylesheet" href="/css/skeleton.css">
                                <link rel="stylesheet" href="/css/slimbox2.css">
                                <link rel="stylesheet" href="/css/style.css">
                                <link rel="stylesheet" href="/css/styleresponsivetab01.css">
                                <!--
        <link rel="stylesheet" href="/css/templatemo_style.css">
        -->

                                <link rel="stylesheet"
                                    href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
                                <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
                                <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


                                <style>
                                    body {
                                        text-align: center;
                                        font-family: 'Roboto';
                                        background-color: #fafafa;
                                    }

                                    h1 {
                                        margin: 150px 0 100px 30px;
                                    }

                                    h4 {
                                        margin: 60px 0 10px 60px;
                                    }

                                    .wrapper {
                                        width: 100%;
                                        text-align: center;
                                    }

                                    .greenClass {
                                        background: green;
                                    }

                                    .blueClass {
                                        background: blue;
                                    }

                                    .redClass {
                                        background: red;
                                    }
                                </style>

                            </head>

                            <body>
                                <div class="jquery-script-center">
                                    <ul>
                                    </ul>
                                    <div class="jquery-script-ads">
                                        <script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
                                            google_ad_slot = "2780937993";
                                            google_ad_width = 728;
                                            google_ad_height = 90;
//-->
                                        </script>
                                        <script type="text/javascript"
                                            src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
                                            </script>
                                    </div>
                                    <div class="jquery-script-clear"></div>
                                </div>
                        </div>

                        <div class="wrapper">

                            <div class="rescalendar" id="my_calendar1"></div>

                            <!--<h4>English calendar</h4>
            <div class="rescalendar" id="my_calendar_en"></div>

            <h4>Simplest init</h4>
            <div class="rescalendar" id="my_calendar_simple"></div>

            <h4>CalSize test</h4>
            <div class="rescalendar" id="my_calendar_calSize"></div>-->

                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
                        <script src="../src/js/rescalendar.js"></script>

                        <script>

                            $(function () {

                                // Multiple instantiation (divs 1 and 2)
                                $('#my_calendar1').rescalendar({
                                    id: 'my_calendar1',
                                    format: 'YYYY/MM/DD',
                                    jumpSize: 15,
                                    locale: 'pt',
                                    disabledWeekDays: [6, 0],
                                    refDate: '<?= $inicio ?>',
                                    lang: {
                                        'today': 'Hoje',
                                    },

                                    data: [
                                        <?= $dados ?>

                                    ],

                                    dataKeyField: 'name',
                                    dataKeyValues: [<?= $name ?>]

                                });

                            });

                        </script>

</body>

<div data-role="footer">
    <h4>De João Catita</h4>
</div>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();


</script>

</html>

</div>

</div>
</form>

</div>
</div>
<div data-role="footer" data-position="fixed" data-theme="a">
    <h4>mxtech2</h4>
</div>
<footer>
    </div>

    </body>