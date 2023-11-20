<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$name = "";
$lizenzNummer = "";
$spezialisierung = "";
$handyNummer = "";

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

if (isset($_GET['lizenzenummber'])) {
    $lizenzNummer = $_GET['lizenzenummber'];
}

if (isset($_GET['spezialisierung'])) {
    $spezialisierung = $_GET['spezialisierung'];
}

if (isset($_GET['handynummer'])) {
    $handyNummer = $_GET['handynummer'];
}

$database->insertIntoDoctor($name, $lizenzNummer, $spezialisierung, $handyNummer);

?>

<html>

<body>
    <h1> Arzt ist hinzugefügt </h1>
    <a href="doctors.php"> Go back to Doctors </a>
</body>

</html>