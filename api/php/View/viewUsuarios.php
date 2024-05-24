<?php
    include_once $_SESSION["root"] . "includes/php/head.php";
    include_once $_SESSION["root"] . "includes/php/actionbar.php";
    include_once $_SESSION["root"] . "includes/php/flashcard.php";
?>

<h1>Lista de Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?=$usuario->getNome()?></td>
                    <td><?=$usuario->getLogin()?></td>
                    <td>
                        <?php if($usuario->getIdPermissao() < $_SESSION["idPermissao"]): ?>
                            <a href="editUsuario?id=<?=$usuario->getId()?>"><button class="viewBtn">Editar</button></a>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if($usuario->getIdPermissao() < $_SESSION["idPermissao"]): ?>
                            <a href="deleteUsuario?id=<?=$usuario->getId()?>"><button class="deleteBtn">Excluir</button></a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
    

</body>
</html>