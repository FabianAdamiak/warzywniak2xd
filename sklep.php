<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="banerLewy"><h1>Internetowy sklep z eko-warzywami</h1></div>
    <div class="banerPrawy">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl" target="_blank">soki</a></li>
        </ol>
    </div>
    <div class="glowny">
        <?php
        $con = new mysqli("localhost", "root", "", "dane2");

        if(isset($_POST["nazwa"]) && isset($_POST["cena"]) && !empty($_POST["nazwa"]) && !empty($_POST["cena"])){
            $sql = "INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL, '1', '4', '".$_POST["nazwa"]."', '10', NULL, '".$_POST["cena"]."', 'owoce.jpg');";
            $con->query($sql);
        }

        $sql = "SELECT `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie` FROM `produkty` WHERE `Rodzaje_id` = 1 OR `Rodzaje_id` = 2;";
        $res = $con->query($sql);
        while($row = $res->fetch_assoc()){
            echo "<div class='produkt'>";
            echo "<img src='".$row["zdjecie"]."' alt='warzywniak'>";
            echo "<h5>".$row["nazwa"]."</h5>";
            echo "<p>opis: ".$row["opis"]."</p>";
            echo "<p>na stanie: ".$row["ilosc"]."</p>";
            echo "<h2>".$row["cena"]." zł</h2>";
            echo "</div>";
        }

        ?>
    </div>
    <div class="stopka">
        <form method="POST">
            <label>Nazwa: </label>
            <input type="text" name="nazwa">
            <label>Cena: </label>
            <input type="text" name="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        <span>Stronę wykonał: Fabian Adamiak</span>
    </div>
</body>
</html>