
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Cliente</title>


    <style>.h1
    {
        background: lightblue;
        text-align: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999px;
        box-shadow: 0px 0px 6px 0px rgba(0, 255, 255, 0.5);
    }
    </style>

<style>.inf
    {
        
        text-align: center;

    }
    </style>



    
</head>
<body>

        <div class="h1"> 
            
            <h1>Informações</h1>

        </div>        
        <br><br><br><br><br>




        <label for="id">ID:</label>
        <div class="inf">

<?php
                $id=$_GET['id'];

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
                else 
                {
                    $array = json_decode($response,true);
                    
                    foreach($array as $key => $value) 
                    {
                        $a[$key] = $value;
                        error_reporting(E_ALL & ~E_WARNING);
                    }
                }
            }else{
            }
?>


        <input type="text" id="id" value="<?=  $a["id"] ?>"readonly>
        </div>

   
    
</body>
</html>



