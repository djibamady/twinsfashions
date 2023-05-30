 <?php



    // Fonction pour créer un produit
    function createProduct($image, $nom, $prix, $description)
    {
        //Etablir la connexion
        $conn = connectDB();
        //verifier si la connexion n'a pas echouée
        if (require($conn)) {
            $query = "INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)";
            //Preparer la requête
            $stmt = $conn->prepare($query);
            //Executer la requete
            $stmt->execute([$image, $nom, $prix, $description]);

            // $lastInsertedId = $conn->lastInsertId();
            $conn = null;
        }


        // return $lastInsertedId;
    }

    // Fonction pour récupérer tous les produits
    function getProducts()
    {
        $conn = connectDB();
        //verifier si la connexion n'a pas echouée
        if (require($conn)) {

            $query = "SELECT * FROM produits ORDER BY id DESC";

            $stmt = $conn->query($query);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
            $conn = null;
        }
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
    function updateProduct($id, $image, $nom, $prix, $description)
    {
        $conn = connectDB();

        $query = "UPDATE produit SET image = ?, nom = ?, prix = ?, description = ? WHERE id = ?";

        $stmt = $conn->prepare($query);
        $stmt->execute([$image, $nom,  $prix, $description, $id]);

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
