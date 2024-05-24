
    <div class="actionbar">
    <span class="user-greeting">Olá, <?=$_SESSION["nomeLogado"]?>!</span>
    <a href="cadastrarInscricao"><button class="action-button">Cadastrar Inscrição</button></a>
    <a href="viewInscricoes"><button class="action-button">Visualizar Inscrições</button></a>
    <?php if($_SESSION["idPermissao"] == 1): ?>
    <a href="cadastrarUsuario"><button class="action-button">Cadastrar Usuário</button></a>
    <a href="viewUsuarios"><button class="action-button">Visualizar Usuário</button></a>
    <?php endif ?>
    <a href="logout"><button class="action-button-logout">Log-Out</button></a>
    </div>
    <br>