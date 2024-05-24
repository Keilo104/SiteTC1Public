<?php

include_once $_SESSION["root"].'php/Data/DAOInscricao.php';
include_once $_SESSION["root"].'php/Model/ModelInscricao.php';

class ControllerInscricao {
    function getAllInscricoes() {
		$inscricaoDAO = new DAOInscricao();

		$inscricoes = $inscricaoDAO->getAllInscricoes();

		return $inscricoes;
	}

    function getInscricaoById($id) {
        $inscricaoDAO = new DAOInscricao();

		$inscricao = $inscricaoDAO->getInscricaoById($id);

		return $inscricao;
    }

    function deleteInscricao($id) {
		$inscricaoDAO = new DAOInscricao();
        $inscricaoDAO->deleteInscricao($id);

		if($resultado) {
			$_SESSION["flash"]["msg"]="Inscrição excluída com sucesso";
			$_SESSION["flash"]["sucesso"]=true;		
		}
		else {
			$_SESSION["flash"]["msg"]="Ocorreu algum erro na exclusão";
			$_SESSION["flash"]["sucesso"]=false;
		}
	}

    function setInscricao(){
        $inscricaoDAO = new DAOInscricao();
        $inscricao = new ModelInscricao();
        $inscricao->setInscricaoFromPOST();
        $resultadoInsercao = $inscricaoDAO->setInscricao($inscricao);
            
        if($resultadoInsercao){
            $_SESSION["flash"]["msg"]="Inscrição cadastrada com sucesso";
            $_SESSION["flash"]["sucesso"]=true;
            
            header("Location:viewInscricoes");
        }
    }
}

?>