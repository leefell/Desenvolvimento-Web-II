<?php
$animais = filter_input(INPUT_GET, 'animais', FILTER_SANITIZE_STRING);
$animal = filter_input(INPUT_GET, 'animal', FILTER_SANITIZE_STRING);

// Converte a string de animais em um array, separando por vírgulas
$animaisArray = $animais ? explode(',', $animais) : [];

// Adiciona o novo animal ao array
if ($animal) {
    $animaisArray[] = $animal;
}

// Converte o array atualizado de volta para uma string para a URL
$animaisString = implode(',', $animaisArray);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .imagens {
            display: flex;
            justify-content: space-between;
        }

        .imagens img {
            width: 230px;
            height: 200px;
            object-fit: inherit;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Praticando 3 - Animais</h1>
        <hr class="mb-4">
        <div class="imagens">
            <a href="?animal=gato&animais=<?php echo $animaisString; ?>">
                <img src="gato.jpg" alt="foto de gato">
            </a>
            <a href="?animal=cachorro&animais=<?php echo $animaisString; ?>">
                <img src="cachorro.jpg" alt="foto de cachorro">
            </a>
            <a href="?animal=hamster&animais=<?php echo $animaisString; ?>">
                <img src="hamster-dourado.jpg" alt="foto de hamster">
            </a>
            <a href="?animal=largatixa&animais=<?php echo $animaisString; ?>">
                <img src="largatixa.jpg" alt="foto de largatixa">
            </a>
        </div>
        <div class="informacoes mt-4">
            <?php if ($animal): ?>
                <p>Você clicou no <b><?= ucfirst($animal) ?>.</b></p>
                <?php if ($animal == 'gato'): ?>
                    <p>O gato é um mamífero da família dos felídeos.</p>
                <?php elseif ($animal == 'cachorro'): ?>
                    <p>O cachorro é um mamífero domesticado da família dos canídeos.</p>
                <?php elseif ($animal == 'hamster'): ?>
                    <p>O hamster é um pequeno roedor muito comum como animal de estimação.</p>
                <?php elseif ($animal == 'largatixa'): ?>
                    <p>A largatixa é um pequeno réptil encontrado em diversas partes do mundo.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="ultimos-clicados mt-4">
            <?php if (count($animaisArray) > 1): ?>
                <h3>Últimos clicados:</h3>
                <?php foreach ($animaisArray as $a): ?>
                    <span><?= ucfirst($a) ?></span><br>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a href="?">Limpar tudo</a>
    </div>
</body>

</html>