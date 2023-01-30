<?php

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Consumiveisvsmodelo?where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=modelo&where%5B0%5D%5Bvalue%5D=XC4240",
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
    $array = json_decode($response, true);
}

$list = json_encode($array['list']);
$list = json_decode($list, true);

$i = 0;
$x = 0;

//----------------------------------------------------------------------------------------------//

foreach ($list as $item) {
    $ID = $item['id'];

    $curlID = curl_init();
    curl_setopt_array($curlID, [
        CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Consumiveisvsmodelo/" . $ID,
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
    curl_setopt($curlID, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curlID, CURLOPT_SSL_VERIFYPEER, false);
    $responseID = curl_exec($curlID);
    $errID = curl_error($curlID);
    curl_close($curlID);

    if ($errID) {
        echo "cURL Error #:" . $errID;
    } else {
        $arrayID = json_decode($responseID, true);
    }

    $ID_display[$i] = $arrayID['id'];
    $fID[$i] = $arrayID;
    $i += 1;
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <?php include "incl_jg_head.php" ?>
    <title>Document</title>

</head>

<body>

    <?php
    if (isset($_GET['submit'])) {
        $var = $_GET['63d29f4b87efa1933'];

        if(isset($var)){
            $teste = '10';
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Requisicoes",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"tipo\":\"Peça\",\"assignedUserId\":\"63bbf90a15e21a5df\",\"assignedUserName\":\"mpereira\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},
                \"accountName\":\"Multimac S.A\",\"accountId\":\"60a7c36c4cfecf17b\",\"equipamentosName\":\"00001\",\"equipamentosId\":\"606f2ddc5c6f30909\",\"quantidade\":" . $teste . ",\"productName\":\"00B1004115///\",\"productId\":\"62b51d4c77b7ff977\"}",
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

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
        }
    }
    ?>

    <div data-role="page" style="background-color: lightgray;">
        <div data-role="header">
            <form method="post">
                <header style="text-align: right;">
                    <a href="requisicoes.php"><img src="multimac.jpg" alt="logo" height="50px" width="140px" style="float:left;"></a>
                    <button>Menu</button>
                    <button>Atualizar</button>
                    <input type="submit" name="submit" value="Submeter">
                </header>
            </form>
        </div>

        <?php

        //$quantidade = $_POST['quantidade'];
        $valor = 0;
        for ($x; $x < $i; $x++) {
            echo "<div data-role='collapsible' data-mini='true' id='requisicoes' data-theme='b' data-content-theme='a'>";
            echo "<h3>" . $ID_display[$x] . "</h3>";
            echo "<table data-role='table' data-mode='reflow' id='table' class='ui-responsive' >";
            echo "<thead>" . "<tr>" . "<th data-priority='1'></th>" . "<th data-priority='2'></th>" . "</thead>" . "<tbody>";

            foreach ($fID[$x] as $key => $value) {
                if (!is_string($key)) {
                    $key = json_encode($key);
                }
                if (!is_string($value)) {
                    $value = json_encode($value);
                }
                if (!is_string($key) and !is_string($value)) {
                }
                if ($key == "id" or $key == "name" or $key == "description" or $key == "modelo") {
                    echo "<tr>" . "<th>" . $key . "</th>" . "<td>" . $value . "</td>" . "</tr>";
                }
            }
            echo "<tr>" . "<td>" . "<input type='text' name='quant' placeholder='Quant.'>" . "</td>" . "<td>" . " <form method='get'><input type='checkbox' name='".$ID_display[$x]."' value='1' style='margin: 0.4em 0;'></form>" . "</td>" . "</tr>";
            echo "</tbody>" . "</table>" . "</div>";
            
        }

        ?>

    </div>

</body>

</html>