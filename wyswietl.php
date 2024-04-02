<?php
// według
/*
powrot do menu
wyświetl według select:
numer / alfabetycznie, wiek, staż


podaj wydział: dowolny, dyrekcja, dział it, biuro, produkcja, zaoptarzenie, finanse, kadry, inne
pokaze pensje

BUTTONY: FILTRUJ DANE, WSZYSCY PRACOWNICY

*/

require_once ('functions.php');

make_header('Firma - Wyświetlanie pracowników');
make_navbar(true, 'Wszyscy pracownicy');

?>

<div class='wrapper'>
    <section>
        <h3>Wybrałeś opcję Wyświetl pracowników</h3>
        <form method='post' action="wyswietl.php">
            <p>Wyświetl według</p>
            <select name="wedlug">
                <option value='Numer'>Numer</option>
                <option value='Nazwisko'>Alfabetycznie</option>
                <option value='Wiek'>Wiek</option>
                <option value='Staz'>Staż</option>
                <option value='Data_dodania'>Najświeższy</option>
                <option value='Data_dodania DESC'>Najstarszy</option>
            </select>
            <p>Podaj wydział</p>
            <select name="wydzial">
                <option value="">Dowolny</option>
                <option value="dyrekcja">Dyrekcja</option>
                <option value="Dział IT">Dział IT</option>
                <option value="Biuro">Biuro</option>
                <option value="Produkcja">Produkcja</option>
                <option value="Zaopatrzenie">Zaopatrzenie</option>
                <option value="Finanse">Finanse</option>
                <option value="Kadry">Kadry</option>
                <option value="Inny">Innu</option>
            </select>
            <p>Podaj min. pensję</p>
            <input type="number" name="pensja" value="<?= isset($_POST['pensja']) ? $_POST['pensja'] : 0 ?>" />

            <p class='mt-2'>
                <input type="submit" value="FILTRUJ DANE" name="filtruj" />
                <button onclick="() => location.refresh()">WSZYSCY PRACOWNICY</button>
            </p>
        </form>
    </section>
</div>

<main class='mt-2 d-flex justify-center'>

    <?php

    if (isset($_POST['filtruj'])) {
        $wedlug = $_POST['wedlug'];
        $wydzial = $_POST['wydzial'];
        $pensja = $_POST['pensja'] ? $_POST['pensja'] : 0;
        display_all_workers("SELECT * FROM ludziki WHERE wydzial LIKE '%$wydzial' AND pensja > $pensja ORDER BY '$wedlug';");

    } else {
        display_all_workers();
    }
    ?>

</main>

<aside class='mt-2 justify-center'>

    <?php
    $avg_stats = query('SELECT avg(Pensja), avg(Wiek), avg(Staz) FROM ludziki;')->fetch_array();
    $avg_pensja = $avg_stats[0];
    $avg_wiek = $avg_stats[1];
    $avg_staz = $avg_stats[2];
    echo_info("Średnia pensja: " . round($avg_pensja, 2) . " zł, Średni wiek: " . round($avg_wiek, 2) . " lat(a), Średni staż: " . round($avg_staz, 2) . ' lat(a)');

    echo_info('Pracownik z najwyższą pensją:', '#7f7');
    ?>

</aside>

<arcticle class="wrapper">
    <?php
    display_all_workers("SELECT * FROM ludziki ORDER BY pensja DESC LIMIT 1;");
    ?>
</arcticle>

<?php

    make_footer();

?>