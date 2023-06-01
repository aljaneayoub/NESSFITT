<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telnum = $_POST['telnum'];
    $passwd = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (numtel,name, email, password) VALUES (:telnum,:name,:email, :passwd)";
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':telnum', $telnum);
    $statement->bindParam(':passwd', $passwd);

    if ($statement->execute()) {
        echo '<script>alert("user created succesfuly")</script>';
        header("Refresh: 0.1; ./admin.php");
    } else {
        echo "An error occurred. Please try again.";
    }
}
?>
