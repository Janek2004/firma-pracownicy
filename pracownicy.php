<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma - Pracownicy</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php

    require_once ('functions.php');

    if ($conn = connect()) {
        $workers_query = $conn->query('SELECT * FROM pracownicy;');

        echo "<table>";
        echo "<tr>";
        echo "<th>Imię</th>";
        echo "<th>Nazwisko</th>";
        echo "<th>Wiek</th>";
        echo "<th>Pensja</th>";
        echo "</tr>";

        while ($row = $workers_query->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row['imie'] . "</td>";
            echo "<td>" . $row['nazwisko'] . "</td>";
            echo "<td>******</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

    ?>

</body>

</html>