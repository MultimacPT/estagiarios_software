<?php
            $id=$_GET['id'];

            if($id != NULL)
            {
                $curl = curl_init();
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://mx.multimac.pt/mxv5/api/v1/Case/".$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
                CURLOPT_HTTPHEADER => ["X-Api-Key: 4551D74F0502A6409445E49961896B49"],
                ]);
                
                // Desactiva o certificado SSL
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                    
                if ($err) 
                {
                  //echo "cURL Error #:" . $err;
                  //echo $key . " => " . $value . "<br>";

                } 
                else 
                {
                  $array = json_decode($response,true);
                
                  foreach($array as $key => $value) 
                  {
                    $a[$key] = $value;
                    //echo $key . " => " . $value . "<br>";
                    //error_reporting(E_ALL & ~E_WARNING);
                  }
                }
            }
            else{};
            
?>
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
        <div data-role="collapsible">
            <h4><?= $a['accountName'] ?></h4>
            <p>Assigned User Name:   <?= $a['assignedUserName'] ?></p>
            <p>Assigned User Id:     <?= $a['assignedUserId'] ?></p>
            <p>Modified By Name:     <?= $a['modifiedByName'] ?></p>
            <p>Modified By Id:       <?= $a['modifiedById'] ?></p>
            <p>Created By Name:      <?= $a['createdByName'] ?></p>
            <p>Created By Id:        <?= $a['createdById'] ?></p>
        </div>
	</div>

    <div role="main" class="ui-content">
        <div data-role="collapsible">
            <h4>Morada:              <?= $a['acaddressPostalCode'] ?></h4>
            <p>Rua:                  <?= $a['acaddressStreet'] ?></p>
            <p>Localização no Mapa:  <?= $a['maps'] ?></p>

        </div>
	</div>

    <div role="main" class="ui-content">

        <div data-role="collapsible">
            <h4>Ticket:              <?=$a['number'] ?></h4>
            <p>Status:               <?= $a['status'] ?></p>
            <p>Prioridade:           <?= $a['priority'] ?></p>
            <p>Tipo:                 <?= $a['type'] ?></p>
            <p>Data de Criação:      <?= $a['createdAt'] ?></p>
            <p>Data de Modificação:  <?= $a['modifiedAt'] ?></p>
            <p>Equipa Responsável:   <?= $a['descprob'] ?></p>
            <p>Área:                 <?= $a['area'] ?></p>
            <p>SLA:                  <?= $a['sla'] ?></p>
            <p>Criticidade:          <?= $a['criticidade'] ?></p>
            <p>Data e Hora de Fecho: <?= $a['datahorafecho'] ?></p>
            <p>Expiração do Ticket:  <?= $a['ticketlife'] ?></p>
            <p>Tem Internet:         <?= $a['temInternet'] ?></p>
            <p>User AT:              <?= $a['userAT'] ?></p>
            <p>Password AT:          <?= $a['passwordAT'] ?></p>
            <p>Licença:              <?= $a['licenca'] ?></p>
        </div>
	</div>
    <br>
    <input type="button" value="Voltar" onClick="history.go(-1)">
    <br><br><br><br>
	<div data-role="footer">
		<h4></h4>
	</div>
</div>


