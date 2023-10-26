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
       <a  href='detalles_reparaciones_nuevo.php'>Nuevo Detalle Reparacion</a>
       <a onclick='location.href=\"../../validar.php\"'><input type='button'name='accion' value='Cerrar Sesion' style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' class='boton_cerrar'></a>";
       echo"<h3>USUARIO: ".$_SESSION["sesion_usuario"]."  &nbsp;&nbsp; ";
       echo"ROL: ".$_SESSION["sesion_rol"]."</h3>";  
        echo"<h1>LISTADO DE DETALLES REPARACIONES</h1>";

$sql = $db->Prepare("SELECT CONCAT_WS('--', re.id_trabajador, re.id_cliente, re.fecha_inicio) AS repara, dr.* 
                     FROM reparaciones re, detalles_reparaciones dr
                     WHERE re.id_reparacion = dr.id_reparacion
                     AND re._estado <> 'X' 
                     AND dr._estado <> 'X' 
                     ORDER BY dr.id_detalle_reparacion DESC                      
                        ");
$rs = $db->GetAll($sql);
   if ($rs) {
        echo"<center>
              <table class='listado'>
                <tr>                                   
                  <th>Nro</th><th>TRAB--CLIE--FECHA-INI</th><th>CANTIDAD</th><th>TIPO DE PIEZA</th><th>OBSERVACIONES</th>
                  <th><img src='../../imagenes/modificar.gif'></th><th><img src='../../imagenes/borrar.jpeg'></th>
                </tr>";
                $b=1;
            foreach ($rs as $k => $fila) {                                       
                echo"<tr>
                        <td align='center'>".$b."</td>
                        <td>".$fila['repara']."</td>                        
                        <td>".$fila['cantidad']."</td>
                        <td>".$fila['tipo_pieza']."</td>
                        <td>".$fila['observaciones']."</td>  
                        <td align='center'>
                          <form name='formModif".$fila["id_detalle_reparacion"]."' method='post' action='detalles_reparaciones_modificar.php'>
                            <input type='hidden' name='id_reparacion' value='".$fila['id_reparacion']."'>
                            <input type='hidden' name='id_detalle_reparacion' value='".$fila['id_detalle_reparacion']."'>
                            <a href='javascript:document.formModif".$fila['id_detalle_reparacion'].".submit();' title='Modificar Detalle Reparacion del Sistema'>
                              Modificar>>
                            </a>
                          </form>
                        </td>
                        <td align='center'>  
                          <form name='formElimi".$fila["id_detalle_reparacion"]."' method='post' action='detalles_reparaciones_eliminar.php'>
                            <input type='hidden' name='id_detalle_reparacion' value='".$fila["id_detalle_reparacion"]."'>
                            <a href='javascript:document.formElimi".$fila['id_detalle_reparacion'].".submit();' 
                            title='Eliminar Persona Sistema' onclick='javascript:return(confirm(\"Desea realmente Eliminar el Detalle Reparacion "
                            .$fila["tipo_pieza"]." ".$fila["observaciones"]." ?\"))'; location.href='detalles_reparaciones_eliminar.php''> 
                              Eliminar>>
                            </a>
                          </form>                        
                        </td>
                     </tr>";
                     $b=$b+1;
            }
             echo"</table>
          </center>";
    }

echo "</body>
      </html> ";

 ?>