<?php 
session_start();   
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE){  
    header("Location: /Practica04/public/vista/login.html"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../../../js/cargarImagen.js" type="text/javascript">  </script>
    <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyles/estilo2.css" rel="stylesheet"/>
    <link href="../../../estyles/titulos.css" rel="stylesheet"/>
    <link href="../../../estyles/imagenes.css" rel="stylesheet"/>
    <link href="../../../estyles/estilo.css" rel="stylesheet">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <?php 
        include '../../../config/conexionBD.php';
        $usuario=$_SESSION['admin']; 
        $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
        $result=$conn->query($sql); 
        $resultarr=mysqli_fetch_assoc($result);
    ?>
    <div id ="contenido">  
        <nav > 
            <ul class="nav" >
                <li><a href="index.php">INICIO</a></li>
                    <li><a href="listaUsuarios.php">USUARIOS</a></li>
                    <li><a  >MI CUENTA</a>
                        <ul>     
                            <?php 
                                $codigo = $resultarr["usu_codigo"];
                                $cad1 = "modificar.php?codigo=";
                                $cad2 = $codigo;
                                $final1 = $cad1 . $cad2;

                                $cad3 = "cambiar_contrasena.php?codigo=";
                                $final2= $cad3 . $cad2;

                            ?>
                            <li><a href= "<?php echo $final1 ?>" >DATOS  </a></li>
                            <li><a href="<?php echo $final2 ?>"> CONTRASEÑA  </a></li>
                        </ul>
                </li>
                <li><a href='../../../public/vista/login.html' >CERRAR SESIÓN </a>
            </ul>
        </nav>
    </div>  

    <div >
        <article>
            <h1>ACTUALIZAR LOS DATOS  </h1>
            <body> 
                <?php 
                    $codigo = $resultarr["usu_codigo"];
                ?>         
                 <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php"> 
                    <legend><Strong>ACTUALIZAR SU CONTRASEÑA </Strong> </legend> <br> 
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
                
                    <label for="cedula">Contraseña Actual (*)</label>                        
                    <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/> <br> 
                    
                    <label for="cedula">Contraseña Nueva (*)</label> 
                    <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/> <br> 
                
                    <div class="button">
                        <br> 
                        <button type="submit">Cambiar Contraseña</button>
                        </div>
                </form> 
            </body>
        </article>
    </div>
    
</body>
</html>