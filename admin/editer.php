<?php
session_start();

require("../config/commandes.php");


//$leProduit = afficherUnProduit($id);
$leProduit = afficher();

if (isset($_GET['id'])) {

    if (!empty($_GET['id']) or is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $leProduit = afficherUnProduit($id);
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">MonoShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="afficher.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/supprimer.php">Suppression</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight: bold; color: green" href="">Modification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../admin/contact.php">Contact</a>
                    </li>
                </ul>
                <div style="margin-right: 500px">
                    <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
                </div>
                <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="destroy.php">Se deconnecter</a>
            </div>
        </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($leProduit as $produit) : ?>

                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
                            <input type="name" class="form-control" name="image" value="<?= $produit->image ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="nom" value="<?= $produit->nom ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix" value="<?= $produit->prix ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" required><?= $produit->description ?></textarea>
                        </div>

                        <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
                    </form>

                <?php endforeach; ?>

            </div>
        </div>
    </div>


</body>

</html>

<?php

if (isset($_POST['valider'])) {
    if (isset($_POST['image']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['desc'])) {
        if (!empty($_POST['image']) and !empty($_POST['nom']) and !empty($_POST['prix']) and !empty($_POST['desc'])) {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));

            if (isset($_GET['id'])) {

                if (!empty($_GET['id']) or is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                }
            }

            try {
                modifier($image, $nom, $prix, $desc, $id);
                header('Location: afficher.php');
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}

?>