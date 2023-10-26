<?php
session_start();
require_once("../../conexion.php");
$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$celular = $_POST["celular"];


if(($nombre!="") and  ($apellido!="")){
   $reg = array();
   $reg["id_torneria"] = 1;
   $reg["nombre"] = $nombre;
   $reg["apellido"] = $apellido;
   $reg["celular"] = $celular;
   $reg["_fec_insercion"] = date('y-m-d h:i:s');
   $reg["_usuario"] = $_SESSION["sesion_id_usuario"];   
   $reg["_estado"] = 'A';
   $rs1 = $db->AutoExecute("clientes", $reg, "INSERT"); 
   header("Location:clientes.php");
   exit();
} else {
           echo"<div class='mensaje'>";
        $mensage = "NO SE INSERTARON LOS DATOS DE LA MAQUINA";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='tipos_maquinas_nuevo.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }


echo "</body>
      </html> ";
?> 