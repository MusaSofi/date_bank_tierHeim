<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();


$tierID = "";


if (isset($_GET['tierID'])) {
    $tierID = $_GET['tierID'];
}


$database->deleteKatze($tierID);

?>

<html>

<body>
    <h1> Katze ist gelöscht </h1>
    <a href="cat.php"> Go back to Katze </a>
</body>

</html>