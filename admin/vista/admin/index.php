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
    <script src="../../../js/cargarImagen.js" type="text/javascript">  </script>
    <link href="../../../estyle/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyle/estilo2.css" rel="stylesheet"/>
    <link href="../../../estyle/titulos.css" rel="stylesheet"/>
    <link href="../../../estyle/imagenes.css" rel="stylesheet"/>
    <title>Pagina Usuario</title>
</head>
<body>
    <?php
        include '../../../config/conexionBD.php';
        $usuario=$_POST["usuario"];
        $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
        $result=$conn->query($sql); 
        $resultarr=mysqli_fetch_assoc($result);
    ?>

    <div id ="contenido"> 
        <nav >
            <ul class="nav" >
                <li><a >INICIO</a></li>

                <li><a href="listaUsuarios.php">USUARIOS</a></li>

                <li><a  >MI CUENTA</a>
                    <ul>
                        <?php
                            $codigo = $resultarr["usu_codigo"];
                            $cad1 = "modificar.php?codigo=";
                            $cad2 = $codigo;
                            $final1 = $cad1 . $cad2;
                            $cad3 = "cambiar_contrasena.php?codigo=";
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

    <div id = "lateral">


        <?php
            $nombres = $resultarr["usu_nombres"];
            $apellidos = $resultarr["usu_apellidos"];
            $nombreCompleto=$nombres. '  '.$apellidos;
        ?>

        <h1> <?php echo $nombreCompleto?> </h1>
    </div>

    <div >
        <article>
            <h1>MENSAJES ELECTRÓNICOS </h1>
            <body>
                <table border = 1 style="width:100%">
                <tr> 
                <th>Fecha/Hora</th> 
                <th>Remitente</th> 
                <th>Destinatario</th> 
                <th>Asunto</th> 
                <th>Eliminar Mensaje</th>
                </tr> 
                
                <?php
                    $sql = "SELECT * FROM correo order by usu_codigo desc";
                    $result = $conn->query($sql); 

                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()){ 
                            echo "<tr>"; 
                            echo " <td>" . $row["usu_fecha"] . "</td>";
                            echo " <td>" . $row['usu_remitente'] . "</td>"; 
                            echo " <td>" . $row['usu_destinatario'] . "</td>"; 
                            echo " <td>" . $row['usu_asunto'] . "</td>"; 
                            echo " <td> <a href='eliminarMensaje.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                        } 

                    }else{
                        echo "<tr>"; 
                        echo " <td colspan='7'> NO EXISTEN CORREOS ENVIADOS POR EL USUARIO </td>"; 
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