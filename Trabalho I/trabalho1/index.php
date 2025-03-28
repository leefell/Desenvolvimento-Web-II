<?php
session_start();
require_once 'AccessLogger.php';
$logger = new AccessLogger();
$logger->registrarAcesso('index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-dark">
    <?php require 'components/header.php' ?>

    <div class="container border border-3 border-danger rounded-3 p-5 mt-5">
        <h2 class="text-start text-white">Ínicio</h2>
        <p class="text-white">Os 4 parágrafos descrevem o emoji, mas a cada descrição fica mais informal</p>
        <hr class="text-white">
        <figure class="d-flex align-items-center">
            <img src="images/dedo.png" class="img-fluid" alt="emoji daora">
            <div class="ms-3">
                <!-- 1. Extremamente formal -->
                <p class="text-white mb-0">Digníssimos senhores, é com a mais elevada consideração que se apresenta uma
                    análise sobre a emblemática representação gráfica que, por meio de um semblante austero e da
                    elevação do membro médio da mão, traduz um sentimento inequívoco de insatisfação ou rebeldia. Este
                    símbolo, de natureza indubitavelmente expressiva, tem sido objeto de variadas interpretações,
                    oscilando entre a comunicação de profundo desagrado e o uso humorístico em ambientes de
                    informalidade. Embora sua exibição possa ser considerada impertinente em contextos de decoro
                    elevado, sua difusão no âmbito digital evidencia a transformação dos paradigmas comunicacionais
                    contemporâneos.</p>
                <br>

                <!-- 2. Formal -->
                <p class="text-white mb-0">Este emoji consolidou-se como um ícone visual de forte impacto na comunicação
                    moderna. Representando uma expressão de descontentamento, sua utilização pode variar entre o
                    protesto explícito e a ironia descontraída, sendo frequentemente empregado para enfatizar emoções
                    intensas. Embora sua exibição seja, por vezes, interpretada como inadequada em interações formais,
                    em contextos informais ele se tornou um recurso estilístico capaz de transmitir mensagens de maneira
                    direta e expressiva, refletindo a evolução da linguagem digital e a adaptação das normas sociais ao
                    universo virtual.</p>
                <br>

                <!-- 3. Moderadamente informal -->
                <p class="text-white mb-0">Esse emoji já se tornou um símbolo clássico de rebeldia e frustração na
                    internet. Com um rosto bravo e o dedo do meio levantado, ele deixa bem claro o tom da mensagem.
                    Dependendo do contexto, pode ser usado para demonstrar irritação de forma direta ou até de maneira
                    irônica e engraçada. Mesmo sendo considerado rude em certas situações, ele virou parte do jeito
                    descontraído que muita gente se comunica online hoje em dia.</p>
                <br>

                <!-- 4. Informal -->
                <p class="text-white mb-0">Mano, esse emoji fala por si só! Levantou o dedo do meio? Pronto, já mandou o
                    recado. Pode ser raiva, zoeira ou só aquele protesto básico contra alguma coisa. Tem gente que acha
                    falta de respeito, mas na real, no zap e nas redes, já virou até meme. O bom é que, dependendo do
                    tom da conversa, ele tanto pode ser pura treta quanto só uma brincadeira entre amigos.</p>
                <br>

            </div>
        </figure>

    </div>

    <?php require 'components/footer.php' ?>
</body>

</html>