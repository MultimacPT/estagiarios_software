<?php
//print_r($_GET);

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

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if($err){
    echo "cURL Error #:" . $err;
} 
else{
    $array = json_decode($response, true);
}

$list = json_encode($array['list']);
$list = json_decode($list, true);

$i = 0;
$x = 0;

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

    curl_setopt($curlID, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curlID, CURLOPT_SSL_VERIFYPEER, false);
    $responseID = curl_exec($curlID);
    $errID = curl_error($curlID);
    curl_close($curlID);

    if ($errID) {
        //echo "cURL Error #:" . $errID;
    } else {
        $arrayID = json_decode($responseID, true);
    }

    $ID_display[$i] = $arrayID['id'];
    $prodidInpt[$i]="";
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
        $quantidade=0;
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Requisicoes",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST=> false,
        CURLOPT_SSL_VERIFYPEER=> false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"tipo\":\"Peça\",\"assignedUserId\":\"63bbf90a15e21a5df\",\"assignedUserName\":\"mpereira\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},
        \"accountName\":\"Multimac S.A\",\"accountId\":\"60a7c36c4cfecf17b\",\"equipamentosName\":\"00001\",\"equipamentosId\":\"606f2ddc5c6f30909\",\"quantidade\":\"" .$quantidade. "\",\"productName\":\"00B1004115///\",\"productId\":\"62b51d4c77b7ff977\"}",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json, text/javascript, */*; q=0.01",
            "Accept-Encoding: gzip, deflate, br",
            "Accept-Language: pt-PT,pt;q=0.8,en;q=0.5,en-US;q=0.3",
            "Content-Type: application/json",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
            "X-Api-Key: 4551D74F0502A6409445E49961896B49"
        ],
        ]);
        
        foreach($_GET as $k => $v){
            if (substr($k, 0, 4) == 'nmqt' & $v!=''){
                $idreq=substr($k, 4);
                //echo $k,"=",$v,"-",$idreq,"<br>";

                $prodid=substr($k, 4);
                $quantidade=$v;

                $var="{\"tipo\":\"Peça\",\"assignedUserId\":\"63bbf90a15e21a5df\",\"assignedUserName\":\"mpereira\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},
                \"accountName\":\"Multimac S.A\",\"accountId\":\"60a7c36c4cfecf17b\",\"equipamentosName\":\"00001\",\"equipamentosId\":\"606f2ddc5c6f30909\",\"quantidade\":\"" .$quantidade. "\",\"productId\":\"".$prodid."\"}";
            
                curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
                $response = curl_exec($curl);
                $err = curl_error($curl);
            }
        }
        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
        } 
        else{
            //echo $response;
        }
    }
    ?>
    <div data-role="page" style="background-color: lightgray;">
        <form action="requisicoes.php" method="get">
            <?php
            for ($x; $x < $i; $x++) {
                echo "<div data-role='collapsible' data-mini='true' id='requisicoes' data-theme='b' data-content-theme='a'>";
                echo "<h3>" . $ID_display[$x] . "</h3>";
                echo "<table data-role='table' data-mode='reflow' id='table' class='ui-responsive' >";
                echo "<thead> <tr> <th data-priority='1'> </th> <th data-priority='2'> </th> </thead> <tbody>";

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
                    if ($key == "productId") {
                        $prodidInpt[$i]=$value;
                    }
                    
                }
                echo "<tr> <td> <input type='text' id='id" . $ID_display[$x] . "' name='nmqt" . $prodidInpt[$i] . "' placeholder='Quant.'> </td> <td>  <input type='checkbox' name='nmop" . $ID_display[$x] . "' style='margin: 0.4em 0;'></td> </tr>";
                echo "</tbody> </table> </div>";
            }
            ?>
            <br>
            <input type="submit" name="submit" value="Submeter" data-mini="true" data-icon="navigation">
            <a data-icon="back" data-role="button" data-rel="back" data-mini="true" data-transition="pop" class="ui-link ui-btn ui-icon-back ui-btn-icon-left ui-shadow ui-corner-all ui-mini" role="button">Voltar</a>
        </form>
    </div>
</body>
</html>