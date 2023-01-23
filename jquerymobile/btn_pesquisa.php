<?php
$value = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--  <script>
        var _hmt = _hmt || [];
            (function() {
            var hm = document.createElement("script");
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
            })();
    </script> -->
    <title>Página principal</title>
</head>

<body>
    <div data-role="page">

<div>
        <div class="header-blue" style=" background:black;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand" href="btn_pesquisa.php" style="color: white;">MULTIMAC</a>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                       
                          </div>
            </nav>
           
        </div>
    </div>




        <div data-role="main" class="ui-content">
            <form method="post" action="demoform.asp" id="myForm">
                <fieldset data-role="controlgroup">
                    <legend>Insira um ID:</legend>
                    <label for="inputField">id:</label>
                    <input type="text" name="id" id="inputField" placeholder="ex.: 65c9190e1cbfz03fa" required>
                    <br>

                    <input type="submit" value="BUSCAR" onclick="">
                </fieldset>
            </form>

            <script>
                $(document).on("submit", "#myForm", function(e) {
                    e.preventDefault();
                    var inputValue = $("#inputField").val();
                    window.location.href = "btn_pesquisa.php?id=" + inputValue;
                    //  $("#display").text("O id selecionado é: " + inputValue);
                });
            </script>

            <div>
                <p id="display"></p>
                <label id="display">
                    <h5>
                        <?php
                        if ($value !== null) {
                            $curl = curl_init();
                            curl_setopt_array($curl, [
                                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Account/" . $value,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
                                CURLOPT_POSTFIELDS => "",
                                CURLOPT_HTTPHEADER => [
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
                                $array = json_decode($response, true);

                                foreach ($array as $key => $value) {
                                    $a[$key] = $value;
                                    if (empty($value)) {
                                        echo $key . " => " . "0" . "<br>";
                                    } else {
                                        if (!is_array($value)) {
                                            echo $key . " => " . $value . "<br>";
                                        } else {
                                            $array1 = json_encode($value, true);
                                            echo $key . " => " . $array1 . "<br>";
                                        }
                                    }
                                }
                                //   echo $a["name"];
                            }
                        } else {
                        }
                        ?>
                    </h5>
                    <table>
            </div>

          



        </div>
    </div>

</body>

</html>