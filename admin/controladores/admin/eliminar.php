<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Eliminar datos de persona </title> 
    <link rel="stylesheet" href="../../../style/estilos.css">

</head> 
<body> 
<?php 
//incluir conexión a la base de datos 
include '../../../config/conexionBD.php'; 
$codigo = $_POST["codigo"]; 

//Si voy a eliminar físicamente el registro de la tabla 
//$sql = "DELETE FROM usuario WHERE codigo = '$codigo'"; 

date_default_timezone_set("America/Guayaquil"); 
$fecha = date('Y-m-d H:i:s', time()); 

$sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo"; 

if ($conn->query($sql) === TRUE) { 
    echo "<p>USUARIO ELIMINADO CON ÉXITO </p>"; 
    

    header("Location: ../../vista/admin/listarUsuario.php");


} else {
     echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
} 

$conn->close(); 

?>
<div class="button">

<br>
</div>

</body>
</html>
