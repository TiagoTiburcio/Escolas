<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author tiagoc
 */
include_once '../class/database.php';

class Usuario extends Database {
    private $codigo;
    
    private $usuario;
    
    private $nome;
    
    private $senha;
    
    private $diretoria;
    
    function __construct(){ }

    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }
        
    private function setNome($_nome){
        $this->nome = $_nome;
    }

    function getNome(){
        return $this->nome;
    }
        
    private function setUsuario($_usuario){
        $this->usuario = $_usuario;
    }

    function getUsuario(){
        return $this->usuario;
    }
    
    private function setSenha($_senha){
        $this->senha = $_senha;
    }
            
    function getSenha(){
        return $this->senha;
    }
    
    private function getSenhaEncriptada($_senha){
        $resultado = sha1($_senha);
        return $resultado;
    }
    
    private function setDiretoria($_diretoria){
        $this->diretoria = $_diretoria;
    }
            
    function getDiretoria(){
        return $this->diretoria;
    }
        
    // 0 - usuario não gravado 1 - usuario existente na Base de Dados
    private function testeUsuarioCadatrado($_usuario){
        $consulta_usuario1 = "SELECT count(`usuario`.`codigo`) as cont FROM `usuario` where usuario = '$_usuario';";                                
        $resultado_usuario1 = mysqli_query($this->connect(), $consulta_usuario1);
        foreach ($resultado_usuario1 as $table_usuario1){                        
           $resultado = $table_usuario1["cont"]; 
        } 
        return $resultado;
    }
    
    // 0 - usuario não gravado 1 - usuario gravado com sucesso na Base de Dados
    function insereUsuario($_usuario,$_nome,$_senha){
        $resultado = '0';
        if($this->testeUsuarioCadatrado($_usuario) == 0){            
            $this->setNome($_nome);
            $this->setUsuario($_usuario);
            $this->setSenha($this->getSenhaEncriptada($_senha));
            $this->setDiretoria('');            
            $consulta_usuario2 = "INSERT INTO `usuario`(`usuario`,`senha`,`nome`,`diretoria`)VALUES( '".$this->getUsuario()."' , '".$this->getSenha()."' , '".$this->getNome()."' ,".$this->getDiretoria().");";
            $resultado_usuario2 = mysqli_query($this->connect(), $consulta_usuario2);            
            $resultado = '1';
        }        
        return $resultado;
    }
   
    // retorna lista com todos os usuarios cadastrados
    function listaUsuarios(){        
        $consulta_usuario3 = "SELECT * FROM usuario;";                                
        $resultado_usuario3 = mysqli_query($this->connect(), $consulta_usuario3);
        return $resultado_usuario3;
    }
    
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function iniUsuario($_usuario){
        if ($this->testeUsuarioCadatrado($_usuario) == 1){
            $consulta_usuario4 = "SELECT * FROM usuario where usuario = '$_usuario';";                                
            $resultado_usuario4 = mysqli_query($this->connect(), $consulta_usuario4);
            foreach ($resultado_usuario4 as $table_usuario4){
                $this->setCodigo($table_usuario4["codigo"]);
                $this->setUsuario( $table_usuario4["usuario"]);
                $this->setNome($table_usuario4["nome"]);
                $this->setSenha($table_usuario4["senha"]);               
                $this->setDiretoria($table_usuario4["diretoria"]);
            }            
        }
        return $this->testeUsuarioCadatrado($_usuario);
    }       
    
    //Retorno == 0 - erro gravar nova senha na base de dados | == 1 - nova senha gravada com sucesso
    function gravaNovaSenha($_usuario,$_novaSenha){        
        if ($this->iniUsuario($_usuario) == 1){            
            $consulta_usuario5 = "UPDATE `usuario` SET `senha` = '".$this->getSenhaEncriptada($_novaSenha)."' WHERE `codigo` = '".$this->getCodigo()."';";                                
            $resultado_usuario5 = mysqli_query($this->connect(), $consulta_usuario5);
        }
        return $this->iniUsuario($_usuario);
    }

    //Retorno == 0 - erro gravar nova senha na base de dados | == 1 - nova senha gravada com sucesso
    function verificaUsuario($_usuario,$_senha){        
        $resultado = 0;
        if ($this->iniUsuario($_usuario) == 1){            
            if($this->getSenhaEncriptada($_senha) == $this->getSenha()){
                $resultado = 1;
            }            
        }
        return $resultado;
    }
    
     // 0 - usuario não gravado 1 - usuario gravado com sucesso na Base de Dados
    function editUsuario($_usuario,$_nome,$_senha){
        $resultado = '0';
        if($this->testeUsuarioCadatrado($_usuario) == 1){            
            $this->iniUsuario($_usuario);
            $this->setNome($_nome);
            $this->setUsuario($_usuario);
            $this->setSenha($this->getSenhaEncriptada($_senha));            
            $this->setDiretoria('');                        
            $consulta_usuario6 = "UPDATE `usuario` SET `usuario` = '".$this->getUsuario()."' , `senha` = '".$this->getSenha()."' , `nome` = '".$this->getNome()."' ,`diretoria` = ".$this->getDiretoria()." WHERE `codigo` = ".$this->getCodigo().";";
            $resultado_usuario6 = mysqli_query($this->connect(), $consulta_usuario6);            
            $resultado = '1';
        }        
        return $resultado;
    }
    

    function validaSessao(){        
        session_start();
        include ("../class/header.php");

        //Caso o usuário não esteja autenticado, limpa os dados e redireciona
        if ( !isset($_SESSION['login']) and !isset($_SESSION['pass']) ) {
            //Destrói
            session_destroy();

            //Limpa
            unset ($_SESSION['login']);
            unset ($_SESSION['pass']);
            unset ($_SESSION['nome_usuario']);
            unset ($_SESSION['diretoria']);

            //Redireciona para a página de autenticação
            header('location:login.php');
        } else {
            $this->iniUsuario($_SESSION['login']);
        }        
    }
    
    function __destruct() {}
}

