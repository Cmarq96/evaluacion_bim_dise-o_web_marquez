<?php
session_start();
require_once("../../conexion.php");
require_once("../../resaltarBusqueda.inc.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$celular = $_POST["celular"];

//$db->debug=true;
if($nombre or $apellido or $celular){
    $sql3 = $db->Prepare("SELECT *
                        FROM clientes
                        WHERE nombre LIKE ?
                        AND apellido LIKE ?
                        AND celular LIKE ?
                        AND _estado <> 'X'
                        ");
    $rs3 = $db->GetAll($sql3, array($nombre."%", $apellido."%", $celular."%"));
if($rs3){
    echo"<center>
        <table class='listado'>
            <tr>
                <th>NOMBRE</th><th>APELLIDO</th><th>CELULAR</th><th><img src='../../imagenes/modificar.gif'></th><th><img src='../../imagenes/borrar.jpeg'></th>

                </tr>";
    foreach ($rs3 as $k => $fila){

        $str1 = $fila["nombre"];
        $str2 = $fila["apellido"];
        $str3 = $fila["celular"];

        echo"<tr>

            <td>".resaltar($nombre, $str1)."</td>
            <td>".resaltar($apellido, $str2)."</td>
            <td>".resaltar($celular, $str3)."</td>
            <td align='center'>
            <form name='formModif".$fila["id_cliente"]."' method='post' action='clientes_modificar.php'>
            <input type='hidden' name='id_cliente' value='".$fila['id_cliente']."'>
            <a href='javascript:document.formModif".$fila['id_cliente'].".submit();' title='Modificar cliente Sistema'>
              Modificar>>
                    </a>
                    </form>
                    </td>
                    <td align='center'>
                    <form name='formElimi".$fila["id_cliente"]."' method='post' action='clientes_eliminar.php'>
                    <input type='hidden' name='id_cliente' value='".$fila["id_cliente"]."'>
                    <a href='javascript:document.formElimi".$fila['id_cliente'].".submit();' title='Eliminar cliente Sistema' onclick='javascript:return(confirm(\"Desea realmente Eliminar al cliente ".$fila["nombre"]." ".$fila["apellido"]." ".$fila["celular"]." ?\"))'; location.href='clientes_eliminar.php''> 
                      Eliminar>>
                            </a>
                        </form>
                    </td>
                </tr>";
    }
    echo"</table>
    </center>";
}else{
    echo"<center><b>EL CLIENTE NO EXISTE!!</b></center><br>";
}
}
?>