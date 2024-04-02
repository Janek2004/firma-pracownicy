<?php

require_once('functions.php');

make_header('Firma - Edycja pracownika');

$worker_id = isset($_POST['id']) ? $_POST['id'] : 'Brak';
make_navbar(true, "Edytujesz pracownika o ID: $worker_id");

?>

<main class='d-flex justify-center'>
    <form action="edytuj3.php" method='post'>

    <?php
        echo "<input type='hidden' value='$worker_id' name='id' />";
        display_all_workers("SELECT * FROM ludziki where Numer = $worker_id;", true);
    ?>
    <p class='mt-2 d-flex justify-center'>
        <input type="submit" value="Zapisz zmiany" name="save_changes" />
    </p>
    </form>
</main>

<?php

make_footer();

?>