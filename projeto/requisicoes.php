<?php
//print_r($_GET);

$codmaq=331581;

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
    $name_display[$i] = $arrayID['name'];
    $desc_display[$i] = $arrayID['description'];
    $mod_display[$i] = $arrayID['modelo'];
    $prodidInpt[$i]="";
    $fID[$i] = $arrayID;
    $i += 1;
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include "html_head.php" ?>
    <title>mxtech</title>
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
                //echo $k,"=",$v,"-",$idreq,"<br>";
                
                $idreq=substr($k, 4);
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
    <form id="form1" action="requisicoes.php" method="get">
        <header>
            <div class="ui-grid-c" style="padding-right: 20px;">
                <div class="ui-block-a" style="display:table; margin:0 auto;">
                    <span style="display:table; margin:0 auto; font-size: 10px;text-align: center;">
                        <br>
                        <img src="images/mxtechnovo.png" style="width: 60px">
                        <br>
                        <font size="1">
                            <a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop"
                                aria-haspopup="true" aria-owns="popupDialog" aria-expanded="false" class="ui-link">
                                <i class="fa fa-envelope faa-horizontal faa-fast fa-2x animated" style="color:red;"></i>
                            </a>
                            <div style="display: none;" id="popupDialog-placeholder"></div>
                        </font>
                    </span>
                </div>
                
                <div class="ui-block-b">
                    <a href="" data-role="button" data-mini="true" class="ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" role="button" data-theme="a">Menu</a>
                </div>

                <div class="ui-block-c">
                    <a href="" data-ajax="false" class="ui-link-inherit ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" data-role="button" data-mini="true" data-theme="a" role="button" onclick="limparInput()">Limpar</a>
                </div>

                <div class="ui-block-d">
                    <input type="hidden" name="submit" value="Submeter" />
                    <button type="submit" form="form1" value="submit" data-mini="true" data-theme="c" class=" ui-btn ui-btn-c ui-shadow ui-corner-all ui-mini">Submeter</button>
                </div>
            </div>
        </header>

        <div data-role="page" style="background-color: #C6D0E2; margin-top:70px !important;">
            <div class="parentx">    
                <?php
                for ($x; $x < $i; $x++) {

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
                        }
                        if ($key == "productId") {
                            $prodidInpt[$i]=$value;
                        }    
                    }

                    echo "
                    <div class='normn' style='margin-top: -5px; border: 1px solid #ffa50000; background-color: #0000ff00; padding: 0px;'>
                        <div class='ui-grid-solo'>
                            <div class='ui-block-a'>
                                <div style='margin-left: 5px !important;' data-role='collapsible' data-theme='c' data-content-theme='b' data-mini='true'>
                                    <h6>
                                        <span style='margin-left: 1.5%'>PEÇA ". $x+1 ." </span>
                                        <br><br><br>
                                        <div class='ui-li-count' style='margin-top: -0.5em !important; width: 35% !important; font-size: 11px; right: auto !important; left: 10% !important; background-color:lightgreen; color:black;'>
                                            Id : ". $ID_display[$x] ." 
                                        </div>
                                        <div class='ui-li-count' style='margin-top: -0.5em !important; width: 25% !important; font-size: 11px; right: auto !important; left: 49% !important; background-color:lightgreen; color:black;'>
                                            Nome : ". $name_display[$x] ." 
                                        </div>
                                        <div class='ui-li-count' style='margin-top: 1.5em !important; width: 35% !important; font-size: 11px; right: auto !important; left: 10% !important; background-color:lightgreen; color:black;'>
                                            Peça : ". $desc_display[$x] ." 
                                        </div>
                                        <div class='ui-li-count' style='margin-top: 1.5em !important; width: 25% !important; font-size: 11px; right: auto !important; left: 49% !important; background-color:lightgreen; color:black;'>
                                            Modelo : ". $mod_display[$x] ." 
                                        </div>
                                        &nbsp;
                                        <span class='ui-li-count' style='width: 14% !important; margin-top: 1.1em !important;font-size: 12px; right: 8px !important; left: auto !important; background-color:lightgrey; color:black;'>
                                            &nbsp;&nbsp;Total: 4 &nbsp;&nbsp;
                                        </span>
                                    </h6>
                                    <h6 class='ui-collapsible-heading'>
                                        <table>
                                            <tr>
                                                <td> <input type='text' id='id" . $ID_display[$x] . "' name='nmqt" . $prodidInpt[$i] . "' data-theme='a' data-content='a' placeholder='Quant.'> <td>
                                                <td> <input type='checkbox' name='nmop" . $ID_display[$x] . "' style='margin: -1.26em 0;'> </td>
                                            </tr>
                                        </table>
                                    </h6>
                                    <script>
                                        function limparInput(){
                                        var id = document.getElementById('id" . $ID_display[$x] . "').value;
                                        window.location.href = 'requisicoes.php';
                                        } 
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>"; 
                }
                ?>
                <br>
            </div>
        </div>
    </form>
</body>
</html>