<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .row {
            justify-content: center;
            margin-bottom: 20px;
        }

        .row a {
            font-size: 20px;
            text-decoration: none;
            color: #007bff;
            margin-right: 15px;
        }

        .prime-box {
            border: 2px solid #28a745;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            font-weight: bold;
        }

        .not-prime-box {
            border: 2px solid #dc3545;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            font-weight: bold;
        }

        p {
            font-size: 35px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-3 text-center">Praticando 3 - Números primos</h1>
        <hr>

        <div class="row">
            <a href="?val=1" class="mr-5">Número 1</a>
            <a href="?val=2" class="mr-5">Número 2</a>
            <a href="?val=3" class="mr-5">Número 3</a>
            <a href="?val=4" class="mr-5">Número 4</a>
            <a href="?val=5" class="mr-5">Número 5</a>
            <a href="?val=6" class="mr-5">Número 6</a>
            <a href="?val=7" class="mr-5">Número 7</a>
        </div>

        <div class="d-flex align-items-center justify-content-center flex-column" style="min-height: 200px;">
            <?php
            $val = filter_input(INPUT_GET, "val", FILTER_SANITIZE_NUMBER_INT);

            function ehPrimo($num)
            {
                if ($num <= 1)
                    return false;
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) {
                        return false;
                    }
                }
                return true;
            }

            function ehPar($num)
            {
                return $num % 2 == 0;
            }

            if ($val !== null) {
                $prime = ehPrimo($val);
                $par = ehPar($val);

                if ($prime) {
                    echo "<p>O número 
                            <span class='prime-box'>$val</span> 
                            <span class='prime-box'>é</span> 
                            um número 
                            <span class='prime-box'>PRIMO</span>.
                          </p>";
                    echo "<p>Além disso ele é um número 
                            <span class='prime-box'>" . ($par ? "PAR" : "ÍMPAR") . "</span>
                          </p>";
                } else {
                    echo "<p>O número 
                            <span class='not-prime-box'>$val</span> 
                            <span class='not-prime-box'>não é</span> 
                            um número 
                            <span class='not-prime-box'>PRIMO</span>.
                          </p>";
                    echo "<p>Além disso ele é um número 
                            <span class='not-prime-box'>" . ($par ? "PAR" : "ÍMPAR") . "</span>
                          </p>";
                }
            }
            ?>
        </div>

        <div class="text-center">
            <a href="menu.php">Voltar ao menu</a>
        </div>
    </div>
</body>

</html>