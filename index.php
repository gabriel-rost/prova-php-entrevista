<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de conhecimentos PHP + Banco de dados</title>

</head>
<body>
    
    <?php
    require_once 'nav.php';
    require 'connection.php';

    $connection = new Connection();

    $users = $connection->query("SELECT * FROM users");

    echo "
    <div class='row d-flex justify-content-center'>
        <table class='table' border='1'>
                <tr>
                    <th class='col8'>ID</th>    
                    <th class='col8'>Nome</th>    
                    <th class='col8'>Email</th>
                    <th class='col8'>Ação</th>    
                </tr>
    ";

    foreach($users as $user) {

        echo sprintf("<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <a href='#' class='btn btn-outline-info'>Cores Associadas</a>
                            <a href='editarUsuario.php?id=$user->id' class='btn btn-outline-warning'>Editar</a>
                            <a href='excluirUsuario.php?id=$user->id' class='btn btn-outline-danger'>Excluir</a>
                        </td>
                    </tr>
                    ",
            $user->id, $user->name, $user->email);
    }

    echo "</table>
    </div>";
    ?>
</body>
</html>

<style>
    body{
        text-align: center; 
    }
</style>



