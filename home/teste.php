
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
     include_once '../class/usuario.php';
    
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
    
    //$laboratorio->atuLab($codigo, $usuario->getUsuario(), $data, $lteComputadores, $lteImpressoras, $lteEstabilizadores, $lteCapacidade, $ultPregao, $observcaoLte);
    
    //Wifi 
    $wifiApRouter = $_POST ["wifiApRouter"];
    $wifiAp = $_POST ["wifiAp"];
    $observacaoWifi = $_POST ["observacaoWifi"];
    
    //$wifi->atuWifi($_codigo, $usuario->getUsuario(), $data, $wifiAp, $wifiApRouter, $observacaoWifi);
    
    //Tablet
    $diarioTablet = $_POST ["diarioTablet"];
    $ObservacaoDiario = $_POST ["ObservacaoDiario"];
    
    //$diario->atuDiario($_codigo, $usuario->getUsuario(), $data, $diarioTablet, $ObservacaoDiario);
    
    
    //header('location:index.php');
    
    
    echo "Data: ".$data;
    //Escola
    echo "Codig: ".$codigo;
//    $inep = $_POST ["inep"];
//    $dre = $_POST ["dre"];
//    $nome = $_POST ["nome"];
//    $cidade = $_POST ["cidade"];
//    $adminE = $_POST ["admin"];
//    $lteE = $_POST ["lte"];
//    $wifiE = $_POST ["wifi"];
//    $diarioE = $_POST ["diario"];
//    $observacaoEscola = $_POST ["observacaoEscola"];
//    
//    //$escola->atuEscola($codigo, $usuario->getUsuario(), $data, $adminE, $diarioE, $lteE, $wifiE, $observacaoEscola);
//    
//    //Administrativo
//    $admComputadores = $_POST ["admComputadores"];
//    $admImpressoras = $_POST ["admImpressoras"];
//    $admEstabilizadores	= $_POST ["admEstabilizadores"];
//    $admScanners = $_POST ["admScanners"];
//    $observacaoAdm = $_POST ["ObservacaoAdm"];
//    
//    //$administrativo->atuAdm($_codigo, $usuario->getUsuario(), $data, $admComputadores, $admImpressoras, $admEstabilizadores, $admScanners, $observacaoAdm);
//    
//    //Laboratório
//    $lteComputadores = $_POST ["lteComputadores"];
//    $lteImpressoras = $_POST ["lteImpressoras"];
//    $lteEstabilizadores	= $_POST ["lteEstabilizadores"];
//    $lteCapacidade = $_POST ["lteCapacidade"];
//    $ultPregao	= $_POST ["ultPregao"];
//    $observcaoLte = $_POST ["observcaoLte"];
//    
//    //$laboratorio->atuLab($codigo, $usuario->getUsuario(), $data, $lteComputadores, $lteImpressoras, $lteEstabilizadores, $lteCapacidade, $ultPregao, $observcaoLte);
//    
//    //Wifi 
//    $wifiApRouter = $_POST ["wifiApRouter"];
//    $wifiAp = $_POST ["wifiAp"];
//    $observacaoWifi = $_POST ["observacaoWifi"];
//    
//    //$wifi->atuWifi($_codigo, $usuario->getUsuario(), $data, $wifiAp, $wifiApRouter, $observacaoWifi);
//    
//    //Tablet
//    $diarioTablet = $_POST ["diarioTablet"];
//    $ObservacaoDiario = $_POST ["ObservacaoDiario"];
?>
    </body>
</html>
    
    
    