<?php
    $b=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <link rel="stylesheet" type="text/css" href="index.css" media="screen" />

    <style>.p
    {
        text-align: end;
    }
    </style>

    <style>.head            
    {
    background-color: lightblue;
    color: black; 
    padding: 20px;
    text-align: center;
    }
    </style>

    <style>.buttom
    {
    background-color: lightblue;             /*  Decoração do botão  */
    color: black;
    padding: 20px;
    text-align: center;
    }
    </style>
        
    <title>Informações</title>

    </head>

<body>
<div data-role="page">
    <div class="head">
        <h3>SUPORTE AO CLIENTE</h3>
    </div>

    <div data-role="main" class="ui-content">
        <form method="post" action="demoform.asp">
            <fieldset data-role="controlgroup">
                <b>Insira um ID:</b>
                    <label for="id"></label>
                    <input type="text" name="id" id="id" placeholder="Ex: 65c9190e1cbfz03fa">
                    <div class="p">
                        <small>Técnico Responsável: Duarte Barros</small>
                    </div>
                    <br>
                    <div class="buttom">
                    <button style="width: 150px; height: 50px;" onclick="redirect()" >Procurar</button>  
                    <br>
                    <button style="width: 150px; height: 50px;" onclick="document.getElementById('id').value=' '">Limpar</button>      
                    </div>
                    <br> 
                    <br>          
                    <script>
                    function redirect() {
                        var id = document.getElementById("id").value;
                        window.location.href = "http://192.168.20.177:8080/p1/index.php?id=" + id;
                    }
                    </script>                
            </fieldset>
        </form>

        <?php

            $curl = curl_init();
            if($b != NULL)
            {
                curl_setopt_array($curl, 
                [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case/".$b,
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

                    if ($err) 
                    {
                    echo "cURL Error #:" . $err;
                    } 
                    else 
                    {
                    $array = json_decode($response,true);

                    foreach($array as $key => $value) 
                    {
                        $a[$key] = $value;
                        echo $key . " => " . $value . "<br><-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->--<-->-<-->--<--><br>";
                        error_reporting(E_ALL & ~E_WARNING);
                    }
                    }
            }
            else{}

        ?>

    </div>    
</div>



</body>
</html>