</body>
</html>
    <!--div class="ui-grid-b" data-mini="true">
        <div class="ui-block-a" data-mini="true"><a href="index.html" data-role="button" data-inline="true">Cancel</a></div>
        <div class="ui-block-b" data-mini="true"><a href="index.html" data-role="button" data-inline="true">Cancel</a></div>
        <div class="ui-block-c" data-mini="true"><a href="index.html" data-role="button" data-inline="true">Cancel</a></div>
    </div-->

    <!--div class="ui-grid-solo">
        <div class="ui-block-a"><input type="button" value="More"></div>
    </div-->

    

    <!--div style="background-color: transparent;" class="ui-grid-solo">
        <div class="ui-block-a">
            <div data-role="collapsible" data-collapsed-icon="false" data-expanded-icon="false" data-theme="b" data-content-theme="e" data-mini="true" data-collapsed="true" class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-themed-content"><h6 class="ui-collapsible-heading"><a href="#" class="ui-collapsible-heading-toggle ui-btn ui-btn-b ui-mini ui-icon-false">1(36)&nbsp;GAER - INST.MED.RADIOL.CLÍNICA SA<span style="float:right;font-size: 10px;">XM3150+</span><br>
                    <span style="color:red;">S/ GARANTIA </span><span style="font-size: 10px; "> &nbsp;&nbsp;2022-12-19 &nbsp; 17:11</span>
                    <span style="float:right;font-size: 10px;">4000-098 PORTO</span><br>
                                        <span style="float:left;font-size: 11px;">recolher contagem</span>
                    <span style="float:right;"></span><br>
                    &nbsp;usr:icamilo&nbsp;<span style="float:left;font-size: 11px;background-color:white;color:brown;"><i>Secretariado</i></span><span style="color:blue; float:right;font-size: 14px;"><i style="background-color:white;color:red;">&nbsp;&nbsp;muitas ITs&nbsp;&nbsp;</i><br></span><br>                    <span style="background-color:yellow; color:blue; float:right;font-size: 12px;"></span>
                <span class="ui-collapsible-heading-status"> click to collapse contents</span></a></h6><div class="ui-collapsible-content ui-body-e" aria-hidden="false">
                


                <div class="ui-grid-a" data-mini="true">
                    <div class="ui-block-a" data-mini="true"><span style="font-size: 12px;">
                            Rua  Augusto Rosa, 192<br>4000-098 PORTO<br> IT nº 89622 <br> Cl nº 32059</span>
                    </div>
                    <div class="ui-block-b" data-mini="true">
                        <span style="font-size: 14px;">Nome:PEDIDO P/ ESCRITÓRIO                    <br>Cod:
                            <a style="font-size: 18px;" href="#" onclick="window.open('http://intranet.multimac.pt/mxtech/dashboard.php?var=292222', 'mxdashboard');
                            return false;" class="ui-link">292222                            </a>
                        </span><br>
                        <span style="font-size: 14px;">s/n:70166PHH0B371<br>var:63648</span>
                    </div>
                </div>
                                    <div class="ui-grid-solo">

                        <div data-theme="a" class="ui-block-a" data-mini="true">
                            <div class="ui-input-text ui-body-a ui-corner-all ui-shadow-inset"><input data-theme="a" cdata-mini="true" value="" placeholder="Ordem" type="text" name="o63648" id="o63648"></div>
                        </div>

                    </div>

                    <div class="ui-grid-b" data-mini="true">
                        <div style="display: none" class="ui-block-a">
                            <div class="ui-select ui-mini"><a href="#" role="button" id="p63648-button" aria-haspopup="true" class="ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-a ui-corner-all ui-shadow"><span>&nbsp;</span></a><select name="p63648" id="p63648" data-native-menu="false" data-mini="true" data-theme="a" tabindex="-1">
                                <option value="0">&nbsp;</option>
                                <option value="0">&nbsp;</option>
                                <option value="1">Aguarda consumiveis</option>
                                <option value="2">Aguarda Peças</option>
                                <option value="3">Ligar para Marcar</option>
                                <option value="4">Aguarda. Orçamento</option>
                                <option value="5">Aguarda. Vendas</option>
                                <option value="6">Pendente</option>
                            </select><div style="display: none;" id="p63648-listbox-placeholder"><!-- placeholder for p63648-listbox ></div></div>
                        </div>
                        <div class="ui-block-b">
                            <a style="display: none" href="its_fechar01.php?v1=63648" data-role="button" data-mini="true" data-theme="a" data-transition="fade" class="ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" role="button">Detalhes</a>
                        </div>
                        <div class="ui-block-c">
                            
                            <div class="ui-checkbox ui-mini"><label data-theme="a" for="g63648" class="ui-btn ui-corner-all ui-btn-a ui-btn-icon-right ui-checkbox-off">Urgente</label><input data-iconpos="right" data-theme="a" data-mini="true" type="checkbox" name="g63648" id="g63648"></div>
                        </div>
                    </div>

                    <div class="ui-grid-b" data-mini="true">
                        <div class="ui-block-a" data-theme="a">
                            <a href="#" data-role="button" data-mini="true" data-theme="a" class="ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" role="button">imprimir IT</a>
                        </div>
                        <div class="ui-block-b" data-theme="a">
                            <div class="ui-select ui-mini"><a href="#" role="button" id="63648-button" aria-haspopup="true" class="ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-a ui-corner-all ui-shadow"><span>REMT</span></a><select name="63648" id="63648" data-native-menu="false" data-mini="true" data-theme="a" tabindex="-1">
                                <option value="30">REMT</option>
                                <option value="132">A.A.</option><option value="187">ALRM</option><option value="31">BARR</option><option value="179">BC.A</option><option value="178">BC.M</option><option value="21">C.C.</option><option value="19">C.P.</option><option value="129">C.V.</option><option value="131">ESTG</option><option value="190">G.C.</option><option value="1">GONC</option><option value="119">H.P.</option><option value="183">H.R.</option><option value="80">J.B.</option><option value="10">J.L.</option><option value="115">J.R.</option><option value="43">JOTA</option><option value="17">L.L.</option><option value="159">LOUR</option><option value="200">M.A.</option><option value="133">M.C.</option><option value="130">M.G.</option><option value="29">MORE</option><option value="116">N.P.</option><option value="83">P.A.</option><option value="5">P.G.</option><option value="82">P.P.</option><option value="77">R.C.</option><option value="90">R.F.</option><option value="30">REMT</option><option value="7">RICA</option><option value="191">SVLX</option><option value="145">URGE</option>                            </select><div style="display: none;" id="63648-listbox-placeholder"><!-- placeholder for 63648-listbox --></div></div>
                        <!--/div>
                        <div class="ui-block-c">
                            <a href="#" data-role="button" data-mini="true" data-theme="a" class="ui-link ui-btn ui-btn-a ui-shadow ui-corner-all ui-mini" role="button">Requisições</a>
                        </div-->

                        <!--div class="ui-grid-b" data-mini="true" >
                            <div class="ui-block-a">
                                <a href="#" data-role="button" data-mini="true" data-theme="a">imprimir IT</a>
                            </div>
                            <div class="ui-block-b">
                                <a href="its_fechar01.php?v1=63648" data-role="button" data-mini="true" data-theme="a" data-transition="fade">Detalhes</a>
                            </div>
                            <div class="ui-block-c">
                                <a href="#" data-role="button" data-mini="true" data-theme="a">Requisições</a>
                            </div>
                        </div-->




                    <!--/div>
                    
                                <a href="waze://?q=Rua  Augusto Rosa, 192+4000-098 PORTO" target="_blank" class="ui-link">
                                    <img src="http://mxt.pt/images/waze.png" width="40">
                                </a>
                                <a href="http://maps.google.com/maps?q=Rua  Augusto Rosa, 192+4000-098 PORTO" target="_blank" class="ui-link">
                                    <img src="http://mxt.pt/images/maps.png" width="40">
                                </a><a href="tel:932101700" target="_blank" class="ui-link">
                                                     <img src="http://mxt.pt/images/call.png" width="40">
                                                  </a>
                    </div>
            </div>
    </div>
