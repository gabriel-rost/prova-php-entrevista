<?php
// Conexão com o banco de dados SQLite
try {
    require'connection.php';
}

// Verifica se foram enviadas checkboxes
if(isset($_POST['checkboxes']) && is_array($_POST['checkboxes'])) {
    // Loop através dos valores das checkboxes selecionadas
    foreach($_POST['checkboxes'] as $valor_checkbox) {
        // Prepara e executa a instrução SQL de inserção
        //$sql = "INSERT INTO user_colors (user_id, color_id) VALUES ($_GET[id], :valor)";
        $add = $connection->query"INSERT INTO user_colors (user_id, color_id) VALUES ($_GET[id], :valor)";
        //$stmt = $pdo->prepare($sql);
        //$stmt->bindParam(':valor', $valor_checkbox);
        //$stmt->execute();
    }

    echo "Valores das checkboxes enviados para a base de dados.";
} else {
    echo "Nenhum valor de checkbox foi enviado.";
}
?>
