<?php 
session_start();
$_SESSION = array();
session_destroy();

header('location: /Projeto-TCC-Maria-Rocha/index.html');
?>