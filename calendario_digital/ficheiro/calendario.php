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
$curlUrl = "https://mx.multimac.pt/mxv5/api/v1/Assiduidade?maxSize=25&offset=0&orderBy=createdAt&order=desc";
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
    if ($v['tipo'] == "Falta") {
        $cor = "redClass";
    } else {
        $cor = "greenClass";
    }
}
    foreach ($out['list'] as $v) {
        $counter++;
        if ($v['tipo'] == "Férias") {
            $cor = "blueClass";
        } else {
            $cor = "greenClass";
        }
    //echo $v['id'], $v['assignedUserName'],"<br>";
    $dados = $dados . "
    {
        id: " . $counter . ",
        name: '" . $v['assignedUserName'] . "',
        startDate: '" . str_replace("-", "/", substr($v['entrada'], 0, 10)) . "',
        endDate: '" . substr($v['saida'], 0, 10) . "',
        customClass: '" . $cor . "',
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

    <link rel="shortcut icon" type="image/x-icon" href="mx2.ico">
    <link rel="icon" type="image/png" href="mxtech01.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JQuery Horizontal Calendar</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="../src/css/rescalendar.css">
    <!--
        <link rel="stylesheet" href="../src/css/base.css">
        -->
    <link rel="stylesheet" href="../src/css/basic-style.css">
    <link rel="stylesheet" href="../src/css/basic-style-teste.css">
    <link rel="stylesheet" href="../src/css/basic-style_seg.css">
    <link rel="stylesheet" href="../src/css/basic-style-abert-fich.css">
    <link rel="stylesheet" href="../src/css/component.css">
    <link rel="stylesheet" href="../src/css/colorblocks-style.css">
    <link rel="stylesheet" href="../src/css/cbdb-search-form.css">
    <link rel="stylesheet" href="../src/css/cbdb-saerch-form-jqmobile.css">
    <link rel="stylesheet" href="../src/css/ddsmoothmenu-v.css">
    <link rel="stylesheet" href="../src/css/ddsmoothmenu.css">
    <link rel="stylesheet" href="../src/css/default.css">
    <link rel="stylesheet" href="../src/css/demo.css">
    <link rel="stylesheet" href="../src/css/easy-responsive-tabs.css">
    <link rel="stylesheet" href="../src/css/fancydropdown.css">
    <link rel="stylesheet" href="../src/css/flashmo_224_style.css">
    <link rel="stylesheet" href="../src/css/font-awesome-animation.css">
    <link rel="stylesheet" href="../src/css/jquery.mobile-1.2.1.min.css">
    <link rel="stylesheet" href="../src/css/jquery.mmenu.all.css">
    <link rel="stylesheet" href="../src/css/jquery.mobile.structure-1.4.5.min.css">
    <!--
        <link rel="stylesheet" href="../src/css/layout.css">
        -->
    <link rel="stylesheet" href="../src/css/layout_script.css">
    <link rel="stylesheet" href="../src/css/normalize.css">
    <link rel="stylesheet" href="../src/css/site.css">
    <link rel="stylesheet" href="../src/css/skeleton.css">
    <link rel="stylesheet" href="../src/css/slimbox2.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/styleresponsivetab01.css">
    <!--
        <link rel="stylesheet" href="../src/css/templatemo_style.css">
        -->

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
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

    <header>
        <div class="ui-grid-c" style="padding-right: 20px;">
            <div class="ui-block-a" style="display:table; margin:0 auto;">
                <span style="display:table; margin:0 auto; font-size: 10px;text-align: center;">
                    <br>
                    <img src="mxtechnovo.png" style="width: 60px">
                    <br>
                </span>
            </div>
    </header>
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
            <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
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

    <a href="http://192.168.30.198/estagiarios/estagiarios_software/duartebarros/assiduidades.php"><button>Assiduidades</button></a>

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