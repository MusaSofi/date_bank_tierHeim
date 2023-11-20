<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$tierID = "";
$name = "";
$impfung = "";
$personalID = "";
$abholDatum = "";
$tierAlter = "";
$hauskatze = "";






if (isset($_GET['tierID'])) {
    $tierID = $_GET['tierID'];
}

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

if (isset($_GET['impfung'])) {
    $impfung = $_GET['impfung'];
}
if (isset($_GET['personalID'])) {
    $personalID = $_GET['personalID'];
}

if (isset($_GET['abholdatum'])) {
    $abholDatum = $_GET['abholdatum'];
}
if (isset($_GET['tieralter'])) {
    $tierAlter = $_GET['tieralter'];
}

if (isset($_GET['hauskatze'])) {
    $hauskatze = $_GET['hauskatze'];
}



$database->updateKatze($tierID, $name,$impfung,$personalID,$abholDatum,$tierAlter,$hauskatze)

?>

<html>

<body>
    <h1> Katze ist geändert </h1>
    <a href="cat.php"> Go back to Katze </a>
</body>

</html>