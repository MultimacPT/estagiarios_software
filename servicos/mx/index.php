
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