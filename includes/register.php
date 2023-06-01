<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['registerEmail']) || empty($_POST['registerUsername']) || empty($_POST['registerPassword'])) {
        echo 'Please fill in all the required fields.';
        exit;
    }

    $phone = $_POST['registerPhone'];
    $email = $_POST['registerEmail'];
    $name = $_POST['registerUsername'];
    $passwd = $_POST['registerPassword'];

    require_once 'db_connection.php';

    $query = 'INSERT INTO user (numtel, email, name, password) VALUES ( ?, ?, ?, ?)';

    $stmt = $db->prepare($query);
    $stmt->execute([$phone,$email, $name, $passwd]);

    if ($stmt->rowCount() > 0) 
        {
            echo '<script>alert("you are registred")</script>';
                        header("Refresh: 0.1; ../public/index.php");
            }
     else {
        echo  "<script>alert(\"registration failed\")</script>";
    }
    }

?>
