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
                    <select name="action" onchange="location = this.value;">
                        <option value="" selected disabled>Wybierz...</option>
                        <option value="dodaj.php">Dodaj pracowników</option>
                        <option value="wyswietl.php">Wyświetl pracowników</option>
                        <option value="edytuj.php">Edytuj pracowników</option>
                        <option value="usun.php">Usuń pracowników</option>
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