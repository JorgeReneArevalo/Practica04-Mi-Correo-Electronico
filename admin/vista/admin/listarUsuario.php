

<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['privilegios'] === 'user'  ){ 
        header("Location: /Practica04/public/vista/login.html"); 
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Lista de Usuarios</title>
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
                <li><a href="index.php">INICIO</a></li>            
                <li><a href="listarUsuario.php">USUARIOS</a></li>
                    <li><a  >MI CUENTA</a>
                        <ul>     
                            <?php 
                                $codigo = $resultarr["usu_codigo"];
                                $cad1 = "modificar.php?codigo=";
                                $cad2 = $codigo;
                                $final1 = $cad1 . $cad2;

                                $cad3 = "cambiar_contraseña.php?codigo=";
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
            <h1>LISTA DE USUARIOS </h1>
            <body>
                <table border = 1 style="width:100%"> 
                    <tr> 
                        <th>Cedula</th> 
                        <th>Nombres</th> 
                        <th>Apellidos</th> 
                        <th>Dirección</th> 
                        <th>Telefono</th> 
                        <th>Correo</th> 
                        <th>Fecha Nacimiento</th> 
                        <th>Eliminar</th>
                        <th>Modificar</th> 
                        <th>Cambiar Contraseña</th> 
                    </tr> 
                    
                    <?php 
                        include '../../../config/conexionBD.php';

                        $sql = "SELECT * FROM usuario where usu_rol = 'user' and  usu_eliminado = 'N'"; 
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) { 
                            
                            while($row = $result->fetch_assoc()){ 
                                echo "<tr>"; 
                                echo " <td>" . $row["usu_cedula"] . "</td>";
                                echo " <td>" . $row['usu_nombres'] ."</td>"; 
                                echo " <td>" . $row['usu_apellidos'] . "</td>"; 
                                echo " <td>" . $row['usu_direccion'] . "</td>"; 
                                echo " <td>" . $row['usu_telefono'] . "</td>"; 
                                echo " <td>" . $row['usu_correo'] . "</td>"; 
                                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
                                echo " <td> <a href='eliminarUsuario.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                                echo " <td> <a href='modificarUsuario.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
                                echo " <td> <a href='cambiar_Contraseña_Usuario.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";

                            } 
                        } else { 
                            echo "<tr>"; 
                            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
                            echo "</tr>"; 
                        } 
                        $conn->close(); 


                    ?>
                </table> 
            </body> 

        </article>
    </div>
    
    
</body>
</html>