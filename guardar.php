<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "abm"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificamos si recibimos el ID desde el formulario
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Aseguramos que sea un número
    
    $sql = "DELETE FROM personas7 WHERE id = $id";

    if ($conn->query($sql)) {
        // Redirigir con éxito (puedes cambiar index.php por el nombre de tu archivo principal)
        header("Location: index.php?status=success");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Por favor, ingresa un ID válido.";
    echo "<br><a href='index.php'>Volver</a>";
}

$conn->close();
?>
