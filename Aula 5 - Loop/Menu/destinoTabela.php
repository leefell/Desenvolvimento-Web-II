<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale='1.0'">
    <title>Tabela Gerada</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .borda{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Praticando 4 - Gerador de tabela</h1>
        <hr>
        <table class="table table-bordered table-striped borda">
            <tbody>
            <?php
            $linhas = $_POST['linhas'];
            $colunas = $_POST['colunas'];
            $estilo = $_POST['estilo'];
            for ($i = 0; $i < $linhas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $colunas; $j++) {
                    echo "<td class='$estilo'>i: $i, j: $j</td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        
        <div class="text-center mt-3">
            <a href="menu.php">Voltar ao menu</a>
        </div>
    </div>
</body>
</html>