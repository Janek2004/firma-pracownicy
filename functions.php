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
    $query = "INSERT INTO ludziki values(null,'$imie','$nazwisko',$wiek,$staz,'$stanowisko','$wydzial',$pensja,'$data');";
    $result = query($query);
    if ($result) {
        echo_info("Pracownik $imie $nazwisko został dodany na stanowisko $stanowisko w dziale $wydzial. Data dodania: $data");
    } else
        echo_error('Błąd podczas dodawania pracownika!');
}

function edit_worker($numer, $imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja)
{
    $query = "UPDATE ludziki SET Imie='$imie', Nazwisko='$nazwisko', Wiek=$wiek, Staz=$staz, Stanowisko='$stanowisko', Wydzial='$wydzial', Pensja=$pensja WHERE Numer = $numer;";
    $result = query($query);
    if (!$result) {
        echo_error('Błąd podczas zapisywania pracownika!');
    }
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
    disconnect();
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

        $wydzial_html = "<select name='Wydzial'>";
        $opts = ['Dyrekcja', 'Dział IT', 'Biuro', 'Produkcja', 'Zaopatrzenie', 'Finanse', 'Kadry', 'Inny'];
        for ($i = 0; $i < count($opts); $i++) {
            $opt = $opts[$i];
            if($opt == $wydzial) {
                $wydzial_html .= "<option value='$opts[$i]' selected='selected'>$opts[$i]</option>";
            } else {
                $wydzial_html .= "<option value='$opts[$i]'>$opts[$i]</option>";
            }
        }
        $wydzial_html .= '</select>';

        make_multiple_tags('td', [$numer,
        "<input name='Imie' minlength='2' required value='$imie' />",
        "<input name='Nazwisko' minlength='2' required value='$nazwisko' />",
        "<input name='Wiek' type='number' value='$wiek' />",
        "<input name='Staz' type='number' type='number' value='$staz' />",
        "<input name='Stanowisko' value='$stanowisko' />",
        $wydzial_html,
        "<input name='Pensja' type='number' value='$pensja' />",
        $data,
    ]);
    }
    make_tag('/tr');
}

function echo_info($info, $color = '#77f')
{
    echo "<h3 style='color:$color'>$info</h3>";
}

function echo_error($err)
{
    echo "<h3 style='color:#f55'>$err</h3>";
}