
<?php

function connect() {
    global $conn;
    $conn = new mysqli('localhost', 'root', '', 'project');
    return $conn;
}

function make_header($page_title = 'Firma - Pracownicy') {
    echo '<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$page_title.'</title>
    <link rel="stylesheet" href="style.css">
</head>';
}

function make_navbar($show_back_button = true, $title = 'Aplikacja do obsługi pracowników firmy') {
    $back_element = $show_back_button ? '<h3><a href="index.php">Wróć do menu</a></h3>' : '';
    echo '<header><h2>'.$title.'</h2>'.$back_element.'</header>';
}

function query($query) {
    global $conn;
    return $conn->query($query);
}

function add_worker($database_connection, $imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data) {
    $query = "insert into pracownicy values(null,'$imie','$nazwisko',$wiek,$staz,'$stanowisko','$wydzial',$pensja,'$data');";
    $result = $database_connection->query($query);
    if ($result)
        echo "<h3>Pracownik $imie $nazwisko został dodany na stanowisko $stanowisko w dziale $wydzial. Data dodania: $data</h3>";
    else
        echo "<h3 style='color:red'>Błąd w dodawaniu pracownika</h3>";
}