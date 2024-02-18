<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <?php require_once 'nav.php'; ?>
</head>
<body>






    <div class="container text-center">
    <div class="row row-cols-2">
    
    <div class="col">
        <form'>
        <?php
            require 'connection.php';

            $connection = new Connection();
            $users = $connection->query("SELECT * FROM users WHERE id == $_GET[id]");
            foreach($users as $user) {

                echo("
                    
                    <div class='mb-3'>
                        <label for='exampleInputEmail1' class='form-label'>Nome de Usuário</label>
                        <input type='text' name='name' class='form-control' id='name' aria-describedby='' value='$user->name' disabled=''>
                    </div>
                    <div class='mb-3'>
                        <label for='exampleInputEmail1' class='form-label'>Endereço de email</label>
                        <input type='email' name='email' class='form-control' id='email' aria-describedby='' value='$user->email' disabled=''>
                    </div> 
                    
                ");
            }

        ?>
        </form>
    </div>
    <div class="col">
        <form method="post" onsubmit="return validarFormulario()">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Atualizar Nome de Usuário</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Atualizar Endereço de email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkbox">
                <label class="form-check-label" for="checkbox">Confirmar alterações</label>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
            <?php

            // Verifica se os campos do formulário foram preenchidos
            if (isset($_POST['name']) && isset($_POST['email'])) {
                echo "Usuário cadastrado com sucesso!";

                // Dados do formulário
                $name = $_POST['name'];
                $email = $_POST['email'];

                $connection = new Connection();
                $sql = $connection->query("UPDATE 'users' set 'name' = '$name', 'email' = '$email' WHERE id = $_GET[id];");
                
            }
            ?>
        </form>
    </div>
    </div>
    </div>




    
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
