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

    <style>.p
    {
        text-align: end;
    }
    </style>

    <style>.head            
    {
    background-color: lightblue;
    color: black; 
    top: 0;
    padding: 20px;
    text-align: center;
    }
    </style>

    <style>.buttom
    {
    background-color: lightgray; 
    align-items: center;            /*  Decoração do botão  */
    color: red;
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
                        window.location.href = "http://192.168.20.83:8080/p1/estagiarios_software/estag12.2.php?id=" + id;
                    }
                    </script>                
            </fieldset>
        </form>

    </div>    
</div>



</body>
</html>