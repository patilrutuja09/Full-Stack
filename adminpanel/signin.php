<?php
session_start();
include 'conn.php';

if (isset($_POST['signin'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE name='$name' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['name'] = $name;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid name or password";
        header("Location: signin.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Signin</title></head>
<body>

<h2>Signin</h2>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="signin">Signin</button>
</form>

</body>
</html>
