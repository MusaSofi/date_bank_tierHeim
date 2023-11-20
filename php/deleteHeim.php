<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();


$heimID = "";


if (isset($_GET['heimID'])) {
    $heimID = $_GET['heimID'];
}


$database->deleteHeim($heimID);

?>

<html>

<body>
    <h1> Heim ist gelöscht </h1>
    <a href="heims.php"> Go back to Heime </a>
</body>

</html>