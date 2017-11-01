<?php
// as variáveis login e senha recebem os dados digitados na p�gina anterior
$login = $_POST['login'];
$pass_branco = $_POST['pass'];

include_once '../class/principal.php';

$usuario = new Usuario();    
//Caso consiga logar cria a sessão
if ($usuario->verificaUsuario($login, $pass_branco) == 1) {
	// session_start inicia a sessão
	session_start();
	
	$_SESSION['login'] = $usuario->getUsuario();
	$_SESSION['pass'] = $usuario->getSenha();
        $_SESSION['nome_usuario'] = $usuario->getNome();
        $_SESSION['diretoria'] = $usuario->getDiretoria();
        if($usuario->getSenha() == "7c222fb2927d828af22f592134e8932480637c0d"){
           header('location:novasenha.php'); 
        } else {
            header('location:index.php');
        }
}

//Caso contrário redireciona para a p�gina de autentica��o
else {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['login']);
	unset ($_SESSION['pass']);
        unset ($_SESSION['nome_usuario']);
        unset ($_SESSION['diretoria']);
        

	//Redireciona para a página de autentica��o
	header('location:login.php');
	
}

    