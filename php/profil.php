<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$profils = $database->selectAllProfils();
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tier Heim</title>
</head>

<body style="background-color: #f3e0ff;">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3befa;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tier Heim</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="heims.php">Heime</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.php">Ärzte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profil.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hund.php">Hunde</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cat.php">Katzen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="getDoctorByTierID.php">Finde deinen Arzt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="height: 75vh; overflow: auto;">
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Kundenname</th>
                <th>Profilname</th>
                <th>PersonalID</th>
                <th>Land</th>
                <th>Stadt</th>
                <th>PLZ</th>
                <th>Strasse</th>
                <th>Hausnummer</th>
                <th>Handynummer</th>
                <th>EMail</th>
                <th>Bild</th>
            </tr>
            <?php
            $index = 1;
            foreach ($profils as $profil): ?>
                <tr>
                    <td>
                        <?php echo $index; ?>
                    </td>
                    <td>
                        <?php echo $profil['KUNDENNAME']; ?>
                    </td>
                    <td>
                        <?php echo $profil['PROFILNAME']; ?>
                    </td>
                    <td>
                        <?php echo $profil['PERSONALID']; ?>
                    </td>
                    <td>
                        <?php echo $profil['LAND']; ?>
                    </td>
                    <td>
                        <?php echo $profil['STADT']; ?>
                    </td>
                    <td>
                        <?php echo $profil['PLZ']; ?>
                    </td>
                    <td>
                        <?php echo $profil['STRASSE']; ?>
                    </td>
                    <td>
                        <?php echo $profil['HAUSNUMMER']; ?>
                    </td>
                    <td>
                        <?php echo $profil['HANDYNUMMER']; ?>
                    </td>
                    <td>
                        <?php echo $profil['EMAIL']; ?>
                    </td>
                    <td>
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($profil['BILD']).'"/>'; ?>
                    </td>
                </tr>
                <?php
                $index++;
            endforeach; ?>
        </table>
    </div>

    <div class="container">
        <div class="row" style="height: 5vh">
        </div>
        <div class="row">
            <div class="col">
                <form class="row g-3" method="post" action="addProfil.php" enctype="multipart/form-data">
                    <div class="col-auto">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="land" name="land" placeholder="Land">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="stadt" name="stadt" placeholder="Stadt">
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="plz" name="plz" placeholder="PLZ">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="strasse" name="strasse" placeholder="Straße">
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="hausnummer" name="hausnummer"
                            placeholder="Hausnummer">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="handynummer" name="handynummer"
                            placeholder="Handynummer">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-auto">
                        <input type="file" class="form-control" id="bild_upload" name="bild_upload">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>