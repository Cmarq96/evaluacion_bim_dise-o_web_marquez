<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html>
    <head>
    <link rel='stylesheet' href='../../css/estilos.css'type='text/css'>
    <head>
    <body>";
    $id_reparacion = $_POST["id_reparacion"];
    $id_detalle_reparacion = $_POST["id_detalle_reparacion"];
    $cantidad = $_POST["cantidad"];
    $tipo_pieza =$_POST["tipo_pieza"];
    $observaciones =$_POST["observaciones"];
 
    if(($id_reparacion!="") and ($id_detalle_reparacion!="") and ($cantidad!="") and ($tipo_pieza!="")and ($observaciones!="")){
        $reg= array();
        $reg["id_reparacion"]= $id_reparacion;
        $reg["id_detalle_reparacion"]= $id_detalle_reparacion;
        $reg["cantidad"]= $cantidad;
        $reg["tipo_pieza"]= $tipo_pieza;
        $reg["observaciones"]= $observaciones;
        $reg["_usuario"]= $_SESSION["sesion_id_usuario"];
        $rs1 = $db->AutoExecute("detalles_reparaciones", $reg, "UPDATE", "id_detalle_reparacion='".$id_detalle_reparacion."'");
       header("Location: detalles_reparaciones.php");
        exit();
    }else{
        echo"<div class='mensaje'>";
        $mensage = "NO SE MODIFICARON LOS DATOS DEL DETALLE REPARACION";
        echo"<h1>".$mensage."</h1>";

        echo"<a href='detalles_reparaciones.php'>
        <input type='button' style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;'
             value='VOLVER>>>>'></input>
            </a>
        ";
        echo"</div>";
    }
    echo"</body>
    </html>";
?>