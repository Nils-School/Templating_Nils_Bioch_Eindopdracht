<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Character - Bowser</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>
    <link href='resources/css/style.css' rel='stylesheet'/>
</head>
<body>
<?php
$id = $_GET["id"];
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
    $stmt = $conn->prepare("SELECT * FROM characters");
    $stmt->execute();
    $result = $stmt->fetchAll();
        $data = $result[$id];

        $name = $data["name"];
        $avatar = $data["avatar"];
        $health = $data["health"];
        $bio = $data["bio"];
        $color = $data["color"];
        $attack = $data["attack"];
        $defense = $data["defense"];
        $weapon = $data["weapon"]; 
        $armor = $data["armor"];
    
?>
<header>
    <h1><?php echo $name ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
</header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?php echo $avatar ?>">
            <div class="stats" style="background-color: <?php echo $color ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $health?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $attack ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $defense ?></li>
                </ul>
                <ul class="gear">
                    <li><b>Weapon</b>: <?php echo $weapon ?></li>
                    <li><b>Armor</b>: <?php echo $armor  ?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <p>
                <?php echo $bio?>
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>



<footer>&copy; Nils Bioch 2020</footer>
</body>
</html>