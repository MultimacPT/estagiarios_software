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
        
    <title>Encontrar Informações</title>
</head>

<body>
<div data-role="page">
    <div data-role="header">
        <h3>ENCONTRE INFORMAÇÕES</h3>
    </div>

    <div data-role="main" class="ui-content">
        <form method="post" action="demoform.asp">
            <fieldset data-role="controlgroup">
                <legend>Insira um ID:</legend>
                    <label for="id">id:</label>
                    <input type="text" name="id" id="id" placeholder="ex.: 65c9190e1cbfz03fa">
                    <br>
                    <button onclick="redirect()">Submeter</button>                  
                    <script>
                        function redirect() {
                        var id = document.getElementById("id").value;
                        window.location.href = "http://localhost/p1/pag2.php?id=" + id;
                        }
                    </script>                
            </fieldset>
        </form>
    </div>    
</div>

</body>
</html>