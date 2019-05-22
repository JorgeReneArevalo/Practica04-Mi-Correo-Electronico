<?php
    session_start();  
    if(!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE){  
        header("Location: public/vista/login.html"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Usuario</title>
</head>
<body>
    
</body>
</html>