<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$heimID = "";
$name = "";
$adresse = "";

if (isset($_GET['heimID'])) {
    $heimID = $_GET['heimID'];
}

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

if (isset($_GET['adresse'])) {
    $adresse = $_GET['adresse'];
}



$database->updateHeims($heimID,$name, $adresse);

?>

<html>

<body>
    <h1> Heim ist geändert </h1>
    <a href="heims.php"> Go back to TierHeim </a>
</body>

</html>