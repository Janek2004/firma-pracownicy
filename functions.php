
<?php

function connect() {
    global $conn;
    $conn = new mysqli('localhost', 'root', '', 'project');
    return $conn;
}

function disconnect() {
    global $conn;
    if($conn) {
        $conn->close();
    }
}

function query($query) {
    global $conn;
    return $conn->query($query);
}

function add_worker($imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data) {
    $query = "insert into pracownicy values(null,'$imie','$nazwisko',$wiek,$staz,'$stanowisko','$wydzial',$pensja,'$data');";
    $result = query($query);
    if ($result)
        echo "<h3>Pracownik $imie $nazwisko został dodany na stanowisko $stanowisko w dziale $wydzial. Data dodania: $data</h3>";
    else
        echo "<h3 style='color:red'>Błąd w dodawaniu pracownika</h3>";
}

// GENERATING HTML ELEMENTS

function make_header($page_title = 'Firma - Pracownicy') {
    echo '<!DOCTYPE html><html lang="pl">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$page_title.'</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>';
}

function make_footer() {
    echo "</body></html>";
}

function make_navbar($show_back_button = true, $title = 'Aplikacja do obsługi pracowników firmy') {
    $back_element = $show_back_button ? '<h2><a href="index.php">Wróć do menu</a></h2>' : '';
    echo '<header><h1>'.$title.'</h1>'.$back_element.'</header>';
}

function make_tag($tag) {
    echo "<$tag>";
}

function make_multiple_tags($tag, $elements) {
    foreach($elements as $elem) {
        make_tag($tag);
        echo $elem;
        make_tag("/$tag");
    }
}

function make_table_header($headers = []) {
    make_tag('tr');
    make_multiple_tags('th', $headers);
    make_tag('/tr');
}

function make_table_row_worker($imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data) {
    make_tag('tr');
    make_multiple_tags('td', [$imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data]);
    make_tag('/tr');
}
