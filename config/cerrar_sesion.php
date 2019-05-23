<?php 
session_start(); $_SESSION['isLogged'] = FALSE; 
session_destroy(); 
header("Location: /Proyecto04/public/vista/login.html"); ?>