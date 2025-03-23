<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: logs.php');
    exit();
}

// Apaga o arquivo de logs
$arquivoLog = 'logs.txt';
if (file_exists($arquivoLog)) {
    unlink($arquivoLog);
}

// Redireciona para logs.php
header('Location: logs.php');
exit();
?>