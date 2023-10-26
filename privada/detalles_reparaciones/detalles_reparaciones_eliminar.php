<?php
session_start();
require_once("../../conexion.php");

$__id_detalle_reparacion = $_REQUEST["id_detalle_reparacion"];

echo"<html>
        <head>
            <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
        </head>
        <body>";

$db->debug=true;


    $reg = array();
    $reg ["_estado"] = 'X';
    $reg ["_usuario"] = $_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("detalles_reparaciones",$reg,"UPDATE","id_detalle_reparacion='".$__id_detalle_reparacion."'");
    header("Location:detalles_reparaciones.php");
    require_once("../../libreria_menu.php");
    exit(); 

echo"</body>
</html>";
?>