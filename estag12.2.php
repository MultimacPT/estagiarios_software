
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

    
</head>
<body>

        <div class="h1"> 
            
            <h1>Informações</h1>

        </div>        
        <br><br><br><br><br>

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
            
            
            
            <label for="id">ID Modified:</label>
            <div class="inf">
            <input type="text" style="background-color:whitesmoke; border-style:solid; width: 700px; height: 25px; border-width:1px;" id="id" value="<?=  $a["id"] ?>"readonly>
            </div>
            <br>
            <label for="id">ID Modified:</label>
            <div class="inf">
            <input type="text" style="background-color:whitesmoke; border-style:solid; width: 700px; height: 25px; border-width:1px;" id="id" value="<?=  $a["id"] ?>"readonly>
            </div>


   
    
</body>
</html>



