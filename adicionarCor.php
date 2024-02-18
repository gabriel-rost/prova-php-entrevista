<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cor</title>
</head>
<body>

<?php
        require_once 'nav.php';
        require 'connection.php';
    ?>

    <form method="post" onsubmit="return validarFormulario()">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome da Cor</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="">
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="checkbox">
        <label class="form-check-label" for="checkbox">Confirmar alterações</label>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Cadastro</button>

    <?php
    // Verifica se os campos do formulário foram preenchidos
    if (isset($_POST['name'])) {
        echo "Cor cadastrada com sucesso!";

        // Dados do formulário
        $name = $_POST['name'];

        $connection = new Connection();
        $sql = $connection->query("INSERT INTO colors(name) VALUES ('$name')");
        
    }

    ?>
    </form>

</body>
</html>

<script>

// Verifica se a checkbox foi clicada
function validarFormulario() {
    var checkbox = document.getElementById("checkbox");

    if (!checkbox.checked) {
        alert("Por favor, confirme as alterações antes de enviar o formulário.");
        return false; // Impede o envio do formulário
    }
    return true; // Permite o envio do formulário
}
</script>