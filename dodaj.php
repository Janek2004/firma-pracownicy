<!DOCTYPE html>
<html lang="pl">

<?php
include_once ('head.php');
?>

<body>
    <header>
        <h2>Dodawanie pracownika</h2>
        <h3>
            <a href="index.php">Powrót do menu</a>
        </h3>
    </header>
    <section class="">
        <?php
        if (isset ($_POST['dodaj'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $wiek = $_POST['wiek'];
            $staz = $_POST['staz'];
            $stanowisko = $_POST['stanowisko'];
            $wydzial = $_POST['wydzial'];
            $pensja = $_POST['pensja'];
            $data = date("Y-m-d");
            if (empty ($imie) || empty ($nazwisko) || empty ($wiek) || empty ($stanowisko) || empty ($wydzial))
                echo "<h3 style='color:#ff7f6b'>Nie podałeś wszystkich danych</h3>";
            else {
                include ('funkcje.php');
                if (polacz()) {
                    echo "<h3>Udało się połączyć z bazą</h3>";
                    $zapyt = "insert into pracownicy values(null,'$imie','$nazwisko',$wiek,$staz,'$stanowisko','$wydzial',$pensja,'$data');";
                    $wynik = mysqli_query($polaczenie, $zapyt);
                    if ($wynik)
                        echo "<h3>Pracownik $imie $nazwisko został dodany na stanowisko $stanowisko w dziale $wydzial. Data dodania: $data</h3>";
                    else
                        echo "<h3 style='color:red'>Błąd w dodawaniu pracownika</h3>";

                } else
                    echo "<h3 style='color:red'>Błąd połączenia z bazą</h3>";
            }
        }
        ?>

    </section>
    <section>
        <form action="" method="post">
            <h3>Podaj dane nowego pracownika</h3>
            <p> Podaj imie pracownika:</p>
            <input type="text" name="imie" value="<?= isset ($_POST['imie']) ? $_POST['imie'] : '' ?>" />
            <p> Podaj nazwisko pracownika:</p>
            <input type="text" name="nazwisko" value="<?= isset ($_POST['nazwisko']) ? $_POST['nazwisko'] : ''; ?>" />
            <p> Podaj wiek pracownika:</p>
            <input type="number" name="wiek" />
            <p> Podaj staż pracownika:</p>
            <input type="number" name="staz" />
            <p> Podaj stanownisko pracownika:</p>
            <input type="text" name="stanowisko" />
            <p>Podaj wydzial przypisany do pracownika:</p>
            <select name="wydzial" class="lista">
                <option value="dyrekcja">Dyrekcja</option>
                <option value="Dział IT">Dział IT</option>
                <option value="Biuro">Biuro</option>
                <option value="Produkcja">Produkcja</option>
                <option value="Zaopatrzenie">Zaopatrzenie</option>
                <option value="Finanse">Finanse</option>
                <option value="Kadry">Kadry</option>
                <option value="Inny">Inny</option>
            </select>
            <p>Podaj pensje pracownika:</p>
            <input type="number" name="pensja">
            <p class='mt-2'><input class="mt-2" type="submit" name="dodaj" value="Dodaj nowego pracownika" /></p>
    </section>
</body>

</html>