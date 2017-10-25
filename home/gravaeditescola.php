<?php
     include_once '../class/principal.php';
    
    $usuario = new Usuario();
    
    $usuario->validaSessao();
    
    $escola = new Escolas();
    
    $administrativo = new Administrativo();
    
    $laboratorio = new Laboratorio();
    
    $diario = new Diario();
    
    $wifi = new Wifi();
    $data = date_default_timezone_set("America/Bahia");
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
   
     
    $escola->atuEscola($codigo, $usuario->getUsuario(), $data, $adminE, $diarioE, $lteE, $wifiE, $observacaoEscola);
    
    //Administrativo
    $admComputadores = $_POST ["admComputadores"];
    $admImpressoras = $_POST ["admImpressora"];
    $admEstabilizadores	= $_POST ["admEstabilizadores"];
    $admScanners = $_POST ["admScanners"];
    $observacaoAdmin = $_POST ["observacaoAdmin"];
   
    echo "asdasdsad:  ".$admImpressoras."asdasdsad:  ".$admComputadores;
    $administrativo->atuAdm($codigo, $usuario->getUsuario(), $data, $admComputadores, $admImpressoras, $admEstabilizadores, $admScanners, $observacaoAdmin);
    
    //Laboratório
    $lteComputadores = $_POST ["lteComputadores"];
    $lteImpressoras = $_POST ["lteImpressoras"];
    $lteEstabilizadores	= $_POST ["lteEstabilizadores"];
    $lteCapacidade = $_POST ["lteCapacidade"];
    $ultPregao	= $_POST ["ultPregao"];
    $observacaoLte = $_POST ["observacaoLte"];
    

    $laboratorio->atuLab($codigo, $usuario->getUsuario(), $data, $lteComputadores, $lteImpressoras, $lteEstabilizadores, $lteCapacidade, $ultPregao, $observacaoLte);
    
    //Wifi 
    $wifiApRouter = $_POST ["wifiApRouter"];
    $wifiAp = $_POST ["wifiAp"];
    $observacaoWifi = $_POST ["observacaoWifi"];    
    //Tablet
    $diarioTablet = $_POST ["diarioTablet"];
    $observacaoDiario = $_POST ["observacaoDiario"];
    
    $diario->atuDiario($codigo, $usuario->getUsuario(), $data, $diarioTablet, $observacaoDiario);
    
    
   // header('location:index.php');    
 