class Escolas extends Database {
    private $codigo;
    
    private $codigo_mec;
    
    private $municipio;
    
    private $nome;
    
    private $diretoria;
    
    private $administrativo;
    
    private $laboratorio;
    
    private $wifi;
    
    private $diario;
    
    private $observacao;
   
    function __construct(){ }
    
    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }
        
    private function setNome($_nome){
        $this->nome = $_nome;
    }

    function getNome(){
        return $this->nome;
    }
        
    private function setCodigoMec($_codigoMec){
        $this->codigo_mec = $_codigoMec;
    }

    function getCodigoMec(){
        return $this->codigo_mec;
    }
    
    private function setMunicipio($_municipio){
        $this->municipio = $_municipio;
    }
            
    function getMunicipio(){
        return $this->municipio;
    }
        
    private function setDiretoria($_diretoria){
        $this->diretoria = $_diretoria;
    }
            
    function getDiretoria(){
        return $this->diretoria;
    }
    
    private function setAdministrativo($_administrativo){
        $this->administrativo = $_administrativo;
    }
            
    function getAdministrativo(){
        return $this->administrativo;
    }
    
    private function setLaboratorio($_laboratorio){
        $this->laboratorio = $_laboratorio;
    }
            
    function getLaboratorio(){
        return $this->laboratorio;
    }
    
    private function setWifi($_wifi){
        $this->wifi = $_wifi;
    }
            
    function getWifi(){
        return $this->wifi;
    }
    
    private function setDiario($_diario){
        $this->diario = $_diario;
    }
            
    function getDiario(){
        return $this->diario;
    }
    
    private function setObservacao($_observacao){
        $this->observacao = $_observacao;
    }
            
    function getObservacao(){
        return $this->observacao;
    }
        
    // retorna lista com todos os usuarios cadastrados
    function listaEcolas(){        
        $consulta_usuario3 = "SELECT * FROM escolas_cadastro;";                                
        $resultado_usuario3 = mysqli_query($this->connect(), $consulta_usuario3);
        return $resultado_usuario3;
    }
    
    function listaEcolasP($_dre, $_municipio, $_nome, $_inep){        
        $consulta_usuario3 = "SELECT * FROM escolas_cadastro where codigo_mec like '%".$_inep."%' and nome like '%".$_nome."%' and municipio like '%".$_municipio."%' and diretoria like '%".$_dre."%';";
        $resultado_usuario3 = mysqli_query($this->connect(), $consulta_usuario3);
        return $resultado_usuario3;
    }
    
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function iniEscola($_codigo){
        $consulta_iniEscola = "SELECT * FROM escolas_cadastro where codigo_escola = '$_codigo';";                                
        $resultado_iniEscola = mysqli_query($this->connect(), $consulta_iniEscola);        
        foreach ($resultado_iniEscola as $table_iniEscola){            
            $this->setCodigo($table_iniEscola["codigo_escola"]);
            $this->setCodigoMec($table_iniEscola["codigo_mec"]);
            $this->setNome($table_iniEscola["nome"]);
            $this->setMunicipio($table_iniEscola["municipio"]);               
            $this->setDiretoria($table_iniEscola["diretoria"]);
            $this->setAdministrativo($table_iniEscola["administrativo"]);
            $this->setLaboratorio($table_iniEscola["laboratorio"]);
            $this->setDiario($table_iniEscola["diario"]);
            $this->setWifi($table_iniEscola["wifi"]);
            $this->setObservacao($table_iniEscola["observacao"]);
        }
        return mysqli_num_rows($resultado_iniEscola);
    }
      

    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function atuEscola($_codigo,$_usuario, $_data, $_adm, $_diario, $_lte, $_wifi, $_obs){
        $consulta_atuEscola = " UPDATE `escolas_cadastro` SET "
                            . " `usuario_ult_edi` = '$_usuario', "
                            . " `data_ult_edi` = '$_data', "
                            . " `administrativo` = '$_adm', "
                            . " `diario` = '$_diario', "
                            . " `laboratorio` = '$_lte' , "
                            . " `wifi` = '$_wifi' ,"
                            . " `observacao` = '$_obs'"
                            . " WHERE `codigo_escola` = '$_codigo';";                                
        $resultado_atuEscola = mysqli_query($this->connect(), $consulta_atuEscola);
        return mysqli_num_rows($resultado_atuEscola);
    }
    
    // retorno = 1 - Possui Item | 0 - Não Possui Item | outros retornos sem resposta 
    function imprimiSituacao($_codigo){
        if($_codigo == '0'){
            return '<span class="glyphicon glyphicon-remove-circle btn-danger">';
        }elseif ($_codigo == '1') {
            return '<span class="glyphicon glyphicon-ok-circle btn-success">';
        } else {
            return '<span class="glyphicon glyphicon-ban-circle">';
        }
    }
    
    function __destruct() {}
}

