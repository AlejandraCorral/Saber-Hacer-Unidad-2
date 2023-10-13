<?php
    session_start();
    require_once 'cnn.php';
    
    if(isset($_POST['Iniciar'])){
    	$email=$_POST['email'];
    	$psw=$_POST['psw'];

    	$conexion= new Conexion();

    	$query=$conexion->prepare('SELECT * FROM users WHERE email=:email  AND psw=:psw');

    	$query->bindParam(':email',$email);
    	$query->bindParam(':psw',$psw);

    	$query->execute();

    	$count=$query->rowCount();

    	if($count)
    	{
          $_SESSION['email']=$us;
          header("Location:../Home.php");
    	}else{
    		      // El usuario no existe
      // Alerta a mostrar
$alerta = "Error en tus credenciales de acceso! :(";

// Redirección a la página deseada después de 5 segundos
$tiempoRedireccion = 5;
$urlRedireccion = "../index.php";

// Generar la página con la alerta y la redirección
echo "
    <script>
        alert('$alerta');
        setTimeout(function() {
            window.location.href = '$urlRedireccion';
        }, $tiempoRedireccion * 0);
    </script>
";

    	}
      

    }
?>