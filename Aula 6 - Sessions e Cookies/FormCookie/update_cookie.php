<?php
if (isset($_POST['campo']) && isset($_POST['valor'])) {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    // Define o cookie para expirar em 30 dias
    setcookie($campo, $valor, time() + (30 * 24 * 60 * 60), "/");
    echo "Cookie '{$campo}' atualizado com valor '{$valor}'";
} else {
    echo "Dados não enviados";
}
?>