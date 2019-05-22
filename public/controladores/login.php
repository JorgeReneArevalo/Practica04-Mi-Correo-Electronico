<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Login</title>
</head>
<body>
   <?php  
      session_start();  
   ?> 
   <?php
   include '../../config/conexionBD.php';

   $usuario=isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
   $contraseña=isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;  
   $contra = MD5($contraseña);

   $sql="SELECT usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_password = '$contra' and usu_eliminado = 'N' " ;

   $result = $conn->query($sql);
   $resultarr=mysqli_fetch_assoc($result);
   
   $attempts = $resultarr["usu_rol"];

   if ($result->num_rows > 0) {
      $_SESSION['isLogged']=TRUE;

      if ( $attempts == 'user' ) {
         $_SESSION['isUser'] = TRUE;
         $_SESSION['usuario'] = $rows['usu_codigo'];
         header("Location: ../../admin/vista/user/index.php");
      } else if ($attempts == 'admin') {
         $_SESSION['isAdmin'] = TRUE;
         $_SESSION['usuario'] = $rows['usu_codigo']; 
         header("Location: ../../admin/vista/admin/index.php");
      }
   } else {
      header("Location:../vista/login.html");
   }

   ?>
</body>
</html>