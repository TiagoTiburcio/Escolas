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
            $consulta_usuario5 = "UPDATE `usuario` SET `senha` = '".$this->getSenhaEncriptada($_novaSenha)."' WHERE `id` = '".$this->getCodigo()."';";                                
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

            //Redireciona para a página de autenticação
            echo '<META http-equiv="refresh" content="0;../home/login.php">';
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
            $consulta_usuario5 = "UPDATE `usuario` SET `senha` = '".$this->getSenhaEncriptada($_novaSenha)."' WHERE `id` = '".$this->getCodigo()."';";                                
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
    
    
    function __destruct() {}
}