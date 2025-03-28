<?php

use Claudsonm\CepPromise\CepPromise;
use Claudsonm\CepPromise\Exceptions\CepPromiseException;

require 'vendor/autoload.php';

$cep = isset($_GET['cep']) ? trim($_GET['cep']) : '';
$error = '';

if ($cep != '') {
    $cep = preg_replace('/\D/', '', $cep);

    if (!preg_match('/^\d{8}$/', $cep)) {
        $error = "CEP inválido. Insira um CEP com 8 dígitos.";
    } else {
        try {
            $response = CepPromise::fetch($cep);
            if (isset($response->error)) {
                $error = "CEP não encontrado.";
            } else {
                $district = $response->district;
                $state = $response->state;
                $street = $response->street;
                $city = $response->city;
                $zipCode = $response->zipCode;
            }
        } catch (CepPromiseException $e) {
            $error = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consulta CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Praticando composer - Busca CEP com Composer</h1>
        <hr />
        <p>CEP:</p>
        <div class="button-class d-flex">
            <form method="get">
                <input name="cep" id="cep" type="text" class="form-control me-3" placeholder="Digite o CEP"
                    oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{5})(\d)/, '$1-$2').slice(0, 9);" />
                <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-warning"
                    onclick="document.getElementById('cep').value = '';">Limpar</button>
            </form>
        </div>

        <?php if ($cep != ''): ?>
            <?php if ($error != ''): ?>
                <div class="card mt-3 p-3 bg-opacity-25 bg-danger border-danger">
                    <p><?= $error ?></p>
                </div>
            <?php else: ?>
                <div class="card mt-3 p-3 bg-opacity-25 bg-success border-success">
                    <h3>CEP: <?= $zipCode ?></h3>
                    <p>Rua: <?= $street ?></p>
                    <p>Bairro: <?= $district ?></p>
                    <p>Cidade: <?= $city ?></p>
                    <p>Estado: <?= $state ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>