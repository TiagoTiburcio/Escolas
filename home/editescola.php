<?php
    include_once '../class/principal.php';
    
    $usuario = new Usuario();
    
    $escola = new Escolas();
    
    $administrativo = new Administrativo();
    
    $laboratorio = new Laboratorio();
    
    $diario = new Diario();
    
    $wifi = new Wifi();
            
    $usuario->validaSessao();
    
    $escola->iniEscola($_GET["codigo"]);
    
    $administrativo->iniAdmEscola($escola->getCodigo());
    
    $laboratorio->iniLabEscola($escola->getCodigo());
    
    $diario->iniDiarioEscola($escola->getCodigo());
    
    $wifi->iniWifiEscola($escola->getCodigo());
    
    echo "asdasdadadada: ".$laboratorio->getDataRevisao();

?>
<div class="col-lg-12 text-center">            
            <h2>Atualizar Cadastro Escola </h2>
            <h2></h2>
            <form id="cadastro" name="cadastro" class="form-horizontal" method="post" onsubmit="return validaCadastro();" action="gravaeditescola.php">
             <div class="form-group">
                <div>
                    <div class="form-group" hidden="">
                      <label for="codigo">Código Escola</label>
                      <input type="text" class="form-control" id="codigo" readonly="" name="codigo" value="<?php echo $escola->getCodigo();?>">
                    </div>
                </div> 
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="form-group right">
                      <label for="inep">Código INEP MEC</label>
                      <input type="text" class="form-control" id="inep" readonly="" name="inep" value="<?php echo $escola->getCodigoMec();?>">
                    </div>
                </div>
                <div class="col-lg-2">    
                    <div class="form-group">
                      <label for="dre">Diretoria</label>
                      <input type="text" class="form-control" id="dre" readonly="" name="dre" value="<?php echo $escola->getDiretoria();?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                      <label for="nome">Nome Escola</label>
                      <input type="text" class="form-control" id="nome" readonly="" name="nome" value="<?php echo $escola->getNome();?>">
                    </div>
                </div>
                <div class="col-lg-2">    
                    <div class="form-group">
                      <label for="cidade">Cidade</label>
                      <input type="text" class="form-control" id="cidade" readonly="" name="cidade" value="<?php echo $escola->getMunicipio();?>">
                    </div>
                </div>
                <div class="col-lg-2 col-lg-offset-1">
                    <label for="admin">Possui Administrativo?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="admin" onclick="return mostraAdmin();" <?php if($escola->getAdministrativo() == 1){echo 'checked=""';}?> value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="admin" onclick="return escondeAdmin();" <?php if($escola->getAdministrativo() == 0){echo 'checked=""';}?> value="0">Não</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="admin" readonly="" <?php if($escola->getAdministrativo() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label for="lte">Possui Laboratório?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="lte" onclick="return mostraLte();" <?php if($escola->getLaboratorio() == 1){echo 'checked=""';}?>value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="lte" onclick="return escondeLte();" <?php if($escola->getLaboratorio() == 0){echo 'checked=""';}?>value="0">Não</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" readonly="" name="lte" <?php if($escola->getLaboratorio() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label for="wifi">Possui Redes Wifi?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="wifi" onclick="return mostraWifi();" <?php if($escola->getWifi() == 1){echo 'checked=""';}?> value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="wifi" onclick="return escondeWifi();" <?php if($escola->getWifi() == 0){echo 'checked=""';}?> value="0">Não</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" readonly="" name="wifi" <?php if($escola->getWifi() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="diario">Possui Diário Eletrônico?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="diario" onclick="return mostraDiario();" <?php if($escola->getDiario() == 1){echo 'checked=""';}?> value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="diario" onclick="return escondeDiario();" <?php if($escola->getDiario() == 0){echo 'checked=""';}?> value="0">Não</label>
                    </div>
                    <div class="radio-inline disabled">
                        <label><input type="radio" name="diario" <?php if($escola->getDiario() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div> 
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="form-group">
                        <label for="observacaoEscola">Observações Sobre Escolas:</label>
                        <textarea class="form-control" rows="1" id="observacaoEscola" name="observacaoEscola"><?php echo $escola->getObservacao();?></textarea>
                    </div>  
                </div>
                 <div class="col-lg-2 col-lg-offset-1" id="blocoAdminComp" <?php if($escola->getAdministrativo() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?> >
                    <div class="form-group right">
                        <label for="admComputadores">Qtd. Comp. - Admin</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true"  id="admComputadores" name="admComputadores" value="<?php echo $administrativo->getQtdComputadores();?>">
                    </div>
                </div>    
                <div class="col-lg-3" id="blocoAdminImp" <?php if($escola->getAdministrativo() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="admImpressora">Qtd. Imp. - Admin</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="admImpressora" name="admImpressora" value="<?php echo $administrativo->getQtdImpressoras();?>">
                    </div>
                </div>
                <div class="col-lg-3" id="blocoAdminEstab" <?php if($escola->getAdministrativo() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="admEstabilizadores">Qtd. Estab. - Admin</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="admEstabilizadores" name="admEstabilizadores" value="<?php echo $administrativo->getQtdEstabilizadores();?>">
                    </div>
                </div>
                <div class="col-lg-2" id="blocoAdminSca" <?php if($escola->getAdministrativo() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="admScanners">Qtd. Scan. - Admin</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="admScanners" name="admScanners" value="<?php echo $administrativo->getQtdScanner();?>">
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-1" id="blocoAdminObs" <?php if($escola->getAdministrativo() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group">
                        <label for="observacaoAdmin">Observações Sobre Setor Administrativo:</label>
                        <textarea class="form-control" rows="1" id="observacaoAdmin" name="observacaoAdmin"><?php echo $administrativo->getObservacao();?></textarea>
                    </div>  
                </div>
                 
                 <div class="col-lg-2 col-lg-offset-1" id="blocoLteComp" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?> >
                    <div class="form-group right">
                        <label for="lteComputadores">Qtd. Comp. - LTE</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="lteComputadores" name="lteComputadores" value="<?php echo $laboratorio->getQtdComputadores();?>">
                    </div>
                </div>    
                <div class="col-lg-2" id="blocoLteImp" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="lteImpressoras">Qtd. Imp. - LTE</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="lteImpressoras" name="lteImpressoras" value="<?php echo $laboratorio->getQtdImpressoras();?>">
                    </div>
                </div>
                <div class="col-lg-1" id="blocoLteEstab" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="lteEstabilizadores">Qtd. Estab. - LTE</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="lteEstabilizadores" name="lteEstabilizadores" value="<?php echo $laboratorio->getQtdEstabilizadores();?>">
                    </div>
                </div>
                <div class="col-lg-1" id="blocoLteMax" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="lteCapacidade">Cap. Máx. Comp. - LTE</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="lteCapacidade" name="lteCapacidade" value="<?php echo $laboratorio->getCapMaxComputadores();?>">
                    </div>
                </div>
                <div class="col-lg-2" id="blocoLteDataRev" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="ultRevisao">Data Ult. Revisão - LTE</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="00/00/0000" data-mask-selectonfocus="true" id="ultRevisao" name="ultRevisao" value="<?php echo implode('/', array_reverse(explode('-', $laboratorio->getDataRevisao())));?>">
                    </div>
                </div> 
                <div class="col-lg-2" id="blocoLtePreg" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="ultPregao">Pregão - LTE</label>
                        <input type="text" class="form-control" id="ultPregao" name="ultPregao" value="<?php echo $laboratorio->getUltimoPregao();?>">
                    </div>
                </div> 
                <div class="col-lg-10 col-lg-offset-1" id="blocoLteObs" <?php if($escola->getLaboratorio() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group">
                        <label for="observacaoLte">Observações Sobre Laboratório - LTE:</label>
                        <textarea class="form-control" rows="1" id="observacaoLte" name="observacaoLte"><?php echo $laboratorio->getObservacao();?></textarea>
                    </div>  
                </div>
                
                 <div class="col-lg-2 col-lg-offset-1" id="blocoWifiApRouter" <?php if($escola->getWifi() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="wifiApRouter">Qtd. AP Router - Wifi</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="wifiApRouter" name="wifiApRouter" value="<?php echo $wifi->getQtdApRouter();?>">
                    </div>
                </div> 
                <div class="col-lg-2" id="blocoWifiAp" <?php if($escola->getWifi() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="wifiAp">Qtd. AP - Wifi</label>
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="wifiAp" name="wifiAp" value="<?php echo $wifi->getQtdAp();?>">
                    </div>
                </div> 
                <div class="col-lg-10 col-lg-offset-1" id="blocoWifiObs" <?php if($escola->getWifi() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group">
                        <label for="observacaoWifi">Observações Sobre Redes Wifi:</label>
                        <textarea class="form-control" rows="1" id="observacaoWifi" name="observacaoWifi"><?php echo $wifi->getObservacao();?></textarea>
                    </div>  
                </div>
                 
                 <div class="col-lg-2 col-lg-offset-1" id="blocoDiarioTab" <?php if($escola->getDiario() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group right">
                        <label for="diarioTablet">Qtd. Tablet - Diario</label>                        
                        <input type="text" class="simple-field-data-mask-selectonfocus form-control" data-mask="0000" data-mask-selectonfocus="true" id="diarioTablet" name="diarioTablet" value="<?php echo $diario->getQtdTablet();?>">
                    </div>
                </div>                 
                <div class="col-lg-10 col-lg-offset-1" id="blocoDiarioObs" <?php if($escola->getDiario() == 1){echo 'style="display:  block"';} else {echo 'style="display:  none"';} ?>>
                    <div class="form-group">
                        <label for="observacaoDiario">Observações Sobre Redes Diário Eletrônico:</label>
                        <textarea class="form-control" rows="1" id="observacaoDiario" name="observacaoDiario"><?php echo $diario->getObservacao();?></textarea>
                    </div>  
                </div> 
                
                 <div class="col-lg-12">    
                      <a type="button" class="btn btn-danger"  href="">Reiniciar Tela <span class="glyphicon glyphicon-erase"></span></a>                 
                      <button type="submit" class="btn btn-success">Salvar <span class="glyphicon glyphicon-floppy-disk"></span></button>                  
                </div>
             </div>
                              
            </form>
        </div>    
<?php
    include ("../class/footer.php");

