<?php
$host = 'localhost';
$db = 'amazon_clone';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (username, email, password, address, phone) 
            VALUES ('$username', '$email', '$password', '$address', '$phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
