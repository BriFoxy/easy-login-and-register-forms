<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Verschlüsseltes Passwort
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO users (username, email, password, phone_number)
            VALUES ('$username', '$email', '$password', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Register Form</h2>
<form method="post">
  Username:<br>
  <input type="text" name="username" required><br>
  Email:<br>
  <input type="email" name="email" required><br>
  Password:<br>
  <input type="password" name="password" required><br>
  Phone Number:<br>
  <input type="text" name="phone_number" required><br><br>
  <input type="submit" value="Register">
</form>

</body>
</html>
