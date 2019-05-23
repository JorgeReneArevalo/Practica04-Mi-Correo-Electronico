<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar usuario</title>
</head>
<body>
    <?php
        include '../../../config/conexionBD.php'; 
        $codigo = $_POST["codigo"];  
        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 
        $sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo"; 

        if ($conn->query($sql) === TRUE) { 
        } else {
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
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