<?php
 session_start();
 $_SESSION['isAdmin'] = FALSE;
 session_destroy();
 header("Location: /SistemaDeGestion/public/vista/login.html");
?>