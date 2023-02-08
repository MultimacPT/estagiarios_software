<?php

$i = 0;
$x = 0;
$getcodmaq='331581';//desenvolvimento
$getnumeroit='3563';//desenvolvimento
//$getcodmaq=$_GET['getcodmaq'];//producao
//$getnumeroit=$_GET['getnumeroit'];//producao

$curlCOD = curl_init();
curl_setopt_array($curlCOD, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Equipamentos?maxSize=25&offset=0&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=startsWith&where%5B0%5D%5Battribute%5D=name&where%5B0%5D%5Bvalue%5D=".$getcodmaq,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => ["X-Api-Key: 4551D74F0502A6409445E49961896B49"],
]);

curl_setopt($curlCOD, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlCOD, CURLOPT_SSL_VERIFYPEER, false);
$responseCOD = curl_exec($curlCOD);
$errCOD = curl_error($curlCOD);
curl_close($curlCOD);

if($errCOD){
    echo "cURL Error #:" . $errCOD;
} 
else{
    $arrayCOD = json_decode($responseCOD, true);
}

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Consumiveisvsmodelo?where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=modelo&where%5B0%5D%5Bvalue%5D=".$arrayCOD['list'][0]['modelo'],
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
    $arrayMOD = json_decode($response, true);
}

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Requisicoes?maxSize=25&offset=0&orderBy=numreq&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=equipamentosId&where%5B0%5D%5Bvalue%5D=".$arrayCOD['list'][0]['id'],
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
    $arrayREQ = json_decode($response, true);
}

