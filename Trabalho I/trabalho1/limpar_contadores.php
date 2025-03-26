<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['authenticated'])) {
    header("Location: logs.php");
    exit();
}

$logFile = 'logs.txt';
$lastResetFile = 'last_reset.txt';

// -------------------------------------------
// Limpar acessos de UMA página específica
// -------------------------------------------
if (isset($_POST['clearPage'])) {
    $pageToClear = $_POST['clearPage'];

    // Remove fisicamente do logs.txt TODAS as linhas daquela página
    // (assim, some também da tabela)
    if (file_exists($logFile)) {
        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $newLines = [];

        foreach ($lines as $line) {
            // Cada linha está no formato: pagina|dataHora|ip|navegador
            $parts = explode('|', $line);
            if (count($parts) === 4) {
                $pagina = trim($parts[0]);
                // Se a página for a mesma, não inclui no newLines
                if ($pagina === $pageToClear) {
                    continue;
                }
            }
            // Mantém todas as outras
            $newLines[] = $line;
        }

        // Sobrescreve o arquivo com as linhas filtradas
        file_put_contents($logFile, implode(PHP_EOL, $newLines) . PHP_EOL);
    }

    $_SESSION['mensagem'] = "Você limpou os acessos da página: $pageToClear";
    header("Location: logs.php");
    exit();
}

// -------------------------------------------
// Limpar TODOS os acessos (ZERA contadores)
// MAS mantém o logs.txt (histórico)
// -------------------------------------------
if (isset($_POST['clearAll'])) {
    // Basta atualizar o last_reset.txt com o timestamp atual
    file_put_contents($lastResetFile, time());

    $_SESSION['mensagem'] = "Você zerou todos os acessos, mas manteve o histórico de logs.";
    header("Location: logs.php");
    exit();
}

// Se chegar aqui, significa que nenhuma ação válida foi requisitada.
// Redireciona de volta.
header("Location: logs.php");
exit();
