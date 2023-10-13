<?php
    require_once 'cnn.php';
    if (isset($_POST['Registrar'])) {
            
        $id = null;  
        $nombre=$_POST['nombre'];
	   	$email=$_POST['email'];
        $user=$_POST['user'];
	    $psw=$_POST['psw'];

        if(!empty($nombre) && !empty($email) && !empty($user) && !empty($psw)){

            $id = null;  
            $nombre=$_POST['nombre'];
	   	    $email=$_POST['email'];
            $user=$_POST['user'];
	   	    $psw=$_POST['psw'];

	   	     $conexion=new Conexion();
                $query=$conexion->prepare("INSERT INTO users (id, nombre, email, user, psw) VALUES (:id, :nombre, :email, :user, :psw)");

            $query->bindParam(':id',$id);
	   	    $query->bindParam(':nombre',$nombre);
	   	    $query->bindParam(':email',$email);
            $query->bindParam(':user',$user);
   	        $query->bindParam(':psw',$psw);

	   	     $query -> execute();

                $count=$query->rowCount();

                // Ejecutar la consulta
                if ($count) {
                    header("location: ../index.php");
                } else {
                    echo "Error al actualizar el registro: ";
                }



            
                
              
        }else{
	   	    
// El usuario no existe
                    // Alerta a mostrar
                    $alerta = "Rellena todos los campos! :)";
              
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