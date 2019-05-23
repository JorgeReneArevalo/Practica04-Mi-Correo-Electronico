
<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: /Practica04//public/vista/login.html"); 
        } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>ACTUALIZAR CONTRASEÑA </title>
</head>
<body>
  <?php 
    include '../../../config/conexionBD.php';
    $usuario=$_SESSION['user']; 
    $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
    $result=$conn->query($sql);
    $resultarr=mysqli_fetch_assoc($result);
  ?>
  <div id ="contenido">
    <nav > 
      <ul class="nav" >
        <li><a href="../../vista/user/index.php">INICIO</a></li>
          <?php 
            $usuario = $resultarr["usu_correo"];
            $cad1 = "../../vista/user/enviarCorreo.php?usuario=";
            $final1 = $cad1 . $usuario;
          ?>
        <li><a href="<?php echo $final1 ?>">NUEVO MENSAJE</a></li>
          <?php 
            $codigo = $resultarr["usu_codigo"];
            $cad1 = "../../vista/user/mensajeEnviado.php?usuario=";
            $final = $cad1 . $usuario;
          ?>
        <li><a href= "<?php echo $final ?>" >MENS. ENVIADOS </a></li>

        <li><a >MI CUENTA</a>
          <ul>
            <?php 
              $codigo = $resultarr["usu_codigo"];
              $cad1 = "../../vista/user/modificar.php?codigo=";
              $cad2 = $codigo;
              $final1 = $cad1 . $cad2;
              $cad3 = "../../vista/user/cambiar_contraseña.php?codigo=";
              $final2= $cad3 . $cad2;
              $cad4 = "../../vista/user/eliminar.php?codigo=";
              $final3= $cad4 . $cad2;
            ?>
            <li><a href= "<?php echo $final1 ?>" >DATOS </a></li>
            <li><a href= "<?php echo $final3 ?>" >ELIMINAR </a></li>
            <li><a href="<?php echo $final2 ?>"> CONTRASEÑA </a></li>
          </ul>
        </li>
        <li><a href='../../../public/vista/login.html' >CERRAR SESIÓN </a>
      </ul>
    </nav>
  </div>

  <div >
    <article>
      <h1>ESTADO DE SU CONTRASEÑA :) </h1>
      <body> 
        <?php 
          include '../../../config/conexionBD.php';
          $codigo = $resultarr["usu_codigo"];

          $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null; 
                
          $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null; 
          
          $sqlContrasena1 = "SELECT * FROM usuario where usu_codigo=$codigo and usu_password=MD5('$contrasena1')"; 
          
          $result1 = $conn->query($sqlContrasena1); 

          if ($result1->num_rows> 0) { 
            date_default_timezone_set("America/Guayaquil"); 
            $fecha = date('Y-m-d H:i:s', time()); 
            $sqlContrasena2 = "UPDATE usuario " . "SET usu_password = MD5('$contrasena2'), " . "usu_fecha_modificacion = '$fecha' " . "WHERE usu_codigo = $codigo"; 
            
            if ($conn->query($sqlContrasena2) === TRUE) { 
              echo "MODIFICADA CON ÉXITO <br>"; 
          
            } else { 
              echo "<p>Error: " . mysqli_error($conn) . "</p>"; 
            }
          } else{ 
            echo "<p>La contraseña actual no coincide con nuestros registros!!! </p>"; 
          } 

          $conn->close(); 
        ?> 
      </body> 
    </article>
  </div>
    
</body>
</html>