</div-->


            <!--label for="id"><b>ID:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="id" value="<?=  $a["id"] ?>"readonly>
            </div>
            <br>
            <label for="name "><b>Nome:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="name " value="<?=  $a["name "] ?>"readonly>
            </div>
            <br>
            <label for="accountName"><b>Nome da Conta:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="accountName" value="<?=  $a["accountName"] ?>"readonly>
            </div>
            <br>
            <label for="accountId "><b>ID da Conta:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="accountId " value="<?=  $a["accountId "] ?>"readonly>
            </div>
            <br>
            <label for="modifiedByName "><b>Nome Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedByName " value="<?=  $a["modifiedByName "] ?>"readonly>
            </div>
            <br>
            <label for="modifiedById "><b>ID Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedById " value="<?=  $a["modifiedById "] ?>"readonly>
            </div>
            <br>
            <label for="modifiedByName "><b>Nome de Utizador Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedByName " value="<?=  $a["modifiedByName "] ?>"readonly>
            </div>
            <br>
            <label for="assignedUserId "><b>ID de Utilizador Modified:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 204, 255, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="assignedUserId " value="<?=  $a["assignedUserId "] ?>"readonly>
            </div>
            <br>
            <br>
            <br>
            <label for="cP"><b>Código Postal:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="cP" value="<?=  $a["cP"] ?>"readonly>
            </div>
            <br>
            <label for="acaddressStreet  "><b>Rua:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressStreet  " value="<?=  $a["acaddressStreet  "] ?>"readonly>
            </div>
            <br>
            
            <label for="acaddressCity  "><b>Cidade:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressCity  " value="<?=  $a["acaddressCity  "] ?>"readonly>
            </div>
            <br>
            
            <label for="acaddressState  "><b>Estado:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressState  " value="<?=  $a["acaddressState  "] ?>"readonly>
            </div>
            <br>
            
            <label for="acaddressCountry  "><b>País:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="acaddressCountry  " value="<?=  $a["acaddressCountry  "] ?>"readonly>
            </div>
            <br>
            
            <label for="maps  "><b>Localização no Mapa:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(255, 77, 77, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="maps  " value="<?=  $a["maps  "] ?>"readonly>
            </div>
            <br>
            <br>
            <br>
            
            <label for="number  "><b>Ticket:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="number  " value="<?=  $a["number  "] ?>"readonly>
            </div>
            <br>
            
            <label for="status  "><b>Status:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="status  " value="<?=  $a["status  "] ?>"readonly>
            </div>
            <br>
            
            <label for="priority  "><b>Prioridade:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="priority  " value="<?=  $a["priority  "] ?>"readonly>
            </div>
            <br>
            
            <label for="type  "><b>Tipo:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="type  " value="<?=  $a["type  "] ?>"readonly>
            </div>
            <br>
            
            <label for="description  "><b>Descrição:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="description  " value="<?=  $a["description  "] ?>"readonly>
            </div>
            <br>
            
            <label for="createdAt  "><b>Criação At:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="createdAt  " value="<?=  $a["createdAt  "] ?>"readonly>
            </div>
            <br>
            
            <label for="modifiedAt   "><b>Modificação At:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="modifiedAt  " value="<?=  $a["modifiedAt  "] ?>"readonly>
            </div>
            <br>

            <label for="assignedUserId "><b>Data e Hora de Fecho:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="assignedUserId " value="<?=  $a["assignedUserId "] ?>"readonly>
            </div>
            <br>
            
            <label for="descprob  "><b>Equipa:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="descprob  " value="<?=  $a["descprob  "] ?>"readonly>
            </div>
            <br>

            <label for="area  "><b>Área:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="area  " value="<?=  $a["area  "] ?>"readonly>
            </div>
            <br>

            <label for="sla  "><b>SLA:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="sla  " value="<?=  $a["sla  "] ?>"readonly>
            </div>
            <br>

            <label for="criticidade  "><b>Criticidade:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="criticidade  " value="<?=  $a["criticidade  "] ?>"readonly>
            </div>
            <br>
            
            <label for="ticketlife  "><b>Expiração do Ticket:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="ticketlife  " value="<?=  $a["ticketlife  "] ?>"readonly>
            </div>
            <br>
            
            <label for="userAT "><b>User AT:</b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="userAT " value="<?=  $a["userAT "] ?>"readonly>
            </div>
            <br>

            <label for="passwordAT  "><b>Password AT: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="passwordAT  " value="<?=  $a["passwordAT  "] ?>"readonly>
            </div>
            <br>

            <label for="licenca  "><b>Licenca: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="licenca  " value="<?=  $a["licenca  "] ?>"readonly>
            </div>
            <br>

            <label for="temInternet   "><b>Tem Internet: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="temInternet   " value="<?=  $a["temInternet   "] ?>"readonly>
            </div>
            <br>

            <label for="validacao   "><b>Validação: </b></label>
            <div class="inf">
            <input type="text" style="background-color:rgba(102, 255, 102, 0.4); border-style:solid; width: 700px; height: 25px; border-width:1px;" id="validacao   " value="<?=  $a["validacao   "] ?>"readonly>
            </div>
            <br-->


            <!--br> if ($err) 
                {
                  echo "cURL Error #:" . $err;
                  //echo $key . " => " . $value . "<br>";

                } 
                else 
                {
                  $array = json_decode($response,true);
                
                  foreach($array as $key => $value) 
                  {
                    $a[$key]=$value;
                    if(empty($value))
                    {
                        echo $key . "0". "<br>";
                    }
                    else
                    {
                        $array1=json_decode($value, true);
                        echo $key . $value . "<br>";
                    }
                    //$a[$key] = $value;
                    //echo $key . " => " . $value . "<br>";
                    //error_reporting(E_ALL & ~E_WARNING);
                  }     
                }
            }
            else{};<br-->

            
            


   
    






