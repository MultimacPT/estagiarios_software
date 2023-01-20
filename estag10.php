<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


<script>
    var _hmt = _hmt || [];
    (
        function() 
        {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        }
        var _hmt = _hmt || [];

    )();
    
    </script>

</head>
    <body>

    <div data-role="page">
    <div data-role="header" data-position="fixed">
    <h1>Formulário</h1>
    </div>

        <div data-role="main" class="ui-content">
            <form method="post" action="demoform.asp">
                <div data-role="content">
                    <p for="Pnome">Primeiro nome:</p>
                    <input type="text" name="Pnome" id="Pnome" placeholder="Rodrigo">
                    <p for="Unome">Apelido:</p>  
                    <input type="text" name="Unome" id="Unome" placeholder="Sebastião">     
                    <p for="bday">Data de Nascimento:</p>
                    <input type="date" name="bday" id="bday">
                    <p for="email">E-mail:</p>
                    <input type="email" name="email" id="email" placeholder="example123@formulario.com">
                    <legend>Escolha o seu género:</legend>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="female">
                </div>
             <input type="submit" data-inline="true" value="Submit">
            </form>
        </div>
    </div>

</body>
</html>