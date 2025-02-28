<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <h1>Praticando - Calculadora Média</h1>
        <hr>
        <form action="destino-notas.php" class="column g-3" method="post">
            <div class="col-md-4">
                <label class="form-label" for="nota1">Nota 1: </label>
                <input type="text" name="nota1" id="nota1" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="nota2">Nota 2: </label>
                <input type="text" name="nota2" id="nota2" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="nota3">Nota 3: </label>
                <input type="text" name="nota3" id="nota3" class="form-control" required>
            </div>

            <div class="button-group mt-3">
                <button type="submit" class="btn btn-success">Calcular média</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>