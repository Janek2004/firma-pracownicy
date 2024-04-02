<?php

require_once ('functions.php');

make_header('Firma - Edytuj pracownika');
make_navbar(true, 'Edytuj pracownika');

?>

<div class='wrapper'>
    <section>
        <h3>Wybrałeś opcję Edytuj pracownika</h3>
        <form method='post' action="edytuj2.php">
            <p>Wybierz ID pracownika do edycji</p>
            <input type='number' name="id" />
            <p class='mt-2'>
                <input type="submit" value="Przejdź do edycji" />
            </p>
        </form>
    </section>
</div>
<main class='mt-2 d-flex justify-center'>

    <?php
        display_all_workers();
    ?>

</main>

<?php
make_footer();
?>