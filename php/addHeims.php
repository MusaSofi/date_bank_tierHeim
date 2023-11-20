<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$name = "";
$adresse = "";

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

if (isset($_GET['adresse'])) {
    $adresse = $_GET['adresse'];
}



$database->insertIntoHeims($name, $adresse);

?>

<html>

<body>
    <h1> Heim ist hinzugefügt </h1>
    <a href="heims.php"> Go back to TierHeim </a>
</body>

</html>