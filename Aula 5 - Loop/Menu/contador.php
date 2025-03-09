<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tabuada</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Contador</h1>
        <hr>
        <form action="destinoContador.php" method="post" class="ml-5">
            <div class="form-group w-25">
                <label for="inicio">Início: </label>
                <input class="form-control" name="inicio" type="number">
            </div>

            <div class="form-group w-25">
                <label for="final">Final: </label>
                <input class="form-control" type="number" name="final" id="final">
            </div>

            <div class="form-group w-25">
                <label for="incremento">Incremento: </label>
                <input class="form-control" type="number" name="incremento" id="incremento">
            </div>

            <div class="button-group mt-3">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </div>
        </form>
        <a class="ml-5 mt-3" href="menu.php">Voltar ao menu</a>
    </div>
</body>

</html>