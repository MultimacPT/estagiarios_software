<!DOCTYPE html>
<html>
    <head>
        <title>Formulário</title>

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
    </head>

    <body>
        <div data-role="page">
            <div data-role="header">
                <h3>Formulário Básico</h3>
            </div>

            <div data-role="main" class="ui-content">
                <form method="post" action="demoform.asp">
                    <fieldset data-role="controlgroup">
                        <legend>Suas informações:</legend>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" placeholder="João Catita">
                        <br>
                        <label for="bday">Aniversário:</label>
                        <input type="date" name="bday" id="bday">
                        <br>       
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="Email:">
                        <br>
                        <label for="male">Masculino</label>
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="female">Feminino</label>
                        <input type="radio" name="gender" id="female" value="female">
                    </fieldset>
                    
                    <fieldset class="ui-field-contain">
                    <legend>Data:</legend>
                        <label for="data">Data de hoje:</label>
                        <input type="date" name="data" id="data">
                        <br>
                        <label for="day">Dia da semana:</label>
                        <select name="day" id="day" data-native-menu="false">
                        <option value="mon">Segunda</option>
                        <option value="tue">Terça</option>
                        <option value="wed">Quarta</option>
                        <option value="thu">Quinta</option>
                        <option value="fri">Sexta</option>
                        <option value="sat">Sábado</option>
                        <option value="sun">Domingo</option>
                        </select>
                    </fieldset>
                    <fieldset data-role="controlgroup">
                        <legend>Tem conhecimento em qual destas linguagens:</legend>
                        <label for="c">C</label>
                        <input type="checkbox" name="ling" id="c" value="c">
                        <label for="cs">C#</label>
                        <input type="checkbox" name="ling" id="cs" value="cs">
                        <label for="j">Java</label>
                        <input type="checkbox" name="j" id="j" value="j">
                        <label for="js">Java Script</label>
                        <input type="checkbox" name="ling" id="js" value="js">
                        <label for="outros">Outras</label>
                        <input type="checkbox" name="ling" id="outros" value="outros">	
                    </fieldset>
                    <input type="submit" data-inline="true" value="Submeter">
                </form>
            </div>

            <div data-role="footer">
                <p>Feito por:<br>João Catita</p>
            </div>
        </div> 
    </body>
    
    
</html>