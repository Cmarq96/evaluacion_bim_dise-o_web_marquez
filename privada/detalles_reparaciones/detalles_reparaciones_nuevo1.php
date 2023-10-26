<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       


$id_reparacion = $_POST["id_reparacion"];
$cantidad = $_POST["cantidad"];
$tipo_pieza = $_POST["tipo_pieza"];
$observaciones = $_POST["observaciones"];

if(($id_reparacion!="") and  ($cantidad!="") and ($tipo_pieza!="") and ($observaciones!="")){
   $reg = array();
   $reg["id_reparacion"] = $id_reparacion;
   $reg["cantidad"] = $cantidad;
   $reg["tipo_pieza"] = $tipo_pieza;
   $reg["observaciones"] = $observaciones ;
   $reg["_fec_insercion"] = date("Y-m-d H:i:s");
   $reg["_estado"] = 'A';
   $reg["_usuario"] = $_SESSION["sesion_id_usuario"];   
   $rs1 = $db->AutoExecute("detalles_reparaciones", $reg, "INSERT"); 
   header("Location: detalles_reparaciones.php");
   exit();
} else {
           echo"<div class='mensaje'>";
        $mensage = "NO SE INSERTARON LOS DATOS DE EL DETALLE REPARACION";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='detalles_reparaciones_nuevo.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }


echo "</body>
      </html> ";
?> 