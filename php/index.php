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
            <a class="navbar-brand" href="#">Tier Heim</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="heims.php">Heime</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.php">Ärzte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hund.php">Hunde</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cat.php">Katzen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="getDoctorByTierID.php">Finde deinen Arzt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-12 center-block text-center">
                <h1>Tier Heim</h1>
            </div>
        </div>
        <div class="row" style="height: 10vh"></div>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./img/cat.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Entdecke den purr-fekten Begleiter! Unsere bezaubernde Katze sucht ein
                            liebevolles Zuhause, in dem sie ihre verspielte Natur entfalten kann. Mit ihrem charmanten
                            Wesen und dem weichen Fell wird sie dein Herz im Sturm erobern. Komm vorbei und lass dich
                            von ihrer einzigartigen Persönlichkeit inspirieren!</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./img/dog.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Ein Blick in diese treuen Augen genügt, um zu erkennen, dass dieser Hund
                            ein Seelenverwandter ist, der darauf wartet, dein bester Freund zu werden. Mit seiner
                            verspielten Natur und der bedingungslosen Liebe, die er zu geben hat, wird er dich jeden Tag
                            aufs Neue inspirieren, das Leben in vollen Zügen zu genießen. Komm vorbei und lass dich von
                            diesem herzlichen Vierbeiner verzaubern!</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./img/doctor.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Bei uns steht das Wohl deines tierischen Familienmitglieds an erster
                            Stelle. Unsere erfahrenen Tierärzte kümmern sich liebevoll um die Gesundheit und das
                            Wohlbefinden deines Haustiers. Mit ihrer fachlichen Kompetenz und dem Einfühlungsvermögen
                            werden sie dich inspirieren, dich umfassend um die Gesundheit und das Glück deines geliebten
                            Tieres zu kümmern. Vereinbare noch heute einen Termin und gib deinem Haustier die
                            bestmögliche medizinische Betreuung!</p>
                    </div>
                </div>
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