
<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: /Practica04/public/vista/login.html"); 
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Actualizar Datos</title>
</head>
<body>
    <?php 
    
        include '../../../config/conexionBD.php';
        $usuario=$_SESSION['admin']; 
        $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
        $result=$conn->query($sql); 
        $resultarr=mysqli_fetch_assoc($result);
            

    ?>
    <div id ="contenido">  
        <nav >  
            <ul class="nav" >
                <li><a href="../../vista/admin/index.php">INICIO</a></li>
                <li><a href="../../vista/admin/listarUsuario.php">USUARIOS</a></li>
                <li><a  >MI CUENTA</a>
                    <ul>     
                        <?php 
                            $codigo = $resultarr["usu_codigo"];
                            $cad1 = "../../vista/admin/modificar.php?codigo=";
                            $cad2 = $codigo;
                            $final1 = $cad1 . $cad2;

                            $cad3 = "../../vista/admin/cambiar_contraseña.php?codigo=";
                            $final2= $cad3 . $cad2;
                        ?>
                        <li><a href= "<?php echo $final1 ?>" >DATOS  </a></li>
                        <li><a href="<?php echo $final2 ?>"> CONTRASEÑA  </a></li>
                    </ul>
                </li>
                <li><a href='../../../public/vista/login.html' >CERRAR SESIÓN </a>
            </ul>
        </nav>
    </div>  
    <div >
        <article>
            <h1>ACTUALIZAR LOS DATOS  </h1>
            <body> 
                <?php 
                    include '../../../config/conexionBD.php';

                    $codigo = $resultarr["usu_codigo"];

                    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
                    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
                    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null; 
                    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
                    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
                    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
                    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null; 

                    date_default_timezone_set("America/Guayaquil"); 
                    $fecha = date('Y-m-d H:i:s', time()); 

                    $sql = "UPDATE usuario " . "SET usu_cedula = '$cedula', " . "usu_nombres = '$nombres', " . "usu_apellidos = '$apellidos', " . "usu_direccion = '$direccion', " . "usu_telefono = '$telefono', " . "usu_correo = '$correo', " . "usu_fecha_nacimiento = '$fechaNacimiento', " . "usu_fecha_modificacion = '$fecha' " .  "WHERE usu_codigo = $codigo"; 
                            
                    if ($conn->query($sql) === TRUE) {
                        echo "DATOS ACTUALIZADOS CORRECTAMENTE<br>"; 
                    } else { 
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
                    } 
                    $conn->close(); 
                ?> 
            </body> 
        </article>

    </div>
    
</body>
</html>




