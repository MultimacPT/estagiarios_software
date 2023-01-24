
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Cliente</title>


    <style>.h1
    {
        background: lightgray;
        text-align: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999px;
    }
    </style>

    <style>.inf
    {  
        text-align: left;
        margin: 1px;
    }
    </style>

    <style>.p
    {
        text-align: end;
    }
    </style>

    
</head>
<body>

        <div class="h1"> 
            
            <h1>Informações</h1>

        </div>        
        <br>
        <br>
        <br>
        <br>

        <div class="p">
            <small>Criado por: Duarte Barros</small>
        </div>


        <br>

        <ul>
                <li style=" background-color:rgba(102, 204, 255, 0.4); text-align:left; width: 100px; height: 20px; ">Identificação</li>
                <br>
                <li style=" background-color:rgba(255, 77, 77, 0.4); text-align:left; width: 100px; height: 20px; ">Morada</li>
                <br>
                <li style=" background-color:rgba(102, 255, 102, 0.4); text-align:left; width: 100px; height: 20px; ">Ticket</li>
                <br>
                <li style=" background-color:rgba(255, 255, 102, 0.4); text-align:left; width: 100px; height: 20px; ">Outros</li>
        </ul>

        <br>




       

<?php
                $id=$_GET['id'];

            if($id != NULL)
            {
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
                    
                if ($err) 
                {
                  echo "cURL Error #:" . $err;
                  echo $key . " => " . $value . "<br>";

                } 
                else 
                {
                  $array = json_decode($response,true);
                
                  foreach($array as $key => $value) 
                  {
                    $a[$key] = $value;
                    echo $key . " => " . $value . "<br>";
                    error_reporting(E_ALL & ~E_WARNING);
                  }
                }
            }
            else{}
?>

            <label for="id"><b>ID:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="id" value="<?=  $a["id"] ?>"readonly>
            </div>
            <br>
            <label for="name "><b>Nome:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="name " value="<?=  $a["name "] ?>"readonly>
            </div>
            <br>
            <label for="accountName"><b>Nome da Conta:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="accountName" value="<?=  $a["accountName"] ?>"readonly>
            </div>
            <br>
            <label for="accountId "><b>ID da Conta:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="accountId " value="<?=  $a["accountId "] ?>"readonly>
            </div>
            <br>
            <label for="modifiedByName "><b>Nome Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedByName " value="<?=  $a["modifiedByName "] ?>"readonly>
            </div>
            <br>
            <label for="modifiedById "><b>ID Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedById " value="<?=  $a["modifiedById "] ?>"readonly>
            </div>
            <br>
            <label for="modifiedByName "><b>Nome de Utizador Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedByName " value="<?=  $a["modifiedByName "] ?>"readonly>
            </div>
            <br>
            <label for="assignedUserId "><b>ID de Utilizador Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="assignedUserId " value="<?=  $a["assignedUserId "] ?>"readonly>
            </div>
            <br>
            <br>
            <br>
            <label for="cP"><b>Código Postal:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="cP" value="<?=  $a["cP"] ?>"readonly>
            </div>
            <br>
            <label for="acaddressStreet  "><b>Rua:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressStreet  " value="<?=  $a["acaddressStreet  "] ?>"readonly>
            </div>
            <br>
            
            <label for="acaddressCity  "><b>Cidade:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressCity  " value="<?=  $a["acaddressCity  "] ?>"readonly>
            </div>
            <br>
            
            <label for="acaddressState  "><b>Estado:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressState  " value="<?=  $a["acaddressState  "] ?>"readonly>
            </div>
            <br>
            
            <label for="acaddressCountry  "><b>País:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressCountry  " value="<?=  $a["acaddressCountry  "] ?>"readonly>
            </div>
            <br>
            
            <label for="maps  "><b>Localização no Mapa:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="maps  " value="<?=  $a["maps  "] ?>"readonly>
            </div>
            <br>
            <br>
            <br>
            
            <label for="number  "><b>Ticket:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="number  " value="<?=  $a["number  "] ?>"readonly>
            </div>
            <br>
            
            <label for="status  "><b>Status:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="status  " value="<?=  $a["status  "] ?>"readonly>
            </div>
            <br>
            
            <label for="priority  "><b>Prioridade:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="priority  " value="<?=  $a["priority  "] ?>"readonly>
            </div>
            <br>
            
            <label for="type  "><b>Tipo:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="type  " value="<?=  $a["type  "] ?>"readonly>
            </div>
            <br>
            
            <label for="description  "><b>Descrição:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="description  " value="<?=  $a["description  "] ?>"readonly>
            </div>
            <br>
            
            <label for="createdAt  "><b>Criação At:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="createdAt  " value="<?=  $a["createdAt  "] ?>"readonly>
            </div>
            <br>
            
            <label for="modifiedAt   "><b>Modificação At:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedAt  " value="<?=  $a["modifiedAt  "] ?>"readonly>
            </div>
            <br>

            <label for="assignedUserId "><b>Data e Hora de Fecho:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="assignedUserId " value="<?=  $a["assignedUserId "] ?>"readonly>
            </div>
            <br>
            
            <label for="descprob  "><b>Equipa:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="descprob  " value="<?=  $a["descprob  "] ?>"readonly>
            </div>
            <br>

            <label for="area  "><b>Área:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="area  " value="<?=  $a["area  "] ?>"readonly>
            </div>
            <br>

            <label for="sla  "><b>SLA:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="sla  " value="<?=  $a["sla  "] ?>"readonly>
            </div>
            <br>

            <label for="criticidade  "><b>Criticidade:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="criticidade  " value="<?=  $a["criticidade  "] ?>"readonly>
            </div>
            <br>
            
            <label for="ticketlife  "><b>Expiração do Ticket:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="ticketlife  " value="<?=  $a["ticketlife  "] ?>"readonly>
            </div>
            <br>
            
            <label for="userAT "><b>User AT:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="userAT " value="<?=  $a["userAT "] ?>"readonly>
            </div>
            <br>

            <label for="passwordAT  "><b>Password AT: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="passwordAT  " value="<?=  $a["passwordAT  "] ?>"readonly>
            </div>
            <br>

            <label for="licenca  "><b>Licenca: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="licenca  " value="<?=  $a["licenca  "] ?>"readonly>
            </div>
            <br>

            <label for="temInternet   "><b>Tem Internet: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="temInternet   " value="<?=  $a["temInternet   "] ?>"readonly>
            </div>
            <br>

            <label for="validacao   "><b>Validação: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="validacao   " value="<?=  $a["validacao   "] ?>"readonly>
            </div>
            <br>

            
            


   
    
</body>
</html>



