<?php
     include_once '../class/principal.php';
    
    $usuario = new Usuario();
    
    $usuario->validaSessao();
    
    $escola = new Escolas();
    
    $administrativo = new Administrativo();
    
    $laboratorio = new Laboratorio();
    
    $diario = new Diario();
    
    $wifi = new Wifi();
    
    $data = date('Y-m-d H:i:s');
    //Escola
    $codigo = $_POST ["codigo"];
    $inep = $_POST ["inep"];
    $dre = $_POST ["dre"];
    $nome = $_POST ["nome"];
    $cidade = $_POST ["cidade"];
    $adminE = $_POST ["admin"];
    $lteE = $_POST ["lte"];
    $wifiE = $_POST ["wifi"];
    $diarioE = $_POST ["diario"];
    $observacaoEscola = $_POST ["observacaoEscola"];
    
        echo '<div class="col-lg-12">';
        echo "Data: ".$data." <br/> Codigo: ".$codigo." <br/> LTE: ".$lteE."<br/> AdminE: ".$adminE." <br/>Wif:  ".$wifiE."<br/> diarioE: ".$diarioE."<br/>Obs: ".$observacaoEscola." </div>";
     
        //$escola->atuEscola($codigo, $usuario->getUsuario(), $data, $adminE, $diarioE, $lteE, $wifiE, $observacaoEscola);
    
    //Administrativo
    $admComputadores = $_POST ["admComputadores"];
    $admImpressoras = $_POST ["admImpressoras"];
    $admEstabilizadores	= $_POST ["admEstabilizadores"];
    $admScanners = $_POST ["admScanners"];
    $observacaoAdm = $_POST ["ObservacaoAdm"];
    
    //$administrativo->atuAdm($_codigo, $usuario->getUsuario(), $data, $admComputadores, $admImpressoras, $admEstabilizadores, $admScanners, $observacaoAdm);
    
    //Laboratório
    $lteComputadores = $_POST ["lteComputadores"];
    $lteImpressoras = $_POST ["lteImpressoras"];
    $lteEstabilizadores	= $_POST ["lteEstabilizadores"];
    $lteCapacidade = $_POST ["lteCapacidade"];
    $ultPregao	= $_POST ["ultPregao"];
    $observcaoLte = $_POST ["observcaoLte"];
    
    $laboratorio->atuLab($codigo, $usuario->getUsuario(), $data, $lteComputadores, $lteImpressoras, $lteEstabilizadores, $lteCapacidade, $ultPregao, $observcaoLte);
    
    //Wifi 
    $wifiApRouter = $_POST ["wifiApRouter"];
    $wifiAp = $_POST ["wifiAp"];
    $observacaoWifi = $_POST ["observacaoWifi"];
    
    //$wifi->atuWifi($_codigo, $usuario->getUsuario(), $data, $wifiAp, $wifiApRouter, $observacaoWifi);
    
    //Tablet
    $diarioTablet = $_POST ["diarioTablet"];
    $ObservacaoDiario = $_POST ["ObservacaoDiario"];
    
    //$diario->atuDiario($_codigo, $usuario->getUsuario(), $data, $diarioTablet, $ObservacaoDiario);
    
    
   // header('location:index.php');    
    
    ?>
    </body>
</html>
    
    
    