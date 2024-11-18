<?php
include 'link/link.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FullName = $_POST['FullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (email, password, FullName) VALUES ( ?, ?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("sss", $email, $password,$FullName);

    if ($stmt->execute()) {
        // echo "Registration successful";
        header('location:login.html');
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $stmt->close();
    $link->close();
}
?>
