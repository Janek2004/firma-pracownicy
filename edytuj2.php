<?php

require_once('functions.php');

make_header('Firma - Edycja pracownika');

$worker_id = isset($_POST['id']) ? $_POST['id'] : 'Brak';
make_navbar(true, "Edytujesz pracownika o ID: $worker_id");

?>

<main class='d-flex justify-center'>
<?php
display_all_workers("SELECT * FROM ludziki where Numer = $worker_id;", true);
?>
</main>

<?php

make_footer();

?>