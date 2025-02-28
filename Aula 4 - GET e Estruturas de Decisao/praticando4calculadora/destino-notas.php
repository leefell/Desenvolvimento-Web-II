<?php
$nota1 = filter_input(INPUT_POST, "nota1", FILTER_SANITIZE_STRING);
$nota2 = filter_input(INPUT_POST, "nota2", FILTER_SANITIZE_STRING);
$nota3 = filter_input(INPUT_POST, "nota3", FILTER_SANITIZE_STRING);
$media = ($nota1 + $nota2 + $nota3) / 3;

if ($media >= 6) {
    $condicao = "APROVADO";
    $cor = 'text-success';
} elseif ($media >= 5) {
    $condicao = "RECUPERAÇÃO";
    $cor = "text-warning";
} else {
    $condicao = "REPROVADO";
    $cor = "text-danger";
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Praticando - Calculadora Média</h1>
        <hr>
        <p>Um aluno com as notas <b><?php echo $nota1; ?></b>, <b><?php echo $nota2; ?></b> e
            <b><?php echo $nota3; ?></b> tem uma media
            igual a <b><?php echo $media; ?></b>
        </p>
        <br>
        <p>Com essa média o aluno está <span class="<?php echo $cor ?>"><b><?php echo $condicao ?></b></span></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>