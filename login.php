<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "diaval#9418";
$dbname = "empresa";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM usuarios WHERE username='$username' AND
password='$password'";
$result = $conn->query($query);
if ($result->num_rows == 1) {
$row = $result->fetch_assoc();
$_SESSION["username"] = $username;
$_SESSION["rol"] = $row["rol"];
header("Location: sesiones.php");
} else {
echo "Usuario o contraseña incorrectos.";
}
}
$conn->close();
?>