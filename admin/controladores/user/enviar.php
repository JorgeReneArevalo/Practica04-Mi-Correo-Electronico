<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Practica04/public/vista/login.html");
}
?>


<!DOCTYPE html>
<html>
<head>  


        <meta charset=”utf-8” />
        <title>CORREO ENVIADO</title>
        <script src="../../../js/ajax.js" type="text/javascript">  </script>
        <link href="../../../style/ct_layout2.css" rel= "stylesheet" />
        <link href="../../../style/estilo2.css" rel="stylesheet"/>
        <link href="../../../style/titulos.css" rel="stylesheet"/>
        <link href="../../../style/imagenes.css" rel="stylesheet"/>
                
</head>
<body>
  <?php 
    include '../../../config/conexionBD.php';
    $usuario=$_SESSION['usuario'];
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
    <article>
      <h1>ESTADO DE SU MENSAJE :)</h1>
      <?php  
        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 
        $remitente = $_POST['remitente'];
        $destinatario = $_POST['destinatario'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        
        include '../../../config/conexionBD.php';

        $sql="SELECT usu_rol FROM usuario WHERE usu_correo = '$destinatario' ";
        $result=$conn->query($sql); 
        $resultarr=mysqli_fetch_assoc($result);
        $attempts = $resultarr["usu_rol"];

        if($attempts == 'admin'){
          echo "NO SE PUEDE ENVIAR , EL CORREO PERTENECE A UN USUARIO ADMINISTRADOR ";
        }else{
          $carta = "Fecha: $fecha \n";
          $carta .= "De: $remitente \n";
          $carta .= "Mensaje: $mensaje";
          $sql = "INSERT INTO correo VALUES (0,'$fecha', '$remitente','$destinatario','$asunto', '$mensaje')";

        if ($conn->query($sql) === TRUE) {
            echo "ENVIADO CON ÉXITO ";
            } else { 
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            $conn->close(); 
        }
      ?>
    </article>
  </div>

</body>
</html>
