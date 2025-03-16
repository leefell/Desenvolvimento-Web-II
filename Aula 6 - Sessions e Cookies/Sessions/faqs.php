<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .img-lorem {
            width: 30%;
        }

        .inicio p {
            text-align: justify;
            text-indent: 3.5em;
        }
    </style>
</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
    </svg>

    <div class="container">
        <?php require 'header.php'; ?>

        <div class="sobre">
            <h2>FAQs</h2>
            <p>Aqui estão algumas perguntas frequentes:</p>
            <ul>
                <li><strong>Se eu estiver no meu quarto sozinho e ouvir alguém me chamando pelo nome, devo
                        responder?</strong> Claro! Espíritos adoram saber que foram notados.</li>
                <li><strong>Por que sinto que alguém está me observando, mesmo quando estou sozinho?</strong> Talvez
                    porque você não esteja realmente sozinho.</li>
                <li><strong>Se eu sonhar que estou morrendo e não acordar a tempo, o que acontece?</strong> Boa
                    pergunta. Se descobrir, nos avise… se puder.</li>
                <li><strong>Por que, às vezes, quando acordo de madrugada, sinto que tem algo no canto do
                        quarto?</strong> Porque tem.</li>
                <li><strong>Se um espelho reflete tudo, o que acontece quando ele se quebra?</strong> Talvez ele apenas
                    revele o que sempre esteve escondido atrás dele.</li>
                <li><strong>Já percebeu que nunca vemos nossos vizinhos entrando ou saindo de casa?</strong> Talvez eles
                    nunca saiam. Ou talvez nunca tenham existido.</li>
                <li><strong>Por que um lado do fone de ouvido sempre para de funcionar primeiro?</strong> Porque ele
                    ouviu algo que não devia.</li>
                <li><strong>Se um manequim cair no meio da loja e ninguém estiver por perto, ele faz barulho?</strong>
                    Sim, e provavelmente se levanta sozinho depois.</li>
                <li><strong>Já reparou que, às vezes, seu reflexo no espelho parece um pouco… atrasado?</strong> Talvez
                    ele esteja tentando te avisar sobre algo.</li>
                <li><strong>Por que ouvimos vozes dentro da nossa cabeça quando lemos mentalmente?</strong> Você tem
                    certeza de que são só as suas?</li>
            </ul>

            <img class="img-lorem" src="imgcomemoracao.jpeg" alt="">
        </div>

        <?php require 'footer.php'; ?>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>