<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Informações</title>
    <?php include"incl_jq_head.php"; ?>       

</head>

<body>

<div data-role="page">

	<div style="background-color: lightskyblue;" data-role="header">
		<h1>SUPORTE AO CLIENTE</h1>
	</div><!-- /header -->
    <br><br>
	<div role="main" class="ui-content">
        <form action="estag12_2.php" method="get">

            <label for="id">Insira o ID:</label>
            <input type="text" id="id" name="id"><br><br>
            <input type="submit" value="Submit">

        </form>
	</div><!-- /content -->
    <br><br>
	<div data-role="footer">
		<h4>By:Duarte Barros</h4>
	</div><!-- /footer -->
</div>

</body>
</html>

            <!--fieldset data-role="controlgroup">
                <b>Insira um ID:</b>
                    <label for="id"></label>
                    <input type="text" name="id" id="id" placeholder="Ex: 65c9190e1cbfz03fa">
                    <div class="p">
                        <small>Técnico Responsável: Duarte Barros</small>
                    </div>
                    <br>
                    <div class="buttom">
                    <button style="width: 150px; height: 50px; background-color: rgba(102, 255, 102, 0.4);" onclick="redirect()" >Procurar</button>  
                    <br>
                    <button style="width: 150px; height: 50px; background-color: rgba(255, 77, 77, 0.4);" onclick="document.getElementById('id').value=' '">Limpar</button>      
                    </div>
                    <br> 
                    <br>          
                    <script>
                    function redirect() {
                        var id = document.getElementById("id").value;
                        window.location.href = "http://192.168.1.101:8080/p1/estagiarios_software/estag12.2.php?id=" + id;
                    }
                    </script>                
            </fieldset-->

            <!--label for="select-choice-8" class="select">Multi-select with optgroups, custom icon and position:</label>
            <select name="select-choice-8" id="select-choice-8" multiple="multiple" data-native-menu="false" data-icon="grid" data-iconpos="left">
            <option>Choose a few options:</option>
            <optgroup label="USPS">
                <option value="standard" selected="">Standard: 7 day</option>
                <option value="rush">Rush: 3 days</option>
                <option value="express">Express: next day</option>
                <option value="overnight">Overnight</option>
            </optgroup>
            <optgroup label="FedEx">
                <option value="firstOvernight">First Overnight</option>
                <option value="expressSaver">Express Saver</option>
                <option value="ground">Ground</option>
            </optgroup>
            </select-->
 




