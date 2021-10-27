<?php

    $host = '127.0.0.1:3306';
    $db   = 'netland';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $PDO = new PDO($dsn, $user, $pass);
?>
<!DOCTYPE html>

<head>

</head>

<body>
    <h1>Vul in wat je weet</h1>
    <form method="POST">
    <p>Title</p>
    <input type="text" name="title">
    <p>Rating</p>
    <input type="text" name="rating">
    <p>Description</p>
    <input type="text" name="description">
    <p>Country</p>
    <input type="text" name="country">
    <p>language</p>
    <input type="text" name="language">
    <p>seasons</p>
    <input type="text" name="seasons">
    <p>Has won awards</p>
    <input type="text" name="awards">
    <p>length</p>
    <input type="text" name="length">
    <p>youtube link</p>
    <input type="text" name="link">
    <p>Date of release</p>
    <input type="text" name="date">
    <p>Type of media (kan alleen film of serie)</p>
    <input type="text" name="type">
    <br>
    <br>
    <input type="submit" value="Create New">
    
    </form>

    <?php

    if (isset($_POST["title"])) {
        $title = $_POST["title"];
        $rating = $_POST["rating"];
        $description = $_POST["description"];
        $country = $_POST["country"];
        $language = $_POST["language"];
        $seasons = $_POST["seasons"];
        $awards = $_POST["awards"];
        $link = $_POST["link"];
        $date = $_POST["date"];
        $length = $_POST["length"];
        $type = $_POST["type"];
        if ($type == "serie") {
            $sql = "
            INSERT INTO media (title, rating, description, has_won_awards, seasons, country, language, type_media)
            VALUES (\"$title\", \"$rating\", \"$description\", $awards, $seasons, \"$country\", \"$language\",\"$type\") ";
        } else {
            $sql = "
            INSERT INTO media (title, length, date_of_release, country, Description, id_of_trailer, type_media)
            VALUES (\"$title\", \"$length\", \"$date\", \"$country\", \"$description\", \"$link\", \"$type\")"; 
        }
        echo $sql;
        $PDO->query($sql);

        header("Location: index.php");
    }
    
    ?>
</body>
</html>