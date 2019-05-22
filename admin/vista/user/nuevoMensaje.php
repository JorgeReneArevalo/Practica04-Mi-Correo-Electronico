<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../../../js/ajax.js" type="text/javascript">  </script>
    <link href="../../../estyle/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyle/estilo.css" rel="stylesheet">
    <title>Mensajes Enviados</title>
</head>
<?php 

 include '../../../config/conexionBD.php';
 $usuario=$_GET["usuario"];
?>

<div class="button">
    <button class="boton_personalizado"  type="reset" onclick="history.back()" >CANCELAR</button>
    <br>
</div>

<form  onkeyup="return buscarPorCedula2()">
    <h1>MENSAJES ENVIADOS </h1>
    <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" /> 
    <input type="text"  id="caja_busqueda2" name="caja_busqueda2"  value="" placeholder="Buscar por destinatario " >
</form>
<div  id="informacion" ><b> </b>
</div>
<br>


<body>
    <table border = 1 style="width:100%"> 
        <tr>
            <th>Fecha</th> 
            <th>Destinatario</th> 
            <th>Asunto</th> 
            <th>Mensaje</th> 
        </tr>
        <?php
            $sql = "SELECT * FROM correo where usu_remitente= '$usuario' order by usu_codigo desc "; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){ 
                    echo "<tr>"; 
                    echo " <td>" . $row["usu_fecha"] . "</td>";
                    echo " <td>" . $row['usu_destinatario'] . "</td>"; 
                    echo " <td>" . $row['usu_asunto'] . "</td>"; 
                    echo " <td> <a href='../../vista/user/leerMensaje.php?mensaje=" . $row['usu_mensaje'] . "'>Leer</a> </td>";
                }
            }else {
                echo "<tr>"; 
                echo " <td colspan='7'> NO EXISTEN CORREOS ENVIADOS POR EL USUARIO </td>"; 
                echo "</tr>"; 
            }
            $conn->close(); 
        ?>
    </table>
</body>
</html>