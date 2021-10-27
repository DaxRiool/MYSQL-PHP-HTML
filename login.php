<!DOCTYPE html>
<head>

</head>

<body>


<?php
    $host = '127.0.0.1:3306';
    $db   = 'netland';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $PDO = new PDO($dsn, $user, $pass);
?>


</body>

<?php
$query = "
SELECT username, wachtwoord
FROM gebruikers";

$resultaat = $PDO->query($query);
$resultaat = $resultaat->fetchAll();
?>

<form action="" method="POST">
    <p>Gebruikersnaam</p>
    <input type="text" name="naam">
    <p>wachtwoord</p>
    <input type="password" name="wachtwoord">
    <br>
    <input type="submit">
</form>

<?php


if (isset($_POST["naam"])) {
    $gebruiker = $_POST["naam"];
    $wachtwoord = $_POST["wachtwoord"];

    if ($gebruiker == $resultaat["username"] and $wachtwoord == $resultaat["wachtwoord"]) {
        header("Location: index.php");
    } else {
        echo "verkeerde gebruikersnaam of wachtwoord";
    }
}


?>

</html>