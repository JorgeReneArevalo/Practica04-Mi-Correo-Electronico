<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear nuevo ususario</title>
    <style type="text/css" rel="stylesheet">
        .error{
                color: red;
            }
    </style>

</head>

<body>
    <?php
        //incluir conexión a la base de datos
        include '../../config/conexionBD.php';

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;

        $admin=isset($_POST["admin"]) ? trim($_POST["admin"]) : null;
 
        $user=isset($_POST["user"]) ? trim($_POST["user"]) : null; 

        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $FechaDeNacimiento = isset($_POST["FechaDeNacimiento"]) ? trim($_POST["FechaDeNacimiento"]): null;
        $contraseña = isset($_POST['contraseña'])?(trim($_POST["contraseña"])):null; 
        $contra=MD5($contraseña);

        if ($admin == null){
            $rol=$user;
        }else{
            $rol=$admin;
        }

        $sql = "INSERT INTO usuario VALUES (0, '$rol', '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono',
       '$correo', '$contra' , '$FechaDeNacimiento', 'N', null, null)";
    
        if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
        } else {
        if($conn->errno == 1062){
        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        }else{
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
        }
       
        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
    ?>


</body>
</html>