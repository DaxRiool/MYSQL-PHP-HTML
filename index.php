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



$queryserieseen = $PDO->query("
SELECT
title, rating, id, description, has_won_awards, seasons, country, language
FROM
media
WHERE
type_media = \"serie\"
");


$queryorderseriesrating = $PDO->query("
SELECT
title, rating, id
FROM
media
WHERE
type_media = \"serie\"
ORDER BY rating DESC
");

$queryorderseriestitle = $PDO->query("
SELECT
title, rating, id
FROM
media
WHERE
type_media = \"serie\"
ORDER BY title
");

$queryfilmseen = $PDO->query("
SELECT
title, id, length, date_of_release, country, Description, id_of_trailer
FROM
media
WHERE
type_media = \"film\"
");

$queryorderfilmslength = $PDO->query("
SELECT
title, length, id
FROM
media
WHERE
type_media = \"film\"
ORDER BY length DESC
");

$queryorderfilmstitle = $PDO->query("
SELECT
title, length, id
FROM
media
WHERE
type_media = \"film\"
ORDER BY title
");








if (empty($_GET["serie_order"])) {
     $queryserieseen = $queryserieseen->fetchAll();
} elseif ($_GET["serie_order"] == "rating") {
    $queryserieseen = $queryorderseriesrating->fetchAll();
} elseif ($_GET["serie_order"] == "title") {
    $queryserieseen = $queryorderseriestitle->fetchAll();
}

if (empty($_GET["films_order"])) {
    $queryfilmseenresultaat = $queryfilmseen->fetchAll();
} elseif ($_GET["films_order"] == "title") {
    $queryfilmseenresultaat = $queryorderfilmstitle->fetchAll();
} elseif ($_GET["films_order"] == "length") {
    $queryfilmseenresultaat = $queryorderfilmslength->fetchAll();
}


if (empty($_GET["serie_order"])) {
    $linkseries = "dit is leeg serie test";
} elseif ($_GET["serie_order"] == "title") {
    $linkseries = "index.php?serie_order=title";
} elseif ($_GET["serie_order"] == "rating") {
    $linkseries = "index.php?serie_order=rating";
}




if (empty($_GET["films_order"])) {
    $linkfilms = "dit is leeg films test";
} elseif ($_GET["films_order"] == "title") {
    $linkfilms = "index.php?films_order=title";
} elseif ($_GET["films_order"] == "length") {
    $linkfilms = "index.php?films_order=length";
}


?>
<h1>Series</h1>
<a href="insert.php">Create new</a>
<table>
    <thead>
        <tr>
            <th>
                <a href=<?php 
                $filmsOrder = "";
                if (!empty($_GET["films_order"])) {
                    $filmsOrder = "&films_order=" . $_GET["films_order"];
                }
                $linkseriestitle = "index.php?serie_order=title" . $filmsOrder ;
                echo $linkseriestitle
                ?>>title</a>
            </th>
            <th>
                <a href=<?php 
                $filmsOrder = "";
                if (!empty($_GET["films_order"])) {
                    $filmsOrder = "&films_order=" . $_GET["films_order"];
                }
                $linkseriesrating = "index.php?serie_order=rating" . $filmsOrder;
                echo $linkseriesrating
                ?>>rating</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($queryserieseen as $serie) {
            ?>
            <tr>
                <td>
                    <?php
                    echo($serie["title"]);
                    ?>
                </td>
                <td>
                    <?php
                    echo($serie["rating"]);
                    ?>
                </td>
                <td>
                    <a href="details.php?id=<?php
                    echo $serie["id"];
                    ?>">details</a>
                    <a href="edit.php?id=<?php
                    echo $serie["id"];
                    ?>">wijzig</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<h1>films</h1>
<table>
    <thead>
        <tr>
            <th>
                <a href=<?php 
                $seriesOrder = "";
                if (!empty($_GET["serie_order"])) {
                    $seriesOrder = "&serie_order=" . $_GET["serie_order"];
                }
                $linkfilmstitle = "index.php?films_order=title" . $seriesOrder;
                echo $linkfilmstitle;
                ?>>title</a>
            </th>
            <th>
                <a href=<?php 
                $seriesOrder = "";
                if (!empty($_GET["serie_order"])) {
                    $seriesOrder = "&serie_order=" . $_GET["serie_order"];
                }
                $linkfilmslength = "index.php?films_order=length" . $seriesOrder;
                echo $linkfilmslength;
                ?>>length</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($queryfilmseenresultaat as $film) {
            ?>
            <tr>
                <td>
                    <?php
                    print_r($film["title"]);
                    ?>
                </td>
                <td>
                    <?php
                    print_r($film["length"]);
                    ?>
                </td>
                <td>
                    <a href="details.php?id=<?php
                    echo $film["id"];
                    ?>">details</a>
                    <a href="edit.php?id=<?php
                    echo $film["id"];
                    ?>">wijzig</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<a href="login.php">Logout</a>


</body>
