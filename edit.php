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
    ?>
<!DOCTYPE html>

<head>

</head>

<body>
<h1>Vul in wat je weet</h1>
    <form method="POST">
    <p>Title</p>
    <input type="text" name="title" value="<?php echo $query["title"]?>">
    <p>Rating</p>
    <input type="text" name="rating" value="<?php echo $query["rating"]?>">
    <p>Description</p>
    <input type="text" name="description" value="<?php echo $query["description"]?>">
    <p>Country</p>
    <input type="text" name="country" value="<?php echo $query["country"]?>">
    <p>language</p>
    <input type="text" name="language" value="<?php echo $query["language"]?>">
    <p>seasons</p>
    <input type="text" name="seasons" value="<?php echo $query["seasons"]?>">
    <p>Has won awards</p>
    <input type="text" name="awards" value="<?php echo $query["has_won_awards"]?>">
    <p>length</p>
    <input type="text" name="length" value="<?php echo $query["length"]?>">
    <p>youtube link</p>
    <input type="text" name="link" value="<?php echo $query["id_of_trailer"]?>">
    <p>Date of release</p>
    <input type="text" name="date" value="<?php echo $query["date_of_release"]?>">
    <p>Type of media (kan alleen film of serie en moet worden ingevuld)</p>
    <input type="text" name="type" value="<?php echo $query["type_media"]?>">
    <br>
    <br>
    <input type="submit" value="EDIT">
    
    </form>
    
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
        UPDATE 
            media
        SET 
            title = \"$title\",
            country = \"$country\",
            rating = $rating,
            description = \"$description\",
            language = \"$language\",
            seasons = $seasons,
            has_won_awards = $awards,
            type_media = \"$type\"
        WHERE
            id = $id";
        } else {
            $sql = "
            UPDATE
                media
            SET
                title = \"$title\",
                country = \"$country\",
                length = \"$length\",
                date_of_release = \"$date\",
                id_of_trailer = \"$link\"
            WHERE
                id = $id";
        }


        var_dump($sql);

        $count = $PDO->prepare($sql)->execute([]);

        echo "Updated:" . $count;

        header("Location: index.php");
    }
    ?>
</body>
</html>