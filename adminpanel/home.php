<?php
session_start();

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $year = $_POST['year'];
    $subjects = isset($_POST['subject']) ? implode(", ", $_POST['subject']) : '';
    $address = $_POST['address'];

if(isset($_FILES['file'])) {

    $error = [];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
$ext=explode('.', $fileName);
   $fileExt=strtolower(end($ext));
    $extensions = ["jpeg","jpg","png","pdf","docx"];

    if (!in_array($fileExt, $extensions)) {
        $error[] = "Extension not allowed";
    }

    if ($fileError !== 0) {
        $error[] = "File upload error";
    }

    if (empty($error)) {
        move_uploaded_file($fileTmpName, "img/" . $fileName);
        echo "File uploaded successfully<br>";
    } else {
        echo $error[0];
    }
}

    $sql = "INSERT INTO student (name, email, phone, gender, year, subjects, address, file)
            VALUES ('$name', '$email', '$phone', '$gender', '$year', '$subjects', '$address', '$fileName')";
    mysqli_query($con, $sql);

$dispaly_data="SELECT * FROM student";
$result=$con->query($dispaly_data);
while($row=$result->fetch_assoc()){
   echo "ID: ".$row['id']." | NAME: ".$row['name']." | EMAIL: ".$row['email']." | PHONE: ".$row['phone']." |
    GENDER: ".$row['gender']." | FILE: ".$row['file']."<br>";
  }
}
?>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>
//student FROM


<form  method="POST"
      style="
        padding:30px;
        width:30%;
        border:2px solid black;
        background:#f9f9f9;
        font-family:Arial;
        margin-left:30%;
      " enctype="multipart/form-data"
>

    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Phone:</label><br>
    <input type="number" name="phone"><br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    <label>Select Year:</label><br>
    <select name="year">
        <option value="FY">FY</option>
        <option value="SY">SY</option>
        <option value="TY">TY</option>
        <option value="BTECH">BTECH</option>
    </select>
    <br><br>

    <label>Choose Subject:</label><br>
    <input type="checkbox" name="subject[]" value="Python"> Python<br>
    <input type="checkbox" name="subject[]" value="Java"> Java<br>
    <input type="checkbox" name="subject[]" value="HTML/CSS"> HTML/CSS<br><br>

    <label>Address:</label><br>
    <textarea name="address" rows="3"></textarea><br><br>

    <label>Choose File:</label><br>
    <input type="file" name="file"><br><br>

    <input type="submit" value="Submit">
    <input type="submit" value="Logout" name="logout">
</form>


<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: signin.php");
    exit();
}
?>
