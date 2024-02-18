<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
</head>

<?php
    require_once 'nav.php';
    require 'connection.php';
?>

<body>

    <form method="post" onsubmit="return validarFormulario()">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome de Usuário</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Endereço de email</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="checkbox">
        <label class="form-check-label" for="checkbox">Confirmar alterações</label>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Cadastro</button>

    <?php

    // Verifica se os campos do formulário foram preenchidos
    if (isset($_POST['name']) && isset($_POST['email'])) {
        echo "
        
        <div class='alert alert-success d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'></use></svg>
        <div>
          Usuário cadastrado com sucesso!
        </div>
        </div>
        
        ";

        // Dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];

        $connection = new Connection();
        $sql = $connection->query("INSERT INTO users(name, email) VALUES ('$name', '$email')");
        
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
