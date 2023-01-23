/*<!DOCTYPE html>
<html>
<head>
    <title>Teste</title>
</head>
<body>

<form>

    <fieldset style="width: 650px">
        <legend>Cotação</legend>
        <br/>
        <table frame="border" style="text-align: left;">
            <tr>
                <div>
                    <td width="25">
                        <h4>Item</h4>
                    </td>
                </div>

                <div>
                    <td width="300">
                        <h4>Descrição</h4>
                    </td>
                </div>

                <div>
                    <td width="25">
                        <h4>QTD</h4>
                    </td>
                </div>
                <td>
                    <h4>Valor Unit</h4>
                </td>
                <td>
                    <h4>Valor Total</h4>
                </td>
            </tr>

            <?php
            $x = 0;
                while ($x < 7)
                {   
                        $x ++;  


                        echo '
                            <tr style="text-align: left;">
                                <td>
                                    <input style="width: 25px" type="text" name="item" value="'.$x.'">
                                </td>
                                <td width="300">
                                    <input style="width: 300px" type="text" name="nome">
                                </td>
                                <td width="25" style="text-align: center;">
                                    <input style="width: 60px" type="number" name="quantidade">
                                </td>
                                <td>
                                    <input style="width: 120px" type="number" name="valorUnit">
                                </td>
                                <td>
                                    <input style="width: 120px" type="number" name="Valor">
                                </td>
                            </tr> ';
                };

            ?>
        </table>
        <br/>
        <fieldset style="width: 638px">
        <br/>
            <input type="submit" name="Enviar" <?php echo "<h5>  Respondidos $x </5>" ?>
            <br/>
            <br/>



        <br/>
    </fieldset>

    </fieldset>
</form>
</body>
</html>*/





<label for="id">ID:</label>
        <input type="text" id="id" value="<?= $a["id"]?>"readonly>