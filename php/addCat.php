<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$tierID = "";
$name = "";
$impfung = "";
$personalID = "";
$abholDatum = "";
$tierAlter = "";
$katzenIndex = "";
$hauskatze = "";
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
if (isset($_POST['katzenindex'])) {
    $katzenIndex = $_POST['katzenindex'];
}
if (isset($_POST['hauskatze'])) {
    $hauskatze = $_POST['hauskatze'];
}

if (isset($_FILES['bild_upload']))
{
    $bild = file_get_contents($_FILES['bild_upload']['tmp_name']);
}


$database->insertIntoCats($tierID, $name,$impfung,$personalID,$abholDatum,$tierAlter,$katzenIndex,$hauskatze,$bild);

?>

<html>

<body>
    <h1> Katze ist hinzugefügt </h1>
    <a href="cat.php"> Go back to Katzen </a>
</body>

</html>