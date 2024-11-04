
<?php
session_start();
$host = 'localhost';
$db = 'amazon_clone';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: index.html");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with this email.";
    }
}
?>