class Administrativo extends Database {
    private $codigo;
    
    private $codigoEscola;
    
    private $qtdComputadores;
    
    private $qtdImpressoras;
    
    private $qtdEstabilizadores;
    
    private $qtdScanner;
    
    private $observacao;
    
    function __construct(){ }

    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }
        
    private function setCodigoEscola($_codigoEscola){
        $this->codigoEscola = $_codigoEscola;
    }

    function getCodigoEscola(){
        return $this->codigoEscola;
    }
        
    private function setQtdComputadores($_qtdComputadores){
        $this->qtdComputadores = $_qtdComputadores;
    }

    function getQtdComputadores(){
        return $this->qtdComputadores;
    }
    
    private function setQtdImpressoras($_qtdImpressoras){
        $this->qtdImpressoras = $_qtdImpressoras;
    }
            
    function getQtdImpressoras(){
        return $this->qtdImpressoras;
    }
        
    private function setQtdEstabilizadores($_qtdEstabizadores){
        $this->qtdEstabilizadores = $_qtdEstabizadores;
    }
            
    function getQtdEstabilizadores(){
        return $this->qtdEstabilizadores;
    }
    
    private function setObservacao($_observacao){
        $this->observacao = $_observacao;
    }
            
    function getObservacao(){
        return $this->observacao;
    }
    
    private function setQtdScanner($_qtdScanner){
        $this->qtdScanner = $_qtdScanner;
    }
            
    function getQtdScanner(){
        return $this->qtdScanner;
    }
       
    // retorna lista com todos os usuarios cadastrados
    function listaAdminEcola(){        
        $consulta_listaAdminEcola = "SELECT * FROM escolas_administrativo where codigo_escola_administrativo = '".$this->getCodigoEscola()."' ;";                                
        $resultado_listaAdminEcola = mysqli_query($this->connect(), $consulta_listaAdminEcola);
        return $resultado_listaAdminEcola;
    }
   
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function iniAdmEscola($_codigoEscola){
        $consulta_iniAdmEscola = "SELECT * FROM escolas_administrativo where codigo_escola_administrativo = '$_codigoEscola';";                                
        $resultado_iniAdmEscola = mysqli_query($this->connect(), $consulta_iniAdmEscola);        
        foreach ($resultado_iniAdmEscola as $table_iniAdmEscola){            
            $this->setCodigoEscola($table_iniAdmEscola["codigo_escola_administrativo"]);
            $this->setCodigo($table_iniAdmEscola["codigo"]);
            $this->setQtdComputadores($table_iniAdmEscola["qtd_computadores"]);
            $this->setQtdImpressoras($table_iniAdmEscola["qtd_impressoras"]);               
            $this->setQtdEstabilizadores($table_iniAdmEscola["qtd_estabilizadores"]);
            $this->setQtdScanner($table_iniAdmEscola["qtd_scanner"]);
            $this->setObservacao($table_iniAdmEscola["observacao"]);            
        }
        return mysqli_num_rows($resultado_iniAdmEscola);
    }
    
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function atuAdm($_codigoEscola,$_usuario, $_data, $_qtdComp, $_qtdImp, $_qtdEstab, $_qtdScan, $_obs){        
        if($this->iniAdmEscola($_codigoEscola) != '1'){            
            $consulta_atuEscola = "INSERT INTO `escolas_administrativo` (`codigo_escola_administrativo`, `codigo`,`qtd_computadores`,`qtd_impressoras`,`qtd_estabilizadores`,`qtd_scanner`,`observacao`,`usuario_ult_edi`, `data_ult_edi`)"
                                . " VALUES('".$_codigoEscola."', '1', '".$_qtdComp."', '".$_qtdImp."', '".$_qtdEstab."', '".$_qtdScan."', '".$_obs."', '$_usuario', '$_data'); ";                                
            $resultado_atuEscola = mysqli_query($this->connect(), $consulta_atuEscola);
            return mysqli_num_rows($resultado_atuEscola);
        } else {
            $consulta_atuEscola = " UPDATE `escolas_administrativo` SET "
                                . " `usuario_ult_edi` = '$_usuario', "
                                . " `data_ult_edi` = '$_data', "
                                . " `qtd_computadores` = '$_qtdComp', "
                                . " `qtd_impressoras` = '$_qtdImp', "
                                . " `qtd_estabilizadores` = '$_qtdEstab' , "
                                . " `qtd_scanner` = '$_qtdScan' ,"
                                . " `observacao` = '$_obs'"
                                . " WHERE `codigo_escola_administrativo` = '$_codigoEscola' AND `codigo` = '1';";                                
            $resultado_atuEscola = mysqli_query($this->connect(), $consulta_atuEscola);
            return mysqli_num_rows($resultado_atuEscola);
        }
    }
    
    function __destruct() {}
}

