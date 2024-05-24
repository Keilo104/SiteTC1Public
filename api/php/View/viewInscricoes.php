<?php
    include_once $_SESSION["root"] . "includes/php/head.php";
    include_once $_SESSION["root"] . "includes/php/actionbar.php";
    include_once $_SESSION["root"] . "includes/php/flashcard.php";
?>

<h1>Inscrição para Instrumentos Musicais</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Telefone</th>
                <th>Instrumento Desejado</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inscricoes as $inscricao): ?>
                <tr>
                    <td><?=$inscricao->getNome()?></td>
                    <td><?=$inscricao->getIdade()?></td>
                    <td><?=$inscricao->getTelefone()?></td>
                    <td><?= ModelInscricao::$inst_dict[$inscricao->getInstDesejado()] ?></td>
                    <td>
                        <?php if(1 <= $_SESSION["idPermissao"]): ?>
                            <a href="editInscricao?id=<?=$inscricao->getId()?>"><button class="viewBtn">Editar</button></a>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if(1 <= $_SESSION["idPermissao"]): ?>
                            <a href="deleteInscricao?id=<?=$inscricao->getId()?>"><button class="deleteBtn">Excluir</button></a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>