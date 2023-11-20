<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();


$tierID = "";


if (isset($_GET['tierID'])) {
    $tierID = $_GET['tierID'];
}


$database->deleteDog($tierID);

?>

<html>

<body>
    <h1> Hund ist gelöscht </h1>
    <a href="hund.php"> Go back to Hund </a>
</body>

</html>