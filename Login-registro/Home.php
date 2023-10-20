<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: index.php');
}

require_once 'php/cnn.php';

// Obtener el ID de usuario almacenado en la sesión
$userId = $_SESSION['user'];

$conexion = new Conexion();

// Realizar una consulta para obtener información del usuario
$query = "SELECT * FROM users WHERE id = :userId";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':userId', $userId);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>




    <center>

        <h4>Bienvenido <?php echo $userData['user']; ?></h4>

        <h1>Sitio en Construcción</h1>

        <img src="https://i.pinimg.com/originals/5e/66/97/5e6697eeca64506902d3ac98171f2e8f.gif" alt="Err">

    </center>
    
    <script>
        // Especifica la URL de destino y el tiempo en milisegundos (5 segundos en este ejemplo)
        var urlRedireccion = "php/cerrar.php";
        var tiempoRedireccion = 2000; // 2 segundos

        // Utiliza setTimeout para redirigir después del tiempo especificado
        setTimeout(function() {
            window.location.href = urlRedireccion;
        }, tiempoRedireccion);
    </script>


</body>

</html>
