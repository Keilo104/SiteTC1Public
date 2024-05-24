<?php
include_once $_SESSION["root"].'php/Data/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelUsuario.php';

class LoginDAO {
	function verificaLogin($login) {

		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM usuario WHERE login = :login");
		$statement->bindParam(':login', $login);
		$statement->execute();	
		$linha = $statement->fetch();

		if($linha==null){
			return null;
		}

		$usuario = new ModelUsuario();

		$usuario->setUsuarioFromDataBase($linha);

   		return $usuario;
	}
}