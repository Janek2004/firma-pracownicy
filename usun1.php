<?php

require_once ('functions.php');

make_header('Firma - Usuń pracownika');
make_navbar(true, 'Usuń pracownika');

?>

<div class='wrapper'>
    <section>
        <h3>Wybrałeś opcję Usuń pracownika</h3>
        <form method='post' action="usun2.php">
            <p>Wybierz ID pracownika do usunięcia</p>
            <input type='number' name="id" />
            <p class='mt-2'>
                <input type="submit" value="Usuń pracownika" />
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