<?php
include 'conn.php';

if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "INSERT INTO signup (name, password)
            VALUES ('$name', '$password')";

    if (mysqli_query($con, $sql)) {
        header("Location: signin.php");
        exit();
    } else {
        echo "Signup failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Signup</title></head>
<body>

<h2>Signup</h2>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="signup">Signup</button>
    <a href="signin.php">Sign in if You are already registered</a>
</form>

</body>
</html>
