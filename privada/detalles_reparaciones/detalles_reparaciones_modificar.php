<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;
echo$id_detalle_reparacion=$_POST["id_detalle_reparacion"];
$id_reparacion=$_POST["id_reparacion"];

echo"<html>
    <head>
       <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>
       <a href='../../listado_tablas.php'>Listado de tablas</a>
       <a href='detalles_reparaciones.php'>Listado de Detalles Reparaciones</a>
       <a onclick='location.href=\"../../validar.php\"'><input type='button'name='accion'value='Cerrar Sesion'
          style='cursor:pointer;border-radius:10px;font-weigth:bold;height: 25px;' class='boton_cerrar'></a>";
          echo"<h3>USUARIO: ".$_SESSION["sesion_usuario"]."  &nbsp;&nbsp; ";
	    echo"ROL: ".$_SESSION["sesion_rol"]."</h3>";  
       echo"<h1>MODIFICAR DETALLE REPARACION</h1>";

$sql = $db->Prepare("SELECT *
                    FROM detalles_reparaciones
                    WHERE id_detalle_reparacion = ?
                    AND _estado = 'A'
                       ");
$rs = $db->GetAll($sql, array($id_detalle_reparacion));


$sql1 = $db->Prepare("SELECT CONCAT_WS('//',id_trabajador, fecha_inicio, fecha_entrega) as repara, id_reparacion
                    FROM reparaciones
                    WHERE id_reparacion = ?
                    AND _estado = 'A'
                    ");
$rs1 = $db->GetAll($sql1, array ($id_reparacion));

$sql2 = $db->Prepare("SELECT CONCAT_WS('///',id_trabajador, fecha_inicio, fecha_entrega) as repara, id_reparacion
                    FROM reparaciones
                    WHERE id_reparacion <> ?
                    AND _estado = 'A'
                    ");
$rs2 = $db->GetAll($sql2, array($id_reparacion)); 

echo"<form action='detalles_reparaciones_modificar1.php' method='post' name='formu'>";
echo"<center>
         <table class='listado'>
         <tr>
         <th>(*)TRABAJADOR FECHAS</th>
         <td>
         <select name='id_reparacion'>";
         foreach($rs1 as $k => $fila){
            echo"<option value='".$fila['id_reparacion']."'>".$fila['repara']."</option>";
         }
         foreach ($rs2 as $k => $fila){
            echo"<option value='".$fila['id_reparacion']."'>".$fila['repara']."</option>";
         }
         
         echo"</select>
           </td>
           </tr>";
           foreach ($rs as $k => $fila){
            echo "<tr>
                     <th><b>(*) CANTIDAD/b></th>
                     <td><input type='text' name='cantidad' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["cantidad"]."'></td>
                  </tr>
                  <tr>
                     <th><b>(*) TIPO DE PIEZA</b></th>
                     <td><input type='text' name='tipo_pieza' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["tipo_pieza"]."'></td>
                  </tr>
                  <tr>
                     <th><b>(*) OBSERVACIONES</b></th>
                     <td><input type='text' name='observaciones' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["observaciones"]."'></td>
                  </tr>

            <tr>
              <td align='center' colspan='2'>
              <input type='submit' value='MODIFICAR EL DETALLE REPARACION'><br>
              (*)Datos obligatorios
              <input type='hidden' name='id_detalle_reparacion' value='".$fila["id_detalle_reparacion"]."'>
              </td>
              </tr>";
           }
           echo"</table>
           </center>";
        echo"</form>";

      /*}*/
        
        echo "</body>
              </html> ";
?>