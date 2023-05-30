<?php
$servername = "localhost"; // Nom du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "twinshop"; // Nom de la base de données

try {
    // Création d'une nouvelle instance de connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);


    // Configuration des options de PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Connexion réussie
    echo "Connexion à la base de données réussie.";

    // Fermeture de la connexion
    $conn = null;
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affichage de l'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
