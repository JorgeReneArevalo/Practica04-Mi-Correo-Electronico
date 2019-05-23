<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['privilegios'] === 'admin' ){ 
        header("Location: /Practica04/public/vista/login.html"); 
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../../../js/ajax.js" type="text/javascript">  </script>
    <link href="../../../style/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../style/estilo2.css" rel="stylesheet"/>
    <link href="../../../style/titulos.css" rel="stylesheet"/>
    <link href="../../../style/imagenes.css" rel="stylesheet"/>
    <title>Pagina Usuario</title>

</head>
<body>
    <?php
        include '../../../config/conexionBD.php';
        $usuario=$_SESSION['user'];
		echo $usuario;
		
        $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
		echo $sql;
        $result=$conn->query($sql); 
        $resultarr=mysqli_fetch_assoc($result);
    ?>
    <div id="contenido">
        <nav>
            <ul class="nav" > 
                <li><a href="index.php">INICIO</a></li>
                
                    <?php
                        $usuario = $resultarr["usu_correo"];
                        $cad1 = "enviarCorreo.php?usuario=";
                        $final1 = $cad1 . $usuario;
                     ?> 
                <li><a href="<?php echo $final1 ?>">NUEVO MENSAJE</a></li>
                    <?php 
                        $codigo = $resultarr["usu_codigo"];
                        $cad1 = "mensajeEnviado.php?usuario=";
                        $final = $cad1 . $usuario;
                    ?>
                <li><a href= "<?php echo $final ?>" >MENSAJES ENVIADOS </a></li>

                <li><a >MI CUENTA</a>
                    <ul> 
                        <?php 
                            $codigo = $resultarr["usu_codigo"];
                            $cad1 = "modificar.php?codigo=";
                            $cad2 = $codigo;
                            $final1 = $cad1 . $cad2;
                            $cad3 = "cambiar_contraseña.php?codigo=";
                            $final2= $cad3 . $cad2;
                            $cad4 = "eliminar.php?codigo=";
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

    <div id = "lateral">
        <?php
            $nombres = $resultarr["usu_nombres"];
            $apellidos = $resultarr["usu_apellidos"];
            $nombreCompleto=$nombres. '  '.$apellidos;
        ?>
        
        <h1> <?php echo $nombreCompleto?> </h1>   
    </div>

    <div> 
        <article>
            <h1>MENSAJES RECIBIDOS </h1>
            <form  name="miformulario" onkeyup="return buscarPorCedula()">
                <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" /> 
                <input type="text"  id="caja_busqueda" name="caja_busqueda"  value="" placeholder="Buscar por remitente " >
            </form>
            
            <div  id="informacion" ><b> </b></div>
             <!-- 
            <body> 
                <br>
                <table border = 1 style="width:100%"> 
                    <tr>
                        <th>Fecha/Hora</th> 
                        <th>Remitente</th> 
                        <th>Asunto</th> 
                        <th>Leer</th> 
                    </tr> 

                    <?php
                        include '../../../config/conexionBD.php';
                        $sql = "SELECT * FROM correo where usu_destinatario= '$usuario' "; 
                        $result = $conn->query($sql); 
                        
                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()){
                                echo "<tr>"; 
                                echo " <td>" . $row["usu_fecha"] . "</td>";
                                echo " <td>" . $row['usu_remitente'] . "</td>"; 
                                echo " <td>" . $row['usu_asunto'] . "</td>"; 
                                echo " <td> <a href='../../controladores/user/leerMensaje.php?mensaje=" . $row['usu_mensaje'] . "'>Leer</a> </td>";
                            }
                        }else {
                            echo "<tr>"; 
                            echo " <td colspan='7'> NO EXISTEN CORREOS ENVIADOS POR EL USUARIO </td>"; 
                            echo "</tr>"; 
                        }
                        $conn->close(); 
                    ?>
                </table> 
            </body>  
            -->      
        </article>
                   
    </div>
    
</body>
</html>