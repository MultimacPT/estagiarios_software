<?php
    $id=$_GET['id']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <script>
        var _hmt = _hmt || [];
            (function() {
            var hm = document.createElement("script");
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
            })();
    </script>

    <script> 
        function procurar(){ 
        var URLid = document.getElementById('id').value;
        window.location.href = "estag11.php?id=" + URLid;  
        }
    </script>

    <script>
        function goBack() {
        window.history.back();
        }
    </script>

    <title>Encontre Informações</title>
</head>

<body>
<div data-role="page">
    <div data-role="header">
        <h3>ENCONTRE INFORMAÇÕES</h3>
    </div>

    <div data-role="main" class="ui-content">
        <form method="post" action="demoform.asp" id="myForm">  
            <legend>Insira um ID:</legend>
            <input type="text" id="id" placeholder="ex.: 65c9190e1cbfz03fa"> 
            <button onclick="redirect()">Submeter</button>    
            <button onclick="goBack()">Limpar</button>      
        </form>
        
        <script>
            function redirect() {
            var id = document.getElementById("id").value;
            window.location.href = "estag11.php?id=" + id;
            }
        </script>
        <div data-role="header">
            <?php
                if($id != NULL){
                $curl = curl_init();
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case/".$id,
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
                } 
                else {
                    $array = json_decode($response,true);
                    foreach($array as $key => $value) {
                    $a[$key] = $value;
                    echo $key . " <=> " . $value . "<br>...................................................................................................................................................................................................................................................................................................................................<br>";
                    error_reporting(E_ALL & ~E_WARNING);
                    }
                }    
            }else{
            }
            ?>
        </div>
    </div>

</div>
</body>
</html>