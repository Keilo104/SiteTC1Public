<?php

include_once $_SESSION["root"].'php/Data/DAOLogin.php';
include_once $_SESSION["root"].'php/Model/ModelUsuario.php';

class ControllerLogin {
	function verificaLogin(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$login = $_POST["login"];
			$senha = $_POST["senha"];	
			
			$loginDAO = new LoginDAO();
			$usuario = new ModelUsuario();

			$usuario = $loginDAO->verificaLogin($login,$senha);

			if ($usuario != NULL && md5($senha . $login) == $usuario->getSenha()) {
				$_SESSION["logado"] = true;
				$_SESSION["nomeLogado"] = $usuario->getNome();
				$_SESSION["idPermissao"] = $usuario->getIdPermissao();

				header("Location:viewInscricoes");
			}

			else {
				$_SESSION["flash"]["login"] = $login;
				$_SESSION["flash"]["msg"] = "Usuário ou senha não conferem";
				$_SESSION["flash"]["sucesso"] = false;

				header("Location:login");
			}
		}
		else {
			header("Location:login");
		}
	}
}