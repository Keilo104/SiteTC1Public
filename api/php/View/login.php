<?php
    include_once $_SESSION["root"] . "includes/php/head.php";
    include_once $_SESSION["root"] . "includes/php/flashcard.php";
?>
    <form action="postLogin" method="POST">
        <div class="divLogin">
            <h1>Login</h1>
            <input class="inputLogin" type="text" name="login" placeholder="Nome">
            <br><br>
            <input class="inputLogin" type="password" name="senha" placeholder="Senha">
            <br><br>
            <button class="enterButton">Entrar</button>
        </div>
    </form>
</body>
</html>
