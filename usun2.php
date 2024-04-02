<?php

require_once ('functions.php');

make_header('Firma - Potwierdź usunięcie pracownika');

$worker_id = isset($_POST['id']) ? $_POST['id'] : 'Brak';
make_navbar(true, "Usuwanie pracownika o ID: $worker_id");

?>

<div class='wrapper <?= (isset($_POST['delete_pernamently']) || isset($_POST['cancel'])) ? 'hidden' : '' ?>'>
    <section>
        <form method='post'>
            <input type="hidden" value="<?= $worker_id ?>" name="id" />
            <p>Czy na pewno chcesz usunąć tego pracownika?</p>
            <p class='mt-2'>
                <input type="submit" value="TAK" name="delete_pernamently" />
                <input type="submit" value="NIE" name="cancel" />
            </p>
        </form>
        </form>
    </section>
</div>

<main class='d-flex mt-2 col'>

    <?php
    connect();

    if(isset($_POST['cancel'])) {
        $res = query("SELECT * FROM ludziki where Numer=$worker_id;")->fetch_array();
        echo_info("Zrezygnowałeś z usunięcia pracownika $res[Imie] $res[Nazwisko]");
    }
    else if (isset($_POST['delete_pernamently'])) {
        query("DELETE FROM ludziki WHERE Numer=$worker_id");
        echo_info("Pracownik o numerze $worker_id został usunięty!");
        echo "<div class='d-flex justify-center'>";
        display_all_workers();
        echo "</div>";
    }
    else {
        display_all_workers("SELECT * FROM ludziki where Numer=$worker_id;");
    }

    ?>
</main>

<?php

make_footer();

?>