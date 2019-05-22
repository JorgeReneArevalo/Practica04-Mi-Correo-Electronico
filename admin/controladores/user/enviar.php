
<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: /GestionDeUsuarios/public/vista/login.html"); 
        } 
?>


<!DOCTYPE html>
<html>
<head>  


        <meta charset=”utf-8” />
        <title>CORREO ENVIADO</title>
        <script src="../../../js/ajax.js" type="text/javascript">  </script>
        <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
        <link href="../../../estyles/estilo2.css" rel="stylesheet"/>
        <link href="../../../estyles/titulos.css" rel="stylesheet"/>
        <link href="../../../estyles/imagenes.css" rel="stylesheet"/>
                
</head>
<body>
                  <?php 
                    //CONEXION A LA BASE DE DATOS
                    include '../../../config/conexionBD.php';
                  //RECUPERO EL CORREO DEL USUARIO INGRESADO
                    $usuario=$_SESSION['user'];

                    $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
                     //Enviar una consulta MySQL
                     $result=$conn->query($sql); 
                      //Recupera una fila de resultados como un array asociativo
                    $resultarr=mysqli_fetch_assoc($result);
                    //Obtnemos el valo de una fila especifico
                    ?>

                    
        <div id ="contenido">  
                <nav > 
                    <ul class="nav" >
                        <li><a href="../../vista/usuario/paginaUsuario.php">INICIO</a></li>
                       
                                <?php 
                                 $usuario = $resultarr["usu_correo"];
                                 $cad1 = "../../vista/usuario/enviarCorreo.php?usuario=";
                                 $final1 = $cad1 . $usuario;

                                ?>
                        <li><a href="<?php echo $final1 ?>">NUEVO MENSAJE</a></li>

                                <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "../../vista/usuario/listaMensajesEnviados.php?usuario=";
                                 $final = $cad1 . $usuario;

                                 ?>


                        <li><a href= "<?php echo $final ?>" >MENS. ENVIADOS </a></li>

                        <li><a >MI CUENTA</a>
                            <ul>     
                                 <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "../../vista/usuario/modificar.php?codigo=";
                                 $cad2 = $codigo;
                                 $final1 = $cad1 . $cad2;

                                 $cad3 = "../../vista/usuario/cambiar_contrasena.php?codigo=";
                                 $final2= $cad3 . $cad2;

                                 $cad4 = "../../vista/usuario/eliminar.php?codigo=";
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

// Llamando a los campos
date_default_timezone_set("America/Guayaquil"); 
$fecha = date('Y-m-d H:i:s', time()); 
$remitente = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

include '../../../config/conexionBD.php';

$sql="SELECT usu_rol FROM usuario WHERE usu_correo = '$destinatario' ";
//Enviar una consulta MySQL
$result=$conn->query($sql); 
//Recupera una fila de resultados como un array asociativo
$resultarr=mysqli_fetch_assoc($result);
//Obtnemos el valo de una fila especifica
$attempts = $resultarr["usu_rol"];

if($attempts == 'admin'){

       echo "NO SE PUEDE ENVIAR , EL CORREO PERTENECE A UN USUARIO ADMINISTRADOR ";
      // echo "<a href='../vista/enviarCorreo.php'>REGRESAR </a>";
      ///header("Location: ../../../public/vista/login.html");
      
}else{

// Datos para el correo
$carta = "Fecha: $fecha \n";
$carta .= "De: $remitente \n";
$carta .= "Mensaje: $mensaje";

// Enviando Mensaje
//mail($destinatario, $asunto, $carta);


$sql = "INSERT INTO correos VALUES (0,'$fecha', '$remitente','$destinatario','$asunto', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "ENVIADO CON ÉXITO ";
    //echo "<a href='../vista/enviarCorreo.php'>REGRESAR </a>";
   /// header('Location:../vista/enviarCorreo.php');

    } else {
        
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }

    $conn->close(); 
}

 ?>
    


       
        </article>



        </div>

        <footer>

        <p >&copy; TODOS LOS DERECHOS RESERVADOS</p>
        <p ></Strong> Franklin Gustavo Guallpa Giñin  <Strong> </p>
        <p ></Strong> 2019 <Strong> </p>
                    
        </footer>
    
</body>
</html>
