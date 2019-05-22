<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar mensaje</title>
</head>
<body>
    <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"]; 

        $sql = "DELETE FROM correo WHERE usu_codigo = '$codigo'"; 

        if ($conn->query($sql) === TRUE) { 
            echo "<p>MENSAJE ELIMINADO CON EXITO  </p>"; 
        } else {
             echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
        } 
        $conn->close(); 

    ?>
    <div class="button">
        <button type="reset" onclick="history.back()" >REGRESAR</button>
        <br>
    </div>
    
</body>
</html>