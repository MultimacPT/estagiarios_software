<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/themes/formulario_themes.css" />
    <link rel="stylesheet" href="css/themes/formulario_themes.min.css" />
    <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link href="estag12_2.php" rel="import" />



    <!--script>
  function idSearch(){
    var URLid = document.getElementById('ID').value;
    window.location.href = "estag12_2.php?id=" + URLid;
  }
  </script-->

</head>
    <body >

    <div data-role="page">
    <div data-role="header" data-position="fixed">
    <h1>Método de pesquisas super fixe 3000</h1>
    </div>

        <div data-role="main" class="ui-content">
            <!--form method="get" action="estag12_2.php">
                <div data-role="content">
                    <p for="ID">ID: :</p>
                    <input type="text"  id="ID">
                    <input type="submit" data-inline="true" value="Submit"-->
             <!--input type="submit" data-inline="true" value="Submit" id="click" onclick=idSearch()-->
             
            <!--/form-->
            <form action="estag12_2.php" method="get">
              <label for="ID" data-mini="true">id:</label>
              <input type="text" id="ID" name="id"><br><br>
              <input type="submit" value="Submit" data-mini="true" data-transition="fade">
            </form>
        </div>
    </div>
    </body>
</html>