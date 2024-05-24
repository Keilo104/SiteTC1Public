<?php
    include_once $_SESSION["root"] . "includes/php/head.php";
    include_once $_SESSION["root"] . "includes/php/actionbar.php";
    include_once $_SESSION["root"] . "includes/php/flashcard.php";
?>

<div class="formBox">
    <form action="postCadastrarUsuario" method="POST">
        <fieldset>
            <legend>Cadastrar Usuário</legend>
            <br>
            <div class="inputBox">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="enterInput" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" class="enterInput" required>
            </div>
            <br>

            <div class="inputBox">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="enterInput" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="confirmSenha">Confirme a senha</label>
                <input type="password" name="confirmSenha" id="confirmSenha" class="enterInput" required>
            </div>
            <br>

            <button class="sendButton" >Enviar</button>
        </fieldset>
    </form>
</div>

</body>
</html>