<html>
<head>
    <?php include"incl_jq_head.php"; ?>
    <title>Assiduidades</title>
</head>
<body>

<?php

if(isset($_POST['button3'])) 
{

$loja = $_POST['loja'];
$funcionario = $_POST['funcionario'];
$tipo = $_POST['tipo'];
$hem = $_POST['horario1'];
$hsm = $_POST['horario2'];
$het = $_POST['horario3'];
$hst = $_POST['horario4'];

// ------------------------------------- Meter PHP post aqui -----------------------------------------------
        $curl = curl_init();

        curl_setopt_array($curl, 
        [
        CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Assiduidade",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"assignedUserId\":\"63bbf8d572c41d87d\",\"assignedUserName\":\"dbarros\",\"teamsIds\":[\"63bbf88d567391e32\"],\"teamsNames\":{\"63bbf88d567391e32\":\"Estagiarios\"},\"loja\":\"".$loja."\",\"fincionario\":\"".$funcionario."\",\"tipo\":\"".$tipo."\",\"horario1\":\"".$hem."\",\"horario2\":\"".$hsm."\",\"horario3\":\"".$het."\",\"horario4\":\"".$hst."\",\"description\":\"nova_entrada\"}",
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

            if ($err) 
            {
            echo "cURL Error #:" . $err;
            } 
            else 
            {
            echo $response;
            }

}
?>



<div data-role="page">
    <div data-role="header">
        <form method="post">
        <header>
                <img src="multimac.jpg" width="140px" height="50px" alt="Multimac"><br><br>
                <label>Loja:</label>
                <input type="text" name="loja"><br>
                <label>Funcionário:</label>
                <input type="text" name="funcionario"><br>
                <label>Tipo:</label>
                <input type="text" name="tipo"><br>
                <h4>Parte da Manhã</h4>
                <label>Entrada:</label>
                <input style="width: 100px" type="time" name="horario1" />
                <label>Saída:</label>
                <input style="width: 100px" type="time" name="horario2" /><br>
                <h4>Parte da Tarde</h4>
                <label>Entrada:</label>
                <input style="width: 100px" type="time" name="horario3" />
                <label>Saída:</label>
                <input style="width: 100px" type="time" name="horario4" />
                <label>Data:</label><br>
                <input style="width: 150px" type="date" name="data"><br>
                <input type="submit" name="button3"value="Submeter"/>
        </header>
        </form>

        <div data-role="footer">
		    <h4>Creator:Duarte Barros</h4>
	    </div>
    </div>

</div>

</body>
</html>



