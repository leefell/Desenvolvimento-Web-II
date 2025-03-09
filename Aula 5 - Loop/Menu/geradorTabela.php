<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de tabela</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Praticando 4 - Gerador de tabela</h1>
        <hr>
        <form action="destinoTabela.php" method="post" class="form-inline">
            <div class="form-group mr-5">
                <label for="linhas" class="mr-2">Linhas: </label>
                <input type="number" class="form-control" id="linhas" name="linhas" required>
            </div>
            <div class="form-group mr-5">
                <label for="colunas" class="mr-2">Colunas: </label>
                <input type="number" class="form-control" id="colunas" name="colunas" required>
            </div>
            <div class="form-group mr-5">
                <label for="estilo" class="mr-2">Estilo: </label>
                <select class="form-control" id="estilo" name="estilo">
                    <option value="table-warning">Warning</option>
                    <option value="table-primary">Primary</option>
                    <option value="table-secondary">Secondary</option>
                    <option value="table-success">Success</option>
                    <option value="table-danger">Danger</option>
                    <option value="table-info">Info</option>
                    <option value="table-light">Light</option>
                    <option value="table-dark">Dark</option>
                </select>
            </div>
            <div class="button-group mt-4 justify-content-center align-items-center d-flex w-100">
                <button type="submit" class="btn btn-success mr-2">Enviar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </div>
        </form>
        
        <div class="text-center">
            <a href="menu.php">Voltar ao menu</a>
        </div>
    </div>
</body>

</html>