class Laboratorio extends Database {
    private $codigo;
    
    private $codigoEscola;
    
    private $qtdComputadores;
    
    private $qtdImpressoras;
    
    private $qtdEstabilizadores;
    
    private $observacao;
    
    private $capMaxComputadores;
    
    private $ultimoPregao;
    
    private $dataRevisao;
        
    function __construct(){ }

    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }
        
    private function setCodigoEscola($_codigoEscola){
        $this->codigoEscola = $_codigoEscola;
    }

    function getCodigoEscola(){
        return $this->codigoEscola;
    }
        
    private function setQtdComputadores($_qtdComputadores){
        $this->qtdComputadores = $_qtdComputadores;
    }

    function getQtdComputadores(){
        return $this->qtdComputadores;
    }
    
    private function setQtdImpressoras($_qtdImpressoras){
        $this->qtdImpressoras = $_qtdImpressoras;
    }
            
    function getQtdImpressoras(){
        return $this->qtdImpressoras;
    }
        
    private function setQtdEstabilizadores($_qtdEstabizadores){
        $this->qtdEstabilizadores = $_qtdEstabizadores;
    }
            
    function getQtdEstabilizadores(){
        return $this->qtdEstabilizadores;
    }
    
    private function setObservacao($_observacao){
        $this->observacao = $_observacao;
    }
            
    function getObservacao(){
        return $this->observacao;
    }
       
    private function setUltimoPregao($_ultimoPregao){
        $this->ultimoPregao = $_ultimoPregao;
    }
            
    function getUltimoPregao(){
        return $this->ultimoPregao;
    }
    
    private function setCapMaxComputadores($_capMaxComputadores){
        $this->capMaxComputadores = $_capMaxComputadores;
    }
            
    function getCapMaxComputadores(){
        return $this->capMaxComputadores;
    }
    
    function setDataRevisao($_dataRevisao){
        $this->dataRevisao = $_dataRevisao;
    }

    function getDataRevisao(){
        return $this->dataRevisao;
    }
       
    // retorna lista com todos os usuarios cadastrados
    function listaLabEcola(){        
        $consulta_listaLabEcola = "SELECT * FROM escolas_laboratorio where codigo_escola_laboratorio = '".$this->getCodigoEscola()."' ;";                                
        $resultado_listaLabEcola = mysqli_query($this->connect(), $consulta_listaLabEcola);
        return $resultado_listaLabEcola;
    }
   
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function iniLabEscola($_codigoEscola){
        $consulta_iniLabEscola = "SELECT count(codigo) as cont , e.* FROM escolas_laboratorio as e where codigo_escola_laboratorio = '$_codigoEscola';";                                
        $resultado_iniLabEscola = mysqli_query($this->connect(), $consulta_iniLabEscola);        
        foreach ($resultado_iniLabEscola as $table_iniLabEscola){            
            $this->setCodigoEscola($table_iniLabEscola["codigo_escola_laboratorio"]);
            $this->setCodigo($table_iniLabEscola["codigo"]);
            $this->setQtdComputadores($table_iniLabEscola["qtd_computadores"]);
            $this->setQtdImpressoras($table_iniLabEscola["qtd_impressoras"]);               
            $this->setQtdEstabilizadores($table_iniLabEscola["qtd_estabilizadores"]);
            $this->setCapMaxComputadores($table_iniLabEscola["cap_max_computadores"]);
            $this->setUltimoPregao($table_iniLabEscola["ultimo_pregao"]);
            $this->setObservacao($table_iniLabEscola["observacao"]);
            $this->setDataRevisao($table_iniLabEscola["data_revisao"]);
            $result = $table_iniLabEscola["cont"];            
        }
        return $result;
    }
    
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function atuLab($_codigoEscola,$_usuario, $_data, $_qtdComp, $_qtdImp, $_qtdEstab, $_qtdMaxComp, $_ultPregao, $_dataUltRevisao, $_obs){        
        if($this->iniLabEscola($_codigoEscola) == '0'){
            
            $consulta_atuLab = "INSERT INTO `escolas_laboratorio` (`codigo`, `codigo_escola_laboratorio`, `ultimo_pregao`,`cap_max_computadores`,`qtd_computadores`,`qtd_impressoras`,`qtd_estabilizadores`,`usuario_ult_edi`,`data_ult_edi`,`observacao`,`data_revisao`)"
                                . " VALUES('1', '$_codigoEscola', '$_ultPregao', '$_qtdMaxComp', '$_qtdComp', '$_qtdImp', '$_qtdEstab', '$_usuario', '$_data', '$_obs', '$_dataUltRevisao'); ";
            $resultado_atuLab = mysqli_query($this->connect(), $consulta_atuLab);            
        } else {            
            $consulta_atuLab = " UPDATE `escolas_laboratorio` SET "
                             . " `usuario_ult_edi` = '$_usuario', "
                             . " `data_ult_edi` = '$_data', "
                             . " `qtd_computadores` = '$_qtdComp', "
                             . " `qtd_impressoras` = '$_qtdImp', "
                             . " `qtd_estabilizadores` = '$_qtdEstab' , "
                             . " `ultimo_pregao` = '$_ultPregao', "
                             . " `cap_max_computadores` = '$_qtdMaxComp'," 
                             . " `data_revisao` = '$_dataUltRevisao',"    
                             . " `observacao` = '$_obs' "
                             . " WHERE `codigo` = '1' AND `codigo_escola_laboratorio` = '$_codigoEscola';";                                
            $resultado_atuLab = mysqli_query($this->connect(), $consulta_atuLab);            
        }
        return mysqli_num_rows($resultado_atuLab);            
    }
    
        
    
    function __destruct() {}
}

