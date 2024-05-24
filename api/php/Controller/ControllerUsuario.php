<?php

include_once $_SESSION["root"].'php/Data/DAOUsuario.php';
include_once $_SESSION["root"].'php/Model/ModelUsuario.php';

class ControllerUsuario {
    function getAllUsuarios() {
		$usuarioDAO = new DAOUsuario();

		$usuarios = $usuarioDAO->getAllUsuarios();

		return $usuarios;
	}

    function deleteUsuario($id) {
		$usuarioDAO = new DAOUsuario();
        $usuarioDAO->deleteUsuario($id);

		if($resultado) {
			$_SESSION["flash"]["msg"]="Usuário excluído com sucesso";
			$_SESSION["flash"]["sucesso"]=true;		
		}
		else {
			$_SESSION["flash"]["msg"]="Ocorreu algum erro na exclusão";
			$_SESSION["flash"]["sucesso"]=false;
		}
	}

    function setUsuario(){
        $usuarioDAO = new DAOUsuario();
        $usuario = new ModelUsuario();
        $usuario->setUsuarioFromPOST();

        $resultadoInsercao = FALSE;

        if(strcmp($_POST["senha"], $_POST["confirmSenha"]) == 0) {
            $resultadoInsercao = $usuarioDAO->setUsuario($usuario);
        }
            
        if($resultadoInsercao) {
            $_SESSION["flash"]["msg"]="Usuário cadastrado com sucesso";
            $_SESSION["flash"]["sucesso"]=true;
            
            header("Location:viewUsuarios");
        } else {
            header("Location:cadastrarUsuario");
        }
    }
}

?>