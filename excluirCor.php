<?php

require "connection.php";
$connection = new Connection();
// Verifica se os campos do formulário foram preenchidos
if (isset($_GET['id'])) {
    $delete = $connection->query("DELETE FROM colors WHERE id == $_GET[id]");
    echo "<script>
    alert('Registro excluído com sucesso!');
    window.location.href = 'cores.php';
    </script>";
}

?>