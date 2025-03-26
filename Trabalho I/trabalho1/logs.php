<?php
session_start();

// ------------------------------------------------
// 1) Autenticação por sessão
// ------------------------------------------------
$error = '';
if (isset($_POST['accessKey'])) {
    $accessKey = $_POST['accessKey'];
    if ($accessKey === 'senha_da_nasa') {
        $_SESSION['authenticated'] = true;
    } else {
        $error = "Senha errada amigão!";
    }
}

// Se não estiver autenticado, mostra o formulário de acesso e encerra.
if (!isset($_SESSION['authenticated'])):
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logs de Acesso - Autenticação</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="d-flex flex-column min-vh-100 bg-dark">
        <?php include 'components/header.php'; ?>
        <div class="container border border-4 border-danger rounded-3 p-5 mt-5">
            <h2 class="text-start text-white">Logs de Acesso</h2>
            <hr class="text-white">
            <h2 class="text-center text-white text-bold">Access key</h2>
            <hr class="text-white">
            <form method="post" class="d-flex gap-2 align-items-center justify-content-center">
                <input type="password" name="accessKey" class="form-control w-25" id="accessKey"
                    placeholder="Chave de acesso" required>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </form>
            <?php if ($error): ?>
                <div class="alert alert-danger text-center mt-2"><?= $error ?></div>
            <?php endif; ?>
        </div>
        <?php include 'components/footer.php'; ?>
    </body>

    </html>
    <?php
    exit(); // Impede o restante do código de rodar se não estiver autenticado
endif;
?>

<?php
// ------------------------------------------------
// 2) Se chegou aqui, está autenticado. carregando os logs.
// ------------------------------------------------
$arquivoLog = 'logs.txt';
$logs = [];

// Lê o arquivo de reset para saber a partir de que momento contar os acessos
$lastResetFile = 'last_reset.txt';
$lastReset = 0;  // se não existir, assume zero
if (file_exists($lastResetFile)) {
    $lastReset = (int) trim(file_get_contents($lastResetFile));
}

// Verifica se o arquivo de log existe
if (file_exists($arquivoLog)) {
    $linhas = file($arquivoLog, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        // Cada linha está no formato: pagina|dataHora|ip|navegador
        $dados = explode('|', $linha);
        if (count($dados) === 4) {
            $pagina = trim($dados[0]);
            $dataHora = trim($dados[1]);
            $ip = trim($dados[2]);
            $navegador = trim($dados[3]);

            $logs[] = [
                'pagina' => $pagina,
                'dataHora' => $dataHora,
                'ip' => $ip,
                'navegador' => $navegador,
            ];
        }
    }
} else {
    error_log("Arquivo de log não encontrado: $arquivoLog");
}

// ------------------------------------------------
// 3) Calcular contadores APÓS o último reset
// ------------------------------------------------
$acessos = [];  // contador por página
foreach ($logs as $log) {
    // Converte data/hora do log em timestamp
    $logTimestamp = strtotime($log['dataHora']);
    if ($logTimestamp === false) {
        // Se não conseguir converter, consideramos antigo
        continue;
    }

    // Se o log for posterior ao $lastReset, conta
    if ($logTimestamp >= $lastReset) {
        $pagina = $log['pagina'];
        if (isset($acessos[$pagina])) {
            $acessos[$pagina]++;
        } else {
            $acessos[$pagina] = 1;
        }
    }
}

// Ordenar as páginas pelo número de acessos (decrescente)
arsort($acessos);

// Total de acessos
$totalAcessos = array_sum($acessos);

// Mapeamento das páginas para exibição (label e ícone)
$pages = [
    'index.php' => ['label' => 'Início', 'icon' => 'bi-file-text'],
    'contato.php' => ['label' => 'Contato', 'icon' => 'bi-telephone'],
    'sobre.php' => ['label' => 'Sobre', 'icon' => 'bi-info-circle'],
];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-dark text-white d-flex flex-column min-vh-100">
    <?php include 'components/header.php'; ?>
    <div class="container mt-5">
        <div class="card p-4 bg-danger bg-opacity-25 border border-danger">
            <h2 class="text-white">Logs de Acesso</h2>

            <!-- Mensagem de confirmação de ação (caso exista em $_SESSION) -->
            <?php if (isset($_SESSION['mensagem'])): ?>
                <p class="alert alert-success"><?= $_SESSION['mensagem'] ?></p>
                <?php unset($_SESSION['mensagem']); ?>
            <?php endif; ?>

            <!-- Cards com contadores dinâmicos -->
            <div class="row g-3 my-3 p-3 border border-danger rounded">
                <?php foreach ($pages as $file => $info): ?>
                    <div class="col-md-4">
                        <div class="card text-center p-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi <?= $info['icon'] ?>"></i> <?= $info['label'] ?>
                                </h5>
                                <p class="fw-bold">
                                    <?= isset($acessos[$file]) ? $acessos[$file] : 0 ?> Acessos
                                </p>
                                <!-- Form para limpar os acessos de uma página específica -->
                                <form method="post" action="limpar_contadores.php"
                                    onsubmit="return confirm('Deseja realmente limpar os acessos de <?= $info['label'] ?>?');">
                                    <input type="hidden" name="clearPage" value="<?= $file ?>">
                                    <button type="submit" class="btn btn-outline-primary">Limpar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Total de acessos dinâmico -->
            <h4 class="text-white">
                <i class="bi bi-123"></i>
                Total de Acessos: <span class="text-primary"><?= $totalAcessos ?></span>
            </h4>

            <!-- Form para limpar todos os acessos (ZERA contadores, mas mantém logs) -->
            <form method="post" action="limpar_contadores.php"
                onsubmit="return confirm('Deseja realmente ZERAR todos os acessos (mas manter o histórico)?');">
                <button type="submit" name="clearAll" class="btn btn-danger my-2">Limpar todos os acessos</button>
            </form>

            <hr>

            <!-- Tabela com TODOS os logs (independente de reset) -->
            <div class="container mt-1">
                <h2 class="text-white">Logs de Acesso</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Página</th>
                                <th>Data/Hora</th>
                                <th>IP</th>
                                <th>Navegador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $index => $log): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($log['pagina']) ?></td>
                                    <td><?= htmlspecialchars($log['dataHora']) ?></td>
                                    <td><?= htmlspecialchars($log['ip']) ?></td>
                                    <td><?= htmlspecialchars($log['navegador']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Form para limpar todo o log (APAGA fisicamente o arquivo logs.txt) -->
            <form method="post" action="limpar_logs.php"
                onsubmit="return confirm('Deseja realmente APAGAR TODOS OS LOGS? Esta ação não poderá ser desfeita.');">
                <button type="submit" name="clearLog" class="btn btn-danger">Limpar Log</button>
            </form>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>