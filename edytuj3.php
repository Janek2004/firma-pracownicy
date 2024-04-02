<?php

require_once ('functions.php');

make_header('Firma - Edycja pracownika');

$worker_id = isset($_POST['id']) ? $_POST['id'] : 'Brak';
make_navbar(true, "Zapisano pracownika o ID: $worker_id");

?>

<main class='d-flex justify-center'>
    <?php
    if (isset($_POST['id']) && isset($_POST['save_changes'])) {
        connect();
        edit_worker($_POST['id'], $_POST['Imie'], $_POST['Nazwisko'], $_POST['Wiek'], $_POST['Staz'], $_POST['Stanowisko'], $_POST['Wydzial'], $_POST['Pensja']);
        display_all_workers("SELECT * FROM ludziki where Numer = $worker_id;");
    }
    ?>
</main>

<?php

make_footer();

?>