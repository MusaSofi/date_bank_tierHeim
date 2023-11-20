<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$tierID = "";
$name = "";
$impfung = "";
$personalID = "";
$abholDatum = "";
$tierAlter = "";
$hundIndex = "";
$gewicht = "";
$bild = "";


if (isset($_POST['tierID'])) {
    $tierID = $_POST['tierID'];
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['impfung'])) {
    $impfung = $_POST['impfung'];
}
if (isset($_POST['personalID'])) {
    $personalID = $_POST['personalID'];
}

if (isset($_POST['abholdatum'])) {
    $abholDatum = $_POST['abholdatum'];
}
if (isset($_POST['tieralter'])) {
    $tierAlter = $_POST['tieralter'];
}
if (isset($_POST['hundindex'])) {
    $hundIndex = $_POST['hundindex'];
}
if (isset($_POST['gewicht'])) {
    $gewicht = $_POST['gewicht'];
}
if (isset($_FILES['bild_upload']))
{
    $bild = file_get_contents($_FILES['bild_upload']['tmp_name']);
}


$database->insertIntoDogs($tierID, $name,$impfung,$personalID,$abholDatum,$tierAlter,$hundIndex,$gewicht,$bild);

?>

<html>

<body>
    <h1> Hund ist hinzugefügt </h1>
    <a href="hund.php"> Go back to Hunde </a>
</body>

</html>