class Diario extends Database {
    private $codigo;
    
    private $codigoEscola;
    
    private $qtdTablet;
    
    private $observacao;
    
    function __construct(){ }

    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }
        
    private function setCodigoEscola($_codigoEscola){
        $this->codigoEscola = $_codigoEscola;
    }

    function getCodigoEscola(){
        return $this->codigoEscola;
    }
        
    private function setQtdTablet($_qtdTablet){
        $this->qtdTablet = $_qtdTablet;
    }

    function getQtdTablet(){
        return $this->qtdTablet;
    }
    
    private function setObservacao($_observacao){
        $this->observacao = $_observacao;
    }
            
    function getObservacao(){
        return $this->observacao;
    }
        
    // retorna lista com todos os usuarios cadastrados
    function listaDiarioEcola(){        
        $consulta_listaDiarioEcola = "SELECT * FROM escolas_diario where codigo_escola_diario = '".$this->getCodigoEscola()."' ;";
        $resultado_listaDiarioEcola = mysqli_query($this->connect(), $consulta_listaDiarioEcola);
        return $resultado_listaDiarioEcola;
    }
   
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function iniDiarioEscola($_codigoEscola){
        $consulta_iniDiarioEscola = "SELECT * FROM escolas_diario where codigo_escola_diario = '$_codigoEscola';";                                
        $resultado_iniDiarioEscola = mysqli_query($this->connect(), $consulta_iniDiarioEscola);        
        foreach ($resultado_iniDiarioEscola as $table_iniDiarioEscola){            
            $this->setCodigoEscola($table_iniDiarioEscola["codigo_escola_diario"]);
            $this->setCodigo($table_iniDiarioEscola["codigo"]);
            $this->setQtdTablet($table_iniDiarioEscola["qtd_tablet"]);            
            $this->setObservacao($table_iniDiarioEscola["observacao"]);            
        }
        return mysqli_num_rows($resultado_iniDiarioEscola);
    }    
    
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function atuDiario($_codigoEscola,$_usuario, $_data, $_qtdTablet , $_obs){        
        if($this->iniDiarioEscola($_codigoEscola) != '1'){
            $consulta_atuDiario = "INSERT INTO `escolas_diario` (`codigo_escola_diario`,`codigo`,`qtd_tablet`,`usuario_ult_edi`,`data_ult_edi`,`observacao`)"
                                . " VALUES('".$_codigoEscola."', '1', '$_qtdTablet', '$_usuario', '$_data', '$_obs'); ";                                
            $resultado_atuDiario = mysqli_query($this->connect(), $consulta_atuDiario);            
        } else {
            $consulta_atuDiario = " UPDATE `escolas_diario` SET "
                                . " `usuario_ult_edi` = '$_usuario', "
                                . " `data_ult_edi` = '$_data', "
                                . " `qtd_tablet` = '$_qtdTablet', "                                
                                . " `observacao` = '$_obs'"
                                . " WHERE `codigo` = '1' AND `codigo_escola_diario` = '$_codigoEscola';";                                
            $resultado_atuDiario = mysqli_query($this->connect(), $consulta_atuDiario);            
        }
        return mysqli_num_rows($resultado_atuDiario);
    }
    
    function __destruct() {}
}

