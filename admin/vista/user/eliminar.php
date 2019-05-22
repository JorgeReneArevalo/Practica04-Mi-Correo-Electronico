<?php
session_start();  
if(!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE){  
  header("Location: /SistemaDeGestion/public/vista/login.html"); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de persona</title>
    <link href="../../../config/formulario.css" rel="stylesheet" type="text/css" /> 
    <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <ul id="button">
        <li><a href="">INICIO</a></li>
        <li><a href="nuevomensaje.php">Nuevo Mensaje</a></li>
        <li><a href="mensajesenviados.php">Mensajes Enviados</a></li>
        <li><a href="MiCuenta.php">Mi cuenta</a></li>
        <li><a href="../../../config/cerrar_sesion_User.php" style="float:right">Cerrar Sesion</a></li>
    </ul> 
    <br> 
    <br> 
    <br> 
    <br>
    <?php

    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM usuario where usu_codigo=$codigo";

    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="../../controladores/user/eliminar.php">
                <fieldset>
                    <legend>Sistema de Gestion de Personas</legend>
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <label for="cedula">Cedula (*)</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
                    <br>
                    <label for="nombres">Nombres (*)</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled />
                    <br>
                    <label for="apellidos">Apelidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled />
                    <br>
                    <label for="direccion">Dirección (*)</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                    <br>
                    <label for="telefono">Teléfono (*)</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled />
                    <br>
                    <label for="fecha">Fecha Nacimiento (*)</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled />
                    <br>
                    <label for="correo">Correo electrónico (*)</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
                    <br>
                    <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                </fieldset>
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
</body>

</html>