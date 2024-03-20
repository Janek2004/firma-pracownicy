<!DOCTYPE html>
<html lang="pl">

<?php
include_once ('head.php');
?>

<body>
    <?php
    include_once ('header.php');
    ?>
    <div class='row jcc'>
        <form method="post">
            <div class="col">
                <h3>Wybierz opcję</h3>
                <div>
                    <select name="action">
                        <option value="select_worker" selected disabled>Wybierz...</option>
                        <option value="add_worker">Dodaj pracowników</option>
                        <option value="select_worker">Wyświetl pracowników</option>
                        <option value="edit_worker">Edytuj pracowników</option>
                        <option value="delete_worker">Usuń pracowników</option>
                    </select>
                </div>
                <div class='d-flex mt-2 jcc'>
                    <input type="submit" value="Wykonaj" name="action_took" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>