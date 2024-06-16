<?php
$server = 'db4free.net';
$user = 'marlonk';
$password = '12345678';
$BD = 'pueba01';

// Crear conexión
$link = mysqli_connect($server, $user, $password, $BD);

// Verificar conexión
if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['registro'])) {
    // Verificar si los campos existen
    if (isset($_POST['nombreapellido']) && isset($_POST['comentario'])) {
        $nombreapellido = $_POST['nombreapellido'];
        $comentario = $_POST['comentario'];

        // Asegúrate de que la tabla y las columnas existan en la base de datos
        $insertar = "INSERT INTO Comentarios (nombreapellido, comentario) VALUES ('$nombreapellido', '$comentario')";

        $ejecutarInsertar = mysqli_query($link, $insertar);

        if ($ejecutarInsertar) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar los datos: " . mysqli_error($link);
        }
    } else {
        echo "Error: Campos del formulario no definidos.";
    }
}

// Cerrar conexión
mysqli_close($link);
?>
