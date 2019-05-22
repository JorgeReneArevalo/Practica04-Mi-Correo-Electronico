<?php
 session_start();
 $_SESSION['isUser'] = FALSE;
 session_destroy();
 header("Location: /SistemaDeGestion/public/vista/login.html");
?>