<div class="alert alert-info" role="alert">
    <?php
    echo 'Contatos';
    ?>
</div>
<div  class="input-group">
    <?php
    if ($_POST['enviado']) {
        echo '<p class=\'alert alert-success\' role=\'alert\'>Dados enviados com sucesso, abaixo seguem os dados que você enviou:</p>';
        echo '<p>Nome: ' . $_POST['nome'] . '</p>';
        echo '<p>E-mail: ' . $_POST['email'] . '</p>';
        echo '<p>Assunto: ' . $_POST['assunto'] . '</p>';
        echo '<p>Mensagem: ' . $_POST['mensagem'] . '</p>';
    }
    ?>

    <form method="post" action="">
        <input type="hidden" name="enviado" value="1">
        <p>Nome <input type="text" name="nome" class="form-control"></p>
        <p>Email <input type="text" name="email"></p>
        <p>Assunto <input type="text" name="assunto"></p>
        Mensagem<br>

        <textarea name="mensagem"></textarea>
        <p><button type="submit">Enviar</button></p>
    </form>
</div>
