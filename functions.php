<?php

function connect()
{
    global $conn;
    try {
        $conn = new mysqli('localhost', 'root', '', 'project');
    } catch (Exception $err) {
        echo_error($err);
        if (str_contains($err, 'Unknown database')) {
            echo_error('Musisz utworzyć bazę danych "project" oraz zaimportować plik pracownicy.sql!');
        }
    }
    return $conn;
}

function disconnect()
{
    global $conn;
    if ($conn) {
        $conn->close();
    }
}

function query($query)
{
    global $conn;
    return $conn->query($query);
}

function add_worker($imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data)
{
    $query = "insert into ludziki values(null,'$imie','$nazwisko',$wiek,$staz,'$stanowisko','$wydzial',$pensja,'$data');";
    $result = query($query);
    if ($result) {
        echo_info("Pracownik $imie $nazwisko został dodany na stanowisko $stanowisko w dziale $wydzial. Data dodania: $data");
    } else
        echo_error('Błąd podczas dodawania pracownika!');
}

function display_all_workers($replace_query = '', $edit_mode = false)
{

    make_tag('table');
    make_table_header(['Numer', 'Imię', 'Nazwisko', 'Wiek', 'Staż', 'Stanowisko', 'Wydział', 'Pensja', 'Data dodania']);

    connect();
    if ($replace_query) {
        $res = query($replace_query);
    } else {
        $res = query('SELECT * FROM ludziki;');
    }

    while ($worker = $res->fetch_array()) {
        make_table_row_worker($worker['Numer'], $worker['Imie'], $worker['Nazwisko'], $worker['Wiek'], $worker['Staz'], $worker['Stanowisko'], $worker['Wydzial'], $worker['Pensja'], $worker['Data_dodania'], $edit_mode);
    }

    make_tag('/table');

}

// GENERATING HTML ELEMENTS

function make_header($page_title = 'Firma - Pracownicy')
{
    echo '<!DOCTYPE html><html lang="pl">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $page_title . '</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>';
}

function make_footer()
{
    echo "</body></html>";
}

function make_navbar($show_back_button = true, $title = 'Aplikacja do obsługi pracowników firmy')
{
    $back_element = $show_back_button ? '<h2><a href="index.php">Wróć do menu</a></h2>' : '';
    echo '<header><h1>' . $title . '</h1>' . $back_element . '</header>';
}

function make_tag($tag)
{
    echo "<$tag>";
}

function make_multiple_tags($tag, $elements)
{
    foreach ($elements as $elem) {
        make_tag($tag);
        echo $elem;
        make_tag("/$tag");
    }
}

function make_table_header($headers = [])
{
    make_tag('tr');
    make_multiple_tags('th', $headers);
    make_tag('/tr');
}

function make_table_row_worker($numer, $imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data, $edit_mode = false)
{
    make_tag('tr');
    if (!$edit_mode) {
        make_multiple_tags('td', [$numer, $imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data]);
    } else {
        $wydzial_html = "<select name='wydzial'>";
        
        $opts = ['Dyrekcja', 'Dział IT', 'Biuro', 'Produkcja', 'Zaopatrzenie', 'Finanse', 'Kadry', 'Inny'];
            </select>";
        make_multiple_tags('td', [$numer,
        "<input name='imie' value='$imie' />",
        "<input name='nazwisko' value='$nazwisko' />",
        "<input name='wiek' type='number' value='$wiek' />",
        "<input name='staz' type='number' type='number' value='$staz' />",
        "<input name='stanowisko' value='$stanowisko' />",
        $wydzial_html,
        "<input name='pensja' type='number' value='$pensja' />",
        $data,
    ]);
    }
    make_tag('/tr');
}

function echo_info($info)
{
    echo "<h3 style='color:#77f'>$info</h3>";
}

function echo_error($err)
{
    echo "<h3 style='color:#f55'>$err</h3>";
}