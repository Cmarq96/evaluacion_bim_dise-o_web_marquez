<?php
session_start();
require_once("../../conexion.php");

$__id_cliente = $_REQUEST["id_cliente"];

echo"<html>
        <head>
            <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
        </head>
        <body>";

$db->debug=true;

$sql = $db->Prepare("SELECT  *
                     FROM clientes_mecanicos
                     WHERE id_cliente = ?
                     AND _estado <> 'X'
                    ");
$rs = $db->GetAll($sql, array($__id_cliente));

if(!$rs){
    $reg = array();
    $reg ["_estado"] = 'X';
    $reg ["_usuario"] = $_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("clientes",$reg,"UPDATE","id_cliente='".$__id_cliente."'");
    header("Location:clientes.php");
    exit(); 
}else{
    require_once("../../libreria_menu.php");
    echo"<div class='mensaje'>";
    $mensaje = "NO SE ELIMINARON LOS DATOS DEL CLIENTE PORQUE TIENE HERENCIA";
    echo"<h1>".$mensaje."</h1>";

    echo"<a href='clientes.php'>
            <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px'
                value='VOLVER>>>>'></input>
        </a>
        ";
    echo"</div>";
}
echo"</body>
</html>";
?>