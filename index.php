<?php
$months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
]
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/form.css">

    <title>Monthly Calendar</title>
</head>

<body>

    <div class="container-fluid p-0 box">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center ">
            <h1 class="text-center">Monthly Calendar</h1>
        </div>
    </div>

    <div class="container card">
        <p>
            Choose a month and a year :
        </p>
        <p>
        <form action="calendrier.php" method="GET">
            <div>
                <select name="month" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                    <option selected>-- Select a month --</option>
                    <?php
                    foreach ($months as $key => $month) { // Boucle pour les mois
                        $key = $key + 1; // Pour mettre le mois de janvier à 1
                        echo "<option value=\"$key\"> $month </option>";
                    };
                    ?>
                </select>
            </div>

            <div>
                <select name="year" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                    <option selected>-- Select a year --</option>
                    <?php
                    for ($year = 1968; $year <= 2023; $year++) { // Boucle pour les années
                        echo "<option> $year </option>";
                    }
                    ?>
                </select>
            </div>

            <button class="btn btn-outline-danger" type="submit">Submit</button>
        </form>
        </p>
    </div>

</body>

</html>