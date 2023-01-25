<?php

$b=$_GET['id'];

$curl = curl_init();
curl_setopt_array($curl, [
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

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $array = json_decode($response,true);
    foreach($array as $key => $value) {
    $a[$key] = $value;
    //echo $key . " => " . $value . "<br>";
    //echo '<input type="text" name="nome" id="nome" value="' . $key . " => " . $value . '" readonly><br>';
    //error_reporting(E_ALL & ~E_WARNING);
  }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>

    <?php include "incl_jg_head.php" ?>
    <title>RESULTADOS</title>

</head>
<body>

    <div data-role="page">
        <div data-role="header">
            <h3>RESULTADOS</h3>
        </div>

        <div style="text-align: center;">
            <h3>Técnico: M. Pereira</h3>
        </div> 

        <script>
            function voltar(){
            window.location.href = "estag12.php";
            } 
        </script>

        <div class="ui-field-contain">
            <div data-role="collapsible" class="ui-field-contain">
            <h3>Ticket</h3>  
                <label for="id">Id:</label>
                <input type="text" id="id" value="<?= $a["id"] ?>" readonly>
                <br>
                <label for="name">Nome Ticket:</label>
                <input type="text" id="name" value="<?= $a["name"] ?>" readonly>
                <br>
                <label for="number">Número Ticket:</label>
                <input type="text" id="number" value="<?= $a["number"] ?>" readonly>
                <br>
                <label for="status">Estado:</label>
                <input type="text" id="status" value="<?= $a["status"] ?>" readonly>
                <br>
                <label for="priority">Prioridade:</label>
                <input type="text" id="priority" value="<?= $a["priority"] ?>" readonly>
                <br>
                <label for="type">Tipo:</label>
                <input type="text" id="type" value="<?= $a["type"] ?>" readonly>
                <br>
                <label for="description">Descrição:</label>
                <input type="text" id="description" value="<?= $a["description"] ?>" readonly>
                <br>
                <label for="createdAt">Criado a:</label>
                <input type="text" id="createdAt" value="<?= $a["createdAt"] ?>" readonly>
                <br>
                <label for="modifiedAt">Modificado a:</label>
                <input type="text" id="modifiedAt " value="<?= $a["modifiedAt"] ?>" readonly>
                <br>
            </div>

            <div data-role="collapsible" class="ui-field-contain">
            <h3>Local</h3>  
                <label for="cP">Código Postal:</label>
                <input type="text" id="cP" value="<?= $a["cP"] ?>" readonly>
                <br>
                <label for="maps">Google Maps:</label>
                <input type="text" id="maps" value="<?= $a["maps"] ?>" readonly>
                <br>
            </div>

            <div data-role="collapsible" class="ui-field-contain">
            <h3>Conta</h3>  
                <label for="accountId">Id de Conta:</label>
                <input type="text" id="accountId" value="<?= $a["accountId"] ?>" readonly>
                <br>
                <label for="accountName">Nome de Conta:</label>
                <input type="text" id="accountName" value="<?= $a["accountName"] ?>" readonly> 
                <br>
                <label for="contactId">Id de Contacto:</label>
                <input type="text" id="contactId" value="<?= $a["contactId"] ?>" readonly>
                <br>
                <label for="contactName">Nome Contacto:</label>
                <input type="text" id="contactName" value="<?= $a["contactName"] ?>" readonly> 
                <br>
            </div>

            <div data-role="collapsible" class="ui-field-contain">
            <h3>Responsável</h3>  
                <label for="createdById">Id de criação:</label>
                <input type="text" id="createdById" value="<?= $a["createdById"] ?>" readonly> 
                <br>
                <label for="createdByName">Criado por:</label>
                <input type="text" id="createdByName" value="<?= $a["createdByName"] ?>" readonly> 
                <br>
                <label for="modifiedByName">Modificado por:</label>
                <input type="text" id="modifiedByName" value="<?= $a["modifiedByName"] ?>" readonly> 
                <br>
                <label for="modifiedById">Id de modificação:</label>
                <input type="text" id="modifiedById" value="<?= $a["modifiedById"] ?>" readonly> 
                <br>
            </div>

            <div data-role="collapsible" class="ui-field-contain">
            <h3>Outros</h3>  
                <label for="area">Área:</label>
                <input type="text" id="area" value="<?= $a["area"] ?>" readonly>
                <br>
                <label for="sla">SLA:</label>
                <input type="text" id="sla" value="<?= $a["sla"] ?>" readonly>
                <br>
                <label for="criticidade">Criticidade:</label>
                <input type="text" id="criticidade" value="<?= $a["criticidade"] ?>" readonly>
                <br>
                <label for="datahorafecho">Fecho:</label>
                <input type="text" id="datahorafecho" value="<?= $a["datahorafecho"] ?>" readonly>
                <br>
                <label for="ticketlife">ticketlife:</label>
                <input type="text" id="ticketlife" value="<?= $a["ticketlife"] ?>" readonly>
                <br>
                <label for="dentroSla">dentroSla:</label>
                <input type="text" id="dentroSla" value="<?= $a["dentroSla"] ?>" readonly>
                <br>
            </div>

            <a data-icon="back" data-role="button" data-theme="b" data-rel="back" data-mini="true" data-transition="pop" class="ui-link ui-btn ui-btn-b ui-icon-back ui-btn-icon-left ui-shadow ui-corner-all ui-mini" role="button">
                Voltar</a>
            
        </div>
    </div> 

</body>

</html>
