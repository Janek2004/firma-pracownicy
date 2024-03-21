<?php

require_once('functions.php');

make_header('Firma - Edytuj pracownika');
make_navbar(true, 'Edytuj pracownika');

make_tag('table');
make_table_header(['Imię', 'Nazwisko', 'Wiek', 'Staż', 'Stanowisko', 'Wydział', 'Pensja', 'Data dodania']);
make_table_row_worker('Janusz', 'Zakolski', 19, 4, 'Programista', 'KDS', '23.000 zł', '2024-03-21');
make_tag('/table');

?>

<main>

</main>

<?php
    disconnect();
    make_footer();
?>