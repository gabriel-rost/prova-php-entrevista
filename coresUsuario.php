<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cores Usuário</title>
    <?php require_once 'nav.php'; ?>
</head>
<body>




    <div class="container text-center">

    <?php
    require 'connection.php';
    $connection = new Connection();


    // Selecionando do DB o usuário
        $users = $connection->query("SELECT * FROM users WHERE id = $_GET[id]");
        foreach($users as $user) {

            echo sprintf("
                        <br>Nome: %s</br>
                        <p>id: %s</p>
                        ",
                $user->name, $user->id);
        }
    ?>

    <div class="row row-cols-2">
    <div class="col">
    
    <?php


    echo "

    <div class='row d-flex justify-content-center'>
        <table class='table' border='1'>
                <tr>   
                    <th class='col8'>ID Cores Cadastradas do Usuário</th>  
                </tr>
    ";

    $colors = $connection->query("SELECT * FROM user_colors WHERE user_id = $_GET[id]");

    foreach($colors as $color) {

        echo sprintf("<tr>
                        <td>%s</td>
                    </tr>
                    ",
            $color->color_id);
    }

    echo "</table>
    </div>";

    //SELECT * FROM user_colors WHERE user_id = 4;

    ?>





    </div>

    
    <div class="col">
    <?php
    echo "

    <div class='row d-flex justify-content-center'>
    <form method='post' action='processar_formulario.php?id=$_GET[id]'>
        <table class='table' border='1'>
                <tr>   
                    <th class='col8'>ID Cores Disponíveis</th>
                    <th class='col8'>Nome</th>  
                </tr>
    ";

    $colors = $connection->query("SELECT * FROM colors");

    foreach($colors as $color) {

        echo sprintf("<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td><input type='checkbox' name='checkboxes[]' class='form-check-input' id='checkbox' value='$color->id'></td>
                    </tr>
                    ",
            $color->id, $color->name);
    }

    echo "</table>    <button type='submit'>Enviar</button>
    </form>
    </div>"; ?>
    

    <?php



    ?>

    </form>
    


    </div>


</div></div>




</body>
</html>




