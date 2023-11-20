<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();


$lizenzNummer = "";


if (isset($_GET['lizenzenummber'])) {
    $lizenzNummer = $_GET['lizenzenummber'];
}


$database->deleteDoctor($lizenzNummer);

?>

<html>

<body>
    <h1> Arzt ist gelöscht </h1>
    <a href="doctors.php"> Go back to Doctors </a>
</body>

</html>