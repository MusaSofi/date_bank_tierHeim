<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$name = "";
$land = "";
$stadt = "";
$plz = "";
$strasse = "";
$hausnummer = "";
$handynummer = "";
$email = "";
$bild = "";



if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['land'])) {
    $land = $_POST['land'];
}

if (isset($_POST['stadt'])) {
    $stadt = $_POST['stadt'];
}

if (isset($_POST['plz'])) {
    $plz = $_POST['plz'];
}
if (isset($_POST['strasse'])) {
    $strasse = $_POST['strasse'];
}
if (isset($_POST['hausnummer'])) {
    $hausnummer = $_POST['hausnummer'];
}
if (isset($_POST['handynummer'])) {
    $handynummer = $_POST['handynummer'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_FILES['bild_upload']))
{
    $bild = file_get_contents($_FILES['bild_upload']['tmp_name']);
}

$database->insertIntoProfils($name, $land,$stadt,$plz,$strasse,$hausnummer,$handynummer,$email,$bild);

?>

<html>

<body>
    <h1> Profil ist hinzugefügt </h1>
    <a href="profil.php"> Go back to Profils </a>
</body>

</html>