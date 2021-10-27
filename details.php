
<?php


$host = '127.0.0.1:3306';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$PDO = new PDO($dsn, $user, $pass);


$id = $_GET["id"];
$query = $PDO->query("
SELECT
*
FROM
media
WHERE
id = $id");

$query = $query->fetch(PDO::FETCH_ASSOC);


foreach ($query as $naam_kolom => $details) {
    echo $naam_kolom . " = ";
    echo $details;
    echo "<br>";
}
?>