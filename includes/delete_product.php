<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['deleteproductname'];

    $query = "DELETE FROM produit WHERE nom = :name";
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);

    if ($statement->execute()) {
        echo '<script>alert("product deleted succesfuly")</script>';
        header("Refresh: 0.1; ./admin.php");
    } else {
        echo "An error occurred. Please try again.";
    }
}
?>
