<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../../estyle/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyle/estilo.css" rel="stylesheet">
    <title>Lista de Usuarios</title>
</head>
<body>
    <table border = 1 style="width:100%"> 
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
    <tr> 
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
            echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
            echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";
        } 
    }else{
        echo "<tr>"; 
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
        echo "</tr>"; 
    }
    $conn->close(); 
    ?>

    <div class="button">
        <button  class="boton_personalizado"  type="regresar" onclick="history.back()" >CANCELAR</button>  
        <br>
    </div>    
    
</body>
</html>