

<?php
            $id="63c8229f11c5525a0";

            $userid="63bbf8d572c41d87d";
            $assiduidades = "
            https://mx.multimac.pt/mxv5/api/v1/Assiduidade?select=assignedUserId%2CassignedUserName%2Centrada%2Csaida&maxSize=25&offset=0&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=
            ";
            if($id != NULL)
            {
                $curl = curl_init();
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Assiduidade?select=assignedUserId%2CassignedUserName%2Centrada%2Csaida&maxSize=25&offset=0&orderBy=createdAt&order=desc&where%5B0%5D%5Btype%5D=equals&where%5B0%5D%5Battribute%5D=assignedUserId&where%5B0%5D%5Bvalue%5D=63bbf8d572c41d87d",
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
                  //echo "cURL Error #:" . $err;
                  //echo $key . " => " . $value . "<br>";

                } 
                else 
                {
                  $array = json_decode($response,true);
                

                }
            }
            else{};

            foreach($array['list'] as $key => $value) 
            {
                echo $value['assignedUserName']," - ",$value['entrada'],"  ",$value['saida'];
                echo "<br>";
            }
            


print_r($array);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>

    <input type="button" value="Limpar" onClick="history.go(0)">

</body>
</html>
