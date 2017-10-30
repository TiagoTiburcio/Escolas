<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author tiagoc
 */
abstract class Database {
           
    private static $host     = "172.25.76.85";   
    private static $user     = "codin";
    private static $password = "74123698codin";
    private static $db       = "escolas";
     
    /*Metodos que trazem o conteudo da variavel desejada
    @return   $xxx = conteudo da variavel solicitada*/
    
    private function getHost()    {return self::$host;}   
    private function getUser()    {return self::$user;}
    private function getPassword(){return self::$password;}
    private function getDB()      {return self::$db;}
     
    function connect(){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPassword(), $this->getDB());
        if (mysqli_connect_errno()){
                echo "Falha na conexão: ". mysqli_connect_errno() ;
        }        
        if (!mysqli_set_charset($conexao, "utf8")) {
            printf("Error loading character set utf8: %s\n", mysqli_error($conexao));
            exit();
        } else {
            mysqli_character_set_name($conexao);
        }
        return $conexao;
    }
    
    function close(){              
    } 
}
