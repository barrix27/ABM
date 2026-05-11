<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "abm"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibimos el ID del formulario de index.php
if (isset($_POST['id_elegido'])) {
    $id = intval($_POST['id_elegido']); 


    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql)) {
        // ACCIÓN: Después de borrar, redireccionamos al código de la tabla
        header("Location: mostrar.php");
        exit();
    } else {
        echo "Error al intentar eliminar: " . $conn->error;
    }
}

$conn->close();
?>
