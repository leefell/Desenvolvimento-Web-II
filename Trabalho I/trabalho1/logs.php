<?php
session_start();

$error = '';

if (isset($_POST['accessKey'])) {
    $accessKey = $_POST['accessKey'];
    if ($accessKey === 'senha_da_nasa') {
        $_SESSION['authenticated'] = true;
    } else {
        $error = "Senha errada amigão!";
    }
}

if (!isset($_SESSION['authenticated'])) {
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
    exit();
}
?>
<?php
// Continuação do arquivo logs.php (usuário autenticado)
$arquivoLog = 'logs.txt';
$logs = [];

// Verifica se o arquivo de log existe
if (file_exists($arquivoLog)) {
    $linhas = file($arquivoLog, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        // Cada linha está no formato: pagina;dataHora;ip;navegador
        $dados = explode(';', $linha);
        if (count($dados) === 4) {
            $logs[] = [
                'pagina' => $dados[0],
                'dataHora' => $dados[1],
                'ip' => $dados[2],
                'navegador' => $dados[3],
            ];
        }
    }
}

// Contar os acessos por página
$acessos = [];
foreach ($logs as $log) {
    if (isset($acessos[$log['pagina']])) {
        $acessos[$log['pagina']]++;
    } else {
        $acessos[$log['pagina']] = 1;
    }
}

// Ordenar as páginas pelo número de acessos de forma decrescente
arsort($acessos);

// Total de acessos
$totalAcessos = array_sum($acessos);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white d-flex flex-column min-vh-100">
    <?php include 'components/header.php'; ?>
    <div class="container my-5">
        <h2 class="mb-4">Logs de Acesso</h2>

        <!-- Exibição dos contadores -->
        <h4>Acessos por Página</h4>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Página</th>
                    <th>Quantidade de Acessos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($acessos as $pagina => $qtd): ?>
                    <tr>
                        <td><?= $pagina ?></td>
                        <td><?= $qtd ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total de Acessos: <strong><?= $totalAcessos ?></strong></p>

        <!-- Botões para limpar contadores e logs -->
        <div class="d-flex gap-2">
            <form method="post" action="limpar_contadores.php"
                onsubmit="return confirm('Tem certeza que deseja limpar os contadores de acesso?')">
                <button type="submit" class="btn btn-warning">Limpar Contadores</button>
            </form>
            <form method="post" action="limpar_logs.php"
                onsubmit="return confirm('Tem certeza que deseja limpar o registro de logs?')">
                <button type="submit" class="btn btn-danger">Limpar Logs</button>
            </form>
        </div>

        <!-- Exibição detalhada dos registros -->
        <h4 class="mt-5">Registros Detalhados</h4>
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
                        <td><?= $log['pagina'] ?></td>
                        <td><?= $log['dataHora'] ?></td>
                        <td><?= $log['ip'] ?></td>
                        <td><?= $log['navegador'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botão para sair (encerrar a sessão) -->
        <div class="mt-4">
            <a href="backend/sair.php" class="btn btn-secondary">Sair</a>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
</body>

</html>