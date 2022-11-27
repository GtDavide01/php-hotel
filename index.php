<!-- Descrizione
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->



<?php
// Array di hotel
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
$parcheggio = $_GET["select"] ?? " ";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <title>PHP-HOTEL</title>
</head>

<body>
    <header>
        <h1>PHP-HOTEL</h1>
    </header>
    <!-- MAIN -->
    <main>
        <div class="container">
            <form action="index.php" method="GET">
                <select name="select" id="" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="all">Tutti gli hotel </option>
                    <option value="true">Con parcheggio </option>
                    <option value="false">Senza parcheggio </option>
                </select>
                <button class="btn btn-success" type="submit">FILTRA</button>
            </form>
            <?php
            foreach ($hotels as $singlehotel) {
                if ($parcheggio === 'all') {
            ?>
                    <table class="table  table-success table-striped">
                        <thead>
                            <tr>
                                <?php foreach ($singlehotel as $key => $valore) {
                                    echo "<th scope ='col'> " . $key . "</th>";
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($singlehotel as $key => $valore) {
                                    if ($key == 'parking') {
                                        if ($valore == 'false') {
                                            $valore = "Si";
                                        } else {
                                            $valore = "No";
                                        }
                                    }
                                    echo "<td> " . $valore . "</td>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                } elseif ($parcheggio === 'true') {
                    if ($singlehotel['parking'] === true) {

                    ?>
                        <table class="table  table-success table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($singlehotel as $key => $valore) {
                                        echo "<th scope ='col'> " . $key . "</th>";
                                    }
                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($singlehotel as $key => $valore) {
                                        if ($key == 'parking') {
                                            if ($valore == 'false') {
                                                $valore = "Si";
                                            } else {
                                                $valore = "No";
                                            }
                                        }
                                        echo "<td> " . $valore . "</td>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>

                    <?php }
                } elseif ($parcheggio === 'false') {
                    if ($singlehotel['parking'] === false) {
                    ?>
                        <table class="table  table-success table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($singlehotel as $key => $valore) {
                                        echo "<th scope ='col'> " . $key . "</th>";
                                    }
                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($singlehotel as $key => $valore) {
                                        if ($key == 'parking') {
                                            if ($valore == 'false') {
                                                $valore = "Si";
                                            } else {
                                                $valore = "No";
                                            }
                                        }
                                        echo "<td> " . $valore . "</td>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
            <?php
                    }
                }
            }
            ?>
        </div>
    </main>
</body>

</html>