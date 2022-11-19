<?php
$month = $_GET['month'];
$year = $_GET['year'];

//Pour faire le lien precedent
$prev_Month = date('m', strtotime('-1 month', strtotime("$year-$month-01")));
$next_Month = date('m', strtotime('+1 month', strtotime("$year-$month-01")));

// Pour faire le lien suivant
$prev_Year = date('Y', strtotime('-1 month', strtotime("$year-$month-01")));
$next_Year = date('Y', strtotime('+1 month', strtotime("$year-$month-01")));

$day = 1;
$date = new DateTime("$year-$month-$day");
$firstWeekDayInMonth = (int)$date->format('N'); // Pour connaitre le numéro du jour de la semaine au début du mois (ex: lundi=1)
$nbDaysInMonth = (int)$date->format('t'); // Pour connaitre le nombre de jours dans le mois
$monthDays = []; // Tableau qui définit les jours 
$dateLastDay = new DateTime("$year-$month-$nbDaysInMonth"); // Pour savoir quel jour est le dernier du mois
$lastWeekDayInMonth = (int)$dateLastDay->format('N'); // Pour connaitre le numéro du jour de la semaine à la fin du mois (ex: lundi=1)

// Boucle pour les cases vides du début
for ($i = 0; $i < ($firstWeekDayInMonth - 1); $i++) {
    array_push($monthDays, '');
}

// Boucle pour remplir les cases des jours
for ($i = 1; $i <= $nbDaysInMonth; $i++) {
    array_push($monthDays, $i);
}

// Boucle pour remplir les cases vides de la fin
for ($i = 0; $i < (7 - $lastWeekDayInMonth); $i++) {
    array_push($monthDays, '');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/calendrier.css">

    <title>Monthly Calendar</title>
</head>

<body>

    <div class="container">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?month=<?= $prev_Month; ?>&year=<?= $prev_Year ?>">
                    < prev </a>
            </li>
            <li class="list-inline-item">
                <h1><?= strftime('%B', strtotime("$year-$month-01")) . '  ' . $year ?></h1>
            </li>
            <li class="list-inline-item"><a href="?month=<?= $next_Month; ?>&year=<?= $next_Year ?>"> next > </a></li>
        </ul>

        <p class="text-right"><a href="index.php">
                < Back To The Form</a>
        </p>
        <!-- <p class="text-right"><a href="calendrier.php">< Back To The Form</a></p> -->
        <table class="table table-bordered">
            <thead class="table-danger">
                <tr>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                    <th>S</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    for ($i = 0; $i < count($monthDays); $i++) {
                    ?>
                        <td> <?= $monthDays[$i]; ?></td>
                        <?php
                        if (($i + 1) % 7 == 0) {
                        ?>
                </tr>
                <tr>
            <?php
                        }
                    }
            ?>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>