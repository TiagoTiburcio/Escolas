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
//   onsubmit="return validalogin(); return false;"  
?>
        <div class="col-lg-12 text-center">            
            <h2>Atualizar Cadastro Escola</h2>
            <h2></h2>
            <form id="cadastro" name="cadastro" class="form-horizontal" method="post" action="gravaeditescola.php">
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
                        <label><input type="radio" name="admin" <?php if($escola->getAdministrativo() == 1){echo 'checked=""';}?> value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="admin" <?php if($escola->getAdministrativo() == 0){echo 'checked=""';}?> value="0">Não</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="admin" readonly="" <?php if($escola->getAdministrativo() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label for="lte">Possui Laboratório?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="lte" <?php if($escola->getLaboratorio() == 1){echo 'checked=""';}?>value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="lte" <?php if($escola->getLaboratorio() == 0){echo 'checked=""';}?>value="0">Não</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" readonly="" name="lte" <?php if($escola->getLaboratorio() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label for="wifi">Possui Redes Wifi?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="wifi" <?php if($escola->getWifi() == 1){echo 'checked=""';}?> value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="wifi" <?php if($escola->getWifi() == 0){echo 'checked=""';}?> value="0">Não</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" readonly="" name="wifi" <?php if($escola->getWifi() == 2){echo 'checked=""';}?> value="2" disabled>Sem Resposta</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="diario">Possui Diário Eletrônico?</label><br/>
                    <div class="radio-inline">
                        <label><input type="radio" name="diario" <?php if($escola->getDiario() == 1){echo 'checked=""';}?> value="1">Sim</label>
                    </div>
                    <div class="radio-inline">
                        <label><input type="radio" name="diario" <?php if($escola->getDiario() == 0){echo 'checked=""';}?> value="0">Não</label>
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
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="form-group right">
                        <label for="admComputadores">Qtd. Computadores Setor Administrativo</label>
                        <input type="text" class="form-control" id="admComputadores" name="admComputadores" value="<?php echo $administrativo->getQtdComputadores();?>">
                    </div>
                </div>    
                <div class="col-lg-3">
                    <div class="form-group right">
                        <label for="admImpressoras">Qtd. Impressoras Setor Administrativo</label>
                        <input type="text" class="form-control" id="admImpressoras" name="admImpressoras" value="<?php echo $administrativo->getQtdImpressoras();?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group right">
                        <label for="admEstabilizadores">Qtd. Estabilizadores Setor Administrativo</label>
                        <input type="text" class="form-control" id="admEstabilizadores" name="admEstabilizadores" value="<?php echo $administrativo->getQtdEstabilizadores();?>">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group right">
                        <label for="admScanners">Qtd. Scanners Setor Administrativo</label>
                        <input type="text" class="form-control" id="admScanners" name="admScanners" value="<?php echo $administrativo->getQtdScanner();?>">
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="form-group">
                        <label for="observacaoAdm">Observações Sobre Setor Administrativo:</label>
                        <textarea class="form-control" rows="1" id="observacaoAdm" name="observacaoAdm"><?php echo $administrativo->getObservacao();?></textarea>
                    </div>  
                </div>
                 
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="form-group right">
                        <label for="lteComputadores">Qtd. Computadores Laboratório - LTE</label>
                        <input type="text" class="form-control" id="lteComputadores" name="lteComputadores" value="<?php echo $laboratorio->getQtdComputadores();?>">
                    </div>
                </div>    
                <div class="col-lg-2">
                    <div class="form-group right">
                        <label for="lteImpressoras">Qtd. Impressoras Laboratório - LTE</label>
                        <input type="text" class="form-control" id="admImpressoras" name="lteImpressoras" value="<?php echo $laboratorio->getQtdImpressoras();?>">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group right">
                        <label for="lteEstabilizadores">Qtd. Estabilizadores Laboratório - LTE</label>
                        <input type="text" class="form-control" id="lteEstabilizadores" name="lteEstabilizadores" value="<?php echo $laboratorio->getQtdEstabilizadores();?>">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group right">
                        <label for="lteCapacidade">Capacidade Máxima Computadores - LTE</label>
                        <input type="text" class="form-control" id="lteCapacidade" name="lteCapacidade" value="<?php echo $laboratorio->getCapMaxComputadores();?>">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group right">
                        <label for="ultPregao">Último Pregão Recebido - LTE</label>
                        <input type="text" class="form-control" id="ultPregao" name="ultPregao" value="<?php echo $laboratorio->getQtdEstabilizadores();?>">
                    </div>
                </div> 
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="form-group">
                        <label for="observacaoLte">Observações Sobre Laboratório - LTE:</label>
                        <textarea class="form-control" rows="1" id="observacaoAdm" name="observacaoAdm"><?php echo $administrativo->getObservacao();?></textarea>
                    </div>  
                </div>
                
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="form-group right">
                        <label for="wifiApRouter">Qtd. AP Router em Rede Wifi</label>
                        <input type="text" class="form-control" id="wifiApRouter" name="wifiApRouter" value="<?php echo $wifi->getQtdApRouter();?>">
                    </div>
                </div> 
                <div class="col-lg-2">
                    <div class="form-group right">
                        <label for="wifiAp">Qtd. AP em Rede Wifi</label>
                        <input type="text" class="form-control" id="wifiAp" name="WifiAp" value="<?php echo $wifi->getQtdAp();?>">
                    </div>
                </div> 
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="form-group">
                        <label for="observacaoWifi">Observações Sobre Redes Wifi:</label>
                        <textarea class="form-control" rows="1" id="observacaoWifi" name="observacaoWifi"><?php echo $wifi->getObservacao();?></textarea>
                    </div>  
                </div>
                 
                <div class="col-lg-2 col-lg-offset-1">
                    <div class="form-group right">
                        <label for="diarioTablet">Qtd. Tablets Diario Eletrônico</label>
                        <input type="text" class="form-control" id="diarioTablet" name="diarioTablet" value="<?php echo $diario->getQtdTablet();?>">
                    </div>
                </div>                 
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="form-group">
                        <label for="observacaoDiario">Observações Sobre Redes Diário Eletrônico:</label>
                        <textarea class="form-control" rows="1" id="observacaoDiario" name="observacaoDiario"><?php echo $diario->getObservacao();?></textarea>
                    </div>  
                </div> 
                
                 <div class="col-lg-12">    
                      <a type="button" class="btn btn-danger"  href="">Cancelar <span class="glyphicon glyphicon-erase"></span></a>                 
                      <button type="submit" class="btn btn-success">Salvar <span class="glyphicon glyphicon-floppy-disk"></span></button>                  
                </div>
             </div>  
            </form>
        </div>    
<?php
    include ("../class/footer.php");

