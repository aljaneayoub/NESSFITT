<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['prix'];
    $marque = $_POST['marque'];
    $categorie= $_POST['categorie'];
    $description = $_POST['description'];
    $promo = $_POST['promo'];
    $piece = $_POST['piece'];






    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = '../public/images' . $imageName;
    
        move_uploaded_file($imageTmpPath, $imagePath);


    $query = "INSERT INTO produit (nom,categorie, marque , prix, piece , description, promo , img) VALUES (:name,:categorie, :marque, :price, :piece, :description, :promo, :imagePath)";
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':marque', $marque);
    $statement->bindParam(':categorie', $categorie);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':promo', $promo);
    $statement->bindParam(':piece', $piece);
    $statement->execute();





    if ($statement->execute()) {
        echo '<script>alert("user created succesfuly")</script>';
        header("Refresh: 0.1; ./admin.php");
        } else {
        echo "Error adding product.";
    }
}}

?>
