
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
    if (empty ($imie) || empty ($nazwisko) || empty ($wiek) || empty ($stanowisko) || empty ($wydzial))
        echo "<h3 style='color:#f55'>Nie podałeś wszystkich danych!</h3>";
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
            <input type="number" name="wiek" />
            <p> Podaj staż pracownika:</p>
            <input type="number" name="staz" />
            <p> Podaj stanownisko pracownika:</p>
            <input type="text" name="stanowisko" />
            <p>Podaj wydzial przypisany do pracownika:</p>
            <select name="wydzial">
                <option value="dyrekcja">Dyrekcja</option>
                <option value="Dział IT">Dział IT</option>
                <option value="Biuro">Biuro</option>
                <option value="Produkcja">Produkcja</option>
                <option value="Zaopatrzenie">Zaopatrzenie</option>
                <option value="Finanse">Finanse</option>
                <option value="Kadry">Kadry</option>
                <option value="Inny">Inny</option>
            </select>
            <p>Podaj pensje pracownika:</p>
            <input type="number" name="pensja">
            <p class='mt-2'>
                <input class="mt-2" type="submit" name="action_add_worker" value="Dodaj nowego pracownika" />
            </p>
    </section>

    <?php 
    make_footer();
    ?>