foreach ($arrayREQ['list'] as $k => $v){
    if ($v['itnum']==$getnumeroit){
        $displayErro="block";
    }
    else{
        $displayErro="none";
    }
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
    if (isset($_GET['submit']) and  $displayErro!="block") {
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
                \"accountId\":\"".$arrayCOD['list'][0]['accountId']."\",\"itnum\":\"" . $getnumeroit . "\",\"equipamentosId\":\"".$arrayCOD['list'][0]['id']."\",\"quantidade\":\"" .$quantidade. "\",\"productId\":\"".$prodid."\"}";
            
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
                    <span style="display:table; margin:0 auto; font-size: 10px;text-align: center;"><br>
                        <img src="images/mxtechnovo.png" style="width: 60px"><br>
                    </span>
                </div>
                
                <div class="ui-block-b">
                    <a href="" data-role="button" data-mini="true" class="ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" role="button" data-theme="a">Menu</a>
                </div>

                <div class="ui-block-c">
                    <a href="" data-ajax="false" class="ui-link-inherit ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" data-role="button" data-mini="true" data-theme="a" role="button" onclick="limparInput()">Limpar</a>
                </div>

                <div class="ui-block-d">
                    <input type="hidden" name="getcodmaq" value="<?= $getcodmaq ?>" />
                    <input type="hidden" name="getnumeroit" value="<?= $getnumeroit ?>" />
                    <button type="submit" form="form1" value="submit" data-mini="true" data-theme="c" class=" ui-btn ui-btn-c ui-shadow ui-corner-all ui-mini">Submeter</button>

                </div>

                <script>
                    function limparInput(){
                    window.location.href = 'requisicoes.php';
                    } 
                </script>
            </div>
        </header>

        <div data-role="page" style="background-color: #C6D0E2; margin-top:67px !important;">
            <div class="parentx">   
                <!--a href="#popupBasic" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-transition="pop">Basic Popup</a>
                <div data-role="popup" id="popupBasic">
                <p>This is a completely basic popup, no options set.</p>
                </div-->    
                <br> 
                <?php
                foreach($arrayMOD['list'] as $k => $v){ 
                    $x++;
                    echo "
                    <div class='normn' style='margin-top: -5px; border: 1px solid #ffa50000; background-color: #0000ff00; padding: 0px;'>
                        <div class='ui-grid-solo'>
                            <div class='ui-block-a'>
                                <div style='margin-left: 5px !important;' data-role='collapsible' data-theme='c' data-content-theme='b' data-mini='true'>
                                    <h6>
                                        <span style='margin-left: 1.5%'>PEÇA ". $x ." </span>
                                        <br><br>
                                        <div class='ui-li-count' style='margin-top: -0.25em !important; width: 35% !important; font-size: 11px; right: auto !important; left: 8% !important; background-color:lightgreen; color:black;'>
                                            Ref.: ". $v['name'] ." 
                                        </div>
                                        <div class='ui-li-count' style='margin-top: -0.25em !important; width: 35% !important; font-size: 11px; right: auto !important; left: 49% !important; background-color:lightgreen; color:black;'>
                                            ". $v['description'] ." 
                                        </div>
                                        &nbsp;
                                    </h6>
                                    <h6 class='ui-collapsible-heading'>
                                        <table>
                                            <tr>
                                                <td> <input type='text' id='id" . $v['productId'] ."' name='nmqt" . $v['productId'] . "' data-theme='a' data-content='a' placeholder='Quant.'> <td>
                                                <td> <input type='checkbox' name='nmop" . $x . "' style='margin: -1.26em 0;'> </td>
                                            </tr>
                                        </table>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>"; 
                }
                ?>
                <br>
            </div>
            <?php
            
            echo "
                <div style='margin-left: 5px !important;' data-role='collapsible' data-theme='f' data-content-theme='b' data-mini='true'>
                    <h6>
                        <span style='margin-left: 1.5%'>LISTA</span>
                    </h6>
                    <h6 class='ui-collapsible-heading'>
                        <table>
                            <tr>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: -1.5em !important; width: 18% !important; font-size: 11px; right: auto !important; left: 1% !important; background-color:orange; color:black;'>
                                    Equipamentos</div> 
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: -1.5em !important; width: 8% !important; font-size: 11px; right: auto !important; left: 24% !important; background-color:orange; color:black;'>
                                    ItNum</div> 
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: -1.5em !important; width: 11% !important; font-size: 11px; right: auto !important; left: 39% !important; background-color:orange; color:black;'>
                                    NumReq</div> 
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: -1.5em !important; width: 6% !important; font-size: 11px; right: auto !important; left: 56% !important; background-color:orange; color:black;'>
                                    Tipo</div> 
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: -1.5em !important; width: 10% !important; font-size: 11px; right: auto !important; left: 69% !important; background-color:orange; color:black;'>
                                    Produto</div> 
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: -1.5em !important; width: 10% !important; font-size: 11px; right: auto !important; left: 86% !important; background-color:orange; color:black;'>
                                    Qntd.</div> 
                                </td>
                            </tr>";
                            foreach ($arrayREQ['list'] as $k => $v){
                                echo"
                            <tr>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: 0.5em !important; width: 18% !important; font-size: 11px; right: auto !important; left: 1% !important; background-color:lightgrey; color:black;'>
                                    ".$v['equipamentosName']."</div>
                                </td> 
                                <td> 
                                    <div class='ui-li-count' style='margin-top: 0.5em !important; width: 8% !important; font-size: 11px; right: auto !important; left: 24% !important; background-color:lightgrey; color:black;'>
                                    ".$v['itnum']."</div>
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: 0.5em !important; width: 11% !important; font-size: 11px; right: auto !important; left: 39% !important; background-color:lightgrey; color:black;'>
                                    ".$v['numreq']."</div>
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: 0.5em !important; width: 6% !important; font-size: 11px; right: auto !important; left: 56% !important; background-color:lightgrey; color:black;'>
                                    ".$v['tipo']."</div>
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: 0.5em !important; width: 10% !important; font-size: 11px; right: auto !important; left: 69% !important; background-color:lightgrey; color:black;'>
                                    ".$v['productName']."</div>
                                </td>
                                <td> 
                                    <div class='ui-li-count' style='margin-top: 0.5em !important; width: 10% !important; font-size: 11px; right: auto !important; left: 86% !important; background-color:lightgrey; color:black;'>
                                    ".$v['quantidade']."</div>
                                </td>
                            </tr>      
                        </table>
                        <br><br><br>";
                            }
                        echo"
                    </h6>
                </div>";
            ?>
        </div>
    </form>
</body>
</html>