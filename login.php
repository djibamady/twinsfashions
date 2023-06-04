<?php
session_start();

include "config/commandes.php";

if (isset($_SESSION['xRttpHo0greL39'])) {
    if (!empty($_SESSION['xRttpHo0greL39'])) {
        header("Location: admin/afficher.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - TwinsFashions</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>

    <div class="container" style="display: flex; justify-content: start-end">
        <div class="row">
            <div class="col-md-10">

                <form method="post" action="admin/afficher.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Login</label>
                        <input type="email" name="email" class="form-control" style="width: 350%;">
                    </div>
                    <div class="mb-3">
                        <label for="motdepasse" class="form-label">Mot de passe</label>
                        <input type="password" name="motdepasse" class="form-control" style="width: 350%;">
                    </div>
                    <br>
                    <input type="submit" name="envoyer" class="btn btn-info" value="Se connecter">
                </form>

            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['email']) and !empty($_POST['motdepasse'])) {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $motdepasse = $_POST['motdepasse'];
        if (require("config/connexion.php")) {
            $access = require("config/connexion.php");
            $req = $access->prepare("SELECT * FROM admin WHERE email=?");

            $req->execute(array($email));
            $user = $req->fetch();
            if ($req->rowCount() == 1) {
                if ($user['email'] == $email && $motdepasse == $user['motdepasse']) {
                    header('Location: admin/afficher.php');
                    exit();
                } else {
                    $error = "Nom d'utilisateur ou mot de passe incorrect.";
                    echo $error;
                }
            } else {
                $error = "Nom d'utilisateur Introuvable.";
                echo $error;
            }
        }
        /*    $admin = getAdmin($login, $motdepasse);

        if ($admin) {
            $_SESSION['xRttpHo0greL39'] = $admin;
            header('Location: admin/afficher.php');
        } else {
            header('Location: index.php');
        }*/
    }
}
