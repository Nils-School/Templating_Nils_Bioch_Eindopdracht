
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "characters";
        $conn;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
        }
        $result;
        $stmt = $conn->prepare("SELECT * FROM characters");
            $stmt->execute();
            $result = $stmt->fetchAll();
        //connectie ?>
        <h1>Alle <?php echo count($result)?> characters uit de database</h1> 
    </header>
<div id='container'>
<?php
function createNewCharacter($id, $name, $avatar, $health, $damage, $defense)
{
    echo "<a class='item' href='character.php?id=$id'>
        <div class='left'>
            <img class='avatar' src='resources/images/$avatar'>
        </div>
        <div class='right'>
            <h2>$name</h2>
            <div class='stats'>
                <ul class='fa-ul'>
                    <li><span class='fa-li'><i class='fas fa-heart'></i></span> $health</li>
                    <li><span class='fa-li'><i class='fas fa-fist-raised'></i></span> $damage</li>
                    <li><span class='fa-li'><i class='fas fa-shield-alt'></i></span> $defense</li>
                </ul>
            </div>
        </div>
        <div class='detailButton'><i class='fas fa-search'></i> bekijk</div>
    </a>";
}
    for ($i=0; $i < count($result); $i++) { 
        $data = $result[$i];
        createNewCharacter($i,$data["name"],$data["avatar"],$data["health"],$data["attack"],$data["defense"]);
    }
?>
</div>
<footer>&copy; Nils Bioch 2020</footer>
</body>
</html>