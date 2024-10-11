<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful. Welcome, " . $row['username'];
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Login Form</h2>
<form method="post">
  Username:<br>
  <input type="text" name="username" required><br>
  Password:<br>
  <input type="password" name="password" required><br><br>
  <input type="submit" value="Login">
</form>

</body>
</html>
