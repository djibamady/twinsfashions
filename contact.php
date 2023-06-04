<?php
session_start();


require("config/commandes.php");





?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/footer.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/footer.js"></script>


    <title></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">TwinsFashion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="modif.php" style="font-weight: bold; color: green">Contact</a>
                    </li>

                </ul>
                <div style="margin-right: 500px">
                    <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
                </div>
            </div>
        </div>
    </nav>


    <footer>
        <div class="container">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="contact-section">
                <h3>Contactez-nous</h3>
                <form id="contact-form">
                    <input type="text" id="name" name="name" placeholder="Nom" required>
                    <input type="email" id="email" name="email" placeholder="Adresse e-mail" required>
                    <textarea id="message" name="message" placeholder="Votre message" required></textarea>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </footer>

</body>

</html>

<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    // Récupérer les valeurs des champs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Adresse e-mail du destinataire
    $to = 'mohamedfofana2k19@gmail.com';

    // Sujet de l'e-mail
    $subject = 'Nouveau message de contact';

    // Corps de l'e-mail
    $body = "Nom: $name\n";
    $body .= "Adresse e-mail: $email\n";
    $body .= "Message:\n$message";

    // En-têtes de l'e-mail
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'e-mail
    if (mail($to, $subject, $body, $headers)) {
        // Succès de l'envoi de l'e-mail
        echo "Votre message a été envoyé avec succès.";
    } else {
        // Erreur lors de l'envoi de l'e-mail
        echo "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.";
    }
}
?>