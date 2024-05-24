<?php

include_once $_SESSION["root"].'php/Data/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelInscricao.php';

class DAOInscricao {
    function getAllInscricoes() {	
		$instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
        
		$statement = $conn->prepare("SELECT * FROM inscricoes");
        $statement->execute();
        
		$linhas = $statement->fetchAll();
		
		if(count($linhas)==0)
				return null;

        $inscricoes = [];
		
		foreach ($linhas as $linha) {
			$inscricao = new ModelInscricao();
			$inscricao->setInscricaoFromDatabase($linha);
			$inscricoes[] = $inscricao;
        }
        
		return $inscricoes;
	}

    function getInscricaoById($id) {
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM inscricoes WHERE id = :id");
		$statement->bindValue(":id", $id);
		$statement->execute();
		
		$linhas = $statement->fetchAll();

		if(count($linhas)==0) {
			return null;
		}

		$inscricao = new ModelInscricao();
		$inscricao->setInscricaoFromDataBase($linhas[0]);

		return $inscricao;		
	}

    function deleteInscricao($id) {
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		try {
			$statement = $conn->prepare("DELETE FROM inscricoes WHERE id = :id");

			$statement->bindValue(":id", $id);

			return $statement->execute();
		} catch (PDOException $e) {
            echo "Erro ao modificar a base de dados.".$e->getMessage();
        }	
	}

    function setInscricao($inscricao) {
		try {
            $sql = "INSERT INTO inscricoes (
                nome,
                idade,
                telefone,
                inst_desejado) 
                VALUES (
                :nome,
                :idade,
                :telefone,
                :inst_desejado)"
        	;

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			$statement = $conn->prepare($sql);

            $statement->bindValue(":nome", $inscricao->getNome());
            $statement->bindValue(":idade", $inscricao->getIdade());
            $statement->bindValue(":telefone", $inscricao->getTelefone());
            $statement->bindValue(":inst_desejado", $inscricao->getInstDesejado());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }		
	}
}


?>