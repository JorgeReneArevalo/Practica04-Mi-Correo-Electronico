<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Practica04/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../../../js/ajax.js" type="text/javascript">  </script>
    <link href="../../../estyle/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyle/estilo2.css" rel="stylesheet"/>
    <link href="../../../estyle/titulos.css" rel="stylesheet"/>
    <link href="../../../estyle/imagenes.css" rel="stylesheet"/>
    <title>Mensajes Enviados</title>
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
                <li><a >INICIO</a></li>
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
                <li><a href= "<?php echo $final ?>" >MENS. ENVIADOS </a></li>

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
                    </ul>
                </li>
                <li><a href='../../../public/vista/login.html' >CERRAR SESIÓN </a>
            </ul>
        </nav>
    </div>

    <article>
        <h1>MENSAJES ENVIADOS </h1>
    <?php
        include '../../../config/conexionBD.php';
        $usuario=$_SESSION['usuario'];
    ?>

    <form  onkeyup="return buscarPorCedula2()">
        <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" /> 
        <input type="text"  id="caja_busqueda2" name="caja_busqueda2"  value="%" placeholder="Buscar por destinatario " >
    </form>

    <div  id="informacion" ><b> </b></div>
    <br>

    <?php
        $sql = "SELECT * FROM correo where usu_remitente= '$usuario' order by usu_fecha  desc "; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){ 
                echo "<tr>"; 
                echo " <td>" . $row["usu_fecha"] . "</td>";
                echo " <td>" . $row['usu_destinatario'] . "</td>"; 
                echo " <td>" . $row['usu_asunto'] . "</td>"; 
                echo " <td> <a href='../../controladores/user/leerMensaje.php?mensaje=" . $row['usu_mensaje'] . "'>Leer</a> </td>";
         
            } 
        }else{
            echo "<tr>"; 
            echo " <td colspan='7'> NO EXISTEN CORREOS ENVIADOS POR EL USUARIO </td>"; 
            echo "</tr>"; 

        }
        $conn->close(); 
    ?>




</body>
</html>