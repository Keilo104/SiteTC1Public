<?php

include_once $_SESSION["root"].'php/Data/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelUsuario.php';

class DAOUsuario {
    function getAllUsuarios() {	
		$instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
        
		$statement = $conn->prepare("SELECT * FROM usuario");
        $statement->execute();
        
		$linhas = $statement->fetchAll();
		
		if(count($linhas)==0)
				return null;

        $usuarios = [];
		
		foreach ($linhas as $linha) {
			$usuario = new ModelUsuario();
			$usuario->setUsuarioFromDatabase($linha);
			$usuarios[] = $usuario;
        }
        
		return $usuarios;
	}

    function deleteUsuario($id) {
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		try {
			$statement = $conn->prepare("DELETE FROM usuario WHERE id = :id");

			$statement->bindValue(":id", $id);

			return $statement->execute();
		} catch (PDOException $e) {
            echo "Erro ao modificar a base de dados.".$e->getMessage();
        }	
	}

    function setUsuario($usuario) {
		try {
            $sql = "INSERT INTO usuario (
                nome,
                login,
                senha,
                idpermissao) 
                VALUES (
                :nome,
                :login,
                :senha,
                :idpermissao)"
        	;

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			$statement = $conn->prepare($sql);

            $statement->bindValue(":nome", $usuario->getNome());
            $statement->bindValue(":login", $usuario->getLogin());
            $statement->bindValue(":senha", $usuario->getSenha());
            $statement->bindValue(":idpermissao", 0);
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }		
	}
}


?>