class Wifi extends Database {
    private $codigo;
    
    private $codigoEscola;
    
    private $qtdApRouter;
    
    private $qtdAp;
    
    private $observacao;
        
    function __construct(){ }

    function setCodigo($_codigo){
        $this->codigo = $_codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }
        
    private function setCodigoEscola($_codigoEscola){
        $this->codigoEscola = $_codigoEscola;
    }

    function getQtdApRouter(){
        return $this->qtdApRouter;
    }
        
    private function setQtdApRouter($_qtdApRouter){
        $this->qtdApRouter = $_qtdApRouter;
    }

    function getQtdAp(){
        return $this->qtdAp;
    }
    
    private function setQtdAp($_qtdAp){
        $this->qtdAp = $_qtdAp;
    }

    private function setObservacao($_observacao){
        $this->observacao = $_observacao;
    }
            
    function getObservacao(){
        return $this->observacao;
    }
    
    // retorna lista com todos os usuarios cadastrados
    function listaWifiEcola(){        
        $consulta_listaWifiEscola = "SELECT * FROM escolas_wifi where codigo_escola_wifi = '".$this->getCodigoEscola()."' ;";                                
        $resultado_listaWifiEscola = mysqli_query($this->connect(), $consulta_listaWifiEscola);
        return $resultado_listaWifiEscola;
    }
   
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function iniWifiEscola($_codigoEscola){
        $consulta_iniWifiEscola = "SELECT * FROM escolas_wifi where codigo_escola_wifi = '$_codigoEscola';";                                
        $resultado_iniWifiEscola = mysqli_query($this->connect(), $consulta_iniWifiEscola);        
        foreach ($resultado_iniWifiEscola as $table_iniWifiEscola){            
            $this->setCodigoEscola($table_iniWifiEscola["codigo_escola_wifi"]);
            $this->setCodigo($table_iniWifiEscola["codigo"]);
            $this->setQtdAp($table_iniWifiEscola["qtd_ap"]);
            $this->setQtdApRouter($table_iniWifiEscola["qtd_ap_router"]);                           
            $this->setObservacao($table_iniWifiEscola["observacao"]);            
        }
        return mysqli_num_rows($resultado_iniWifiEscola);
    }    
    
    // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado
    function atuWifi($_codigoEscola,$_usuario, $_data, $_qtdAp, $_qtdApRouter , $_obs){        
        if($this->iniWifiEscola($_codigoEscola) != '1'){
            $consulta_atuWifi = "INSERT INTO `escolas_wifi` (`codigo_escola_wifi`,`codigo`,`qtd_ap`,`qtd_ap_router`,`usuario_ult_edi`,`data_ult_edi`,`observacao`)"
                                . " VALUES('$_codigoEscola', '1', '$_qtdAp', '$_qtdApRouter', '$_usuario', '$_data', '$_obs'); ";                                
            $resultado_atuWifi = mysqli_query($this->connect(), $consulta_atuWifi);            
        } else {
            $consulta_atuWifi = " UPDATE `escolas_wifi` SET "
                                . " `usuario_ult_edi` = '$_usuario', "
                                . " `data_ult_edi` = '$_data', "
                                . " `qtd_ap` = '$_qtdAp', "                                
                                . " `qtd_ap_router` = '$_qtdApRouter', "                                
                                . " `observacao` = '$_obs' "
                                . " WHERE `codigo` = '1' AND `codigo_escola_wifi` = '$_codigoEscola';";                                
            $resultado_atuWifi = mysqli_query($this->connect(), $consulta_atuWifi);            
        }
        return $consulta_atuWifi;
    }
    
    function __destruct() {}
}

class Fotos extends Database{
    
    private $codigo;
    
    private $escola;
    
    private $caminho;
    
    private $local;
    
    private $momento;
    
    private $descricao;
    
    static $momentoAntes = array("0", "1", "4","5","8","9","12","13");
    
    static $momentoDepois = array("2", "3", "6", "7", "10", "11", "14","15");
    
    static $localAdmin = array("0", "1", "2", "3");
    
    static $localLte = array("4", "5", "6", "7");
    
    static $localWifi = array("8", "9", "10", "11");
    
