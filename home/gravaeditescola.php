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
    
    if ($adminE == "0"){
        $admComputadores = "0";
        $admImpressoras = "0";
        $admEstabilizadores = "0";
        $admScanners = "0";
        $observacaoAdmin = " Marcou não Possui Setor Administrativo ";
    } else if ($adminE == "1") {
        $admComputadores = $_POST ["admComputadores"];
        $admImpressoras = $_POST ["admImpressora"];
        $admEstabilizadores	= $_POST ["admEstabilizadores"];
        $admScanners = $_POST ["admScanners"];
        $observacaoAdmin = $_POST ["observacaoAdmin"];
    }    
    
    $administrativo->atuAdm($codigo, $usuario->getUsuario(), $data, $admComputadores, $admImpressoras, $admEstabilizadores, $admScanners, $observacaoAdmin);
    
    //Laboratório    
    if ($lteE == "0") {
        $lteComputadores = "0";
        $lteImpressoras = "0";
        $lteEstabilizadores = "0";
        $lteCapacidade = "0";
        $ultPregao = "0";
        $observacaoLte = " Marcou não Possui LTE ";
    } else if ($lteE == "1") {
        $lteComputadores = $_POST ["lteComputadores"];
        $lteImpressoras = $_POST ["lteImpressoras"];
        $lteEstabilizadores = $_POST ["lteEstabilizadores"];
        $lteCapacidade = $_POST ["lteCapacidade"];
        $ultPregao = $_POST ["ultPregao"];
        $observacaoLte = $_POST ["observacaoLte"];
    }

    $laboratorio->atuLab($codigo, $usuario->getUsuario(), $data, $lteComputadores, $lteImpressoras, $lteEstabilizadores, $lteCapacidade, $ultPregao, $observacaoLte);
    
    //Wifi 
    
    if ($wifiE == "0") {
        $wifiApRouter = "0";
        $wifiAp = "0";
        $observacaoWifi = " Marcou não Possui Redes Wifi ";
    } else if ($wifiE = "1") {
        $wifiApRouter = $_POST ["wifiApRouter"];
        $wifiAp = $_POST ["wifiAp"];
        $observacaoWifi = $_POST ["observacaoWifi"];
    }
    
    $wifi->atuWifi($codigo, $usuario->getUsuario(), $data, $wifiAp, $wifiApRouter, $observacaoWifi);
    
    //Tablet
    if ($diarioE == "0") {
        $diarioTablet = "0";
        $observacaoDiario = " Marcou não Possui Diario Eletrônico ";
    } else if ($diarioE == "1") {
        $diarioTablet = $_POST ["diarioTablet"];
        $observacaoDiario = $_POST ["observacaoDiario"];
    }
    
    $diario->atuDiario($codigo, $usuario->getUsuario(), $data, $diarioTablet, $observacaoDiario);
    
    
   header('location:index.php');    
 