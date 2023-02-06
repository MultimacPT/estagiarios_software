<!DOCTYPE html>
<html lang="en">
<head>

    <?php include "html_head.php" ?>
    <title>Encontrar Informações</title>

</head>
<body>
    
    <div data-role="page">
        <div data-role="header">
            <h3>ENCONTRE INFORMAÇÕES</h3>
        </div>

        <div data-role="main" class="ui-content">
        <form action="estag12_2.php" method="get">
            <label for="id">Insira o ID:</label>
            <input type="text" id="id" name="id" placeholder="ex.: 63b3150e9cbcc01fb">
            <br>
            <input type="submit" value="Submeter" class="ui-shadow">
        </form>
        </div>    
    </div>

</body>
</html>