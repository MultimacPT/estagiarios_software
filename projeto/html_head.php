<head> 
    <link rel="shortcut icon" type="image/x-icon" href="images/mx2.ico">
    <link rel="icon" type="image/png" href="images/mxtech01.png">
    <meta name="theme-color" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="keywords" content="mxtech">
    <meta name="description" content="Página dashboard.">
    
    <title>mxtech</title>

    <script src="hamburg/js/hamburger.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="hamburg/css/hamburger.css">
    <link rel="stylesheet" href="jqmobile1.4.5/themes/tema4.css">
    <link rel="stylesheet" href="jqmobile1.4.5/themes/jquery.mobile.icons.min.css">
    <link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>

    <link rel="stylesheet" href="css/awa/font-awesome-animation.css">
    <script src="https://use.fontawesome.com/7c524b6728.js"></script><link href="https://use.fontawesome.com/7c524b6728.css" media="all" rel="stylesheet">

    <script>
        $(document).bind("mobileinit", function () {
            $.mobile.selectmenu.prototype.options.nativeMenu = false;
        });
        $(document).bind("mobileinit", function () {
            $.mobile.ajaxEnabled = false;
        });
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
            width:100%;
            height:200px;
            background-color: white;
        }
        .ui-page {
            background:#C6D0E2;
        }
    </style>
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <style>
        .parentx {
            overflow:hidden
        }
        .normn, .cleart {
            float:left;
            min-width:50%;
            padding:10px;
            border:1px solid orange;
            box-sizing: border-box;
            background-color: blue;
        }
        @media screen and (max-width:700px) {
            .cleart {
                clear:both;
                width:100%;
            }
            .normn {
                width:100%;
            }
        }
    </style>
    </head>