    static $localDiario = array("12", "13", "14", "15");
    
    function getCodigo(){ return $this->codigo; }
    
    function setCodigo($_codigoFoto){ $this->codigo = $_codigoFoto; }
    
    function getEscola(){ return $this->escola; }
    
    function setEscola($_codigoEscola){ 
        $this->escola = new Escolas();
        $this->escola->iniEscola($_codigoEscola); }
    
    function getCaminho(){ return $this->caminho; }
    
    function setCaminho($_caminho){ $this->caminho = $_caminho; }
    
    function getLocal(){ return $this->local; }
    
    function setLocal($_local){ $this->local = $_local; }
    
    function getMomento(){ return $this->momento; }
    
    function setMomento($_momento){ $this->momento = $_momento; }
    
    function getDescricao(){ return $this->descricao; }
    
    function setDescricao($_descricao){ $this->descricao = $_descricao; }
    
    function iniFotoEscola($_codigoEscola, $_codigoFoto){
        $consulta_iniFoto = "SELECT count(e.codigo_foto) as cont, e.* FROM `escolas_fotos` as e  where e.`codigo_foto` = '$_codigoFoto' and e.`codigo_escola` = '$_codigoEscola' and e.`ativo` = '1';";
        $resultado_iniFoto = mysqli_query($this->connect(), $consulta_iniFoto);
         foreach ($resultado_iniFoto as $table_iniFoto){
            $resultado = $table_iniFoto["cont"];
            $this->setCodigo($table_iniFoto["codigo_foto"]);
            $this->setEscola($table_iniFoto["codigo_escola"]);
            $this->setMomento($table_iniFoto["momento"]);
            $this->setLocal($table_iniFoto["local"]);
            $this->setDescricao($table_iniFoto["descricao_foto"]);
            $this->setCaminho($table_iniFoto["caminho_arquivo"]);
         }
        return $resultado;    
    }
    
    function listaFotos($_codigoEscola){
        $consulta_listaFotos = "SELECT date_format(data_ult_edi, '%d/%m/%Y') as 'data_up', e.* FROM `escolas_fotos` as e  where e.`codigo_escola` = '$_codigoEscola' and e.`ativo` = '1';";
        $resultado_listaFotos = mysqli_query($this->connect(), $consulta_listaFotos);         
        return $resultado_listaFotos;    
    }


    private function gravaBanco($_codigoFoto, $_codigoEscola, $_caminho, $_local, $_momento, $_descricao, $_usuario){
        $data = date_default_timezone_set("America/Bahia");
        $data = date('Y-m-d H:i:s');
        // retorno = 1 - usuario cadastrado 0 - usuario não cadastrado    
        if($this->iniFotoEscola($_codigoEscola , $_codigoFoto) == '1'){
            $consulta_gravaBanco = " UPDATE `escolas_fotos` SET "
                    . " `descricao_foto` = '$_descricao', "
                    . " `caminho_arquivo` = '$_caminho', "
                    . " `local` = '$_local', "
                    . " `momento` = '$_momento', "
                    . " `usuario_ult_edi` = '$_usuario', "
                    . " `data_ult_edi` = '$data' "
                    . " `ativo` = '1' "
                    . " WHERE `codigo_foto` = '$_codigoFoto' AND `codigo_escola` = '$_codigoEscola'; ";                                
            $resultado_gravaBanco = mysqli_query($this->connect(), $consulta_gravaBanco);            
        } else {
            $consulta_gravaBanco = " INSERT INTO `escolas_fotos`(`codigo_foto`,`codigo_escola`,`descricao_foto`,`caminho_arquivo`,`local`,`momento`,`usuario_ult_edi`,`data_ult_edi`,`ativo`) "
                    . " VALUES ('$_codigoFoto','$_codigoEscola','$_descricao','$_caminho','$_local','$_momento','$_usuario','$data','1'); ";
            $resultado_gravaBanco = mysqli_query($this->connect(), $consulta_gravaBanco);            
        }
        return $consulta_gravaBanco;       
    }
    
    function gravaFoto($_arquivo ,$_codEscola, $_usuario){
        $numeroCampos = 16; // Numero de campos de upload        
        $tamanhoMaximo = 1000000;// Tamanho máximo do arquivo (em bytes)
        $caminho = "uploads/";// Caminho para onde o arquivo será enviado
        for ($i = 0; $i < $numeroCampos; $i++) {
            if(in_array($i, self::$momentoAntes)){ $momento = "antes"; } 
            elseif (in_array($i, self::$momentoDepois)) { $momento = "depois"; }
            if(in_array($i, self::$localAdmin)){ $local = "admin"; } 
            elseif (in_array($i, self::$localLte)) { $local = "lte"; }
            elseif (in_array($i, self::$localDiario)) { $local = "diario"; }
            elseif (in_array($i, self::$localWifi)) { $local = "wifi"; }
            $nomeArquivo = $_codEscola."_".$local."_".$momento."_".$i.strrchr($_FILES["$_arquivo"]["name"][$i], ".");
            $tamanhoArquivo = $_FILES["$_arquivo"]["size"][$i];
            $nomeTemporario = $_FILES["$_arquivo"]["tmp_name"][$i];
            $this->setEscola($_codEscola);
            $this->setCodigo($i);
            $this->validaArquivo($nomeArquivo, $nomeTemporario, $tamanhoArquivo, $tamanhoMaximo, $caminho,$local,$momento,"", $_usuario);
        }
    }
    
