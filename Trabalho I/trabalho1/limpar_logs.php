<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['authenticated'])) {
    header("Location: logs.php");
    exit();
}

// Verifica se foi enviado um pedido para limpar todo o log
if (isset($_POST['clearLog'])) {
    $logFile = 'logs.txt';

    // Apaga todo o conteúdo do arquivo de log
    if (file_exists($logFile)) {
        file_put_contents($logFile, '');
    }

    $_SESSION['mensagem'] = "Você limpou todos os logs!";
}

// Redireciona de volta para logs.php
header("Location: logs.php");
exit();
