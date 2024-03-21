<?php

require_once('functions.php');

make_header('Firma - Edytuj pracownika');
make_navbar(true, 'Edytuj pracownika');

?>

<div class='wrapper'>
    <section>
        <h3>Wybrałeś opcję Edytuj pracownika</h3>
        <form method='post'>
            <p>Wybierz ID pracownika do edycji</p>
            <input type='number' />
            <p class='mt-2'>
                <input type="submit" value="Przejdź do edycji" />
            </p>
        </form>
    </section>
</div>
<main class='mt-2'>
    <?php
    make_tag('table');
    make_table_header(['Imię', 'Nazwisko', 'Wiek', 'Staż', 'Stanowisko', 'Wydział', 'Pensja', 'Data dodania']);
    make_table_row_worker('Janusz', 'Zakolski', 19, 4, 'Programista', 'KDS', '23.000 zł', '2024-03-21');
    make_tag('/table');
    ?>
</main>

<?php
    disconnect();
    make_footer();
?>