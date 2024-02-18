<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cores</title>
</head>
<body>
    <?php
    require_once 'nav.php';
    require 'connection.php';

    $connection = new Connection();

    $colors = $connection->query("SELECT * FROM colors");

    echo "
    <div class='row d-flex justify-content-center'>
        <table class='table' border='1'>
                <tr>
                    <th class='col8'>ID</th>    
                    <th class='col8'>Nome</th>    
                    <th class='col8'>Ação</th>    
                </tr>
    ";

    foreach($colors as $color) {

        echo sprintf("<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <a href='excluirCor.php?id=$color->id' class='btn btn-outline-danger'>Excluir</a>
                        </td>
                    </tr>
                    ",
            $color->id, $color->name);
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