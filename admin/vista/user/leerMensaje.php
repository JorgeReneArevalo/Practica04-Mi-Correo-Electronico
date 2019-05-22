
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="../../../estyle/estilos.css">
    
</head>
<body>

    <section class="form_wrap">
        
    <?php 
     $mensaje = $_GET["mensaje"]; 
     ?> 

        <section class="mensaje-exito">
            <h1 >"SU MENSAJE ES: " </h1>

            <br>
            <h1>"<?php echo $mensaje?>" </h1>
            <Strong>
            <button class="boton_personalizado"  type="reset" onclick="history.back()" >REGRESAR </button>
            
        </section>

    </section>

</body>
</html>
