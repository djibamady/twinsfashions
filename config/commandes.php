<?php



// Fonction pour créer un produit
function createProduct($image, $nom, $email, $prix, $description)
{
    $conn = connectDB();

    $query = "INSERT INTO produit (image, nom, COC_APPRENANT_email, prix, description) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->execute([$image, $nom, $email, $prix, $description]);

    $lastInsertedId = $conn->lastInsertId();

    $conn = null;

    return $lastInsertedId;
}

// Fonction pour récupérer tous les produits
function getProducts()
{
    $conn = connectDB();

    $query = "SELECT * FROM produit";

    $stmt = $conn->query($query);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;

    return $products;
}

// Fonction pour récupérer un produit par son ID
function getProductById($id)
{
    $conn = connectDB();

    $query = "SELECT * FROM produit WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    $conn = null;

    return $product;
}

// Fonction pour mettre à jour un produit
function updateProduct($id, $image, $nom, $email, $prix, $description)
{
    $conn = connectDB();

    $query = "UPDATE produit SET image = ?, nom = ?, COC_APPRENANT_email = ?, prix = ?, description = ? WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute([$image, $nom, $email, $prix, $description, $id]);

    $conn = null;
}

// Fonction pour supprimer un produit
function deleteProduct($id)
{
    $conn = connectDB();

    $query = "DELETE FROM produit WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);

    $conn = null;
}
