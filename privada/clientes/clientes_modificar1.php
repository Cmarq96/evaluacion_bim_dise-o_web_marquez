<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       
$id_cliente = $_POST["id_cliente"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$celular = $_POST["celular"];


if(($nombre!="") and  ($apellido!="")and  ($celular!="")){
   $reg = array();
   $reg["id_torneria"] = 1;
   $reg["nombre"] = $nombre;
   $reg["apellido"] = $apellido;
   $reg["celular"] = $celular;
   $reg["fec_insercion"] = date("Y-m-d H:i:s");
   $reg["estado"] = 'A';
   $reg["usuario"] = $_SESSION["sesion_id_usuario"];   
   $rs1 =$db->AutoExecute("clientes", $reg, "UPDATE","id_cliente='".$id_cliente."'"); 
   header("Location: clientes.php");
   exit();
} else {
           echo"<div class='mensaje'>";
        $mensage = "NO SE MODIFICARON LOS DATOS DEL CLIENTE";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='cleinte_nuevo.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }


echo "</body>
      </html> ";
?>