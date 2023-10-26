<?php
session_start();
require_once("conexion.php");
require_once("libreria_menu.php");

//$db->debug=true; 
//codigo para el contador de visitas
$archivo = "archivo.txt";
$contador = intval(trim(file_get_contents($archivo))); 

$file = fopen($archivo, "w");
fwrite($file, $contador+1 . PHP_EOL);

$file = fopen($archivo, "r");

echo"<div style='position:fixed;bottom:10px;z-index:9;right:10px;background: #ef4807;padding: 2px 10px;font-size: 30px;border-radius: 20px;'> VISITAS<BR>".fgets($file)."</div>";
fclose($file);


echo"<html> 
       <head>
         <link rel='stylesheet' href='css/estilos.css' type='text/css'>
       </head>
       <body>
         <p></p>";
echo "</body>
      </html> ";
?>	