    private function validaArquivo($_nomeArquivo, $_nomeTemporario,  $_tamanhoArquivo, $_tamanhoMaximo, $_caminho, $_local, $_momento,$_descricao, $_usuario){
        if (!empty($_nomeArquivo)) {                    
                        $erro = false;                        
                        $extensoes = array(".jpg", ".png", ".jpeg",".bmp",".gif");// Extensões aceitas
                        $substituir = true; // Substituir arquivo já existente (true = sim; false = nao)
                        if ($_tamanhoArquivo == 0) { 
                            $erro = "Selecione um arquivo!!"; } 
                        // Verifica se o tamanho do arquivo é maior que o permitido
                        elseif ($_tamanhoArquivo > $_tamanhoMaximo) {
                            $erro = "O arquivo " . $_nomeArquivo . " não deve ultrapassar " . $_tamanhoMaximo. " bytes"; } 
                        // Verifica se a extensão está entre as aceitas
                        elseif (!in_array(strrchr($_nomeArquivo, "."), $extensoes)) {
                            $erro = "A extensão do arquivo <b>" . $_nomeArquivo . "</b> não é válida"; } 
                        // Verifica se o arquivo existe e se é para substituir
                        elseif (file_exists($_caminho . $_nomeArquivo) and !$substituir) {
                            $erro = "O arquivo <b>" . $_nomeArquivo . "</b> já existe"; }
                        // Se não houver erro
                        if (!$erro) { // Move o arquivo para o caminho definido
                            move_uploaded_file($_nomeTemporario, ($_caminho . $_nomeArquivo));
                            // Mensagem de sucesso
                            $caminhoComp = $_caminho.$_nomeArquivo;
                            echo "O arquivo <b>".$_nomeArquivo."</b> foi enviado com sucesso. <br />";
                            $this->gravaBanco($this->getCodigo(), $this->escola->getCodigo(), $caminhoComp, $_local, $_momento, $_descricao, $_usuario); }
                        // Se houver erro Mensagem de erro
                        else { echo $erro . "<br />"; }
                }
    }
    
    function carrossel($_codigoEscola){        
        $i = 0;
        $resultado_listaFotos = $this->listaFotos($_codigoEscola);        
        foreach ($resultado_listaFotos as $table_listaFotos){            
            $codigo[$i] = $table_listaFotos["codigo_foto"];            
            $momento[$i] = $table_listaFotos["momento"];
            $local[$i] = $table_listaFotos["local"];
            $descricao[$i] = $table_listaFotos["descricao_foto"];
            $caminho[$i] = $table_listaFotos["caminho_arquivo"];
            $dataUp[$i] = $table_listaFotos["data_up"];
            $i = $i + 1;            
        }
        
        if(mysqli_num_rows($resultado_listaFotos) > 0){
            echo '<div class="col-lg-12"> <div id="myCarousel" class="col-lg-4 col-lg-offset-4 carousel slide" data-ride="carousel"><ol class="carousel-indicators">';
            echo '<li data-target="#myCarousel" data-slide-to="'.$codigo[0].'" class="active"></li>';
            for ($i = 1; $i < mysqli_num_rows($resultado_listaFotos); $i++) {
                echo '<li data-target="#myCarousel" data-slide-to="'.$codigo[$i].'"></li>';
            }
            echo '</ol><div class="carousel-inner">'
                .'<div class="item active"><img src="'.$caminho[0].'" alt="'.$momento[0].' '.$local[0].'"><h3>'.$local[0].' '.$momento[0].'</h3><p>Foto '.$local[0].' '.$momento[0].' '.$descricao[0].' data upload '.$dataUp[0].'</p></div>';
            for ($i = 1; $i < mysqli_num_rows($resultado_listaFotos); $i++) {
                echo '<div class="item"><img src="'.$caminho[$i].'" alt="'.$momento[$i].' '.$local[$i].'"><h3>'.$local[$i].' '.$momento[$i].'</h3><p>Foto '.$local[$i].' '.$momento[$i].' '.$descricao[$i].' data upload '.$dataUp[$i].'</p></div>';
            }            
            echo '<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a></div></div></div>';
        }        
    }
}