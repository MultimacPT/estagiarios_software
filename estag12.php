<?php $b=$_GET['id']; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include "incl_jg_head.php" ?>
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
                        window.location.href = "estag12_2.php?id=" + id;
                        }
                    </script>                
                </fieldset>
            </form>
        </div>    
    </div>

</body>
</html>