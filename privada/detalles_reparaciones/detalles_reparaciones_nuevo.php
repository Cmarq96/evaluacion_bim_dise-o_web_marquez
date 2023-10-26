<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>
       <a  href='../../listado_tablas.php'>Listado de tablas</a>
       <a  href='detalles_reparaciones.php'>Listado de Detalles Reparaciones</a>
       <a onclick='location.href=\"../../validar.php\"'><input type='button'name='accion' value='Cerrar Sesion' style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' class='boton_cerrar'></a>";
       echo"<h3>USUARIO: ".$_SESSION["sesion_usuario"]."  &nbsp;&nbsp; ";
       echo"ROL: ".$_SESSION["sesion_rol"]."</h3>";  
        echo"<h1>INSERTAR DETALLE REPARACION</h1>";

$sql = $db->Prepare("SELECT CONCAT_WS('--', id_trabajador, id_cliente, fecha_inicio) AS repara, id_reparacion
                     FROM reparaciones
                     WHERE _estado <> 'X'                        
                        ");
$rs = $db->GetAll($sql);
 /*  if ($rs) {*/
        echo"<form action='detalles_reparaciones_nuevo1.php' method='post' name='formu'>";
        echo"<center>
                <table class='listado'>
                  <tr>
                    <th>(*)TRAB--CLIE--FECHA-INI</th>
                    <td>
                      <select name='id_reparacion'>
                        <option value=''>--Seleccione--</option>";
                        foreach ($rs as $k => $fila) {
                        echo"<option value='".$fila['id_reparacion']."'>".$fila['repara']."</option>";    
                        }  

                echo"</select>
                    </td>
                  </tr>";
             echo"<tr>
                    <th><b>(*)CANTIDAD</b></th>
                    <td><input type='text' name='cantidad' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  </tr>
                  <tr>
                    <th><b>(*)TIPO DE PIEZA</b></th>
                    <td><input type='text' name='tipo_pieza' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  </tr>
                  <tr>
                    <th><b>(*)OBSERVACIONES</b></th>
                    <td><input type='text' name='observaciones' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  </tr>
                  
                  <tr>
                    <td align='center' colspan='2'>  
                      <input type='submit' value='ADICIONAR DETALLE REPARACION'><br>
                      (*)Datos Obligatorios
                    </td>
                  </tr>
                </table>
                </center>";
          echo"</form>" ;     
    /*}*/

echo "</body>
      </html> ";

 ?>