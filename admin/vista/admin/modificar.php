<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../../estyles/estilo.css" rel="stylesheet">
    <title>Modificar datos</title>
</head>
<body>
    <?php
        $codigo = $_GET["codigo"]; 
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";     
        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                ?> 
                <form id="formulario01" method="POST" action="../../controladores/usuario/modificar.php"> 
                
                    <legend><Strong> ACTUALIZAR DATOS DEL USUARIO </Strong> </legend> <br> 
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
            
                    <label for="cedula">Cedula (*)</label> 
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" /> <br> 

                    <label for="nombres">Nombres (*)</label> 
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" /> <br> 
            
                    <label for="apellidos">Apelidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" /> <br> 
            
                    <label for="direccion">Dirección (*)</label> 
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" /> <br> 
            
                    <label for="telefono">Teléfono (*)</label> 
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" /> <br> 
            
                    <label for="fecha">Fecha Nacimiento (*)</label> 
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" /> <br> 
            
                    <label for="correo">Correo electrónico (*)</label> 
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" /> <br> 

                    <div class="button">
                        <br> 
                        <button type="submit">ACTUALIZAR</button>
                        <button type="reset" onclick="history.back()" >Cancelar</button>
                    </div>
                </form> 
                <?php 
         
            } else { 
                echo "<p>Ha ocurrido un error inesperado !</p>";    
                echo "<p>" . mysqli_error($conn) . "</p>"; 

            } 
        } 
     ?> 
    
</body>
</html>