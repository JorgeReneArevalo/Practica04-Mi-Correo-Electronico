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
    <link href="../../../style/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../style/estilo2.css" rel="stylesheet"/>
    <link href="../../../style/titulos.css" rel="stylesheet"/>
    <link href="../../../style/imagenes.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../../style/estilos.css">
    <title>Nuevo Mensaje</title>
</head>
<body>
    <?php
        include '../../../config/conexionBD.php';
        $usuario = $_GET["usuario"]; 
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
        <body>
            <?php 
                $usuario = $_GET["usuario"]; 
            ?>
            <section class="form_wrap">
                <section class="cantact_info">

                </section>
                <form action="../../controladores/user/enviar.php" method="post" class="form_contact">

                <div class="user_info">

                    <label for="fecha">Fecha *</label>
                    <input type="date" name="fecha" value="<?php date_default_timezone_set("America/Guayaquil"); echo date("Y-m-d");?>" disabled >

                    <label for="remitente">Remitente *</label>
                    <input type="email" id="remitente" name="remitente" value="<?php  echo $usuario ?>"  >

                    <label for="destinatario">Destinatario*</label>
                    <input type="email" id="destinatario" name="destinatario" >

                    <label for="asunto">Asunto*</label>
                    <input type="text" id="asunto" name="asunto" >


                    <label for="mensaje">Mensaje *</label>
                    <textarea id="mensaje" name="mensaje" required> </textarea>

                    <input type="submit" value="Enviar Correo " id="btnSend">
                </div>

            </section>
         </body>
    </article>
    
</body>
</html>