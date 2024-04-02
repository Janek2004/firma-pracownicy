
<?php
require_once('functions.php');
make_header('Firma - Dodaj pracownika');
make_navbar(true, 'Dodawanie pracownika');

if (isset ($_POST['action_add_worker'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];
    $staz = $_POST['staz'];
    $stanowisko = $_POST['stanowisko'];
    $wydzial = $_POST['wydzial'];
    $pensja = $_POST['pensja'];
    $data = date("Y-m-d");

    if($wiek < 15 || $wiek > 80) {
        echo_error("Wiek powinien być z zakresu 15->80!");
    }
    else if($wiek - $staz < 15) {
        echo_error("Staż za duży jak na taki wiek!");
    }
    else if(strlen($imie) < 2 || strlen($nazwisko) < 2) {
        echo_error("Imię i nazwisko minimum 2 literowe!");
    }
    else if($pensja < 3261) {
        echo_error("Pensja jest poniżej minimalnej krajowej! (Min. 3.261 zł)");
    }
    else if($pensja > 30000) {
        echo_error("Za duża pensja jak na nowego pracownika! (Max. 30.000 zł)");
    }
    else if (empty ($imie) || empty ($nazwisko) || empty ($wiek) || empty ($stanowisko) || empty ($wydzial))
        echo_error("Nie podałeś wszystkich danych!");
    else {
        if (connect()) {
            add_worker($imie, $nazwisko, $wiek, $staz, $stanowisko, $wydzial, $pensja, $data);
        }
    }
}
    ?>

    <section>
        <form action="" method="post">
            <h3>Podaj dane nowego pracownika</h3>
            <p> Podaj imie pracownika:</p>
            <input type="text" name="imie" value="<?= isset ($_POST['imie']) ? $_POST['imie'] : '' ?>" />
            <p> Podaj nazwisko pracownika:</p>
            <input type="text" name="nazwisko" value="<?= isset ($_POST['nazwisko']) ? $_POST['nazwisko'] : ''; ?>" />
            <p> Podaj wiek pracownika:</p>
            <input type="number" name="wiek" value="<?= isset ($_POST['wiek']) ? $_POST['wiek'] : ''; ?>" />
            <p> Podaj staż pracownika:</p>
            <input type="number" name="staz" value="<?= isset ($_POST['staz']) ? $_POST['staz'] : ''; ?>" />
            <p> Podaj stanownisko pracownika:</p>
            <input type="text" name="stanowisko" value="<?= isset ($_POST['stanowisko']) ? $_POST['stanowisko'] : ''; ?>" />
            <p>Podaj wydzial przypisany do pracownika:</p>
            <select name="wydzial" value="<?= isset ($_POST['wydzial']) ? $_POST['wydzial'] : ''; ?>">
                <option value="Dyrekcja">Dyrekcja</option>
                <option value="Dział IT">Dział IT</option>
                <option value="Biuro">Biuro</option>
                <option value="Produkcja">Produkcja</option>
                <option value="Zaopatrzenie">Zaopatrzenie</option>
                <option value="Finanse">Finanse</option>
                <option value="Kadry">Kadry</option>
                <option value="Inny">Inny</option>
            </select>
            <p>Podaj pensje pracownika:</p>
            <input type="number" name="pensja" value="<?= isset ($_POST['pensja']) ? $_POST['pensja'] : ''; ?>">
            <p class='mt-2'>
                <input class="mt-2" type="submit" name="action_add_worker" value="Dodaj nowego pracownika" />
            </p>
    </section>

    <?php 
    make_footer();
    ?>