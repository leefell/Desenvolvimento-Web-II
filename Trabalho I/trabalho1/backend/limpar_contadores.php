<?php
session_start();
// Verifica se o usuário está autenticado
if (!isset($_SESSION['authenticated'])) {
    header('Location: logs.php');
    exit();
}

// Para este exemplo, se você estiver armazenando contadores em um arquivo separado,
// basta sobrescrever o arquivo com conteúdo vazio ou com os dados zerados.
// Caso os contadores sejam derivados dos logs, uma opção pode ser reiniciar o arquivo de logs.
$arquivoContador = 'contador.txt';
file_put_contents($arquivoContador, ''); // ou recriar a estrutura zerada

// Redireciona de volta para a página de logs
header('Location: logs.php');
exit();
?>