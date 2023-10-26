<?php

require_once("adodb/adodb.inc.php"); //llama  a una libreria la abre, nos ayuda a preparar consultas


$conServidor = "localhost";
$conUsuario = "root";
$conClave = "";
$conBasededatos = "torneria";

$db = ADONewConnection("mysqli");

//$db-> debug = true;

$conex = $db->Connect($conServidor, $conUsuario, $conClave, $conBasededatos);
$db->Execute("SET NAMES 'utf8'"); // para que reconosca las ñ, acentos,etc
?>