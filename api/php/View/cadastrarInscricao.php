<?php
    include_once $_SESSION["root"] . "includes/php/head.php";
    include_once $_SESSION["root"] . "includes/php/actionbar.php";
    include_once $_SESSION["root"] . "includes/php/flashcard.php";
?>

<div class="formBox">
    <form action="postCadastrarInscricao" method="POST">
        <fieldset>
            <legend>Formulário de inscrição</legend>
            <br>
            <div class="inputBox">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="enterInput" required value="<?php if(isset($inscricao)) echo $inscricao->getNome()?>">
            </div>
            <br>
            <div class="inputBox">
                <label for="idade">Idade</label>
                <input type="number" min="0" max="110" name="idade" id="idade" class="enterInput" required value="<?php if(isset($inscricao)) echo $inscricao->getIdade()?>">
            </div>
            <br>
            <div class="inputBox">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="enterInput" required value="<?php if(isset($inscricao)) echo $inscricao->getTelefone()?>">
            </div>
            <br>

            <p>Selecione o instrumento desejado:</p>
            
            <?php foreach(ModelInscricao::$inst_dict as $key => $value): ?>
            <label>
                <input type="radio" name="curso" value="<?=$key?>" <?php if(isset($inscricao) && $inscricao->getInstDesejado() == $key): ?> checked <?php endif ?>> <?=$value?>
            </label>
            <br>
            <?php endforeach ?>
            <br>
            <button class="sendButton" >Enviar</button>
        </fieldset>
    </form>
</div>


</body>
</html>