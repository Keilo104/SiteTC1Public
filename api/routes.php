<?php

include_once $_SESSION["root"].'php/Controller/ControllerLogin.php';
include_once $_SESSION["root"].'php/Controller/ControllerInscricao.php';
include_once $_SESSION["root"].'php/Controller/ControllerUsuario.php';

$first_action = $path[1 + $_SESSION["routes_variable"]];
$first_action = explode('?', $first_action)[0];

$title = "";
$css = "";
$js = "";

if ($first_action == '' || $first_action == 'login' || $first_action == 'index' || $first_action == 'login.php' || $first_action == 'index.php') {
    if(isset($_SESSION["logado"]) && $_SESSION["logado"]) {
        header("Location:viewInscricoes");

	} else {
        $title = "TC1";
        $css = "login";
        require_once $_SESSION['root'] . 'php/View/login.php';
	}

} else if ($first_action == "postLogin") {
	$cLogin = new ControllerLogin();
	$cLogin->verificaLogin();

} else if ($first_action == "logout") {
	unset($_SESSION["logado"]);
	unset($_SESSION["nomeLogado"]);
	unset($_SESSION["idPermissao"]);
    header("Location:login");
    
} else if ($first_action == "css") {
    $second_action = $path[2 + $_SESSION["routes_variable"]];
    header("Content-type: text/css; charset: UTF-8");
    
    require_once $_SESSION['root'] . "includes/css/$second_action.css";

} else if ($first_action == "js") {
    $second_action = $path[2 + $_SESSION["routes_variable"]];
    header("Content-type: text/javascript; charset: UTF-8");
    
    require_once $_SESSION['root'] . "includes/js/$second_action.js";

} else if (isset($_SESSION["logado"]) && $_SESSION["logado"]) {
    if ($first_action == "viewInscricoes") {
        $title = "Visualizar Inscrições";
        $css = "viewInscricoes";

        $cInscricao = new ControllerInscricao();
        $inscricoes = $cInscricao->getAllInscricoes();

        require_once $_SESSION["root"] . 'php/View/viewInscricoes.php';

    } else if ($first_action == "cadastrarInscricao") {
        $title = "Formulário de Inscrição";
        $css = "cadastrarInscricao";

        require_once $_SESSION['root'] . 'php/View/cadastrarInscricao.php';

    } else if ($first_action == "postCadastrarInscricao") {
        $cInscricao = new ControllerInscricao();
        $cInscricao->setInscricao();

    } else if ($first_action == "editInscricao") {
        $title = "Formulário de Inscrição";
        $css = "cadastrarInscricao";

        $cInscricao = new ControllerInscricao();
        $inscricao = $cInscricao->getInscricaoById($_GET["id"]);

        require_once $_SESSION['root'] . 'php/View/cadastrarInscricao.php';

    } else if ($first_action == "deleteInscricao" && $_SESSION["idPermissao"] >= 1) {
        $cInscricao = new ControllerInscricao();
        $cInscricao->deleteInscricao($_GET["id"]);

        header("Location:viewInscricoes");

    } elseif ($first_action == "viewUsuarios" && $_SESSION["idPermissao"] >= 1) {
        $title = "Visualizar Usuários";
        $css = "viewUsuarios";

        $cUsuario = new ControllerUsuario();
        $usuarios = $cUsuario->getAllUsuarios();

        require_once $_SESSION["root"] . 'php/View/viewUsuarios.php';

    } else if ($first_action == "cadastrarUsuario" && $_SESSION["idPermissao"] >= 1) {
        $title = "Formulário de Usuário";
        $css = "cadastrarUsuario";

        require_once $_SESSION['root'] . 'php/View/cadastrarUsuario.php';

    } else if ($first_action == "postCadastrarUsuario" && $_SESSION["idPermissao"] >= 1) {
        $cUsuario = new ControllerUsuario();
        $cUsuario->setUsuario();

    } else if ($first_action == "deleteUsuario" && $_SESSION["idPermissao"] >= 1) {
        $cUsuario = new ControllerUsuario();
        $cUsuario->deleteUsuario($_GET["id"]);

        header("Location:viewUsuarios");

    } else {
        $title = "You're lost!";
        require_once $_SESSION['root'] . 'php/View/404.php';
    }

} else {
    $title = "You're lost!";
    require_once $_SESSION['root'] . 'php/View/404.php';
}

?>