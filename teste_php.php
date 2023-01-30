<?php
if (!empty($_GET['submit'])) {
    $var = $_GET['option1'];
    $var2 = $_GET['option2'];
    $var3 = $_GET['option3'];
    $var4 = $_GET['option4'];
    if (isset($var)) {
        
        $teste = '11';
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
    if (isset($var2)) {
       
        $teste = '12';
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
    if (isset($var3)) {
 
        $teste = '13';
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
    if (isset($var4)) {
       
        $teste = '14';
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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeeksforGeeks Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <style>
        .gfg {
            font-size: 40px;
            font-weight: bold;
            color: green;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="gfg">GeeksforGeeks</div>
        <h2>Form control: checkbox</h2>
        <p>The form below contains one checkbox.</p>
        <form method="get">
            <div class="checkbox">
                <label><input type="checkbox" name="option1" >Option 1</label>
                <label><input type="checkbox" name="option2" >Option 1</label>
                <label><input type="checkbox" name="option3" >Option 1</label>
                <label><input type="checkbox" name="option4" >Option 1</label>
                <label><button name="submit" value="true" class="btn btn-default">SUBMIT</button>
            </div>
        </form>
    </div>
</body>

</html>