<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['deleteUsername'];

    $query = "DELETE FROM user WHERE numtel = :phone";
    $statement = $db->prepare($query);
    $statement->bindParam(':phone', $phone);

    if ($statement->execute()) {
        echo '<script>alert("user deleted succesfuly")</script>';
        header("Refresh: 0.1; ./admin.php");
    } else {
        echo "An error occurred. Please try again.";
    }
}
?>
